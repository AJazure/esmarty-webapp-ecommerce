<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $productos = Producto::where('vendedor_id', auth()->user()->id) // Filtra los productos del VENDEDOR LOGUEADO
        // ->latest() // Ordena de manera DESC por el campo "created_at"
        // ->get(); // Convierte los datos extraidos de la BD en un Array 
        $productos = Producto::latest()->get();
        // Retornamos una vista y enviamos la variable "productos"
        return view('panel.administrador.lista_productos.index', compact('productos'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //Creamos un Producto nuevo para cargarle datos
        $producto = new Producto();
        
        //Recuperamos todas las categorias de la BD
        $categorias=Categoria::get();//Recordar importar el modelo Categoria
        $marcas=Marca::get();//Recordar importar el modelo Categoria

        //Retornamos la vista de creacion de productos, enviamos al producto y las categorias
        return view('panel.administrador.lista_productos.create', compact('producto','categorias','marcas')); //compact(mismo nombre de la variable)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $producto = new Producto();
        $producto->codigo_producto = $request->get('codigo_producto');
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->stock_disponible = $request->get('stock_disponible');
        $producto->stock_deseado = $request->get('stock_deseado');
        $producto->stock_minimo = $request->get('stock_minimo');
        $producto->id_categoria = $request->get('id_categoria');
        $producto->id_marca = $request->get('id_marca');
        // $producto->vendedor_id = auth()->user()->id;
        if ($request->hasFile('url_imagen')) {
        // Subida de imagen al servidor (public > storage)
        $url_imagen = $request->file('url_imagen')->store('public/producto');
        $producto->url_imagen = asset(str_replace('public', 'storage', $url_imagen));
        } else {
        $producto->url_imagen = '';
        }
        // Almacena la info del producto en la BD
        $producto->save();
        return redirect()
        ->route('producto.index')
        ->with('alert', 'Producto "' . $producto->nombre . '" agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
        return view('panel.administrador.lista_productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
        $categorias = Categoria::get();
        $marcas = Marca::get();
        return view('panel.administrador.lista_productos.edit', compact('producto', 'categorias','marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
        $producto->codigo_producto = $request->get('codigo_producto');
        $producto->nombre = $request->get('nombre');
        // $producto->proveedor = $request->get('proveedor_id');
        $producto->precio = $request->get('precio');
        $producto->descripcion = $request->get('descripcion');
        $producto->stock_disponible = $request->get('stock_disponible');
        $producto->stock_deseado = $request->get('stock_deseado');
        $producto->stock_minimo = $request->get('stock_minimo');
        $producto->id_categoria = $request->get('id_categoria');
        $producto->id_marca = $request->get('id_marca');

        if ($request->hasFile('url_imagen')) {
            // Subida de la imagen nueva al servidor
            $url_imagen = $request->file('url_imagen')->store('public/producto');
            $producto->url_imagen = asset(str_replace('public', 'storage', $url_imagen));
        }
        // Actualiza la info del producto en la BD
        $producto->update();
        
        return redirect()
            ->route('producto.index')
            ->with('alert', 'Producto "' .$producto->nombre. '" actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();

        return redirect()
        ->route('producto.index')
        ->with('alert', 'Producto eliminado exitosamente');
    }
}
