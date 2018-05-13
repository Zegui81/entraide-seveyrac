@extends('layouts/app')

@section('content')
    @include('layouts/carousel')
    <div class="container pt-1">
        <div class="alert alert-{{ $message['type'] }} mt-2 text-center" role="alert">
        	<i class="fa fa-{{ $message['icon'] }} fa-2x" aria-hidden="true"></i>&nbsp;<sapn><b>{{ $message['content'] }}</b></sapn>
        </div>
    </div>
@endsection