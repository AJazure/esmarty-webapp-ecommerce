<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;  
use App\Models\Categoria; 
use App\Models\Marca; 

class PaginaDeInicio extends Controller
{
    public function MandarDatosPaginaInicio()
    {
        $productos = Producto::latest()->get();

        $categorias = Categoria::latest()->get();

        return view('frontend.index', compact('productos', 'categorias'));
    }

    public function MandarDatosLista(Request $request)
{
    $categorias = Categoria::latest()->get();

    $perPage = $request->input('perPage', 10);

    $productos = Producto::latest()
        ->simplePaginate($perPage)
        ->withQueryString(); 

    return view('frontend.paginas.productosLista', compact('productos', 'categorias', 'perPage'));
}

}
