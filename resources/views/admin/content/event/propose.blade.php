@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
       <ul class="breadcrumb">
          <li class="">Évènements proposés par les adhérents</li>
       </ul>
       @include('layouts/message')
       
       @if (count($listEvent) == 0)
       	  <h5 class="alert-heading text-center mb-0">Aucun évènement n'a été proposé</h5>
       @else
           <table class="table table-striped mb-0">
              <thead>
                 <tr>
                 	<th scope="col">Organisateur</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Début</th>
                    <th scope="col">Actions</th>
                 </tr>
              </thead>
              <tbody>
                 @foreach ($listEvent as $item)
                     <tr>
                        <td>{{ $item['organisateur']['prenom'].' '.$item['organisateur']['nom'] }}</td>
                        <td>{{ $item['titre'] }}</td>
                        <td>{{ $item['debut'] }}</td>
                        <td>
                           {!! Form::open(['url' => 'admin/publish/event/'.$item['id'], 'method' => 'POST', 'class' => 'float-left ml-1']) !!}
                               {!! method_field('patch') !!}
                               {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i>', array('title' => 'Publier cet évènement', 'type' => 'submit', 'class' => 'btn btn-sm btn-success w-32px')) !!}
                           {!! Form::close() !!}                                                                                     
                           <a class="btn btn-sm btn-warning ml-1 float-left" title="Modifier cet évènement" href="{{ asset('admin/propose/event/').'/'.$item['id'] }}">
                           		<i class="fa fa-pencil-square-o w-32"></i>
                           </a>
                           {!! Form::open(['url' => 'admin/propose/event/'.$item['id'], 'method' => 'POST', 'class' => 'float-left ml-1', 'onsubmit' => 'return confirm("Souhaitez-vous vraiment refuser cette proposition d\'évènement ?")']) !!}
                               {!! method_field('delete') !!}
                               {!! Form::button('<i class="fa fa-times" aria-hidden="true"></i>', array('title' => 'Refuser cet évènement', 'type' => 'submit', 'class' => 'btn btn-sm btn-danger w-32px')) !!}
                           {!! Form::close() !!}
                        </td>
                     </tr>
                 @endforeach
              </tbody>
           </table>
       @endif
    </div>
@endsection