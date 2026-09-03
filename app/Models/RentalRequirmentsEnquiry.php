<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalRequirmentsEnquiry extends Model
{
    protected $table = 'rental_requirments_enquiries';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'property_type',
        'budget',
        'move_in_date',
        'furnishing',
        'preferred_contact',
        'message',
        'status',
    ];

    protected $casts = [
        'move_in_date' => 'date',
    ];
}