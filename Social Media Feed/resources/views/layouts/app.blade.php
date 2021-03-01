
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
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    @foreach($themes as $theme)
        @if($theme->id == \Illuminate\Support\Facades\Cookie::get('themeId'))
            <link href="{{$theme->cdn_url}}" rel="stylesheet">
        @else
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @endif
    @endforeach
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <form action="{{ route('theme.setCookie') }}" method="POST">
                @csrf
                    <select name="themes" onchange="this.form.submit()">
                        <option value="">Default</option>
                        @foreach ($themes as  $theme)
                            <option value="{{$theme->id}}" id="theme{{$theme->id}}">{{$theme->name}}</option>
                        @endforeach
                    </select>
                    <noscript><input type="submit" value="Submit"></noscript>
                </form>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            
                            @endif
                            </ul>
                            
                        @else
                        <ul     
                            <li class="nav-item dropdown">
                            
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                   
                                    @if((Auth::user()->hasRole('User Administrator')))
                                    <a class="nav-link" href="{{ route('users.index') }}">Manage Users </a>
                                   
                                    @endif
                                    @if((Auth::user()->hasRole('Theme Manager')))
                                    <a class="nav-link" href="{{ route('themes.index') }}">Manage Themes </a>

                                    @endif
    
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        document.querySelector("#theme{{\Illuminate\Support\Facades\Cookie::get('themeId')}}").selected=true;
    </script>
</body>
</html>
