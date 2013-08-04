<div class="modal-header">
	<h3>Rubah Sekolah</h3>
</div>
<div class="modal-body">
	<div class="form-horizontal form-rubah-nama">
		<div class="control-group" id="control-nama">
			{{ Form::label('nama', 'Nama', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('nama', $sekolah->nama, array( 'id' => 'nama', 'onkeypress' => 'enterRubahSekolah(event)', 'maxlength' => 50, 'autocomplete' => 'off', 'placeholder' => 'Ketikkan nama sekolah...')) }}
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
</div>
<div class="modal-footer">
	{{ Form::button('Simpan', array('class' => 'btn btn-primary', 'onclick' => 'rubahSekolah()')) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
</div>