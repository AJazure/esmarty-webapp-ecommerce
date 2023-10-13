<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/categorias/cambiarEstado', [App\Http\Controllers\CategoriaController::class, 'cambiarEstado'])->name('cambiar.estado.categoria');

Route::post('/proveedores/cambiarEstado', [App\Http\Controllers\ProveedorController::class, 'cambiarEstado'])->name('cambiar.estado.proveedor');

Route::post('/productos/cambiarEstado', [App\Http\Controllers\ProductoController::class, 'cambiarEstado'])->name('cambiar.estado.producto');

Route::post('/marcas/cambiarEstado', [App\Http\Controllers\MarcaController::class, 'cambiarEstado'])->name('cambiar.estado.marcas');

Route::post('/metodosdepago/cambiarEstado', [App\Http\Controllers\MetodoDePagoController::class, 'cambiarEstado'])->name('cambiar.estado.metodosdepago');
