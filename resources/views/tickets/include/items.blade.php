<div data-id="25" class="well well-sm request">
    <h4 class="list-title">
        {{ $ticket->titulo }}
        @include('tickets.include.estado', compact('ticket'))

    </h4>
    <p>
        <a href="#" class="btn btn-primary btn-vote" title="Votar por este tutorial">
            <span class="glyphicon glyphicon-thumbs-up"></span> Votar
        </a>

        <a href="#" class="btn btn-hight btn-unvote hide">
            <span class="glyphicon glyphicon-thumbs-down"></span> No votar
        </a>

        <a href="{{ route('tickets.detalle', $ticket->id) }}">
            <span class="votes-count"> votos</span>
            - <span class="comments-count">0 comentarios</span>.
        </a>

	    <p class="date-t">
	    <span class="glyphicon glyphicon-time"></span> {{ $ticket->created_at->format('d/m/Y h:ia') }}
	    </p>
    </p>
</div>  