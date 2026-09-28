<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display all properties.
     */
    public function index()
    {
        $properties = Property::with([
            'images',
            'user',
            'propertyAmenities'
        ])
            ->latest()
            ->paginate(20);

        return view(
            'admin.properties.all',
            compact('properties')
        );
    }


    /**
     * Show Add Property form.
     */
    public function create()
    {
        $amenities = Amenity::where('status', 'active')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view(
            'admin.properties.create',
            compact('amenities')
        );
    }


    /**
     * Store property created directly by Admin.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            /*
             * BASIC PROPERTY INFORMATION
             */
            'property_title' => 'required|string|max:255',

            'property_type' => [
                'required',
                'in:Apartment,Villa,Independent House,Plot'
            ],

            'listing_for' => [
                'required',
                'in:Rent,Lease,PG,Sell'
            ],


            /*
             * LOCATION
             */
            'country' => 'nullable|string|max:100',

            'state' => 'nullable|string|max:100',

            'district' => 'nullable|string|max:100',

            'city' => 'nullable|string|max:100',

            'locality' => 'required|string|max:255',

            'pincode' => 'nullable|string|max:10',

            'landmark' => 'nullable|string|max:255',

            'address' => 'nullable|string',

            'google_map_url' => 'nullable|url|max:2048',

            'latitude' => 'nullable|numeric|between:-90,90',

            'longitude' => 'nullable|numeric|between:-180,180',


            /*
             * PROPERTY DETAILS
             */
            'bhk' => 'nullable|string|max:50',

            'bathrooms' => 'nullable|integer|min:0',

            'balconies' => 'nullable|integer|min:0',

            'area_sqft' => 'required|integer|min:1',

            'built_up_area' => 'nullable|integer|min:1',

            'carpet_area' => 'nullable|integer|min:1',

            'floor_number' => 'nullable|integer|min:0',

            'total_floors' => 'nullable|integer|min:0',

            'property_age' => 'nullable|string|max:100',

            'property_condition' => 'nullable|string|max:100',

            'facing' => 'nullable|string|max:50',

            'road_width' => 'nullable|numeric|min:0',

            'car_parking' => 'nullable|string|max:100',

            'possession_status' => 'nullable|string|max:100',


            /*
             * RENTAL DETAILS
             */
            'price' => 'required|numeric|min:0',

            'security_deposit' => 'nullable|numeric|min:0',

            'furnishing' => 'required|string|max:100',

            'available_from' => 'nullable|date',


            /*
             * DESCRIPTION
             */
            'description' => 'nullable|string',


            /*
             * AMENITIES
             */
            'amenities' => 'nullable|array',

            'amenities.*' => [
                'integer',
                'exists:amenities,id'
            ],


            /*
             * OWNER / BROKER
             */
            'owner_name' => 'required|string|max:255',

            'owner_phone' => 'required|string|max:20',


            /*
             * PROPERTY PHOTOS
             */
            'photos' => 'nullable|array|max:10',

            'photos.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);


        DB::beginTransaction();

        try {

            /*
             * CREATE PROPERTY
             */
            $property = Property::create([

                /*
                 * USER
                 */
                'user_id' => auth()->id(),


                /*
                 * BASIC
                 */
                'listing_for' =>
                    $validated['listing_for'],

                'property_title' =>
                    $validated['property_title'],

                'property_type' =>
                    $validated['property_type'],


                /*
                 * LOCATION
                 */
                'country' =>
                    $validated['country'] ?? null,

                'state' =>
                    $validated['state'] ?? null,

                'district' =>
                    $validated['district'] ?? null,

                'city' =>
                    $validated['city'] ?? null,

                'locality' =>
                    $validated['locality'],

                'pincode' =>
                    $validated['pincode'] ?? null,

                'landmark' =>
                    $validated['landmark'] ?? null,

                'address' =>
                    $validated['address'] ?? null,

                'google_map_url' =>
                    $validated['google_map_url'] ?? null,

                'latitude' =>
                    $validated['latitude'] ?? null,

                'longitude' =>
                    $validated['longitude'] ?? null,


                /*
                 * PROPERTY DETAILS
                 */
                'bhk' =>
                    $validated['bhk'] ?? null,

                'bathrooms' =>
                    $validated['bathrooms'] ?? null,

                'balconies' =>
                    $validated['balconies'] ?? null,

                'area_sqft' =>
                    $validated['area_sqft'] ?? null,

                'built_up_area' =>
                    $validated['built_up_area'] ?? null,

                'carpet_area' =>
                    $validated['carpet_area'] ?? null,

                'floor_number' =>
                    $validated['floor_number'] ?? null,

                'total_floors' =>
                    $validated['total_floors'] ?? null,

                'property_age' =>
                    $validated['property_age'] ?? null,

                'property_condition' =>
                    $validated['property_condition'] ?? null,

                'facing' =>
                    $validated['facing'] ?? null,

                'road_width' =>
                    $validated['road_width'] ?? null,

                'car_parking' =>
                    $validated['car_parking'] ?? null,

                'possession_status' =>
                    $validated['possession_status'] ?? null,


                /*
                 * RENTAL
                 */
                'price' =>
                    $validated['price'],

                'security_deposit' =>
                    $validated['security_deposit'] ?? null,

                'furnishing' =>
                    $validated['furnishing'],

                'available_from' =>
                    $validated['available_from'] ?? null,


                /*
                 * DESCRIPTION
                 */
                'description' =>
                    $validated['description'] ?? null,


                /*
                 * OWNER
                 */
                'owner_name' =>
                    $validated['owner_name'],

                'owner_phone' =>
                    $validated['owner_phone'],


                /*
                 * ADMIN PROPERTY STATUS
                 */
                'status' => 'approved',

                'admin_remark' =>
                    'Property posted by admin.',
            ]);


            /*
             * SAVE AMENITIES
             *
             * Uses property_amenities pivot table.
             */
            $property->propertyAmenities()->sync(
                $validated['amenities'] ?? []
            );


            /*
             * SAVE PROPERTY IMAGES
             */
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


            return redirect()
                ->route('properties.all')
                ->with(
                    'success',
                    'Property added successfully.'
                );


        } catch (\Throwable $e) {

            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Unable to add property: ' . $e->getMessage()
                );
        }
    }


    /**
     * Display property details.
     */
    public function show($id)
    {
        $property = Property::with([
            'images',
            'user',
            'propertyAmenities'
        ])
            ->findOrFail($id);

        return view(
            'admin.properties.show',
            compact('property')
        );
    }


    /**
     * Show edit property form.
     */
    public function edit($id)
    {
        $property = Property::with([
            'images',
            'propertyAmenities'
        ])
            ->findOrFail($id);


        /*
         * Load active amenities for edit form.
         */
        $amenities = Amenity::where('status', 'active')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();


        return view(
            'admin.properties.edit',
            compact(
                'property',
                'amenities'
            )
        );
    }


    /**
     * Update property.
     */
    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);


        /*
         * VALIDATION
         */
        $validated = $request->validate([

            /*
             * BASIC
             */
            'property_title' =>
                'required|string|max:255',

            'property_type' => [
                'required',
                'in:Apartment,Villa,Independent House,Plot'
            ],

            'listing_for' => [
                'required',
                'in:Rent,Lease,PG,Sell'
            ],


            /*
             * LOCATION
             */
            'country' =>
                'nullable|string|max:100',

            'state' =>
                'nullable|string|max:100',

            'district' =>
                'nullable|string|max:100',

            'city' =>
                'nullable|string|max:100',

            'locality' =>
                'required|string|max:255',

            'pincode' =>
                'nullable|string|max:10',

            'landmark' =>
                'nullable|string|max:255',

            'address' =>
                'nullable|string',

            'google_map_url' =>
                'nullable|url|max:2048',

            'latitude' =>
                'nullable|numeric|between:-90,90',

            'longitude' =>
                'nullable|numeric|between:-180,180',


            /*
             * PROPERTY DETAILS
             */
            'bhk' =>
                'nullable|string|max:50',

            'bathrooms' =>
                'nullable|integer|min:0',

            'balconies' =>
                'nullable|integer|min:0',

            'area_sqft' =>
                'required|integer|min:1',

            'built_up_area' =>
                'nullable|integer|min:1',

            'carpet_area' =>
                'nullable|integer|min:1',

            'floor_number' =>
                'nullable|integer|min:0',

            'total_floors' =>
                'nullable|integer|min:0',

            'property_age' =>
                'nullable|string|max:100',

            'property_condition' =>
                'nullable|string|max:100',

            'facing' =>
                'nullable|string|max:50',

            'road_width' =>
                'nullable|numeric|min:0',

            'car_parking' =>
                'nullable|string|max:100',

            'possession_status' =>
                'nullable|string|max:100',


            /*
             * RENTAL
             */
            'price' =>
                'required|numeric|min:0',

            'security_deposit' =>
                'nullable|numeric|min:0',

            'furnishing' =>
                'required|string|max:100',

            'available_from' =>
                'nullable|date',


            /*
             * DESCRIPTION
             */
            'description' =>
                'nullable|string',


            /*
             * AMENITIES
             */
            'amenities' =>
                'nullable|array',

            'amenities.*' => [
                'integer',
                'exists:amenities,id'
            ],


            /*
             * OWNER
             */
            'owner_name' =>
                'required|string|max:255',

            'owner_phone' =>
                'required|string|max:20',


            /*
             * STATUS
             */
            'status' => [
                'required',
                'in:pending,approved,rejected,rented,inactive'
            ],

            'admin_remark' =>
                'nullable|string|max:1000',


            /*
             * PHOTOS
             */
            'photos' =>
                'nullable|array|max:10',

            'photos.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);


        DB::beginTransaction();

        try {

            /*
             * UPDATE PROPERTY
             */
            $property->update([

                /*
                 * BASIC
                 */
                'property_title' =>
                    $validated['property_title'],

                'property_type' =>
                    $validated['property_type'],

                'listing_for' =>
                    $validated['listing_for'],


                /*
                 * LOCATION
                 */
                'country' =>
                    $validated['country'] ?? null,

                'state' =>
                    $validated['state'] ?? null,

                'district' =>
                    $validated['district'] ?? null,

                'city' =>
                    $validated['city'] ?? null,

                'locality' =>
                    $validated['locality'],

                'pincode' =>
                    $validated['pincode'] ?? null,

                'landmark' =>
                    $validated['landmark'] ?? null,

                'address' =>
                    $validated['address'] ?? null,

                'google_map_url' =>
                    $validated['google_map_url'] ?? null,

                'latitude' =>
                    $validated['latitude'] ?? null,

                'longitude' =>
                    $validated['longitude'] ?? null,


                /*
                 * PROPERTY DETAILS
                 */
                'bhk' =>
                    $validated['bhk'] ?? null,

                'bathrooms' =>
                    $validated['bathrooms'] ?? null,

                'balconies' =>
                    $validated['balconies'] ?? null,

                'area_sqft' =>
                    $validated['area_sqft'] ?? null,

                'built_up_area' =>
                    $validated['built_up_area'] ?? null,

                'carpet_area' =>
                    $validated['carpet_area'] ?? null,

                'floor_number' =>
                    $validated['floor_number'] ?? null,

                'total_floors' =>
                    $validated['total_floors'] ?? null,

                'property_age' =>
                    $validated['property_age'] ?? null,

                'property_condition' =>
                    $validated['property_condition'] ?? null,

                'facing' =>
                    $validated['facing'] ?? null,

                'road_width' =>
                    $validated['road_width'] ?? null,

                'car_parking' =>
                    $validated['car_parking'] ?? null,

                'possession_status' =>
                    $validated['possession_status'] ?? null,


                /*
                 * RENTAL
                 */
                'price' =>
                    $validated['price'],

                'security_deposit' =>
                    $validated['security_deposit'] ?? null,

                'furnishing' =>
                    $validated['furnishing'],

                'available_from' =>
                    $validated['available_from'] ?? null,


                /*
                 * DESCRIPTION
                 */
                'description' =>
                    $validated['description'] ?? null,


                /*
                 * OWNER
                 */
                'owner_name' =>
                    $validated['owner_name'],

                'owner_phone' =>
                    $validated['owner_phone'],


                /*
                 * STATUS
                 */
                'status' =>
                    $validated['status'],

                'admin_remark' =>
                    $validated['admin_remark'] ?? null,
            ]);


            /*
             * UPDATE AMENITIES
             */
            $property->propertyAmenities()->sync(
                $validated['amenities'] ?? []
            );


            /*
             * ADD NEW IMAGES
             */
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


            return redirect()
                ->route('properties.all')
                ->with(
                    'success',
                    'Property updated successfully.'
                );


        } catch (\Throwable $e) {

            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Unable to update property.'
                );
        }
    }


    /**
     * Approve property.
     */
    public function approve($id)
    {
        $property = Property::findOrFail($id);

        $property->update([
            'status' => 'approved',
            'admin_remark' => null,
        ]);

        return back()->with(
            'success',
            'Property approved successfully.'
        );
    }


    /**
     * Reject property.
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'admin_remark' =>
                'nullable|string|max:1000',
        ]);

        $property = Property::findOrFail($id);

        $property->update([
            'status' => 'rejected',
            'admin_remark' =>
                $request->admin_remark,
        ]);

        return back()->with(
            'success',
            'Property rejected successfully.'
        );
    }


    /**
     * Mark property as rented.
     */
    public function markRented($id)
    {
        $property = Property::findOrFail($id);

        $property->update([
            'status' => 'rented',
        ]);

        return back()->with(
            'success',
            'Property marked as rented.'
        );
    }


    /**
     * Disable property.
     */
    public function disable($id)
    {
        $property = Property::findOrFail($id);

        $property->update([
            'status' => 'inactive',
        ]);

        return back()->with(
            'success',
            'Property disabled successfully.'
        );
    }


    /**
     * Enable property.
     */
    public function enable($id)
    {
        $property = Property::findOrFail($id);

        $property->update([
            'status' => 'approved',
        ]);

        return back()->with(
            'success',
            'Property enabled successfully.'
        );
    }


    /**
     * Delete property.
     */
    public function destroy($id)
    {
        $property = Property::with('images')
            ->findOrFail($id);


        DB::beginTransaction();

        try {

            /*
             * Delete physical image files.
             */
            foreach ($property->images as $image) {

                if (
                    $image->image_path &&
                    Storage::disk('public')->exists(
                        $image->image_path
                    )
                ) {
                    Storage::disk('public')->delete(
                        $image->image_path
                    );
                }
            }


            /*
             * Delete property.
             *
             * property_images and property_amenities
             * records are deleted through cascade.
             */
            $property->delete();


            DB::commit();


            return back()->with(
                'success',
                'Property deleted successfully.'
            );


        } catch (\Throwable $e) {

            DB::rollBack();

            return back()->with(
                'error',
                'Unable to delete property.'
            );
        }
    }


    /**
     * Delete a single property image.
     */
    public function destroyImage($imageId)
    {
        $image = PropertyImage::findOrFail($imageId);


        if (
            $image->image_path &&
            Storage::disk('public')->exists(
                $image->image_path
            )
        ) {
            Storage::disk('public')->delete(
                $image->image_path
            );
        }


        $image->delete();


        return back()->with(
            'success',
            'Property image deleted successfully.'
        );
    }
}