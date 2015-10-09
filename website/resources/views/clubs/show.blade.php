@extends('layouts.default')

@section('title', $club->name)

@section('content')

<div class="page-header club-header">
    <div class="container content-padding">
        <img src= {{$club->photo}}>
        <h1>{{$club->name}} {!! HTML::decode(HTML::linkRoute('admin::club-edit', '<i class="fa fa-cog fa-lg"></i>', array($club->slug))) !!}</h1>
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
<div class="container">
    <div class="grid-7">
        <div class="container">
        @forelse($posts as $post)
            <div class="grid-10 club-post">
                <h4>{{$post->title}}</h4>
                <p>{{$post->content}}</p>
                <p><b>Edité par: <i>{{$post->author}}</i></b></p>
            </div>
        @empty
            <div class="grid-10">
                <h3>Aucun post édité par ce club</h3>
            </div>
        @endforelse
        </div>
    </div>
    <div class="grid-3">
        <h4>Description du club</h4>
        <p>{{$club->description}}</p>
    </div>
</div>

@endsection
