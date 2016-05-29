<?php

use Faker\Generator;
use SistemaTickets\Entities\TicketComentario;

class TicketComentarioTableSeeder extends BaseSeeder
{

    protected $total = 300;
    /**
     * @return Ticket
     */
    public function getModel()
    {
        return new TicketComentario();
    }

    public function getDummyData(Generator $faker, array $valoresPersonalizados = array())
    {
        return [
            'user_id' => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id,
            'comentario' => $faker->paragraphs(),
            'link' => $faker->randomElements(['','',$faker->url])
        ];
    }
}
