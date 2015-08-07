@extends('layouts.default')

@section('title', 'Les Clubs');

@section('content')

<div class="page-header">
    <div class="container content-padding">
        <h1>Liste des clubs</h1>
        <p>Retrouvez sur cette page la liste exhaustive de tous les clubs de l'école
        enregistrés actuellement sur le site. Sur chacune de leur page vous retrouverez
        les informations/événements correspondants à chacun.</p>
    </div>
</div>

<div class="container center content-padding">
    @forelse($clubs as $club)
        <div class="grid-2">
                <div class="club-card">
                    <img class="round-image" src= {{$club->photo}}>
                    <h5>{{$club->name}}</h5>
                    <p>{{str_limit($club->description)}}</p>
                    <a href= {{route('club-show', ['slug' => $club->slug])}}>Voir le club</a>
                </div>
        </div>
    @empty
        <div class="grid-10">
            <h3>Aucun club enregistré pour le moment</h3>
        </div>
    @endforelse
</div>

@endsection
