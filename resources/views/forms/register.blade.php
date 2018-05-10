{!! Form::open() !!}
	@csrf
	@if ($user == null)
    	<div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
    		{!! Form::label('email', 'Email', array('class' => 'col-form-label required')) !!}
    		<div class="input-group">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-at" aria-hidden="true"></i></div>
                </div>
                {!! Form::email('email', $user['email'], ['class' => 'form-control '.($errors->has('email') ? 'is-invalid' : ''), 'placeholder' => 'Email']) !!}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
    	</div>

        <div class="form-row">
    		<div class="form-group col-md-6 {{ $errors->has('password') ? 'has-danger' : '' }}">
                {!! Form::label('password', "Mot de passe", array('class' => 'control-label required')) !!}
                <div class="input-group">
                	<div class="input-group-prepend controls">
                      	<div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                    </div>
                    {!! Form::password('password', array('class' => 'form-control '.($errors->has('password') ? 'is-invalid' : ''), 'placeholder' => 'Mot de passe')) !!}
    				{!! $errors->first('password', '<small class="invalid-feedback">:message</small>') !!}
                </div>
            </div>
    		<div class="form-group col-md-6 {{ $errors->has('password_confirmation') ? 'has-danger' : '' }}">
                {!! Form::label('password_confirmation', "Confirmation du mot de passe", array('class' => 'control-label required')) !!}
                <div class="input-group">
                	<div class="input-group-prepend controls">
                      	<div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                    </div>
                    {!! Form::password('password_confirmation', array('class' => 'form-control '.($errors->has('password_confirmation') ? 'is-invalid' : ''), 'placeholder' => 'Confirmation mot de passe')) !!}
    				{!! $errors->first('password_confirmation', '<small class="invalid-feedback">:message</small>') !!}
                </div>
            </div>
    	</div>
	@endif
	
    <div class="form-row">
    	<div class="form-group col-md-6 {!! $errors->has('nom') ? 'has-error' : '' !!}">
			{!! Form::label('nom', 'Nom', array('class' => 'required')) !!}
			{!! Form::text('nom', $user['nom'], ['class' => 'form-control '.($errors->has('nom') ? 'is-invalid' : ''), 'placeholder' => 'Nom']) !!}
			{!! $errors->first('nom', '<small class="invalid-feedback">:message</small>') !!}
		</div>
		
		<div class="form-group col-md-6 {!! $errors->has('prenom') ? 'has-error' : '' !!}">
			{!! Form::label('prenom', 'Prénom', array('class' => 'required')) !!}
			{!! Form::text('prenom', $user['prenom'], ['class' => 'form-control '.($errors->has('prenom') ? 'is-invalid' : ''), 'placeholder' => 'Prénom']) !!}
			{!! $errors->first('prenom', '<div class="invalid-feedback">:message</div>') !!}
		</div>
    </div>    
    
	<div class="form-group">
		{!! Form::label('adresse', 'Adresse complète', array('class' => 'col-form-label required')) !!}
		<div class="input-group">
        	<div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
            </div>
            {!! Form::text('adresse', $user['adresse'], ['class' => 'form-control '.($errors->has('adresse') ? 'is-invalid' : ''), 'placeholder' => 'Adresse complète']) !!}
            {!! $errors->first('adresse', '<div class="invalid-feedback">:message</div>') !!}
        </div>
	</div>    
    
    <div class="form-row">
    
    	<div class="form-group col-md-6 {!! $errors->has('telFixe') ? 'has-error' : '' !!}">
    		{!! Form::label('telFixe', 'Téléphone fixe') !!}
			<div class="input-group">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></div>
                </div>
                {!! Form::text('telFixe', $user['telFixe'], ['class' => 'form-control '.($errors->has('telFixe') ? 'is-invalid' : ''), 'placeholder' => 'Téléphone fixe']) !!}
				{!! $errors->first('telFixe', '<div class="invalid-feedback">:message</div>') !!}
            </div>                		
		</div>
		
		<div class="form-group col-md-6 {!! $errors->has('telPortable') ? 'has-error' : '' !!}">
    		{!! Form::label('telPortable', 'Téléphone portable') !!}
			<div class="input-group">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                </div>
                {!! Form::text('telPortable', $user['telPortable'], ['class' => 'form-control '.($errors->has('telPortable') ? 'is-invalid' : ''), 'placeholder' => 'Téléphone portable']) !!}
				{!! $errors->first('telPortable', '<div class="invalid-feedback">:message</div>') !!}
            </div>   
		</div>
    </div>   
    @if ($user != null)
    	@if (Auth::user()->actif == 2)
    		{!! method_field('patch') !!}
    		{!! Form::button('Éditer le profil&nbsp;&nbsp;<i class="fa fa-user" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
    	@else
    		{!! method_field('patch') !!}
    		{!! Form::button('Éditer mon profil&nbsp;&nbsp;<i class="fa fa-user" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
    	@endif
    @else
        @guest   	
    		{!! Form::button('Envoyer ma demande&nbsp;&nbsp;<i class="fa fa-paper-plane" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
    	@endguest
    	@auth
    		{!! Form::button('Ajouter le membre&nbsp;&nbsp;<i class="fa fa-user-plus" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
    	@endauth
    @endif
{!! Form::close() !!}