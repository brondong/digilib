$(function()
{
	Messenger({ maxMessages:1 });
});

function modalRubahFoto()
{
	$('.modal').load(url_rubah_foto, function()
	{
		$('.modal').modal('show');
	});
}

function rubahFoto()
{
	$('.form-rubah-foto').ajaxSubmit({
		success : function(r)
		{
			if (r.foto)
			{
				$('#control-foto').removeClass('info').addClass('error');
				$('#error-foto').text(r.foto);
			} else {
				$('.modal').modal('hide');
				notif('Foto anda berhasil dirubah.', 'info');
			};
		}
	});
}

function modalRubahNama()
{
	$('.modal').load(url_rubah_nama, function()
	{
		$('.modal').modal('show');
	});
}

function enterRubahNama(k)
{
	if (k.which == 13) rubahNama();
}

function rubahNama()
{
	var nama = $('#nama').val().trim();

	$.post(url_rubah_nama, { nama:nama, _token:token }, function(r)
	{
		if (r.nama)
		{
			$('#control-nama').removeClass('info').addClass('error');
			$('#error-nama').text(r.nama);
		} else {
			$('.modal').modal('hide');
			$('.modal').html('');
			$('.user').text(nama);
			notif('Nama anda berhasil dirubah.', 'info');
		};
	});
}

function modalRubahSekolah(n)
{
	$('.modal').load(url_rubah_sekolah, function()
	{
		$('.modal').modal('show');
	});
}

function enterRubahSekolah(k)
{
	if (k.which == 13) rubahSekolah();
}

function rubahSekolah()
{
	var nama = $('#nama').val().trim();
	var alamat = $('#alamat').val().trim();

	$.post(url_rubah_sekolah, { nama:nama, alamat:alamat, _token:token }, function(r)
	{
		if (r.status == '')
		{
			if (r.nama)
			{
				$('#control-nama').removeClass('info').addClass('error');
				$('#error-nama').text(r.nama);
			} else {
				$('#control-nama').removeClass('error').addClass('info');
			};

			if (r.alamat)
			{
				$('#control-alamat').removeClass('info').addClass('error');
				$('#error-alamat').text(r.alamat);
			} else {
				$('#control-alamat').removeClass('error').addClass('info');
			};
		} else {
			$('.modal').modal('hide');
			$('.modal').html('');
			notif('Data sekolah berhasil dirubah.', 'info');
		}
	});
}

function modalRubahUsername()
{
	$('.modal').load(url_rubah_username, function()
	{
		$('.modal').modal('show');
	});
}

function enterRubahUsername(k)
{
	if (k.which == 13) rubahUsername();
}

function rubahUsername()
{
	var username_sekarang = $('#username_sekarang').val().trim();
	var username_baru = $('#username_baru').val().trim();
	var konfirmasi_username = $('#konfirmasi_username').val().trim();

	$.post(url_rubah_username, { username_sekarang:username_sekarang, username_baru:username_baru, konfirmasi_username:konfirmasi_username, _token:token }, function(r)
	{
		if (r.status == '')
		{
			if (r.username_sekarang)
			{
				$('#control-username-sekarang').removeClass('info').addClass('error');
				$('#error-username-sekarang').text(r.username_sekarang);
			} else {
				$('#control-username-sekarang').removeClass('error').addClass('info');
				$('#error-username-sekarang').text('');
			};

			if (r.username_baru)
			{
				$('#control-username-baru').removeClass('info').addClass('error');
				$('#error-username-baru').text(r.username_baru);
			} else {
				$('#control-username-baru').removeClass('error').addClass('info');
				$('#error-username-baru').text('');
			};

			if (r.konfirmasi_username)
			{
				$('#control-konfirmasi-username').removeClass('info').addClass('error');
				$('#error-konfirmasi-username').text(r.konfirmasi_username);
			} else {
				$('#control-konfirmasi-username').removeClass('error').addClass('info');
				$('#error-konfirmasi-username').text('');
			};
		} else {
			$('.modal').modal('hide');
			$('.modal').html('');
			notif('Username anda berhasil dirubah.', 'info');
		};
	});
}

function modalRubahPassword()
{
	$('.modal').load(url_rubah_password, function()
	{
		$('.modal').modal('show');
	});
}

function enterRubahPassword(k)
{
	if (k.which == 13) rubahPassword();
}

function rubahPassword()
{
	var password_sekarang = $('#password_sekarang').val().trim();
	var password_baru = $('#password_baru').val().trim();
	var konfirmasi_password = $('#konfirmasi_password').val().trim();

	$.post(url_rubah_password, { password_sekarang:password_sekarang, password_baru:password_baru, konfirmasi_password:konfirmasi_password, _token:token }, function(r)
	{
		if (r.status == '')
		{
			if (r.password_sekarang)
			{
				$('#control-password-sekarang').removeClass('info').addClass('error');
				$('#error-password-sekarang').text(r.password_sekarang);
			} else {
				$('#control-password-sekarang').removeClass('error').addClass('info');
				$('#error-password-sekarang').text('');
			};

			if (r.password_baru)
			{
				$('#control-password-baru').removeClass('info').addClass('error');
				$('#error-password-baru').text(r.password_baru);
			} else {
				$('#control-password-baru').removeClass('error').addClass('info');
				$('#error-password-baru').text('');
			};

			if (r.konfirmasi_password)
			{
				$('#error-konfirmasi-password').text(r.konfirmasi_password);
			} else {
				$('#error-konfirmasi-password').text('');
			};

			$('.modal').find('.control-group').addClass('error');
			$('.modal').find('input').val('');
		} else {
			$('.modal').modal('hide');
			$('.modal').html('');
			notif('Password anda berhasil dirubah.', 'info');
		};
	});
}

function logout()
{
	$.get(url_logout, function()
	{
		$(location).prop('href', url_login);
	});
}

function link(target)
{
	$('.navbar-inner').find('li').removeClass('active');
	$(target).addClass('active');
}

function notif(pesan, tipe)
{
	Messenger().post({
		message:pesan,
		type:tipe,
		showCloseButton:true
	});
}

function ceklis(t)
{
	$('.table').find(':checkbox').prop('checked', $(t).prop('checked'));
}

function paginasi(t)
{
	$('.konten').load($(t).data('target'), function()
	{
		properti();
	});
}

function properti()
{
	$('.tip').tooltip();

	$('.tanggal').datepicker({
		format: 'dd-mm-yyyy',
		autoclose: true,
		language: 'id'
	});

	$('.type').typeahead({
		items: 5
	});

	$('.pagination a').click(function()
	{
		paginasi(this);
	});
}