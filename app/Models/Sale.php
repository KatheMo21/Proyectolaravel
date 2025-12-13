<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sale extends Model
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
       /*  'product', */
        'amount',
        'total_cost',
        'purchase_date', // fecha de compras
        'order_status',  // estado del pedido
        'shipping_details',// detalles de envio
        'user_id',
        'product_id',
    ];

    /* public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    } */

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // función para buscar
    public function scopeNames($sales, $query)
    {
        if (trim($query)) {
            $sales->where('purchase_date', 'LIKE', '%' . $query . '%');
            /* ->orWhere('', 'LIKE', '%' . $query . '%'); */
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
