<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>F.C.D.A. Portal | Login</title>

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="{{ asset('img/favicon.ico') }}" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="{{ asset('img/favicon.ico') }}" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="{{ asset('img/favicon.ico') }}" rel="apple-touch-icon" type="image/png">
	<link href="{{ asset('img/favicon.ico') }}" rel="icon" type="image/png">
	<link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon">
    <!-- /Favicon -->

    <!-- Global stylesheets -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- /Global stylesheets -->
</head>

<body>

	<div class="auth-container">
		<div class="center-block">
			<div class="auth-module">
				<div class="toggle">
					<!-- <i class="icon-user-plus"></i>
					<div class="tip">Click here to register</div> -->
				</div>

				<!-- Login form -->
				<div class="form">
					<h1 class="text-light">User Login</h1>

					<form class="form-horizontal" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
						<div class="form-group">

							<div class="input-group m-b-15 p-t-20">
							    <div class="input-group-addon"><i class="icon-user"></i></div>
							    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
							</div>

							<div class="input-group m-b-15">
							    <div class="input-group-addon"><i class="icon-key"></i></div>
							    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>

							<div class="form-check">
							    <label class="form-check-label">
							      <input class="styled" type="checkbox" id="remember" name="remember" checked="checked"> Remember me
							    </label>
							</div>

				  			<button class="btn btn-info btn-block m-t-20">Sign In</button>
						</div>
					</form>
				</div>
				<!-- /Login form -->

				<div class="forgot">
					<a href="auth_recover.html">Forgot your password?</a>
				</div>
			</div>
			<div class="footer">
				<div class="float-left">
                    &copy;  {{ date('Y') }} Federal Capital Development Authority&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;Powered by <a href="http://istrategytech.com/" target="_blank">Infostrategy Technologies</a>.
                </div>
				<div class="float-right">
					<div class="label label-info">Version: 2.0.0</div>
				</div>
			</div>
		</div>
	</div>

<!-- Global scripts -->
<script src="{{ asset('js/core/jquery/jquery.js') }}"></script>
<script src="{{ asset('js/core/jquery/jquery.ui.js') }}"></script>
<script src="{{ asset('js/core/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('js/tether.min.js') }}"></script>
<script src="{{ asset('js/core/hammer/hammerjs.js') }}"></script>
<script src="{{ asset('js/core/hammer/jquery.hammer.js') }}"></script>
<script src="{{ asset('js/core/slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('js/forms/uniform.min.js') }}"></script>
<script src="{{ asset('js/core/app/layouts.js') }}"></script>
<script src="{{ asset('js/core/app/core.js') }}"></script>
<!-- /Global scripts -->

<!-- Page scripts -->
<script src="{{ asset('js/pages/auth/authentication.js') }}"></script>
<!-- /Page scripts -->

</body>
</html>
