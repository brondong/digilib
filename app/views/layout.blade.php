<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Home</title>
	<link rel="icon" type="image/png" href="img/favicon.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="css/messenger.css" />
	<link rel="stylesheet" type="text/css" href="css/future.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<style type="text/css">
		.table th, .table > tbody > .tengah {
			text-align: center;
		}
	</style>
</head>
<body>
	@include('menu')
	
	<div class="container">
		<div class="konten">
			<legend>Home</legend>
			
			<p>Selamat datang kembali, <strong><span class="user">{{ Auth::user()->nama }}</span></strong>.</p>

			<br />

			<p>Aplikasi ini dibuat untuk mempermudah sekolah dalam mengelola perpustakaan. Dilengkapi dengan modul buku, siswa, peminjaman, pengembalian dan grafik peminjaman serta utilitas basisdata. Dengan menggunakan aplikasi ini diharapkan proses pemonitoran perpustakaan sekolah dapat lebih efektif dan efisien.</p>

			<p>Selain dilengkapi modul-modul diatas aplikasi ini juga dirancang sesederhana mungkin agar mempermudah pengguna dalam menggunakan aplikasi ini.</p>

			<p>Jika ada pertanyaan yang ingin disampaikan anda dapat menghubungi saya melalui <a href="mailto:heru.rusdianto.93@gmail.com">Email</a>,
				<a href="https://facebook.com/heru.cimay" target="_blank">Facebook</a> ataupun <a href="https://twitter.com/HeruBrondong" target="_blank">Twitter</a> saya.</p>

			<br />

			<p>Terimakasih.</p>

			<br />

			<p class="text-right">Hormat saya, <strong>Heru.</strong></p>
		</div>
	</div>

	@include('footer')

	<div id="modal" class="modal hide fade" aria-hidden="true" data-backdrop="static"></div>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/datepicker.js"></script>
	<script type="text/javascript" src="js/datepicker.id.js"></script>
	<script type="text/javascript" src="js/form.js"></script>
	<script type="text/javascript" src="js/underscore.js"></script>
	<script type="text/javascript" src="js/backbone.js"></script>
	<script type="text/javascript" src="js/messenger.js"></script>
	<script type="text/javascript" src="js/future.js"></script>
	<script type="text/javascript" src="js/highcharts.js"></script>
	<script type="text/javascript" src="js/script/layout.js"></script>
	<script type="text/javascript" src="js/script/buku.js"></script>
	<script type="text/javascript" src="js/script/siswa.js"></script>
	<script type="text/javascript" src="js/script/peminjaman.js"></script>
	<script type="text/javascript" src="js/script/pengembalian.js"></script>
	<script type="text/javascript" src="js/script/grafik.js"></script>
	<script type="text/javascript" src="js/script/pengguna.js"></script>
	<script type="text/javascript" src="js/script/database.js"></script>

	@include('url')

</body>
</html>