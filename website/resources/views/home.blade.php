@extends('layouts.default')

@section('title', 'Accueil')

@section('content')

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
</div>

@endsection
