<?php

namespace App\Http\Controllers\Website;

use Auth;
use Carbon\Carbon;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use App\Models\PricingList;
use Illuminate\Support\Str;
use PayPal\Api\Transaction;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use App\Models\SubscribeUser;
use App\Models\SubscriberImage;
use PayPal\Api\PaymentExecution;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\SubscribeRegisterUserNotification;

class PaymentController extends Controller
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

        $this->success_url_card_payment = route('execute-card-payment');
        $this->cancel_url_card_payment = route('cancel-card-payment').'?cancel=yes';
    }

    public function subscribeUser(Request $request)
    {
        if(Auth::guard('subscriber')->user()){
            Auth::guard('subscriber')->logout();
        }
        $request->validate([
            'splan'            => 'required',
            'fname'            => 'required|max:32',
            'mname'            => 'nullable',
            'lname'            => 'nullable',
            'phone'            => 'required|max:13',
            'yearOfBirth'      => 'required|max:4',
            'email'            => 'required|string|email|max:255|unique:subscribe_users',
            'usa_address'      => 'required',
            'city'             => 'required',
            'state'            => 'required',
            'zipcode'          => 'required|min:5',
            'country'          => 'required',
            "profile_img"      => "mimes:jpeg,jpg,png,gif|max:5120",
            'facebook'         => 'required_if:request-type,url|nullable|url',
            'twitter'          => 'required_if:request-type,url|nullable|url',
            'other_social'     => 'required_if:request-type,url|nullable|url',
            'password'         => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password|min:6',
        ]);
        $sPlan = $request->splan;
        $priceList = PricingList::find($sPlan);
        if($priceList){
            $hgs_usersub_data['member_plan'] = $priceList->slug;
            $hgs_usersub_data['duration'] = $priceList->duration;
        }else{
            $hgs_usersub_data['member_plan'] = 'Free';
            $hgs_usersub_data['duration'] = '0';
        }
        //return Carbon::today();
        $fName =$request->fname;
        $mName = ($request->mname)?'-'.$request->mname:null;
        $lName = ($request->lname)?'-'.$request->lname:null;
        $fullName = $fName.$mName.$lName.'-'.rand(12,90);

        $subacribeUserLatest = SubscribeUser::orderBy('created_at','DESC')->first();
        if($subacribeUserLatest){
            $subscribeUserId = $subacribeUserLatest->member_id;
        }else{
            $subscribeUserId = 1;
        }
        $currentSubscribeUserId = str_pad($subscribeUserId + 1, 6, "0", STR_PAD_LEFT);

        $hgs_usersub_data['member_id'] = $currentSubscribeUserId;
        $hgs_usersub_data['slug'] = Str::slug($fullName);
        $hgs_usersub_data['fname'] = ($request->fname)?$request->fname:null;
        $hgs_usersub_data['mname'] = ($request->mname)?$request->mname:null;
        $hgs_usersub_data['lname'] = ($request->lname)?$request->lname:null;
        $hgs_usersub_data['phone'] = ($request->phone)?$request->phone:null;
        $hgs_usersub_data['yearOfBirth'] = ($request->yearOfBirth)?$request->yearOfBirth:null;
        $hgs_usersub_data['email'] = ($request->email)?$request->email:null;
        $hgs_usersub_data['password'] = bcrypt(($request->password)?$request->password:null);
        $hgs_usersub_data['usa_address'] = ($request->usa_address)?$request->usa_address:null;
        $hgs_usersub_data['city'] = ($request->city)?$request->city:null;
        $hgs_usersub_data['state'] = ($request->state)?$request->state:null;
        $hgs_usersub_data['zipcode'] = ($request->zipcode)?$request->zipcode:null;
        $hgs_usersub_data['country'] = ($request->country)?$request->country:null;
        $hgs_usersub_data['facebook'] = ($request->facebook)?$request->facebook:null;
        $hgs_usersub_data['twitter'] = ($request->twitter)?$request->twitter:null;
        $hgs_usersub_data['other_social'] = ($request->other_social)?$request->other_social:null;
        $hgs_usersub_data['information'] = ($request->information)?$request->information:null;
        $hgs_usersub_data['profile_img'] = null;
        Session::put('hgs_usersub_data' , $hgs_usersub_data);

        //return SESSION::get('hgs_usersub_data');
        $data = $request->all();
        if($renewImage = $request->file('profile_img')){
            $file_ext        = $renewImage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999).".".$file_ext;
            $destination     = "upload/subscribe-users";
            $destinationfull = "upload/subscribe-users/".$imagename;
            $renewImage->move($destination, $imagename);
            $data['profile_img'] = $destinationfull;
            $subImg = SubscriberImage::create([
                'profile_img' => $data['profile_img'],
                'status' => 0,
            ]);
            Session::put('hgs_usersub_img' , $subImg['profile_img']);
            Session::put('hgs_usersub_img_id' , $subImg['id']);
        }else{
            Session::forget('hgs_usersub_img');
            Session::forget('hgs_usersub_img_id');
        }
        //return $_SESSION['hgs_usersub_data'];

        if($priceList){
            Session::put('hgs_payment_type' , 'subscribe');
            Session::put('hgs_usersub_total' , $priceList->price);
            return \redirect(route('subscribe-user-profile-payment-page'));
        }else if($request->splan == 0){
            $data = $request->all();

            $subacribeUserLatest = SubscribeUser::orderBy('created_at','DESC')->first();
            if($subacribeUserLatest){
                $subscribeUserId = $subacribeUserLatest->member_id;
            }else{
                $subscribeUserId = 1;
            }
            $currentSubscribeUserId = str_pad($subscribeUserId + 1, 6, "0", STR_PAD_LEFT);

            $data['member_id'] = $currentSubscribeUserId;
            $data['password'] = bcrypt($request->password);
            $data['slug'] = Session::get('hgs_usersub_data')['slug'];
            $data['member_plan'] = Session::get('hgs_usersub_data')['member_plan'];
            $data['profile_img'] = Session::get('hgs_usersub_img')?Session::get('hgs_usersub_img'):null;
            $data['status'] = 1;
            $data['duration'] = Session::get('duration')?Session::get('duration'):null;
            $data['started_at'] = Carbon::today();
            //return $data;
            SubscribeUser::create($data);
            if(Session::has('hgs_usersub_img')){
                SubscriberImage::where('id',Session::get('hgs_usersub_img_id'))->update([
                    'status' => 1,
                ]);
            }
            $fName =Session::get('hgs_usersub_data')['fname'];
            $mName = (Session::get('hgs_usersub_data')['mname'])?'-'.Session::get('hgs_usersub_data')['mname']:null;
            $lName = (Session::get('hgs_usersub_data')['lname'])?'-'.Session::get('hgs_usersub_data')['lname']:null;
            $fullName = $fName.$mName.$lName.'-'.rand(12,90);
            $mailData = [
                'heading' => 'Dear '.$fullName,
                'body' => 'Welcome to '. str_replace('_',' ', env("APP_NAME")) .'. Your subscription has been registered! You can login your profile now. Thank you.',
            ];
            Mail::to(Session::get('hgs_usersub_data')['email'])->queue(new SubscribeRegisterUserNotification($mailData));

            Session::forget('hgs_payment_type');
            Session::forget('hgs_subscribe_plan');
            Session::forget('hgs_usersub_data');
            Session::forget('hgs_usersub_total');
            Session::forget('hgs_usersub_img');
            Session::forget('hgs_usersub_img_id');
            return redirect('/')->with('message','Your account has been created successfully! Thank You.');
        }else{
            return redirect('/register-plan')->with('error','Invalid Register Plan');
        }
    }

    public function subscribePaymentPage()
    {
        if(Session::has('hgs_payment_type')){
            if(Session::get('hgs_payment_type') == 'subscribe-renew'){
                return view('website.subscribe-user-profile.subscribe-payment-system');
            }else{
                if(Session::has('hgs_usersub_data') && Session::has('hgs_usersub_total')){
                    return view('website.subscribe-user-profile.subscribe-payment-system');
                }else{
                    return redirect('/register-plan')->with('error','Session expired, please try again');
                }
            }
        }else{

            return redirect('/')->with('error','Session expired, please try again');
        }
    }

    public function subscribePayment(Request $request){
        if(Session::has('hgs_payment_type')){
            if(Session::get('hgs_payment_type') == 'subscribe-renew'){
                $request->validate([
                    'payment_method' => 'required|in:paypal,card',
                ]);

                if($request->payment_method == 'paypal'){
                    $url = $this->callPaypalApi(Session::get('hgs_usersub_total'));
                    return redirect($url);
                }else if($request->payment_method == 'card'){
                    $d_b_card = $this->callDebitCraditCardApi($request, Session::get('hgs_usersub_total'));
                    if($d_b_card == 'Success'){
                        if(Session::has('hgs_payment_type') && Session::get('hgs_payment_type') == 'subscribe'){
                            $fName =Session::get('hgs_usersub_data')['fname'];
                            $mName = (Session::get('hgs_usersub_data')['mname'])?'-'.Session::get('hgs_usersub_data')['mname']:null;
                            $lName = (Session::get('hgs_usersub_data')['lname'])?'-'.Session::get('hgs_usersub_data')['lname']:null;
                            $fullName = $fName.$mName.$lName.'-'.rand(12,90);
                            $mailData = [
                                'heading' => 'Dear '.$fullName,
                                'body' => 'Welcome to '. str_replace('_',' ', env("APP_NAME")) .'. Your subscription has been registered! You can login your profile now. Thank you.',
                            ];
                            Mail::to(Session::get('hgs_usersub_data')['email'])->queue(new SubscribeRegisterUserNotification($mailData));

                            Session::forget('hgs_payment_type');
                            Session::forget('hgs_subscribe_plan');
                            Session::forget('hgs_usersub_data');
                            Session::forget('hgs_usersub_total');
                            Session::forget('hgs_usersub_img');
                            Session::forget('hgs_usersub_img_id');
                            return \redirect(route('membership.login'))->with('message', 'Your subscription has been registered! You can login your profile now. Thank you.');
                        }else{
                            $user = Auth::guard('subscriber')->user();
                            $fName =$user->fname;
                            $mName = ($user->mname)?'-'.$user->mname:null;
                            $lName = ($user->lname)?'-'.$user->lname:null;
                            $fullName = $fName.$mName.$lName.'-'.rand(12,90);
                            $mailData = [
                                'heading' => 'Dear '.$fullName,
                                'body' => 'Welcome to '. str_replace('_',' ', env("APP_NAME")) .'. Your subscription has been renewed! You can check your profile now. Thank you.',
                            ];
                            Mail::to($user->email)->queue(new SubscribeRegisterUserNotification($mailData));

                            Session::forget('hgs_payment_type');
                            Session::forget('hgs_subscribe_plan');
                            Session::forget('hgs_usersub_data');
                            Session::forget('hgs_usersub_total');
                            Session::forget('hgs_usersub_img');
                            Session::forget('hgs_usersub_img_id');
                            return \redirect(route('subscribe-user-profile.index'))->with('message', 'Your subscription has been renewed ! Thank you.');
                        }

                    }else if($d_b_card == 'Fail'){
                        return \redirect()->back()->withInput($request->input())->with('invalid_card','Invalid card details');
                    }else{
                        return \redirect()->back();
                    }
                }
            }else{
                if(Session::has('hgs_usersub_data') && Session::has('hgs_usersub_total')){
                    $request->validate([
                        'payment_method'            => 'required|in:paypal,card',
                    ]);

                    if($request->payment_method == 'paypal'){
                        $url = $this->callPaypalApi(Session::get('hgs_usersub_total'));
                        return redirect($url);
                    }else if($request->payment_method == 'card'){
                        $d_b_card = $this->callDebitCraditCardApi($request, Session::get('hgs_usersub_total'));
                        if($d_b_card == 'Success'){
                            return \redirect(route('successs-card-payment'))->with('success','success');
                        }else if($d_b_card == 'Fail'){
                            return \redirect()->back()->withInput($request->input())->with('invalid_card','Invalid card details');
                        }else{
                            return \redirect()->back();
                        }
                    }
                }else{
                    return redirect('/register-plan')->with('error','Session expired, please try again');
                }
            }
        }else{
            return redirect('/')->with('error','Session expired, please try again');
        }

    }

    public function subscribeRenew(Request $request){
        $request->validate([
            'plan' => 'required|min:0',
        ]);
        $renewPlan = $request->plan;
        $priceList = PricingList::find($renewPlan);
        if($priceList){
            Session::put('hgs_payment_type' , 'subscribe-renew');
            Session::put('hgs_subscribe_plan' , $request->plan);
            Session::put('hgs_usersub_total' , $priceList->price);
            return \redirect(route('subscribe-user-profile-payment-page'));
        }else if($request->plan == 0){
            $user = Auth::guard('subscriber')->user();
            $user->update([
                'member_plan' => 'Free',
                'duration' => null,
                'started_at' => Carbon::today(),
            ]);
            $user = Auth::guard('subscriber')->user();
            $fName =$user->fname;
            $mName = ($user->mname)?'-'.$user->mname:null;
            $lName = ($user->lname)?'-'.$user->lname:null;
            $fullName = $fName.$mName.$lName.'-'.rand(12,90);
            $mailData = [
                'heading' => 'Dear '.$fullName,
                'body' => 'Welcome to '. str_replace('_',' ', env("APP_NAME")) .'. Your subscription has been renewed! You can check your profile now. Thank you.',
            ];

            Mail::to($user->email)->queue(new SubscribeRegisterUserNotification($mailData));
            return redirect(route('subscribe-user-profile'))->with('message', 'Your subscription has been renewed ! Thank you.');
            Session::forget('hgs_payment_type');
            Session::forget('hgs_subscribe_plan');
            Session::forget('hgs_usersub_data');
            Session::forget('hgs_usersub_total');
            Session::forget('hgs_usersub_img');
            Session::forget('hgs_usersub_img_id');
        }else{
            return redirect(route('subscribe-user-profile'))->with('error', 'Wrong Input');
        }

    }

    public function callPaypalApi($total){
        $payer = new Payer();
		$payer->setPaymentMethod("paypal");

		$item1 = new Item();
		$item1->setName('Subscription')
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
            if(Session::has('hgs_payment_type') && Session::get('hgs_payment_type') == 'subscribe'){
                $this->createProfileForPaidUser();
            }else{
                $this->createProfileForRenewUser();
            }
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
        if(Session::has('hgs_payment_type')){
            $paymentId = request('paymentId');
            $payment = Payment::get($paymentId, $this->apiContext);

            $execution = new PaymentExecution();
            $execution->setPayerId(request('PayerID'));

            $transaction = new Transaction();
            $amount = new Amount();
            $details = new Details();

            //return Session::get('hgs_usersub_total');
            $details->setShipping(0.0)
                ->setTax(0.0)
                ->setSubtotal(Session::get('hgs_usersub_total'));

            $amount->setCurrency('USD');
            $amount->setTotal(Session::get('hgs_usersub_total'));
            $amount->setDetails($details);
            $transaction->setAmount($amount);

            $execution->addTransaction($transaction);
            $result = $payment->execute($execution, $this->apiContext);
            if(Session::has('hgs_payment_type') && Session::get('hgs_payment_type') == 'subscribe'){
                $this->createProfileForPaidUser();

                $fName =Session::get('hgs_usersub_data')['fname'];
                $mName = (Session::get('hgs_usersub_data')['mname'])?'-'.Session::get('hgs_usersub_data')['mname']:null;
                $lName = (Session::get('hgs_usersub_data')['lname'])?'-'.Session::get('hgs_usersub_data')['lname']:null;
                $fullName = $fName.$mName.$lName.'-'.rand(12,90);
                $mailData = [
                    'heading' => 'Dear '.$fullName,
                    'body' => 'Welcome to '. str_replace('_',' ', env("APP_NAME")) .'. Your subscription has been registered! You can login your profile now. Thank you.',
                ];
                Mail::to(Session::get('hgs_usersub_data')['email'])->queue(new SubscribeRegisterUserNotification($mailData));

                Session::forget('hgs_payment_type');
                Session::forget('hgs_subscribe_plan');
                Session::forget('hgs_usersub_data');
                Session::forget('hgs_usersub_total');
                Session::forget('hgs_usersub_img');
                Session::forget('hgs_usersub_img_id');
                return \redirect(route('membership.login'))->with('message', 'Your subscription has been registered! You can login your profile now. Thank you.');
            }else{
                $this->createProfileForRenewUser();

                $user = Auth::guard('subscriber')->user();
                $fName =$user->fname;
                $mName = ($user->mname)?'-'.$user->mname:null;
                $lName = ($user->lname)?'-'.$user->lname:null;
                $fullName = $fName.$mName.$lName.'-'.rand(12,90);
                $mailData = [
                    'heading' => 'Dear '.$fullName,
                    'body' => 'Welcome to '. str_replace('_',' ', env("APP_NAME")) .'. Your subscription has been renewed! You can check your profile now. Thank you.',
                ];
                Mail::to($user->email)->queue(new SubscribeRegisterUserNotification($mailData));

                Session::forget('hgs_payment_type');
                Session::forget('hgs_subscribe_plan');
                Session::forget('hgs_usersub_data');
                Session::forget('hgs_usersub_total');
                Session::forget('hgs_usersub_img');
                Session::forget('hgs_usersub_img_id');
                return \redirect(route('subscribe-user-profile.index'))->with('message', 'Your subscription has been renewed ! Thank you.');
            }
            //return 'Success';
        }else{
            return redirect('/')->with('message','Session expired, please try again.');
        }


       // $this->createProfileForPaidUser();


    }
    public function CancelCardPayment(Request $request)
    {
        Session::forget('hgs_payment_type');
        Session::forget('hgs_subscribe_plan');
        Session::forget('hgs_usersub_data');
        Session::forget('hgs_usersub_total');
        Session::forget('hgs_usersub_img');
        Session::forget('hgs_usersub_img_id');
        $cancel = $request->cancel;
        return view('website.payment-cancel',compact('cancel'));
    }

    public function SuccessCardPayment()
    {
        if(Session::has('hgs_payment_type') && Session::get('hgs_payment_type') == 'subscribe'){
            $fName =Session::get('hgs_usersub_data')['fname'];
            $mName = (Session::get('hgs_usersub_data')['mname'])?'-'.Session::get('hgs_usersub_data')['mname']:null;
            $lName = (Session::get('hgs_usersub_data')['lname'])?'-'.Session::get('hgs_usersub_data')['lname']:null;
            $fullName = $fName.$mName.$lName.'-'.rand(12,90);
            $mailData = [
                'heading' => 'Dear '.$fullName,
                'body' => 'Welcome to '. str_replace('_',' ', env("APP_NAME")) .'. Your subscription has been registered! You can login your profile now. Thank you.',
            ];
            Mail::to(Session::get('hgs_usersub_data')['email'])->queue(new SubscribeRegisterUserNotification($mailData));

            Session::forget('hgs_payment_type');
            Session::forget('hgs_subscribe_plan');
            Session::forget('hgs_usersub_data');
            Session::forget('hgs_usersub_total');
            Session::forget('hgs_usersub_img');
            Session::forget('hgs_usersub_img_id');
            return \redirect(route('membership.login'))->with('message', 'Subscription has been registered! You can login your profile now. Thank you.');
        }else{
            $user = Auth::guard('subscriber')->user();
            $fName =$user->fname;
            $mName = ($user->mname)?'-'.$user->mname:null;
            $lName = ($user->lname)?'-'.$user->lname:null;
            $fullName = $fName.$mName.$lName.'-'.rand(12,90);
            $mailData = [
                'heading' => 'Dear '.$fullName,
                'body' => 'Welcome to '. str_replace('_',' ', env("APP_NAME")) .'. Your subscription has been renewed! You can check your profile now. Thank you.',
            ];
            Mail::to($user->email)->queue(new SubscribeRegisterUserNotification($mailData));

            Session::forget('hgs_payment_type');
            Session::forget('hgs_subscribe_plan');
            Session::forget('hgs_usersub_data');
            Session::forget('hgs_usersub_total');
            Session::forget('hgs_usersub_img');
            Session::forget('hgs_usersub_img_id');
            return \redirect(route('subscribe-user-profile.index'))->with('message', 'Subscription has been renewed ! Thank you.');
        }
    }


    public function createProfileForPaidUser(){
        SubscribeUser::create([
            'member_id' => Session::get('hgs_usersub_data')['member_id'],
            'fname' => Session::get('hgs_usersub_data')['fname'],
            'mname' => Session::get('hgs_usersub_data')['mname'],
            'lname' => Session::get('hgs_usersub_data')['lname'],
            'slug' => Session::get('hgs_usersub_data')['slug'],
            'phone' => Session::get('hgs_usersub_data')['phone'],
            'yearOfBirth' => Session::get('hgs_usersub_data')['yearOfBirth'],
            'email' => Session::get('hgs_usersub_data')['email'],
            'password' => Session::get('hgs_usersub_data')['password'],
            'member_plan' => Session::get('hgs_usersub_data')['member_plan'],
            'usa_address' => Session::get('hgs_usersub_data')['usa_address'],
            'city' => Session::get('hgs_usersub_data')['city'],
            'state' => Session::get('hgs_usersub_data')['state'],
            'zipcode' => Session::get('hgs_usersub_data')['zipcode'],
            'country' => Session::get('hgs_usersub_data')['country'],
            'facebook' => Session::get('hgs_usersub_data')['facebook'],
            'twitter' => Session::get('hgs_usersub_data')['twitter'],
            'other_social' => Session::get('hgs_usersub_data')['other_social'],
            'information' => Session::get('hgs_usersub_data')['information'],
            'profile_img' => Session::get('hgs_usersub_img')?Session::get('hgs_usersub_img'):null,
            'status' => 1,
            'duration' => Session::get('hgs_usersub_data')['duration'],
            'started_at' => Carbon::today(),
        ]);
        if(Session::has('hgs_usersub_img_id')){
            SubscriberImage::where('id',Session::get('hgs_usersub_img_id'))->update([
                'status' => 1,
            ]);
        }
    }

    public function createProfileForRenewUser(){
        $priceList = PricingList::find(Session::get('hgs_subscribe_plan'));
        $user = Auth::guard('subscriber')->user();
        $user->update([
            'member_plan' => $priceList->slug,
            'duration' => $priceList->duration,
            'started_at' => Carbon::today(),
        ]);
    }
}
