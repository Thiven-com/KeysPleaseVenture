<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FurnishingFeature;
use Illuminate\Http\Request;

class FurnishingFeatureController extends Controller
{
    // Display all furnishing features
   public function index()
{
    $features = FurnishingFeature::latest()->paginate(10);

    return view('admin.furnishing-features.index', compact('features'));
}

    // Show create form
    public function create()
    {
        return view('admin.furnishing-features.create');
    }

    // Store new feature
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'furnishing_type' => 'required|in:Fully Furnished,Semi Furnished',
            'selection_type' => 'required|in:checkbox,quantity',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        FurnishingFeature::create($validated);

        return redirect()
            ->route('admin.furnishing-features.index')
            ->with('success', 'Furnishing feature added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $furnishingFeature = FurnishingFeature::findOrFail($id);

        return view(
            'admin.furnishing-features.edit',
            compact('furnishingFeature')
        );
    }

    // Update feature
    public function update(Request $request, $id)
    {
        $furnishingFeature = FurnishingFeature::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'furnishing_type' => 'required|in:Fully Furnished,Semi Furnished',
            'selection_type' => 'required|in:checkbox,quantity',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $furnishingFeature->update($validated);

        return redirect()
            ->route('admin.furnishing-features.index')
            ->with('success', 'Furnishing feature updated successfully.');
    }

    // Delete feature
    public function destroy($id)
    {
        $feature = FurnishingFeature::findOrFail($id);

        $feature->delete();

        return redirect()
            ->route('admin.furnishing-features.index')
            ->with('success', 'Furnishing feature deleted successfully.');
    }

    // Activate / Deactivate feature
    public function toggleStatus($id)
    {
        $feature = FurnishingFeature::findOrFail($id);

        $feature->update([
            'is_active' => !$feature->is_active
        ]);

        return redirect()
            ->route('admin.furnishing-features.index')
            ->with('success', 'Furnishing feature status updated successfully.');
    }
}
