@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Proveedor "{{ $proveedor->descripcion }}"</h1>
            <a href="{{ route('proveedore.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver Atras
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">    
                        <h5><strong>Nombre:</strong> {{ $proveedor->descripcion }}</h5>
                    </div>
                    <div class="mb-3">    
                        <h5><strong>CUIT:</strong> {{$proveedor->cuit}}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>Razon Social:</strong> {{ $proveedor->razon_social }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>Dirección:</strong> {{ $proveedor->direccion }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>Telefono:</strong> {{ $proveedor->telefono }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>Correo:</strong> {{ $proveedor->correo }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>Estado:</strong> {{ $proveedor->activo }}</h5>
                    </div>
                   
                    
                    {{-- <div class="mb-3">
                        <p>Creado por {{ $proveedor->vendedor->name }}.</p>
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