<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Seveyrac</title>
    
    <!-- jquery -->
    <script src="{{ asset('../vendor/components/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('../vendor/twbs/bootstrap/dist/css/bootstrap.min.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link href="css/template-bootstrap.css" rel="stylesheet">
    <link href="{{ asset('../vendor/components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
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
			  <a class="nav-link" href="galerie.html">Galeries</a>
            </li>
          </ul>
          <ul class="nav navbar-nav ml-auto">
			<li class="nav-item">
              <a class="nav-link" href="{{ asset('/signup') }}">Adhérer</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="about.html">Se connecter</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
	@yield('contenu')
	
	<!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Contact : Laurence Bonnefon 05 65 71 79 03</p>
        <p class="m-0 text-center text-white">&nbsp; &nbsp; &nbsp; &nbsp; Carole Carrière 06 21 51 09 27</p>
      </div>
    </footer>
  </body>
</html>
