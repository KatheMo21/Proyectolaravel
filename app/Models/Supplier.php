<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Suppllier extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable; // HasFactory crea la fabrica de usuarios.

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [ // acá van los atributos de la clase, no se pone el tipo de dato, porque el ya lo toma de la base de datos
        'id',
        'name',
        'document',
        'phone',
        'location',
        'product_service',
        'transaction',
        
    ];

    // public function product(){
    //     return $this->belongsTo('App\Models\Product'); 
    // }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [ // atributos que no se van a ver, estan encapsulados. acá se pone lo que nadie puede ver
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string> // todo lo que relaciona los metodos
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

}
