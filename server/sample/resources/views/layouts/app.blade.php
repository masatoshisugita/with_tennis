<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/event') }}">With_Tennis</a>
                </div>
                @if (Route::has('login'))
                    @auth
                    <div class="navbar-right">
                        <a href={{ route('logout') }} class="navbar-text" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>
                        <form id='logout-form' action={{ route('logout')}} method="POST">@csrf</form>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/event/create') }}">イベント投稿</a></li>
                        <li><a href="{{ route('user.show', Auth::user()->id) }}" id="user_name">{{ Auth::user()->name }}</a></li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('login') }}">ログイン</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">登録</a></li>
                        @endif
                    </ul>
                    @endauth
                @endif
            </div>
        </nav>

        <main class="mt-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
