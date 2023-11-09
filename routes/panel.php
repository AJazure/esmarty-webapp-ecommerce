<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MetodoDePagoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	if (auth()->user()->hasRole('cliente')) {
		return redirect()->route('MandarDatosPaginaInicio');
	}

	return view('panel.index');
})->middleware(['verified'])->name('Welcome');

Route::resource('/proveedores', ProveedorController::class)->names('proveedor');
Route::resource('/productos', ProductoController::class)->names('producto');
Route::resource('/marcas', MarcaController::class)->names('marca'); //como es un controlador tipo resource usaré solo esta línea
Route::resource('/categorias', CategoriaController::class)->names('categoria');
Route::resource('/users', UserController::class)->names('user');
Route::resource('/metodosdepago', MetodoDePagoController::class)->names('metodosdepago');
