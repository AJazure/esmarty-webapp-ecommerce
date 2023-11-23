@extends('frontend.layouts.master')
@section('title', 'Esmarty || Detalles del Producto')
@section('main-content')
<link rel="stylesheet" href="{{ asset('css/detalleProducto.css') }}">

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

@include('frontend.paginas.productoDetalleInfo')

@endsection
@section('js')
    <script src="{{ asset('js/slider-producto.js') }}"></script>

    <script>
        let rutaParaAgregar = '{{ route('carrito.agregarAlCarrito') }}';
        var token = '{{ csrf_token() }}';
    </script>
    
    <script src="{{ asset('js/carrito/agregar_al_carrito.js') }}"></script>
@endsection
