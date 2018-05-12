@extends('layouts/app')

@section('content') 
    <div class="container mt-4 mb-4">
    	@include('layouts/message')
        <div class="card">
          <div class="card-header"><h4 class="mb-0">Ajouter une photo</h4></div>
          <div class="card-body">
               @include('forms/carousel')
       	  </div>
		</div>
    	
        <div class="card mt-4">
        	<div class="card-header"><h4 class="mb-0">Photos importées</h4></div>
          	<div class="card-body">
          		@foreach ($listPhoto as $item)
      			    <div class="hovereffect col-lg-4 col-sm-4">
                        <img class="img-fluid" src="{{ asset('public/img/carousel').'/'.$item['id'].'.'.$item['ext'] }}" alt="">
                        <div class="overlay">
                           <h2>{{ $item['titre'] }}</h2>
                           <a class="info" href="{{ asset('admin/home/carousel').'/'.$item['id'] }}">Supprimer l'image</a>
                        </div>
                    </div>
                @endforeach
            </div>
         </div>
    </div>
@endsection