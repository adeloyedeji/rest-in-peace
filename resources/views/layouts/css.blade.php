<!-- Favicon -->
<link href="{{ asset('img/favicon.ico') }}" rel="apple-touch-icon" type="image/png" sizes="144x144">
<link href="{{ asset('img/favicon.ico') }}" rel="apple-touch-icon" type="image/png" sizes="114x114">
<link href="{{ asset('img/favicon.ico') }}" rel="apple-touch-icon" type="image/png" sizes="72x72">
<link href="{{ asset('img/favicon.ico') }}" rel="apple-touch-icon" type="image/png">
<link href="{{ asset('img/favicon.ico') }}" rel="icon" type="image/png">
<link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon">
<!-- /Favicon -->

<!-- Global stylesheets -->
@if (!active('beneficiaries/search'))
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endif
<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
<!-- /Global stylesheets -->

@if(active('reports'))
<!-- Page css -->
<link type="text/css" rel="stylesheet" href="{{ asset('assets/icons/weather/weather-icons.min.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('assets/icons/weather/weather-icons-wind.min.css') }}">
<!-- /page css -->
@endif