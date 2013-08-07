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
		<h3>DATA BUKU</h3>
		<h5>{{{ $sekolah->alamat }}}</h5>
	</header>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Penulis</th>
				<th>Penerbit</th>
				<th>Tahun</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<tbody>	
			<?php $i = 0; ?>
			@foreach($buku as $data)
				<?php $i++; ?>
				<tr>
					<td class="tengah">{{ $i }}</td>
					<td class="rata">{{{ $data->judul }}}</td>
					<td class="{{ ($data->penulis) ? 'rata' : 'tengah' }}">{{{ ($data->penulis) ?: '-' }}}</td>
					<td class="{{ ($data->penerbit) ? 'rata' : 'tengah' }}">{{{ ($data->penerbit) ?: '-' }}}</td>
					<td class="tengah">{{{ ($data->tahun > 0) ? $data->tahun : '-' }}}</td>
					<td class="tengah">{{{ number_format($data->jumlah, 0, ',', '.') }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>