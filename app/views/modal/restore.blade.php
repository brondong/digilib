<div class="modal-header">
	<h3>Restore Database</h3>
</div>
<div class="modal-body">
	{{ Form::open(array('route' => 'restore', 'files' => true, 'class' => 'form-horizontal form-restore')) }}
		<div class="control-group" id="control-sql">
			{{ Form::label('sql', 'SQL', array('class' => 'control-label')) }}
			<div class="controls">
				<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div>
					<span class="btn btn-file">
						<span class="fileupload-new"><i class="icon-upload"></i></span>
						<span class="fileupload-exists"><i class="icon-edit"></i></span>
						{{ Form::file('sql', array('id' => 'sql')) }}
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload"><i class="icon-remove-circle"></i></a>
				</div>
			</div>
			<span class="help-block" id="error-sql"></span>
			</div>
		</div>
	
</div>
<div class="modal-footer">
	{{ Form::button('Simpan', array('class' => 'btn btn-primary', 'onclick' => 'restore()')) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
	{{ Form::close() }}
</div>