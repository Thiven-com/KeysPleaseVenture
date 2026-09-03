<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentEnquiry extends Model
{
    protected $table = 'rent_enquiries';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'preferred_contact',
        'message',
        'status',
    ];
}