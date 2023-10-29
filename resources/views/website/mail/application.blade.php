<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apllication Mail</title>
</head>
<body>
<style>
	.wrapper{
		width: 600px;
		margin: 0 auto;
	}
	.logo {
	    background: #ccc;
	    margin-bottom: 30px;
	}
	.logo img {
	    display: block;
	    margin: 0 auto;
	    padding: 5px 0;
		max-width: 100%;
	}
	.footer {
	    text-align: center;
	    background: #ccc;
	    padding: 11px 0;
	    margin-top: 25px;
	}
</style>
	<div class="wrapper">
		<div class="logo">
			<img src="{{ asset('/') }}assets/logo/logo-01.png" alt="">
		</div>

	    Hi, Admin<br>

	    <p>Business Name: {{ $data['business_name'] }}</p>
	    <p>Owner Name: {{ $data['owner_name'] }}</p>

	
		@isset($data['general'])
			<p>Membership Category: {{ ucfirst($data['general']) }}</p>
		@endisset
		@isset($data['associate'])
			<p>Membership Category: {{ ucfirst($data['associate']) }}</p>
		@endisset
		@isset($data['life_member'])
			<p>Membership Category: {{ ucfirst($data['life_member']) }}</p>
		@endisset
	    <p>Full Name: {{ ucfirst($data['owner_name']) }}</p>
	    <p>Cell Phone: {{ $data['phone'] }}</p>
		@isset($data['telephone'])
			Telephone: {{ $data['telephone'] }}
		@endisset
		@isset($data['fax'])
			Fax: {{ $data['fax'] }}
		@endisset
	    <p>Email: {{ $data['email'] }}</p>
	    <p>Address: {{ $data['address'] }}</p>
	    <p>Country: {{ ucfirst($data['country']) }}</p>
	    <p>City: {{ ucfirst($data['city']) }}</p>
	    <p>State: {{ ucfirst($data['state']) }}</p>
	    <p>Zip Code: {{ $data['zipcode'] }}</p>
		@isset ($data['employers'])
			<p>Employers: {{ $data['employers'] }}</p>
		@endisset
		@isset ($data['experience'])
			<p>Exprience: {{ $data['experience'] }}</p>
		@endisset
		@isset ($data['position'])
			<p>Position: {{ $data['position'] }}</p>
		@endisset
		@isset ($data['website'])
			<p>Website: {{ $data['website'] }}</p>
		@endisset
		@isset ($data['facebook'])
			<p>Facebook: {{ $data['facebook'] }}</p>
		@endisset
		@isset ($data['twitter'])
			<p>Twitter: {{ $data['twitter'] }}</p>
		@endisset
		@isset ($data['instagram'])
			<p>Instagram: {{ $data['instagram'] }}</p>
		@endisset

		@isset ($data['linkedin'])
			<p>Linkedin: {{ $data['linkedin'] }}</p>
		@endisset
		@isset ($data['other_social'])
			<p>Other Social{{ $data['other_social'] }}</p>
		@endisset
		@isset ($data['information'])
			<p> Information: {{ $data['information'] }}</p>
		@endisset
		

	    Regard,<br>
		{{ $data['full_name'] }}


	    <div class="footer">&copy; {{ str_replace('_', ' ', config('app.name')) }}</a> {{date("Y")}}.</div>
	</div>


	@php
		exit();
	@endphp


</body>
</html>
