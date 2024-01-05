<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    
    protected $table = 'warehouses';

    protected $primaryKey = 'id_warehouse';

    protected $fillable = [
        'id_warehouse',
        'id_product',
        'stock',
    ];

    public function Product()
    {
        return $this->hasOne(Product::class, 'id_product', 'id_product');
    }
}
