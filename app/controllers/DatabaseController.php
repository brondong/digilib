<?php

use Rah\Danpu\Dump;
use Rah\Danpu\Export;
use Rah\Danpu\Import;

class DatabaseController extends BaseController {

	public function __construct()
	{
		// filter
		$this->beforeFilter('auth');
		$this->beforeFilter('csrf', array('only' => array('restore')));

		$this->dsn = 'mysql:dbname=' . Config::get('database.connections.mysql.database', 'digilib') . ';host=127.0.0.1';
		$this->user = Config::get('database.connections.mysql.username', 'root');
		$this->pass = Config::get('database.connections.mysql.password', '');
	}

	public function backup()
	{
		// path file
		$file = storage_path() .  '/backups/' . date('dmYHis') . '.sql';

		// dump database
		$dump = new Dump;

		$dump->file($file)->dsn($this->dsn)->user($this->user)->pass($this->pass);

		new Export($dump);

		// unduh file dump
		return Response::download($file, date('dmYHis') . '.sql');
	}

	public function getRestore()
	{
		return View::make('modal.restore');
	}

	public function postRestore()
	{
		// validasi
		$input = Input::all();
		$rules = array('sql' => 'required|sql');
		$validasi = Validator::make(Input::all(), $rules);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$sql = $validasi->messages()->first('sql') ?: '';
			
			return Response::json(compact('sql'));

		// valid
		} else {
			// ada sql
			if (Input::hasFile('sql')) {
				// nama sql
				$sql = date('dmYHis') . '.sql';
				
				// unggah sql ke dir "app/storage/restores"
				Input::file('sql')->move(storage_path() . '/restores/', $sql);

				// path file
				$file = storage_path() .  '/restores/' . $sql;

				// dump database
				$dump = new Dump;

				$dump->file($file)->dsn($this->dsn)->user($this->user)->pass($this->pass);

				new Import($dump);

				// hapus file restore
				unlink($file);

			// tidak ada sql
			} else {
				// pesan
				$sql = 'Sql gagal diunggah.';
				
				return Response::json(compact('sql'));
			}
		}
	}

}