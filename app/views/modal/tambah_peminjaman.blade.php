<div class="modal-header">
	<h3>Tambah Peminjaman</h3>
</div>
<div class="modal-body">
	{{ Form::open(array('route' => 'tambah_peminjaman', 'class' => 'form-horizontal form-tambah-peminjaman')) }}
		<div class="control-group" id="control-buku">
			{{ Form::label('buku', 'Buku', array('class' => 'control-label')) }}
			<div class="controls">
				<select name="buku" class="type input-focus" placeholder="Ketikkan judul buku...">
					<option></option>
					@foreach($buku as $data)
						<option value="{{ $data->id }}">{{ $data->judul }}</option>
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
						<option value="{{ $data->id }}">{{ $data->nama }}</option>
					@endforeach
				</select>
				<span class="help-block" id="error-siswa"></span>
			</div>
		</div>

		<div class="control-group" id="control-jumlah">
			{{ Form::label('jumlah', 'Jumlah', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('jumlah', null, array( 'id' => 'jumlah', 'placeholder' => 'Ketikkan jumlah buku...')) }}
				<span class="help-block" id="error-jumlah"></span>
			</div>
		</div>

		<div class="control-group" id="control-peminjaman">
			{{ Form::label('peminjaman', 'Peminjaman', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('peminjaman', null, array( 'class' => 'tanggal', 'id' => 'peminjaman', 'readonly' => 'readonly', 'placeholder' => 'Ketikkan tanggal peminjaman...')) }}
				<span class="help-block" id="error-peminjaman"></span>
			</div>
		</div>

		<div class="control-group" id="control-pengembalian">
			{{ Form::label('pengembalian', 'Pengembalian', array('class' => 'control-label', 'onclick' => 'tanggal(this)')) }}
			<div class="controls">
				{{ Form::text('pengembalian', null, array('class' => 'tanggal',  'id' => 'pengembalian', 'readonly' => 'readonly', 'placeholder' => 'Ketikkan tanggal pengembalian...')) }}
				<span class="help-block" id="error-pengembalian"></span>
			</div>
		</div>
</div>
<div class="modal-footer">
	{{ Form::button('Tambah', array('class' => 'btn btn-primary', 'onclick' => 'tambahPeminjaman()')) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
	{{ Form::close() }}
</div>