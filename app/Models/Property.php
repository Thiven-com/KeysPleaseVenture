<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'user_id',
        'listing_for',
        'property_type',
        'locality',
        'address',
        'bhk',
        'area_sqft',
        'price',
        'furnishing',
        'amenities',
        'owner_name',
        'owner_phone',
        'status',
        'admin_remark',
    ];

    protected $casts = [
        'amenities' => 'array',
        'price' => 'decimal:2',
    ];

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}