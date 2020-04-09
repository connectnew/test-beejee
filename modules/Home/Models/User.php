<?php

namespace App\Modules\Home\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'created_at',
        'updated_at'
    ];
}
