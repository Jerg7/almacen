<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_position extends Model
{
    use HasFactory;
    protected $table = 'job_positions';

    protected $primaryKey = 'id_position';

    protected $fillable = [
        'description'
    ];
}
