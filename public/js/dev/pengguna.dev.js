function dataPengguna()
{
	$('title').text('Data Pengguna');

	link('#link-pengguna');

	$('.konten').load(url_data_pengguna, function()
	{
		properti();
	});
}

function modalTambahPengguna()
{
	$('.modal').load(url_tambah_pengguna, function()
	{
		$('.modal').modal('show');
	});
}

function enterTambahPengguna(k)
{
	if (k.which == 13) tambahPengguna();
}

function tambahPengguna()
{
	$('.form-tambah-pengguna').ajaxSubmit({
		success: function(r)
		{
			if (r.status == '')
			{
				if (r.foto)
				{
					$('#control-foto').removeClass('info').addClass('error');
					$('#error-foto').text(r.foto);
				} else {
					$('#control-foto').removeClass('error').addClass('info');
					$('#error-foto').text('');
				};

				if (r.nama)
				{
					$('#control-nama').removeClass('info').addClass('error');
					$('#error-nama').text(r.nama);
				} else {
					$('#control-nama').removeClass('error').addClass('info');
					$('#error-nama').text('');
				};

				if (r.username)
				{
					$('#control-username').removeClass('info').addClass('error');
					$('#error-username').text(r.username);
				} else {
					$('#control-username').removeClass('error').addClass('info');
					$('#error-username').text('');
				};

				if (r.password)
				{
					$('#control-password').removeClass('info').addClass('error');
					$('#error-password').text(r.password);
				} else {
					$('#control-password').removeClass('error').addClass('info');
					$('#error-password').text('');
				};

				$('#password').val('');
			} else {
				$('.modal').modal('hide');
				$('.modal').html('');
				notif('Data pengguna berhasil ditambah.', 'info');
				dataPengguna();
			};
		}
	});
}

function modalRubahPengguna(n)
{
	$('.modal').load(url_rubah_pengguna + '/' + n, function()
	{
		$('.modal').modal('show');
	});
}

function enterRubahPengguna(k)
{
	if (k.which == 13) rubahPengguna();
}

function rubahPengguna()
{
	$('.form-rubah-pengguna').ajaxSubmit({
		success: function(r)
		{
			if (r.status == '')
			{
				if (r.foto)
				{
					$('#control-foto').removeClass('info').addClass('error');
					$('#error-foto').text(r.foto);
				} else {
					$('#control-foto').removeClass('error').addClass('info');
					$('#error-foto').text('');
				};

				if (r.nama)
				{
					$('#control-nama').removeClass('info').addClass('error');
					$('#error-nama').text(r.nama);
				} else {
					$('#control-nama').removeClass('error').addClass('info');
					$('#error-nama').text('');
				};

				if (r.username)
				{
					$('#control-username').removeClass('info').addClass('error');
					$('#error-username').text(r.username);
				} else {
					$('#control-username').removeClass('error').addClass('info');
					$('#error-username').text('');
				};

				if (r.password)
				{
					$('#control-password').removeClass('info').addClass('error');
					$('#error-password').text(r.password);
				} else {
					$('#control-password').removeClass('error').addClass('info');
					$('#error-password').text('');
				};

				$('#password').val('');

			} else {
				$('.modal').modal('hide');
				$('.modal').html('');
				notif('Data pengguna berhasil dirubah.', 'info');
				dataPengguna();
			};
		}
	});
}

function modalLihatPengguna(n)
{
	$('.modal').load(url_foto_pengguna + '/' + n, function()
	{
		$('.modal').modal('show');
	});
}

function modalHapusPengguna(n)
{
	$('.modal').load(url_hapus_pengguna + '/' + n, function()
	{
		$('.modal').modal('show');
	});
}

function hapusPengguna(n)
{
	$.post(url_hapus_pengguna + '/' + n, { _token:token }, function(r)
	{
		$('.modal').modal('hide');
		$('.modal').html('');
		notif('Data pengguna berhasil dihapus.', 'info');
		dataPengguna();
	});
}

function modalHapusCeklisPengguna()
{
	var id = $('.id-pengguna:checked').serializeArray();

	if (id.length > 0)
	{
		$('.modal').load(url_hapus_ceklis_pengguna, function()
		{
			$('.modal').modal('show');
		});
	} else {
		notif('Ceklis data pengguna yang ingin dihapus.', 'error');
	};
}

function hapusCeklisPengguna()
{
	var id = $('.id-pengguna:checked').serializeArray();

	$.post(url_hapus_ceklis_pengguna, { id:id, _token:token }, function(r)
	{
		$('.modal').modal('hide');
		$('.modal').html('');
		notif('Data pengguna berhasil dihapus.', 'info');
		dataPengguna();
	});
}

function PDFPengguna()
{
	window.open(url_pdf_pengguna);
}

function excelPengguna()
{
	window.open(url_excel_pengguna);
}