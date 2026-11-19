<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FurnishingFeature extends Model
{
    protected $table = 'furnishing_features';

    protected $fillable = [
        'name',
        'furnishing_type',
        'selection_type',
        'icon',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
