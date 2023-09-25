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
            /* $table->unsignedBigInteger('id_proveedor'); // BIGINT(20) */
            $table->unsignedBigInteger('id_categoria'); // BIGINT(20)
            $table->unsignedBigInteger('id_marca'); // BIGINT(20)
            $table->integer('codigo_producto');
            $table->string('descripcion');
            $table->integer('precio');
            $table->integer('stock_disponible');
            $table->integer('stock_minimo');
            $table->integer('stock_deseado');
            $table->string('url_imagen');
            $table->tinyInteger('activo')->default('1');
            $table->timestamps();
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
