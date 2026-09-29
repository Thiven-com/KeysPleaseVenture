<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class City extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'is_popular',
        'status',
        'sort_order',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}