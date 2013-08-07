<?php

class Sekolah extends Eloquent {

	protected $table = 'sekolah';
	protected $fillable = array('nama', 'alamat');
	protected $guarded = array('id');

	public static function data()
	{
		return Sekolah::find(1);
	}

	public static function rubah($logo, $nama, $alamat)
	{
		$sekolah = Sekolah::find(1);
		$sekolah->logo = $logo;
		$sekolah->nama = $nama;
		$sekolah->alamat = $alamat;
		$sekolah->save();
	}

}