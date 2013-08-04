function dataBuku()
{
	$('title').text('Data Buku');
	
	link('#link-buku');

	$('.konten').load(url_data_buku, function()
	{
		properti();
	});
}

function urutBuku()
{
	var kolom = $('#kolom-buku').find(':selected').val();
	var tipe = $('#tipe-buku').find(':selected').val();

	$('.konten').load(url_urut_buku + '/' + kolom + '/' + tipe, function()
	{
		properti();
	});
}

function cariBuku()
{
	var judul = $('#cari-buku').val().trim();

	if (judul == '')
	{
		notif('Inputan judul harus diisi', 'error');
	} else {
		$('.konten').load(url_cari_buku + '/' + encodeURIComponent(judul), function()
		{
			properti();
		});
	};
}

function modalLihatBuku(n)
{
	$('.modal').load(url_cover_buku + '/' + n, function()
	{
		$('.modal').modal('show');
	});
}

function modalTambahBuku()
{
	$('.modal').load(url_tambah_buku, function()
	{
		$('.modal').modal('show');
	});
}

function enterTambahBuku(k)
{
	if (k.which == 13) tambahBuku();
}

function tambahBuku()
{
	$('.form-tambah-buku').ajaxSubmit({
		success: function(r)
		{		
			if (r.status == '')
			{			
				if (r.cover)
				{
					$('#control-cover').removeClass('info').addClass('error');
					$('#error-cover').text(r.cover);
				} else {
					$('#control-cover').removeClass('error').addClass('info');
					$('#error-cover').text('');
				};
			
				if (r.judul)
				{
					$('#control-judul').removeClass('info').addClass('error');
					$('#error-judul').text(r.judul);
				} else {
					$('#control-judul').removeClass('error').addClass('info');
					$('#error-judul').text('');
				};
			
				if (r.penulis)
				{
					$('#control-penulis').removeClass('info').addClass('error');
					$('#error-penulis').text(r.penulis);
				} else {
					$('#control-penulis').removeClass('error').addClass('info');
					$('#error-penulis').text('');
				};
			
				if (r.penerbit)
				{
					$('#control-penerbit').removeClass('info').addClass('error');
					$('#error-penerbit').text(r.penerbit);
				} else {
					$('#control-penerbit').removeClass('error').addClass('info');
					$('#error-penerbit').text('');
				};

				if (r.tahun)
				{
					$('#control-tahun').removeClass('info').addClass('error');
					$('#error-tahun').text(r.tahun);
				} else {
					$('#control-tahun').removeClass('error').addClass('info');
					$('#error-tahun').text('');
				};

				if (r.jumlah)
				{
					$('#control-jumlah').removeClass('info').addClass('error');
					$('#error-jumlah').text(r.jumlah);
				} else {
					$('#control-jumlah').removeClass('error').addClass('info');
					$('#error-jumlah').text('');
				};
			} else {
				$('.modal').modal('hide');
				$('.modal').html('');
				notif('Data buku berhasil ditambah.', 'info');
				dataBuku();
			};		
		}
	});
}

function modalRubahBuku(n)
{
	$('.modal').load(url_rubah_buku + '/' + n, function()
	{
		$('.modal').modal('show');
	});
}

function enterRubahBuku(k)
{
	if (k.which == 13) rubahBuku();
}

function rubahBuku()
{
	$('.form-rubah-buku').ajaxSubmit({
		success: function(r)
		{		
			if (r.status == '')
			{
				if (r.cover)
				{
					$('#control-cover').removeClass('info').addClass('error');
					$('#error-cover').text(r.cover);
				} else {
					$('#control-cover').removeClass('error').addClass('info');
					$('#error-cover').text('');
				};
			
				if (r.judul)
				{
					$('#control-judul').removeClass('info').addClass('error');
					$('#error-judul').text(r.judul);
				} else {
					$('#control-judul').removeClass('error').addClass('info');
					$('#error-judul').text('');
				};
			
				if (r.penulis)
				{
					$('#control-penulis').removeClass('info').addClass('error');
					$('#error-penulis').text(r.penulis);
				} else {
					$('#control-penulis').removeClass('error').addClass('info');
					$('#error-penulis').text('');
				};
			
				if (r.penerbit)
				{
					$('#control-penerbit').removeClass('info').addClass('error');
					$('#error-penerbit').text(r.penerbit);
				} else {
					$('#control-penerbit').removeClass('error').addClass('info');
					$('#error-penerbit').text('');
				};
			
				if (r.tahun)
				{
					$('#control-tahun').removeClass('info').addClass('error');
					$('#error-tahun').text(r.tahun);
				} else {
					$('#control-tahun').removeClass('error').addClass('info');
					$('#error-tahun').text('');
				};
			
				if (r.jumlah)
				{
					$('#control-jumlah').removeClass('info').addClass('error');
					$('#error-jumlah').text(r.jumlah);
				} else {
					$('#control-jumlah').removeClass('error').addClass('info');
					$('#error-jumlah').text('');
				};		
			} else {
				$('.modal').modal('hide');
				$('.modal').html('');
				notif('Data buku berhasil dirubah.', 'info');
				dataBuku();
			};		
		}
	});
}

function modalHapusBuku(n)
{
	$('.modal').load(url_hapus_buku + '/' + n, function()
	{
		$('.modal').modal('show');
	});
}

function hapusBuku(n)
{
	$.post(url_hapus_buku + '/' + n, { _token:token }, function(r)
	{
		$('.modal').modal('hide');
		$('.modal').html('');
		notif('Data buku berhasil dihapus.', 'info');
		dataBuku();
	});
}

function modalHapusCeklisBuku()
{
	var id = $('.id-buku:checked').serializeArray();

	if (id.length > 0)
	{
		$('.modal').load(url_hapus_ceklis_buku, function()
		{
			$('.modal').modal('show');
		});
	} else {
		notif('Ceklis data buku yang ingin dihapus.', 'error');
	};
}

function hapusCeklisBuku()
{
	var id = $('.id-buku:checked').serializeArray();
	$.post(url_hapus_ceklis_buku, { id:id, _token:token }, function(r)
	{
		$('.modal').modal('hide');
		$('.modal').html('');
		notif('Data buku berhasil dihapus.', 'info');
		dataBuku();
	});
}

function PDFBuku()
{
	window.open(url_pdf_buku);
}

function excelBuku()
{
	window.open(url_excel_buku);
}