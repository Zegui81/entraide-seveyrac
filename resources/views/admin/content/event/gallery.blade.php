@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
        <ul class="breadcrumb">
          <li>Importer des photos&nbsp;/&nbsp;</li>
          <li class="active">{{ $event['titre'] }}</li>
        </ul>
        {!! Form::open(['enctype' => 'multipart/form-data', 'class' => 'dropzone needsclick', 'id' => 'upload']) !!}
           <div class="dz-message needsclick">Déplacez les photos ici...</div>
        {!! Form::close() !!}
        
        <div class="card mt-3">
            <div class="card-header"><h4 class="mb-0">Photos présentes</h4></div>
            <div class="card-body">
            	<div class="row mt-3">
            		@foreach ($photos as $photo)
                        <div class="col-lg-3 col-sm-6 mb-4">
                           <img class="img-fluid" src="{!! url('img/event/gallery/'.$event['id'].'/'.$photo) !!}" alt="">
                        </div>            	
            		@endforeach
               </div>
    		</div>
        </div>
    </div>
@endsection