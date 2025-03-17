<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;  // esta ruta se debe copiar en los demás modelos
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;  // esta ruta se debe copiar en los demás modelos

class User extends Authenticatable // la clase con la cual se va autenticar
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
        'lastname',
        'document',
        'address',
        'phone',
        'birthday',
        'photo',
        'email',
        'password',
        'role',
        'preferences',
        'purchase_history',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }


    // función para buscar
    public function scopeNames($users, $query)
    {
        if (trim($query)) {
            $users->where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('lastname', 'LIKE', '%' . $query . '%');
        }
    }

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
