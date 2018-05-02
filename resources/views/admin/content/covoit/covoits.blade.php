@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
       <ul class="breadcrumb">
          <li class="">Covoiturages</li>
          <li class="ml-auto">
             <a class="btn btn-primary" href="{{ asset('covoit/propose') }}">Publier un covoiturage&nbsp;&nbsp;
             <i class="fa fa-car"></i>
             </a>
          </li>
       </ul>
       @if (count($listCovoit) == 0)
       	  <h5 class="alert-heading text-center mb-0">Aucun covoiturage</h5>
       @else
           <table class="table table-striped mb-0">
              <thead>
                 <tr>
                    <th scope="col">Départ</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Jour / Heure</th>
                    <th scope="col">Nb places</th>
                    <th scope="col">Covoitureur</th>
                    <th scope="col">Actions</th>
                 </tr>
              </thead>
              <tbody>
                 @foreach ($listCovoit as $item)
                     <tr>
                        <td>{{ $item['origine'] }}</td>
                        <td>{{ $item['destination'] }}</td>
                        <td>{{ $item['depart'] }}</td>
                        <td>{{ $item['nbPlace'] }}</td>
                        <td>{{ $item['organisateur']['prenom'].' '.$item['organisateur']['nom'] }}</td>
                        <td>
                           <a class="btn btn-sm btn-warning ml-1 float-left" title="Modifier ce covoiturage" href="{{ asset('admin/covoit/').'/'.$item['id'] }}">
                           		<i class="fa fa-pencil-square-o w-32"></i>
                           </a>
                           {!! Form::open(['url' => 'admin/covoit/'.$item['id'], 'method' => 'POST', 'class' => 'float-left ml-1']) !!}
                               {!! method_field('delete') !!}
                               {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('title' => 'Supprimer ce covoiturage', 'type' => 'submit', 'class' => 'btn btn-sm btn-danger w-32px')) !!}
                           {!! Form::close() !!}
                        </td>
                     </tr>
                 @endforeach
              </tbody>
           </table>
       @endif
       @if (Request::isMethod('delete'))
           <div class="alert alert-warning mt-2 text-center" role="alert">
              <span><i class="fa fa-trash fa-2x" aria-hidden="true"></i>&nbsp;Le covoiturage a été supprimé.</span>
           </div>
       @endif
    </div>
@endsection