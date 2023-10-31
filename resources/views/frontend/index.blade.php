@extends('frontend.layouts.master')
@section('title', 'Esmarty || Inicio')
@section('main-content')


    {{-- Slider --}}
    <div class="container-fluid p-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('imagenes/carrusel/2b.png') }}" class="d-block w-100 h-100"
                        style="object-fit: cover;" alt="...">
                    <div
                        class="carousel-caption d-none d-md-block text-start align-items-center justify-content-center h-50">
                        <div class="bg-dark d-inline-block p-3 rounded" style="opacity: 0.7;">
                            <h1>Producto 1</h1>
                            <p>Descripción.</p>
                            <button class="btn btn-primary">Comprar</button>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('imagenes/carrusel/ballena-aerea.jpg') }}" class="d-block w-100 h-100"
                        style="object-fit: cover;" alt="...">
                    <div
                        class="carousel-caption d-none d-md-block text-start align-items-center justify-content-center h-50">
                        <div class="bg-dark d-inline-block p-3 rounded" style="opacity: 0.7;">
                            <h1>Producto 2</h1>
                            <p>Descripción.</p>
                            <button class="btn btn-primary">Comprar</button>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('imagenes/carrusel/kimetsu.jpg') }}" class="d-block w-100 h-100"
                        style="object-fit: cover;" alt="...">
                    <div
                        class="carousel-caption d-none d-md-block text-start align-items-center justify-content-center h-50">
                        <div class="bg-dark d-inline-block p-3 rounded" style="opacity: 0.7;">
                            <h1>Producto </h1>
                            <p>Descripción.</p>
                            <button class="btn btn-primary">Comprar</button>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </div>
    {{-- Slider Fin --}}

    <br>
    <br>

    {{-- Banner Categorias --}}

    <section class="small-banner section">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1>Categorias</h1>
                    </div>
                </div>
                @if ($categorias)
                    @foreach ($categorias as $categoria)
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-banner text-center">
                                @if ($categoria->activo)
                                    <img src="https://via.placeholder.com/350x200" alt="#">
                                    <div class="content">
                                        <h3><a href="">{{ $categoria->descripcion }}</a></h3>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </section>
    {{-- Banner Categorias Fin --}}

    <br>
    <br>


    {{-- Ultimos Agregados --}}
    <section class="shop-home-list section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shop-section-title text-center">
                        <h1>Últimos Items</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($productos->where('activo', 1)->take(6) as $product)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="single-list">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="list-image overlay">
                                        @php
                                            $photo = explode(',', $product->url_imagen);
                                        @endphp
                                        <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}"
                                            class="img-fluid h-100 d-block mw-100">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content">
                                        <h4 class="title"><a href="#">{{ $product->nombre }}</a></h4>
                                        <p class="price">{{ $product->precio }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    {{-- Ultimos Agregados Fin --}}



@endsection

