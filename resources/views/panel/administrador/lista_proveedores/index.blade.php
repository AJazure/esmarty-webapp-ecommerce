{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Proveedores')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>&nbsp;<strong>PROVEEDORES</strong></h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            
            <a href="{{ route('proveedor.create') }}" class="btn btn-success text-uppercase">
                Nuevo Proveedor 
            </a>
        </div>
        
        @if (session('alert'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('alert') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="tabla-productos" class="table table-striped table-hover w-100">
                    <thead>
                        <tr>
                            <th scope="col" class="text-uppercase">Nombre</th>
                            <th scope="col" class="text-uppercase">CUIT</th>
                            <th scope="col" class="text-uppercase">Razon Social</th>
                            <th scope="col" class="text-uppercase">Dirección</th>
                            <th scope="col" class="text-uppercase">Telefono</th>
                            <th scope="col" class="text-uppercase">Email</th>
                            <th scope="col" class="text-uppercase">Activo</th>
                            <th scope="col" class="text-uppercase">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor->descripcion }}</td>
                            <td>{{ $proveedor->cuit }}</td>
                            <td>{{ $proveedor->razon_social }}</td>
                            <td>{{ $proveedor->direccion }}</td>
                            <td>{{ $proveedor->telefono }}</td>
                            <td>{{ $proveedor->correo }}</td>
                            <td class="d-flex justify-content-center">
                                <form action="{{ route('producto.destroy', $proveedor) }}" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                    {{-- <button type="submit" class="btn btn-sm btn-danger text-uppercase">
                                        Eliminar
                                    </button> --}}
                                    <div>
                                        <label class="switch">
                                            <input type="checkbox" class="miInterruptor" id="miInterruptor" value="{{ $proveedor->activo }}" data-change-id="{{ $proveedor->id }}">
                                            <span class="slider"><p class="estadop" style="visibility: hidden">{{ $proveedor->activo }}</p></span>
                                        </label>
                                    </div>
                                </form>
                            </td>
                            <td> 
                                <div class="d-flex">
                                    <a href="{{route('proveedor.show', $proveedor)}}" class="btn btn-sm btn-info text-white text-uppercase me-1 mr-2">
                                        Ver
                                    </a>
                                    <a href="{{route('proveedor.edit', $proveedor)}}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                        Editar
                                    </a>
                                    {{-- <form action="{{ route('producto.destroy', $producto) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger text-uppercase">
                                            Eliminar
                                        </button>
                                    </form> --}}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

{{-- Importacion de Archivos CSS --}}
@section('css')
    
@stop


{{-- Importacion de Archivos JS --}}
@section('js')

    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    <script src="{{ asset('js/productos.js') }}"></script>

    <script>
        var cambiarEstadoUrl = '{{ route('cambiar.estado.proveedor') }}';
        var token = '{{ csrf_token() }}';
    </script>

    <script src="{{ asset('js/button_switch.js') }}"></script>
@stop