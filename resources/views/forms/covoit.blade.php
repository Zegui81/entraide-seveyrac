{!! Form::open() !!}
	@csrf
	{!! Form::hidden('id', $covoit['id']) !!}
	{!! Form::hidden('user_id', $covoit['organisateur']) !!}
	
	<div class="form-row">
    	<div class="form-group col-md-6 {!! $errors->has('jourDebut') ? 'has-error' : '' !!}">
    		{!! Form::label('origine', 'Départ', array('class' => 'col-form-label required', 'placeholder' => 'Lieu de départ')) !!}
			<div class="input-group">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-font" aria-hidden="true"></i></div>
                </div>
                {!! Form::text('origine', $covoit['origine'], ['class' => 'form-control '.($errors->has('origine') ? 'is-invalid' : ''), 'placeholder' => 'Lieu de départ']) !!}
				{!! $errors->first('origine', '<div class="invalid-feedback">:message</div>') !!}
            </div>                		
		</div>
    	<div class="form-group col-md-6 {!! $errors->has('jourFin') ? 'has-error' : '' !!}">
    		{!! Form::label('destination', 'Destination', array('class' => 'col-form-label required')) !!}
			<div class="input-group">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-bold" aria-hidden="true"></i></div>
                </div>
                {!! Form::text('destination', $covoit['destination'], ['class' => 'form-control '.($errors->has('destination') ? 'is-invalid' : ''), 'placeholder' => 'Lieu d\'arrivée']) !!}
				{!! $errors->first('destination', '<div class="invalid-feedback">:message</div>') !!}
            </div>                		
		</div>
    </div> 

	<div class="form-row">
    	<div class="form-group col-md-6 {!! $errors->has('jourDebut') ? 'has-error' : '' !!}">
    		{!! Form::label('jourDepart', 'Jour', array('class' => 'col-form-label required')) !!}
			<div class="input-group">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
                </div>
                {!! Form::date('jourDepart', $covoit['jourDepart'], ['class' => 'form-control '.($errors->has('jourDepart') ? 'is-invalid' : '')]) !!}
				{!! $errors->first('jourDepart', '<div class="invalid-feedback">:message</div>') !!}
            </div>                		
		</div>
		<div class="form-group col-md-3 {!! $errors->has('heureDebut') ? 'has-error' : '' !!}">
    		{!! Form::label('heureDepart', 'Heure de départ', array('class' => 'col-form-label required')) !!}
			<div class="input-group clockpicker">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                </div>
                {!! Form::text('heureDepart', $covoit['heureDepart'], ['class' => 'form-control '.($errors->has('heureDepart') ? 'is-invalid' : ''), 'placeholder' => '--:--', 'onkeydown' => 'return false']) !!}
				{!! $errors->first('heureDepart', '<div class="invalid-feedback">:message</div>') !!}
            </div>   
		</div>   		
		<div class="form-group col-md-3 {!! $errors->has('nbPlace') ? 'has-error' : '' !!}">
    		{!! Form::label('nbPlace', 'Nombre de places', array('class' => 'col-form-label required')) !!}
			<div class="input-group">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-users" aria-hidden="true"></i></div>
                </div>
                {!! Form::number('nbPlace', $covoit['nbPlace'], ['class' => 'form-control '.($errors->has('nbPlace') ? 'is-invalid' : ''), 'placeholder' => '0', 'min' => '1', 'max' => '10']) !!}
				{!! $errors->first('nbPlace', '<div class="invalid-feedback">:message</div>') !!}
            </div>   
		</div> 
    </div> 
        
    <div class="form-row">
		<div class="form-group col-md-12 mb-1">
            {!! Form::label('commentaire', 'Commentaire', array('class' => 'control-label ')) !!}
            <div class="form-group">
        		{!! Form::textarea('commentaire', $covoit['commentaire'], ['class' => 'form-control ', 'name' => 'commentaire', 'id' => 'commentaire', 'rows' => '5']) !!}
			</div>
		</div>
	</div>
	@if ($covoit != null)
		{!! method_field('patch') !!}
		{!! Form::button('Éditer le covoiturage&nbsp;&nbsp;<i class="fa fa-car" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
	@else
		{!! Form::button('Publier un covoiturage&nbsp;&nbsp;<i class="fa fa-car" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
	@endif
{!! Form::close() !!}
<script type="text/javascript">
    $('.clockpicker').clockpicker({
        placement: 'bottom',
        align: 'right',
        donetext: 'Ok'
    });
</script>