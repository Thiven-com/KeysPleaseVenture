<?php

namespace App\Http\Controllers;

use App\Models\RentEnquiry;
use Illuminate\Http\Request;

class RentEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'preferred_contact' => 'required|in:phone,whatsapp,email',
            'message' => 'nullable|string|max:2000',
        ]);

        $enquiry = RentEnquiry::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'preferred_contact' => $validated['preferred_contact'],
            'message' => $validated['message'] ?? null,
            'status' => 'new',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your enquiry has been submitted successfully.',
            'enquiry_id' => $enquiry->id,
        ], 201);
    }
}