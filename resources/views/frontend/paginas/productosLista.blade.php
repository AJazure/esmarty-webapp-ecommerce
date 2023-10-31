@extends('frontend.layouts.master')
@section('title', 'Esmarty || Productos')
@section('main-content')

    {{-- Breadcrumbs --}}
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Inicio</a></li>
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
                            <li><a href="">{{ $categoria->descripcion }}</a></li>
                        @endforeach
                    @endif
                </ul>
                {{--  --}}
                <h3 class="titulo">Filtrar por Precio</h3>
                <form method="POST" action="">
                    @csrf
                    <label for="precio_range">Selecciona un rango de precios:</label>
                    <input type="range" name="precio_range" id="precio_range" min="0" max="" step="1"
                        value="">

                    <output for="precio_range" id="selected_price"></output>
                    <br>
                    <button type="submit">Filtrar</button>
                </form>
                <br>

                {{--  --}}
                <h3 class="titulo">Ultimos Productos</h3>
                @foreach ($productos->where('activo', 1)->take(2) as $producto)
                    @php
                        $photo = explode(',', $producto->url_imagen);
                    @endphp
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}" class="card-img-top" width="250">
                        <div class="card-body">
                            <p class="card-text">
                                <a href="">{{ $producto->nombre }}</a>
                            <p class="price">{{ $producto->precio }} </p>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                    <div class="col-12">
                        <div>
                            <!-- Mostrar el formulario para seleccionar el número de elementos por página -->
                            <form action="{{ route('productos') }}" method="GET" class="mb-3">
                                <label for="perPage">Mostrar:</label>
                                <select name="perPage" id="perPage" class="form-select" onchange="this.form.submit()">
                                    <option value="5" {{ $productos->perPage() == 5 ? 'selected' : '' }}>5</option>
                                    <option value="10" {{ $productos->perPage() == 10 ? 'selected' : '' }}>10</option>
                                    <option value="20" {{ $productos->perPage() == 20 ? 'selected' : '' }}>20</option>
                                </select>
                            </form>
                        </div>
                        <!--/ End Shop Top -->
                    </div>
                </div>
                <div class="row">
                    {{-- Mostrar los productos --}}
                    @if (count($productos) > 0)
                        @foreach ($productos as $product)
                            <div class="col-lg-4 col-md-6 col-11">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="">
                                            @php
                                                $photo = explode(',', $product->url_imagen);
                                            @endphp
                                            <img class="default-img img-fluid h-80 d-block mw-90" src="{{ $photo[0] }}"
                                                alt="{{ $photo[0] }}">
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action ">
                                                <a title="Add to cart" href="">Añadir al carrito</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="">{{ $product->nombre }}</a></h3>
                                        <p>${{ $product->precio }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
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
@push('styles')
    <style>
 
    </style>
@endpush
@push('scripts')
@endpush
