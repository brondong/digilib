<?php

class PeminjamanController extends BaseController {

	public function __construct()
	{
		// filter
		$this->beforeFilter('auth');
		$this->beforeFilter('ajax', array('except' => array('pdf', 'excel')));
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function data()
	{
		// data
		$nama = Peminjaman::data();
		$pinjam = Peminjaman::data();
		
		return View::make('pages.peminjaman', compact('nama', 'pinjam'));
	}

	public function tampil($awal, $akhir)
	{
		// data
		$nama = Peminjaman::data();
		$tanggal_awal = date('Y-m-d', strtotime($awal));
		$tanggal_akhir= date('Y-m-d', strtotime($akhir));
		$pinjam = Peminjaman::tampil($tanggal_awal, $tanggal_akhir);
		
		return View::make('pages.tampil_peminjaman', compact('nama', 'pinjam', 'awal', 'akhir'));
	}

	public function cari($id_siswa)
	{
		// data
		$nama = Peminjaman::data();
		$pinjam = Peminjaman::cari($id_siswa);
		
		return View::make('pages.cari_peminjaman', compact('nama', 'pinjam'));
	}

	public function getTambah()
	{
		// data
		$buku = Buku::data();
		$siswa = Siswa::data();
		
		return View::make('modal.tambah_peminjaman', compact('buku', 'siswa'));
	}

	public function postTambah()
	{
		// validasi
		$input = Input::all();
		$rules = array(
			'buku' => 'required|numeric|exists:buku,id', 'siswa' => 'required|numeric|exists:siswa,id',
			'jumlah' => 'required|numeric', 'peminjaman' => 'required|date|max:10', 'pengembalian' => 'required|date|max:10'
		);
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$buku = $validasi->messages()->first('buku') ?: '';
			$siswa = $validasi->messages()->first('siswa') ?: '';
			$jumlah = $validasi->messages()->first('jumlah') ?: '';
			$peminjaman = $validasi->messages()->first('peminjaman') ?: '';
			$pengembalian = $validasi->messages()->first('pengembalian') ?: '';
			$status = '';

			return Response::json(compact('buku', 'siswa', 'jumlah', 'peminjaman', 'pengembalian', 'status'));

		// valid
		} else {
			// input
			$id_buku = trim(Input::get('buku'));
			$id_siswa = trim(Input::get('siswa'));
			$jumlah = trim(Input::get('jumlah'));
			$pinjam = trim(date('Y-m-d', strtotime(Input::get('peminjaman'))));
			$kembali = trim(date('Y-m-d', strtotime(Input::get('pengembalian'))));
			
			// tambah data di basisdata
			Peminjaman::tambah($id_buku, $id_siswa, $jumlah, $pinjam, $kembali);

			// data
			$buku = Buku::set($id_buku);
			
			//  sisa
			$jml = $buku->jumlah - $jumlah;

			// rubah data di basisdata
			Buku::jumlah($id_buku, $jml);
		}
	}

	public function getRubah($id)
	{
		// data
		$buku = Buku::data();
		$siswa = Siswa::data();
		$pinjam = Peminjaman::set($id);
		
		return View::make('modal.rubah_peminjaman', compact('buku', 'siswa', 'pinjam'));
	}

	public function postRubah($id)
	{
		// validasi
		$input = Input::all();
		$rules = array(
			'buku' => 'required|numeric|exists:buku,id', 'siswa' => 'required|numeric|exists:siswa,id',
			'jumlah' => 'required|numeric', 'peminjaman' => 'required|date|max:10', 'pengembalian' => 'required|date|max:10'
		);
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$buku = $validasi->messages()->first('buku') ?: '';
			$siswa = $validasi->messages()->first('siswa') ?: '';
			$jumlah = $validasi->messages()->first('jumlah') ?: '';
			$peminjaman = $validasi->messages()->first('peminjaman') ?: '';
			$pengembalian = $validasi->messages()->first('pengembalian') ?: '';
			$status = '';

			return Response::json(compact('buku', 'siswa', 'jumlah', 'peminjaman', 'pengembalian', 'status'));

		// valid
		} else {
			// input
			$id_buku = trim(Input::get('buku'));
			$id_siswa = trim(Input::get('siswa'));
			$jumlah = trim(Input::get('jumlah'));
			$pinjam = trim(date('Y-m-d', strtotime(Input::get('peminjaman'))));
			$kembali = trim(date('Y-m-d', strtotime(Input::get('pengembalian'))));

			// data peminjaman
			$peminjaman = Peminjaman::set($id);

			// data buku
			$buku = Buku::set($id_buku);
			
			// jumlah peminjaman
			$jml_pinjam = $peminjaman->jumlah;

			// jumlah sisa (buku)
			$jml_sisa = $buku->jumlah;
			
			// jumlah peminjaman + jumlah buku
			$total = $jml_pinjam + $jml_sisa;

			// rubah data peminjaman
			Peminjaman::rubah($id, $id_buku, $id_siswa, $jumlah, $pinjam, $kembali);

			// data buku
			$buku = Buku::set($id_buku);

			// jumlah buku = (jumlah peminjaman + jumlah buku) - input jumlah
			$jml = $total - $jumlah;

			// rubah data buku
			Buku::jumlah($id_buku, $jml);
		}
	}

	public function postKembalikan($id, $status)
	{
		Peminjaman::kembalikan($id, $status);
	}

	public function getHapus($id)
	{
		// data
		$pinjam = Peminjaman::set($id);

		return View::make('modal.hapus_peminjaman', compact('pinjam'));
	}

	public function postHapus($id)
	{
		// data peminjaman
		$pinjam = Peminjaman::set($id);

		// id buku
		$id_buku = $pinjam->id_buku;

		// data buku
		$buku = Buku::set($id_buku);

		// jumlah peminjaman
		$jml_pinjam = $pinjam->jumlah;

		// jumlah sisa (buku)
		$jml_sisa = $buku->jumlah;

		// jumlah peminjaman + jumlah sisa
		$total = $jml_pinjam + $jml_sisa;

		// rubah jumlah buku
		Buku::jumlah($id_buku, $total);

		// hapus data peminjaman
		Peminjaman::hapus($id);
	}

	public function getHapusCeklis()
	{
		return View::make('modal.hapus_ceklis_peminjaman');
	}

	public function postHapusCeklis()
	{
		// input
		$id = Input::get('id');
		
		// perulangan
		for ($i = 0; $i < count($id); $i++)
		{
			// data peminjaman
			$pinjam = Peminjaman::set($id[$i]['value']);
			
			// id buku
			$id_buku = $pinjam->id_buku;
			
			// data buku
			$buku = Buku::set($id_buku);
			
			// jumlah peminjaman
			$jml_pinjam = $pinjam->jumlah;
			
			// jumlah sisa
			$jml_sisa = $buku->jumlah;
			
			// jumlah peminjaman + jumlah sisa
			$total = $jml_pinjam + $jml_sisa;

			// rubah jumlah buku
			Buku::jumlah($id_buku, $total);

			// hapus data peminjaman
			Peminjaman::hapus($id[$i]['value']);
		}
	}

	public function pdf()
	{
		// data
		$sekolah = Sekolah::data();
		$pinjam = Peminjaman::semua();

		return PDF::loadHTML(View::make('pdf.peminjaman', compact('sekolah', 'pinjam')))->setPaper('a4')->download('data peminjaman.pdf');
	}

	public function excel()
	{
		// data
		$sekolah = Sekolah::data();
		$pinjam = Peminjaman::semua();
		
		return View::make('excel.peminjaman', compact('sekolah', 'pinjam'));
	}

	public function grafik()
	{
		// data
		$bulan = Peminjaman::bulan();
		$jumlah = Peminjaman::grafik();

		// ada data
		if ($bulan && $jumlah) {
			// tambah array data
			$data = array();
			foreach ($jumlah as $jml) {
				$data[] = $jml->jumlah;
			}

			// respon
			$bulan = $bulan->pinjam;
			$data = $data;
		
		// tidak ada data
		} else {
			// respon
			$bulan = '';
			$data = '';
		}

		return Response::json(compact('bulan', 'data'));	
	}
	
}