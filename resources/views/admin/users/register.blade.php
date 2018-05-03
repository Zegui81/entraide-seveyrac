@extends('layouts/app')

@section('content')
    <div class="container mt-4 mb-4">	
        @include('layouts/message')
        <div class="card">
          <div class="card-header"><h4 class="mb-0">Ajouter un adhérent</h4></div>
          <div class="card-body">
       	  	  @include('forms/register')
       	  </div>
		</div>
    </div>
@endsection