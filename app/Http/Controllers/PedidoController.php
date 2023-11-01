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

        if (!$pedido->total) {
            return redirect()
            ->route('carrito.agregarProductos')
            ->with('alert', 'No se puede guardar un pedido vacio. ' . '¡Agrega algunos productos al carrito por favor!');
        }

        $pedido->save();
        //Le agrego este ID de pedido a los items que estaban en el carrito: 
        DetallePedidos::whereNull('id_pedido')->where('id_cliente', $pedido->id_cliente)->update(['id_pedido' => $pedido->id]);
        $preferencia = $this->mercadoPagoService->crearPreferencia($carrito, $pedido->id);

        $productoController = app(ProductoController::class);

        foreach ($carrito as $item) {
            $idProducto = $item->id_producto;
            $cant_vendida = $item->cant_producto;
            $productoController->restarStock($idProducto, $cant_vendida);
        }

        $pedido->linkDePago = $preferencia->init_point;
        $pedido->save();

        return redirect()
            ->route('carrito.agregarProductos')
            ->with('alert', 'Pedido de "' . $pedido->nombre . " " . $pedido->apellido . '" agregado exitosamente. Con N°' . $pedido->num_pedido . '. Abriendo link de pago...')
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
    
     public function pago(Request $request)
     {
        //Funcion para consultar si un pedido ya fue pagado
        $payment_id = $request->payment_id; //Id del pago, se ve en el comprobante
        $token = config('mercadopago.access_token');
        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=$token");
        $response = json_decode($response);
        $pedido_id = $request->external_reference; //Trae el ID del pedido, que mandamos por external_reference al crear la preferencia de mercado pago
        $status = $response->status;
        
        if ($status == "approved") {
            $pedido = Pedido::find($pedido_id);
            $pedido->pagado = true;
            $pedido->save();
            return redirect()
            ->route('pedidos.index')
            ->with('alert', 'Pedido °' .$pedido->num_pedido . ' pagado exitosamente. Con N° de operación: ' . $response->id );
        } else {
            $pedido = Pedido::find($pedido_id);
            return redirect()
            ->route('pedidos.index')
            ->with('error', 'Pedido °' .$pedido->num_pedido . ' no se pudo completar el pago. Con N° operación' . $response->id );
        }

    }

    public function cancelarPedido($pedido_id)
    {
        //Cancelo el pedido
        $pedido = Pedido::find($pedido_id);
        $pedido->cancelado = true;

        //Traigo el carrito creado con este id de pedido
        $carrito = DetallePedidos::latest()->where('id_pedido', $pedido_id)->with('productos')->get();

        //Accedo a la funcion SumarStock para devolver los items reservados en el pedido
        $productoController = app(ProductoController::class);
        foreach ($carrito as $item) {
            $idProducto = $item->id_producto;
            $cant_vendida = $item->cant_producto;
            $productoController->sumarStock($idProducto, $cant_vendida);
        }

        $pedido->save();
    }
}
