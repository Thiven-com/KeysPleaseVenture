<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'site_settings';

    protected $fillable = [
        // Logo and Images
        'logo',
        'site_logo',
        'favicon',
        'admin_logo',
        'image',

        // Website Information
        'site_name',
        'description',
        'short_description',
        'company',
        'site_url',

        // Contact Information
        'address',
        'email',
        'phone',
        'customer_care_no',
        'help_line_no',

        // Business Information
        'gst',

        // Social Media
        'facebook',
        'linkedin',
        'youtube',
        'pinterest',
        'instagram',
        'twitter',
    ];
}
