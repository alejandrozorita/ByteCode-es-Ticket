<?php 
namespace SistemaTickets\Http\Controllers;

use SistemaTickets\Http\Requests;
use SistemaTickets\Entities\Ticket;
use SistemaTickets\Http\Controllers\Controller;


use Illuminate\Http\Request;

class TicketsController extends Controller {
 
	public function ultimos()
    {
        $tickets = Ticket::orderBy('created_at', 'DESC')->get();

        return view('tickets/lista', compact('tickets'));
    }


    public function populares()
    {
        dd('ultimos');
    }


    public function pendientes()
    {
        dd('pendientes');
    }


    public function cerrados()
    {
        dd('cerrados');
    }


    public function detalle($id)
    {
        return view('tickets/detalle');
    }

}
