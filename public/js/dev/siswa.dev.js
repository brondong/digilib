function dataSiswa()
{
	$('title').text('Data Siswa');

	link('#link-siswa');

	$('.konten').load(url_data_siswa, function()
	{
		properti();
	});
}

function urutSiswa()
{
	var kolom = $('#kolom-siswa').find(':selected').val();
	var tipe = $('#tipe-siswa').find(':selected').val();

	$('.konten').load(url_urut_siswa + '/' + kolom + '/' + tipe, function()
	{
		properti();
	});
}

function cariSiswa()
{
	var nama = $('#cari-siswa').val().trim();

	if (nama == '')
	{
		notif('Inputan nama harus diisi', 'error');
	} else {
		$('.konten').load(url_cari_siswa + '/' + encodeURIComponent(nama), function()
		{
			properti();
		});
	};
}

function modalLihatSiswa(n)
{
	$('.modal').load(url_foto_siswa + '/' + n, function()
	{
		$('.modal').modal('show');
	});
}

function modalTambahSiswa()
{
	$('.modal').load(url_tambah_siswa, function()
	{
		$('.modal').modal('show');
	});
}

function enterTambahSiswa(k)
{
	if (k.which == 13) tambahSiswa();
}

function tambahSiswa()
{
	$('.form-tambah-siswa').ajaxSubmit({
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

				if (r.nis)
				{
					$('#control-nis').removeClass('info').addClass('error');
					$('#error-nis').text(r.nis);
				} else {
					$('#control-nis').removeClass('error').addClass('info');
					$('#error-nis').text('');
				};

				if (r.nama)
				{
					$('#control-nama').removeClass('info').addClass('error');
					$('#error-nama').text(r.nama);
				} else {
					$('#control-nama').removeClass('error').addClass('info');
					$('#error-nama').text('');
				};

				if (r.kelas)
				{
					$('#control-kelas').removeClass('info').addClass('error');
					$('#error-kelas').text(r.kelas);
				} else {
					$('#control-kelas').removeClass('error').addClass('info');
					$('#error-kelas').text('');
				};

				if (r.telp)
				{
					$('#control-telp').removeClass('info').addClass('error');
					$('#error-telp').text(r.telp);
				} else {
					$('#control-telp').removeClass('error').addClass('info');
					$('#error-telp').text('');
				};

				if (r.alamat)
				{
					$('#control-alamat').removeClass('info').addClass('error');
					$('#error-alamat').text(r.alamat);
				} else {
					$('#control-alamat').removeClass('error').addClass('info');
					$('#error-alamat').text('');
				};
			} else {
				$('.modal').modal('hide');
				$('.modal').html('');
				notif('Data siswa berhasil ditambah.', 'info');
				dataSiswa();
			};
		}
	});
}

function modalRubahSiswa(n)
{
	$('.modal').load(url_rubah_siswa + '/' + n, function()
	{
		$('.modal').modal('show');
	});
}

function enterRubahSiswa(k)
{
	if (k.which == 13) rubahSiswa();
}

function rubahSiswa()
{
	$('.form-rubah-siswa').ajaxSubmit({
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

				if (r.nis)
				{
					$('#control-nis').removeClass('info').addClass('error');
					$('#error-nis').text(r.nis);
				} else {
					$('#control-nis').removeClass('error').addClass('info');
					$('#error-nis').text('');
				};

				if (r.nama)
				{
					$('#control-nama').removeClass('info').addClass('error');
					$('#error-nama').text(r.nama);
				} else {
					$('#control-nama').removeClass('error').addClass('info');
					$('#error-nama').text('');
				};

				if (r.kelas)
				{
					$('#control-kelas').removeClass('info').addClass('error');
					$('#error-kelas').text(r.kelas);
				} else {
					$('#control-kelas').removeClass('error').addClass('info');
					$('#error-kelas').text('');
				};

				if (r.telp)
				{
					$('#control-telp').removeClass('info').addClass('error');
					$('#error-telp').text(r.telp);
				} else {
					$('#control-telp').removeClass('error').addClass('info');
					$('#error-telp').text('');
				};

				if (r.alamat)
				{
					$('#control-alamat').removeClass('info').addClass('error');
					$('#error-alamat').text(r.alamat);
				} else {
					$('#control-alamat').removeClass('error').addClass('info');
					$('#error-alamat').text('');
				};
			} else {
				$('.modal').modal('hide');
				$('.modal').html('');
				notif('Data siswa berhasil dirubah.', 'info');
				dataSiswa();
			};
		}
	});
}

function modalHapusSiswa(n)
{
	$('.modal').load(url_hapus_siswa + '/' + n, function()
	{
		$('.modal').modal('show');
	});
}

function hapusSiswa(n)
{
	$.post(url_hapus_siswa + '/' + n, { _token:token }, function(r)
	{
		$('.modal').modal('hide');
		$('.modal').html('');
		notif('Data siswa berhasil dihapus.', 'info');
		dataSiswa();
	});
}

function modalHapusCeklisSiswa()
{
	var id = $('.id-siswa:checked').serializeArray();

	if (id.length > 0)
	{
		$('.modal').load(url_hapus_ceklis_siswa, function()
		{
			$('.modal').modal('show');
		});
	} else {
		notif('Ceklis data siswa yang ingin dihapus.', 'error');
	};
}

function hapusCeklisSiswa()
{
	var id = $('.id-siswa:checked').serializeArray();
	$.post(url_hapus_ceklis_siswa, { id:id, _token:token }, function(r)
	{
		$('.modal').modal('hide');
		$('.modal').html('');
		notif('Data siswa berhasil dihapus.', 'info');
		dataSiswa();
	});
}

function PDFSiswa()
{
	window.open(url_pdf_siswa);
}

function excelSiswa()
{
	window.open(url_excel_siswa);
}