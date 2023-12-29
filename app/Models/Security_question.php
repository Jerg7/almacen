<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Security_question extends Model
{
    use HasFactory;
    protected $table = 'security_questions';

    protected $primaryKey = 'id_questions';
}
