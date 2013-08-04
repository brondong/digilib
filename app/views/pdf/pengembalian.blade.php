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
		i {
			margin: 0 auto;
			text-align: center;
		}
	</style>
</head>
<body>
	<header class="text-center">
		<h2>{{{ $sekolah->nama }}}</h2>
		<h2>DATA PENGEMBALIAN</h2>
		<h4>{{{ $sekolah->alamat }}}</h4>
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