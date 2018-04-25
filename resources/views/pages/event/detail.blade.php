@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
       <!-- Page Heading/Breadcrumbs -->
       <ul class="breadcrumb">
          <li><a href="{{ asset('event') }}">Évènements</a> /&nbsp;</li>
          <li class="active">{{ $event['titre'] }}</li>
          <li class="ml-auto">
             <a class="btn btn-primary" href="{{ asset('event/calendar') }}">
             Afficher le calendrier&nbsp;<i class="fa fa-calendar"></i>
             </a>
          </li>
       </ul>
       <div class="row">
          <div class="col-lg-7">
             <img class="img-fluid rounded mb-4" src="{!! url('img/event/'.$event['id'].'.jpg') !!}" alt="">
          </div>
          <div class="col-lg-5">
             <h2>{{ $event['titre'] }}</h2>
             <h6 class="mb-3 text-muted">{{ $event['debut'] }}</h6>
             <div class="card text-center">
             	<div class="card-header p-2 text-justify"><h6 class="mb-0">Organisateur</h6></div>
             	<div class="text-justify p-3 card-body">
                	<p class="card-text">
                		<b>{{ $event['organisateur']['prenom'].' '.$event['organisateur']['nom'] }}</b>
                		<br>
                		<i class="fa fa-envelope text-center w-25px" aria-hidden="true"></i>:<i> {{ $event['organisateur']['email'] }}</i>
                		
                		@if (isset($event['organisateur']['telFixe']))
                    		<br>
                    		<i class="fa fa-phone text-center w-25px" aria-hidden="true"></i>:<i> {{ $event['organisateur']['telFixe'] }}</i>
                		@endif
                		
                  		@if (isset($event['organisateur']['telPortable']))
                    		<br>
                    		<i class="fa fa-mobile text-center w-25px" aria-hidden="true"></i>:<i> {{ $event['organisateur']['telPortable'] }}</i>
                		@endif
                	</p>
                </div>
    		</div>
          </div>
       </div>
       <div class="row">
       	 <p class="col-lg-12">{!! $event['commentaire'] !!}</p>
       	
       </div>       
       <h2>Voir les images</h2>
       <div class="row mt-3">
          <div class="col-lg-2 col-sm-4 mb-4">
             <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </div>
          <div class="col-lg-2 col-sm-4 mb-4">
             <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </div>
          <div class="col-lg-2 col-sm-4 mb-4">
             <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </div>
          <div class="col-lg-2 col-sm-4 mb-4">
             <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </div>
          <div class="col-lg-2 col-sm-4 mb-4">
             <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </div>
          <div class="col-lg-2 col-sm-4 mb-4">
             <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </div>
          <div class="col-lg-2 col-sm-4 mb-4">
             <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </div>
          <div class="col-lg-2 col-sm-4 mb-4">
             <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </div>
          <div class="col-lg-2 col-sm-4 mb-4">
             <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </div>
       </div>
    </div>
@endsection