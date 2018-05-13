@extends('layouts/app')

@section('content')
    @include('layouts/carousel')
    <div class="container">
        @include('layouts/message')
    	<div class="mb-4 mt-4">
    		<div class="row">
        		<div class="col-lg-6">
    				{!! $textGauche !!}
        		</div>
        		<div class="col-lg-6">
        			<img class="img-fluid rounded" src="public/img/home.jpg" alt="">
        		</div>
        	</div>
    		<div class="card text-center w-100 mt-2">
        		<div class="card-body">
 					{!! $textBas !!}
        		</div>
    		</div>
    	</div>
    </div>
@endsection