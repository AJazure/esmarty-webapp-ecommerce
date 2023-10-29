<?php

namespace App\Services;

use App\Models\Pedido;
use GrahamCampbell\ResultType\Success;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class MercadoPagoService {

    public function __construct() {
        SDK::setAccessToken(config('mercadopago.access_token'));
    }

    public function crearPreferencia($carrito,$id_pedido) {

        // Crea un objeto de preferencia
        $preference = new Preference();

        // Creo los items de la preferencia
        $items = [];
        foreach($carrito as $productoCompra) {

            $item = new Item();
            $item->title = $productoCompra->productos->nombre;
            $item->quantity = $productoCompra->cant_producto;
            $item->unit_price = $productoCompra->subtotal;

            $items[] = $item;
        }
        
        $preference->back_urls = [
            'success' => route('pedido.store'),
        ];

        $preference->external_reference = $id_pedido;

        $preference->auto_return = "approved";
        
        $preference->items = $items;
        /* $preference->external_reference = $compra->id; */
        $preference->save();

        return $preference;
    }

    public function obtenerPago() {
        // Consultar a mercadopago por la preferencia...
    }

}