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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_metodo_de_pago'); // BIGINT(20) */
            $table->unsignedBigInteger('id_cliente'); // BIGINT(20)
            $table->dateTime('fecha_hora'); // BIGINT(20)

            $table->bigInteger('num_pedido');
            $table->bigInteger('num_seguimiento');

            $table->boolean('pagado');
            $table->boolean('en_preparacion');
            $table->boolean('cancelado');
            $table->boolean('enviado');
            $table->float('total');

            $table->foreign('id_metodo_de_pago')->references('id')->on('metodos_de_pago');
           /*  $table->foreign('id_pedido')->references('id')->on('pedidos'); */
            $table->foreign('id_cliente')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
