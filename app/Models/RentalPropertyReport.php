<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalPropertyReport extends Model
{
    protected $table = 'rental_property_reports';

    protected $fillable = [
        'property',
        'reason',
        'message',
        'status',
    ];
}