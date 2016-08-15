<?php 

namespace SistemaTickets\Entities;

use SistemaTickets\Entities\Ticket;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function votos()
    {
        return $this->belongsToMany(Ticket::class, 'ticket_votos');
    }

    public function hasVoted(Ticket $ticket)
    {   

        return $this->votos()->where('ticket_id',$ticket->id)->count();
        //Método antiguo
        return TicketVoto::where(['user_id' => $this->id, 'ticket_id' => $ticket->id])->count() >= 1;
    }


    public function votar(Ticket $ticket)
    {
        if ($this->hasVoted($ticket)) return false;

        $this->votos()->attach($ticket);

        return true;
    }


    public function quitarVoto(Ticket $ticket)
    {


        $this->votos()->detach($ticket);

        return true;
    }
}
