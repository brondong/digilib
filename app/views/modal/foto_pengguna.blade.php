<div class="modal-header">
	<h3>Foto Pengguna</h3>
</div>
<div class="modal-body text-center">
	<img src="{{ ($admin->foto) ? asset('/foto/admin/' . $admin->foto) : asset('foto/admin/blank.png') }}" alt="{{ $admin->foto }}" class="modal-foto" />
</div>
<div class="modal-footer">
	{{ Form::button('Tutup', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
</div>