<div class="text-center">
	<div class="form-inline formulir text-right">
		<span class="control-group" id="control-urut-buku">
			{{ Form::label('urut-buku', 'Urutkan', array('class' => 'control-label')) }}
			<span class="controls">
				{{ Form::select('kolom-buku', array(
					'judul' => 'Judul', 'penulis' => 'Penulis', 'penerbit' => 'Penerbit', 'tahun' => 'Tahun', 'jumlah' => 'Jumlah'
					), $kolom, array('id' => 'kolom-buku', 'onchange' =>'urutBuku()'));
				}}
			</span>
		</span>
			<span class="controls">
				{{ Form::select('tipe-buku', array('asc' => 'Ascending', 'desc' => 'Descending'), $tipe, array('id' => 'tipe-buku', 'onchange' =>'urutBuku()')); }}
			</span>

		<span class="control-group" id="control-cari-buku">
			{{ Form::label('cari-buku', 'Cari', array('class' => 'control-label')) }}
			<span class="controls input-append">
				<select name="cari-buku" class="type" id="cari-buku" maxlength="100" placeholder="Ketikkan judul buku...">
					<option></option>
					@foreach($judul as $data)
						<option value="{{ $data->judul }}">{{ $data->judul }}</option>
					@endforeach
				</select>
				{{ Form::button('<i class="icon-search"></i>', array('class' => 'btn', 'onclick' => 'cariBuku()')) }}
			</span>
		</span>
	</div>

	<table class="table table-bordered table-hover">
		<thead>
			<th>{{ Form::checkbox('all', 0, false, array('id' => 'all', 'onclick' => 'ceklis(this)')) }}</th>
			<th>Judul</th>
			<th>Penulis</th>
			<th>Penerbit</th>
			<th>Tahun</th>
			<th>Jumlah</th>
			<th>Aksi</th>
		</thead>
		<tbody>	
			@foreach($buku as $data)
				<tr>
					<td class="tengah">{{ Form::checkbox('id-buku', $data->id, false, array('class' => 'id-buku')) }}</td>
					<td class="rata">{{{ $data->judul }}}</td>
					<td class="{{ ($data->penulis) ? 'rata' : 'tengah' }}">{{{ ($data->penulis) ?: '-' }}}</td>
					<td class="{{ ($data->penerbit) ? 'rata' : 'tengah' }}">{{{ ($data->penerbit) ?: '-' }}}</td>
					<td class="tengah">{{{ ($data->tahun > 0) ? $data->tahun : '-' }}}</td>
					<td class="tengah">{{{ number_format($data->jumlah, 0, ',', '.') }}}</td>
					<td class="tengah">
						<div class="btn-group">
							{{ Form::button('<i class="icon-pencil"></i>', array('class' => 'btn btn-small tip', 'onclick' => "modalRubahBuku($data->id)", 'title' => 'Rubah')) }}
							{{ Form::button('<i class="icon-picture"></i>', array('class' => 'btn btn-small tip', 'onclick' => "modalLihatBuku($data->id)", 'title' => 'Cover')) }}
							{{ Form::button('<i class="icon-trash"></i>', array('class' => 'btn btn-small tip', 'onclick' => "modalHapusBuku($data->id)", 'title' => 'Hapus')) }}
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ str_replace('href', 'data-target', $buku->links()) }}

	<div class="btn-group">
		{{ Form::button('<i class="icon-file"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'PDFBuku()', 'title' => 'PDF')) }}
		{{ Form::button('<i class="icon-plus"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'modalTambahBuku()', 'title' => 'Tambah')) }}
		{{ Form::button('<i class="icon-remove"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'modalHapusCeklisBuku()', 'title' => 'Hapus')) }}
		{{ Form::button('<i class="icon-th-large"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'excelBuku()', 'title' => 'Excel')) }}
	</div>
</div>