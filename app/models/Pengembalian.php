<?php

class Pengembalian extends Eloquent {

	protected $table = 'peminjaman';
	protected $fillable = array('id_siswa', 'id_buku', 'jumlah', 'pinjam', 'kembali', 'status');
	protected $guarded = array('id');

	public static function data()
	{
		return Pengembalian::with('buku', 'siswa')->where('status', '=', 1)->orderBy('kembali', 'desc')->paginate(20);
	}

	public static function semua()
	{
		return Pengembalian::with('buku', 'siswa')->where('status', '=', 1)->orderBy('kembali', 'desc')->get();
	}

	public static function tampil($tanggal_awal, $tanggal_akhir)
	{
		return Peminjaman::whereRaw('kembali >= ? and kembali <= ? and status = ?', array($tanggal_awal, $tanggal_akhir, 1))->orderBy('kembali', 'asc')->paginate(20);
	}

	public static function cari($id_siswa)
	{
		return Peminjaman::whereRaw('id_siswa = ? and status = ?', array($id_siswa, 1))->orderBy('kembali', 'desc')->get();
	}

	public function buku()
	{
		return $this->belongsTo('Buku', 'id_buku');
	}

	public function siswa()
	{
		return $this->belongsTo('Siswa', 'id_siswa');
	}
}