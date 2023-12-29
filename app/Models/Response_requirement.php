<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response_requirement extends Model
{
    use HasFactory;

    protected $table = 'response_requirements';

    protected $primaryKey = 'id_response_requirements';

    protected $fillable = [
        'amount_delivery',
        'modified_justification',
    ];

    public function Requirement()
    {
        return $this->hasOne(Requirement::class, 'id_response_requirements', 'id_response_requirements');
    }
    
}
