<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // esta función significa subir, lo nuevo que quiero agregar, tabla nueva
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // todo lo que sea id,
            $table->string('name');
            $table->string('lastname');
            $table->string('document');
            $table->string('address');
            $table->string('phone');
            $table->string('birthday'); // para descuentos en el dia del cumpleaños.
            $table->string('photo')->default('no-photo.png'); // para poner foto
            $table->string('email')->unique(); // unique quiere decir que no se puede repetir
            $table->timestamp('email_verified_at')->nullable(); // para que el campo pueda quedar vacio.
            $table->string('password');
            $table->string('role')->default('Customer'); // si el usuario no pone el rol, por defecto se le asigna que es usuario.
            $table->string('preferences')->nullable();
            $table->string('purchase_history')->nullable();;
            $table->rememberToken();
            $table->timestamps();
            // las tablas siempre iran en minúsculas y si necesita espacio, será con guion bajo, toda tabla debe tener id
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) { // creado por breeze
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) { // creado por breeze
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // esta función sirve para volver a lo que tenia antes, si quiero volver al estado anterior, ir atrás.
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
