<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // se hace la migración de la tabla 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void // declarar variable
    {
        $user            = new User;   // para actualizar, es este mismo paso pero sin instancear el usuario.
        $user-> name     = 'Katherin'; 
        $user-> lastname = 'Monroy'; 
        $user-> document = '1053856627'; 
        $user-> address  = 'calle 39A num 18A 55'; 
        $user-> phone    = '3205925903'; 
        $user-> birthday = '21 abril';
        $user-> photo    = '11111';  
        $user-> email    = 'Katherinymonroye@gmail.com'; 
        $user-> password =bcrypt('Katherin'); // bcrypt para encriptar la contraseña.
        $user-> role     = 'Admin'; 
        $user-> save();  // este metodo es para guardar


    }
}
