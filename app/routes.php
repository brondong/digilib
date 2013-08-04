<?php

Route::get('/', array('as' => 'home', 'uses' => 'AdminController@home'));

Route::get('login', array('as' => 'login', 'uses' => 'AdminController@getLogin'));
Route::post('login', array('uses' => 'AdminController@postLogin'));



Route::get('buku', array('as' => 'data_buku', 'uses' => 'BukuController@data'));
Route::get('buku/?page={no}', array('before' => 'ajax'))->where('no', '\d+');

Route::get('buku/urut/{kolom?}/{tipe?}', array('as' => 'urut_buku', 'uses' => 'BukuController@urut'))
	->where(array('kolom' => '[a-z]+', 'tipe' => '[a-z]+'));

Route::get('cari_buku/{judul?}', array('as' => 'cari_buku', 'uses' => 'BukuController@cari'));

Route::get('cover_buku/{id?}', array('as' => 'cover_buku', 'uses' => 'BukuController@cover'))->where('id', '\d+');

Route::get('buku/tambah', array('as' => 'tambah_buku', 'uses' => 'BukuController@getTambah'));
Route::post('buku/tambah', array('uses' => 'BukuController@postTambah'));

Route::get('buku/rubah/{id?}', array('as' => 'rubah_buku', 'uses' => 'BukuController@getRubah'))->where('id', '\d+');
Route::post('buku/rubah/{id?}', array('uses' => 'BukuController@postRubah'))->where('id', '\d+');

Route::get('buku/hapus/{id?}', array('as' => 'hapus_buku', 'uses' => 'BukuController@getHapus'))->where('id', '\d+');
Route::post('buku/hapus/{id?}', array('uses' => 'BukuController@postHapus'))->where('id', '\d+');

Route::get('buku/hapus/ceklis', array('as' => 'hapus_ceklis_buku', 'uses' => 'BukuController@getHapusCeklis'));
Route::post('buku/hapus/ceklis', array('uses' => 'BukuController@postHapusCeklis'));

Route::get('buku/pdf', array('as' => 'pdf_buku', 'uses' => 'BukuController@pdf'));

Route::get('buku/excel', array('as' => 'excel_buku', 'uses' => 'BukuController@excel'));



Route::get('siswa', array('as' => 'data_siswa', 'uses' => 'SiswaController@data'));
Route::get('siswa/?page={no}', array('before' => 'ajax'))->where('no', '\d+');

Route::get('siswa/urut/{kolom?}/{tipe?}', array('as' => 'urut_siswa', 'uses' => 'siswaController@urut'))
	->where(array('kolom' => '[a-z]+', 'tipe' => '[a-z]+'));

Route::get('siswa/cari/{nama?}', array('as' => 'cari_siswa', 'uses' => 'SiswaController@cari'));

Route::get('siswa/foto/{id?}', array('as' => 'foto_siswa', 'uses' => 'SiswaController@foto'))->where('id', '\d+');

Route::get('siswa/tambah', array('as' => 'tambah_siswa', 'uses' => 'SiswaController@getTambah'));
Route::post('siswa/tambah', array('uses' => 'SiswaController@postTambah'));

Route::get('siswa/rubah/{id?}', array('as' => 'rubah_siswa', 'uses' => 'SiswaController@getRubah'))->where('id', '\d+');
Route::post('siswa/rubah/{id?}', array('uses' => 'SiswaController@postRubah'))->where('id', '\d+');

Route::get('siswa/hapus/{id?}', array('as' => 'hapus_siswa', 'uses' => 'SiswaController@getHapus'))->where('id', '\d+');
Route::post('siswa/hapus/{id?}', array('uses' => 'SiswaController@postHapus'))->where('id', '\d+');

Route::get('siswa/hapus/ceklis', array('as' => 'hapus_ceklis_siswa', 'uses' => 'SiswaController@getHapusCeklis'));
Route::post('siswa/hapus/ceklis', array('uses' => 'SiswaController@postHapusCeklis'));

Route::get('siswa/pdf', array('as' => 'pdf_siswa', 'uses' => 'SiswaController@pdf'));

Route::get('siswa/excel', array('as' => 'excel_siswa', 'uses' => 'SiswaController@excel'));



Route::get('peminjaman', array('as' => 'data_peminjaman', 'uses' => 'PeminjamanController@data'));
Route::get('peminjaman/?page={no}', array('before' => 'ajax'))->where('no', '\d+');

Route::get('peminjaman/tampil/{tanggal_?}/{tanggal__?}', array('as' => 'tampil_peminjaman', 'uses' => 'PeminjamanController@tampil'));

Route::get('peminjaman/cari/{id_siswa?}', array('as' => 'cari_peminjaman', 'uses' => 'PeminjamanController@cari'))->where('id_siswa', '\d+');

Route::get('peminjaman/tambah', array('as' => 'tambah_peminjaman', 'uses' => 'PeminjamanController@getTambah'));
Route::post('peminjaman/tambah', array('uses' => 'PeminjamanController@postTambah'));

Route::get('peminjaman/rubah/{id?}', array('as' => 'rubah_peminjaman', 'uses' => 'PeminjamanController@getRubah'))->where('id', '\d+');
Route::post('peminjaman/rubah/{id?}', array('uses' => 'PeminjamanController@postRubah'))->where('id', '\d+');

Route::post('peminjaman/kembalikan/{id?}/{status?}', array('as' => 'kembalikan_peminjaman', 'uses' => 'PeminjamanController@postKembalikan'))->where(array('id' => '\d+', 'status' => '\d'));

Route::get('peminjaman/hapus/{id?}', array('as' => 'hapus_peminjaman', 'uses' => 'PeminjamanController@getHapus'))->where('id', '\d+');
Route::post('peminjaman/hapus/{id?}', array('uses' => 'PeminjamanController@postHapus'))->where('id', '\d+');

Route::get('peminjaman/hapus/ceklis', array('as' => 'hapus_ceklis_peminjaman', 'uses' => 'PeminjamanController@getHapusCeklis'));
Route::post('peminjaman/hapus/ceklis', array('uses' => 'PeminjamanController@postHapusCeklis'));

Route::get('peminjaman/pdf', array('as' => 'pdf_peminjaman', 'uses' => 'PeminjamanController@pdf'));

Route::get('peminjaman/excel', array('as' => 'excel_peminjaman', 'uses' => 'PeminjamanController@excel'));



Route::get('pengembalian', array('as' => 'data_pengembalian', 'uses' => 'PengembalianController@data'));
Route::get('pengembalian/?page={no}', array('before' => 'ajax'))->where('no', '\d+');

Route::get('pengembalian/tampil/{tanggal_?}/{tanggal__?}', array('as' => 'tampil_pengembalian', 'uses' => 'PengembalianController@tampil'));

Route::get('pengembalian/cari/{id_siswa?}', array('as' => 'cari_pengembalian', 'uses' => 'PengembalianController@cari'))->where('id_siswa', '\d+');

Route::get('pengembalian/pdf', array('as' => 'pdf_pengembalian', 'uses' => 'PengembalianController@pdf'));

Route::get('pengembalian/excel', array('as' => 'excel_pengembalian', 'uses' => 'PengembalianController@excel'));



Route::get('grafik', array('as' => 'grafik', 'uses' => 'PeminjamanController@grafik'));



Route::get('pengguna', array('as' => 'data_pengguna', 'uses' => 'PenggunaController@data'));
Route::get('pengguna/?page={no}', array('before' => 'ajax'))->where('no', '\d+');

Route::get('pengguna/tambah', array('as' => 'tambah_pengguna', 'uses' => 'PenggunaController@getTambah'));
Route::post('pengguna/tambah', array('uses' => 'PenggunaController@postTambah'));

Route::get('pengguna/rubah/{id?}', array('as' => 'rubah_pengguna', 'uses' => 'PenggunaController@getRubah'))->where('id', '\d+');
Route::post('pengguna/rubah/{id?}', array('uses' => 'PenggunaController@postRubah'))->where('id', '\d+');

Route::get('pengguna/foto/{id?}', array('as' => 'foto_pengguna', 'uses' => 'PenggunaController@foto'))->where('id', '\d+');

Route::get('pengguna/hapus/{id?}', array('as' => 'hapus_pengguna', 'uses' => 'PenggunaController@getHapus'))->where('id', '\d+');
Route::post('pengguna/hapus/{id?}', array('uses' => 'PenggunaController@postHapus'))->where('id', '\d+');

Route::get('pengguna/hapus/ceklis', array('as' => 'hapus_ceklis_pengguna', 'uses' => 'PenggunaController@getHapusCeklis'));
Route::post('pengguna/hapus/ceklis', array('uses' => 'PenggunaController@postHapusCeklis'));

Route::get('pengguna/pdf', array('as' => 'pdf_pengguna', 'uses' => 'PenggunaController@pdf'));

Route::get('pengguna/excel', array('as' => 'excel_pengguna', 'uses' => 'PenggunaController@excel'));



Route::get('backup', array('as' => 'backup', 'uses' => 'DatabaseController@backup'));

Route::get('restore', array('as' => 'restore', 'uses' => 'DatabaseController@getRestore'));
Route::post('restore', array('uses' => 'DatabaseController@postRestore'));



Route::get('admin/foto', array('as' => 'rubah_foto', 'uses' => 'AdminController@getRubahFoto'));
Route::post('admin/foto', array('uses' => 'AdminController@postRubahFoto'));

Route::get('admin/nama', array('as' => 'rubah_nama', 'uses' => 'AdminController@getRubahNama'));
Route::post('admin/nama', array('uses' => 'AdminController@postRubahNama'));

Route::get('admin/sekolah', array('as' => 'rubah_sekolah', 'uses' => 'SekolahController@getRubah'));
Route::post('admin/sekolah', array('uses' => 'SekolahController@postRubah'));

Route::get('admin/username', array('as' => 'rubah_username', 'uses' => 'AdminController@getRubahUsername'));
Route::post('admin/username', array('uses' => 'AdminController@postRubahUsername'));

Route::get('admin/password', array('as' => 'rubah_password', 'uses' => 'AdminController@getRubahPassword'));
Route::post('admin/password', array('uses' => 'AdminController@postRubahPassword'));

Route::get('logout', array('as' => 'logout', 'uses' => 'AdminController@logout'));