<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertyTypeController extends Controller
{
    public function index()
    {
        $propertyTypes = PropertyType::orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.property-types.all', compact('propertyTypes'));
    }

    public function create()
    {
        return view('admin.property-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:property_types,name',
            'sort_order' => 'nullable|integer',
        ]);

        PropertyType::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()
            ->route('admin.property-types.index')
            ->with('success', 'Property type created successfully.');
    }

    public function edit($id)
    {
        $propertyType = PropertyType::findOrFail($id);

        return view('admin.property-types.edit', compact('propertyType'));
    }

    public function update(Request $request, $id)
    {
        $propertyType = PropertyType::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:property_types,name,' . $id,
            'sort_order' => 'nullable|integer',
        ]);

        $propertyType->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()
            ->route('admin.property-types.index')
            ->with('success', 'Property type updated successfully.');
    }

    public function destroy($id)
    {
        $propertyType = PropertyType::findOrFail($id);

        $propertyType->delete();

        return redirect()
            ->route('admin.property-types.index')
            ->with('success', 'Property type deleted successfully.');
    }
}