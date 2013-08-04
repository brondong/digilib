<div class="modal-header">
	<h3>Rubah Password</h3>
</div>
<div class="modal-body">
	<div class="form-horizontal form-rubah-password">
		<div class="control-group" id="control-password-sekarang">
			{{ Form::label('password_sekarang', 'Password Sekarang', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::password('password_sekarang', array( 'id' => 'password_sekarang', 'onkeypress' => 'enterRubahPassword(event)', 'placeholder' => 'Ketikkan password sekarang...')) }}
				<span class="help-block" id="error-password-sekarang"></span>
			</div>
		</div>

		<div class="control-group" id="control-password-baru">
			{{ Form::label('password_baru', 'Password Baru', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::password('password_baru', array( 'id' => 'password_baru', 'onkeypress' => 'enterRubahPassword(event)', 'placeholder' => 'Ketikkan password baru...')) }}
				<span class="help-block" id="error-password-baru"></span>
			</div>
		</div>

		<div class="control-group" id="control-konfirmasi-password">
			{{ Form::label('konfirmasi_password', 'Konfirmasi Password', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::password('konfirmasi_password', array( 'id' => 'konfirmasi_password', 'onkeypress' => 'enterRubahPassword(event)', 'placeholder' => 'Ketik ulang password baru...')) }}
				<span class="help-block" id="error-konfirmasi-password"></span>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	{{ Form::button('Simpan', array('class' => 'btn btn-primary', 'onclick' => 'rubahPassword()')) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
</div>