<div class="well well-sm">
	<p><strong>{{ $comentario->user->name }}</strong></p>
	<p>{{ $comentario->comentario }}</p>

	@if ($comentario->link)
		<p>
			<a href="{{ $comentario->link }}" title="" rel="nofollow" target="_blank"> 
				{{ $comentario->link }}
			</a>
		</p>
	@endif
    <p class="date-t"><span class="glyphicon glyphicon-time"></span> {{ $comentario->created_at->format('d/m/Y h:ia') }} </p>
</div>