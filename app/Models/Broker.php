<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Broker extends Authenticatable
{
    use HasFactory;

    protected $guard = 'broker';

    protected $table = 'brokers';

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'profile_pic',
        'otp',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'otp',
    ];
}