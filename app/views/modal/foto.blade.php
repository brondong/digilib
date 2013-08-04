<div class="modal-header">
	<h3>Rubah Foto</h3>
</div>
<div class="modal-body">
	{{ Form::open(array('route' => 'rubah_foto', 'files' => true, 'class' => 'form-horizontal form-rubah-foto')) }}
		<div class="control-group" id="control-foto">
			<div class="controls">
				<div class="fileupload fileupload-new text-center" data-provides="fileupload">
					<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
					<div>
						<span class="btn btn-file">
							<span class="fileupload-new">Pilih</span>
							<span class="fileupload-exists">Rubah</span>
							{{ Form::file('foto', array('id' => 'foto')) }}
						</span>
						<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
					</div>
				</div>
				<span class="help-block text-center" id="error-foto"></span>
			</div>
		</div>
	
</div>
<div class="modal-footer">
	{{ Form::button('Simpan', array('class' => 'btn btn-primary', 'onclick' => 'rubahFoto()')) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
	{{ Form::close() }}
</div>