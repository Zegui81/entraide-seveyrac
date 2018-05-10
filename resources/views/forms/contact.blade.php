{!! Form::open() !!}
	@csrf
	<div class="form-group">
		{!! Form::label('email', 'Email', array('class' => 'col-form-label required')) !!}
		<div class="input-group">
        	<div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-at" aria-hidden="true"></i></div>
            </div>
            {!! Form::email('email', null, ['class' => 'form-control '.($errors->has('email') ? 'is-invalid' : ''), 'placeholder' => 'Email']) !!}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
	</div>	

	<div class="form-row">
    	<div class="form-group col-md-6 {!! $errors->has('nom') ? 'has-error' : '' !!}">
			{!! Form::label('nom', 'Nom', array('class' => 'required')) !!}
			{!! Form::text('nom', null, ['class' => 'form-control '.($errors->has('nom') ? 'is-invalid' : ''), 'placeholder' => 'Nom']) !!}
			{!! $errors->first('nom', '<small class="invalid-feedback">:message</small>') !!}
		</div>
		
		<div class="form-group col-md-6 {!! $errors->has('nom') ? 'has-error' : '' !!}">
			{!! Form::label('prenom', 'Prénom', array('class' => 'required')) !!}
			{!! Form::text('prenom', null, ['class' => 'form-control '.($errors->has('nom') ? 'is-invalid' : ''), 'placeholder' => 'Prénom']) !!}
			{!! $errors->first('prenom', '<div class="invalid-feedback">:message</div>') !!}
		</div>
    </div>    
        
    <div class="form-row">
		<div class="form-group col-md-12 mb-1 {!! $errors->has('message') ? 'has-error' : '' !!}">
            {!! Form::label('message', 'Message', array('class' => 'control-label required')) !!}
            <div class="form-group">
        		{!! Form::textarea('message', null, ['class' => 'form-control '.($errors->has('message') ? 'is-invalid' : ''), 'name' => 'message', 'id' => 'message', 'rows' => '5']) !!}
        		{!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
			</div>
		</div>
	</div>
	{!! Form::button('Contacter&nbsp;&nbsp;<i class="fa fa-send" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
{!! Form::close() !!}
