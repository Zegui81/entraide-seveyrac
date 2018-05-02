<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name') }}</title>
      
      <!-- Scripts -->
      <script src="{{ asset('../vendor/components/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
      <script src="{{ asset('js/clockpicker.js') }}"></script>
      <script src="{{ asset('js/dropzone.js') }}"></script>
      
      <!-- Police -->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
      
      <!-- CSS -->
      <link rel="stylesheet" href="{{ asset('../vendor/twbs/bootstrap/dist/css/bootstrap.min.css') }}">
      <link href="{{ asset('css/template-bootstrap.css') }}" rel="stylesheet">
      <link href="{{ asset('../vendor/components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/effectHover.css') }}" rel="stylesheet">
      <link href="{{ asset('css/clockpicker.css') }}" rel="stylesheet">
      <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
      <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
      
      <!-- Calendar -->
      @if(isset($HEAD_calendar))
 		<link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
        <script src="{{ asset('fullcalendar/moment.min.js') }}"></script>
        <script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('fullcalendar/fr.js') }}"></script>
      @endif
   </head>
   <body class="text-justify">
      <!-- Navigation -->
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top" id="top">
         <div class="container">
            <a class="navbar-brand" href="{{ asset('/') }}">De pierres et de chênes</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="nav navbar-nav navbar-left">
                  <li class="nav-item">
                     <a class="nav-link" href="{{ asset('/event') }}">Evénements</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about.html">Transports solidaires</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ asset('/covoit') }}">Covoiturage</a>
                  </li>
               </ul>
               
               @auth
    				<ul class="nav navbar-nav ml-auto">
					    @if (Auth::user()->actif == 2)
                            <li class="nav-item">
                               <a class="nav-link" href="{{ asset('/admin') }}">Administrer le site</a>
                            </li>
                        @else
        					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Proposer...&nbsp;</a>
        						<div class="dropdown-menu bg-dark nav-item">
        							<a class="dropdown-item nav-link" href="{{ asset('/covoit/propose') }}">un covoiturage</a>
									<a class="dropdown-item nav-link" href="#">un transport solidaire</a>
									<div class="dropdown-divider bg-dark"></div>
									<a class="dropdown-item nav-link" href="#">un évènement</a>
        						</div>
        					</li> 
						@endif
					<li class="nav-item">
                         <a class="nav-link" href="{{ asset('/logout') }}">Se déconnecter</a>
                      </li>
                   </ul>
               @endauth
               
               @guest
    			   <ul class="nav navbar-nav ml-auto">
                      <li class="nav-item">
                         <a class="nav-link" href="{{ asset('/register') }}">Adhérer</a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link" href="{{ asset('/login') }}">Se connecter</a>
                      </li>
                   </ul>
               @endguest
               
            </div>
         </div>
      </nav>
      
      @yield('content')
      
      <!-- Footer -->
      <footer class="py-4 bg-dark">
         <div class="container">
         	<div class="m-0 text-center text-white footer">{!! App\Text::where('code', 'FOOTER')->first()->content !!}</div>
         </div>
      </footer>
   </body>
</html>