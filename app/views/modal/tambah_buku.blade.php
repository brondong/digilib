<div class="modal-header">
	<h3>Tambah Buku</h3>
</div>
<div class="modal-body">
	{{ Form::open(array('route' => 'tambah_buku', 'files' => true, 'class' => 'form-horizontal form-tambah-buku')) }}
		<div class="control-group" id="control-cover">
			{{ Form::label('cover', 'Cover', array('class' => 'control-label')) }}
			<div class="controls">
				<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input"><i class="icon-picture fileupload-exists"></i> <span class="fileupload-preview"></span></div>
					<span class="btn btn-file">
						<span class="fileupload-new"><i class="icon-upload"></i></span>
						<span class="fileupload-exists"><i class="icon-edit"></i></span>
						{{ Form::file('cover', array('id' => 'cover')) }}
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload"><i class="icon-remove-circle"></i></a>
				</div>
			</div>
			<span class="help-block" id="error-cover"></span>
			</div>
		</div>

		<div class="control-group" id="control-judul">
			{{ Form::label('judul', 'Judul', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('judul', null, array( 'id' => 'judul', 'onkeypress' => 'enterTambahBuku(event)', 'maxlength' => 100, 'placeholder' => 'Ketikkan judul buku...')) }}
				<span class="help-block" id="error-judul"></span>
			</div>
		</div>

		<div class="control-group" id="control-penulis">
			{{ Form::label('penulis', 'Penulis', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('penulis', null, array( 'id' => 'penulis', 'onkeypress' => 'enterTambahBuku(event)', 'maxlength' => 100, 'placeholder' => 'Ketikkan penulis buku...')) }}
				<span class="help-block" id="error-penulis"></span>
			</div>
		</div>

		<div class="control-group" id="control-penerbit">
			{{ Form::label('penerbit', 'Penerbit', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('penerbit', null, array( 'id' => 'penerbit', 'onkeypress' => 'enterTambahBuku(event)', 'maxlength' => 50, 'placeholder' => 'Ketikkan penerbit buku...')) }}
				<span class="help-block" id="error-penerbit"></span>
			</div>
		</div>

		<div class="control-group" id="control-tahun">
			{{ Form::label('tahun', 'Tahun', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('tahun', null, array( 'id' => 'tahun', 'onkeypress' => 'enterTambahBuku(event)', 'maxlength' => 4, 'placeholder' => 'Ketikkan tahun buku...')) }}
				<span class="help-block" id="error-tahun"></span>
			</div>
		</div>

		<div class="control-group" id="control-jumlah">
			{{ Form::label('jumlah', 'Jumlah', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('jumlah', null, array( 'id' => 'jumlah', 'onkeypress' => 'enterTambahBuku(event)', 'maxlength' => 10, 'placeholder' => 'Ketikkan jumlah buku...')) }}
				<span class="help-block" id="error-jumlah"></span>
			</div>
		</div>
</div>
<div class="modal-footer">
	{{ Form::button('Tambah', array('class' => 'btn btn-primary', 'onclick' => 'tambahBuku()')) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
	{{ Form::close() }}
</div>