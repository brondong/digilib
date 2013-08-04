<div class="modal-header">
	<h3>Hapus Buku</h3>
</div>
<div class="modal-body text-center">
	<p>Apakah anda yakin ingin menghapus data buku ini?</p>
</div>
<div class="modal-footer">
	{{ Form::button('Ya', array('class' => 'btn btn-primary', 'onclick' => "hapusBuku($buku->id)")) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
</div>