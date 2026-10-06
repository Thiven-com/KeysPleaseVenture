<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\City;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrokerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Broker Properties
    |--------------------------------------------------------------------------
    */

    public function properties()
    {
        $broker = auth('broker')->user();

        $properties = Property::with([
            'images',
            'cityRelation'
        ])
            ->where('broker_id', $broker->id)
            ->latest()
            ->get();

        return view(
            'broker.myproperties.all',
            compact('properties')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Create Property
    |--------------------------------------------------------------------------
    */

    public function createProperty()
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
            'broker.myproperties.create',
            compact(
                'propertyTypes',
                'cities',
                'amenities'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Store Property
    |--------------------------------------------------------------------------
    */

    public function storeProperty(Request $request)
    {
        $broker = auth('broker')->user();

        $validated = $request->validate([

            'property_title' => 'required|string|max:255',

            'property_type' => 'required|string|max:255',

            'listing_for' => 'required|in:Rent,Lease,PG,Sell',

            /*
            |--------------------------------------------------------------------------
            | Tenant Preference
            |--------------------------------------------------------------------------
            */

            'tenant_preference' => 'required|in:Family,Bachelor,Both',

            /*
            |--------------------------------------------------------------------------
            | Location
            |--------------------------------------------------------------------------
            */

            'country' => 'nullable|string|max:100',

            'state' => 'nullable|string|max:100',

            'district' => 'nullable|string|max:100',

            'city_id' => 'required|exists:cities,id',

            'locality' => 'required|string|max:255',

            'pincode' => 'nullable|string|max:20',

            'landmark' => 'nullable|string|max:255',

            'address' => 'nullable|string',

            'google_map_url' => 'nullable|url|max:500',

            'latitude' => 'nullable|numeric',

            'longitude' => 'nullable|numeric',

            /*
            |--------------------------------------------------------------------------
            | Property Details
            |--------------------------------------------------------------------------
            */

            'bhk' => 'nullable|string|max:50',

            'bathrooms' => 'nullable|string|max:50',

            'balconies' => 'nullable|string|max:50',

            'area_sqft' => 'nullable|numeric|min:0',

            'built_up_area' => 'nullable|numeric|min:0',

            'carpet_area' => 'nullable|numeric|min:0',

            'floor_number' => 'nullable|string|max:50',

            'total_floors' => 'nullable|string|max:50',

            'property_age' => 'nullable|string|max:100',

            'property_condition' => 'nullable|string|max:100',

            'facing' => 'nullable|string|max:100',

            'road_width' => 'nullable|numeric|min:0',

            'car_parking' => 'nullable|string|max:100',

            'possession_status' => 'nullable|string|max:100',

            /*
            |--------------------------------------------------------------------------
            | Pricing
            |--------------------------------------------------------------------------
            */

            'price' => 'required|numeric|min:0',

            'security_deposit' => 'nullable|numeric|min:0',

            'furnishing' => 'nullable|string|max:100',

            'available_from' => 'nullable|date',

            /*
            |--------------------------------------------------------------------------
            | Description
            |--------------------------------------------------------------------------
            */

            'description' => 'nullable|string',

            /*
            |--------------------------------------------------------------------------
            | Amenities
            |--------------------------------------------------------------------------
            */

            'amenities' => 'nullable|array',

            'amenities.*' => 'exists:amenities,id',

            /*
            |--------------------------------------------------------------------------
            | Owner
            |--------------------------------------------------------------------------
            */

            'owner_name' => 'required|string|max:255',

            'owner_phone' => 'required|string|max:20',

            /*
            |--------------------------------------------------------------------------
            | Photos
            |--------------------------------------------------------------------------
            */

            'photos' => 'nullable|array|max:10',

            'photos.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create Property
        |--------------------------------------------------------------------------
        */

        $property = new Property();

        /*
        |--------------------------------------------------------------------------
        | Broker Information
        |--------------------------------------------------------------------------
        */

        $property->broker_id = $broker->id;

        $property->user_id = null;

        /*
        |--------------------------------------------------------------------------
        | Basic Information
        |--------------------------------------------------------------------------
        */

        $property->property_title = $validated['property_title'];

        $property->property_type = $validated['property_type'];

        $property->listing_for = $validated['listing_for'];

        $property->tenant_preference = $validated['tenant_preference'];

        /*
        |--------------------------------------------------------------------------
        | Generate Unique Slug
        |--------------------------------------------------------------------------
        */

        $baseSlug = Str::slug($validated['property_title']);

        $slug = $baseSlug;

        $count = 1;

        while (Property::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        $property->slug = $slug;

        /*
        |--------------------------------------------------------------------------
        | Location
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | Property Details
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | Pricing
        |--------------------------------------------------------------------------
        */

        $property->price = $validated['price'];

        $property->security_deposit = $validated['security_deposit'] ?? null;

        $property->furnishing = $validated['furnishing'] ?? null;

        $property->available_from = $validated['available_from'] ?? null;

        /*
        |--------------------------------------------------------------------------
        | Description
        |--------------------------------------------------------------------------
        */

        $property->description = $validated['description'] ?? null;

        /*
        |--------------------------------------------------------------------------
        | Owner
        |--------------------------------------------------------------------------
        */

        $property->owner_name = $validated['owner_name'];

        $property->owner_phone = $validated['owner_phone'];

        /*
        |--------------------------------------------------------------------------
        | Broker Properties Require Admin Approval
        |--------------------------------------------------------------------------
        */

        $property->status = 'pending';

        $property->admin_remark = null;

        $property->save();

        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        $property->propertyAmenities()->sync(
            $validated['amenities'] ?? []
        );

        /*
        |--------------------------------------------------------------------------
        | Property Images
        |--------------------------------------------------------------------------
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

        return redirect()
            ->route('broker.properties')
            ->with(
                'success',
                'Property submitted successfully. It is now waiting for admin approval.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Property
    |--------------------------------------------------------------------------
    */

    public function editProperty($id)
    {
        $broker = auth('broker')->user();

        $property = Property::with([
            'images',
            'propertyAmenities',
            'cityRelation'
        ])
            ->where('id', $id)
            ->where('broker_id', $broker->id)
            ->firstOrFail();

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
            'broker.myproperties.edit',
            compact(
                'property',
                'propertyTypes',
                'cities',
                'amenities'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Update Property
    |--------------------------------------------------------------------------
    */

    public function updateProperty(Request $request, $id)
    {
        $broker = auth('broker')->user();

        $property = Property::where('id', $id)
            ->where('broker_id', $broker->id)
            ->firstOrFail();

        $validated = $request->validate([

            'property_title' =>
                'required|string|max:255',

            'property_type' =>
                'required|string|max:255',

            'listing_for' =>
                'required|in:Rent,Lease,PG,Sell',

            'tenant_preference' =>
                'required|in:Family,Bachelor,Both',

            'bhk' =>
                'nullable|string|max:50',

            'locality' =>
                'nullable|string|max:255',

            'city' =>
                'nullable|string|max:100',

            'price' =>
                'required|numeric|min:0',

            'area' =>
                'nullable|string|max:100',

            'description' =>
                'nullable|string',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Basic Information
        |--------------------------------------------------------------------------
        */

        $property->property_title =
            $validated['property_title'];

        $property->property_type =
            $validated['property_type'];

        $property->listing_for =
            $validated['listing_for'];

        $property->tenant_preference =
            $validated['tenant_preference'];

        /*
        |--------------------------------------------------------------------------
        | Keep / Generate Slug
        |--------------------------------------------------------------------------
        */

        if (empty($property->slug)) {

            $baseSlug = Str::slug(
                $validated['property_title']
            );

            $slug = $baseSlug;

            $count = 1;

            while (
                Property::where('slug', $slug)
                    ->where('id', '!=', $property->id)
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . $count;
                $count++;
            }

            $property->slug = $slug;
        }

        /*
        |--------------------------------------------------------------------------
        | Existing Fields
        |--------------------------------------------------------------------------
        */

        $property->bhk =
            $validated['bhk'] ?? null;

        $property->locality =
            $validated['locality'] ?? null;

        $property->price =
            $validated['price'];

        $property->description =
            $validated['description'] ?? null;

        if (array_key_exists('city', $validated)) {
            $property->city =
                $validated['city'];
        }

        if (array_key_exists('area', $validated)) {
            $property->area =
                $validated['area'];
        }

        $property->save();

        return redirect()
            ->route('broker.properties')
            ->with(
                'success',
                'Property updated successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Enquiries
    |--------------------------------------------------------------------------
    */

    public function enquiries()
    {
        return view('broker.enquiries');
    }

    /*
    |--------------------------------------------------------------------------
    | Schedule
    |--------------------------------------------------------------------------
    */

    public function schedule()
    {
        return view('broker.schedule');
    }

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    public function profile()
    {
        $broker = auth('broker')->user();

        return view(
            'broker.profile.all',
            compact('broker')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Profile
    |--------------------------------------------------------------------------
    */

    public function editProfile()
    {
        $broker = auth('broker')->user();

        return view(
            'broker.profile.edit',
            compact('broker')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    */

    public function settings()
    {
        return view('broker.settings');
    }

    /*
    |--------------------------------------------------------------------------
    | Update Profile
    |--------------------------------------------------------------------------
    */

    public function updateProfile(Request $request)
    {
        $broker = auth('broker')->user();

        $request->validate([

            'name' =>
                'required|string|max:255',

            'email' =>
                'required|email|max:255',

            'mobile' =>
                'nullable|string|max:20',

            'broker_type' =>
                'nullable|string|max:100',

            'agency_name' =>
                'nullable|string|max:255',

            'license_number' =>
                'nullable|string|max:255',

            'address' =>
                'nullable|string|max:1000',

            'city' =>
                'nullable|string|max:255',

            'state' =>
                'nullable|string|max:255',

            'pincode' =>
                'nullable|string|max:20',

            'profile_pic' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $broker->name =
            $request->name;

        $broker->email =
            $request->email;

        $broker->mobile =
            $request->mobile;

        $broker->broker_type =
            $request->broker_type;

        $broker->agency_name =
            $request->agency_name;

        $broker->license_number =
            $request->license_number;

        $broker->address =
            $request->address;

        $broker->city =
            $request->city;

        $broker->state =
            $request->state;

        $broker->pincode =
            $request->pincode;

        if ($request->hasFile('profile_pic')) {

            $path = $request
                ->file('profile_pic')
                ->store(
                    'brokers/profile',
                    'public'
                );

            $broker->profile_pic =
                $path;
        }

        $broker->save();

        return redirect()
            ->route('broker.profile')
            ->with(
                'success',
                'Profile updated successfully.'
            );
    }
}