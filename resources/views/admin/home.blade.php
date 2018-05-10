@extends('layouts.app')

@section('content')
    <div class="container mt-4 mb-4">
       @include('layouts/message')
       <div class="card">
          <div class="card-header">
             <h4 class="mb-0">Utilisateurs</h4>
          </div>
          <div class="card-body">
             <div class="row">
                <a class="col-md-6 p-2" href="{{ asset('/admin/user') }}">
                   <div class="board btn btn-info w-100 p-3">
                      <div class="number">
                         <h3>{{ $nbUser }}</h3>
                         <small>{{ $nbUser > 1 ? 'Adhérents' : 'Adhérent' }}</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-users fa-5x"></i>
                      </div>
                   </div>
                </a>
                <a class="col-md-6 p-2" href="{{ asset('admin/user/add') }}">
                   <div class="board btn btn-info w-100 p-3">
                      <div class="number">
                         <h3>&nbsp;</h3>
                         <small>Ajouter un adhérent</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-user-plus fa-5x"></i>
                      </div>
                   </div>
                </a>
               <a class="col-md-6 p-2" href="{{ asset('admin/membership') }}">
                   <div class="board btn btn-info w-100 p-3 {{ $nbDemandeAdhesion > 0 ? 'text-danger' : '' }}">
                      <div class="number">
                         <h3>{{ $nbDemandeAdhesion }}</h3>
                         <small>{{ $nbDemandeAdhesion > 1 ? 'Demandes d\'adhésion' : 'Demande d\'adhésion' }}</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-paper-plane fa-5x"></i>
                      </div>
                   </div>
                </a>
                <a class="col-md-6 p-2" href="{{ asset('admin/contact') }}">
                   <div class="board btn btn-info w-100 p-3 {{ $nbContact > 0 ? 'text-danger' : '' }}">
                      <div class="number">
                         <h3>{{ $nbContact }}</h3>
                         <small>{{ $nbContact > 1 ? 'Messages laissés' : 'Message laissé	' }}</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-commenting-o fa-5x"></i>
                      </div>
                   </div>
                </a>
             </div>
          </div>
       </div>
       
        <div class="card mt-3">
          <div class="card-header">
             <h4 class="mb-0">Contenu du site</h4>
          </div>
          <div class="card-body">
             <div class="row">
                <a class="col-md-6 p-2" href="{{ asset('admin/event') }}">
                   <div class="board btn btn-info w-100 p-3">
                      <div class="number">
                         <h3>{{ $nbEvent }}</h3>
                         <small>{{ $nbEvent > 1 ? 'Évènements' : 'Évènement' }}</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-calendar fa-5x"></i>
                      </div>
                   </div>
                </a>
                <a class="col-md-6 p-2" href="{{ asset('admin/news') }}">
                   <div class="board btn btn-info w-100 p-3">
                      <div class="number">
                         <h3>{{ $nbArticle }}</h3>
                         <small>{{ $nbArticle > 1 ? 'articles' : 'article' }}</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-newspaper-o fa-5x"></i>
                      </div>
                   </div>
                </a>                
                <a class="col-md-6 p-2" href="{{ asset('admin/transport') }}">
                   <div class="board btn btn-info w-100 p-3">
                      <div class="number">
                         <h3>{{ $nbTransport }}</h3>
                         <small>{{ $nbTransport > 1 ? 'Transports solidaires' : 'Transport solidaire' }}</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-sign-language fa-5x"></i>
                      </div>
                   </div>
                </a>
                <a class="col-md-6 p-2" href="{{ asset('admin/covoit') }}">
                   <div class="board btn btn-info w-100 p-3">
                      <div class="number">
                         <h3>{{ $nbCovoit }}</h3>
                         <small>{{ $nbCovoit > 1 ? 'Covoiturages' : 'Covoiturage' }}</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-car fa-5x"></i>
                      </div>
                   </div>
                </a>
             </div>
          </div>
       </div>
       
       <div class="card mt-3">
          <div class="card-header">
             <h4 class="mb-0">Configuration générale</h4>
          </div>
          <div class="card-body">
             <div class="row">
                <a class="col-md-6 p-2" href="{{ asset('admin/home/carousel') }}">
                   <div class="board btn btn-info w-100 p-3">
                      <div class="number">
                         <h3 class="float-left">{{ $nbImagesCarousel }} </h3>
                         <h6 class="pt-11px">&nbsp;{{ $nbImagesCarousel > 1 ? 'images' : 'image' }}</h6>
                         <small>Carousel d'accueil</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-picture-o fa-5x"></i>
                      </div>
                   </div>
                </a>
                <a class="col-md-6 p-2" href="{{ asset('admin/home/text') }}">
                   <div class="board btn btn-info w-100 p-3">
                      <div class="number">
                         <h3>&nbsp;</h3>
                         <small>Texte d'accueil</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-align-justify fa-5x"></i>
                      </div>
                   </div>
                </a>
                </a>
                <a class="col-md-6 p-2" href="{{ asset('admin/home/footer') }}">
                   <div class="board btn btn-info w-100 p-3">
                      <div class="number">
                         <h3>&nbsp;</h3>
                         <small>Pied de page du site</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-level-down fa-5x"></i>
                      </div>
                   </div>
                </a> 
                <a class="col-md-6 p-2" href="{{ asset('admin/user/form') }}">
                   <div class="board btn btn-info w-100 p-3">
                      <div class="number">
                         <h3>&nbsp;</h3>
                         <small>Formulaire d'adhésion</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-file-text fa-5x"></i>
                      </div>
                   </div>
                </a>                                 
             </div>
          </div>
       </div>
    </div>
@endsection