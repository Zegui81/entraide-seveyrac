@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
       <ul class="breadcrumb">
          <li class="active">On parle de nous !</li>
       </ul>
       @include('layouts/message')
        <div class="col-md-12 text-center">
		@if (count($articles) > 0)
          @foreach ($articles as $item) 
              <div class="card mb-4">
                <div class="card-header text-muted text-center">
                  <h5 class="mb-0">{{ $item['titre'].' ('.$item['datePubli'].')' }}</h5>
                </div>          
                <div class="card-body p-3">
             		<img class="img-fluid rounded mb-4" src="{!! url('public/img/presse/'.$item['id'].'.jpg') !!}" alt="">
                </div>
                @if (!empty($item['description']))
                    <div class="card-footer text-muted">
    					<p class="card-text text-justify">{{ $item['description'] }}</p>
                    </div>
                @endif
              </div>
		 @endforeach
		 @else
		 	<h4>Aucun article n'est disponible</h4>
		 @endif
        </div>
    </div>
@endsection