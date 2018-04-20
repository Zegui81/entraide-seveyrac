@extends('template')

@section('contenu')
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Événement
        <small>à venir</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol>

      <!-- Intro Content -->
      <div class="row">
        <div class="col-lg-6">
          <img class="img-fluid rounded mb-4" src="img/6.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <h2>Soirée cuisine</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
        </div>
      </div>
      <!-- /.row -->

      <!-- Team Members -->
      <h2>Événements à venir</h2>

      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100 text-center">
            <img class="card-img-top" src="img/4.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title">Soirée soupe</h4>
              <h6 class="card-subtitle mb-2 text-muted">19 avril 2018</h6>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
            </div>
            <div class="card-footer">
              <a href="#">responssable@example.com</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100 text-center">
            <img class="card-img-top" src="img/3.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title">Randonnée</h4>
              <h6 class="card-subtitle mb-2 text-muted">27 avril 2018</h6>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
            </div>
            <div class="card-footer">
              <a href="#">responssable@example.com</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100 text-center">
            <img class="card-img-top" src="img/5.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title">Journée jardinage</h4>
              <h6 class="card-subtitle mb-2 text-muted">1 mai 2018</h6>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
            </div>
            <div class="card-footer">
              <a href="#">responssable@example.com</a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection