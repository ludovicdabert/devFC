@isset($robot->tags)
<h3>Mots clés:</h3>
@php $testTag = true; @endphp
@endisset

@forelse($robot->tags as $tag)
<a class="btn {{isset($name) && $name == $tag->name ? 'btn-danger' : 'btn-primary'}} " href="{{url('tag', $tag->id)}}">{{$tag->name}}</a>
@empty
pas de mot clé pour ce robot
@endforelse

@isset($testTag)
<hr class="featurette-divider">
@endisset

@isset($robot->category)
        catégorie: <a class="btn"  href="{{url('category', [$robot->category->id, $robot->category->slug] )}}">{{$robot->category->title}}</a>
@endisset