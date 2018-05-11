{!! Form::open(['enctype' => 'multipart/form-data']) !!}
	@csrf
	<div class="form-group">
		{!! Form::label('titre', 'Titre', array('class' => 'col-form-label')) !!}
		<div class="input-group">
        	<div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-font" aria-hidden="true"></i></div>
            </div>
            {!! Form::text('titre', null, ['class' => 'form-control '.($errors->has('titre') ? 'is-invalid' : ''), 'placeholder' => 'Titre']) !!}
            {!! $errors->first('titre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
	</div>
	
	<div class="form-group">
		{!! Form::label('description', 'Description', array('class' => 'col-form-label')) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 2]) !!}
	</div>

	<div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}">
		{!! Form::label('photo', 'Photo', array('class' => 'control-label col-form-label required')) !!}
		<input name="photo" type="file" id="photo" class="form-control {{ ($errors->has('photo') ? 'is-invalid' : '') }}" accept=".jpg, .jpeg, .png">
		{!! $errors->first('photo', '<small class="invalid-feedback">:message</small>') !!}
	</div>
	
	{!! Form::button('Ajouter la photo&nbsp;&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
	
{!! Form::close() !!}