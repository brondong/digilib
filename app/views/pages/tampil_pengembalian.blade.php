<div class="text-center">
	<div class="form-inline formulir text-right">
		<span class="control-group" id="control-urut-pengembalian">
			{{ Form::label('tampil-pengembalian', 'Tampilkan', array('class' => 'control-label')) }}
			<span class="controls">
				{{ Form::text('tanggal-awal', $awal, array('class' => 'tanggal', 'id' => 'tanggal-awal', 'onchange' =>'tampilPengembalian()', 'readonly' => 'readonly', 'placeholder' => 'Ketikkan tanggal awal...'));
				}}
			</span>
		</span>
			<span class="controls">
				{{ Form::text('tanggal-akhir', $akhir, array('class' => 'tanggal', 'id' => 'tanggal-akhir', 'onchange' =>'tampilPengembalian()', 'readonly' => 'readonly', 'placeholder' => 'Ketikkan tanggal akhir...'));
				}}
			</span>

		<span class="control-group" id="control-cari-pengembalian">
			{{ Form::label('cari-pengembalian', 'Cari', array('class' => 'control-label')) }}
			<span class="controls input-append">
				<select name="cari-pengembalian" class="type text-left" id="cari-pengembalian" maxlength="50" placeholder="Ketikkan nama siswa...">
					<option></option>
					@foreach($nama as $data)
						<option value="{{ $data->id_siswa }}">{{ $data->siswa->nama }}</option>
					@endforeach
				</select>
				{{ Form::button('<i class="icon-search"></i>', array('class' => 'btn', 'onclick' => 'cariPengembalian()')) }}
			</span>
		</span>
	</div>

{{-- ada kembali --}}
@if(count($kembali))
	<table class="table table-bordered table-hover">
		<thead>
			<th>Judul</th>
			<th>Nama</th>
			<th>Jumlah</th>
			<th>Pinjam</th>
			<th>Kembali</th>
		</thead>
		<tbody>	
			@foreach($kembali as $data)
				<tr>
					<td class="rata">{{{ $data->buku->judul }}}</td>
					<td class="rata">{{{ $data->siswa->nama }}}</td>
					<td class="tengah">{{{ $data->jumlah }}}</td>
					<td class="tengah">{{{ date('d-m-Y', strtotime($data->pinjam)) }}}</td>
					<td class="tengah">{{{ date('d-m-Y', strtotime($data->kembali)) }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ str_replace('href', 'data-target', $kembali->links()) }}

{{-- tidak ada kembali --}}
@else
	<div class="alert kosong">
		<strong>Peringatan!</strong> Data pengembalian yang anda inginkan tidak ada.
	</div>

	<div id="jarak"></div>
@endif

	<div class="btn-group">
		{{ Form::button('<i class="icon-file"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'PDFPengembalian()', 'title' => 'PDF')) }}
		{{ Form::button('<i class="icon-th-large"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'excelPengembalian()', 'title' => 'Excel')) }}
	</div>
</div>