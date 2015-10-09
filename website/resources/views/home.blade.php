@extends('layouts.default')

@section('title', 'Accueil')

@section('content')


<div id="event">
    <div id="branding-bg" style="background-image: url({!!$bigevent['be-bg-photo']['value']!!});">
        <div id="branding">
            <div class="container center">
                <div class="grid-10"><img src= {{$bigevent["be-main-photo"]['value']}} class="round-image"></div>
                <div class="grid-8">
                    <p id="branding-label" class="label">{{$bigevent["be-label"]['value']}}</p>
                    <h1 class="white">{{$bigevent["be-title"]['value']}}</h1>
                    <p>{{$bigevent["be-description"]['value']}}</p>
                    <p><a target="new" href= {{$bigevent["be-link"]['value']}} class="button">En savoir plus</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="grid-7">
        <h3>Dernières actualités</h3>
        <div class="container">
            @forelse($posts as $post)
                <div class="grid-10 club-post club-post-photo">
                    <img class="round-image" src= {{$post->club->photo}}>
                    <h4>{{$post->title}}</h4>
                    <p>{{str_limit($post->content, 300)}}</p>
                    <a class="green-dotted-link" href= {{route('club-show', ['slug' => $post->club->slug])}}>Lire la suite</a>
                </div>
            @empty
                <div class="grid-10">
                    <h4>Aucun post n'a encore été édité</h4>
                </div>
            @endforelse
        </div>
    </div>
    <div class="grid-3">
        <h3>Agenda</h3>
        @if(strlen($other['agenda']['value']) > 0)
            <p>{!!$other['agenda']['value']!!}</p>
        @else
            <p>Rien de prévu pour le moment</p>
        @endif
    </div>
</div>

@endsection
