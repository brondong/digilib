<?php

class SiswaController extends BaseController {

	public function __construct()
	{
		// filter
		$this->beforeFilter('auth');
		$this->beforeFilter('ajax', array('except' => array('unduhQrCode', 'unduhAnggota', 'pdf', 'excel')));
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

	public function qrCode($id)
	{
		// data
		$siswa = Siswa::set($id);

		// nama
		$nis = $siswa->nis;
		$nama = $siswa->nama;

		// qrcode		
		$path_qr = public_path() . '/qrcode/' . $nis . '.png';
		$qr = new QR;
		$qr->setText($nama);
		$qr->setSize(250);
		$qr->setPadding(0);
		$qr->save($path_qr);

		// gambar
		$gambar = asset('qrcode/' . $nis . '.png');

		return View::make('modal.qrcode', compact('siswa', 'gambar'));
	}

	public function unduhQrCode($id)
	{
		// data
		$siswa = Siswa::set($id);

		// nis
		$nis = $siswa->nis;

		return Response::download(public_path() . '/qrcode/' . $nis . '.png');
	}

	public function anggota($id)
	{
		// data sekolah
		$sekolah = Sekolah::data();
		$logo_sekolah = ($sekolah->logo) ?: 'blank.png';
		$nama_sekolah = $sekolah->nama;
		$alamat_sekolah = $sekolah->alamat;

		// data siswa
		$siswa = Siswa::set($id);
		$foto_siswa = ($siswa->foto) ?: 'blank.png';
		$nis_siswa = $siswa->nis;
		$nama_siswa = $siswa->nama;
		$kelas_siswa = $siswa->kelas;
		$telp_siswa = ($siswa->telp) ?: '-';
		$alamat_siswa = ($siswa->alamat) ?: '-';

		// path font
		$helvetica = public_path() . '/font/helvetica.ttf';
		$calibri = public_path() . '/font/calibri.ttf';

		// canvas
		$canvas = Image::canvas(325, 205);

		// logo sekolah
		$logo = Image::make(public_path() . '/foto/sekolah/' . $logo_sekolah)->resize(null, 38, true);
		$canvas->insert($logo, 5, 5, 'top-left');

		// header nama
		$header_nama = imagettfbbox(10, 0, $helvetica, $nama_sekolah);
		$lebar_header_nama = abs($header_nama[2] - $header_nama[0]);
		$canvas->text($nama_sekolah, (350 / 2) - ($lebar_header_nama / 2), 15, 10, '333', 0, $helvetica);
		
		// nama kartu
		$nama_kartu = imagettfbbox(10, 0, $helvetica, 'KARTU ANGGOTA PERPUSTAKAAN');
		$lebar_nama_kartu = abs($nama_kartu[2] - $nama_kartu[0]);
		$canvas->text('KARTU ANGGOTA PERPUSTAKAAN', (350 / 2) - ($lebar_nama_kartu / 2), 30, 10, '333', 0, $helvetica);

		// header alamat
		$header_alamat = imagettfbbox(8, 0, $calibri, $alamat_sekolah);
		$lebar_header_alamat = abs($header_alamat[2] - $header_alamat[0]);
		$canvas->text($alamat_sekolah, (350 / 2) - ($lebar_header_alamat / 2), 42, 8, '000', 0, $calibri);

		// garis
		$canvas->line('333', 5, 46, 315, 46);

		// nis
		$canvas->text('N I S', 5, 60, 8, '000', 0, $calibri);
		$canvas->text(': ' . $nis_siswa, 40, 60, 8, '000', 0, $calibri);

		// nama
		$canvas->text('Nama', 5, 73, 8, '000', 0, $calibri);
		$canvas->text(': ' . $nama_siswa, 40, 73, 8, '000', 0, $calibri);

		// kelas
		$canvas->text('Kelas', 5, 86, 8, '000', 0, $calibri);
		$canvas->text(': ' . $kelas_siswa, 40, 86, 8, '000', 0, $calibri);

		// telp
		$canvas->text('Telp', 5, 99, 8, '000', 0, $calibri);
		$canvas->text(': ' . $telp_siswa, 40, 99, 8, '000', 0, $calibri);

		// alamat
		$canvas->text('Alamat', 5, 112, 8, '000', 0, $calibri);
		$canvas->text(': ' . $alamat_siswa, 40, 112, 8, '000', 0, $calibri);

		// foto
		$foto = Image::make(public_path() . '/foto/siswa/' . $foto_siswa)->resize(null, 80, true);
		$canvas->insert($foto, 5, 5, 'bottom-left');

		// qrcode
		$path_qr = public_path() . '/qrcode/' . $siswa->nis . '.png';

		// belum ada qrcode
		if (!File::exists($path_qr)) {
			$qr = new QR;
			$qr->setText($nama_siswa);
			$qr->setSize(80);
			$qr->setPadding(0);
			$qr->save($path_qr);
			$qr_code = $path_qr;

		// ada qrcode
		} else {
			$qr_code = Image::make($path_qr)->resize(null, 80, true);
		}

		$canvas->insert($qr_code, 5, 5, 'bottom-right');

		// simpan
		$canvas->save(public_path() . '/anggota/' . $nis_siswa . '.png', 100);

		// gambar
		$gambar = asset('anggota/' . $nis_siswa . '.png');

		return View::make('modal.anggota', compact('siswa', 'gambar'));
	}

	public function unduhAnggota($id)
	{
		// data
		$siswa = Siswa::set($id);

		// nis
		$nis = $siswa->nis;

		return Response::download(public_path() . '/anggota/' . $nis . '.png');
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