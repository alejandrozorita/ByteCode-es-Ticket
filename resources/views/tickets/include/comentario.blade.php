<div class="well well-sm">
	<p><strong>{{ $comentario->user->name }}</strong></p>
	<p>{{ $comentario->comentario }}</p>
    <p class="date-t"><span class="glyphicon glyphicon-time"></span> {{ $comentario->created_at->format('d/m/Y h:ia') }} </p>
</div>