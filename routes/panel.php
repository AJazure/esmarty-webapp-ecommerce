<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarcaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('panel.index');
});

Route::resource('/productos', ProductoController::class)->names('producto');
Route::resource('/marcas', MarcaController::class)->names('marca');
