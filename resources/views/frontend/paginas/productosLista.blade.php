@extends('frontend.layouts.master')
@section('title', 'Esmarty || Productos')
@section('main-content')

    {{-- Breadcrumbs --}}
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
    </div>
    {{-- Breadcrumbs Fin --}}

    {{--  --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12 ">
                <h3 class="titulo">Categorias</h3>
                <ul class="categoria-lista">
                    @if ($categorias)
                        @foreach ($categorias as $categoria)
                            <li><a href="{{route('MandarDatosCategoriaEspecifica', $categoria->id)}}">{{ $categoria->descripcion }}</a></li>
                        @endforeach
                    @endif
                </ul>
                {{--  --}}
                <h3 class="titulo">Filtrar por Precio</h3>
                <form method="POST" action="{{ route('filtrarPorPrecio') }}">
                    @csrf
                    @php
                        $precioMaximo = \App\Models\Producto::max('precio');
                    @endphp
                    <label for="precio_range">Selecciona un rango de precios:</label>
                    <input type="range" name="precio_range" id="precio_range" min="0" max="{{ $precioMaximo }}" step="1" value="{{ old('precio_range') ?? 0 }}">
                
                    <output for="precio_range" id="selected_price">{{ old('precio_range') ?? 0 }}</output>
                    <br>
                    <button type="submit" class="filtrar">Filtrar</button>
                </form>
                
                
                <br>

                {{--  --}}
                <h3 class="titulo">Ultimos Productos</h3>
                @foreach ($productos->take(2) as $producto)
                    @php
                        $photo = explode(',', $producto->url_imagen);
                    @endphp
                    <div class="card" style="width: 14rem;">
                        <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}" class="card-img-top" width="250">
                        <div class="card-body">
                            <p class="card-text titulo">
                                <a href="{{route('MandarDatosProductoEspecifico', $producto->id)}}">{{ $producto->nombre }}</a>
                            <p class="precio">{{ $producto->precio }} </p>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                    <div class="col-12">
                        <h2>Todos los Productos</h2>
                    </div>
                </div>
                <div class="row">
                    {{-- Mostrar los productos --}}
                    @if (count($productos) > 0)
                        @foreach ($productos->where('activo', 1) as $product)
                            <div class="col-lg-4 col-md-6 col-11">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="">
                                            @php
                                                $photo = explode(',', $product->url_imagen);
                                            @endphp
                                            <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}" width="250" height="240">
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action ">
                                                <a title="Add to cart" href="">Añadir al carrito</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3 class="titulo"><a href="{{route('MandarDatosProductoEspecifico', $product->id)}}">{{ $product->nombre }}</a></h3>
                                        <p>${{ $product->precio }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h4 class="text-warning" style="margin:100px auto;">No hay productos.</h4>
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

    </div>
    </div>
    </div>

    {{--  --}}

@endsection
