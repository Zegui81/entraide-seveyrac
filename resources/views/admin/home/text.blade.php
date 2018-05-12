@extends('layouts/app')

@section('content') 
    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card-header"><h4 class="mb-0">Éditer le texte de l'accueil</h4></div>
            <div class="card-body">
                {!! Form::open(['enctype' => 'multipart/form-data']) !!}
                	@csrf
                    <div class="form-row">
                		<div class="form-group col-md-6">
                            {!! Form::label('texteGauche', 'Texte à gauche', array('class' => 'control-label')) !!}
                            <div class="form-group">
                        		{!! Form::textarea('textGauche', null, ['name' => 'textGauche', 'id' => 'textGauche', 'rows' => '10', 'cols' => '80']) !!}
                			</div>
                        </div>
                		<div class="form-group col-md-6">
                			<div>
                                {!! Form::label('photo', "Image à droite", array('class' => 'control-label')) !!}
                    			<input name="photo" type="file" id="photo" class="form-control" onchange="displayApercu(this);" accept=".jpg, .jpeg, .png">
                			</div>
                			<div class="text-center mt-1">
                	 	       <img class="img-fluid rounded" id="apercu" src="{{ asset('public/img/home.jpg') }}" />
                			</div>
                        </div>
                	</div>      
                	<hr>
                	<div class="form-row">
                		<div class="form-group col-md-12">
                            {!! Form::label('textBas', 'Texte en bas', array('class' => 'control-label')) !!}
                            <div class="form-group">
                        		{!! Form::textarea('textBas', null, ['name' => 'textBas', 'id' => 'textBas', 'rows' => '10']) !!}
                			</div>
                		</div>
                	</div>
                	<hr>
                	{!! Form::button('Éditer l\'accueil&nbsp;&nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
                {!! Form::close() !!}
       	    </div>
		</div>
    </div>
    <textarea id="1" style="display: none;">{!! $textGauche !!}</textarea>
    <textarea id="2" style="display: none;">{!! $textBas !!}</textarea>
    <script>
        function displayApercu(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#apercu').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        var config = [ 'heading', '|', 'bold', 'italic', '|', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo' ];
    	ClassicEditor.create(document.querySelector('#textGauche'), {
            toolbar: config
        });
    	$('#textGauche').val($('#1').text());
    	ClassicEditor.create(document.querySelector('#textBas'), {
            toolbar: config
        });
    	$('#textBas').val($('#2').text());
    	
    </script>
@endsection