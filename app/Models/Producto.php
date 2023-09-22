<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    // Nombre de la tabla que se conecta a este Modelo
    protected $table = 'productos';

    // Nombres de las columnas que son modificables
    protected $fillable = [
    'codigo_producto', 'descripcion', 'precio', 'stock_disponible', 'stock_minimo','stock_deseado','url_imagen'
    ];
     
    // INNER JOIN con la tabla Categoria por medio de la FK categoria_id
    public function categoria() {
    return $this->belongsTo(Categoria::class, 'id_categoria');
    }
    // INNER JOIN con la tabla Marca por medio de la FK marca_id
    public function marca() {
    return $this->belongsTo(Marca::class, 'id_marca');
    }
    
}
