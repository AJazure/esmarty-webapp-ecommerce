<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('panel.index');
});

Route::resource('/proveedores', ProveedorController::class)->names('proveedor'); //como es un controlador tipo resource usaré solo esta línea