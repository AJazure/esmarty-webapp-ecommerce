<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Categoria;
use App\Models\Proveedor;
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
        $proveedores=Proveedor::get();

        $imagenes= explode('|', $producto->url_imagen);

        //Retornamos la vista de creacion de productos, enviamos al producto y las categorias
        return view('panel.administrador.lista_productos.create', compact('producto','categorias','marcas','proveedores','imagenes')); //compact(mismo nombre de la variable)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request)
    {
        //
        //dd($request->all());
        
        $producto = new Producto();
        $producto->codigo_producto = $request->get('codigo_producto');
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->stock_disponible = $request->get('stock_disponible');
        $producto->stock_deseado = $request->get('stock_deseado');
        $producto->stock_minimo = $request->get('stock_minimo');
        $producto->id_categoria = $request->get('id_categoria');
        $producto->id_proveedor = $request->get('id_proveedor');
        $producto->id_marca = $request->get('id_marca');

        if ($files = $request->file('url_imagen')) {

            $url_imagen = [];

            foreach ($files as $file) {
                //$imagen_name = md5(rand(100, 10000)); //cifrado del nombre
                //$extension = strtolower($file->getClientOriginalExtension()); //obtengo extension
                //$imagen_full_name = $imagen_name . '.' . $extension; //armado del nombre completo del file
                $url_imagen[] = asset($file->store('public/producto')); //guardo en un array las direcciones de cada uno 
                //dd($url_imagen); //puedo ver que se envía la url completa
                $imagenes = implode('|', $url_imagen); //contiene todas las url de las imagenes del array unidos con |
            }
        }

        $producto->url_imagen = asset(str_replace('public', 'storage', $imagenes)); // Almacena la info del producto en la BD la url de tas las imagenes
        
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
        $proveedor = Proveedor::find($producto->proveedor->id);
        $imagenes= explode('|', $producto->url_imagen); // separa urls

        return view('panel.administrador.lista_productos.show', compact('producto','proveedor', 'imagenes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
        $categorias = Categoria::get();
        $marcas = Marca::get();
        $proveedores=Proveedor::get();
        return view('panel.administrador.lista_productos.edit', compact('producto', 'categorias','marcas','proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, Producto $producto)
    {
        //
        $producto->codigo_producto = $request->get('codigo_producto');
        $producto->nombre = $request->get('nombre');
        $producto->activo = $request->get('activo');
        $producto->precio = $request->get('precio');
        $producto->descripcion = $request->get('descripcion');
        $producto->stock_disponible = $request->get('stock_disponible');
        $producto->stock_deseado = $request->get('stock_deseado');
        $producto->stock_minimo = $request->get('stock_minimo');
        $producto->id_proveedor = $request->get('id_proveedor');
        $producto->id_categoria = $request->get('id_categoria');
        $producto->id_marca = $request->get('id_marca');

        if ($request->hasFile('url_imagen')) {
            
            $files = $request->file('url_imagen');
            $url_imagen = [];

            foreach ($files as $file) {

                $url_imagen[] = asset($file->store('public/producto')); //guardo en un array las direcciones de cada uno     
                $imagenes = implode('|', $url_imagen); //contiene todas las url de las imagenes del array unidos con |

            }
        }

        $producto->url_imagen = asset(str_replace('public', 'storage', $imagenes)); // Almacena la info del producto en la BD la url de tas las imagenes

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
        /* $producto->delete();

        return redirect()
        ->route('producto.index')
        ->with('alert', 'Producto eliminado exitosamente'); */
    }

    public function cambiarEstado(Request $request)
    {
        $producto = Producto::find($request->_id);

        if (!$producto) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        $producto->activo = !$producto->activo; // Cambia el estado
        $producto->save();

        return response()->json(['message' => 'Estado de categoría cambiado con éxito']);
    }
}
