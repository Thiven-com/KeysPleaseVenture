<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class RentalRequirmentsEnquiry extends Model
{
    protected $table = 'rental_requirments_enquiries';

    protected $fillable = [
        'property_id',
        'property_title',
        'name',
        'phone',
        'email',
        'property_type',
        'move_in_date',
        'furnishing',
        'preferred_contact',
        'message',
        'status',
    ];

    protected $casts = [
        'move_in_date' => 'date',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}