@extends('frontend.layouts.master')
@section('title', 'Esmarty || Inicio')
@section('main-content')

    @if (session('alert'))
    <div class="containter-fluid mb-3 p-0">
        
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('alert') }}
                </div>
            </div>
        
    </div>
    @endif
    {{-- Slider --}}
    <div class="container-fluid p-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($carrusel as $key => $producto)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                        class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($carrusel as $key => $producto)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        @if ($producto->url_imagen)
                            <img src="{{ asset($producto->url_imagen) }}" class="d-block w-100 h-100"
                                style="object-fit: contain; max-height: 80vh;" alt="...">
                        @else
                            <img src="{{ asset('ruta_por_defecto_si_no_hay_imagen') }}" class="d-block w-100 h-100"
                                style="object-fit: contain; max-height: 80vh;" alt="...">
                        @endif
                        <div
                            class="carousel-caption d-none d-md-block text-start align-items-center justify-content-center">
                            <div class="bg-dark p-3 rounded" style="opacity: 0.7;">
                                <h1>{{ $producto->nombre }}</h1>
                                {{-- <p>{{ $producto->descripcion }}</p> --}}
                                <a href="{{ route('MandarDatosProductoEspecifico', $producto->id) }}"
                                    class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev" >
                <span class="carousel-control-prev-icon" aria-hidden="true" style="color: white;"></span>
                <span class="visually-hidden" style="color: white;">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true" style="color: white;"></span>
                <span class="visually-hidden" style="color: white;">Siguiente</span>
            </button>
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
                                        <h3><a class="dropdown-item"
                                                href="{{ route('MandarDatosCategoriaEspecifica', $categoria->id) }}">{{ $categoria->descripcion }}</a>
                                        </h3>
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
                                            class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content">
                                        <h4 class="titulo"><a href="{{ route('MandarDatosProductoEspecifico', $product->id) }}">{{Str::limit($product->nombre, 25)}}</a></h4>
                                        <p class="precio">${{ $product->precio }}</p>
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

@section('js')

<script>
    // Verificar si hay una URL de redirección adicional
    var redirectUrl = '{{ session('redirectUrl') }}';

    if (redirectUrl) {
        // Redirigir al usuario a la URL adicional
        window.location.href = redirectUrl; 
        //window.open(redirectUrl, '_blank'); Por si quiero abrirlo en otra pestaña
    } 
    // Display an info toast with no title
    </script>

    
@endsection