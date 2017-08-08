@extends('layouts.app')

@section('title', 'page robot')

@section('content')
<div class="row">
    <div class="col-md-12">
        @isset($robot->picture)
        <img  src="{{url('images', $robot->picture->link)}}" alt="{{$robot->picture->title}}" >
        @endisset
        <h2 class="marketing__title">{{$robot->name}}</h2>
        <p>{{$robot->description}}</p>
        @forelse($robot->tags as $tag)
            <button type="button" class="btn btn-primary">{{$tag->name}}</button>
        @empty
        pas de mot clé pour ce robot
        @endforelse
        <hr class="featurette-divider">
        @isset($robot->category)
             catégorie: <a class="btn"  href="{{url('category', [$robot->category->id, $robot->category->slug] )}}">{{$robot->category->title}}</a>
        @endisset
    </div>
</div>
@endsection