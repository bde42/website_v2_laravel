@extends('layouts.admin')

@section('title', 'Clubs list')

@section('content')

<div class="container content-padding">
    <div class="grid-7">
        <h1>Liste des clubs</h1>
        <p>Liste complete de tous les clubs enregistrés sur le site. Vous pouvez
        éditer/supprimer le contenu ou voir le club en question via la barre d'action.</p>
        <ul class="table">
            <li class="table-header">
                <div class="col col-65">
                    <h4>Nom du club</h4>
                </div>
                <div class="col col-35">
                    <h4>Actions</h4>
                </div>
            </li>
            @forelse($clubs as $club)
                <li class="table-item">
                    <div class="col col-65">
                        <h4>{{$club->name}}</h4>
                    </div>
                    <div class="col col-35">
                        <a href= {{action('ClubController@show', ['slug' => $club->slug])}} class="button-secondary button-little">show</a>
                        <a href= {{route('admin::club-edit', ['id' => $club->id])}} class="button button-little">update</a>
                        <a href= {{route('admin::club-destroy', ['id' => $club->id])}} class="button-red button-little button-confirm">delete</a>
                    </div>
                </li>
            @empty
                <li class="table-item">
                    <div class="col col-75">
                        <h4>Aucun club enregistré</h4>
                    </div>
                    <div class="col col-25">
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
    <div class="grid-3">
        <div class="action-bar">
            <h1>Administration</h1>
            <ul>
                <li>
                    <a href= {{ route('admin::club-create') }}>Creer un nouveau club</a>
                </li>
            </ul>
        </div>
    </div>
</div>



@endsection
