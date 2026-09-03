<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'listing_for' => 'required|in:Rent,Sell,PG',

            'property_type' => [
                'required',
                'in:Apartment,Villa,Independent House,Plot'
            ],

            'locality' => 'required|string|max:255',
            'address' => 'nullable|string',

            'bhk' => 'nullable|string|max:50',

            'area_sqft' => 'nullable|integer|min:1',

            'price' => 'required|numeric|min:0',

            'furnishing' => 'required|string|max:100',

            'amenities' => 'nullable|json',

            'owner_name' => 'required|string|max:255',
            'owner_phone' => 'required|string|max:20',

            'photos' => 'nullable|array|max:10',

            'photos.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120'
            ],
        ]);

        DB::beginTransaction();

        try {

            // Create property
            $property = Property::create([
                'user_id' => Auth::id(),

                'listing_for' => $validated['listing_for'],

                'property_type' => $validated['property_type'],

                'locality' => $validated['locality'],

                'address' => $validated['address'] ?? null,

                'bhk' => $validated['bhk'] ?? null,

                'area_sqft' => $validated['area_sqft'] ?? null,

                'price' => $validated['price'],

                'furnishing' => $validated['furnishing'],

                'amenities' => !empty($validated['amenities'])
                    ? json_decode($validated['amenities'], true)
                    : [],

                'owner_name' => $validated['owner_name'],

                'owner_phone' => $validated['owner_phone'],

                // Never publish directly
                'status' => 'pending',
            ]);

            // Save property photos
            if ($request->hasFile('photos')) {

                foreach ($request->file('photos') as $photo) {

                    $path = $photo->store(
                        'properties',
                        'public'
                    );

                    $property->images()->create([
                        'image_path' => $path,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,

                'message' =>
                    'Property submitted successfully for admin approval.',

                'property_id' =>
                    $property->id,

            ], 201);

        } catch (\Throwable $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,

                'message' =>
                    'Unable to submit property.',

            ], 500);
        }
    }
}