<div class="text-center">
	<div class="form-inline formulir text-right">
		<span class="control-group" id="control-urut-siswa">
			{{ Form::label('urut-siswa', 'Urutkan', array('class' => 'control-label')) }}
			<span class="controls">
				{{ Form::select('kolom-siswa', array(
					'nis' => 'NIS', 'nama' => 'Nama', 'kelas' => 'Kelas', 'telp' => 'Telp', 'alamat' => 'Alamat'
					), $kolom, array('id' => 'kolom-siswa', 'onchange' =>'urutSiswa()'));
				}}
			</span>
		</span>
			<span class="controls">
				{{ Form::select('tipe-siswa', array('asc' => 'Ascending', 'desc' => 'Descending'), $tipe, array('id' => 'tipe-siswa', 'onchange' =>'urutSiswa()')); }}
			</span>

		<span class="control-group" id="control-cari-siswa">
			{{ Form::label('cari-siswa', 'Cari', array('class' => 'control-label')) }}
			<span class="controls input-append">
				<select name="cari-siswa" class="type" id="cari-siswa" maxlength="50" placeholder="Ketikkan nama siswa...">
					<option></option>
					@foreach($nama as $data)
						<option value="{{ $data->nama }}">{{ $data->nama }}</option>
					@endforeach
				</select>
				{{ Form::button('<i class="icon-search"></i>', array('class' => 'btn', 'onclick' => 'cariSiswa()')) }}
			</span>
		</span>
	</div>

	<table class="table table-bordered table-hover">
		<thead>
			<th>{{ Form::checkbox('all', 0, false, array('id' => 'all', 'onclick' => 'ceklis(this)')) }}</th>
			<th>NIS</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>Telp</th>
			<th>Alamat</th>
			<th>Aksi</th>
		</thead>
		<tbody>	
			@foreach($siswa as $data)
				<tr>
					<td class="tengah">{{ Form::checkbox('id-siswa', $data->id, false, array('class' => 'id-siswa')) }}</td>
					<td class="tengah">{{{ $data->nis }}}</td>
					<td class="rata">{{{ $data->nama }}}</td>
					<td class="tengah">{{{ $data->kelas }}}</td>
					<td class="tengah">{{{ ($data->telp) ?: '-' }}}</td>
					<td class="{{ ($data->alamat) ? 'rata' : 'tengah' }}">{{{ ($data->alamat) ?: '-' }}}</td>
					<td class="tengah">
						<div class="btn-group">
							{{ Form::button('<i class="icon-pencil"></i>', array('class' => 'btn btn-small tip', 'onclick' => "modalRubahSiswa($data->id)", 'title' => 'Rubah')) }}
							{{ Form::button('<i class="icon-picture"></i>', array('class' => 'btn btn-small tip', 'onclick' => "modalLihatSiswa($data->id)", 'title' => 'Foto')) }}
							{{ Form::button('<i class="icon-trash"></i>', array('class' => 'btn btn-small tip', 'onclick' => "modalHapusSiswa($data->id)", 'title' => 'Hapus')) }}
							{{ Form::button('<i class="icon-qrcode"></i>', array('class' => 'btn btn-small tip', 'onclick' => "modalQRCode($data->id)", 'title' => 'QRCode')) }}
							{{ Form::button('<i class="icon-bookmark"></i>', array('class' => 'btn btn-small tip', 'onclick' => "modalAnggota($data->id)", 'title' => 'Anggota')) }}
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ str_replace('href', 'data-target', $siswa->links()) }}

	<div class="btn-group">
		{{ Form::button('<i class="icon-file"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'PDFSiswa()', 'title' => 'PDF')) }}
		{{ Form::button('<i class="icon-plus"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'modalTambahSiswa()', 'title' => 'Tambah')) }}
		{{ Form::button('<i class="icon-remove"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'modalHapusCeklisSiswa()', 'title' => 'Hapus')) }}
		{{ Form::button('<i class="icon-th-large"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'excelSiswa()', 'title' => 'Excel')) }}
	</div>
</div>