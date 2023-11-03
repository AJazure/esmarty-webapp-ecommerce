<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaDeInicio;


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


Route::get('/', [PaginaDeInicio::class, 'MandarDatosPaginaInicio'])->name('MandarDatosPaginaInicio');

Route::get('productos', [PaginaDeInicio::class, 'MandarDatosLista'])->name('productos');
Route::get('productos/categoria/{categoria}', [PaginaDeInicio::class, 'MandarDatosCategoriaEspecifica'])->name('MandarDatosCategoriaEspecifica');





Auth::routes(
    ['verify'=>true]
); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/categorias/cambiarEstado', [App\Http\Controllers\CategoriaController::class, 'cambiarEstado'])->name('cambiar.estado.categoria');

Route::post('/proveedores/cambiarEstado', [App\Http\Controllers\ProveedorController::class, 'cambiarEstado'])->name('cambiar.estado.proveedor');

Route::post('/productos/cambiarEstado', [App\Http\Controllers\ProductoController::class, 'cambiarEstado'])->name('cambiar.estado.producto');

Route::post('/marcas/cambiarEstado', [App\Http\Controllers\MarcaController::class, 'cambiarEstado'])->name('cambiar.estado.marcas');

Route::post('/metodosdepago/cambiarEstado', [App\Http\Controllers\MetodoDePagoController::class, 'cambiarEstado'])->name('cambiar.estado.metodosdepago');

Route::post('/users/cambiarEstado', [App\Http\Controllers\UserController::class, 'cambiarEstado'])->name('cambiar.estado.users');