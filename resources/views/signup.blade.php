@extends('template')

@section('contenu')
    <div class="container mt-4 mb-4">
    	<div class="card">
        	<div class="card-header"><h4 class="mb-0">Télécharger et imprimer notre formulaire</h4></div>
        	<div class="card-body">
        		<button type="button" class="btn btn-primary btn-lg btn-block">Télécharger au format PDF&nbsp;
        			<i class="fa fa-download"></i>
        		</button>
        	</div>
        </div>	
        <div class="hr">&nbsp;OU&nbsp;</div>  
        <div class="card">
          <div class="card-header"><h4 class="mb-0">Faire une demande d'adhésion</h4></div>
          <div class="card-body">
          	{!! Form::open(['url' => 'signup']) !!}
    			<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
    				{!! Form::label('email', 'Email') !!}
    				{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    				{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
    			</div>
                <div class="form-row">
                	<div class="form-group col-md-6 {!! $errors->has('nom') ? 'has-error' : '' !!}">
    					{!! Form::label('nom', 'Nom') !!}
    					{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
    					{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
    				</div>
    				<div class="form-group col-md-6 {!! $errors->has('prenom') ? 'has-error' : '' !!}">
    					{!! Form::label('prenom', 'Prénom') !!}
    					{!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}
    					{!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
    				</div>
                </div>    
                <div class="form-row">
                	<div class="form-group col-md-6 {!! $errors->has('nom') ? 'has-error' : '' !!}">
                		{!! Form::label('telFixe', 'Téléphone fixe') !!}
    					{!! Form::text('telFixe', null, ['class' => 'form-control', 'placeholder' => 'Téléphone fixe']) !!}
    					{!! $errors->first('telFixe', '<small class="help-block">:message</small>') !!}
    				</div>
    				<div class="form-group col-md-6 {!! $errors->has('prenom') ? 'has-error' : '' !!}">
                		{!! Form::label('telPortable', 'Téléphone portable') !!}
    					{!! Form::text('telPortable', null, ['class' => 'form-control', 'placeholder' => 'Téléphone portable']) !!}
    					{!! $errors->first('telPortable', '<small class="help-block">:message</small>') !!}
    				</div>
                </div>         	
<!--     			{!! Form::submit('Envoyer ma demande&nbsp;<i class="fa fa-download"></i>', ['class' => 'btn btn-info pull-right']) !!} -->
    			{!! Form::button('Envoyer ma demande&nbsp;&nbsp;<i class="fa fa-paper-plane" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
    			
          	{!! Form::close() !!}
          </div>
        </div>
    </div>
     
@endsection