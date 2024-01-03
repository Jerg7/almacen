<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsData extends Model
{
    use HasFactory;

    protected $table = 'products_datas';

    protected $primaryKey = 'id_product_data';

    protected $fillable = [
        'description',
        'prices',
    ];
}
