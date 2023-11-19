@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Producto "{{ $producto->nombre }}"</h1>
            @if (isset($bandera))
                <a href="{{ route('stock.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver Atras a Stock
                </a>    
            @else
            <a href="{{ route('producto.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver Atras
            </a>
            @endif
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        @foreach ($imagenes as $imagen)
                        <img src="{{ $imagen }}" alt="{{ $producto->nombre }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 250px; width: 250px;">    
                        @endforeach
                    </div>
                    <div class="mb-3">    
                        <h5><strong>Codigo:</strong> {{ $producto->codigo_producto }}</h5>
                    </div>
                    <div class="mb-3">    
                        <h5><strong>Nombre:</strong> {{ $producto->nombre }}</h5>
                    </div>
                    <div class="mb-3">    
                        <h5><strong>Proveedor:</strong> {{ $proveedor->descripcion }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>Categoria:</strong> {{ $producto->categoria->descripcion }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>Marca:</strong> {{ $producto->marca->descripcion }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>Precio:</strong> {{ $producto->precio }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>Descripción:</strong> {{ $producto->descripcion }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>Stock Disponible:</strong> {{ $producto->stock_disponible }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>Stock Deseado:</strong> {{ $producto->stock_deseado }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>Stock Minimo:</strong> {{ $producto->stock_minimo }}</h5>
                    </div>
                   
                    
                    {{-- <div class="mb-3">
                        <p>Creado por {{ $producto->vendedor->name }}.</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')

@stop