<?php

use Faker\Generator;
use SistemaTickets\Entities\TicketVoto;
use Faker\Factory as Faker;

class TicketVotoTableSeeder extends BaseSeeder
{

    protected $total = 300;
    /**
     * @return Ticket
     */
    public function getModel()
    {
        return new TicketVoto();
    }

    public function getDummyData(\Faker\Generator $faker, array $valoresPersonalizados = array())
    {
        return [
            'user_id' => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id
        ];
    }
}