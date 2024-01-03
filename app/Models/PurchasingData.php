<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasingData extends Model
{
    use HasFactory;
    
    protected $table = 'purchasing_datas';

    protected $primaryKey = 'id_purchasing_data';

    protected $fillable = [
        'id_provider',
        'id_product',
        'bill',
        'amount',
        'prices',
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
