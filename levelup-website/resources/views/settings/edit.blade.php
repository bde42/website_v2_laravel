@extends('layouts.admin')

@section('title', 'Réglages')

@section('content')
<div class="page-header">
    <div class="container content-padding">
        <h1>Réglages</h1>
        <p>Retrouvez sur cette page tous les réglages permettant le bon
        fonctionnement du site.</p>
    </div>
</div>

<div class="container">
    <div class="grid-10">
        <ul class="table">
            <li class="table-header">
                <div class="col col-35">
                    <h4>Réglage</h4>
                </div>
                <div class="col col-65">
                    <h4>Valeur</h4>
                </div>
            </li>
            @forelse($settings as $setting)
                <li class="table-item">
                    <div class="col col-35">
                        <h4>{{$setting->name}}</h4>
                    </div>
                    <div class="col col-50">
                        {!! Form::open(['route' => 'admin::settings-update', 'class' => 'invisible-form']) !!}
                        {!! Form::hidden('id', $setting->id) !!}
                        {!! Form::hidden('type', gettype($setting->value)) !!}
                        @if(gettype($setting->value) == 'integer')
                            {!! Form::input('number', 'value', $setting->value) !!}
                        @elseif(gettype($setting->value) == 'boolean')
                            <label>Active ? :</label>
                            {!! Form::checkbox('value', "", $setting->value) !!}
                        @else
                            {!! Form::textarea('value', $setting->value, ['required']) !!}
                        @endif
                    </div>
                    <div class="col col-15">
                        {!! Form::submit('update', ['class' => 'button button-little']) !!}
                        {!! Form::close() !!}
                    </div>
                </li>
            @empty
                <li class="table-item">
                    <div class="col col-75">
                        <h4>Aucun réglage disponible</h4>
                    </div>
                    <div class="col col-25">
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
