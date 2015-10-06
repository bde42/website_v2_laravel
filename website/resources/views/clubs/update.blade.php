@extends('layouts.admin')

@section('title', 'Update club');

@section('content')

{!! HTML::linkRoute('club-roles', 'Permissions', array($club->slug), array('class' => 'button button-little')) !!}

<div class="container center">
    <div class="grid-5">
        <h1>Mettre à jour un club</h1>
        <p>Vous éditez le club : <b>{{$club->name}}</b></p>
        {!! Form::open(['route' => 'admin::club-update']) !!}
        {!! Form::hidden('id', $club->id) !!}
        {!! Form::label('Description') !!}
        {!! Form::textarea('description', $club->description, ['required', 'class' => 'form-control']) !!}
        {!! Form::label('Photo') !!}
        {!! Form::text('photo', $club->photo, null) !!}
        {!! Form::label('Site internet') !!}
        {!! Form::text('website', $club->website, ['placeholder' => 'http://monclub.com', 'class' => 'form-control']) !!}
        {!! Form::label('Facebook') !!}
        {!! Form::text('facebook', $club->facebook, ['placeholder' => 'http://facebook.com/monclub', 'class' => 'form-control']) !!}
        {!! Form::label('Channel slack') !!}
        {!! Form::text('slack', $club->slack, ['placeholder' => 'monclub', 'class' => 'form-control']) !!}
        {!! Form::submit('Mettre à jour', ['class' => 'button form-control']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection
