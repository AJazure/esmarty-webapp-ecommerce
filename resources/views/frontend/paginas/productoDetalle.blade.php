@extends('frontend.layouts.master')
@section('title', 'Esmarty || Detalles del Producto')
@section('main-content')

    {{-- Breadcrumbs --}}
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('productos') }}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalles del Producto</li>
            </ol>
        </nav>
    </div>
    {{-- Breadcrumbs Fin --}}

    <!--  -->
    <section class="shop single section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="imagen-detalle">
                                @php
                                    $photo = explode(',', $producto->url_imagen);
                                @endphp
                                <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}" width="250" height="240">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="product-des">
                                <!-- Descripcion -->
                                <div class="short">
                                    <h4 class="titulo">{{ $producto->nombre }}</h4>
                                    <p class="precio">${{ $producto->precio }}</p>
                                    {{-- <p class="description">{!! $producto->descripcion !!}</p> --}}
                                </div>
                                <!--/ Descripcion Fin-->

                                <!-- -->
                                <div class="product-buy">
                                    <div>
                                        <button href="#" data-agregar-id="{{ $producto->id }}"
                                            class="btn btn-sm btn-info text-white text-uppercase me-1 mr-2 agregarAlCarrito">
                                            Agregar al carrito
                                        </button>
                                    </div>

                                    <p class="cat">Categoria :
                                        <a
                                            href="{{ route('MandarDatosCategoriaEspecifica', ['categoria' => $categoriaEspecifica->id]) }}">
                                            {{ $categoriaEspecifica->descripcion }}
                                            <br>
                                        </a>
                                    </p>
                                    <p class="cat">Marca :{{ $marcaEspecifica->descripcion }} </p>
                                </div>
                                <!-- -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-info">
                                <div class="nav-main">
                                    <!-- Tab Nav -->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                href="#description" role="tab">Descripcion</a>
                                        </li>
                                    </ul>
                                    <!--/ Tab Nav Fin -->
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <!--  -->
                                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                                        <div class="tab-single">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="single-des">
                                                        <p>{!! $producto->descripcion !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                </div>
            </div>
        </div>

    </section>
    <!-- -->

@endsection
@section('js')
    <script>
        let rutaParaAgregar = '{{ route('carrito.agregarAlCarrito') }}';
        var token = '{{ csrf_token() }}';
    </script>
    
    <script src="{{ asset('js/carrito/agregar_al_carrito.js') }}"></script>
@endsection
