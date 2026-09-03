<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display all properties.
     */
    public function index()
    {
        $properties = Property::with('images')
            ->latest()
            ->paginate(20);

        return view('admin.properties.all', compact('properties'));
    }

    /**
     * Display property details.
     */
    public function show($id)
    {
        $property = Property::with('images')
            ->findOrFail($id);

        return view('admin.properties.show', compact('property'));
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

        $property->update([
            'status' => 'approved',
        ]);

        return back()->with(
            'success',
            'Property enabled successfully.'
        );
    }
}