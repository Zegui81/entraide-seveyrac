@extends('layouts/app')

@section('content')
    <div class="container mt-4 mb-4">
    	@if (file_exists('public/img/form.jpg'))
        	<div class="card">
            	<div class="card-header"><h4 class="mb-0">Imprimer notre formulaire d'adhésion</h4></div>
            	<div class="card-body">
                	<a class="btn btn-primary btn-lg btn-block" href="{{ asset('formRegister') }}">
                         Télécharger le formulaire au format JPG&nbsp;&nbsp;<i class="fa fa-download"></i>
                    </a>
            	</div>
            </div>	
            <div class="hr">&nbsp;OU&nbsp;</div>
        @endif  
        <div class="card">
          <div class="card-header"><h4 class="mb-0">Faire une demande d'adhésion</h4></div>
          <div class="card-body">
       	  	  @include('forms/register')
       	  </div>
		</div>
    </div>
@endsection