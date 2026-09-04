<?php

namespace App\Http\Controllers;

use App\Models\ScheduleVisitEnquiry;
use Illuminate\Http\Request;

class ScheduleVisitEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'phone' => 'required|string|max:20',

            'visit_date' => 'required|date',

            'visit_time' => 'required|date_format:H:i',

            'property_type' => 'required|in:apartment,villa,independent-house,office,commercial',

            'monthly_rent' => 'nullable|in:below-10k,10k-20k,20k-30k,30k-50k,above-50k',

            'message' => 'nullable|string|max:2000',
        ]);

        $enquiry = ScheduleVisitEnquiry::create([
            'name' => $validated['name'],

            'phone' => $validated['phone'],

            'visit_date' => $validated['visit_date'],

            'visit_time' => $validated['visit_time'],

            'property_type' => $validated['property_type'],

            'monthly_rent' => $validated['monthly_rent'] ?? null,

            'message' => $validated['message'] ?? null,

            'status' => 'new',
        ]);

        return response()->json([
            'success' => true,

            'message' =>
                'Your property visit has been scheduled successfully. Our property expert will contact you shortly.',

            'enquiry_id' => $enquiry->id,
        ], 201);
    }
}