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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('size');
            $table->string('color');
            $table->integer('price');
            $table->string('photo')->default('no-photo.png');
            $table->string('category');
            $table->integer('stock');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sale_id');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_');
    }
};
