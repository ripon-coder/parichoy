@extends('layouts.website')
@section('styles')
    <!-- Card style CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/card-style.css')}}">

    <!-- Loader style CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/loader.css')}}">

@endsection
@section('content')

<!-- General-memeber -->
<section class="committee-section">
    <div class="page-heading mb-0">
        <div class="container"><h5 class="m-0">Contribution</h5></div>
    </div>
    <div class="container">
        <!-- Row  start -->
        <div class="row justify-content-center committee-member-all-item-wrapper">
            <div class="col-md-7 m-auto">

                <div class="term-service">
                    <h3 class="mt-3">Contribute Us</h3>
                    <p>
                        New York-Bangladesh Press Club standing beside of Bangladeshi journalists and media professional for more than 14 years, providing advocacy, information and service to the New York.
                    </p>
                    <p>Please use the form below to pay securely through PayPal. All major credit cards as well as electronic check and bank wire are accepted.</p>

					<p>If you have any questions, comments, or concerns, please visit the contact page.<p>


                   <form action="{{ route('donation.payment') }}" method="post" id="paid-invoice-form">
                        @csrf
                        <div class="pb-2 pt-3 col-md-8 m-auto make-payment-amount">
                            <div class="c-field amount-wrapper mb-4">
                                <h2 class="payment-heading">Amount to Pay</h2>
                                <label class="c-field__label p-title" for="input13">$</label>
                                <input class="c-input user-input-total" id="input2" type="number" placeholder="" name="price" value="" required step="1">
                                <p class="amnt-error"></p>
                            </div>
                        </div>

                        <div class="col-md-8 m-auto make-payment-page" id="paidInvoice">
                            @if(Session::has('invalid_card'))
                                <div class="invalid-card-message mb-3">
                                    <script>
                                        toastr.error('{{Session::get('invalid_card')}}');
                                    </script>
                                    <h4 class="text-danger">{{ Session::get('invalid_card') }}!</h4>
                                </div>
                            @endif
                            <input type="hidden" name="id" value="0">
                            <input type="hidden" name="current_url" value="{{ url()->current() }}">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <h2 class="payment-heading mb-3">Payment Details</h2>
                                    <div class="c-choice c-choice--radio c-field">
                                        <div class="input-wrapper">
                                            <input class="c-choice__input choose-payment-method" id="radio1" name="payment_method" type="radio" value="paypal" checked>
                                            <label class="c-choice__label" for="radio1">Pay with Paypal</label>
                                        </div>
                                        <img src="https://www.app.uswebtax.com/crm/assets/img/paypal-p.png">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="c-choice c-choice--radio c-field">
                                    <div class="input-wrapper">
                                        <input class="c-choice__input choose-payment-method" id="radio2" name="payment_method" type="radio" value="card">
                                        <label class="c-choice__label" for="radio2">Pay with Debit & Credit Card</label>
                                    </div>
                                    <img src="https://www.app.uswebtax.com/crm/assets/img/card-p.png">
                                    </div>
                                </div>

                                <div class="row pt-2 px-0 col-md-12 hd-class">
                                    <div class="container preload col-md-12">
                                        <div class="creditcard">
                                            <div class="front">
                                                <div id="ccsingle"></div>
                                                <svg version="1.1" id="cardfront" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 750 471" style="enable-background: new 0 0 750 471;" xml:space="preserve">
                                                    <g id="Front">
                                                        <g id="CardBackground">
                                                            <g id="Page-1_1_">
                                                                <g id="amex_1_">
                                                                    <path
                                                                        id="Rectangle-1_1_"
                                                                        class="lightcolor grey"
                                                                        d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                                                                C0,17.9,17.9,0,40,0z"
                                                                    />
                                                                </g>
                                                            </g>
                                                            <path class="darkcolor greydark" d="M750,431V193.2c-217.6-57.5-556.4-13.5-750,24.9V431c0,22.1,17.9,40,40,40h670C732.1,471,750,453.1,750,431z" />
                                                        </g>
                                                        <text transform="matrix(1 0 0 1 60.106 295.0121)" id="svgnumber" class="st2 st3 st4">xxxx xxxx xxxx xxxx</text>
                                                        <text transform="matrix(1 0 0 1 54.1064 428.1723)" id="svgname" class="st2 st5 st6">Your Name</text>
                                                        <text transform="matrix(1 0 0 1 54.1074 389.8793)" class="st7 st5 st8">cardholder name</text>
                                                        <text transform="matrix(1 0 0 1 479.7754 388.8793)" class="st7 st5 st8">expiration</text>
                                                        <text transform="matrix(1 0 0 1 65.1054 241.5)" class="st7 st5 st8">card number</text>
                                                        <g>
                                                            <text transform="matrix(1 0 0 1 574.4219 433.8095)" id="svgexpire" class="st2 st5 st9">mm/yyyy</text>
                                                            <text transform="matrix(1 0 0 1 479.3848 417.0097)" class="st2 st10 st11">VALID</text>
                                                            <text transform="matrix(1 0 0 1 479.3848 435.6762)" class="st2 st10 st11">THRU</text>
                                                            <polygon class="st2" points="554.5,421 540.4,414.2 540.4,427.9    " />
                                                        </g>
                                                        <g id="cchip">
                                                            <g>
                                                                <path
                                                                    class="st2"
                                                                    d="M168.1,143.6H82.9c-10.2,0-18.5-8.3-18.5-18.5V74.9c0-10.2,8.3-18.5,18.5-18.5h85.3
                                                            c10.2,0,18.5,8.3,18.5,18.5v50.2C186.6,135.3,178.3,143.6,168.1,143.6z"
                                                                />
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <rect x="82" y="70" class="st12" width="1.5" height="60" />
                                                                </g>
                                                                <g>
                                                                    <rect x="167.4" y="70" class="st12" width="1.5" height="60" />
                                                                </g>
                                                                <g>
                                                                    <path
                                                                        class="st12"
                                                                        d="M125.5,130.8c-10.2,0-18.5-8.3-18.5-18.5c0-4.6,1.7-8.9,4.7-12.3c-3-3.4-4.7-7.7-4.7-12.3
                                                                c0-10.2,8.3-18.5,18.5-18.5s18.5,8.3,18.5,18.5c0,4.6-1.7,8.9-4.7,12.3c3,3.4,4.7,7.7,4.7,12.3
                                                                C143.9,122.5,135.7,130.8,125.5,130.8z M125.5,70.8c-9.3,0-16.9,7.6-16.9,16.9c0,4.4,1.7,8.6,4.8,11.8l0.5,0.5l-0.5,0.5
                                                                c-3.1,3.2-4.8,7.4-4.8,11.8c0,9.3,7.6,16.9,16.9,16.9s16.9-7.6,16.9-16.9c0-4.4-1.7-8.6-4.8-11.8l-0.5-0.5l0.5-0.5
                                                                c3.1-3.2,4.8-7.4,4.8-11.8C142.4,78.4,134.8,70.8,125.5,70.8z"
                                                                    />
                                                                </g>
                                                                <g>
                                                                    <rect x="82.8" y="82.1" class="st12" width="25.8" height="1.5" />
                                                                </g>
                                                                <g>
                                                                    <rect x="82.8" y="117.9" class="st12" width="26.1" height="1.5" />
                                                                </g>
                                                                <g>
                                                                    <rect x="142.4" y="82.1" class="st12" width="25.8" height="1.5" />
                                                                </g>
                                                                <g>
                                                                    <rect x="142" y="117.9" class="st12" width="26.2" height="1.5" />
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <g id="Back"></g>
                                                </svg>
                                            </div>
                                            <div class="back">
                                                <svg version="1.1" id="cardback" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 750 471" style="enable-background: new 0 0 750 471;" xml:space="preserve">
                                                    <g id="Front">
                                                        <line class="st0" x1="35.3" y1="10.4" x2="36.7" y2="11" />
                                                    </g>
                                                    <g id="Back">
                                                        <g id="Page-1_2_">
                                                            <g id="amex_2_">
                                                                <path
                                                                    id="Rectangle-1_2_"
                                                                    class="darkcolor greydark"
                                                                    d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                                                            C0,17.9,17.9,0,40,0z"
                                                                />
                                                            </g>
                                                        </g>
                                                        <rect y="61.6" class="st2" width="750" height="78" />
                                                        <g>
                                                            <path
                                                                class="st3"
                                                                d="M701.1,249.1H48.9c-3.3,0-6-2.7-6-6v-52.5c0-3.3,2.7-6,6-6h652.1c3.3,0,6,2.7,6,6v52.5
                                                        C707.1,246.4,704.4,249.1,701.1,249.1z"
                                                            />
                                                            <rect x="42.9" y="198.6" class="st4" width="664.1" height="10.5" />
                                                            <rect x="42.9" y="224.5" class="st4" width="664.1" height="10.5" />
                                                            <path class="st5" d="M701.1,184.6H618h-8h-10v64.5h10h8h83.1c3.3,0,6-2.7,6-6v-52.5C707.1,187.3,704.4,184.6,701.1,184.6z" />
                                                        </g>
                                                        <text transform="matrix(1 0 0 1 621.999 227.2734)" id="svgsecurity" class="st6 st7">xxxx</text>
                                                        <g class="st8">
                                                            <text transform="matrix(1 0 0 1 518.083 280.0879)" class="st9 st6 st10">CVV</text>
                                                        </g>
                                                        <rect x="58.1" y="378.6" class="st11" width="375.5" height="13.5" />
                                                        <rect x="58.1" y="405.6" class="st11" width="421.7" height="13.5" />
                                                        <text transform="matrix(1 0 0 1 59.5073 228.6099)" id="svgnameback" class="st12 st13">Your Name</text>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-container col-md-12">
                                        <div class="field-container">
                                            <label for="name">Name on Card</label><br>
                                            <input class="form-control" id="name" maxlength="20" type="text" name="card_name"/>
                                        </div>
                                        <div class="field-container">
                                            <label for="cardnumber">Card Number</label><br>
                                            <input class="form-control c-input user-card-details" id="cardnumber" type="text" inputmode="numeric" name="card_number"/>
                                            <svg id="ccicon" class="ccicon" width="750" height="471" viewBox="0 0 750 471" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"></svg>
                                        </div>
                                        <div class="field-container">
                                            <label for="expirationdate">Expiration (mm/yyyy)</label><br>
                                            <input class="form-control" id="expirationdate" type="text" inputmode="numeric" name="expire_date"/>
                                        </div>
                                        <div class="field-container">
                                            <label for="securitycode">CVV</label>
                                            <span class="cvv-tooltip" data-toggle="tooltip" data-placement="top" title="The CVV Number ('Card Verification Value') on your credit card or debit card is a 3 digit number on VISA®, MasterCard® and Discover® branded credit and debit cards. On your American Express® branded credit or debit card it is a 4 digit numeric code.">
                                            <i class="fa fa-info-circle"></i>
                                            </span><br>
                                            <input class="form-control" id="securitycode" type="text" inputmode="numeric" name="cvv"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-0 ">
                                <div class="col-md-12 card-error-msg" style="display: none">
                                    <div class="c-field">
                                        <p style="color: #1bb934; font-size: 20px;line-height: 1.3;">Invalid Card Details</p>
                                    </div>
                                </div>
                                <div class="col-md-12 payment-success-msg" style="display: none">
                                    <div class="c-field">
                                        <p style="color: #1bb934; font-size: 20px;line-height: 1.3;">Payment Successfully Done! Thank You</p>
                                    </div>
                                </div>
                                <div class="col-md-12 pt-0 form-checkbox-radio-wrapper font-weight-normal">
                                    <input id="termsConditionAgreement" type="checkbox" name="" value="">
                                    <label for="termsConditionAgreement">I have read and agree to the <a href="{{ route('term-of-service') }}" target="_blank">Terms &amp; Conditions</a></label>
                                </div>

                                <div class="col-md-12 text-right mt-4 w-100">
                                    <button type="submit" class="btn btn-info checkout-submit-final">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>



                    <div id="loader"></div>

					<div class="text-center make-payment-image mb-5">
						<img src="{{ asset('/') }}assets/website/image/paypal.png">
					</div>

                </div>

            </div>

        </div>

    </div>
</section>
<!-- General-memeber -->
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('assets/website/js/imask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/website/js/payment-plugin.js')}}"></script>
    <script>
        $('.hd-class').hide();
        $(document).on('click','.choose-payment-method',function(){
            val = $(this).val();
            if(val == 'paypal'){
                $(".hd-class input").prop('required',false);
                $('.hd-class').hide('500');
            }else{
                $(".hd-class input").prop('required',true);
                $('.hd-class').show('500');
            }
        });
    </script>

    @if(Session::has('invalid_card'))
        <script>
            toastr.error('{{Session::get('invalid_card')}}');
        </script>
    @endif
@stop
