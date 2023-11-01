<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
		{{-- Logo --}}
        <a class="navbar-brand" href="/">

            <img src="{{ asset('imagenes/logo-esmarty-rectangular.png') }}" alt="Logo-Esmarty" width="170px">

        </a>
		{{-- Logo Fin--}}

		{{-- Boton al Minimizar --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

		{{-- Navegacion --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('productos') }}">Productos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categorias as $cat)
                            
                        <li><a class="dropdown-item" href="{{route('MandarDatosCategoriaEspecifica', $cat->id)}}">{{$cat->descripcion }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
		{{-- Navegacion Fin --}}
            <form class="col-md-6 d-flex mb-0" role="search" autocomplete="off">
                <div class="input-group">
                    <input class="form-control" type="search" id="busquedaInput" placeholder="Buscar . . ." aria-label="Search">
                    <button class="btn btn-outline-success" type="button">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
            
		{{-- Buscador Fin --}}

		{{-- Carrito --}}
			<ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa-solid fa-shopping-cart"></i> 0
                    </a>
                </li>
		{{-- Carrito Fin --}}

		{{-- Login y registro --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user"></i> 
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                @guest
                    <li><a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesión</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('register') }}">Registrarse</a></li>
                {{--  --}}
                @endguest
            </ul>
		{{-- Login y registro Fin --}}
            </ul>
        </div>
    </div>
</nav>

