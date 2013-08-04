function dataPengembalian()
{
	$('title').text('Data Pengembalian');

	link('#link-pengembalian');
	
	$('.konten').load(url_data_pengembalian, function()
	{
		properti();
	});
}

function tampilPengembalian()
{
	var awal = $('#tanggal-awal').val().trim();
	var akhir = $('#tanggal-akhir').val().trim();

	if (awal && akhir)
	{
		$('.konten').load(url_tampil_pengembalian + '/' + awal + '/' + akhir, function()
		{
			properti();
		});
	};
}

function cariPengembalian()
{
	var id_siswa = $('#cari-pengembalian').val().trim();

	if (id_siswa == '')
	{
		notif('Inputan nama harus diisi', 'error');
	} else {
		$('.konten').load(url_cari_pengembalian + '/' + id_siswa, function()
		{
			properti();
		});
	};
}

function PDFPengembalian()
{
	window.open(url_pdf_pengembalian);
}

function excelPengembalian()
{
	window.open(url_excel_pengembalian);
}