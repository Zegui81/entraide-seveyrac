@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
        <div class="card">
            <div class="card-header"><h4 class="mb-0">Adhérents</h4></div>
            <div class="card-body">
            	@if (count($listUser) == 0)
            		<h5 class="alert-heading text-center mb-0">Aucune adhérent</h5>  
            	@else
            		<table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th scope="col">Personne</th>
                          <th scope="col">Email</th>
                          <th scope="col">Téléphone</th>
                          <th scope="col">Mobile</th>
                          <th scope="col">Demande</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($listUser as $item)
                            <tr>
                              <td>{{ $item['prenom'].' '.$item['nom'] }}</td>
                              <td>{{ $item['email'] }}</td>
                              <td>{{ $item['telFixe'] }}</td>
                              <td>{{ $item['telPortable'] }}</td>
                              <td>{{ $item['created_at'] }}</td>
                              <td>
              					  {!! Form::open(['url' => 'admin/user/'.$item['id'], 'method' => 'POST', 'class' => 'float-left']) !!}
                              	  	{!! method_field('delete') !!}
        							{!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('title' => 'Supprimer ce membre', 'type' => 'submit', 'class' => 'btn btn-sm btn-danger w-32px')) !!}
              					  {!! Form::close() !!}
                              </td>
                            </tr>                          
                          @endforeach
                      </tbody>
            		</table>
        		@endif
        	</div>
    	</div>    	
    	@if (Request::isMethod('delete'))
    		<div class="alert alert-warning mt-2 text-center" role="alert">
   				<span><i class="fa fa-trash fa-2x" aria-hidden="true"></i>&nbsp;L'utilisateur a été supprimé.</span>
			</div>
    	@endif
    </div>
@endsection