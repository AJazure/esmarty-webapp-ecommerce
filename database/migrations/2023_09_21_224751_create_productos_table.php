<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proveedor'); // BIGINT(20) */
            $table->unsignedBigInteger('id_categoria'); // BIGINT(20)
            $table->unsignedBigInteger('id_marca'); // BIGINT(20)
            $table->integer('codigo_producto')->nullable();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->integer('precio');
            $table->integer('stock_disponible')->nullable();
            $table->integer('stock_minimo')->nullable();
            $table->integer('stock_deseado')->nullable();
            $table->string('url_imagen')->default("https://via.placeholder.com/640x480.png/1d1d1d?text=ITEM%20GENERICO");
            $table->tinyInteger('activo')->default(1);
            $table->timestamps();

            $table->foreign('id_proveedor')->references('id')->on('proveedores');
            // Creamos la FK "id_categoria“ que hace referencia al "id" de la tabla "categorias"
            $table->foreign('id_categoria')->references('id')->on('categorias');
            // Creamos la FK "id_marca“ que hace referencia al "id" de la tabla "marcas"
            $table->foreign('id_marca')->references('id')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
