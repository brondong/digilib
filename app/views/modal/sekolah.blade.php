<div class="modal-header">
	<h3>Rubah Sekolah</h3>
</div>
<div class="modal-body">
	{{ Form::open(array('route' => 'rubah_sekolah', 'files' => true, 'class' => 'form-horizontal form-rubah-sekolah')) }}
		<div class="control-group" id="control-logo">
			{{ Form::label('logo', 'logo', array('class' => 'control-label')) }}
			<div class="controls">
				<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input"><i class="icon-picture fileupload-exists"></i> <span class="fileupload-preview"></span></div>
					<span class="btn btn-file">
						<span class="fileupload-new"><i class="icon-upload"></i></span>
						<span class="fileupload-exists"><i class="icon-edit"></i></span>
						{{ Form::file('logo', array('id' => 'logo')) }}
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload"><i class="icon-remove-circle"></i></a>
				</div>
			</div>
			<span class="help-block" id="error-logo"></span>
			</div>
		</div>

		<div class="control-group" id="control-nama">
			{{ Form::label('nama', 'Nama', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('nama', $sekolah->nama, array( 'id' => 'nama', 'onkeypress' => 'enterRubahSekolah(event)', 'maxlength' => 50, 'class' => 'input-focus', 'autocomplete' => 'off', 'placeholder' => 'Ketikkan nama sekolah...')) }}
				<span class="help-block" id="error-nama"></span>
			</div>
		</div>

		<div class="control-group" id="control-alamat">
			{{ Form::label('alamat', 'Alamat', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::textarea('alamat', $sekolah->alamat, array( 'id' => 'alamat', 'rows' => 5, 'maxlength' => 255, 'placeholder' => 'Ketikkan alamat sekolah...')) }}
				<span class="help-block" id="error-alamat"></span>
			</div>
		</div>
</div>
<div class="modal-footer">
	{{ Form::button('Simpan', array('class' => 'btn btn-primary', 'onclick' => 'rubahSekolah()')) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
	{{ Form::close() }}
</div>