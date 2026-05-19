<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Adminiy extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'adminiy';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'is_active', 'laravelToken'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
