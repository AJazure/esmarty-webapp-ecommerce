<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MetodoDePagoController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('panel.index');
});
Route::resource('/proveedores', ProveedorController::class)->names('proveedor'); 
Route::resource('/productos', ProductoController::class)->names('producto');
Route::resource('/marcas', MarcaController::class)->names('marca'); 
Route::resource('/categorias', CategoriaController::class)->names('categoria');
Route::resource('/users', UserController::class)->names('user');
Route::resource('/metodosdepago', MetodoDePagoController::class)->names('metodosdepago');
Route::resource('/stock', StockController::class)->names('stock');
Route::get('/historico', [StockController::class, 'historicoVista'])->name('stock.historico');
Route::get('/showDetalle', [StockController::class, 'showDetalle'])->name('stock.showDetalle');

