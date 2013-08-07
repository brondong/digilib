<div class="modal-header">
	<h3>Kartu Anggota</h3>
</div>
<div class="modal-body text-center">
	<p><img src="{{ $gambar }}" alt="" /></p>
</div>
<div class="modal-footer">
	{{ Form::button('Unduh', array('class' => 'btn btn-primary', 'onclick' => "unduhAnggota($siswa->id)", 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
</div>