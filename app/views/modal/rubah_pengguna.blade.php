<div class="modal-header">
	<h3>Rubah Pengguna</h3>
</div>
<div class="modal-body">
	{{ Form::open(array('route' => array('rubah_pengguna', $admin->id), 'files' => true, 'class' => 'form-horizontal form-rubah-pengguna')) }}
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

		<div class="control-group" id="control-nama">
			{{ Form::label('nama', 'Nama', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('nama', $admin->nama, array( 'id' => 'nama', 'onkeypress' => 'enterRubahPengguna(event)', 'maxlength' => 50, 'class' => 'input-focus', 'autocomplete' => 'off', 'placeholder' => 'Ketikkan nama pengguna...')) }}
				<span class="help-block" id="error-nama"></span>
			</div>
		</div>

		<div class="control-group" id="control-username">
			{{ Form::label('username', 'Username', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('username', $admin->username, array( 'id' => 'username', 'onkeypress' => 'enterRubahPengguna(event)', 'maxlength' => 20, 'autocomplete' => 'off', 'placeholder' => 'Ketikkan username pengguna...')) }}
				<span class="help-block" id="error-username"></span>
			</div>
		</div>

		<div class="control-group" id="control-password">
			{{ Form::label('password', 'Password', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::password('password', array( 'id' => 'password', 'onkeypress' => 'enterRubahPengguna(event)', 'placeholder' => 'Ketikkan password pengguna...')) }}
				<span class="help-block" id="error-password"></span>
			</div>
		</div>
</div>
<div class="modal-footer">
	{{ Form::button('Simpan', array('class' => 'btn btn-primary', 'onclick' => 'rubahPengguna()')) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
	{{ Form::close() }}
</div>