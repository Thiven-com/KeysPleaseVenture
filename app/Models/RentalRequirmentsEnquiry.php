<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class RentalRequirmentsEnquiry extends Model
{
    protected $table = 'rental_requirments_enquiries';

    protected $fillable = [
        'property_id',
        'customer_id',
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
        'terms_accepted',
        'terms_accepted_at',
    ];

    protected $casts = [
        'move_in_date' => 'date',
        'terms_accepted' => 'boolean',
        'terms_accepted_at' => 'datetime',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}