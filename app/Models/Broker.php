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

        // Registration details
        'agency_name',
        'broker_type',
        'license_number',
        'address',
        'city',
        'state',
        'pincode',

        // Account
        'password',
        'status',
        'rejection_reason',

        // OTP
        'otp',
        'otp_expires_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'otp',
    ];
}