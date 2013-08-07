<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Login Admin</title>
	<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/messenger.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/future.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
</head>
<body>
	<div class="container login">
		<div class="form-horizontal form-login">
			<h1 class="text-center">Login Admin</h1>

			<div class="control-group" id="control-username">
				{{ Form::label('username', 'Username', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('username', null, array( 'id' => 'username', 'maxlength' => 20, 'placeholder' => 'Ketikkan username anda...')) }}
					<span class="help-block" id="error-username"></span>
				</div>
			</div>

			<div class="control-group" id="control-password">
				{{ Form::label('password', 'Password', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::password('password', array('id' => 'password', 'placeholder' => 'Ketikkan password anda...')) }}
					<span class="help-block" id="error-password"></span>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<label class="checkbox">
						{{ Form::checkbox('ingat', true, null, array('id' => 'ingat')) }} Ingat Saya
					</label>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					{{ Form::button('Login', array('class' => 'btn btn-info', 'onclick' => 'login()')) }}
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/underscore.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/backbone.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/messenger.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/future.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/script/login.js') }}"></script>
	<script type="text/javascript">
		var url_home = '{{ route('home') }}';
		var url_login = '{{ route('login') }}'; 
	</script>
</body>
</html>