@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
	@include('admin._partials.page-title')
	<div class="demo-image">
		@if ($g_about_us->dashboard_image)
			<img src="{{ asset($g_about_us->dashboard_image) }}">
		@else
			<img src="{{ asset("/") }}assets/admin/images/dashboard-image.png">
		@endif
	</div>
	
</div>
@stop
