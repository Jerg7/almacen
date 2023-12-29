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
        'id_category',
        'description',
        'amount'
    ];
    
    public function Category()
    {
        return $this->hasOne(Category::class, 'id_category', 'id_category');
    }
}
