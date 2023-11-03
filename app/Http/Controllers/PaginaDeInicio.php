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

        $categorias = Categoria::get()->where('activo', 1);

        return view('frontend.index', compact('productos', 'categorias'));
    }

    public function MandarDatosLista(Request $request)
{
    $categorias = Categoria::get()->where('activo', 1);

    $perPage = $request->input('perPage', 10);

    $productos = Producto::latest()
        ->simplePaginate($perPage)
        ->withQueryString(); 

    return view('frontend.paginas.productosLista', compact('productos', 'categorias', 'perPage'));
}

public function MandarDatosCategoriaEspecifica(Request $request, $variable)
{
    $productos = Producto::latest()->get()->where('activo', 1)->take(2);
    $categorias = Categoria::get()->where('activo', 1);

    $perPage = $request->input('perPage', 10);

    $productos_especificos = Producto::where('id_categoria', $variable)
        ->latest()
        ->simplePaginate($perPage)
        ->withQueryString();

    return view('frontend.paginas.productosListaEspecifica', compact('productos', 'productos_especificos', 'categorias', 'perPage'));
}

}
