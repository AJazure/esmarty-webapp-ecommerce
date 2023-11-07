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
                            <li><a
                                    href="{{ route('MandarDatosCategoriaEspecifica', $categoria->id) }}">{{ $categoria->descripcion }}</a>
                            </li>
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
                    <input type="range" name="precio_range" id="precio_range" min="0" max="{{ $precioMaximo }}"
                        step="1" value="{{ old('precio_range') ?? 0 }}">

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
                                <a
                                    href="{{ route('MandarDatosProductoEspecifico', $producto->id) }}">{{ $producto->nombre }}</a>
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
                                            <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}" width="250"
                                                height="240">
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action ">
                                                <a title="Add to cart" href="">Añadir al carrito</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3 class="titulo"><a
                                                href="{{ route('MandarDatosProductoEspecifico', $product->id) }}">{{ $product->nombre }}</a>
                                        </h3>
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

    <!-- Modal -->
    @if ($productos)
        @foreach ($productos as $key => $product)
            <div class="modal fade" id="{{ $product->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    class="ti-close" aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <!-- Product Slider -->
                                    <div class="product-gallery">
                                        <div class="quickview-slider-active">
                                            @php
                                                $photo = explode(',', $product->photo);
                                                // dd($photo);
                                            @endphp
                                            @foreach ($photo as $data)
                                                <div class="single-slider">
                                                    <img src="{{ $data }}" alt="{{ $data }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Product slider -->
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="quickview-content">
                                        <h2>{{ $product->title }}</h2>

                                        <div class="quickview-stock ml-0">
                                            @if ($product->stock_disponible > 0)
                                                <span><i class="fa fa-check-circle-o"></i> {{ $product->stock_disponible }}
                                                    in
                                                    stock</span>
                                            @else
                                                <span><i class="fa fa-times-circle-o text-danger"></i>
                                                    {{ $product->stock_disponible }} out stock</span>
                                            @endif
                                        </div>
                                    </div>

                                    <form action="" method="POST">
                                        @csrf
                                        <div class="quantity">
                                            <!-- Input Order -->
                                            <div class="input-group">
                                                <div class="button minus">
                                                    <button type="button" class="btn btn-primary btn-number"
                                                        disabled="disabled" data-type="minus" data-field="quant[1]">
                                                        <i class="ti-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="hidden" name="slug"
                                                    value="{{ $product->descripcion }}">
                                                <input type="text" name="quant[1]" class="input-number"
                                                    data-min="1" data-max="1000" value="1">
                                                <div class="button plus">
                                                    <button type="button" class="btn btn-primary btn-number"
                                                        data-type="plus" data-field="quant[1]">
                                                        <i class="ti-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!--/ End Input Order -->
                                        </div>
                                        <div class="add-to-cart">
                                            <button type="submit" class="btn">Add to cart</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    @endif
    <!-- Modal end -->

    {{--  --}}

@endsection
