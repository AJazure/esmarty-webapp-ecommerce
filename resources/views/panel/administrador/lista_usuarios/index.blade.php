{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Administrar Usuarios')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>&nbsp;<strong>Administrar Usuarios</strong></h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            
            <a href="{{ route('user.create') }}" class="btn btn-success text-uppercase">
                Crear Nuevo Usuario
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
                            <!-- <th scope="col">#</th> -->
                            <th scope="col" class="text-uppercase">Nombre</th>
                            <th scope="col" class="text-uppercase">Apellido</th>
                            <th scope="col" class="text-uppercase">E-mail</th>
                            <!-- <th scope="col" class="text-uppercase">DNI</th> -->
                            <!-- <th scope="col" class="text-uppercase">Telefono</th> -->
                            <th scope="col" class="text-uppercase">Rol</th>
                            <th scope="col" class="text-uppercase">Activo</th>
                            <th scope="col" class="text-uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->apellido }}</td>
                        <td>{{ $user->email }}</td>
                       <!--  <td>{{ $user->dni }}</td> -->
                        <!-- <td>{{ $user->telefono }}</td> -->
                        <td>@foreach($user->getRoleNames() as $role)
                        {{ $role }}
                        @endforeach</td>
                        <td>{{ $user->activo }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('user.show', $user) }}" class="btn btn-sm btn-info text-white text-uppercase me-1 mr-2">
                                    Ver
                                </a>
                                <a href="{{ route('user.edit', $user) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                    Editar
                                </a>
                                {{-- <form action="{{ route('user.destroy', $user) }}" method="POST">
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
    <script src="{{ asset('js/usuarios.js') }}"></script>
@stop