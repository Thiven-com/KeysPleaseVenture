<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalPropertyReport extends Model
{
    protected $table = 'rental_property_reports';

    protected $fillable = [
        'property_id',
        'property',
        'reason',
        'message',
        'status',
    ];

    public function propertyDetails()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}