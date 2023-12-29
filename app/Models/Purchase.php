<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';

    protected $primaryKey = 'id_purchase';

    protected $fillable = [
        'id_purchase',
        'id_product',
        'id_provider',
        'amount',
        'price',
        'rif'
    ];

    public function Product()
    {
        return $this->hasOne(Product::class, 'id_product', 'id_product');
    }

    public function Provider()
    {
        return $this->hasOne(Provider::class, 'id_provider', 'id_provider');
    }
}
