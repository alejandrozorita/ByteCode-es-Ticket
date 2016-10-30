<?php

namespace SistemaTickets\Repositorios;

use SistemaTickets\Entities\Ticket;

class TicketRepo extends BaseRepo{
	

	public function getModel()
	{
		return new Ticket();
	}

	protected function selectTicketsList()
    {
        return $this->newQuery()->selectRaw(

            'tickets.*, '
            . '( SELECT COUNT(*) FROM ticket_comentarios WHERE ticket_comentarios.ticket_id = tickets.id ) as num_comentarios,'
            . '( SELECT COUNT(*) FROM ticket_votos WHERE ticket_votos.ticket_id = tickets.id ) as num_votos'

        )

        //->orderBy('created_at', 'DESC')->with('autor','comentarios','votos ')->paginate(20);
        ->with('autor');
    }


	public function paginarUltimos()
	{
		return self::selectTicketsList()
        ->orderBy('created_at', 'DESC')
        ->where('estado', 'abierto')
        ->paginate(5);
	}


	public function populares()
	{
		return Ticket::orderBy('created_at', 'DESC')->paginate();
	}


	public function pendientes()
	{
		return self::selectTicketsList()
        ->orderBy('created_at', 'DESC')
        ->where('estado', 'abierto')
        ->paginate(20);
	}


	public function cerrados()
	{
		return self::selectTicketsList()
        ->orderBy('created_at', 'DESC')
        ->where('estado', 'cerrado')
        ->paginate(20);
	}

}
