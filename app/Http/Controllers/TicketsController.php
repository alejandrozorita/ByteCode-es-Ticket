<?php 
namespace SistemaTickets\Http\Controllers;

use SistemaTickets\Http\Requests;
use SistemaTickets\Entities\Ticket;
use SistemaTickets\Http\Controllers\Controller;


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

}
