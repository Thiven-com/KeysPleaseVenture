<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Generate a unique property slug.
     */
    private function generateUniqueSlug(string $title, ?int $propertyId = null): string
    {
        $baseSlug = Str::slug($title);

        // Fallback in case title contains no usable characters
        if (empty($baseSlug)) {
            $baseSlug = 'property';
        }

        $slug = $baseSlug;
        $count = 1;

        while (
            Property::where('slug', $slug)
                ->when(
                    $propertyId,
                    function ($query) use ($propertyId) {
                        $query->where('id', '!=', $propertyId);
                    }
                )
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    /**
     * Display all properties.
     */
    public function index()
    {
        $properties = Property::with([
            'images',
            'user',
            'broker',
            'propertyAmenities',
            'cityRelation'
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
        $propertyTypes = PropertyType::where('status', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $cities = City::where('status', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $amenities = Amenity::where('status', 'active')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view(
            'admin.properties.create',
            compact(
                'amenities',
                'cities',
                'propertyTypes'
            )
        );
    }

    /**
     * Store property created directly by Admin.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            // BASIC PROPERTY INFORMATION

            'property_title' => [
                'required',
                'string',
                'max:255'
            ],

            'property_type' => [
                'required',
                'exists:property_types,name'
            ],

            'listing_for' => [
                'required',
                'in:Rent,Lease,PG,Sell'
            ],

            'tenant_preference' => [
                'required',
                'in:Family,Bachelor,Both'
            ],

            // LOCATION

            'country' => 'nullable|string|max:100',

            'state' => 'nullable|string|max:100',

            'district' => 'nullable|string|max:100',

            'city_id' => 'required|exists:cities,id',

            'locality' => 'required|string|max:255',

            'pincode' => 'nullable|string|max:10',

            'landmark' => 'nullable|string|max:255',

            'address' => 'nullable|string',

            'google_map_url' => 'nullable|url|max:2048',

            'latitude' => 'nullable|numeric|between:-90,90',

            'longitude' => 'nullable|numeric|between:-180,180',

            // PROPERTY DETAILS

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

            // RENTAL DETAILS

            'price' => 'required|numeric|min:0',

            'security_deposit' => 'nullable|numeric|min:0',

            'furnishing' => 'required|string|max:100',

            'available_from' => 'nullable|date',

            // DESCRIPTION

            'description' => 'nullable|string',

            // AMENITIES

            'amenities' => 'nullable|array',

            'amenities.*' => [
                'integer',
                'exists:amenities,id'
            ],

            // OWNER

            'owner_name' => 'required|string|max:255',

            'owner_phone' => 'required|string|max:20',

            // PROPERTY PHOTOS

            'photos' => 'nullable|array|max:10',

            'photos.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120'
            ],
        ]);

        DB::beginTransaction();

        try {

            /*
             * Admin-created property.
             *
             * user_id = currently logged-in admin
             * broker_id = NULL
             */
            $property = new Property();

            $property->user_id = auth()->id();
            $property->broker_id = null;

            // BASIC

            $property->listing_for = $validated['listing_for'];
            $property->tenant_preference = $validated['tenant_preference'];
            $property->property_title = $validated['property_title'];
            $property->property_type = $validated['property_type'];

            // SLUG

            $property->slug = $this->generateUniqueSlug(
                $validated['property_title']
            );

            // LOCATION

            $property->country = $validated['country'] ?? null;
            $property->state = $validated['state'] ?? null;
            $property->district = $validated['district'] ?? null;
            $property->city_id = $validated['city_id'];
            $property->locality = $validated['locality'];
            $property->pincode = $validated['pincode'] ?? null;
            $property->landmark = $validated['landmark'] ?? null;
            $property->address = $validated['address'] ?? null;
            $property->google_map_url = $validated['google_map_url'] ?? null;
            $property->latitude = $validated['latitude'] ?? null;
            $property->longitude = $validated['longitude'] ?? null;

            // PROPERTY DETAILS

            $property->bhk = $validated['bhk'] ?? null;
            $property->bathrooms = $validated['bathrooms'] ?? null;
            $property->balconies = $validated['balconies'] ?? null;
            $property->area_sqft = $validated['area_sqft'] ?? null;
            $property->built_up_area = $validated['built_up_area'] ?? null;
            $property->carpet_area = $validated['carpet_area'] ?? null;
            $property->floor_number = $validated['floor_number'] ?? null;
            $property->total_floors = $validated['total_floors'] ?? null;
            $property->property_age = $validated['property_age'] ?? null;
            $property->property_condition = $validated['property_condition'] ?? null;
            $property->facing = $validated['facing'] ?? null;
            $property->road_width = $validated['road_width'] ?? null;
            $property->car_parking = $validated['car_parking'] ?? null;
            $property->possession_status = $validated['possession_status'] ?? null;

            // RENTAL

            $property->price = $validated['price'];
            $property->security_deposit = $validated['security_deposit'] ?? null;
            $property->furnishing = $validated['furnishing'];
            $property->available_from = $validated['available_from'] ?? null;

            // DESCRIPTION

            $property->description = $validated['description'] ?? null;

            // OWNER

            $property->owner_name = $validated['owner_name'];
            $property->owner_phone = $validated['owner_phone'];

            // ADMIN STATUS

            $property->status = 'approved';
            $property->admin_remark = 'Property posted by admin.';

            $property->save();

            // SAVE AMENITIES

            $property->propertyAmenities()->sync(
                $validated['amenities'] ?? []
            );

            // SAVE PROPERTY IMAGES

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
            'broker',
            'propertyAmenities',
            'cityRelation'
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
            'propertyAmenities',
            'broker',
            'cityRelation'
        ])
            ->findOrFail($id);

        // Load active property types

        $propertyTypes = PropertyType::where('status', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        // Load active amenities

        $amenities = Amenity::where('status', 'active')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        // Load active cities

        $cities = City::where('status', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view(
            'admin.properties.edit',
            compact(
                'property',
                'amenities',
                'cities',
                'propertyTypes'
            )
        );
    }

    /**
     * Update property.
     */
    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $validated = $request->validate([

            // BASIC

            'property_title' => [
                'required',
                'string',
                'max:255'
            ],

            'property_type' => [
                'required',
                'exists:property_types,name'
            ],

            'listing_for' => [
                'required',
                'in:Rent,Lease,PG,Sell'
            ],

            'tenant_preference' => [
                'required',
                'in:Family,Bachelor,Both'
            ],

            // LOCATION

            'country' => 'nullable|string|max:100',

            'state' => 'nullable|string|max:100',

            'district' => 'nullable|string|max:100',

            'city_id' => 'required|exists:cities,id',

            'locality' => 'required|string|max:255',

            'pincode' => 'nullable|string|max:10',

            'landmark' => 'nullable|string|max:255',

            'address' => 'nullable|string',

            'google_map_url' => 'nullable|url|max:2048',

            'latitude' => 'nullable|numeric|between:-90,90',

            'longitude' => 'nullable|numeric|between:-180,180',

            // PROPERTY DETAILS

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

            // RENTAL

            'price' => 'required|numeric|min:0',

            'security_deposit' => 'nullable|numeric|min:0',

            'furnishing' => 'required|string|max:100',

            'available_from' => 'nullable|date',

            // DESCRIPTION

            'description' => 'nullable|string',

            // AMENITIES

            'amenities' => 'nullable|array',

            'amenities.*' => [
                'integer',
                'exists:amenities,id'
            ],

            // OWNER

            'owner_name' => 'required|string|max:255',

            'owner_phone' => 'required|string|max:20',

            // STATUS

            'status' => [
                'required',
                'in:pending,approved,rejected,rented,inactive'
            ],

            'admin_remark' => 'nullable|string|max:1000',

            // PHOTOS

            'photos' => 'nullable|array|max:10',

            'photos.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120'
            ],
        ]);

        DB::beginTransaction();

        try {

            /*
             * Generate slug only if the existing property
             * does not already have one.
             *
             * This prevents changing existing URLs.
             */
            if (empty($property->slug)) {

                $property->slug = $this->generateUniqueSlug(
                    $validated['property_title'],
                    $property->id
                );
            }

            $property->update([

                // BASIC

                'property_title' => $validated['property_title'],

                'property_type' => $validated['property_type'],

                'listing_for' => $validated['listing_for'],

                'tenant_preference' => $validated['tenant_preference'],

                // LOCATION

                'country' => $validated['country'] ?? null,

                'state' => $validated['state'] ?? null,

                'district' => $validated['district'] ?? null,

                'city_id' => $validated['city_id'],

                'locality' => $validated['locality'],

                'pincode' => $validated['pincode'] ?? null,

                'landmark' => $validated['landmark'] ?? null,

                'address' => $validated['address'] ?? null,

                'google_map_url' => $validated['google_map_url'] ?? null,

                'latitude' => $validated['latitude'] ?? null,

                'longitude' => $validated['longitude'] ?? null,

                // PROPERTY DETAILS

                'bhk' => $validated['bhk'] ?? null,

                'bathrooms' => $validated['bathrooms'] ?? null,

                'balconies' => $validated['balconies'] ?? null,

                'area_sqft' => $validated['area_sqft'] ?? null,

                'built_up_area' => $validated['built_up_area'] ?? null,

                'carpet_area' => $validated['carpet_area'] ?? null,

                'floor_number' => $validated['floor_number'] ?? null,

                'total_floors' => $validated['total_floors'] ?? null,

                'property_age' => $validated['property_age'] ?? null,

                'property_condition' => $validated['property_condition'] ?? null,

                'facing' => $validated['facing'] ?? null,

                'road_width' => $validated['road_width'] ?? null,

                'car_parking' => $validated['car_parking'] ?? null,

                'possession_status' => $validated['possession_status'] ?? null,

                // RENTAL

                'price' => $validated['price'],

                'security_deposit' => $validated['security_deposit'] ?? null,

                'furnishing' => $validated['furnishing'],

                'available_from' => $validated['available_from'] ?? null,

                // DESCRIPTION

                'description' => $validated['description'] ?? null,

                // OWNER

                'owner_name' => $validated['owner_name'],

                'owner_phone' => $validated['owner_phone'],

                // STATUS

                'status' => $validated['status'],

                'admin_remark' => $validated['admin_remark'] ?? null,

            ]);

            /*
             * Save slug if it was generated above.
             */
            if (!empty($property->slug)) {
                $property->save();
            }

            // UPDATE AMENITIES

            $property->propertyAmenities()->sync(
                $validated['amenities'] ?? []
            );

            // ADD NEW IMAGES

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
                    'Unable to update property: ' . $e->getMessage()
                );
        }
    }

    /**
     * Approve property.
     */
    public function approve($id)
    {
        $property = Property::findOrFail($id);

        DB::beginTransaction();

        try {

            // Generate slug if missing

            if (empty($property->slug)) {

                $property->slug = $this->generateUniqueSlug(
                    $property->property_title,
                    $property->id
                );
            }

            $property->status = 'approved';
            $property->admin_remark = null;

            $property->save();

            DB::commit();

            return back()->with(
                'success',
                'Property approved successfully.'
            );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()->with(
                'error',
                'Unable to approve property: ' . $e->getMessage()
            );
        }
    }

    /**
     * Reject property.
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'admin_remark' => 'nullable|string|max:1000',
        ]);

        $property = Property::findOrFail($id);

        $property->update([
            'status' => 'rejected',
            'admin_remark' => $request->admin_remark,
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

        DB::beginTransaction();

        try {

            // Generate slug if missing

            if (empty($property->slug)) {

                $property->slug = $this->generateUniqueSlug(
                    $property->property_title,
                    $property->id
                );
            }

            $property->status = 'approved';

            $property->save();

            DB::commit();

            return back()->with(
                'success',
                'Property enabled successfully.'
            );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()->with(
                'error',
                'Unable to enable property: ' . $e->getMessage()
            );
        }
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

            // Delete physical image files

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

            // Delete property

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