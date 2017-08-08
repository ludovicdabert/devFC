@extends('layouts.app')

@section('content')
<div class="row">
@php $count = 0 ; @endphp
{{$robots->links('front.partials.paginate')}}
    @forelse($robots as $robot)
    <div class="row featurette">
        <div class="col-md-7 {{ $count % 2 == 0 ? 'col-md-push-5' : '' }}">
          <h2 class="featurette-heading"><a class="btn btn-default" href="{{url('robot', [$robot->id, $robot->slug])}}" role="button">{{$robot->name}}</a></h2>
            <p>{{str_limit($robot->description, 100, '...')}}</p>
        </div>
        <div class="col-md-5 {{ $count % 2 == 0 ? 'col-md-pull-7' : '' }}">
           @isset($robot->picture)
            <img class="featurette-image img-responsive center-block" src="{{url('images', $robot->picture->link)}}" alt="{{$robot->picture->title}}">
           @endisset
        </div>
    </div>
    @php $count++ ; @endphp
    @empty
    désolé il n'y a pas de robot pour cette catégorie
    @endforelse
{{$robots->links('front.partials.paginate')}}    
</div>
@endsection