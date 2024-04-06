<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    @yield('title')
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Jost&display=swap');
      *{
        font-family: 'Jost', sans-serif;
      }

    </style>
    <link rel="shortcut icon" href="{{asset('imagenes/logo.png')}}">
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{url('/servicios')}}"><img src="{{asset('imagenes/logo.png')}}" width="35" height="35" style="margin-right: 10px"/>Municipalidad de Chiclayo</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">{{ auth()->user()->name }}</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                
                @if(auth()->user()->level == 2)
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('editar', auth()->user()->id) }}">Perfil</a>
                </li>
                @endif
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('inicio')}}">Servicios</a>
                </li>
                @if(auth()->user()->level == 2)
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('bitacora')}}">Bitacora</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('listar')}}">Gestion de Usuarios</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('credenciales')}}">Gestion de Credenciales</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('grupos')}}">Gestion de Grupos y Permisos</a>
                  </li>
                @endif
              </ul>
              <form method="POST" action="{{ route('logout') }}" class="d-flex mt-3" role="search">
                @csrf
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    <button type="button" class="btn btn-danger w-100" style="width: 100%"><b>{{ __('Salir') }}</b></button>
                </x-dropdown-link>
              </form>
            </div>
          </div>
        </div>
      </nav>
</head>

<body >
    <div class="px-3" style="margin-top: 80px">
        @yield('contenido')
    </div>
    @yield('scripts')
</body>
</html>
