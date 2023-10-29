@extends('layouts.website')
@section('content')

<!-- General-memeber -->

    <div class="page-heading">
        <div class="container"><h5 class="m-0">Privacy Policy</h5></div>
    </div>

<!-- General-memeber -->

    <section class="common-content-section pb-4">
        <div class="col-md-8 m-auto main-common-contents-wrapper pt-5">
            {!! str_replace('http://localhost/Global-Tax-Laravel/', asset('/'), $g_company_data->privacy_policy) !!}
        </div>
    </section>

@endsection
