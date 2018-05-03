@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
       <ul class="breadcrumb">
          <li class="">Adhérents</li>
          <li class="ml-auto">
             <a class="btn btn-primary" href="{{ asset('admin/user/add') }}">Ajouter un adhérent&nbsp;&nbsp;
             <i class="fa fa-user-plus"></i>
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
@endsection