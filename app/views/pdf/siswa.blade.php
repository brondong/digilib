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
		<h3>DATA SISWA</h3>
		<h5>{{{ $sekolah->alamat }}}</h5>
	</header>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Telp</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
			@foreach($siswa as $data)
				<?php $i++; ?>
				<tr>
					<td class="tengah">{{ $i }}</td>
					<td class="tengah">{{{ $data->nis }}}</td>
					<td class="rata">{{{ $data->nama }}}</td>
					<td class="tengah">{{{ $data->kelas }}}</td>
					<td class="tengah">{{{ ($data->telp) ?: '-' }}}</td>
					<td class="{{ ($data->alamat) ? 'rata' : 'tengah' }}">{{{ ($data->alamat) ?: '-' }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>