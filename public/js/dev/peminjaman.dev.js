function dataPeminjaman()
{
	$('title').text('Data Peminjaman');

	link('#link-peminjaman');

	$('.konten').load(url_data_peminjaman, function()
	{
		properti();
	});
}

function tampilPeminjaman()
{
	var awal = $('#tanggal-awal').val().trim();
	var akhir = $('#tanggal-akhir').val().trim();

	if (awal && akhir)
	{
		$('.konten').load(url_tampil_peminjaman + '/' + awal + '/' + akhir, function()
		{
			properti();
		});
	};
}

function cariPeminjaman()
{
	var id_siswa = $('#cari-peminjaman').val().trim();

	if (id_siswa == '')
	{
		notif('Inputan nama harus diisi', 'error');
	} else {
		$('.konten').load(url_cari_peminjaman + '/' + id_siswa, function()
		{
			properti();
		});
	};
}

function modalTambahPeminjaman()
{
	$('.modal').load(url_tambah_peminjaman, function()
	{
		$('.modal').modal('show');
		properti();
	});
}

function tambahPeminjaman()
{
	$('.form-tambah-peminjaman').ajaxSubmit({
		success: function(r)
		{
			if (r.status == '')
			{
				if (r.buku)
				{
					$('#control-buku').removeClass('info').addClass('error');
					$('#error-buku').text(r.buku);
				} else {
					$('#control-buku').removeClass('error').addClass('info');
					$('#error-buku').text('');
				};

				if (r.siswa)
				{
					$('#control-siswa').removeClass('info').addClass('error');
					$('#error-siswa').text(r.siswa);
				} else {
					$('#control-siswa').removeClass('error').addClass('info');
					$('#error-siswa').text('');
				};

				if (r.jumlah)
				{
					$('#control-jumlah').removeClass('info').addClass('error');
					$('#error-jumlah').text(r.jumlah);
				} else {
					$('#control-jumlah').removeClass('error').addClass('info');
					$('#error-jumlah').text('');
				};

				if (r.peminjaman)
				{
					$('#control-peminjaman').removeClass('info').addClass('error');
					$('#error-peminjaman').text(r.peminjaman);
				} else {
					$('#control-peminjaman').removeClass('error').addClass('info');
					$('#error-peminjaman').text('');
				};

				if (r.pengembalian)
				{
					$('#control-pengembalian').removeClass('info').addClass('error');
					$('#error-pengembalian').text(r.pengembalian);
				} else {
					$('#control-pengembalian').removeClass('error').addClass('info');
					$('#error-pengembalian').text('');
				};
			} else {
				$('.modal').modal('hide');
				$('.modal').html('');
				notif('Data peminjaman berhasil ditambah.', 'info');
				dataPeminjaman();
			};
		}
	});
}

function modalRubahPeminjaman(n)
{
	$('.modal').load(url_rubah_peminjaman + '/' + n, function()
	{
		$('.modal').modal('show');
		properti();
	});
}

function rubahPeminjaman()
{
	$('.form-rubah-peminjaman').ajaxSubmit({
		success: function(r)
		{
			if (r.status == '')
			{
				if (r.buku)
				{
					$('#control-buku').removeClass('info').addClass('error');
					$('#error-buku').text(r.buku);
				} else {
					$('#control-buku').removeClass('error').addClass('info');
					$('#error-buku').text('');
				};

				if (r.siswa)
				{
					$('#control-siswa').removeClass('info').addClass('error');
					$('#error-siswa').text(r.siswa);
				} else {
					$('#control-siswa').removeClass('error').addClass('info');
					$('#error-siswa').text('');
				};

				if (r.jumlah)
				{
					$('#control-jumlah').removeClass('info').addClass('error');
					$('#error-jumlah').text(r.jumlah);
				} else {
					$('#control-jumlah').removeClass('error').addClass('info');
					$('#error-jumlah').text('');
				};

				if (r.peminjaman)
				{
					$('#control-peminjaman').removeClass('info').addClass('error');
					$('#error-peminjaman').text(r.peminjaman);
				} else {
					$('#control-peminjaman').removeClass('error').addClass('info');
					$('#error-peminjaman').text('');
				};

				if (r.pengembalian)
				{
					$('#control-pengembalian').removeClass('info').addClass('error');
					$('#error-pengembalian').text(r.pengembalian);
				} else {
					$('#control-pengembalian').removeClass('error').addClass('info');
					$('#error-pengembalian').text('');
				};
			} else {
				$('.modal').modal('hide');
				$('.modal').html('');
				notif('Data peminjaman berhasil dirubah.', 'info');
				dataPeminjaman();
			};
		}
	});
}

function kembalikan(n)
{
	$.post(url_kembalikan_peminjaman + '/' + n + '/' + 1, { _token:token }, function(r)
	{
		$('.modal').modal('hide');
		$('.modal').html('');
		notif('Data peminjaman sudah dikembalikan.', 'info');
		dataPeminjaman();
	});
}

function belum(n)
{
	$.post(url_kembalikan_peminjaman + '/' + n + '/' + 0, { _token:token }, function(r)
	{
		$('.modal').modal('hide');
		$('.modal').html('');
		notif('Data peminjaman belum dikembalikan.', 'info');
		dataPeminjaman();
	});
}

function modalHapusPeminjaman(n)
{
	$('.modal').load(url_hapus_peminjaman + '/' + n, function()
	{
		$('.modal').modal('show');
	});
}

function hapusPeminjaman(n)
{
	$.post(url_hapus_peminjaman + '/' + n, { _token:token }, function(r)
	{
		$('.modal').modal('hide');
		$('.modal').html('');
		notif('Data peminjaman berhasil dihapus.', 'info');
		dataPeminjaman();
	});
}

function modalHapusCeklisPeminjaman()
{
	var id = $('.id-peminjaman:checked').serializeArray();

	if (id.length > 0)
	{
		$('.modal').load(url_hapus_ceklis_peminjaman, function()
		{
			$('.modal').modal('show');
		});
	} else {
		notif('Ceklis data peminjaman yang ingin dihapus.', 'error');
	};
}

function hapusCeklisPeminjaman()
{
	var id = $('.id-peminjaman:checked').serializeArray();
	$.post(url_hapus_ceklis_peminjaman, { id:id, _token:token }, function(r)
	{
		$('.modal').modal('hide');
		$('.modal').html('');
		notif('Data peminjaman berhasil dihapus.', 'info');
		dataPeminjaman();
	});
}

function PDFPeminjaman()
{
	window.open(url_pdf_peminjaman);
}

function excelPeminjaman()
{
	window.open(url_excel_peminjaman);
}