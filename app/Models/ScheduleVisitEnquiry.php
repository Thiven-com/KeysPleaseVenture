<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleVisitEnquiry extends Model
{
    protected $table = 'schedule_visit_enquiries';

    protected $fillable = [
        'property_id',
        'customer_id',
        'property_title',
        'name',
        'phone',
        'visit_date',
        'visit_time',
        'property_type',
        'monthly_rent',
        'message',
        'status',
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
