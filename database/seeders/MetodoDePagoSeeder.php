<?php

namespace Database\Seeders;
use App\Models\MetodoDePago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetodoDePagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MetodoDePago::create([
            "descripcion" => "Debito"
        ]);
        MetodoDePago::create([
            "descripcion" => "Credito"
        ]);
        MetodoDePago::create([
            "descripcion" => "Efectivo"
        ]);
        MetodoDePago::create([
            "descripcion" => "Transferencia"
        ]);
    }
}
