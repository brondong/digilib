<div class="modal-header">
	<h3>Rubah Nama</h3>
</div>
<div class="modal-body">
	<div class="form-horizontal form-rubah-nama">
		<div class="control-group" id="control-nama">
			{{ Form::label('nama', 'Nama', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('nama', null, array( 'id' => 'nama', 'onkeypress' => 'enterRubahNama(event)', 'maxlength' => 50, 'class' => 'input-focus', 'autocomplete' => 'off', 'placeholder' => 'Ketikkan nama anda...')) }}
				<span class="help-block" id="error-nama"></span>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	{{ Form::button('Simpan', array('class' => 'btn btn-primary', 'onclick' => 'rubahNama()')) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
</div>