<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Amenity;

class Property extends Model
{
    protected $fillable = [
        'user_id',
        'listing_for',

        // Basic Property Information
        'property_title',
        'property_type',

        // Location
        'country',
        'state',
        'district',
        'city',
        'locality',
        'pincode',
        'landmark',
        'address',
        'google_map_url',
        'latitude',
        'longitude',

        // Property Details
        'bhk',
        'bathrooms',
        'balconies',
        'area_sqft',
        'built_up_area',
        'carpet_area',
        'floor_number',
        'total_floors',
        'property_age',
        'property_condition',
        'facing',
        'road_width',
        'car_parking',
        'possession_status',

        // Rental Details
        'price',
        'security_deposit',
        'furnishing',
        'available_from',

        // Description
        'description',

        // Old JSON amenities - keep for now
        'amenities',

        // Owner
        'owner_name',
        'owner_phone',

        // Status
        'status',
        'admin_remark',
    ];

    protected $casts = [
        'amenities' => 'array',

        'price' => 'decimal:2',
        'security_deposit' => 'decimal:2',

        'available_from' => 'date',

        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',

        'road_width' => 'decimal:2',
    ];

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function propertyAmenities()
    {
        return $this->belongsToMany(
            Amenity::class,
            'property_amenities'
        )->withTimestamps();
    }
}