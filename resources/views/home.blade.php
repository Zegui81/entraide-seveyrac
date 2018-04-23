@extends('layouts/app')

@section('content')
    <header>
    	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    		<ol class="carousel-indicators">
    			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    		</ol>
    		<div class="carousel-inner" role="listbox">
    			<div class="carousel-item active" style="background-image: url('img/1.jpg')">
    				<div class="carousel-caption d-none d-md-block">
    					<h3>First Slide</h3>
    					<p>This is a description for the first slide.</p>
    				</div>
    			</div>
    			<div class="carousel-item" style="background-image: url('img/1.jpg')">
    				<div class="carousel-caption d-none d-md-block">
    					<h3>First Slide</h3>
    					<p>This is a description for the first slide.</p>
    				</div>
    			</div>
    			<div class="carousel-item" style="background-image: url('img/1.jpg')">
    				<div class="carousel-caption d-none d-md-block">
    					<h3>First Slide</h3>
    					<p>This is a description for the first slide.</p>
    				</div>
    			</div>
    			<div class="carousel-item" style="background-image: url('img/1.jpg')">
    				<div class="carousel-caption d-none d-md-block">
    					<h3>First Slide</h3>
    					<p>This is a description for the first slide.</p>
    				</div>
    			</div>
    			<div class="carousel-item" style="background-image: url('img/1.jpg')">
    				<div class="carousel-caption d-none d-md-block">
    					<h3>First Slide</h3>
    					<p>This is a description for the first slide.</p>
    				</div>
    			</div>
    		</div>
    		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> 
    			<span class="carousel-control-prev-icon" aria-hidden="true"></span> 
    			<span class="sr-only">Previous</span>
    		</a> 
    		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    			<span class="carousel-control-next-icon" aria-hidden="true"></span> 
    			<span class="sr-only">Next</span>
    		</a>
    	</div>
    </header>
    
    <div class="container">
    	<div class="row mb-4 mt-4">
    		<div class="col-lg-6">
    			<h2>Partage, terroir et patrimoines</h2>
    			<p>Je suis une association citoyenne et solidaire. Ma philosophie
    				c'est le lien social entre les villageois autour de Séveyrac</p>
    			<p>On se retrouve autour de projets et d'ateliers :</p>
    			<ul>
    				<li>randonnée</li>
    				<li>art créatif</li>
    				<li>co-voiturage</li>
    				<li>bio-diversité</li>
    				<li>yoga</li>
    				<li>cuisine</li>
    				<li>jardinage</li>
    				<li>patrimoine</li>
    				<li>jardins musicaux</li>
    				<li>réouverture de chemins</li>
    				<li>jeux de société</li>
    				<li>échange de livres</li>
    				<li>photo...</li>
    			</ul>
    		</div>
    		<div class="col-lg-6">
    			<img class="img-fluid rounded" src="img/2.jpg" alt="">
    		</div>
    		<div class="card text-center w-100">
        		<div class="card-body">
        			<p class="card-text">
        			Chacun vient en fonction de ce qu'il aime, chacun amène ses idées, chacun peut mettre en place un atelier.
        				<br>Vous êtes les bienvenus...
        			</p>
        			<h5 class="card-title">Nous avons tous quelque-chose à partager !</h5>
        		</div>
    		</div>
    	</div>
    </div>
@endsection