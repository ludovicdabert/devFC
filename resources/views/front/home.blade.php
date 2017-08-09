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
            <a class="btn btn-default" href="{{url('robot', [$robot->id, $robot->slug])}}" role="button"><img class="img-circle" src="{{url('images', $robot->picture->link)}}" alt="{{$robot->picture->title}}" width="140" height="140"></a>
            @endisset
            <h2 class="marketing__title">{{$robot->name}}</h2>
            <p>{{str_limit($robot->description, 100, '...')}}</p>
            <p><a class="btn btn-default" href="{{url('robot', [$robot->id, $robot->slug])}}" role="button">Lire la suite &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    @if($count == 2)
    </div> <!-- #end 3 robots -->
    <hr class="featurette-divider">
    @endif
@else
    <div class="row featurette">
        <div class="col-md-7 {{ $count % 2 == 0 ? 'col-md-push-5' : '' }}">
          <h2 class="featurette-heading"><a class="btn btn-default" href="{{url('robot', [$robot->id, $robot->slug])}}" role="button">{{$robot->name}}</a></h2>
            <p>{{str_limit($robot->description, 100, '...')}}</p>
            @include('front.partials.meta_robot')
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
{{ $robots->links('front.partials.paginate') }} 
@endsection