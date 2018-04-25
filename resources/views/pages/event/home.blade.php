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
          <div class="col-lg-6">
             <h2>{{ $nextEvent['titre'] }}</h2>
             <h6 class="mb-2 text-muted">{{ $nextEvent['debut'] }}</h6>
             <div class="text-hidden">{{ $nextEvent['commentaire'] }}</div>
             <div class="hidden"></div>
             <a class="btn btn-primary bottom-0" style="z-index:2;" href="{{ asset('event/detail/'.$nextEvent['id']) }}">
             Afficher l'évènement&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>
             </a>
          </div>
       </div>
       
       <hr>
       <div class="row">
          @foreach ($listNextEvent as $item)
              <div class="col-lg-4">
                 <div class="card h-100 text-center">
                    <img class="card-img-top" src="{!! url('img/event/'.$item['id'].'.jpg') !!}" alt="">
                    <div class="card-body">
                       <h4 class="card-title">{{ $item['titre'] }}</h4>
                       <h6 class="card-subtitle mb-2 text-muted">{{ $item['debut'] }}</h6>
                       <p class="card-text">{{ $item['commentaire'] }}</p>
                    </div>
                    <div class="card-footer">
                       <a href="#">responssable@example.com</a>
                    </div>
                 </div>
              </div>
          @endforeach
       </div>
    </div>
@endsection