@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
       <ul class="breadcrumb">
          <li class="active">Transports solidaires : {{ $jour }}</li>
       </ul>
       @include('layouts/message')
       <div class="row">
        <div class="col-md-4">
          <div class="card mb-4">
            <h5 class="card-header">Recherche</h5>
            <div class="card-body">
				<div class="input-group">
                	<div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
                    </div>
                  	{!! Form::select('jour', $jours, null, ['id' => 'jour' , 'class' => 'form-control']) !!}
                  	<div class="input-group-append">
                        <a class="btn btn-primary" id="search">
                         <i class="fa fa-search"></i>
                        </a>
                    </div>
            	</div>
            </div>
          </div>
        </div>

        <div class="col-md-8 text-center">
		@if (count($transports) > 0)
          @foreach ($transports as $item) 
              <div class="card mb-4">
                <div class="card-header text-muted text-center">
                  <h5 class="mb-0">{{ $item['organisateur']['prenom'].' '.$item['organisateur']['nom'] }}</h5>
                </div>          
                <div class="card-body p-3">
					<p class="card-text text-justify">
                		<i class="fa fa-envelope text-center w-25px" aria-hidden="true"></i>:<i>&nbsp;{{ $item['organisateur']['email'] }}</i>
                	</p> 
                	
                	<p class="card-text text-justify">
                		<b class="card-subtitle text-muted">
                			@if ($item['heureDepart'] != null)
                				Départ : {{ $item['heureDepart'] }} 
                			@endif
                			
                			@if ($item['heureRetour'] != null)
                				/ Retour : {{ $item['heureRetour'] }}
							@endif                		
                		</b>
                	</p>
                	
                	<p class="card-text text-justify">{{ $item['commentaire'] }}</p>
                </div>
                <div class="card-footer text-muted">
					@if (isset($item['organisateur']['telFixe']))
                		<i class="fa fa-phone text-center w-25px" aria-hidden="true"></i>:<i class="mr-2"> {{ $item['organisateur']['telFixe'] }}</i>
            		@endif
            		
              		@if (isset($item['organisateur']['telPortable']))
                		<i class="ml-2 fa fa-mobile text-center w-25px" aria-hidden="true"></i>:<i> {{ $item['organisateur']['telPortable'] }}</i>
            		@endif
                </div>
              </div>
		 @endforeach
		 @else
		 	<h4 class="mt-5">Aucun transport solidaire n'est prévu pour : {{ $jour }}</h4>
		 @endif
        </div>

      </div>       
	<script type="text/javascript">
		$('#jour').val({{ $numJour }});
		$('#search').click(function() {
	    	window.location = "{{ asset('transport/search') }}" + "/" + $('#jour').val();
		});
	</script>
    </div>
@endsection