@extends('layouts.default')

@section('title', $club->name)

@section('content')

<div class="page-header club-header">
    <div class="container content-padding">
        <img src= {{$club->photo}}>
        <h1>{{$club->name}}</h1>
    </div>
</div>
<div class="container">
    <div class="grid-10">
        <p>{{$club->description}}</p>
        @if(strlen($club->website) > 0)
            <a href="{!! $club->website !!}" class="button button-little">Site web</a>
        @endif
        @if(strlen($club->facebook) > 0)
            <a href="{!! $club->facebook !!}" class="button button-little">Page Facebook</a>
        @endif
        @if(strlen($club->slack) > 0)
            <p>Channel Slack : <b>#{{$club->slack}}</b></p>
        @endif
    </div>
</div>

@endsection
