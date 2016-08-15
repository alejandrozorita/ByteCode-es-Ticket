<?php 
namespace SistemaTickets\Http\Controllers;

use SistemaTickets\Http\Requests;
use SistemaTickets\Entities\Ticket;
use SistemaTickets\Http\Controllers\Controller;


use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class TicketsController extends Controller {


    protected function selectTicketsList()
    {
        return Ticket::selectRaw(

            'tickets.*, '
            . '( SELECT COUNT(*) FROM ticket_comentarios WHERE ticket_comentarios.ticket_id = tickets.id ) as num_comentarios,'
            . '( SELECT COUNT(*) FROM ticket_votos WHERE ticket_votos.ticket_id = tickets.id ) as num_votos'

        )

        //->orderBy('created_at', 'DESC')->with('autor','comentarios','votos ')->paginate(20);
        ->with('autor');
    }
 
	public function ultimos()
    {

        $tickets = self::selectTicketsList()
        ->orderBy('created_at', 'DESC')
        ->where('estado', 'abierto')
        ->paginate(5);

        return view('tickets/lista', compact('tickets'));
    }


    public function populares()
    {
        $tickets = Ticket::orderBy('created_at', 'DESC')->paginate();

        return view('tickets/lista', compact('tickets'));
    }

    public function pendientes()
    {

        $tickets = self::selectTicketsList()
        ->orderBy('created_at', 'DESC')
        ->where('estado', 'abierto')
        ->paginate(20);

        return view('tickets/lista', compact('tickets'));
    }


    public function cerrados()
    {
        $tickets = self::selectTicketsList()
        ->orderBy('created_at', 'DESC')
        ->where('estado', 'cerrado')
        ->paginate(20);

        return view('tickets/lista', compact('tickets'));
    }


    public function detalle($id, Guard $auth)
    {
        $ticket = Ticket::findOrFail($id);

        $user = $auth->user();
        
        return view('tickets/detalle', compact('ticket','user'));
    }


    public function create()
    {

        return view('tickets/create');

    }


    public function store(Request $request, Guard $auth)
    {

        $this->validate($request, [
            'title' => 'required|max:120'
        ]);

        $ticket = $auth->user()->tickets()->create([

            'titulo' => $request->get('title'),

            'estado' => 'abierto'

            ]);

        /*
        Forma antigua de crear objeto 

        $ticket = new Ticket();
 
        $ticket->titulo = $request->title;

        $ticket->estado = 'abierto';

        $ticket->user_id = $auth->user()->id;

        $ticket->save();

        */

        return \Redirect::route('tickets.detalle', $ticket->id);
    }

}
