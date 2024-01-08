<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FastRequirement extends Model
{
    use HasFactory;

    protected $table = 'requirements';

    protected $primaryKey = 'id_requirement';

    protected $fillable = [
        'user',
        'product',
        'requested_amount',
    ];
    
    public function Product()
    {
        return $this->hasOne(Product::class, 'id_product', 'id_product');
    }
    public function Reg_user()
    {
        return $this->hasOne(Reg_user::class, 'id_user', 'id_user');
    }
    public function Requirement_Response()
    {
        return $this->hasOne(Requirement_response::class, 'id_response', 'id_response');
    }
}
