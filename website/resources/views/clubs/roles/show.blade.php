@extends('layouts.default')

@section('title', $club->name)

@section('content')

<div class="page-header club-header">
    <div class="container content-padding">
        <img src= {{$club->photo}}>
        <h1>{{$club->name}}</h1>
        <div class="club-header-info">
            @if(strlen($club->website) > 0)
                <a target="new" href="{!! $club->website !!}" class="button button-little">Site web</a>
            @endif
            @if(strlen($club->facebook) > 0)
                <a target="new" href="{!! $club->facebook !!}" class="button button-little">Page Facebook</a>
            @endif
            @if(strlen($club->slack) > 0)
                <p>Channel Slack : <b>#{{$club->slack}}</b></p>
            @endif
            @if (strlen($club->slack) == 0 && strlen($club->website) == 0 && strlen($club->facebook) == 0)
                <p>Aucune information complémentaire</p>
            @endif
        </div>
    </div>
</div>
    
<!-- Ce serait pas plus cool de mettre le form ici au lieu de rediriger ?-->
{!! HTML::linkRoute('club-role-create', 'Creer', array($club->slug), array('class' => 'button button-little')) !!}

    
<div class="container">
    <div class="grid-10">
        <ul class="table">
            <li class="table-header">
                <div class="col col-50">
                    <h4>Login</h4>
                </div>
                <div class="col col-25">
                    <h4>Role</h4>
                </div>
                <div class="col col-25">
                    <h4>Actions</h4>
                </div>
            </li>
            @forelse($club->perms as $perm)
                <li class="table-item">
                    <div class="col col-50">
                        <h4>{{$perm->nickname}}</h4>
                    </div>
                    <div class="col col-25">
                        <p>{{$perm->role->name}}</p>
                    </div>
                    <div class="col col-25">
                        <a href= {{route('club-role-destroy', ['slug' => $club->slug, 'role' => $perm->id])}} class="button-red button-little button-confirm">delete</a>
                    </div>
                </li>
            @empty
                <div class="grid-10">
                    <h3>Aucun role pour ce club</h3>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
