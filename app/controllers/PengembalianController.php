<?php

class PengembalianController extends BaseController {

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
		$nama = Pengembalian::data();
		$kembali = Pengembalian::data();
		
		return View::make('pages.pengembalian', compact('nama', 'kembali'));
	}

	public function tampil($awal, $akhir)
	{
		// data
		$nama = Pengembalian::data();
		$tanggal_awal = date('Y-m-d', strtotime($awal));
		$tanggal_akhir= date('Y-m-d', strtotime($akhir));
		$kembali = Pengembalian::tampil($tanggal_awal, $tanggal_akhir);
		
		return View::make('pages.tampil_pengembalian', compact('nama', 'kembali', 'awal', 'akhir'));
	}

	public function cari($id_siswa)
	{
		// data
		$nama = Pengembalian::data();
		$kembali = Pengembalian::cari($id_siswa);
		
		return View::make('pages.cari_pengembalian', compact('nama', 'kembali'));
	}

	public function pdf()
	{
		// data
		$sekolah = Sekolah::data();
		$kembali = Pengembalian::semua();
		
		return PDF::loadHTML(View::make('pdf.pengembalian', compact('sekolah', 'kembali')))->setPaper('a4')->download('data pengembalian.pdf');
	}

	public function excel()
	{
		// data
		$sekolah = Sekolah::data();
		$kembali = Pengembalian::semua();
		
		return View::make('excel.pengembalian', compact('sekolah', 'kembali'));
	}
	
}