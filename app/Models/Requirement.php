<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    
    protected $table = 'requirements';

    protected $primaryKey = 'id_requirement';

    protected $fillable = [
        'user',
        'category',
        'product',
        'requested_amount',
        'justification'
    ];
    
    public function Category()
    {
        return $this->hasOne(Category::class, 'id_category', 'id_category');
    }
    public function Product()
    {
        return $this->hasOne(Product::class, 'id_product', 'id_product');
    }
    public function Reg_user()
    {
        return $this->hasOne(Reg_user::class, 'id_user', 'id_user');
    }
    public function Response_requirement()
    {
        return $this->hasOne(Response_requirement::class, 'id_response_requirements', 'id_response_requirements');
    }
}
