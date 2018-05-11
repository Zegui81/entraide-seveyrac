{!! Form::open() !!}
	@csrf
    <div class="form-row">
		<div class="form-group col-md-6 {{ $errors->has('password') ? 'has-danger' : '' }}">
            {!! Form::label('password', "Nouveau mot de passe", array('class' => 'control-label required')) !!}
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
	{!! method_field('patch') !!}
	{!! Form::button('Modifier le mot de passe&nbsp;&nbsp;<i class="fa fa-key" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
{!! Form::close() !!}