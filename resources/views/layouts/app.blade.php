<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Geotaxi') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="/css/app.css">

    <style>
        .fakeimg {
          height: 200px;
          background: #aaa;
        }
    </style>

    {!! htmlScriptTagJsApi() !!}
</head>
<body>
    <div id="app">
        <?php function activeMenu($url){
            return request()->is($url) ? 'active' : '';
        } ?>
        <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="/img/logo.png" alt="" style="width:60px;height:60px;"> Geotaxi
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ activeMenu('/') }}" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ activeMenu('mensajes/create') }}" href="{{ route('mensajes.create') }}">Contactos</a>
                        </li>
                        @if (auth()->check())
                                <li class="nav-item {{ activeMenu('mensajes') }}">
                                    <a class="nav-link" href="{{ route('mensajes.index') }}">Mensajes</a>
                                </li>
                            @if (auth()->user()->hasRoles(['admin']) )
                                <li class="nav-item {{ activeMenu('usuarios*') }}">
                                    <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
                                </li>
                            @endif
                        @endif
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresa') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nombre }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/usuarios/{{ auth()->id() }}/edit">Mi cuenta</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
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
        <div class="py-4 container">
            @yield('contenido')
        </div>
    </div>

    <footer class="jumbotron text-center" style="margin-bottom:0">
        <p>Footer</p>
    </footer>
</body>
</html>
