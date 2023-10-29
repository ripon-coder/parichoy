@if (Session::has('message'))
	<div class="alert alert-success" role="alert">
		<strong>Success:</strong> {{Session::get('message')}}
	</div>
@elseif(Session::has('error'))
	<div class="alert alert-danger" role="alert">
		<strong>Error:</strong> {{Session::get('error')}}
	</div>
@endif



@if ($errors->any())
    <div class="alert alert-danger mt-1 common-message-section">
        <ul class="m-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif