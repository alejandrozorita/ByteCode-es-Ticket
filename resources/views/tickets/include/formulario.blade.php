<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        
        	<h2>Nueva solicitud</h2>

        	{!! Form::open(['route' => 'ticket.store', 'method' => 'POST']) !!}

        		{!! Form::submit('Enviar Solicitud', ['class' => 'btn btn-primary']) !!}
        	{!! Form::close() !!}
        </div>
    </div>
</div>

