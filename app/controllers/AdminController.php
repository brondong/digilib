<?php

class AdminController extends BaseController {

	public function __construct()
	{
		// filter
		$this->beforeFilter('auth', array('except' => array('getLogin', 'postLogin')));
		$this->beforeFilter('guest', array('only' => array('getLogin')));
		$this->beforeFilter('ajax', array('except' => array('home', 'getLogin')));
		$this->beforeFilter('csrf', array('only' => array('postRubahFoto', 'postRubahNama', 'postRubahUsername', 'postRubahPassword')));
	}

	public function home()
	{
		// belum login
		if (Auth::guest()) return Redirect::to_route('login');
		
		// sudah login
		return (Request::ajax()) ? View::make('pages.home') : View::make('layout');
	}

	public function getLogin() {
		return View::make('login');
	}

	public function postLogin()
	{
		// validasi
		$input = Input::all();
		$rules = array('username' => 'required|min:5|max:20|exists:admin,username', 'password' => 'required|min:5');
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$username = $validasi->messages()->first('username') ?: '';
			$password = $validasi->messages()->first('password') ?: '';
			$status = '';

			return Response::json(compact('username', 'password', 'status'));
		}

		// input
		$username = trim(Input::get('username'));
		$password = trim(Input::get('password'));
		$ingat = (trim(Input::get('ingat')) == 1) ? true : false;

		// auth
		$data = compact('username', 'password');

		// cocok
		if (Auth::attempt($data, $ingat)) {
			$status = 'ok';

			return Response::json(compact('status'));

		// tidak cocok
		} else {
			$status = 'error';

			return Response::json(compact('status'));
		}
	}

	public function getRubahFoto()
	{
		return View::make('modal.foto');
	}

	public function postRubahFoto()
	{
		// validasi
		$input = Input::all();
		$rules = array('foto' => 'required|mimes:jpg,jpeg,png|max:5000');
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$foto = $validasi->messages()->first('foto') ?: '';
			
			return Response::json(compact('foto'));

		// valid
		} else {
			// ada foto
			if (Input::hasFile('foto')) {
				// id admin
				$id = Auth::user()->id;
				
				// nama foto
				$foto = date('dmYHis') . '.png';

				// jika admin mempunyai foto maka hapus foto yang dulu
				if (Auth::user()->foto) unlink(public_path() . '/foto/admin/' . Auth::user()->foto);
				
				// unggah foto ke dir "foto/admin"
				Input::file('foto')->move('foto/admin', $foto);
				
				// rubah data di basisdata
				Admin::rubahFoto($id, $foto);

			// tidak ada foto
			} else {
				// pesan
				$foto = 'Foto gagal diunggah.';
				
				return Response::json(compact('foto'));
			}
		}
	}

	public function getRubahNama()
	{
		return View::make('modal.nama');
	}

	public function postRubahNama()
	{
		// validasi
		$input = Input::all();
		$rules = array('nama' => 'required|max:50|nama_baru');
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$nama = $validasi->messages()->first('nama') ?: '';
			
			return Response::json(compact('nama'));
		}

		// id admin
		$id = Auth::user()->id;
		
		// input nama
		$nama = ucwords(Input::get('nama'));

		// rubah data di basisdata
		Admin::rubahNama($id, $nama);
	}

	public function getRubahUsername()
	{
		return View::make('modal.username');
	}

	public function postRubahUsername()
	{
		// validasi
		$input = Input::all();
		$rules = array(
			'username_sekarang' => 'required|min:5|max:20|username_sekarang',
			'username_baru' => 'required|min:5|max:20|different:username_sekarang|unique:admin,username',
			'konfirmasi_username' => 'required|min:5|max:20|same:username_baru',
		);
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$username_sekarang = $validasi->messages()->first('username_sekarang') ?: '';
			$username_baru = $validasi->messages()->first('username_baru') ?: '';
			$konfirmasi_username = $validasi->messages()->first('konfirmasi_username') ?: '';
			$status = '';

			return Response::json(compact('username_sekarang', 'username_baru', 'konfirmasi_username', 'status'));
		}

		// id admin
		$id = Auth::user()->id;

		// input
		$username_baru = Input::get('username_baru');
		
		// rubah data di basisdata
		Admin::rubahUsername($id, $username_baru);
	}

	public function getRubahPassword()
	{
		return View::make('modal.password');
	}

	public function postRubahPassword()
	{
		// validasi
		$input = Input::all();
		$rules = array(
			'password_sekarang' => 'required|min:6|password_sekarang',
			'password_baru' => 'required|min:6|different:password_sekarang',
			'konfirmasi_password' => 'required|min:6|same:password_baru',
		);
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$password_sekarang = $validasi->messages()->first('password_sekarang') ?: '';
			$password_baru = $validasi->messages()->first('password_baru') ?: '';
			$konfirmasi_password = $validasi->messages()->first('konfirmasi_password') ?: '';
			$status = '';

			return Response::json(compact('password_sekarang', 'password_baru', 'konfirmasi_password', 'status'));
		}

		// id admin
		$id = Auth::user()->id;
		
		// input
		$password_baru = Hash::make(Input::get('password_baru'));
		
		// rubah data di basisdata
		Admin::rubahPassword($id, $password_baru);
	}

	public function logout()
	{
		// logout admin
		Auth::logout();
	}

}