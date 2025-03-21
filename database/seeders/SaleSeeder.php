<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sale;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sale                  = new Sale;  
        /* $sale->product         = "Jardín zen"; */
        $sale->amount          =  2;
        $sale->total_cost     = 256000;
        $sale->purchase_date           = "18/03/2025";
        $sale->order_status    = "Empacado";
        $sale->shipping_details ="En tienda";
        $sale->user_id        =1;
        $sale->product_id     =1;


        $sale->save();
         
    }
}
