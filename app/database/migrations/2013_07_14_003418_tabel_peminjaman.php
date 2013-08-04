<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelPeminjaman extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('peminjaman', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_buku');
			$table->integer('id_siswa');
			$table->integer('jumlah');
			$table->date('pinjam');
			$table->date('kembali');
			$table->integer('status');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('peminjaman');
	}

}
