@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
        <ul class="breadcrumb">
          <li>Gallerie de photos de : &nbsp;</li>
          <li class="active">{{ $event['titre'] }}</li>
          <li class="ml-auto">
             <a class="btn btn-primary" href="{{ asset('admin/event') }}">Retour aux évènements&nbsp;&nbsp;
             <i class="fa fa-calendar"></i>
             </a>
          </li>
        </ul>
        {!! Form::open(['enctype' => 'multipart/form-data', 'class' => 'dropzone needsclick', 'id' => 'upload']) !!}
           <div class="dz-message needsclick">Déplacez les photos ici<br>ou<br>Cliquez ici pour importer les photos</div>
        {!! Form::close() !!}
        
        <script type="text/javascript">
        	Dropzone.options.upload = {
        		url: window.location.href,
        		acceptedFiles: '.png,.jpg,.gif,.bmp,.jpeg',
        		dictInvalidFileType: 'Vous ne pouvez importer que des photos.',
        		queuecomplete: function() {
            		location.reload();
        		}
        	};
        </script>
        
        <div class="card mt-3">
            <div class="card-header"><h4 class="mb-0">Photos présentes</h4></div>
            <div class="card-body">
            	<div class="row mt-3">
            		@foreach ($photos as $photo)
                        <div class="col-lg-3 col-sm-6 mb-4 suppress">
                           <img class="img-fluid" src="{!! url('img/event/gallery/'.$event['id'].'/'.$photo) !!}" alt="">
                           <div class="delete-icon">
                               <a href="{{ asset('admin/event/gallery').'/'.$event['id'].'/'.$photo }}">
                               	   <i class="fa fa-times fa-lg text-danger"></i>
                               </a>
                           </div>
                        </div>            	
            		@endforeach
               </div>
    		</div>
        </div>
    </div>
@endsection