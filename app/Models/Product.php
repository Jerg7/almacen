<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id_product';

    protected $fillable = [
        'id_provider',
        'id_product_data',
        'description',
        'prices',
    ];
    
    public function Provider()
    {
        return $this->hasOne(Provider::class, 'id_provider', 'id_provider');
    }
    public function Product_data()
    {
        return $this->hasOne(ProductsData::class, 'id_product_data', 'id_product_data');
    }
}
