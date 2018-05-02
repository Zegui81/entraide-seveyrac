@extends('layouts/app')

@section('content') 
    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card-header"><h4 class="mb-0">Éditer le texte de l'accueil</h4></div>
            <div class="card-body">
                {!! Form::open() !!}
                	@csrf
                	<div class="form-row">
                		<div class="form-group col-md-12">
                            {!! Form::label('footer', 'Pied de page du site', array('class' => 'control-label')) !!}
                            <div class="form-group">
                        		{!! Form::textarea('footer', $footer, ['name' => 'footer', 'id' => 'footer', 'rows' => '10']) !!}
                			</div>
                		</div>
                	</div>
                	{!! Form::button('Éditer le pied de page&nbsp;&nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
                {!! Form::close() !!}
       	    </div>
		</div>
    </div>
    <script>
        var config = [ 'heading', '|', 'bold', 'italic', '|', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo' ];
    	ClassicEditor.create(document.querySelector('#footer'), {
            toolbar: config
        });
    </script>
@endsection