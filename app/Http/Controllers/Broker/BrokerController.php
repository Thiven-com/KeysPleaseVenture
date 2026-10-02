<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\City;
use App\Models\Amenity;

class BrokerController extends Controller
{
    public function properties()
    {
        $broker = auth('broker')->user();

        $properties = Property::with(['images', 'cityRelation'])
            ->where('user_id', $broker->id)
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

        $amenities = Amenity::where('status', true)
            ->orderBy('name')
            ->get();

        return view('broker.myproperties.create', compact(
            'propertyTypes',
            'cities',
            'amenities'
        ));
    }

    

    public function editProperty($id)
    {
        $broker = auth('broker')->user();

        $property = Property::with([
            'images',
            'propertyAmenities',
            'cityRelation'
        ])
            ->where('id', $id)
            ->where('user_id', $broker->id)
            ->firstOrFail();

        return view('broker.myproperties.edit', compact('property'));
    }

    public function updateProperty(Request $request, $id)
    {
        $broker = auth('broker')->user();

        $property = Property::where('id', $id)
            ->where('user_id', $broker->id)
            ->firstOrFail();

        $validated = $request->validate([
            'property_type' => 'required|string|max:255',
            'bhk' => 'nullable|string|max:50',
            'locality' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'area' => 'nullable|string|max:100',
            'description' => 'nullable|string',
        ]);

        $property->update($validated);

        return redirect()
            ->route('broker.properties')
            ->with('success', 'Property updated successfully.');
    }

    public function enquiries()
    {
        return view('broker.enquiries');
    }

    public function schedule()
    {
        return view('broker.schedule');
    }

    public function profile()
    {
        return view('broker.profile');
    }

    public function settings()
    {
        return view('broker.settings');
    }
}