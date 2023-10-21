{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Productos')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>&nbsp;<strong>PRODUCTOS</strong></h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-3">

                <a href="{{ route('producto.create') }}" class="btn btn-success text-uppercase">
                    Nuevo Producto
                </a>

                <a href="{{ route('exportar-productos-pdf') }}" class="btn btn-danger" title="PDF" target="_blank">
                    <i class="fas fa-file-pdf"></i>
                </a>

                <a href="{{ route('exportar-productos-excel') }}" class="btn btn-success" title="Excel">
                    <i class="fas fa-file-excel"></i>
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
                        <div class="float-right ml-5 ">

                            <label for="filtroSelect">Filtrar por estado:</label>
                            <select id="filtroSelect" class="form-select">
                                <option value="">Mostrar todos</option>
                                <option value="1">Activado</option>
                                <option value="0">Desactivado</option>
                            </select>

                        </div>
                        <table id="tabla-productos" class="table table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-uppercase">Nombre</th>
                                    <th scope="col" class="text-uppercase">Categoría</th>
                                    <th scope="col" class="text-uppercase">Marca</th>
                                    <th scope="col" class="text-uppercase">Precio</th>
                                    <th scope="col" class="text-uppercase">Stock</th>
                                    <th scope="col" class="text-uppercase">Imagen</th>
                                    <th scope="col" class="text-uppercase">Activo</th>
                                    <th scope="col" class="text-uppercase">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->codigo_producto }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->categoria->descripcion }}</td>
                                        {{-- <td>{{ $producto->marca->descripcion}}</td> --}}
                                        <td>{{ $producto->marca ? $producto->marca->descripcion : 'N/A' }}</td>
                                        <td>{{ $producto->precio }}</td>
                                        <td>{{ $producto->stock_disponible }}</td>
                                        {{-- <td>{{ Str::limit($producto->descripcion, 80) }}</td> --}}
                                        <td>
                                            <img src="{{ $producto->url_imagen }}" alt="{{ $producto->nombre }}"
                                                class="img-fluid" style="width: 150px;">
                                        </td>
                                        <td>
                                            <form action="{{ route('producto.destroy', $producto) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                {{-- <button type="submit" class="btn btn-sm btn-danger text-uppercase">
                                        Eliminar
                                    </button> --}}
                                                <div>
                                                    <label class="switch">
                                                        <input type="checkbox" class="miInterruptor"
                                                            value="{{ $producto->activo }}"
                                                            data-change-id="{{ $producto->id }}">
                                                        <span class="slider">
                                                            <p class="estadop" style="visibility: hidden">
                                                                {{ $producto->activo }}</p>
                                                        </span>

                                                    </label>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('producto.show', $producto) }}"
                                                    class="btn btn-sm btn-info text-white text-uppercase me-1 mr-2">
                                                    Ver
                                                </a>
                                                <a href="{{ route('producto.edit', $producto) }}"
                                                    class="btn btn-sm btn-warning text-white text-uppercase me-1">
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
        <script>
            var cambiarEstadoUrl = '{{ route('cambiar.estado.producto') }}';
            var token = '{{ csrf_token() }}';
        </script>

        <script src="{{ asset('js/button_switch.js') }}"></script>
        {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
        <script src="{{ asset('js/productos.js') }}"></script>
    @stop
