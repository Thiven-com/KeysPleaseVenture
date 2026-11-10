<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\RentalPropertyReport;
use Illuminate\Http\Request;

class RentalPropertyReportController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',

            'reason' => 'required|in:already_rented,incorrect_information,incorrect_price,incorrect_location,duplicate,fake_listing,wrong_contact,misleading_photos,other',

            'message' => 'nullable|string|max:2000',
        ]);

        $property = Property::findOrFail($validated['property_id']);

        $report = RentalPropertyReport::create([
            'property_id' => $property->id,
            'property' => $property->property_title,
            'reason' => $validated['reason'],
            'message' => $validated['message'] ?? null,
            'status' => 'new',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for reporting this property. Our team will review it shortly.',
            'report_id' => $report->id,
        ], 201);
    }
}