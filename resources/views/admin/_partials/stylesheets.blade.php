<title>{{ str_replace('_', ' ', config('app.name')) }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta charset="utf-8" />
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<meta content="Admin Dashboard" name="description" />
<meta content="ThemeDesign" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

@if ($g_about_us->favicon_icon)
    <link rel="shortcut icon" href="{{ asset($g_about_us->favicon_icon) }}">
@else
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/dashboard-image.png') }}">
@endif

<!-- Laravel Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">z




<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('assets/toastr/css/toastr.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/main.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/font-face.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet">
<script src="{{asset('assets/sweet-alert.min.js')}}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

