@extends('layouts.website')

@section('content')
	<!-- Common content Section Start -->
    @if($cancel == 'yes')
	<section class="common-content-section pt-4 pb-4">
		<div class="col-md-8 m-auto main-common-contents-wrapper">
            <div class="card">
                <div class="card-header">
                    PAYMENT CANCELED!
                </div>
                <div class="card-body">
                    <h5 class="card-title">OPPS!</h5>
                    <p class="card-text">Your payment has been canceled!</p>
                    <a href="{{route('home')}}" class="btn btn-info">Back To Home</a>
                </div>
              </div>
        </div>
    </section>
    @else
        <a id="hjsHomeUrl" href="{{route('home')}}" class="btn btn-info">Back To Home</a>
        <script>
            window.location.href = $('#hjsHomeUrl').attr('href');
        </script>
    @endif
	<!-- Common content Section End -->
@stop
