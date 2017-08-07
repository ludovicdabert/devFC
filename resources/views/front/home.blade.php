@extends('layouts.app')

@section('title', "Bienvenue sur la page accueil")

@section('content')
{{ $robots->links() }} 
@php $count = 0 ; @endphp
@foreach ($robots as $robot)
@if($count < 3)
    @if($count == 0)
    <div class="row"> 
    @endif
        <div class="col-lg-4">
            @isset($robot->picture)
            <img class="img-circle" src="{{url('images', $robot->picture->link)}}" alt="{{$robot->picture->title}}" width="140" height="140">
            @endisset
            <h2>{{$robot->name}}</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="btn btn-default" href="{{url('robot', $robot->id)}}" role="button">Lire la suite &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    @if($count == 2)
    </div> <!-- #end 3 robots -->
    <hr class="featurette-divider">
    @endif
@else
    <div class="row featurette">
        <div class="col-md-7 {{ $count % 2 == 0 ? 'col-md-push-5' : '' }}">
          <h2 class="featurette-heading"><a class="btn btn-default" href="{{url('robot', $robot->id)}}" role="button">{{$robot->name}}</a></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5 {{ $count % 2 == 0 ? 'col-md-pull-7' : '' }}">
           @isset($robot->picture)
            <img class="featurette-image img-responsive center-block" src="{{url('images', $robot->picture->link)}}" alt="{{$robot->picture->title}}">
           @endisset
        </div>
    </div>
    <hr class="featurette-divider">
@endif
@php $count++; @endphp
@endforeach
{{ $robots->links() }} 
@endsection