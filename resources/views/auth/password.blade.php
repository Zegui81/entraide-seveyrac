@extends('layouts/app')

@section('content')
    <div class="container mt-4 mb-4">	
        @include('layouts/message')
        <div class="card">
          <div class="card-header"><h4 class="mb-0">Changer le mot de passe</h4></div>
          <div class="card-body">
       	  	  @include('forms/password')
       	  </div>
		</div>
    </div>
@endsection