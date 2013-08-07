<div class="modal-header">
	<h3>QRCode</h3>
</div>
<div class="modal-body text-center">
	<p><img src="{{ $gambar }}" alt="" /></p>
</div>
<div class="modal-footer">
	{{ Form::button('Unduh', array('class' => 'btn btn-primary', 'onclick' => "unduhQRCode($siswa->id)", 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
	{{ Form::button('Batal', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
</div>