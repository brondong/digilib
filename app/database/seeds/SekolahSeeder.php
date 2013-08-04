<?php

class SekolahSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$sekolah = array(
			'nama' => 'NAMA SEKOLAH',
			'alamat' => 'Tuliskan Alamat Sekolah Disini',
			'created_at' => new DateTime, 'updated_at' => new DateTime
		);

		DB::table('sekolah')->insert($sekolah);
	}

}