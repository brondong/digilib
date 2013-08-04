<div class="text-center">
{{-- ada pengguna --}}
@if(count($admin))
	<table class="table table-bordered table-hover">
		<thead>
			<th>{{ Form::checkbox('all', 0, false, array('id' => 'all', 'onclick' => 'ceklis(this)')) }}</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Dibuat</th>
			<th>Diupdate</th>
			<th>Aksi</th>
		</thead>
		<tbody>	
			@foreach($admin as $data)
				<tr>
					<td class="tengah">
						{{ ($data->id != Auth::user()->id) ? Form::checkbox('id-pengguna', $data->id, false, array('class' => 'id-pengguna')) : '' }}
					</td>
					<td class="rata">{{{ $data->nama }}}</td>
					<td class="tengah">{{{ $data->username }}}</td>
					<td class="tengah">{{{ date('d-m-Y H:i:s', strtotime($data->created_at)) }}}</td>
					<td class="tengah">{{{ date('d-m-Y H:i:s', strtotime($data->updated_at)) }}}</td>
					<td class="tengah">
						<div class="btn-group">
							{{ ($data->id != Auth::user()->id) ? Form::button('<i class="icon-pencil"></i>', array('class' => 'btn btn-small tip', 'onclick' => "modalRubahPengguna($data->id)", 'title' => 'Rubah')) : '' }}
							{{ Form::button('<i class="icon-picture"></i>', array('class' => 'btn btn-small tip', 'onclick' => "modalLihatPengguna($data->id)", 'title' => 'Foto')) }}
							{{ ($data->id != Auth::user()->id) ? Form::button('<i class="icon-trash"></i>', array('class' => 'btn btn-small tip', 'onclick' => "modalHapusPengguna($data->id)", 'title' => 'Hapus')) : '' }}
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ str_replace('href', 'data-target', $admin->links()) }}

	<div class="btn-group">
		{{ Form::button('<i class="icon-file"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'PDFPengguna()', 'title' => 'PDF')) }}
		{{ Form::button('<i class="icon-plus"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'modalTambahPengguna()', 'title' => 'Tambah')) }}
		{{ Form::button('<i class="icon-remove"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'modalHapusCeklisPengguna()', 'title' => 'Hapus')) }}
		{{ Form::button('<i class="icon-th-large"></i>', array('class' => 'btn btn-small tip', 'onclick' => 'excelPengguna()', 'title' => 'Excel')) }}
	</div>

{{-- tidak ada pengguna --}}
@else
	<div class="alert kosong">
		<strong>Peringatan!</strong> Belum ada data pengguna yang tersimpan di basis data.
	</div>

	<div id="jarak"></div>

	<div class="btn-group">
		{{ Form::button('<i class="icon-plus"></i>', array('class' => 'btn', 'onclick' => 'modalTambahPengguna()')) }}
	</div>
@endif
</div>