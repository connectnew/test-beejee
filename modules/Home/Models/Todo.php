<?php

namespace App\Modules\Home\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todo';
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'text',
        'status',
        'updated_by_admin',
        'created_at',
        'updated_at'
    ];
}