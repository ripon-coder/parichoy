@extends('layouts.website')
@section('content')

    <div class="page-heading">
        <div class="container"><h5 class="m-0">Terms of Services</h5></div>
    </div>

    <!-- General-memeber -->

    <section class="common-content-section pb-4">
        <div class="col-md-8 m-auto main-common-contents-wrapper pt-5">
            {!! str_replace('http://localhost/Global-Tax-Laravel/', asset('/'), $g_company_data->terms_of_use) !!}
        </div>
    </section>

@endsection
