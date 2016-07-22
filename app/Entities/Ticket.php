<?php namespace SistemaTickets\Entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    public function getOpenAttribute()
    {
    	return $this->estado == 'abierto';
    } 
}
