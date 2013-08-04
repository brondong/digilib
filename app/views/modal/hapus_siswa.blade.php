<div class="modal-header">
	<h3>Hapus Siswa</h3>
</div>
<div class="modal-body text-center">
	<p>Apakah anda yakin ingin menghapus data siswa ini?</p>
</div>
<div class="modal-footer">
	{{ Form::button('Ya', array('class' => 'btn btn-primary', 'onclick' => "hapusSiswa($siswa->id)")) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
</div>