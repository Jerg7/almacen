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
        'bill',
        'amount',
        'price',
        'rif'
    ];

    public function Purchasing_data()
    {
        return $this->hasOne(PurchasingData::class, 'id_purchasing_data', 'id_purchasing_data');
    }

}
