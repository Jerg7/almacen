<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_detail extends Model
{
    use HasFactory;

    protected $table = 'user_details';

    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'names',
        'lastnames',
        'identification_card',
        'extension',
        'management',
        'position',
    ];
    
    public function Management()
    {
        return $this->hasOne(Management::class, 'id_management', 'id_management');
    }

    public function Job_position()
    {
        return $this->hasOne(Job_position::class, 'id_position', 'id_position');
    }
}
