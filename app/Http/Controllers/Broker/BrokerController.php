<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\RentalRequirmentsEnquiry;
use App\Models\ScheduleVisitEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrokerController extends Controller
{
    public function properties()
    {
        $broker = auth('broker')->user();

        $properties = Property::with(['images', 'cityRelation'])
            ->where('broker_id', $broker->id)
            ->latest()
            ->get();

        return view('broker.myproperties.all', compact('properties'));
    }

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

        return view('broker.myproperties.create', compact(
            'propertyTypes',
            'cities',
            'amenities'
        ));
    }

    public function storeProperty(Request $request)
    {
        $broker = auth('broker')->user();

        $validated = $request->validate([
            'property_title' => 'required|string|max:255',
            'property_type' => 'required|string|max:255',
            'listing_for' => 'required|in:Rent,Lease,PG,Sell',
            'tenant_preference' => 'required_unless:listing_for,Sell|nullable|in:Family,Bachelor,Both',

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

            'price' => 'required|numeric|min:0',
            'security_deposit' => 'nullable|numeric|min:0',
            'furnishing' => 'nullable|string|max:100',
            'available_from' => 'nullable|date',

            'description' => 'nullable|string',
            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id',
            'owner_name' => 'required|string|max:255',
            'owner_phone' => 'required|string|max:20',
            'photos' => 'nullable|array|max:10',
            'photos.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $isSale = $validated['listing_for'] === 'Sell';

        $property = new Property();
        $property->broker_id = $broker->id;
        $property->user_id = null;

        $property->property_title = $validated['property_title'];
        $property->property_type = $validated['property_type'];
        $property->listing_for = $validated['listing_for'];
        $property->tenant_preference = $isSale
            ? null
            : ($validated['tenant_preference'] ?? null);

        $baseSlug = Str::slug($validated['property_title']);
        $slug = $baseSlug;
        $count = 1;

        while (Property::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }

        $property->slug = $slug;

        foreach ([
            'country', 'state', 'district', 'pincode', 'landmark',
            'address', 'google_map_url', 'latitude', 'longitude',
            'bhk', 'bathrooms', 'balconies', 'area_sqft', 'built_up_area',
            'carpet_area', 'floor_number', 'total_floors', 'property_age',
            'property_condition', 'facing', 'road_width', 'car_parking',
            'possession_status', 'description',
        ] as $field) {
            $property->{$field} = $validated[$field] ?? null;
        }

        $property->city_id = $validated['city_id'];
        $property->locality = $validated['locality'];
        $property->price = $validated['price'];
        $property->security_deposit = $isSale
            ? null
            : ($validated['security_deposit'] ?? null);
        $property->furnishing = $validated['furnishing'] ?? null;
        $property->available_from = $isSale
            ? null
            : ($validated['available_from'] ?? null);

        $property->owner_name = $validated['owner_name'];
        $property->owner_phone = $validated['owner_phone'];
        $property->status = 'pending';
        $property->admin_remark = null;
        $property->expires_at = now()->addDays(60);
        $property->save();

        $property->propertyAmenities()->sync($validated['amenities'] ?? []);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('properties', 'public');
                $property->images()->create(['image_path' => $path]);
            }
        }

        return redirect()
            ->route('broker.properties')
            ->with('success', 'Property submitted successfully. It is now waiting for admin approval.');
    }

    public function editProperty($id)
    {
        $broker = auth('broker')->user();

        $property = Property::with(['images', 'propertyAmenities', 'cityRelation'])
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

        return view('broker.myproperties.edit', compact(
            'property',
            'propertyTypes',
            'cities',
            'amenities'
        ));
    }

    public function updateProperty(Request $request, $id)
    {
        $broker = auth('broker')->user();

        $property = Property::where('id', $id)
            ->where('broker_id', $broker->id)
            ->firstOrFail();

        $validated = $request->validate([
            'property_title' => 'required|string|max:255',
            'property_type' => 'required|string|max:255',
            'listing_for' => 'required|in:Rent,Lease,PG,Sell',
            'tenant_preference' => 'required_unless:listing_for,Sell|nullable|in:Family,Bachelor,Both',

            'country' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
            'city_id' => 'nullable|exists:cities,id',
            'city' => 'nullable|string|max:100',
            'locality' => 'nullable|string|max:255',
            'pincode' => 'nullable|string|max:20',
            'landmark' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'google_map_url' => 'nullable|url|max:500',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',

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

            'price' => 'required|numeric|min:0',
            'security_deposit' => 'nullable|numeric|min:0',
            'furnishing' => 'nullable|string|max:100',
            'available_from' => 'nullable|date',
            'area' => 'nullable|string|max:100',
            'description' => 'nullable|string',

            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id',
            'owner_name' => 'nullable|string|max:255',
            'owner_phone' => 'nullable|string|max:20',
            'photos' => 'nullable|array|max:10',
            'photos.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $isSale = $validated['listing_for'] === 'Sell';

        $property->property_title = $validated['property_title'];
        $property->property_type = $validated['property_type'];
        $property->listing_for = $validated['listing_for'];
        $property->tenant_preference = $isSale
            ? null
            : ($validated['tenant_preference'] ?? null);

        if (empty($property->slug)) {
            $baseSlug = Str::slug($validated['property_title']);
            $slug = $baseSlug;
            $count = 1;

            while (Property::where('slug', $slug)
                ->where('id', '!=', $property->id)
                ->exists()) {
                $slug = $baseSlug . '-' . $count++;
            }

            $property->slug = $slug;
        }

        $propertyFields = [
            'country', 'state', 'district', 'locality', 'pincode',
            'landmark', 'address', 'google_map_url', 'latitude',
            'longitude', 'bhk', 'bathrooms', 'balconies', 'area_sqft',
            'built_up_area', 'carpet_area', 'floor_number', 'total_floors',
            'property_age', 'property_condition', 'facing', 'road_width',
            'car_parking', 'possession_status', 'furnishing', 'description',
        ];

        foreach ($propertyFields as $field) {
            if (array_key_exists($field, $validated)) {
                $property->{$field} = $validated[$field];
            }
        }

        if (array_key_exists('city_id', $validated) && $validated['city_id']) {
            $property->city_id = $validated['city_id'];
        }

        // Support the existing edit form if it submits city/area instead of city_id/area_sqft.
        if (array_key_exists('city', $validated)) {
            $property->city = $validated['city'];
        }

        if (array_key_exists('area', $validated)) {
            $property->area = $validated['area'];
        }

        $property->price = $validated['price'];
        $property->security_deposit = $isSale
            ? null
            : ($validated['security_deposit'] ?? null);
        $property->available_from = $isSale
            ? null
            : ($validated['available_from'] ?? null);

        if (array_key_exists('owner_name', $validated)) {
            $property->owner_name = $validated['owner_name'];
        }

        if (array_key_exists('owner_phone', $validated)) {
            $property->owner_phone = $validated['owner_phone'];
        }

        $property->save();

        if (array_key_exists('amenities', $validated)) {
            $property->propertyAmenities()->sync($validated['amenities'] ?? []);
        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('properties', 'public');
                $property->images()->create(['image_path' => $path]);
            }
        }

        return redirect()
            ->route('broker.properties')
            ->with('success', 'Property updated successfully.');
    }

    public function enquiries()
    {
        $broker = auth('broker')->user();

        $propertyIds = $broker->properties()->select('properties.id');

        $enquiries = RentalRequirmentsEnquiry::with('property')
            ->whereIn('property_id', $propertyIds)
            ->latest()
            ->paginate(10);

        $enquiriesCount = RentalRequirmentsEnquiry::whereIn(
            'property_id',
            $propertyIds
        )->count();

        return view('broker.enquiries', compact(
            'broker',
            'enquiries',
            'enquiriesCount'
        ));
    }

    public function schedule()
    {
        $broker = auth('broker')->user();

        $propertyIds = $broker->properties()->select('properties.id');

        $scheduledVisits = ScheduleVisitEnquiry::with('property')
            ->whereIn('property_id', $propertyIds)
            ->latest()
            ->paginate(10);

        $scheduledVisitsCount = ScheduleVisitEnquiry::whereIn(
            'property_id',
            $broker->properties()->select('properties.id')
        )->count();

        return view('broker.schedule', compact(
            'broker',
            'scheduledVisits',
            'scheduledVisitsCount'
        ));
    }

    public function profile()
    {
        $broker = auth('broker')->user();

        return view('broker.profile.all', compact('broker'));
    }

    public function editProfile()
    {
        $broker = auth('broker')->user();

        return view('broker.profile.edit', compact('broker'));
    }

    public function settings()
    {
        return view('broker.settings');
    }

    public function updateProfile(Request $request)
    {
        $broker = auth('broker')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'nullable|string|max:20',
            'broker_type' => 'nullable|string|max:100',
            'agency_name' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:255',
            'aadhaar_number' => ['nullable', 'digits:12'],
            'address' => 'nullable|string|max:1000',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'pincode' => 'nullable|string|max:20',
            'profile_pic' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $broker->name = $request->name;
        $broker->email = $request->email;
        $broker->mobile = $request->mobile;
        $broker->broker_type = $request->broker_type;
        $broker->agency_name = $request->agency_name;
        $broker->license_number = $request->license_number;
        $broker->aadhaar_number = $request->aadhaar_number;
        $broker->address = $request->address;
        $broker->city = $request->city;
        $broker->state = $request->state;
        $broker->pincode = $request->pincode;

        if ($request->hasFile('profile_pic')) {
            $path = $request->file('profile_pic')->store('brokers/profile', 'public');
            $broker->profile_pic = $path;
        }

        $broker->save();

        return redirect()
            ->route('broker.profile')
            ->with('success', 'Profile updated successfully.');
    }

    public function repostProperty($id)
    {
        $broker = auth('broker')->user();

        $property = Property::where('id', $id)
            ->where('broker_id', $broker->id)
            ->firstOrFail();

        $expiryDate = $property->expires_at
            ?? $property->created_at?->copy()->addDays(60);

        if (!$expiryDate || !$expiryDate->isPast()) {
            return redirect()
                ->route('broker.properties')
                ->with('error', 'Only expired properties can be reposted.');
        }

        $property->expires_at = now()->addDays(60);
        $property->status = 'pending';
        $property->admin_remark = null;
        $property->save();

        return redirect()
            ->route('broker.properties')
            ->with('success', 'Property reposted successfully and sent for admin approval.');
    }
}
