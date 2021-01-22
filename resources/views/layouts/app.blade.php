<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .topo{
            text-align: center;
            background-color: #ddd;
            padding: 10px;
        }

        .acerto{
            border-bottom: 1px solid #ccc;
            padding-bottom: 7px;
        }
    </style>
</head>
<body>
<div id="app">

    <div class="col-md-12 topo">
        <h4>TESTE SELL2BRASIL</h4>
    </div>

    <ul class="nav nav-pills acerto">
        <li class="nav-item">
            <router-link to="/crud" class="nav-link"> Cadastro de Pessoa </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/" class="nav-link"> Voltar </router-link>
        </li>
    </ul>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
