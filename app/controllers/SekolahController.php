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
		$rules = array('logo' => 'mimes:jpg,jpeg,png|max:5000', 'nama' => 'required|max:50', 'alamat' => 'required|max:255');
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// respon
			$logo = $validasi->messages()->first('logo') ?: '';
			$nama = $validasi->messages()->first('nama') ?: '';
			$alamat = $validasi->messages()->first('alamat') ?: '';
			$status = '';

			return Response::json(compact('logo', 'nama', 'alamat', 'status'));
		} else {
			// ada logo
			if (Input::hasFile('logo'))
			{
				// data
				$sekolah = Sekolah::data();
				
				// jika sekolah mempunyai logo maka hapus logo yang dulu
				if ($sekolah->logo) unlink(public_path() . '/foto/sekolah/' . $sekolah->logo);

				// nama logo
				$logo = date('dmYHis') . '.png';
				
				// unggah logo ke dir "foto/sekolah"
				Input::file('logo')->move('foto/sekolah', $logo);
			
			// tidak ada logo
			} else {
				$logo = null;
			}

			// input
			$nama = trim(strtoupper(Input::get('nama')));
			$alamat = trim(ucwords(Input::get('alamat')));

			// rubah data di basisdata
			Sekolah::rubah($logo, $nama, $alamat);
		}
	}

}