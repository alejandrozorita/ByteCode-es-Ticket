@extends('layout')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="title-show">
                {{ $ticket->titulo }}

                @include('tickets.include.estado', compact('ticket'))
                 

            </h2>

            <p class="date-c">
                <span class="glyphicon glyphicon-time "></span>
                {!! $ticket->created_at->format('d/m/y h:ia') !!}

                - {!! $ticket->autor->name !!}
            </p>
            <h4 class="label label-info news">
                {{ $ticket->votos->count() }} votos            </h4>

            <p class="vote-users">
                @foreach($ticket->votos as $voto)
                    <span class="label label-info">{{ $voto->user->name }}</span>
                @endforeach
            
            </p>

            @if ( ! $user->hasVoted($ticket))
                {!! Form::open(['route' => ['voto.guardar', $ticket->id], 'method' => 'POST']) !!}

                 <!--button type="submit" class="btn btn-primary">Votar</button-->
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Votar</button>

            {!! Form::close() !!}
            @else

                {!! Form::open(['route' => ['voto.borrar', $ticket->id] , 'method' => 'DELETE']) !!}

                     <!--button type="submit" class="btn btn-primary">Votar</button-->
                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-thumbs-up"></span> Quitar voto</button>

                {!! Form::close() !!}

            @endif
            


            <h3>Nuevo Comentario</h3>

            @include('partials.error')

            {!! Form::open(['route' => ['voto.comentario', $ticket->id], 'method' => 'POST']) !!}
                <div class="form-group">
                    <label for="comentario">Comentarios:</label>
                    <textarea rows="4" class="form-control" name="comentario" cols="50" id="comentario"> {{ old('comentario') }} </textarea>
                </div>
                <div class="form-group">
                    <label for="link">Enlace:</label>
                    <input class="form-control" name="link" type="text" id="link" value="{{ old('link') }}">
                </div>
                <button type="submit" class="btn btn-primary">Enviar comentario</button>
            {!! Form::close() !!}
            <h3>Comentarios ({{ $ticket->comentarios->count() }})</h3>
            @foreach($ticket->comentarios as $comentario)
                @include('tickets.include.comentario')
            @endforeach

        </div>
    </div>
</div>

@endsection