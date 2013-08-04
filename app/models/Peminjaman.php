<?php

class Peminjaman extends Eloquent {

	protected $table = 'peminjaman';
	protected $fillable = array('id_siswa', 'id_buku', 'jumlah', 'pinjam', 'kembali', 'status');
	protected $guarded = array('id');

	public static function data()
	{
		return Peminjaman::with('buku', 'siswa')->orderBy('pinjam', 'desc')->paginate(20);
	}

	public static function semua()
	{
		return Peminjaman::with('buku', 'siswa')->orderBy('pinjam', 'desc')->get();
	}

	public static function tampil($tanggal_awal, $tanggal_akhir)
	{
		return Peminjaman::whereRaw('pinjam >= ? and pinjam <= ?', array($tanggal_awal, $tanggal_akhir))->orderBy('pinjam', 'asc')->paginate(20);
	}

	public static function cari($id_siswa)
	{
		return Peminjaman::where('id_siswa', '=', $id_siswa)->orderBy('pinjam', 'desc')->get();
	}

	public static function tambah($id_buku, $id_siswa, $jumlah, $pinjam, $kembali)
	{
		Peminjaman::create(compact('id_buku', 'id_siswa', 'jumlah', 'pinjam', 'kembali'));
	}

	public static function set($id)
	{
		return Peminjaman::find($id);
	}

	public static function rubah($id, $id_buku, $id_siswa, $jumlah, $pinjam, $kembali)
	{
		$peminjaman = Peminjaman::find($id);
		$peminjaman->id_buku = $id_buku;
		$peminjaman->id_siswa = $id_siswa;
		$peminjaman->jumlah = $jumlah;
		$peminjaman->pinjam = $pinjam;
		$peminjaman->kembali = $kembali;
		$peminjaman->save();
	}

	public static function kembalikan($id, $status)
	{
		$peminjaman = Peminjaman::find($id);
		$peminjaman->status = $status;
		$peminjaman->save();
	}

	public static function hapus($id)
	{
		Peminjaman::destroy($id);
	}

	public static function bulan()
	{
		return Peminjaman::orderBy('pinjam', 'asc')->groupBy(DB::raw('DAY(pinjam)'))->first();
	}

	public static function grafik()
	{
		return Peminjaman::orderBy('pinjam', 'asc')->groupBy( DB::raw('DAY(pinjam)'))->get();
	}

	public static function hapusBuku($id)
	{
		Peminjaman::where('id_buku', '=', $id)->delete();
	}

	public static function hapusSiswa($id)
	{
		Peminjaman::where('id_siswa', '=', $id)->delete();
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