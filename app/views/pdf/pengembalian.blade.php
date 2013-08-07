<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
	<style type="text/css">
		body {
			background: #fff;
		}
		header {
			margin-bottom: 20px;
			border-bottom: 5px double #ddd;
		}
		h3, h5 {
			color: #333;
		}
		.table th, .table > tbody > .tengah {
			text-align: center;
		}
		thead {
			border-bottom: 1px solid #ddd;
		}
		td {
			text-align: justify;
			font-size: 12px;
		}
	</style>
</head>
<body>
	<header class="text-center">
		<?php
			$logo = ($sekolah->logo) ?: 'blank.png';
		?>

		<img src="{{ asset('foto/sekolah/' . $logo) }}" alt="" id="logo" />

		<h3>{{{ $sekolah->nama }}}</h3>
		<h3>DATA PENGEMBALIAN</h3>
		<h5>{{{ $sekolah->alamat }}}</h5>
	</header>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Judul</th>
				<th>Nama</th>
				<th>Jumlah</th>
				<th>Pinjam</th>
				<th>Kembali</th>
			</tr>
		</thead>
		<tbody>	
			@foreach($kembali as $data)
				<tr>
					<td>{{{ $data->buku->judul }}}</td>
					<td>{{{ $data->siswa->nama }}}</td>
					<td class="tengah">{{{ $data->jumlah }}}</td>
					<td class="tengah">{{{ date('d-m-Y', strtotime($data->pinjam)) }}}</td>
					<td class="tengah">{{{ date('d-m-Y', strtotime($data->kembali)) }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>