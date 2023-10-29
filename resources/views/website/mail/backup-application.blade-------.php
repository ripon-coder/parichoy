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

	   <p> Subject : {{ $subject }}</p>
	    Hi, {{ $name }}<br>

	    <p>MemberShip Category:  {{ $membership_category }}</p>
	    <p>Genter: {{ $gender }}</p>
	    <p>Name: {{ $name }}</p>
	    <p>Email: {{ $email }}</p>
	    <p>Year Of Birth: {{ $yearOfBirth }}</p>
	    <p>address: {{ $address }}</p>
	    <p>city: {{ $city }}</p>
	    <p>state: {{ $city }}</p>
	    <p>zip: {{ $city }}</p>
	    <p>City: {{ $city }}</p>

	    Regard,<br>
	    {{ $name }}

	    <div class="footer">&copy; {{ str_replace('_', ' ', config('app.name')) }}</a> {{date("Y")}}.</div>
	</div>


</body>
</html>
