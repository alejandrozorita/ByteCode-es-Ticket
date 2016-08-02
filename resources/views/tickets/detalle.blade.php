@extends('layout')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="title-show">
                {{ $ticket->titulo }}

                @include('tickets.include.estado', compact('ticket'))
                

            </h2>
            <h4 class="label label-info news">
                {{ $ticket->votos->count() }} votos            </h4>

            <p class="vote-users">
                @foreach($ticket->votos as $voto)
                    <span class="label label-info">{{ $voto->user->name }}</span>
                @endforeach
            
            </p>

            <form method="POST" action="http://teachme.dev/votar/5" accept-charset="UTF-8"><input name="_token" type="hidden" value="VBIv3EWDAIQuLRW0cGwNQ4OsDKoRhnK2fAEF6UbQ">
                <!--button type="submit" class="btn btn-primary">Votar</button-->
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Votar
                </button>
            </form>

            <h3>Nuevo Comentario</h3>


            <form method="POST" action="http://teachme.dev/comentar/5" accept-charset="UTF-8"><input name="_token" type="hidden" value="VBIv3EWDAIQuLRW0cGwNQ4OsDKoRhnK2fAEF6UbQ">
                <div class="form-group">
                    <label for="comment">Comentarios:</label>
                    <textarea rows="4" class="form-control" name="comment" cols="50" id="comment"></textarea>
                </div>
                <div class="form-group">
                    <label for="link">Enlace:</label>
                    <input class="form-control" name="link" type="text" id="link">
                </div>
                <button type="submit" class="btn btn-primary">Enviar comentario</button>
            </form>
            <h3>Comentarios ({{ $ticket->comentarios->count() }})</h3>
            @foreach($ticket->comentarios as $comentario)
                @include('tickets.include.comentario')
            @endforeach

        </div>
    </div>
</div>

@endsection