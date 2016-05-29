<?php

use Illuminate\Database\Seeder;
use SistemaTickets\Entities\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run() 
	{
		$this->crearAdmin();
		$this->crearUsuarios(50);
	}



	private function crearAdmin()
	{
		User::create([

			'name' => 'Alejandro',

			'email' => 'alejandro@bytecode.es',

			'password' => bcrypt('admin')

		]);
	}

	private function crearUsuarios($num)
	{
		$faker = Faker::create();

		for ($i=1; $i < $num; $i++) 
		{ 
			User::create([

				'name' => $faker->name,

				'email' => $faker->email,

				'password' => bcrypt('test')

			]);
		}
	}


}