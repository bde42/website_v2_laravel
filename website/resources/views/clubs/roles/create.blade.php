@extends('layouts.admin')

@section('title', 'Create permissions')

@section('content')

<div class="container center">
    <div class="grid-5">
        <h1>Créer une nouvelle permission pour votre club.</h1>
        {!! Form::open(['route' => array('club-role-store', $club->id)]) !!}
        {!! Form::label('Login') !!}
        {!! Form::text('nickname', null, ['required', 'class' => 'form-control']) !!}
        {!! Form::label('Permission') !!}
        {!! Form::select('role_id', $roles) !!}
        {!! Form::submit('Creer une permission', ['class' => 'button form-control']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection