@extends('layouts.app')
@section('content')
    <div class="container mt-4 mb-4">
       <div class="card">
          <div class="card-header">
             <h4 class="mb-0">Utilisateurs</h4>
          </div>
          <div class="card-body">
             <div class="row">
                <a class="col-md-4 p-2" href="{{ asset('/admin/user') }}">
                   <div class="board btn btn-info w-100 p-3">
                      <div class="number">
                         <h3>{{ $nbUser }}</h3>
                         <small>Liste des adhérents</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-users fa-5x"></i>
                      </div>
                   </div>
                </a>
                <a class="col-md-4 p-2" href="{{ asset('admin/membership') }}">
                   <div class="board btn btn-info w-100 p-3">
                      <div class="number">
                         <h3>{{ $nbDemandeAdhesion }}</h3>
                         <small>Demandes d'adhésion</small>
                      </div>
                      <div class="icon">
                         <i class="fa fa-paper-plane fa-5x"></i>
                      </div>
                   </div>
                </a>
                <a class="col-md-4 p-2" href="{{ asset('admin/user/add') }}">
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
             </div>
          </div>
       </div>
       
       <div class="card mt-3">
          <div class="card-header">
             <h4 class="mb-0">Page d'accueil</h4>
          </div>
          <div class="card-body">
             <div class="row">
                <a class="col-md-6 p-2" href="{{ asset('admin/home/carousel') }}">
                   <div class="board btn btn-info w-100 p-3">
                      <div class="number">
                         <h3 class="float-left">{{ $nbImagesCarousel }} </h3>
                         <h6 class="pt-11px">&nbsp;{{ $nbImagesCarousel > 1 ? 'images' : 'image' }}</h6>
                         <small>Carousel</small>
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
             </div>
          </div>
       </div>
    </div>
@endsection