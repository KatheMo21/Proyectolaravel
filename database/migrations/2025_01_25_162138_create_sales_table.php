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
        Schema::create('sales', function (Blueprint $table) { // a nivel de migracion debe ser integer el tipo de dato
            $table->id();
            /* $table->string('product'); */
            $table->integer('amount');// a nivel de migracion debe ser integer el tipo de dato
            $table->integer('total_coust');  
            $table->string('purchase_date');  // fecha
            $table->string('order_status');   // estado del pedido
            $table->string('shipping_details');  // detalles de envio
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
