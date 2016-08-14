<?php 
namespace SistemaTickets\Http\Controllers;

use SistemaTickets\Http\Requests;
use SistemaTickets\Entities\Ticket;
use SistemaTickets\Http\Controllers\Controller;


use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class TicketsController extends Controller {
 
	public function ultimos()
    {

        $tickets = Ticket::orderBy('created_at', 'DESC')->paginate();

        return view('tickets/lista', compact('tickets'));
    }


    public function populares()
    {
        $tickets = Ticket::orderBy('created_at', 'DESC')->paginate();

        return view('tickets/lista', compact('tickets'));
    }

    public function pendientes()
    {
        $tickets = Ticket::orderBy('created_at', 'DESC')->paginate();

        return view('tickets/lista', compact('tickets'));
    }


    public function cerrados()
    {
        $tickets = Ticket::orderBy('created_at', 'DESC')->paginate();

        return view('tickets/lista', compact('tickets'));
    }


    public function detalle($id)
    {
        $ticket = Ticket::findOrFail($id);
        
        return view('tickets/detalle', compact('ticket'));
    }


    public function create()
    {

        return view('tickets/create');

    }


    public function store(Request $request, Guard $guard)
    {
        $this->validate($request, [
            'title' => 'required|max:120'
        ]);

        $ticket = $guard->user()->tickets()->create([

            'title' => $request->get('title'),

            'estado' => 'abierto'

            ]);

        /*
        Forma antigua de crear objeto 

        $ticket = new Ticket();
 
        $ticket->titulo = $request->title;

        $ticket->estado = 'abierto';

        $ticket->user_id = $guard->user()->id;

        $ticket->save();

        */

        return \Redirect::route('tickets.detalle', $ticket->id);
    }

}
