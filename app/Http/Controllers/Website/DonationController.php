<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\RedirectUrls;
use App\Mail\DoantionNotification;
use Illuminate\Support\Facades\Mail;

class DonationController extends Controller
{
    public $apiContext;
    public $success_url_card_payment;
    public $cancel_url_card_payment;

    public function __construct()
    {
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AXnWwNrI1bYKRYQMaSyvyOoDbVPY8aAUedyrhCDUbWd5OyQcYQBdV2PyWnQsOULlzeD613WrAVIIi8tX',     // ClientID
                'ELYIE7XRv3pvywy9P7mf5vED5l0vBBpL1sZRAO27svLVmClINpdvsuihUykN4PBaRu9ZUKUFjytI3aor'      // ClientSecret
            )
        );

        $this->success_url_card_payment = route('execute-donation-card-payment');
        $this->cancel_url_card_payment = route('execute-donation-card-payment').'?cancel=yes';
    }


    public function donationPayment(Request $request){
        $request->validate([
            'price' => 'required|numeric',
        ]);
        Session::put('hgs_userdonate_total', $request->price);
        if($request->payment_method == 'paypal'){
                    $url = $this->callPaypalApi(Session::get('hgs_userdonate_total'));
                    return redirect($url);
        }else if($request->payment_method == 'card'){
            $request->validate([
                'card_name' => 'required',
                'card_number' => 'required',
                'expire_date' => 'required',
                'cvv' => 'required|numeric',
            ]);
            $d_b_card = $this->callDebitCraditCardApi($request, Session::get('hgs_userdonate_total'));
            if($d_b_card == 'Success'){
                $amount = Session::get('hgs_userdonate_total');
                $email = env('MAIL_FROM_ADDRESS');
                Mail::to($email)->queue(new DoantionNotification($amount));
                Session::forget('hgs_userdonate_total');
                return \redirect(route('donate'))->with('success', 'Your donation has been successfully done ! Thank you.');
            }else if($d_b_card == 'Fail'){
                return \redirect()->back()->withInput($request->input())->with('invalid_card','Invalid card details');
            }else{
                return \redirect()->back();
            }
        }

    }

    public function callPaypalApi($total){
        $payer = new Payer();
		$payer->setPaymentMethod("paypal");

		$item1 = new Item();
		$item1->setName('Donation')
		    ->setCurrency('USD')
		    ->setQuantity(1)
		    ->setPrice($total);

		$itemList = new ItemList();
		$itemList->setItems(array($item1));

		$amount = new Amount();
		$amount->setCurrency("USD")
		    ->setTotal($total);
		    // ->setDetails($details);


		$transaction = new Transaction();
		$transaction->setAmount($amount)
		    ->setItemList($itemList)
		    ->setDescription("Payment description")
		    ->setInvoiceNumber(uniqid());

		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl($this->success_url_card_payment)
		    ->setCancelUrl($this->cancel_url_card_payment);


		$payment = new Payment();
		$payment->setIntent("sale")
		    ->setPayer($payer)
		    ->setRedirectUrls($redirectUrls)
		    ->setTransactions(array($transaction));

        $payment->create($this->apiContext);
        return $payment->getApprovalLink();
    }

    public function callDebitCraditCardApi($request, $total){
        $card_number = $request->card_number;
        $card_number = str_replace(' ','',$card_number);
        // echo $card_number;
        // exit();
        //$expire_date = explode('-',$request->expire_date);
        //$expire_date = $expire_date[1].$expire_date[0];
        $expire_date = explode('/',$request->expire_date);
        $expire_date = $expire_date[0].$expire_date[1];
        $card_name = $request->card_name;
        $cvv = $request->cvv;
        // print_r($expire_date) ;
        // exit();
        $request_params = array (
            'METHOD' => 'DoDirectPayment',
            'USER' => 'rasel.laravel-facilitator_api1.gmail.com',
            'PWD' => 'MVBP74BASH8DMHSC',
            'SIGNATURE' => 'A43nh2bZKIS-rPO52.dhOvFRo0JAAX5ugGy9ur4xNAbCWzFvl3DHZLwx',
            'VERSION' => '85.0',
            'PAYMENTACTION' => 'Sale',
            'IPADDRESS' => '127.0.0.1',
            'CREDITCARDTYPE' => '',
            'ACCT' => $card_number,
            'EXPDATE' => $expire_date,
            'CVV2' => $cvv,
            'FIRSTNAME' => '',
            'LASTNAME' => '',
            'STREET' => '',
            'CITY' => '',
            'STATE' => '',
            'COUNTRYCODE' => '',
            'ZIP' => '',
            'AMT' => $total,
            'CURRENCYCODE' => 'USD',
            'DESC' => 'Payment by debit credit card'
        );

        $nvp_string = '';
        foreach($request_params as $var=>$val){
            $nvp_string .= '&'.$var.'='.urlencode($val);
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_VERBOSE, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);

        $result = curl_exec($curl);
        curl_close($curl);
        $data = $this->NVPToArray($result);
        if($data['ACK'] == 'Success') {
            # Database integration...
            return 'Success';
        }
        if ($data['ACK'] == 'Failure') {
            # Database integration...
            return "Fail";
        }
    }

    public function NVPToArray($NVPString)
    {
       $proArray = array();
       while(strlen($NVPString)) {
            // key
            $keypos= strpos($NVPString,'=');
            $keyval = substr($NVPString,0,$keypos);
            //value
            $valuepos = strpos($NVPString,'&') ? strpos($NVPString,'&'): strlen($NVPString);
            $valval = substr($NVPString,$keypos+1,$valuepos-$keypos-1);

            $proArray[$keyval] = urldecode($valval);
            $NVPString = substr($NVPString,$valuepos+1,strlen($NVPString));
        }
        return $proArray;
    }

    public function executeCardPayment()
    {
        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        //return Session::get('hgs_userdonate_total');
        $details->setShipping(0.0)
            ->setTax(0.0)
            ->setSubtotal(Session::get('hgs_userdonate_total'));

        $amount->setCurrency('USD');
        $amount->setTotal(Session::get('hgs_userdonate_total'));
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);
        $result = $payment->execute($execution, $this->apiContext);
        $amount = Session::get('hgs_userdonate_total');
        $email = env('MAIL_FROM_ADDRESS');
        Mail::to($email)->queue(new DoantionNotification($amount));
        Session::forget('hgs_userdonate_total');
        return \redirect(route('donate'))->with('message', 'Your donation has been successfully done ! Thank you.');
        //return 'Success';
    }
    public function CancelCardPayment(Request $request)
    {
        $cancel = $request->cancel;
        return view('website.payment-cancel',compact('cancel'));
    }

    public function SuccessCardPayment()
    {
        return view('website.payment-success')->with('message', 'Your donation has been successfully done ! Thank you.');;
    }


}
