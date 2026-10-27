<?php

namespace App\Http\Controllers;

use App\Models\ScheduleVisitEnquiry;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleVisitEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|integer|exists:properties,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'visit_date' => 'required|date|after_or_equal:today',
            'visit_time' => 'required|date_format:H:i',
            'property_type' => 'nullable|string|max:100',
            'monthly_rent' => 'nullable|string|max:50',
            'message' => 'nullable|string|max:2000',
        ]);

        $property = Property::findOrFail($validated['property_id']);

        $propertyType = $validated['property_type']
            ?? $property->property_type
            ?? 'Not specified';

        $enquiry = ScheduleVisitEnquiry::create([
            'property_id' => $property->id,
            'customer_id' => Auth::guard('customer')->id(),
            'property_title' => $property->property_title,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'visit_date' => $validated['visit_date'],
            'visit_time' => $validated['visit_time'],
            'property_type' => $propertyType,
            'monthly_rent' => $validated['monthly_rent'] ?? null,
            'message' => $validated['message'] ?? null,
            'status' => 'new',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your property visit has been scheduled successfully. Our property expert will contact you shortly.',
            'enquiry_id' => $enquiry->id,
        ], 201);
    }

}
