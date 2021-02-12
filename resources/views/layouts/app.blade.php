<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="google-site-verification" content="Nx3PepaEAk87yh0RnIQ5mMUO6JiINIZ3p48bhOtiaAU" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Geotaxi') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/googlemap.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="/css/app.css">
    
    
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
          height: 100%;
        }
  
        /* Optional: Makes the sample page fill the window. */
        html,
        body {
          height: 100%;
          margin: 0;
          padding: 0;
        }
  
        .custom-map-control-button {
          appearance: button;
          background-color: #fff;
          border: 0;
          border-radius: 2px;
          box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
          cursor: pointer;
          margin: 10px;
          padding: 0 0.5em;
          height: 40px;
          font: 400 18px Roboto, Arial, sans-serif;
          overflow: hidden;
        }
        .custom-map-control-button:hover {
          background: #ebebeb;
        }
    </style>

<script>
  // Note: This example requires that you consent to location sharing when
  // prompted by your browser. If you see the error "The Geolocation service
  // failed.", it means you probably did not give permission for the browser to
  // locate you.
  let map, infoWindow;

  function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: -34.397, lng: 150.644 },
      zoom: 6,
    });
    infoWindow = new google.maps.InfoWindow();
    const locationButton = document.createElement("button");
    locationButton.textContent = "Pan to Current Location";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(
      locationButton
    );
    locationButton.addEventListener("click", () => {
      // Try HTML5 geolocation.
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            const pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
            };
            infoWindow.setPosition(pos);
            infoWindow.setContent("Location found.");
            infoWindow.open(map);
            map.setCenter(pos);
          },
          () => {
            handleLocationError(true, infoWindow, map.getCenter());
          }
        );
      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }
    });
  }

  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
      browserHasGeolocation
        ? "Error: The Geolocation service failed."
        : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
  }
</script>

  <style>
    .fakeimg {
      height: 290px;
      background: rgb(66, 65, 65);
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
                <a class="navbar-brand" href="{{ route('home') }}">
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
        
    </div>

    <div class="py-4 container-fluid">
      @yield('contenido')
      
    </div>
    
                    
    
    <footer class="jumbotron text-center" style="margin-bottom:0">
      <h4>Proyecto de Sitio Web</h4>  
      <h4>Hecho para la materia de Tecnología de Programación en Red por los estudiantes:</h4>  
      <h5>Juan Bautista Padilla Caihuara - Dimar Coca Sanku</h5>
      <br>
      <h6>UAJMS - FCIGCH - Ingeniería Informática Yacuiba</h6>
    </footer>
</body>
</html>
