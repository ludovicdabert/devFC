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
        @include('front.partials.meta_robot')
    </div>
</div>
@endsection