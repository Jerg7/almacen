<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reg_user extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'role',
        'username',
        'email',
        'password',
        'question',
        'answer'
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function User_detail()
    {
        return $this->hasOne(User_detail::class, 'id_detail', 'id_detail');
    }

    public function Security_question()
    {
        return $this->hasOne(Security_question::class, 'id_question', 'id_question');
    }

    public function Roles()
    {
        return $this->hasOne(Roles::class, 'id_role', 'id_role');
    }
}
