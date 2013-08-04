<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelBuku extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buku', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('cover', 20)->nullable();
			$table->string('judul', 100);
			$table->string('penulis', 100)->nullable();
			$table->string('penerbit', 50)->nullable();
			$table->integer('tahun')->nullable();
			$table->integer('jumlah');
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
		Schema::drop('buku');
	}

}
