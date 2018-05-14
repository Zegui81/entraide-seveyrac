@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
    	@include('layouts/message')
        <div class="card">
            <div class="card-header"><h4 class="mb-0">Demandes d'admission</h4></div>
            <div class="card-body">
            	@if (count($listMembership) == 0)
            		<h5 class="alert-heading text-center mb-0">Aucune demande d'admission</h5>  
            	@else
            		<table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th scope="col">Personne</th>
                          <th scope="col">Email</th>
                          <th scope="col">Adresse</th>
                          <th scope="col">Téléphone</th>
                          <th scope="col">Mobile</th>
                          <th scope="col">Demande</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($listMembership as $item)
                            <tr>
                              <td>{{ $item['prenom'].' '.$item['nom'] }}</td>
                              <td>{{ $item['email'] }}</td>
                              <td>
                                <button type="button" id="pop-{{ $item['id'] }}"
                                	class="btn btn-secondary adresse-popover" 
                                	data-toggle="popover" 
                                	data-trigger="focus"
                                	data-placement="right"
                                	data-html="true"
                                	title="Adresse de {{ $item['prenom'].' '.$item['nom'] }}" 
                                	data-content="{{ $item['adresse'] }}">Voir
                                </button>
                              </td>
                              <td>{{ $item['telFixe'] }}</td>
                              <td>{{ $item['telPortable'] }}</td>
                              <td>{{ $item['created_at'] }}</td>
                              <td>
                              	  {!! Form::open(['url' => 'admin/membership/'.$item['id'], 'method' => 'POST', 'class' => 'float-left mr-1']) !!}
                              	  	{!! method_field('patch') !!}
        							{!! Form::button('<i class="fa fa-check" aria-hidden="true"></i>', array('title' => 'Accepter ce membre', 'type' => 'submit', 'class' => 'btn btn-sm btn-success w-32px')) !!}
              					  {!! Form::close() !!} 
              					  
              					  {!! Form::open(['url' => 'admin/membership/'.$item['id'], 'method' => 'POST', 'class' => 'float-left']) !!}
                              	  	{!! method_field('delete') !!}
        							{!! Form::button('<i class="fa fa-ban" aria-hidden="true"></i>', array('title' => 'Refuser ce membre', 'type' => 'submit', 'class' => 'btn btn-sm btn-danger w-32px')) !!}
              					  {!! Form::close() !!}
                              </td>
                            </tr>                          
                          @endforeach
                      </tbody>
            		</table>
            		<script type="text/javascript">
                    	$(function () {
                    	  $('.adresse-popover').popover({
                    	    container: 'body'
                    	  })
                    	})
                    </script>
        		@endif
        	</div>
    	</div>
    </div>

@endsection