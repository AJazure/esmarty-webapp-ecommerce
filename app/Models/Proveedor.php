<?php
//Modelo creado por AJazure

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    //nombre de la tabla que se conecta a este model
    protected $table = 'proveedores';

    //nombres de las columnas modificables
    protected $fillable = [
        'descripcion',
        'cuit',
        'razon_social',
        'direccion',
        'telefono',
        'correo',
        'activo',
    ];

}
