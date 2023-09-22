<?php

namespace Database\Seeders;
use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

Marca::create([
 'descripcion' => 'Kingston'
]);
Marca::create([
 'descripcion' => 'Logitech'
]);
Marca::create([
    'descripcion' => 'Redragon'
   ]);
   Marca::create([
    'descripcion' => 'Noga'
   ]);
   Marca::create([
    'descripcion' => 'Sony'
   ]);
   Marca::create([
    'descripcion' => 'Patito'
   ]);
    }
}
