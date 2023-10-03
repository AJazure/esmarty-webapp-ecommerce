<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('panel.index');
});
Route::resource('/proveedores', ProveedorController::class)->names('proveedor'); 
Route::resource('/productos', ProductoController::class)->names('producto');
Route::resource('/marcas', MarcaController::class)->names('marca'); //como es un controlador tipo resource usaré solo esta línea
Route::resource('/categorias', CategoriaController::class)->names('categoria');
