<div class="modal-header">
	<h3>Rubah Peminjaman</h3>
</div>
<div class="modal-body">
	{{ Form::open(array('route' => array('rubah_peminjaman', $pinjam->id), 'class' => 'form-horizontal form-rubah-peminjaman')) }}
		<div class="control-group" id="control-buku">
			{{ Form::label('buku', 'Buku', array('class' => 'control-label')) }}
			<div class="controls">
				<select name="buku" class="type input-focus" placeholder="Ketikkan judul buku...">
					<option></option>
					@foreach($buku as $data)
						<option value="{{ $data->id }}" {{ ($data->id == $pinjam->id_buku) ? 'selected' : '' }}>{{ $data->judul }}</option>
					@endforeach
				</select>
				<span class="help-block" id="error-buku"></span>
			</div>
		</div>

		<div class="control-group" id="control-siswa">
			{{ Form::label('siswa', 'Siswa', array('class' => 'control-label')) }}
			<div class="controls">
				<select name="siswa" class="type" placeholder="Ketikkan nama siswa...">
					<option></option>
					@foreach($siswa as $data)
						<option value="{{ $data->id }}" {{ ($data->id == $pinjam->id_siswa) ? 'selected' : '' }}>{{ $data->nama }}</option>
					@endforeach
				</select>
				<span class="help-block" id="error-siswa"></span>
			</div>
		</div>

		<div class="control-group" id="control-jumlah">
			{{ Form::label('jumlah', 'Jumlah', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('jumlah', $pinjam->jumlah, array( 'id' => 'jumlah', 'placeholder' => 'Ketikkan jumlah buku...')) }}
				<span class="help-block" id="error-jumlah"></span>
			</div>
		</div>

		<div class="control-group" id="control-peminjaman">
			{{ Form::label('peminjaman', 'Peminjaman', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('peminjaman', date('d-m-Y', strtotime($pinjam->pinjam)), array( 'class' => 'tanggal', 'id' => 'peminjaman', 'readonly' => 'readonly', 'placeholder' => 'Ketikkan tanggal peminjaman...')) }}
				<span class="help-block" id="error-peminjaman"></span>
			</div>
		</div>

		<div class="control-group" id="control-pengembalian">
			{{ Form::label('pengembalian', 'Pengembalian', array('class' => 'control-label', 'onclick' => 'tanggal(this)')) }}
			<div class="controls">
				{{ Form::text('pengembalian', date('d-m-Y', strtotime($pinjam->kembali)), array('class' => 'tanggal',  'id' => 'pengembalian', 'readonly' => 'readonly', 'placeholder' => 'Ketikkan tanggal pengembalian...')) }}
				<span class="help-block" id="error-pengembalian"></span>
			</div>
		</div>
</div>
<div class="modal-footer">
	{{ Form::button('Simpan', array('class' => 'btn btn-primary', 'onclick' => 'rubahPeminjaman()')) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
	{{ Form::close() }}
</div>