@extends('layouts/app')

@section('content') 
    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card-header"><h4 class="mb-0">Changer le formulaire d'adhésion</h4></div>
            <div class="card-body">
                {!! Form::open(['enctype' => 'multipart/form-data']) !!}
                	@csrf
                    <div class="form-row">
                		<div class="form-group col-md-12">
                			<div>
                                {!! Form::label('photo', 'Formulaire d\'adhésion', array('class' => 'control-label')) !!}
                    			<input name="photo" type="file" id="photo" class="form-control" onchange="displayApercu(this);">
                			</div>
                			<div class="text-center mt-1 col-md-6">
                	 	       <img class="img-fluid rounded" id="apercu" src="{{ asset('public/img/form.jpg') }}" alt="your image"/>
                			</div>
                        </div>
                	</div>      
                	<hr>
                	{!! Form::button('Changer le formulaire d\'adhésion&nbsp;&nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
                {!! Form::close() !!}
       	    </div>
		</div>
    </div>
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
    </script>
@endsection