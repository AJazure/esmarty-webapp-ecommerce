<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProductoController;
use App\Http\Requests\PedidoRequest;
use App\Models\User;
use App\Models\Pedido;
use App\Models\DetallePedidos;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\MercadoPagoService;
use Illuminate\Support\Facades\Http;

class PedidoController extends Controller
{
    public function __construct(
        private MercadoPagoService $mercadoPagoService
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_cliente = Auth::id();
        $pedidos = Pedido::where('id_cliente', $id_cliente)->get();
        // Retornamos una vista y enviamos las variables
        return view('panel.cliente.lista_usuarios.misCompras', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pedido = new Pedido();
        $user_id = Auth::id();
        $cliente = User::find($user_id);
        $carrito = DetallePedidos::latest()->where('id_cliente', $user_id)->whereNull('id_pedido')->with('productos')->get();

        $pedido->nombre = $cliente->name;
        $pedido->apellido = $cliente->apellido;
        $pedido->dni = $cliente->dni;
        $pedido->correo = $cliente->email;
        $pedido->telefono = $cliente->telefono;
        $pedido->direccion = $cliente->direccion;

        return view('frontend.pages.checkout', compact('pedido', 'carrito'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PedidoRequest $request)
    {
    

        $pedido = new Pedido();

        $pedido->id_cliente = Auth::id();
        $pedido->nombre = $request->get('nombre');
        $pedido->apellido = $request->get('apellido');
        $pedido->dni = $request->get('dni');
        $pedido->telefono = $request->get('telefono');
        $pedido->direccion = $request->get('direccion');
        $pedido->correo = $request->get('email');
        $pedido->codigo_postal = $request->get('codigo_postal');

        $ultimoNumPedido = Pedido::max('num_pedido');
        $nuevoNumPedido = $ultimoNumPedido ? $ultimoNumPedido + 1 : 100; // Trae el último número de pedido de la DB y lo aumenta en 1
        $pedido->num_pedido = $nuevoNumPedido;


        $carrito = DetallePedidos::latest()->where('id_cliente', Auth::id())->whereNull('id_pedido')->with('productos')->get();
        foreach ($carrito as $item) {
            $pedido->total += $item->subtotal * $item->cant_producto;
        }
        
        $pedido->save();
            //Le agrego este ID de pedido a los items que estaban en el carrito: 
            DetallePedidos::whereNull('id_pedido')->where('id_cliente', $pedido->id_cliente)->update(['id_pedido' => $pedido->id]);
            $preferencia = $this->mercadoPagoService->crearPreferencia($carrito, $pedido->id);

            $productoController = app(ProductoController::class);

            foreach ($carrito as $item) {
                $idProducto = $item->id_producto;
                $cant_vendida = $item->cant_producto;
                $productoController->restarStock($idProducto,$cant_vendida);
            }
            

            return redirect()
            ->route('carrito.agregarProductos')
            ->with('alert', 'Pedido de "' . $pedido->nombre . " " . $pedido->apellido . '" agregado exitosamente. Con N°' . $pedido->num_pedido . '. Redirigiendo...')
            ->with('redirectUrl', $preferencia->init_point);
        
        

    }

    public function update(Request $requestURL = null, Pedido $pedido)
    {

    }

    /**
     * Display the specified resource.
     */

    public function show(Pedido $pedido)
    {
        //
    }


    public function itemsPedido($id)
    {
        $detallesPedido = DetallePedidos::latest()->where('id_pedido', $id)->with('productos')->get();
        return response()->json($detallesPedido);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
