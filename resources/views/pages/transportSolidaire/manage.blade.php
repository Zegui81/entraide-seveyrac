@extends('layouts/app')

@section('content') 
    <div class="container mt-4 mb-4">
        <div class="card">
          <div class="card-header"><h4 class="mb-0">Proposer un transport solidaire</h4></div>
          <div class="card-body">
                @include('forms/transportSolidaire')
       	  </div>
		</div>
    	@include('layouts/message')
        <div class="card mt-4">
        	<div class="card-header"><h4 class="mb-0">Mes transports solidaires</h4></div>
          	<div class="card-body">
				@if (count($transports) == 0)
       	  			<h5 class="alert-heading text-center mb-0">Aucun transport solidaire proposé</h5>
       			@else          	
                   <table class="table table-striped mb-0">
                      <thead>
                         <tr>
                            <th scope="col">Jour</th>
                            <th scope="col">Heure de départ</th>
                            <th scope="col">Heure de retour</th>
                            <th scope="col">Actions</th>
                         </tr>
                      </thead>
                      <tbody>
                         @foreach ($transports as $item)
                             <tr>
                                <td>{{ $item['jour'] }}</td>
                                <td>{{ $item['heureDepart'] }}</td>
                                <td>{{ $item['heureRetour'] }}</td>
                                <td>
                                   <a class="btn btn-sm btn-warning ml-1 float-left" title="Modifier ce transport solidaire" href="{{ asset('transport/manage').'/'.$item['id'] }}">
                           				<i class="fa fa-pencil-square-o w-32"></i>
                          		   </a>
                                   {!! Form::open(['url' => 'transport/manage/'.$item['id'], 'method' => 'POST', 'class' => 'float-left ml-1', 'onsubmit' => 'return confirm("Souhaitez-vous vraiment supprimer ce transport solidaire ?")']) !!}
                                       {!! method_field('delete') !!}
                                       {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('title' => 'Supprimer ce transport solidaire', 'type' => 'submit', 'class' => 'btn btn-sm btn-danger w-32px')) !!}
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