@extends('layouts.app')
@section('content')
    <div class="container mb-4 mt-4">
       <ul class="breadcrumb">
          <li class="active">Prochains évènements</li>
          @auth
              <li class="ml-auto">
                 <a class="btn btn-primary" href="{{ asset('event/calendar') }}">
                 Afficher le calendrier&nbsp;&nbsp;<i class="fa fa-calendar"></i>
                 </a>
              </li>
          @endauth
       </ul>
       
       <div class="row mb-4">
          <div class="col-lg-6 text-center">
             <img class="img-fluid rounded" src="{!! url('img/event/'.$nextEvent['id'].'.jpg') !!}" alt="">
          </div>
          <div class="col-lg-6 mh-250px">
             <h2>{{ $nextEvent['titre'] }}</h2>
             <h6 class="mb-2 text-muted">{{ $nextEvent['debut'] }}</h6>
             <div class="hidden"></div>
             @auth
                 <div class="card text-center">
                 	<div class="card-header p-2 text-justify"><h6 class="mb-0">Organisateur</h6></div>
                 	<div class="text-justify p-3 card-body">
                    	<p class="card-text">
                    		<b>{{ $nextEvent['organisateur']['prenom'].' '.$nextEvent['organisateur']['nom'] }}</b>
                    		<br>
                    		<i class="fa fa-envelope text-center w-25px" aria-hidden="true"></i>:<i> {{ $nextEvent['organisateur']['email'] }}</i>
                    		
                    		@if (isset($nextEvent['organisateur']['telFixe']))
                        		<br>
                        		<i class="fa fa-phone text-center w-25px" aria-hidden="true"></i>:<i> {{ $nextEvent['organisateur']['telFixe'] }}</i>
                    		@endif
                    		
                      		@if (isset($nextEvent['organisateur']['telPortable']))
                        		<br>
                        		<i class="fa fa-mobile text-center w-25px" aria-hidden="true"></i>:<i> {{ $nextEvent['organisateur']['telPortable'] }}</i>
                    		@endif
                    	</p>
                    </div>
        		</div>
             @endauth
             <div class="text-hidden">{!! $nextEvent['commentaire'] !!}</div>
             @auth
                 <a class="btn btn-primary bottom-0" style="z-index:2;" href="{{ asset('event/detail/'.$nextEvent['id']) }}">
                 Afficher l'évènement&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>
             @endauth
             </a>
          </div>
       </div>
       
       @if (count($listNextEvent) > 0)
           <hr>
           <div class="row">
              @foreach ($listNextEvent as $item)
                  <div class="col-lg-4 mb-2">
                     <div class="card text-center">
                     	<div class="img-etiquette">
                        	<img class="card-img-top" src="{!! url('img/event/'.$item['id'].'.jpg') !!}" alt="">
                        </div>
                        <div class="card-body maxh-100px">
                           <h4 class="card-title">{{ $item['titre'] }}</h4>
                           <h6 class="card-subtitle mb-2 text-muted">{{ $item['debut'] }}</h6>
                        </div>
                        @auth
                            <div class="card-footer maxh-100px">
                            	<a class="btn btn-primary w-75" href="{{ asset('event/detail/'.$item['id']) }}">
                					 Afficher l'évènement&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>
                 				</a>
                            </div>
                        @endauth
                     </div>
                  </div>
              @endforeach
           </div>
       @endif
    </div>
@endsection