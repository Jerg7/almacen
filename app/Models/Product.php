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
        'description',
        'amount'
    ];
    
    public function Provider()
    {
        return $this->hasOne(Provider::class, 'id_provider', 'id_provider');
    }
}
