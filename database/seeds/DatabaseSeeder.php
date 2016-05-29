<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
 	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		//Con esta instrucción, evitamos que revise las claves foraneas
		DB::statement('SET foreign_key_checks = 0');

		//Vaciamos la tabla para meter nueos registros
		DB::table('users')->truncate();

		$this->call('UserTableSeeder');
	}

}
