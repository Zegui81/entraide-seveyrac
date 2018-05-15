@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
       <ul class="breadcrumb">
          <li class="">Adhérents</li>
          <li class="ml-auto">
             <a class="btn btn-primary" href="{{ asset('admin/user/add') }}">
             	Ajouter un adhérent&nbsp;&nbsp;<i class="fa fa-user-plus"></i>
             </a>
          </li>
       </ul>
       @include('layouts/message')
       
       @if (count($listUser) == 0)
           <h5 class="alert-heading text-center mb-0">Aucune adhérent</h5>
       @else
           <table class="table table-striped mb-0">
              <thead>
                 <tr>
                    <th scope="col">Personne</th>
                    <th scope="col">Email</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Cotisation</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Actions</th>
                 </tr>
              </thead>
              <tbody>
                 @foreach ($listUser as $item)
                     <tr {{ Auth::user()->id == $item['id'] ? 'class=table-info' : '' }}>
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
                        <td><a class="btn btn-{{ $item['cotisation'] ? 'success paye' : 'danger n-paye' }}" href="{{ asset('admin/user/cotisation').'/'.$item['id'] }}"></a></td>
                        <td>{{ $item['actif'] == 2 ? 'Admin' : 'Membre' }}</td>
                        <td>
					    	@if (Auth::user()->id != $item['id'])
					    		@if ($item['actif'] == 1)
    					    		{!! Form::open(['url' => 'admin/user/upgrade/'.$item['id'], 'method' => 'POST', 'class' => 'float-left mr-1']) !!}
                                       {!! method_field('patch') !!}
                                       {!! Form::button('<i class="fa fa-angle-double-up" aria-hidden="true"></i>', array('title' => 'Définir ce membre en tant qu\'administrateur', 'type' => 'submit', 'class' => 'btn btn-sm btn-success w-32px')) !!}
                                    {!! Form::close() !!}
					    		@elseif ($item['actif'] == 2)
    					    		{!! Form::open(['url' => 'admin/user/downgrade/'.$item['id'], 'method' => 'POST', 'class' => 'float-left mr-1']) !!}
                                       {!! method_field('patch') !!}
                                       {!! Form::button('<i class="fa fa-angle-double-down" aria-hidden="true"></i>', array('title' => 'Destituer ce membre', 'type' => 'submit', 'class' => 'btn btn-sm btn-secondary w-32px')) !!}
                                    {!! Form::close() !!}					    		
					    		@endif
                            @endif
                            <a class="btn btn-sm btn-warning mr-1 float-left" title="Modifier le profil de ce membre" href="{{ asset('admin/user/edit').'/'.$item['id'] }}">
                           		<i class="fa fa-pencil-square-o w-32"></i>
                            </a>
					    	@if (Auth::user()->id != $item['id'])
                               {!! Form::open(['url' => 'admin/user/'.$item['id'], 'method' => 'POST', 'class' => 'float-left',
                               		 'onsubmit' => 'return confirm("Souhaitez-vous vraiment supprimer cet adhérent ? Ses covoiturages, ainsi que ses transports solidaires le seront également.")']) !!}
                                   {!! method_field('delete') !!}
                                   {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('title' => 'Supprimer ce membre', 'type' => 'submit', 'class' => 'btn btn-sm btn-danger w-32px')) !!}
                               {!! Form::close() !!}
                            @endif
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
@endsection