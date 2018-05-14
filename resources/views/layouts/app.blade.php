<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Seveyrac - Association De Pierres et de Chênes. Partage, terroir et patrimoine.
      		Je suis une association citoyenne et solidaire. Ma philosophie c'est le lien social entre les 
      		villageois autour de Séveyrac. On se retrouve autour de projets et d'ateliers :
      		randonnée, art créatif, co-voiturage, bio-diversité, yoga, cuisine, jardinage, patrimoine,
      		jardins, musicaux, réouverture de chemins, jeux de société, échange de livres, photo..." />
      <meta name="keywords" content="Seveyrac, Séveyrac, 12330, Rodez, Aveyron, Bozouls, Association,
      		associations, pierre, pierres, et, Chênes, chene, chêne, partage, terroir, patrimoine,
      		citoyenne, solidaire, solidaires, philosophie, lien, social, entre,	villageois,
      		autour, Séveyrac, retrouve, retrouver, projets, projet, ateliers, atelier, covoiturage, transport,
      		soliaire, randonnée, art, créatif, co-voiturage, bio-diversité, yoga, cuisine, jardinage, patrimoine,
      		jardins, musicaux, réouverture, chemins, jeux, société, échange de livres, photo..." />
      <link rel="icon" type="image/png" href="{{ asset('public/icon.png') }}" />
      
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Séveyrac - De Pierres et de Chênes</title>
      
      <!-- Scripts -->
      <script src="{{ asset('vendor/components/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('public/ckeditor5/ckeditor.js') }}"></script>
      <script src="{{ asset('public/js/clockpicker.js') }}"></script>
      <script src="{{ asset('public/js/dropzone.js') }}"></script>
      
      <!-- Police -->
      <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
      
      <!-- CSS -->
      <link rel="stylesheet" href="{{ asset('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') }}">
      <link href="{{ asset('public/css/template-bootstrap.css') }}" rel="stylesheet">
      <link href="{{ asset('vendor/components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
      <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('public/css/effectHover.css') }}" rel="stylesheet">
      @if(isset($HEAD_clockpicker))
	      <link href="{{ asset('public/css/clockpicker.css') }}" rel="stylesheet">
	  @endif
      <link href="{{ asset('public/css/dropzone.css') }}" rel="stylesheet">
      <link href="{{ asset('public/css/modal.css') }}" rel="stylesheet">
      
      @if(isset($HEAD_calendar))
        <!-- Calendar -->
 		<link href="{{ asset('public/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
        <script src="{{ asset('public/fullcalendar/moment.min.js') }}"></script>
        <script src="{{ asset('public/fullcalendar/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('public/fullcalendar/fr.js') }}"></script>
      @endif
   </head>
   <body class="text-justify">
      <!-- Navigation -->
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top" id="top">
         <div class="container">
            <a class="navbar-brand" href="{{ asset('/') }}">Séveyrac - De Pierres et de Chênes</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="nav navbar-nav navbar-left">
               	  @guest
                      <li class="nav-item">
                         <a class="nav-link" href="{{ asset('/event') }}">Nos activités</a>
                      </li>
                  @endguest
                  @auth
                      <li class="nav-item">
                         <a class="nav-link" href="{{ asset('/event') }}">Évènements</a>
                      </li>                  
                      <li class="nav-item">
                         <a class="nav-link" href="{{ asset('/transport') }}">Transport solidaire</a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link" href="{{ asset('/covoit') }}">Covoiturage</a>
                      </li>
                  @endauth
                  <li class="nav-item">
                     <a class="nav-link" href="{{ asset('/news') }}">On parle de nous !</a>
                  </li>
                  @guest
                      <li class="nav-item">
                         <a class="nav-link" href="{{ asset('/contact') }}">Nous contacter</a>
                      </li>                      
                  @endguest
               </ul>
               
               @auth
    				<ul class="nav navbar-nav ml-auto">
					    @if (Auth::user()->actif == 2)
                            <li class="nav-item">
                               <a class="nav-link" href="{{ asset('/admin') }}">Administrer le site</a>
                            </li>
                        @else
        					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mon espace&nbsp;</a>
        						<div class="dropdown-menu bg-dark nav-item">
        							<a class="dropdown-item nav-link" href="{{ asset('/covoit/manage') }}">Mes covoiturages</a>
									<a class="dropdown-item nav-link" href="{{ asset('/transport/manage') }}">Mes transports solidaires</a>
									<div class="dropdown-divider bg-dark"></div>
									<a class="dropdown-item nav-link" href="{{ asset('/event/propose') }}">Proposer un évènement</a>
									<div class="dropdown-divider bg-dark"></div>
        							<a class="dropdown-item nav-link" href="{{ asset('/profile') }}">Éditer mon profil</a>
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
      
      <div id="main">
      	  @yield('content')
      </div>
      
      <!-- Footer -->
      <footer class="py-4 bg-dark footer">
         <div class="container">
         	<div class="m-0 text-center text-white">{!! App\Text::where('code', 'FOOTER')->first()->content !!}</div>
         </div>
      </footer>
   </body>
</html>