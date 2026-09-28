<?php

namespace App\Http\Controllers;

use App\Models\RentalRequirmentsEnquiry;
use App\Models\Property;
use Illuminate\Http\Request;

class RentalRequirmentsEnquiryController extends Controller
{
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Validate Customer Information
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'property_id' => 'required|integer|exists:properties,id',

            'name' => 'required|string|max:255',

            'phone' => 'required|string|max:20',

            'email' => 'required|email|max:255',

            'move_in_date' => 'nullable|date',

            'furnishing' => [
                'nullable',
                'in:fully-furnished,semi-furnished,unfurnished,any'
            ],

            'preferred_contact' => [
                'required',
                'in:phone,whatsapp,email'
            ],

            'message' => 'nullable|string|max:2000',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Get Property
        |--------------------------------------------------------------------------
        */

        $property = Property::findOrFail(
            $validated['property_id']
        );


        /*
        |--------------------------------------------------------------------------
        | Create Property Enquiry
        |--------------------------------------------------------------------------
        */

        $enquiry = RentalRequirmentsEnquiry::create([
            'property_id' => $property->id,

            'property_title' => $property->property_title,

            'name' => $validated['name'],

            'phone' => $validated['phone'],

            'email' => $validated['email'],

            'property_type' => $property->property_type,

            'move_in_date' =>
                $validated['move_in_date'] ?? null,

            'furnishing' =>
                $validated['furnishing'] ?? null,

            'preferred_contact' =>
                $validated['preferred_contact'],

            'message' =>
                $validated['message'] ?? null,

            'status' => 'new',
        ]);


        /*
        |--------------------------------------------------------------------------
        | JSON Response
        |--------------------------------------------------------------------------
        */

        return response()->json([
            'success' => true,

            'message' =>
                'Your property enquiry has been submitted successfully.',

            'enquiry_id' => $enquiry->id,
        ], 201);
    }
}