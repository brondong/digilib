<div class="modal-header">
	<h3>Cover Buku</h3>
</div>
<div class="modal-body text-center">
	<img src="{{ ($buku->cover) ? asset('/foto/buku/' . $buku->cover) : asset('foto/buku/blank.png') }}" alt="{{ $buku->cover }}" class="modal-foto" />
</div>
<div class="modal-footer">
	{{ Form::button('Tutup', array('class' => 'btn', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
</div>