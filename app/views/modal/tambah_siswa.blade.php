<div class="modal-header">
	<h3>Tambah Siswa</h3>
</div>
<div class="modal-body">
	{{ Form::open(array('route' => 'tambah_siswa', 'files' => true, 'class' => 'form-horizontal form-tambah-siswa')) }}
		<div class="control-group" id="control-foto">
			{{ Form::label('foto', 'Foto', array('class' => 'control-label')) }}
			<div class="controls">
				<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input"><i class="icon-picture fileupload-exists"></i> <span class="fileupload-preview"></span></div>
					<span class="btn btn-file">
						<span class="fileupload-new"><i class="icon-upload"></i></span>
						<span class="fileupload-exists"><i class="icon-edit"></i></span>
						{{ Form::file('foto', array('id' => 'foto')) }}
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload"><i class="icon-remove-circle"></i></a>
				</div>
			</div>
			<span class="help-block" id="error-foto"></span>
			</div>
		</div>

		<div class="control-group" id="control-nis">
			{{ Form::label('nis', 'NIS', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('nis', null, array( 'id' => 'nis', 'onkeypress' => 'enterTambahSiswa(event)', 'maxlength' => 10, 'class' => 'input-focus', 'placeholder' => 'Ketikkan nomor induk siswa...')) }}
				<span class="help-block" id="error-nis"></span>
			</div>
		</div>

		<div class="control-group" id="control-nama">
			{{ Form::label('nama', 'Nama', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('nama', null, array( 'id' => 'nama', 'onkeypress' => 'enterTambahSiswa(event)', 'maxlength' => 50, 'placeholder' => 'Ketikkan nama siswa...')) }}
				<span class="help-block" id="error-nama"></span>
			</div>
		</div>

		<div class="control-group" id="control-kelas">
			{{ Form::label('kelas', 'Kelas', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('kelas', null, array( 'id' => 'kelas', 'onkeypress' => 'enterTambahSiswa(event)', 'maxlength' => 10, 'placeholder' => 'Ketikkan kelas siswa...')) }}
				<span class="help-block" id="error-kelas"></span>
			</div>
		</div>

		<div class="control-group" id="control-telp">
			{{ Form::label('telp', 'Telp', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('telp', null, array( 'id' => 'telp', 'onkeypress' => 'enterTambahSiswa(event)', 'maxlength' => 15, 'placeholder' => 'Ketikkan telp siswa...')) }}
				<span class="help-block" id="error-telp"></span>
			</div>
		</div>

		<div class="control-group" id="control-alamat">
			{{ Form::label('alamat', 'Alamat', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::textarea('alamat', null, array( 'id' => 'alamat', 'rows' => 5, 'maxlength' => 255, 'placeholder' => 'Ketikkan alamat siswa...')) }}
				<span class="help-block" id="error-alamat"></span>
			</div>
		</div>
</div>
<div class="modal-footer">
	{{ Form::button('Tambah', array('class' => 'btn btn-primary', 'onclick' => 'tambahSiswa()')) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
	{{ Form::close() }}
</div>