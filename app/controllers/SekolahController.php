<?php

class SekolahController extends BaseController {

	public function __construct()
	{
		// filter
		$this->beforeFilter('auth');
		$this->beforeFilter('ajax');
		$this->beforeFilter('csrf', array('only' => 'postRubah'));
	}

	public function getRubah()
	{
		// data
		$sekolah = Sekolah::data();

		return View::make('modal.sekolah', compact('sekolah'));
	}

	public function postRubah()
	{
		// validasi
		$input = Input::all();
		$rules = array('nama' => 'required|max:50', 'alamat' => 'required|max:255');
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// respon
			$nama = $validasi->messages()->first('nama') ?: '';
			$alamat = $validasi->messages()->first('alamat') ?: '';
			$status = '';

			return Response::json(compact('nama', 'alamat', 'status'));
		}

		// input
		$nama = strtoupper(Input::get('nama'));
		$alamat = ucwords(Input::get('alamat'));

		// rubah data di basisdata
		Sekolah::rubah($nama, $alamat);
	}

}