<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::orderBy('sort_order')
            ->orderBy('name')
            ->paginate(20);

        return view('admin.amenities.all', compact('amenities'));
    }

    public function create()
    {
        return view('admin.amenities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        Amenity::create([
            'name' => $validated['name'],
            'icon' => $validated['icon'] ?? null,
            'category' => $validated['category'] ?? null,
            'status' => $validated['status'],
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()
            ->route('admin.amenities.index')
            ->with('success', 'Amenity added successfully.');
    }

    public function edit($id)
    {
        $amenity = Amenity::findOrFail($id);

        return view('admin.amenities.edit', compact('amenity'));
    }

    public function update(Request $request, $id)
    {
        $amenity = Amenity::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $amenity->update([
            'name' => $validated['name'],
            'icon' => $validated['icon'] ?? null,
            'category' => $validated['category'] ?? null,
            'status' => $validated['status'],
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()
            ->route('admin.amenities.index')
            ->with('success', 'Amenity updated successfully.');
    }

    public function destroy($id)
    {
        $amenity = Amenity::findOrFail($id);

        if ($amenity->properties()->exists()) {
            return redirect()
                ->route('admin.amenities.index')
                ->with('error', 'This amenity is assigned to one or more properties and cannot be deleted.');
        }

        $amenity->delete();

        return redirect()
            ->route('admin.amenities.index')
            ->with('success', 'Amenity deleted successfully.');
    }


    public function toggleStatus($id)
    {
        $amenity = Amenity::findOrFail($id);

        $amenity->status = $amenity->status === 'active'
            ? 'inactive'
            : 'active';

        $amenity->save();

        return redirect()
            ->route('admin.amenities.index')
            ->with('success', 'Amenity status updated successfully.');
    }


}