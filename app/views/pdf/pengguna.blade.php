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
		<h2>DATA PENGGUNA</h2>
		<h4>{{{ $sekolah->alamat }}}</h4>
	</header>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Dibuat</th>
				<th>Diupdate</th>
			</tr>
		</thead>
		<tbody>	
			<?php $i = 0; ?>
			@foreach($admin as $data)
				<?php $i++; ?>
				<tr>
					<td class="tengah">{{ $i }}</td>
					<td class="rata">{{{ $data->nama }}}</td>
					<td class="tengah">{{{ $data->username }}}</td>
					<td class="tengah">{{{  date('d-m-Y H:i:s', strtotime($data->created_at)) }}}</td>
					<td class="tengah">{{{  date('d-m-Y H:i:s', strtotime($data->updated_at)) }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>