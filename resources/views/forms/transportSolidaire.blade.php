{!! Form::open() !!}
	@csrf
	{!! Form::hidden('id', $transport['id']) !!}
	
	@if (Auth::user()->actif == 2)
    	<div class="form-row"> 
        	<div class="form-group col-md-12">
    			{!! Form::label('organisateur', 'Organisateur') !!}
    			<div class="input-group">
                	<div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                    </div>
        			{!! Form::select('organisateur', $users, null, ['id' => 'organisateur' , 'class' => 'form-control '.($errors->has('organisateur') ? 'is-invalid' : '')]) !!}
        			{!! $errors->first('organisateur', '<small class="invalid-feedback">:message</small>') !!}
        		</div>
    		</div>
    	</div>
    @endif
	
	<div class="form-row">
    	<div class="form-group col-md-4 {!! $errors->has('jour') ? 'has-error' : '' !!}">
    		{!! Form::label('jour', 'Jour', array('class' => 'col-form-label ')) !!}
			<div class="input-group">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
                </div>
    			{!! Form::select('jour', $jours, null, ['id' => 'jour' , 'class' => 'form-control '.($errors->has('jour') ? 'is-invalid' : '')]) !!}
            </div>                		
		</div>
		<div class="form-group col-md-4 {!! $errors->has('heureDebut') ? 'has-error' : '' !!}">
    		{!! Form::label('heureDepart', 'Heure de départ', array('class' => 'col-form-label')) !!}
			<div class="input-group clockpicker">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                </div>
                {!! Form::text('heureDepart', $transport['heureDepart'], ['class' => 'form-control '.($errors->has('heureDepart') ? 'is-invalid' : ''), 'placeholder' => '--:--', 'onkeydown' => 'return false']) !!}
				{!! $errors->first('heureDepart', '<div class="invalid-feedback">:message</div>') !!}
            </div>   
		</div>   		
		<div class="form-group col-md-4 {!! $errors->has('heureRetour') ? 'has-error' : '' !!}">
    		{!! Form::label('heureRetour', 'Heure de retour', array('class' => 'col-form-label')) !!}
			<div class="input-group clockpicker">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                </div>
                {!! Form::text('heureRetour', $transport['heureRetour'], ['class' => 'form-control '.($errors->has('heureRetour') ? 'is-invalid' : ''), 'placeholder' => '--:--', 'onkeydown' => 'return false']) !!}
				{!! $errors->first('heureDepart', '<div class="invalid-feedback">:message</div>') !!}
            </div>   
		</div>   
    </div> 
        
    <div class="form-row">
		<div class="form-group col-md-12 mb-1">
            {!! Form::label('commentaire', 'Commentaire', array('class' => 'control-label ')) !!}
            <div class="form-group">
        		{!! Form::textarea('commentaire', $transport['commentaire'], ['class' => 'form-control ', 'name' => 'commentaire', 'id' => 'commentaire', 'rows' => '5']) !!}
			</div>
		</div>
	</div>
	@if ($transport != null)
		{!! method_field('patch') !!}
		{!! Form::button('Éditer le transport solidaire&nbsp;&nbsp;<i class="fa fa-car" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
	@else
		{!! Form::button('Publier un transport solidaire&nbsp;&nbsp;<i class="fa fa-car" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
	@endif
{!! Form::close() !!}
<script type="text/javascript">
    $('#organisateur').val({{ $transport['organisateur']['id'] }});
    $('#jour').val({{ $transport['numJour'] }});
    $('.clockpicker').clockpicker({
        placement: 'bottom',
        align: 'right',
        donetext: 'Ok'
    });
</script>