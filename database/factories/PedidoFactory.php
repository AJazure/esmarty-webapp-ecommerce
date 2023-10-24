<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\MetodoDePago;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $mdp = MetodoDePago::inRandomOrder()->first(); 

        return [
        'total' => $this->faker->randomFloat(2, 2000, 100000), // Numero Flotante aleatorio en el rango [2000; 100000] con 2 decimales
        'cant_producto' => $this->faker->numberBetween(1,10),
        
        'id_cliente' => $user->id, 
        'id_metodo_de_pago' => $mdp->id, 
        ];
    }
}
