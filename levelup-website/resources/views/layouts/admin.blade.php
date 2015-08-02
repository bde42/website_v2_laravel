<!DOCTYPE HTML>
<html>
    <head>
        <title>Level'UP Dashboard - @yield('title')</title>
        <meta charset="utf-8">
        <meta author="Level'UP - bde@student.42.fr">
        <meta lang="fr">
        <meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=0.7, user-scalable=0"/>
        <link rel="stylesheet" href="{{ asset('levelup.css') }}" type="text/css">
    </head>
    <header>
        <nav class="desktop admin">
            <div class="container">
                <div class="grid-2">
                    <a href= {{ url('/') }}><img id="logo" src= {{ asset('logo.png') }}></a>
                </div>
                <div class="grid-2">
                    {!! HTML::link('/', 'Accueil') !!}
                </div>
                <div class="grid-2">
                    {!! HTML::link('/dashboard/clubs', 'Clubs') !!}
                </div>
                <div class="grid-2">
                    <a href="#events">Événements</a>
                </div>
                <div class="grid-2">
                    <a href="#agenda" onclick="scrollTo('agenda')">Agenda</a>
                </div>
            </div>
        </nav>
        <nav class="mobile admin">
            <div class="container">
                <div class="grid-1">
                    <img id="logo" src= {{ asset('logo.png') }}>
                </div>
                <div class="grid-1">
                    <a href="#event" onclick="scrollTo('event')">Evenement</a>
                </div>
                <div class="grid-1">
                    <a href="#team" onclick="scrollTo('team')">Équipe</a>
                </div>
                <div class="grid-1">
                    <a href="#agenda" onclick="scrollTo('agenda')">Agenda</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @if(Session::has('success'))
            <div class="alert alert-success">
                <div class="container">
                    <div class="grid-10">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                </div>
            </div>
        @elseif(Session::has('error') || $errors->all())
            <div class="alert alert-error">
                <div class="container">
                    <div class="grid-10">
                        @if (Session::has('error'))
                            <p>{{ Session::get('error') }}</p>
                        @else
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div id="content">
            @yield('content')
        </div>
    </main>
