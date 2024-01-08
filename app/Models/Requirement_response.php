<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement_response extends Model
{
    use HasFactory;

    protected $table = 'requirements_response';

    protected $primaryKey = 'id_response';

    protected $fillable = [
        'amount_delivery',
    ];

    public function Requirement()
    {
        return $this->hasOne(Requirement::class, 'id_response', 'id_response');
    }
    
}
