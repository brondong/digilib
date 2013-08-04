<?php

class AdminSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$admin = array(
			'nama' => 'Admin',
			'username' => 'admin', 'password' => Hash::make('admins'),
			'created_at' => new DateTime, 'updated_at' => new DateTime
		);

		DB::table('admin')->insert($admin);
	}

}