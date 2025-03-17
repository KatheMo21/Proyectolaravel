<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product              = new Product;   // para actualizar, es este mismo paso pero sin instancear el usuario.
        $product->name        = "jardín meditación";
        $product->description = "Trae : Base redonda en concreto,  figura en yeso , arena, piedras, rastrillo, vela y palo santo.";
        $product->size        = "Medida base redonda: Ancho 26,5cm - Alto 2cm.";
        $product->color       = "Blanco con azul";
        $product->price       = 128000;
        $product->photo       = "no-photo.png";
        $product->category    = "Jardín Zen";
        $product->stock       = 6;
        $product->save();
    }
}
