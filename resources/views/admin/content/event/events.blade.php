@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
       <ul class="breadcrumb">
          <li class="">Évènements</li>
          <li class="ml-auto">
             <a class="btn btn-primary" href="{{ asset('admin/event/add') }}">Créer un évènement&nbsp;&nbsp;
             <i class="fa fa-calendar-plus-o"></i>
             </a>
          </li>
       </ul>
       @include('layouts/message')
       
       @if (count($listEvent) == 0)
       	  <h5 class="alert-heading text-center mb-0">Aucun évènement</h5>
       @else
           <table class="table table-striped mb-0">
              <thead>
                 <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Début</th>
                    <th scope="col">Organisateur</th>
                    <th scope="col">Actions</th>
                 </tr>
              </thead>
              <tbody>
                 @foreach ($listEvent as $item)
                     <tr>
                        <td>{{ $item['titre'] }}</td>
                        <td>{{ $item['debut'] }}</td>
                        <td>{{ $item['organisateur']['prenom'].' '.$item['organisateur']['nom'] }}</td>
                        <td>
                           <a class="btn btn-sm btn-primary float-left" title="Afficher cet évènement" href="{{ asset('event/detail/').'/'.$item['id'] }}">
                           		<i class="fa fa-search w-32"></i>
                           </a> 
                           <a class="btn btn-sm btn-success ml-1 float-left" title="Modifier la galerie de cet évènement" href="{{ asset('admin/event/gallery').'/'.$item['id'] }}">
                           		<i class="fa fa-picture-o w-32"></i>
                           </a>                                                              
                           <a class="btn btn-sm btn-warning ml-1 float-left" title="Modifier cet évènement" href="{{ asset('admin/event/').'/'.$item['id'] }}">
                           		<i class="fa fa-pencil-square-o w-32"></i>
                           </a>
                           {!! Form::open(['url' => 'admin/event/'.$item['id'], 'method' => 'POST', 'class' => 'float-left ml-1']) !!}
                               {!! method_field('delete') !!}
                               {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('title' => 'Supprimer cet évènement', 'type' => 'submit', 'class' => 'btn btn-sm btn-danger w-32px')) !!}
                           {!! Form::close() !!}
                        </td>
                     </tr>
                 @endforeach
              </tbody>
           </table>
       @endif
       @if (Request::isMethod('delete'))
           <div class="alert alert-warning mt-2 text-center" role="alert">
              <span><i class="fa fa-trash fa-2x" aria-hidden="true"></i>&nbsp;L'utilisateur a été supprimé.</span>
           </div>
       @endif
    </div>
@endsection