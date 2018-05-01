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
             <div class="text-hidden">{{ $nextEvent['commentaire'] }}</div>
             <div class="hidden"></div>
             <a class="btn btn-primary bottom-0" style="z-index:2;" href="{{ asset('event/detail/'.$nextEvent['id']) }}">
             Afficher l'évènement&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>
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
                        <div class="card-footer maxh-100px">
                        	<a class="btn btn-primary w-75" href="{{ asset('event/detail/'.$item['id']) }}">
            					 Afficher l'évènement&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>
             				</a>
                        </div>
                     </div>
                  </div>
              @endforeach
           </div>
       @endif
    </div>
@endsection