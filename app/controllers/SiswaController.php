<?php

class SiswaController extends BaseController {

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
		$nama = Siswa::nama();
		$siswa = Siswa::data();
		
		return View::make('pages.siswa', compact('nama', 'siswa'));
	}

	public function urut($kolom, $tipe)
	{
		// data
		$nama = Siswa::nama();
		$siswa = Siswa::urut($kolom, $tipe);
		
		return View::make('pages.urut_siswa', compact('nama', 'siswa', 'kolom', 'tipe'));
	}

	public function cari($nama)
	{
		// data
		$nama_siswa = Siswa::nama();
		$siswa = Siswa::cari(urldecode($nama));
		
		return View::make('pages.cari_siswa', compact('nama_siswa', 'siswa'));
	}

	public function foto($id)
	{
		// data
		$siswa = Siswa::set($id);
		
		return View::make('modal.avatar', compact('siswa'));
	}

	public function getTambah()
	{
		return View::make('modal.tambah_siswa');
	}

	public function postTambah()
	{
		// validasi
		$input = Input::all();
		$rules = array(
			'foto' => 'mimes:jpg,jpeg,png|max:5000', 'nis' => 'required|numeric|unique:siswa,nis',
			'nama' => 'required|max:50', 'kelas' => 'required|max:10', 'telp' => 'numeric','alamat' => 'max:255'
		);
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// respon
			$foto = $validasi->messages()->first('foto') ?: '';
			$nis = $validasi->messages()->first('nis') ?: '';
			$nama = $validasi->messages()->first('nama') ?: '';
			$kelas = $validasi->messages()->first('kelas') ?: '';
			$telp = $validasi->messages()->first('telp') ?: '';
			$alamat = $validasi->messages()->first('alamat') ?: '';
			$status = '';

			return Response::json(compact('foto', 'nis', 'nama', 'kelas', 'telp', 'alamat', 'status'));

		// valid
		} else {
			// ada foto
			if (Input::hasFile('foto'))
			{
				// nama foto
				$foto = date('dmYHis') . '.png';

				// unggah foto ke dir "foto/siswa"
				Input::file('foto')->move('foto/siswa', $foto);

			// tidak ada foto
			} else {
				$foto = null;
			}

			// input
			$nis = trim(Input::get('nis'));
			$nama = trim(ucwords(Input::get('nama')));
			$kelas = trim(strtoupper(Input::get('kelas')));
			$telp = trim(Input::get('telp'));
			$alamat = trim(ucwords(Input::get('alamat')));

			// tambah data di basisdata
			Siswa::tambah($foto, $nis, $nama, $kelas, $telp, $alamat);
		}
	}

	public function getRubah($id)
	{
		// data
		$siswa = Siswa::set($id);
		
		return View::make('modal.rubah_siswa', compact('siswa'));
	}

	public function postRubah($id)
	{
		// data
		$siswa = Siswa::set($id);

		// validasi
		$input = Input::all();
		$rules = array(
			'foto' => 'mimes:jpg,jpeg,png|max:5000', 'nis' => 'required|numeric|unique:siswa,nis,' . $siswa->id,
			'nama' => 'required|max:50', 'kelas' => 'required|max:10', 'telp' => 'numeric','alamat' => 'max:255'
		);
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// respon
			$foto = $validasi->messages()->first('foto') ?: '';
			$nis = $validasi->messages()->first('nis') ?: '';
			$nama = $validasi->messages()->first('nama') ?: '';
			$kelas = $validasi->messages()->first('kelas') ?: '';
			$telp = $validasi->messages()->first('telp') ?: '';
			$alamat = $validasi->messages()->first('alamat') ?: '';
			$status = '';

			return Response::json(compact('foto', 'nis', 'nama', 'kelas', 'telp', 'alamat', 'status'));

		// valid
		} else {
			// ada foto
			if (Input::hasFile('foto'))
			{
				// data
				$siswa = Siswa::set($id);

				// jika siswa mempunyai foto maka hapus foto yang dulu
				if ($siswa->foto) unlink(public_path() . '/foto/siswa/' . $siswa->foto);

				// nama foto
				$foto = date('dmYHis') . '.png';

				// unggah foto ke dir "foto/siswa"
				Input::file('foto')->move('foto/siswa', $foto);

			// tidak ada foto
			} else {
				$foto = null;
			}

			// input
			$nis = trim(Input::get('nis'));
			$nama = trim(ucwords(Input::get('nama')));
			$kelas = trim(strtoupper(Input::get('kelas')));
			$telp = trim(Input::get('telp'));
			$alamat = trim(ucwords(Input::get('alamat')));

			// rubah data di basisdata
			Siswa::rubah($id, $foto, $nis, $nama, $kelas, $telp, $alamat);
		}
	}

	public function getHapus($id)
	{
		// data
		$siswa = Siswa::set($id);

		return View::make('modal.hapus_siswa', compact('siswa'));
	}

	public function postHapus($id)
	{
		// data
		$siswa = Siswa::set($id);

		// jika siswa mempunyai foto maka hapus foto yang dulu
		if ($siswa->foto) unlink(public_path() . '/foto/siswa/' . $siswa->foto);

		// hapus data di basisdata
		Peminjaman::hapusSiswa($id);
		Siswa::hapus($id);
	}

	public function getHapusCeklis()
	{
		return View::make('modal.hapus_ceklis_siswa');
	}

	public function postHapusCeklis()
	{
		// input
		$id = Input::get('id');
		
		// perulangan
		for ($i = 0; $i < count($id); $i++)
		{
			// data
			$siswa = Siswa::set($id[$i]['value']);

			// jika siswa mempunyai foto maka hapus foto yang dulu
			if ($siswa->foto) unlink(public_path() . '/foto/siswa/' . $siswa->foto);

			// hapus data di basisdata
			Peminjaman::hapusSiswa($id[$i]['value']);
			Siswa::hapus($id[$i]['value']);
		}
	}

	public function pdf()
	{
		// data
		$sekolah = Sekolah::data();
		$siswa = Siswa::semua();

		return PDF::loadHTML(View::make('pdf.siswa', compact('sekolah', 'siswa')))->setPaper('a4')->download('data siswa.pdf');
	}

	public function excel()
	{
		// data
		$sekolah = Sekolah::data();
		$siswa = Siswa::semua();
		
		return View::make('excel.siswa', compact('sekolah', 'siswa'));
	}
}