<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    use HasFactory;
    protected $table='login';

    protected $guarded=['id'];

    protected $fillable=[
        'name',
        'user_name',
        'password',
        'isDelete',
        'created_at',
        'updated_at'
    ];


}
