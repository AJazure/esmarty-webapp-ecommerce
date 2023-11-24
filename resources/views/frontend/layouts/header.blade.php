<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid p-1 ">
        {{-- Logo --}}
        <a class="navbar-brand" href="/" style="max-width: 60%">
            <img src="{{ asset('imagenes/logo-esmarty-rectangular.png') }}" alt="Logo-Esmarty" width="40%">
        </a>
        {{-- Logo Fin --}}

        {{-- Boton al Minimizar --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navegacion --}}
        <div class="collapse navbar-collapse justify-content-around" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 gap-1">
                <li class="nav-item text-center">
                    <a class="nav-link under" aria-current="page" href="/">Inicio</a>
                </li>
                <li class="nav-item  text-center">
                    <a class="nav-link under" href="{{ route('productos') }}">Productos</a>
                </li>
                <li class="nav-item dropdown  text-center">
                    <a class="nav-link dropdown-toggle under" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categorias as $cat)
                            <li><a class="dropdown-item"
                                    href="{{ route('MandarDatosCategoriaEspecifica', $cat->id) }}">{{ $cat->descripcion }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            {{-- Navegacion Fin --}}

            {{-- Buscador --}}
            <form method="GET" action="{{ route('resultados-busqueda') }}" class="col-md-5 mb-1"
                autocomplete="off">
                <div class="d-flex">
                    <input class="form-control barra-busqueda" type="search" name="busqueda" id="busquedaInput"
                        placeholder="Buscar..." aria-label="Search">
                    <button class="btn btn-outline-info btn-busqueda" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
            {{-- Buscador Fin --}}

            {{-- Carrito --}}
            
                <ul class="navbar-nav carrito-logout gap-1">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('carrito.carrito') }}">
                            <i class="fa-solid fa-shopping-cart"></i> 0
                        </a>
                    </li>
                    {{-- Carrito Fin --}}

                    {{-- Login y registro --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @guest
                                <li><a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('login') }}">Iniciar Sesión <i class="fas fa-sign-in-alt"></i></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('register') }}">Registrarse <i class="fas fa-user-plus small"></i></a></li>
                                {{--  --}}
                            @else
                                @role('cliente')
                                    <li><a class="dropdown-item" href="{{ route('pedidos.index') }}">Mis compras</a></li>
                                @endrole

                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex align-items-center justify-content-between">Cerrar Sesion <i class="fas fa-sign-out-alt"></i></button>
                                    </form>
                                </li>
                            @endguest

                        </ul>
                        {{-- Login y registro Fin --}}
                </ul>
        </div>
    </div>
</nav>
