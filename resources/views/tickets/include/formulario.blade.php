<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        
        	<h2>Nueva solicitud</h2>
        	@include('partials.error')
        	{!! Form::open(['route' => 'ticket.store', 'method' => 'POST']) !!}

				{!! 
        			Form::textarea('title', null, [

		        		'rows' => 2,

		        		'class' => 'form-control',

		        		'placeholder' => 'Describe el comentario'

        			]) 
        		!!}       		


        		{!! Form::submit('Enviar Solicitud', ['class' => 'btn btn-primary']) !!}

        	{!! Form::close() !!}
        </div>
    </div>
</div>

