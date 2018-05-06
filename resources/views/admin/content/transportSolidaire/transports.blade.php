@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">    
       <ul class="breadcrumb">
          <li class="">Transports solidaires</li>
          <li class="ml-auto">
             <a class="btn btn-primary" href="{{ asset('admin/transport/publish') }}">Publier un transport solidaire&nbsp;&nbsp;
             <i class="fa fa-car"></i>
             </a>
          </li>
       </ul>
       @include('layouts/message')
       
       @if (count($listTransport) == 0)
       	  <h5 class="alert-heading text-center mb-0">Aucun transport solidaire</h5>
       @else
           <table class="table table-striped mb-0">
              <thead>
                 <tr>
                    <th scope="col">Jour</th>
                    <th scope="col">Heure de départ</th>
                    <th scope="col">Heure de retour</th>
                    <th scope="col">Organisateur</th>
                    <th scope="col">Actions</th>
                 </tr>
              </thead>
              <tbody>
                 @foreach ($listTransport as $item)
                     <tr>
                        <td>{{ $item['jour'] }}</td>
                        <td>{{ $item['heureDepart'] }}</td>
                        <td>{{ $item['heureRetour'] }}</td>
                        <td>{{ $item['organisateur']['prenom'].' '.$item['organisateur']['nom'] }}</td>
                        <td>
                           <a class="btn btn-sm btn-warning ml-1 float-left" title="Modifier ce transport solidaire" href="{{ asset('admin/transport/').'/'.$item['id'] }}">
                           		<i class="fa fa-pencil-square-o w-32"></i>
                           </a>
                           {!! Form::open(['url' => 'admin/transport/'.$item['id'], 'method' => 'POST', 'class' => 'float-left ml-1']) !!}
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
@endsection