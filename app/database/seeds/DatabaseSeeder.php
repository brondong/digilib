<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('AdminSeeder');
		$this->command->info('Admin table seeded!');

		$this->call('SekolahSeeder');
		$this->command->info('Sekolah table seeded!');
	}

}