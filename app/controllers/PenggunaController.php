<?php

class PenggunaController extends BaseController {

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
		$admin = Admin::data();
		
		return View::make('pages.pengguna', compact('admin'));
	}

	public function foto($id)
	{
		// data
		$admin = Admin::set($id);
		
		return View::make('modal.foto_pengguna', compact('admin'));
	}

	public function getTambah()
	{
		return View::make('modal.tambah_pengguna');
	}

	public function postTambah()
	{	
		// validasi	
		$input = Input::all();
		$rules = array(
			'foto' => 'mimes:jpg,jpeg,png|max:5000', 'nama' => 'required|max:50',
			'username' => 'required|min:5|max:20|unique:admin,username', 	'password' => 'required|min:6',
		);
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// respon
			$foto = $validasi->messages()->first('foto') ?: '';
			$nama = $validasi->messages()->first('nama') ?: '';
			$username = $validasi->messages()->first('username') ?: '';
			$password = $validasi->messages()->first('password') ?: '';
			$status = '';

			return Response::json(compact('foto', 'nama', 'username', 'password', 'status'));

		// valid
		} else {
			// ada foto
			if (Input::hasFile('foto'))
			{
				// nama foto
				$foto = date('dmYHis') . '.png';

				// unggah foto ke dir "foto/admin"
				Input::file('foto')->move('foto/admin', $foto);

			// tidak ada foto
			} else {
				$foto = null;
			}

			// input
			$nama = trim(ucwords(Input::get('nama')));
			$username = trim(Input::get('username'));
			$password = Hash::make(trim(Input::get('password')));

			// tambah data di basisdata
			Admin::tambah($foto, $nama, $username, $password);
		}
	}

	public function getRubah($id)
	{
		// data
		$admin = Admin::set($id);
		
		return View::make('modal.rubah_pengguna', compact('admin'));
	}

	public function postRubah($id)
	{
		// validasi
		$input = Input::all();
		$rules = array(
			'foto' => 'mimes:jpg,jpeg,png|max:5000', 'nama' => 'required|max:50',
			'username' => 'required|min:5|max:20|unique:admin,username,' . $id, 'password' => 'required|min:6'
		);
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// respon
			$foto = $validasi->messages()->first('foto') ?: '';
			$nama = $validasi->messages()->first('nama') ?: '';
			$username = $validasi->messages()->first('username') ?: '';
			$password = $validasi->messages()->first('password') ?: '';
			$status = '';

			return Response::json(compact('foto', 'nama', 'username', 'password', 'status'));

		// valid
		} else {
			// ada foto
			if (Input::hasFile('foto'))
			{
				// data
				$admin = Admin::set($id);

				// jika admin mempunyai foto maka hapus foto yang dulu
				if ($admin->foto) unlink(public_path() . '/foto/admin/' . $admin->foto);

				// nama foto
				$foto = date('dmYHis') . '.png';
				
				// unggah foto baru ke dir "foto/admin"
				Input::file('foto')->move('foto/admin', $foto);

			// tidak ada foto
			} else {
				$foto = null;
			}

			//  input
			$nama = trim(ucwords(Input::get('nama')));
			$username = trim(Input::get('username'));
			$password = Hash::make(trim(Input::get('password')));

			// rubah data di basisdata
			Admin::rubah($id, $foto, $nama, $username, $password);
		}
	}

	public function getHapus($id)
	{
		// data
		$admin = Admin::set($id);
		
		return View::make('modal.hapus_pengguna', compact('admin'));
	}

	public function postHapus($id)
	{
		// data
		$admin = Admin::set($id);

		// jika admin mempunyai foto maka hapus foto yang dulu
		if ($admin->foto) unlink(public_path() . '/foto/admin/' . $admin->foto);

		// hapus data di basisdata
		Admin::hapus($id);
	}

	public function getHapusCeklis()
	{
		return View::make('modal.hapus_ceklis_pengguna');
	}

	public function postHapusCeklis()
	{
		// input
		$id = Input::get('id');
		
		// perulangan
		for ($i = 0; $i < count($id); $i++)
		{
			// data
			$admin = Admin::set($id[$i]['value']);

			// jika admin mempunyai foto maka hapus foto yang dulu
			if ($admin->foto) unlink(public_path() . '/foto/admin/' . $admin->foto);

			// hapus data di basisdata
			Admin::hapus($id[$i]['value']);
		}
	}

	public function pdf()
	{
		// data
		$sekolah = Sekolah::data();
		$admin = Admin::semua();

		return PDF::loadHTML(View::make('pdf.pengguna', compact('sekolah', 'admin')))->setPaper('a4')->download('data pengguna.pdf');
	}

	public function excel()
	{
		// data
		$sekolah = Sekolah::data();
		$admin = Admin::semua();
		
		return View::make('excel.pengguna', compact('sekolah', 'admin'));
	}
	
}