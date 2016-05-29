<?php

use Faker\Generator;
use SistemaTickets\Entities\Ticket;

class TicketTableSeeder extends BaseSeeder
{

    protected $total = 300;

    public function getModel()
    {
        return new Ticket();
    }

    public function getDummyData(Generator $faker, array $valoresPersonalizados = array())
    {
       return [
         'titulo' => $faker->sentence(),
         'estado' => $faker->randomElement(['abierto','cerrado']),
         'user_id' => $this->getRandom('User')->id
       ];
    }

}