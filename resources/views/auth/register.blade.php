@extends('layouts/app')

@section('content')
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
       	  	  @include('form/register')
       	  </div>
		</div>
    </div>
@endsection