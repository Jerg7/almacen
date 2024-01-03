<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventary extends Model
{
    use HasFactory;
    
    protected $table = 'inventaries';

    protected $primaryKey = 'id_inventary';

    protected $fillable = [
        'id_product',
        'stock',
    ];

    public function Product()
    {
        return $this->hasOne(Product::class, 'id_product', 'id_product');
    }
}
