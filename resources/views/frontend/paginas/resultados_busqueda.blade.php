@extends('frontend.layouts.master')
@section('title', 'Esmarty || Productos')
@section('main-content')

    {{-- Aside Categorias / Filtrar / Novedades --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-12 col-12 content-box">

                {{-- Categorias --}}
                <hr>
                <h3 class="text-heading">Categorias</h3>
                <ul class="categoria-lista">
                    @if ($categorias)
                        @foreach ($categorias as $categoria)
                            <li class="badge text-bg-secondary"><a
                                    href="{{ route('MandarDatosCategoriaEspecifica', $categoria->id) }}">
                                    {{ $categoria->descripcion }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
                {{-- End Categorias --}}
                {{-- Filtro --}}
                <hr>
                <h3 class="text-heading">Filtrar por Precio</h3>
                <form method="GET" action="{{ route('filtrarPorPrecio') }}">
                    @csrf
                    @php
                        $precioMaximo = \App\Models\Producto::max('precio');
                    @endphp
                    <label for="precio_range">Selecciona un rango de precios:</label>
                    <input type="range" name="precio_range" id="precio_range" min="0" max="{{ $precioMaximo }}"
                        step="1" value="{{ old('precio_range') ?? 0 }}">

                    <output for="precio_range" id="selected_price">{{ old('precio_range') ?? 0 }}</output>
                    <br>
                    <button type="submit" class="filtrar color-enfasis">Filtrar</button>
                </form>
                <hr>
                {{-- End Filtro --}}

            </div>
            {{-- End Aside Categorias / Filtrar / Novedades --}}

            {{-- Sección Principal --}}
            <div class="col-lg-10 col-md-12 col-sm-12 col-12">
                <div class="col-md-12" style="height: 12rem">
                    <div class="container bg-cover img-fluid"
                        style="height: 100%; background-image:url('https://media.istockphoto.com/id/1314343964/es/foto/unidad-de-sistema-de-gama-alta-para-el-primer-plano-de-la-computadora-de-juego.jpg?s=1024x1024&w=is&k=20&c=ASsjLSJzfd2hyzwQlvR3McJTeGduju4pMxqWZXPiCc8=')">
                    </div>
                </div>
                <div class="row pt-4">
                    {{-- Breadcrumbs --}}
                    <div class="container-fluid">
                        <h1>Resultados de Búsqueda para "{{ $terminoBusqueda }}"</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Productos</li>
                            </ol>
                        </nav>
                    </div>
                    {{-- Breadcrumbs Fin --}}
                    {{-- Mostrar Todos los Productos --}}
                    @if (count($productosResultados) > 0)
                        @foreach ($productosResultados->where('activo', 1) as $producto)
                            @php $imagen = explode('|', $producto->url_imagen) @endphp
                            <div class="col-lg-3 col-md-4 col-sm-6 col-6 ">
                                <a href="{{ route('MandarDatosProductoEspecifico', $producto->id) }}"
                                    style="color: rgb(38, 38, 38)">
                                    <div class="card element-box m-2 producto-card" style="width: 14rem;">
                                        <div class="container mt-3 bg-white rounded-4" style="width: 200px; height: 200px">
                                            <img src="{{ $imagen[0] }}" class="card-img-top img-fluid"
                                                alt="{{ $imagen[0] }}">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"> {{ Str::limit($producto->nombre, 25) }} </h5>
                                            <p class="card-text">$ {{ $producto->precio }}</p>
                                            <a href="#" class="btn color-enfasis agregarAlCarrito"> Agregar al Carrito
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- End Mostrar Todos los Productos --}}
                        @endforeach
                    @else
                        <h4 class="text-warning" style="margin:100px auto;"> No hay productos disponibles. </h4>
                    @endif
                </div>

                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {{ $productos->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- End Sección Principal --}}
@endsection

@section('js')
    <script>
        let rutaParaAgregar = '{{ route('carrito.agregarAlCarrito') }}';
        var token = '{{ csrf_token() }}';
        let clienteId = {{ Auth::id() ? Auth::id() : 0 }} 
    </script>
    <script src="{{ asset('js/carrito/agregar_al_carrito.js') }}"></script>
    
@endsection
