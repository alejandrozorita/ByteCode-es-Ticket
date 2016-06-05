<?php namespace SistemaTickets\Http\Controllers;

use SistemaTickets\Http\Requests;
use SistemaTickets\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TicketsController extends Controller {

	public function ultimos()
    {
        return view('tickets/lista');
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
