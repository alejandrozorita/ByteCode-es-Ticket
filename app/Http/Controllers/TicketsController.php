<?php namespace SistemaTickets\Http\Controllers;

use SistemaTickets\Http\Requests;
use SistemaTickets\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TicketsController extends Controller {

	public function ultimos()
    {
        dd('ultimos');
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
        dd('detalle');
    }

}
