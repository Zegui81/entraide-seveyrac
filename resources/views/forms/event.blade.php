{!! Form::open(['enctype' => 'multipart/form-data']) !!}
	@csrf
	
	{!! Form::hidden('id', $event['id']) !!}
	
	<div class="form-group">
		{!! Form::label('titre', 'Titre', array('class' => 'col-form-label required')) !!}
		<div class="input-group">
        	<div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-font" aria-hidden="true"></i></div>
            </div>
            {!! Form::text('titre', $event['titre'], ['class' => 'form-control '.($errors->has('titre') ? 'is-invalid' : ''), 'placeholder' => 'Titre']) !!}
            {!! $errors->first('titre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
	</div>
	
	<div class="form-row">
    	<div class="form-group col-md-6 {!! $errors->has('jourDebut') ? 'has-error' : '' !!}">
    		{!! Form::label('jourDebut', 'Date de début', array('class' => 'col-form-label required')) !!}
			<div class="input-group">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
                </div>
                {!! Form::text('jourDebut', $event['jourDebut'], ['id' => 'jourDebut', 'placeholder' => 'JJ/MM/AAAA', 'class' => 'datepicker form-control '.($errors->has('jourDebut') ? 'is-invalid' : '')]) !!}
				{!! $errors->first('jourDebut', '<div class="invalid-feedback">:message</div>') !!}
            </div>                		
		</div>
    	<div class="form-group col-md-6 {!! $errors->has('jourFin') ? 'has-error' : '' !!}">
    		{!! Form::label('jourFin', 'Date de fin', array('class' => 'col-form-label required')) !!}
			<div class="input-group">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
                </div>
                {!! Form::text('jourFin', $event['jourFin'], ['id' => 'jourFin', 'placeholder' => 'JJ/MM/AAAA', 'class' => 'datepicker form-control '.($errors->has('jourFin') ? 'is-invalid' : '')]) !!}
				{!! $errors->first('jourFin', '<div class="invalid-feedback">:message</div>') !!}
            </div>                		
		</div>
    </div> 
	
    <div class="form-row">
        <div class="form-group col-md-12 {!! $errors->has('nom') ? 'has-error' : '' !!}">
			{!! Form::label('journee', 'Toute la journée&nbsp;') !!}
			{!! Form::checkbox('journee', null, $event['journee'] == 1, ['id' => 'checkhour']) !!}
		</div>    
    </div> 
    
	<div id="hour-group" class="form-row">
		<div class="form-group col-md-6 {!! $errors->has('heureDebut') ? 'has-error' : '' !!}">
    		{!! Form::label('heureDebut', 'Heure de début', array('class' => 'col-form-label required')) !!}
			<div class="input-group clockpicker">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                </div>
                {!! Form::text('heureDebut', $event['heureDebut'], ['class' => 'form-control '.($errors->has('heureDebut') ? 'is-invalid' : ''), 'placeholder' => '--:--', 'onkeydown' => 'return false']) !!}
				{!! $errors->first('heureDebut', '<div class="invalid-feedback">:message</div>') !!}
            </div>   
		</div>                	
		<div class="form-group col-md-6 {!! $errors->has('heureFin') ? 'has-error' : '' !!}">
    		{!! Form::label('heureFin', 'Heure de fin', array('class' => 'col-form-label required')) !!}
			<div class="input-group clockpicker">
            	<div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                </div>
                {!! Form::text('heureFin', $event['heureFin'], ['class' => 'form-control '.($errors->has('heureFin') ? 'is-invalid' : ''), 'placeholder' => '--:--', 'onkeydown' => 'return false']) !!}
				{!! $errors->first('heureFin', '<div class="invalid-feedback">:message</div>') !!}
            </div>   
		</div>
    </div>                     
	
	@if (Auth::user()->actif == 2)
        <div class="form-row"> 
        	<div class="form-group col-md-6 {!! $errors->has('organisateur') ? 'has-error' : '' !!}">
    			{!! Form::label('organisateur', 'Organisateur') !!}
    			<div class="input-group">
                	<div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                    </div>
        			{!! Form::select('organisateur', $users, $event['organisateur']['id'], ['id' => 'organisateur' , 'class' => 'form-control '.($errors->has('organisateur') ? 'is-invalid' : '')]) !!}
        			{!! $errors->first('organisateur', '<small class="invalid-feedback">:message</small>') !!}
        		</div>
    		</div>
    		<div class="form-group col-md-6 {!! $errors->has('photo') ? 'has-error' : '' !!}">
                {!! Form::label('photo', "Image de l'évènement", array('class' => 'control-label')) !!}
    			<input name="photo" type="file" id="photo" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" accept=".jpg, .jpeg, .png">
    			{!! $errors->first('photo', '<small class="invalid-feedback">:message</small>') !!}
            </div>
        </div>
    @else
    	{!! Form::text('organisateur', Auth::user()->id, ['class' => 'form-control d-none']) !!}
    	<div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}">
            {!! Form::label('photo', "Image de l'évènement", array('class' => 'control-label')) !!}
			<input name="photo" type="file" id="photo" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" accept=".jpg, .jpeg, .png">
			{!! $errors->first('photo', '<small class="invalid-feedback">:message</small>') !!}
        </div>
    @endif 
    
    <div class="form-row">
		<div class="form-group col-md-12 mb-1">
            {!! Form::label('description', 'Description', array('class' => 'control-label')) !!}
            <div class="form-group">
        		{!! Form::textarea('description', $event['commentaire'], ['name' => 'description', 'id' => 'description', 'rows' => '10']) !!}
			</div>
		</div>
	</div>
	@if (Auth::user()->actif == 2)
    	@if ($edit)
    		{!! method_field('patch') !!}
    		{!! Form::button('Éditer l\'évènement&nbsp;&nbsp;<i class="fa fa-calendar-check-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
    	@else
    		{!! Form::button('Créer l\'évènement&nbsp;&nbsp;<i class="fa fa-calendar-plus-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
    	@endif 	
	@else
    	{!! Form::button('Proposer l\'évènement&nbsp;&nbsp;<i class="fa fa-calendar-plus-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
	@endif    	
{!! Form::close() !!}

<script type="text/javascript">
    $(document).ready(function() {
    
        $("#jourDebut").datepicker({
            closeText: 'Fermer',
            prevText: '&#x3c;Préc',
            nextText: 'Suiv&#x3e;',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin',
                'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'
            ],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun',
                'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'
            ],
            dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            dayNamesShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
            dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: '',
            minDate: new Date(2007, 1 - 1, 1),
            maxDate: '+12M +0D',
            numberOfMonths: 1,
            showButtonPanel: true,
            onSelect: function(selected) {
                $("#jourFin").datepicker("option", "minDate", selected)
            }
        });
    
        $("#jourFin").datepicker({
            closeText: 'Fermer',
            prevText: '&#x3c;Préc',
            nextText: 'Suiv&#x3e;',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin',
                'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'
            ],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun',
                'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'
            ],
            dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            dayNamesShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
            dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: '',
            minDate: new Date(2007, 1 - 1, 1),
            maxDate: '+12M +0D',
            numberOfMonths: 1,
            showButtonPanel: true,
            onSelect: function(selected) {
                $("#jourDebut").datepicker("option", "maxDate", selected)
    
            }
        });
    });
    
    function changeCheckJournee() {
        if ($('#checkhour').is(':checked')) {
            $('#hour-group').css('display', 'none');
        } else {
            $('#hour-group').removeAttr('style');
        }
    }
    changeCheckJournee(); // Premier contrôle
    $('#checkhour').on('change', changeCheckJournee);
    $('#organisateur').val({{ $event['organisateur']['id'] }});
    $('.clockpicker').clockpicker({
        placement: 'bottom',
        align: 'right',
        donetext: 'Ok'
    });
    var config = ['heading', '|', 'bold', 'italic', '|', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo'];
    ClassicEditor.create(document.querySelector('#description'), {
        toolbar: config
    });
</script>