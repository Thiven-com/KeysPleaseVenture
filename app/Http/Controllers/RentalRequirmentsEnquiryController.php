<?php

namespace App\Http\Controllers;

use App\Models\RentalRequirmentsEnquiry;
use Illuminate\Http\Request;

class RentalRequirmentsEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'phone' => 'required|string|max:20',

            'email' => 'required|email|max:255',

            'property_type' =>
                'required|in:apartment,villa,independent-house,office,commercial',

            'budget' =>
                'nullable|in:below-10k,10k-20k,20k-30k,30k-50k,above-50k',

            'move_in_date' =>
                'nullable|date',

            'furnishing' =>
                'nullable|in:fully-furnished,semi-furnished,unfurnished,any',

            'preferred_contact' =>
                'required|in:phone,whatsapp,email',

            'message' =>
                'nullable|string|max:2000',
        ]);


        $enquiry = RentalRequirmentsEnquiry::create([
            'name' => $validated['name'],

            'phone' => $validated['phone'],

            'email' => $validated['email'],

            'property_type' => $validated['property_type'],

            'budget' => $validated['budget'] ?? null,

            'move_in_date' => $validated['move_in_date'] ?? null,

            'furnishing' => $validated['furnishing'] ?? null,

            'preferred_contact' =>
                $validated['preferred_contact'],

            'message' =>
                $validated['message'] ?? null,

            'status' => 'new',
        ]);


        return response()->json([
            'success' => true,
            'message' =>
                'Your rental enquiry has been submitted successfully.',
            'enquiry_id' => $enquiry->id,
        ], 201);
    }
}