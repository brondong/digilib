<?php

class Buku extends Eloquent {

	protected $table = 'buku';
	protected $fillable = array('cover', 'judul', 'penulis', 'penerbit', 'tahun', 'jumlah');
	protected $guarded = array('id');

	public static function semua()
	{
		return Buku::orderBy('judul', 'asc')->get();
	}

	public static function data()
	{
		return Buku::orderBy('judul', 'asc')->paginate(20);
	}

	public static function urut($kolom, $tipe)
	{
		return Buku::orderBy($kolom, $tipe)->paginate(20);
	}

	public static function judul()
	{
		return Buku::orderBy('judul', 'asc')->get();
	}

	public static function cari($judul)
	{
		return Buku::where('judul', 'LIKE', '%' . $judul . '%')->orderBy('judul', 'asc')->get();
	}

	public static function tambah($cover, $judul, $penulis, $penerbit, $tahun, $jumlah)
	{
		Buku::create(compact('cover', 'judul', 'penulis', 'penerbit', 'tahun', 'jumlah'));
	}

	public static function set($id)
	{
		return Buku::find($id);
	}

	public static function rubah($id, $cover, $judul, $penulis, $penerbit, $tahun, $jumlah)
	{
		$buku = Buku::find($id);
		if ($cover != null) $buku->cover = $cover;
		$buku->judul = $judul;
		$buku->penulis = $penulis;
		$buku->penerbit = $penerbit;
		$buku->tahun = $tahun;
		$buku->jumlah = $jumlah;
		$buku->save();
	}

	public static function hapus($id)
	{
		Buku::destroy($id);
	}

	public static function jumlah($id_buku, $jml)
	{
		$buku = Buku::find($id_buku);
		$buku->jumlah = $jml;
		$buku->save();
	}
}