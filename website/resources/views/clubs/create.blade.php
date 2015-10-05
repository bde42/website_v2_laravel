@extends('layouts.admin')

@section('title', 'Create club');

@section('content')

<div class="container center">
    <div class="grid-5">
        <h1>Créer un nouveau club</h1>
        {!! Form::open(['route' => 'admin::club-store']) !!}
        {!! Form::label('Nom') !!}
        {!! Form::text('name', null, ['required', 'placeholder' => 'Nom du club', 'class' => 'form-control']) !!}
        {!! Form::label('Slug/URL') !!}
        {!! Form::text('slug', null, ['required', 'placeholder' => 'mon-club', 'class' => 'form-control']) !!}
        {!! Form::label('Description') !!}
        {!! Form::textarea('description', null, ['required', 'class' => 'form-control']) !!}
        {!! Form::label('Photo (150x150 conseillé)') !!}
        {!! Form::text('photo', null, null) !!}
        {!! Form::label('Site internet') !!}
        {!! Form::text('website', null, ['placeholder' => 'http://monclub.com', 'class' => 'form-control']) !!}
        {!! Form::label('Facebook') !!}
        {!! Form::text('facebook', null, ['placeholder' => 'http://facebook.com/monclub', 'class' => 'form-control']) !!}
        {!! Form::label('Channel slack') !!}
        {!! Form::text('slack', null, ['placeholder' => 'monclub', 'class' => 'form-control']) !!}
        {!! Form::submit('Creer un club', ['class' => 'button form-control']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection
