@extends('layouts/app')

@section('content')
    <div class="container mt-4 mb-4">
        <div class="card">
          <div class="card-header">
          	<h4 class="mb-0">
          		{{ $covoit == null ? 'Publier un covoiturage' : 'Éditer le covoiturage' }}
          	</h4></div>
          <div class="card-body">
       	  	  @include('forms/covoit')
       	  </div>
		</div>
		@include('layouts/message')
		<div class="card mt-4">
        	<div class="card-header"><h4 class="mb-0">Mes covoiturages</h4></div>
          	<div class="card-body">
				@if (count($covoits) == 0)
       	  			<h5 class="alert-heading text-center mb-0">Aucun covoiturage proposé</h5>
       			@else          	
                   <table class="table table-striped mb-0">
                      <thead>
                         <tr>
                            <th scope="col">Départ</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Jour / Heure</th>
                            <th scope="col">Places</th>
                            <th scope="col">Actions</th>
                         </tr>
                      </thead>
                      <tbody>
                         @foreach ($covoits as $item)
                             <tr>
                                <td>{{ $item['origine'] }}</td>
                                <td>{{ $item['destination'] }}</td>
                                <td>{{ $item['depart'] }}</td>
                                <td>{{ $item['nbPlace'] }}</td>
                                <td>
                                   <a class="btn btn-sm btn-warning ml-1 float-left" title="Modifier ce covoiturage" href="{{ asset('covoit/manage').'/'.$item['id'] }}">
                           				<i class="fa fa-pencil-square-o w-32"></i>
                          		   </a>
                                   {!! Form::open(['url' => 'covoit/manage/'.$item['id'], 'method' => 'POST', 'class' => 'float-left ml-1', 'onsubmit' => 'return confirm("Souhaitez-vous vraiment supprimer ce covoiturage ?")']) !!}
                                       {!! method_field('delete') !!}
                                       {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('title' => 'Supprimer ce covoiturage', 'type' => 'submit', 'class' => 'btn btn-sm btn-danger w-32px')) !!}
                                   {!! Form::close() !!}
                                </td>
                             </tr>
                         @endforeach
                      </tbody>
                   </table>    					
                @endif    	
            </div>
         </div>
    </div>
@endsection