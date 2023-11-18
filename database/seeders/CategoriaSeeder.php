<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'descripcion' => 'Sin Categoría'
        ]);
        Categoria::create([
            'descripcion' => 'Monitores'
        ]);
        Categoria::create([
            'descripcion' => 'GPU'
        ]);
        Categoria::create([
            'descripcion' => 'CPU'
        ]);
        Categoria::create([
            'descripcion' => 'Proyectores'
        ]);
        Categoria::create([
            'descripcion' => 'Patito'
        ]);
    }
}
