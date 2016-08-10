@extends('layout')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <h1>
                    {{ $title = trans(Route::currentRouteName().'_title') }}
                    <a href="#" class="btn btn-primary">
                        Nueva solicitud
                    </a>
                </h1>

                <p class="label label-info news">
                    Hay {{ $tickets->total() }} {{ $title }}
                </p>

                @foreach($tickets as $ticket)
                    @include('tickets.include.items', compact('ticket'))
                @endforeach 
                   		                        
                {!! $tickets->render() !!}

            </div>

            <hr>

            <p><a href="http://bytecode.es/" target="_blank">bytecode.es</a></p>

        </div>
    </div>
</div>

@endsection