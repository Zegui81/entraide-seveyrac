@extends('layouts.app')

@section('content')
    <div class="container mb-4 mt-4">
       <ul class="breadcrumb">
          <li class="active">Covoiturages du {{ $dateSearch }}</li>
          <li class="ml-auto">
             <a class="btn btn-primary" href="{{ asset('covoit/calendar') }}">
             Afficher le calendrier&nbsp;&nbsp;<i class="fa fa-calendar"></i>
             </a>
          </li>
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
                    <input class="form-control" name="jourDepart" type="date" id="jourDepart">
                  	<div class="input-group-append">
                        <a class="btn btn-primary" id="search">
                         <i class="fa fa-search"></i>
                        </a>
                  </div>
            	</div>
            </div>
          </div>
        </div>


        <!-- Blog Entries Column -->
        <div class="col-md-8 text-center">
		@if (count($covoits) > 0)
          @foreach ($covoits as $item) 
              <div class="card mb-4">
                <div class="card-header text-muted text-center">
                  <h5 class="mb-0">{{ $item['origine'] }}
                  &nbsp;&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;&nbsp;
                  {{ $item['destination'] }}</h5>
                </div>          
                <div class="card-body p-3">
					<p class="card-text text-justify">
                		<b>{{ $item['organisateur']['prenom'].' '.$item['organisateur']['nom'] }}</b> - 
                		<i class="fa fa-envelope text-center w-25px" aria-hidden="true"></i>:<i>&nbsp;{{ $item['organisateur']['email'] }}</i> - 
                		<b class="card-subtitle text-muted">{{ $item['nbPlace'] }} place(s)</b>
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
		 	<h4 class="mt-5">Aucun covoiturage n'est prévu le {{ $dateSearch }}</h4>
		 @endif
        </div>

      </div>       
	<script type="text/javascript">
		$('#search').click(function() {
			if ($('#jourDepart').val().length > 0) {
		    	window.location = "{{ asset('covoit/search') }}" + "/" + $('#jourDepart').val();
			}
		});
	</script>
    </div>
@endsection