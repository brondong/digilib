<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>404</title>
	<link rel="icon" type="image/png" href="img/favicon.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	<div class="container text-center">
		<div class="konten">
			<h1>404</h1>

			<h2>Not Found</h2>

			<hr />

			<h3>Halaman yang anda minta tidak ditemukan.</h3>

			<br />

			<h5>Anda akan dialihkan ke halaman utama aplikasi.</h5>

			<br />

			<div class="progress">
				<div class="bar" style="width: 0%;"></div>
			</div>

			<br /><br /><br /><br /><br /><br /><br />

			<h6 class="text-right">Digilib | Digital Library</h6>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript">
		var url_home = '{{ route('home') }}';		

		var progress = setInterval(function() {
			var bar = $('.bar');

			if (bar.width() == 400) {
				$(location).prop('href', url_home);
			} else {
				bar.width(bar.width() + 80);
			}

			bar.text(bar.width() / 4 + "%");
		}, 800);
	</script>
</body>
</html>