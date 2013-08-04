<div class="modal-header">
	<h3>Foto Siswa</h3>
</div>
<div class="modal-body text-center">
	<img src="{{ ($siswa->foto) ? asset('/foto/siswa/' . $siswa->foto) : asset('foto/siswa/blank.png') }}" alt="{{ $siswa->foto }}" class="modal-foto" />
</div>
<div class="modal-footer">
	{{ Form::button('Tutup', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
</div>