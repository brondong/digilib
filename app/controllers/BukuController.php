<?php

class BukuController extends BaseController {

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
		$judul = Buku::judul();
		$buku = Buku::data();
		
		return View::make('pages.buku', compact('judul', 'buku'));
	}

	public function urut($kolom, $tipe)
	{
		// data
		$judul = Buku::judul();
		$buku = Buku::urut($kolom, $tipe);
		
		return View::make('pages.urut_buku', compact('judul', 'buku', 'kolom', 'tipe'));
	}

	public function cari($judul)
	{
		// data
		$judul_buku = Buku::judul();
		$buku = Buku::cari(urldecode($judul));
		
		return View::make('pages.cari_buku', compact('judul_buku', 'buku'));
	}

	public function cover($id)
	{
		// data
		$buku = Buku::set($id);
		
		return View::make('modal.cover', compact('buku'));
	}

	public function getTambah()
	{
		return View::make('modal.tambah_buku');
	}

	public function postTambah()
	{
		// validasi
		$input = Input::all();
		$rules = array(
			'cover' => 'mimes:jpg,jpeg,png|max:5000', 'judul' => 'required|max:100',
			'penulis' => 'max:100', 'penerbit' => 'max:50', 'tahun' => 'integer','jumlah' => 'required|integer'
		);
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$cover = $validasi->messages()->first('cover') ?: '';
			$judul = $validasi->messages()->first('judul') ?: '';
			$penulis = $validasi->messages()->first('penulis') ?: '';
			$penerbit = $validasi->messages()->first('penerbit') ?: '';
			$tahun = $validasi->messages()->first('tahun') ?: '';
			$jumlah = $validasi->messages()->first('jumlah') ?: '';
			$status = '';

			return Response::json(compact('cover', 'judul', 'penulis', 'penerbit', 'tahun', 'jumlah', 'status'));
		} else {
			// ada cover
			if (Input::hasFile('cover'))
			{
				// nama cover
				$cover = date('dmYHis') . '.png';
				
				// unggah cover ke dir "foto/buku"
				Input::file('cover')->move('foto/buku', $cover);
			
			// tidak ada cover
			} else {
				$cover = null;
			}

			// input
			$judul = trim(ucwords(Input::get('judul')));
			$penulis = trim(ucwords(Input::get('penulis')));
			$penerbit = trim(ucwords(Input::get('penerbit')));
			$tahun = trim(Input::get('tahun'));
			$jumlah = trim(Input::get('jumlah'));
			
			// tambah data di basisdata
			Buku::tambah($cover, $judul, $penulis, $penerbit, $tahun, $jumlah);
		}
	}

	public function getRubah($id)
	{
		// data
		$buku = Buku::set($id);
		
		return View::make('modal.rubah_buku', compact('buku'));
	}

	public function postRubah($id)
	{
		// validasi
		$input = Input::all();
		$rules = array(
			'cover' => 'mimes:jpg,jpeg,png|max:5000', 'judul' => 'required|max:100',
			'penulis' => 'max:100', 'penerbit' => 'max:50', 'tahun' => 'integer','jumlah' => 'required|integer'
		);
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$cover = $validasi->messages()->first('cover') ?: '';
			$judul = $validasi->messages()->first('judul') ?: '';
			$penulis = $validasi->messages()->first('penulis') ?: '';
			$penerbit = $validasi->messages()->first('penerbit') ?: '';
			$tahun = $validasi->messages()->first('tahun') ?: '';
			$jumlah = $validasi->messages()->first('jumlah') ?: '';
			$status = '';

			return Response::json(compact('cover', 'judul', 'penulis', 'penerbit', 'tahun', 'jumlah', 'status'));

		// valid
		} else {
			// ada cover
			if (Input::hasFile('cover'))
			{
				// data
				$buku = Buku::set($id);
				
				// jika buku mempunyai cover maka hapus cover yang dulu
				if ($buku->cover) unlink(public_path() . '/foto/buku/' . $buku->cover);

				// nama cover baru
				$cover = date('dmYHis') . '.png';

				// unggah cover baru ke dir "foto/buku"
				Input::file('cover')->move('foto/buku', $cover);
			
			// tidak ada cover
			} else {
				$cover = null;
			}

			// input
			$judul = trim(ucwords(Input::get('judul')));
			$penulis = trim(ucwords(Input::get('penulis')));
			$penerbit = trim(ucwords(Input::get('penerbit')));
			$tahun = trim(Input::get('tahun'));
			$jumlah = trim(Input::get('jumlah'));

			// rubah data di basisdata
			Buku::rubah($id, $cover, $judul, $penulis, $penerbit, $tahun, $jumlah);
		}
	}

	public function getHapus($id)
	{
		// data
		$buku = Buku::set($id);
		
		return View::make('modal.hapus_buku', compact('buku'));
	}

	public function postHapus($id)
	{
		// data buku
		$buku = Buku::set($id);

		// jika buku mempunyai cover maka hapus cover yang dulu
		if ($buku->cover) unlink(public_path() . '/foto/buku/' . $buku->cover);

		// hapus data di basisdata
		Peminjaman::hapusBuku($id);
		Buku::hapus($id);
	}

	public function getHapusCeklis()
	{
		return View::make('modal.hapus_ceklis_buku');
	}

	public function postHapusCeklis()
	{
		// input
		$id = Input::get('id');
		
		// perulangan
		for ($i = 0; $i < count($id); $i++)
		{
			// data
			$buku = Buku::set($id[$i]['value']);
			
			// jika buku mempunyai cover maka hapus cover yang dulu
			if ($buku->cover) unlink(public_path() . '/foto/buku/' . $buku->cover);
			
			// hapus data di basisdata
			Peminjaman::hapusBuku($id[$i]['value']);
			Buku::hapus($id[$i]['value']);
		}
	}

	public function pdf()
	{
		// data
		$sekolah = Sekolah::data();
		$buku = Buku::semua();

		return PDF::loadHTML(View::make('pdf.buku', compact('sekolah', 'buku')))->setPaper('a4')->download('data buku.pdf');
	}

	public function excel()
	{
		// data
		$sekolah = Sekolah::data();
		$buku = Buku::semua();
		
		return View::make('excel.buku', compact('sekolah', 'buku'));
	}
	
}