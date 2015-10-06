@extends('layouts.default')

@section('title', 'Accueil')

@section('content')

<div id="event">
    <div id="branding-bg" style="background-image: url({!!$bigevent['bg-photo']!!});">
        <div id="branding">
            <div class="container center">
                <div class="grid-10"><img src= {{$bigevent["main-photo"]}} class="round-image"></div>
                <div class="grid-8">
                    <p id="branding-label" class="label">{{$bigevent["label"]}}</p>
                    <h1 class="white">{{$bigevent["title"]}}</h1>
                    <p>{{$bigevent["description"]}}</p>
                    <p><a target="new" href= {{$bigevent["link"]}} class="button">En savoir plus</a></p>
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
        @if(strlen($agenda) > 0)
            <p>{!!$agenda!!}</p>
        @else
            <p>Rien de prévu pour le moment</p>
        @endif
    </div>
</div>

@endsection
