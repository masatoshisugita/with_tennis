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
          <a class="navbar-brand" href="{{ url('/event') }}">With_Tennis</a>
        <div class="collapse navbar-collapse mr-5" id="navigation">
        @if (Route::has('login'))
                    @auth
                   
                    <div class="navbar-right">
                        <a href={{ route('logout') }} class="navbar-text" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>
                        <form id='logout-form' action={{ route('logout')}} method="POST">@csrf</form>
                    </div>

                    <div class="navbar-right">
                        <p class="navbar-text"><a href="{{ url('/event/create') }}">イベント投稿</a></p>
                    </div>
                    <div class="navbar-right">
                        <p class="navbar-text"><a href="{{ route('user.show', Auth::user()->id)  }}">{{ Auth::user()->name }}</a></p>
                    </div>
                    
                    @else
                    <div class="navbar-right">

                        <p class="navbar-text"><a href="{{ route('login') }}">ログイン</a></p>

                        @if (Route::has('register'))
                            <p class="navbar-text"><a href="{{ route('register') }}">登録</a></p>
                        @endif
                    </div>
                    @endauth
            @endif
        </div>
      </div>
    </nav>

        <main class="mt-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
