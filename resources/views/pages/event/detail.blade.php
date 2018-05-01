@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
       <ul class="breadcrumb">
          <li><a href="{{ asset('event') }}">Évènements</a> /&nbsp;</li>
          <li class="active">{{ $event['titre'] }}</li>
          <li class="ml-auto">
             <a class="btn btn-primary" href="{{ asset('event/calendar') }}">
             	Afficher le calendrier&nbsp;&nbsp;<i class="fa fa-calendar"></i>
             </a>
          </li>
       </ul>
       <div class="row">
          <div class="col-lg-6">
             <img class="img-fluid rounded mb-4" src="{!! url('img/event/'.$event['id'].'.jpg') !!}" alt="">
          </div>
          <div class="col-lg-6">
             <h2>{{ $event['titre'] }}</h2>
             <h6 class="mb-3 text-muted">Date : {{ $event['debut'] }}</h6>
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
       <div class="row col-lg-12">{!! $event['commentaire'] !!}</div>   
           
        @if (count($photos) > 0)
            <h2>Galerie photo</h2>
            <div class="row mt-3">
        		@foreach ($photos as $photo)
                    <div class="col-lg-3 col-sm-6 mb-4">
                       <img class="img-fluid" src="{!! url('img/event/gallery/'.$event['id'].'/'.$photo) !!}" alt="">
                    </div>            	
        		@endforeach
            </div>
        @endif
    </div>
@endsection