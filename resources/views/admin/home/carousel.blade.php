@extends('layouts/app')

@section('content') 
    <div class="container mt-4 mb-4">
    	@include('layouts/message')
        <div class="card">
          <div class="card-header"><h4 class="mb-0">Ajouter une photo</h4></div>
          <div class="card-body">
                {!! Form::open(['enctype' => 'multipart/form-data']) !!}
                	@csrf
                	<div class="form-group">
                		{!! Form::label('titre', 'Titre', array('class' => 'col-form-label')) !!}
                        {!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre', 'value' => '']) !!}
                	</div>
                	
                	<div class="form-group">
                		{!! Form::label('description', 'Description', array('class' => 'col-form-label')) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 2]) !!}
                	</div>

                	<div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}">
                		{!! Form::label('photo', 'Photo', array('class' => 'control-label col-form-label required')) !!}
                		<input name="photo" type="file" id="photo" class="form-control {{ ($errors->has('photo') ? 'is-invalid' : '') }}">
                		{!! $errors->first('photo', '<small class="invalid-feedback">:message</small>') !!}
                	</div>
                	
            		{!! Form::button('Ajouter la photo&nbsp;&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
                	
                {!! Form::close() !!}
       	  </div>
		</div>
    	
        <div class="card mt-4">
        	<div class="card-header"><h4 class="mb-0">Photos importées</h4></div>
          	<div class="card-body">
          		@foreach ($listPhoto as $item)
      			    <div class="hovereffect col-lg-4 col-sm-4">
                        <img class="img-fluid" src="{{ asset('img/carousel').'/'.$item['id'].'.'.$item['ext'] }}" alt="">
                        <div class="overlay">
                           <h2>{{ $item['titre'] }}</h2>
                           <a class="info" href="{{ asset('admin/home/carousel').'/'.$item['id'] }}">Supprimer l'image</a>
                        </div>
                    </div>
                @endforeach
            </div>
         </div>
    </div>
@endsection