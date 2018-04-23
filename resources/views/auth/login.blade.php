@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">
    <div class="card">
        <div class="card-header"><h4 class="mb-0">Se connecter</h4></div>
        <div class="card-body">
          	{!! Form::open(['url' => 'login']) !!}
                @csrf
                
                @if ($errors->has('login'))
                    <div class="alert alert-danger" role="alert">
                      	{{ $errors->first('login') }}
                    </div>
                @endif
                
            	<div class="form-group">
            		{!! Form::label('email', 'Email', array('class' => 'col-form-label required')) !!}
    				<div class="input-group">
                    	<div class="input-group-prepend">
                          <div class="input-group-text"><i class="fa fa-at" aria-hidden="true"></i></div>
                        </div>
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                    </div>              		
				</div>
				
				<div class="form-group">
            		{!! Form::label('mdp', 'Mot de passe', array('class' => 'col-form-label required')) !!}
    				<div class="input-group">
                    	<div class="input-group-prepend">
                          <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                        </div>
                    	<input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                    </div>   
				</div>

                <div class="form-group row mb-0">
                    <div class="col-md-12">
                    	{!! Form::checkbox('remember', null, null, array()) !!}
                    	{!! Form::label('remember', 'Se souvenir de moi', array('class' => 'col-form-label')) !!}
                    	
            			{!! Form::button('Se connecter&nbsp;&nbsp;<i class="fa fa-sign-in" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
    					{!! Form::button('Mot de passe oublié ?', array('type' => 'submit', 'class' => 'btn btn-link pull-right', 'href' => route('password.request'))) !!}
                    </div>
                </div>
          	{!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
