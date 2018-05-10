@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
       <ul class="breadcrumb">
          <li class="active">Messages laissés</li>
       </ul>
       @include('layouts/message')

        <div class="col-md-12">
		@if (count($contacts) > 0)
            @foreach ($contacts as $item) 
              <div class="card mb-4">
                <div class="card-header text-muted ">
                  <h5 class="mb-0">{{ $item['prenom'].' '.$item['nom'].', le '.$item['created_at'] }} </h5>
                </div>          
                <div class="card-body p-3">
					<p class="card-text text-justify">
                		<i class="fa fa-envelope text-center w-25px" aria-hidden="true"></i>:<i>&nbsp;{{ $item['email'] }}</i>
                	</p> 
                	<p class="card-text text-justify">{{ $item['message'] }}</p>
                </div>
                <div class="card-footer text-center">
                   {!! Form::open(['url' => 'admin/contact/'.$item['id'], 'method' => 'POST', 'class' => 'float-left w-100']) !!}
                       {!! method_field('delete') !!}
					   {!! Form::button('Supprimer&nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger w-75')) !!}
                   {!! Form::close() !!}
                </div>
              </div>

		    @endforeach
		 @else
		 	<h4 class="mt-5 text-center">Aucun message n'a été laissé</h4>
		 @endif
        </div>

    </div>
@endsection