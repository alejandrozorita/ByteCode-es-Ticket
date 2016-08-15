<?php namespace SistemaTickets\Http\Controllers;

use SistemaTickets\Http\Requests;
use SistemaTickets\Http\Controllers\Controller;
use SistemaTickets\Entities\Ticket;
use Illuminate\Auth\Guard;

use Illuminate\Http\Request;

class VotosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function guardar($id, Guard $auth)
	{

		$ticket = Ticket::findOrFail($id);

		$voto = $auth->user()->votar($ticket);
		
		return redirect()->back();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function borrar($id, Guard $auth)
	{
		$ticket = Ticket::findOrFail($id);

		$auth->user()->quitarVoto($ticket);

		return redirect()->back();

	}

}
