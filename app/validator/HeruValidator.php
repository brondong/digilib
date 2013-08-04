<?php

class HeruValidator extends Illuminate\Validation\Validator {

	// nama_baru
	public function validateNamaBaru($atr, $val, $par)
	{
		return strtolower($val) != strtolower(Auth::user()->nama);
	}

	// username_sekarang
	public function validateUsernameSekarang($atr, $val, $par)
	{
		return $val == Auth::user()->username;
	}

	// password_sekarang
	public function validatePasswordSekarang($atr, $val, $par)
	{
		return Hash::check($val, Auth::user()->password);
	}

	// sql
	public function validateSql($atr, $val, $par)
	{
		return pathinfo(Input::file('sql')->getClientOriginalName(), PATHINFO_EXTENSION) == 'sql';
	}

}