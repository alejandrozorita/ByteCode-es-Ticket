<?php

use Faker\Generator;
use SistemaTickets\Entities\User;

class UserTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $valoresPersonalizados = array())
    {
        return [

                'name' => $faker->name,

                'email' => $faker->email,

                'password' => bcrypt('test')

            ];
    }

    public function run()
    {
        $this->crearAdmin();
        $this->crearMultiples(50);
    }



    private function crearAdmin()
    {
        $this->crear([

            'name' => 'Alejandro',

            'email' => 'alejandro@bytecode.es',

            'password' => bcrypt('admin')

        ]);
    }
}
