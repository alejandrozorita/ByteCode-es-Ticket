<div class="well well-sm">
    {{ $comentario->comentario }}
    <p class="date-t"><span class="glyphicon glyphicon-time"></span> {{ $comentario->created_at->format('d/m/Y h:ia') }} </p>
</div>