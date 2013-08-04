<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<style type="text/css">
		body {
			background: #fff;
		}
		header {
			margin-bottom: 20px;
			border-bottom: 5px double #ddd;
		}
		h2, h4 {
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
		<h2>{{{ $sekolah->nama }}}</h2>
		<h2>DATA SISWA</h2>
		<h4>{{{ $sekolah->alamat }}}</h4>
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