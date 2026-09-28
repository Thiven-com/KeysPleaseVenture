<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Property;
class Amenity extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'category',
        'status',
        'sort_order',
    ];

    public function properties()
    {
        return $this->belongsToMany(
            Property::class,
            'property_amenities'
        )->withTimestamps();
    }
}