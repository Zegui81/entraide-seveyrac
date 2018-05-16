@extends('layouts/app')

@section('content') 
    <div class="container mt-4 mb-4">
    	@include('layouts/message')
        <div class="card">
          <div class="card-header"><h4 class="mb-0">Ajouter un article</h4></div>
          <div class="card-body">
                {!! Form::open(['enctype' => 'multipart/form-data']) !!}
                	@csrf
                    <div class="form-row">
                        <div class="form-group col-md-6 {{ $errors->has('titre') ? 'has-danger' : '' }}">
                        	{!! Form::label('titre', 'Titre', array('class' => 'col-form-label required')) !!}
                        	<div class="input-group">
                            	<div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fa fa-font" aria-hidden="true"></i></div>
                                </div>
                                {!! Form::text('titre', null, ['class' => 'form-control '.($errors->has('titre') ? 'is-invalid' : ''), 'placeholder' => 'Titre']) !!}
                                {!! $errors->first('titre', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                		
                    	<div class="form-group col-md-6 {!! $errors->has('jourDebut') ? 'has-error' : '' !!}">
                    		{!! Form::label('datePubli', 'Date de publication', array('class' => 'col-form-label required')) !!}
                			<div class="input-group">
                            	<div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
                                </div>
                                {!! Form::text('datePubli', null, ['placeholder' => 'JJ/MM/AAAA', 'class' => 'datepicker form-control '.($errors->has('datePubli') ? 'is-invalid' : '')]) !!}
                				{!! $errors->first('datePubli', '<div class="invalid-feedback">:message</div>') !!}
                            </div>                		
                		</div>
                    </div>                 	
                	
                	<div class="form-group">
                		{!! Form::label('description', 'Description', array('class' => 'col-form-label')) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 2]) !!}
                	</div>

                	<div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}">
                		{!! Form::label('photo', 'Image de l\'article', array('class' => 'control-label col-form-label required')) !!}
                		<input name="photo" type="file" id="photo" class="form-control {{ ($errors->has('photo') ? 'is-invalid' : '') }}" accept=".jpg, .jpeg, .png">
                		{!! $errors->first('photo', '<small class="invalid-feedback">:message</small>') !!}
                	</div>
                	
            		{!! Form::button('Publier l\'article&nbsp;&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) !!}
                	
                {!! Form::close() !!}
       	  </div>
		</div>
    	
        <div class="card mt-4">
        	<div class="card-header"><h4 class="mb-0">Articles importées</h4></div>
          	<div class="card-body d-flex">
          		@foreach ($articles as $item)
      			    <div class="hovereffect col-lg-4 col-sm-4 p-4">
                        <img class="img-fluid" src="{{ asset('public/img/presse').'/'.$item['id'].'.jpg' }}" alt="">
                        <div class="overlay">
                           <h2>{{ $item['titre'] }}</h2>
                           <a class="info" href="{{ asset('admin/news').'/'.$item['id'] }}" onclick="return confirm('Souhaitez-vous vraiment supprimer cet article ?')">Supprimer l'article</a>
                        </div>
                    </div>
                @endforeach
            </div>
         </div>
    </div>
    <script type="text/javascript">
    	$(document).ready(function() {
        	$.datepicker.regional['fr'] = {
        		closeText: 'Fermer',
        		prevText: '&#x3c;Préc',
        		nextText: 'Suiv&#x3e;',
        		currentText: 'Aujourd\'hui',
        		monthNames: ['Janvier','Fevrier','Mars','Avril','Mai','Juin',
        		'Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
        		monthNamesShort: ['Jan','Fev','Mar','Avr','Mai','Jun',
        		'Jul','Aou','Sep','Oct','Nov','Dec'],
        		dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
        		dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
        		dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
        		weekHeader: 'Sm',
        		dateFormat: 'dd/mm/yy',
        		firstDay: 1,
        		isRTL: false,
        		showMonthAfterYear: false,
        		yearSuffix: '',
        		minDate: new Date(2007, 1 - 1, 1),
        		maxDate: '+12M +0D',
        		numberOfMonths: 1,
        		showButtonPanel: true
          };
          $(".datepicker").datepicker($.datepicker.regional['fr']);
        });
    </script>
@endsection