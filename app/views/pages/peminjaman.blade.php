<div class="text-center">
{{-- ada pinjam --}}
@if(count($pinjam))
	<div class="form-inline formulir text-right">
		<span class="control-group" id="control-urut-peminjaman">
			{{ Form::label('tampil-peminjaman', 'Tampilkan', array('class' => 'control-label')) }}
			<span class="controls">
				{{ Form::text('tanggal-awal', null, array('class' => 'tanggal', 'id' => 'tanggal-awal', 'onchange' =>'tampilPeminjaman()', 'readonly' => 'readonly', 'placeholder' => 'Ketikkan tanggal awal...'));
				}}
			</span>
		</span>
			<span class="controls">
				{{ Form::text('tanggal-akhir', null, array('class' => 'tanggal', 'id' => 'tanggal-akhir', 'onchange' =>'tampilPeminjaman()', 'readonly' => 'readonly', 'placeholder' => 'Ketikkan tanggal akhir...'));
				}}
			</span>

		<span class="control-group" id="control-cari-peminjaman">
			{{ Form::label('cari-peminjaman', 'Cari', array('class' => 'control-label')) }}
			<span class="controls input-append">
				<select name="cari-peminjaman" class="type text-left" id="cari-peminjaman" maxlength="50" placeholder="Ketikkan nama siswa...">
					<option></option>
					@foreach($nama as $data)
						<option value="{{ $data->id_siswa }}">{{ $data->siswa->nama }}</option>
					@endforeach
				</select>
				{{ Form::button('<i class="icon-search"></i>', array('class' => 'btn', 'onclick' => 'cariPeminjaman()')) }}
			</span>
		</span>
	</div>

	<table class="table table-bordered table-hover">
		<thead>
			<th>{{ Form::checkbox('all', 0, false, array('id' => 'all', 'onclick' => 'ceklis(this)')) }}</th>
			<th>Judul</th>
			<th>Nama</th>
			<th>Jumlah</th>
			<th>Pinjam</th>
			<th>Kembali</th>
			<th>Status</th>
			<th>Aksi</th>
		</thead>
		<tbody>	
			@foreach($pinjam as $data)
				<tr>
					<td class="tengah">{{ Form::checkbox('id-peminjaman', $data->id, false, array('class' => 'id-peminjaman')) }}</td>
					<td class="rata">{{{ $data->buku->judul }}}</td>
					<td class="rata">{{{ $data->siswa->nama }}}</td>
					<td class="tengah">{{{ $data->jumlah }}}</td>
					<td class="tengah">{{{ date('d-m-Y', strtotime($data->pinjam)) }}}</td>
					<td class="tengah">{{{ date('d-m-Y', strtotime($data->kembali)) }}}</td>
					<td class="tengah"><i class="icon-{{ ($data->status > 0) ? 'ok' : 'minus' }}"></i></td>
					<td class="tengah">
						<div class="btn-group">
							{{ Form::button('<i class="icon-pencil"></i>', array('class' => 'btn btn-small tip', 'onclick' => "modalRubahPeminjaman($data->id)", 'title' => 'Rubah')) }}
							@if ($data->status == 1)
								{{ Form::button('<i class="icon-minus"></i>', array('class' => 'btn btn-small tip', 'onclick' => "belum($data->id)", 'title' => 'Belum Dikembalikan')) }}
							@else
								{{ Form::button('<i class="icon-ok"></i>', array('class' => 'btn btn-small tip', 'onclick' => "kembalikan($data->id, 1)", 'title' => 'Sudah Dikembalikan')) }}								
							@endif
							{{ Form::button('<i class="icon-trash"></i>', array('class' => 'btn btn-small tip', 'onclick' => "modalHapusPeminjaman($data->id)", 'title' => 'Hapus')) }}
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ str_replace('href', 'data-target', $pinjam->links()) }}

	<div class="btn-group">
		{{ Form::button('<i class="icon-file"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'PDFPeminjaman()', 'title' => 'PDF')) }}
		{{ Form::button('<i class="icon-plus"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'modalTambahPeminjaman()', 'title' => 'Tambah')) }}
		{{ Form::button('<i class="icon-remove"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'modalHapusCeklisPeminjaman()', 'title' => 'Hapus')) }}
		{{ Form::button('<i class="icon-th-large"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'excelPeminjaman()', 'title' => 'Excel')) }}
	</div>

{{-- tidak ada pinjam --}}
@else
	<div class="alert kosong">
		<strong>Peringatan!</strong> Belum ada data peminjaman yang tersimpan di basis data.
	</div>

	<div id="jarak"></div>

	<div class="btn-group">
		{{ Form::button('<i class="icon-plus"></i>', array('class' => 'btn', 'onclick' => 'modalTambahPeminjaman()')) }}
	</div>
@endif
</div>