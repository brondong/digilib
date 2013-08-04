<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Admin extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'admin';
	protected $fillable = array('foto', 'nama', 'username', 'password');
	protected $guarded = array('id');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public static function semua()
	{
		return Admin::orderBy('nama', 'asc')->get();
	}

	public static function data()
	{
		return Admin::orderBy('nama', 'asc')->paginate(20);
	}

	public static function tambah($foto, $nama, $username, $password)
	{
		Admin::create(compact('foto', 'nama', 'username', 'password'));
	}

	public static function set($id) {
		return Admin::find($id);
	}

	public static function rubah($id, $foto, $nama, $username, $password)
	{
		$admin = Admin::find($id);
		$admin->foto = $foto;
		$admin->nama = $nama;
		$admin->username = $username;
		$admin->password = $password;
		$admin->save();
	}

	public static function hapus($id) {
		Admin::destroy($id);
	}

	public static function rubahFoto($id, $foto)
	{
		$me = Admin::find($id);
		$me->foto = $foto;
		$me->save();
	}

	public static function rubahNama($id, $nama)
	{
		$me = Admin::find($id);
		$me->nama = $nama;
		$me->save();
	}

	public static function rubahUsername($id, $username_baru)
	{
		$me = Admin::find($id);
		$me->username = $username_baru;
		$me->save();
	}

	public static function rubahPassword($id, $password_baru)
	{
		$me = Admin::find($id);
		$me->password = $password_baru;
		$me->save();
	}
}