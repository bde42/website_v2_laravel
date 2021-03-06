<!DOCTYPE HTML>
<html>
<head>
    <title>{{config('app.name')}} - @yield('title')</title>
    <meta charset="utf-8">
    <meta author="App - bde@student.42.fr">
    <meta lang="fr">
    <meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=0.7, user-scalable=0"/>
    <link rel="stylesheet" href="{{ asset('levelup.css') }}" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    @yield('head')
</head>
<body>
    <div class="wrapper">
        <header>
            <nav class="desktop">
                <div class="container">
                    <div class="grid-2">
                        <a href= {{ url('/') }}><img id="logo" src= {{ asset('logo.png') }}></a>
                    </div>
                    <div class="grid-2">
                        {!! HTML::link('/', 'Accueil') !!}
                    </div>
                    <div class="grid-2">
                        {!! HTML::link('/clubs', 'Clubs') !!}
                    </div>
                    <div class="grid-2">
                        <a href="#events">Événements</a>
                    </div>
                    <div class="grid-2">
                        <a href="#agenda" onclick="scrollTo('agenda')">Agenda</a>
                    </div>
                </div>
            </nav>
            <nav class="mobile">
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
    <div class="push"></div>
    </div>
    <footer>
        <div class="container center">
            <div class="grid-4">
                <p>Copyright Level'UP 2015 - Made with ❤ by rapasti &amp; fkalb</p>
            </div>
        </div>
    </footer>
</body>
{!! HTML::script('js/confirm.js') !!}
