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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_');
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change(); // Revertir el cambio si es necesario
        });
    }
};
