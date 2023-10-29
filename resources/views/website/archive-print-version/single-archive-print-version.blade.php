@extends('layouts.website')
@section('content')
	<!-- Image Grid Start -->
	<section class="flip-book">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div class="m-auto text-center pb-4 pt-4">
                        <iframe class="w-75" height="400" src="{{ asset($archivePrintVersion->file) }}"></iframe>
                    </div>
                </div>
            </div>
		</div>
	</section>
	<!-- Image Grid End -->
@endsection

