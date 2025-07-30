<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    protected $table = 'data_user';
    protected $fillable = [
        'user_id', 'instansi', 'cabang', 'bio'
    ];
}
