<?php

class Siswa extends Eloquent {

	protected $table = 'siswa';
	protected $fillable = array('foto', 'nis', 'nama', 'kelas', 'telp', 'alamat');
	protected $guarded = array('id');

	public static function data()
	{
		return Siswa::orderBy('nis', 'asc')->paginate(20);
	}

	public static function semua()
	{
		return Siswa::orderBy('nis', 'asc')->get();
	}

	public static function urut($kolom, $tipe)
	{
		return Siswa::orderBy($kolom, $tipe)->paginate(20);
	}

	public static function nama()
	{
		return Siswa::orderBy('nama', 'asc')->get();
	}

	public static function cari($nama)
	{
		return Siswa::where('nama', 'LIKE', '%' . $nama . '%')->orderBy('nama', 'asc')->get();
	}

	public static function tambah($foto, $nis, $nama, $kelas, $telp, $alamat)
	{
		Siswa::create(compact('foto', 'nis', 'nama', 'kelas', 'telp', 'alamat'));
	}

	public static function set($id)
	{
		return Siswa::find($id);
	}

	public static function rubah($id, $foto, $nis, $nama, $kelas, $telp, $alamat)
	{
		$siswa = Siswa::find($id);
		if ($foto != null) $siswa->foto = $foto;
		$siswa->nis = $nis;
		$siswa->nama = $nama;
		$siswa->kelas = $kelas;
		$siswa->telp = $telp;
		$siswa->alamat = $alamat;
		$siswa->save();
	}

	public static function hapus($id)
	{
		Siswa::destroy($id);
	}
}