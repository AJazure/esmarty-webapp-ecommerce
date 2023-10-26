<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DetallePedidos;
use App\Models\Pedido;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(MetodosDePagoSeeder::class);
        // Crearemos 20 productos
        Producto::factory(20)->create();
        DetallePedidos::factory(5)->create();
        Pedido::factory(3)->create();
    }
}
