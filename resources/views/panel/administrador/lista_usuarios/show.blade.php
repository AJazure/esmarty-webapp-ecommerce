@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Usuario {{ $user->name }} {{ $user->apellido  }}</h1>
            <a href="{{ route('user.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver Atras
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">    
                        <h5><strong>Nombre:</strong> {{ $user->name }} {{ $user->apellido }} </h5>
                    <div class="mb-3">
                        <h5><strong>E-mail:</strong> {{ $user->email }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>DNI:</strong> {{ $user->dni }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong>Teléfono:</strong> {{ $user->telefono }}</h5>
                    </div>
                    <div class="mb-3">
                        <h5><strong> Rol:</strong> @foreach($user->getRoleNames() as $role)
                            {{ $role }}
                            @endforeach </h5>
                    </div>
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