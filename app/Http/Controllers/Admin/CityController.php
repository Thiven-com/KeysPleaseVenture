<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.cities.all', compact('cities'));
    }

    public function create()
    {
        $icons = config('city_icons');

        return view('admin.cities.create', compact('icons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string',
            'sort_order' => 'nullable|integer',
        ]);

        City::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'icon' => $request->icon,
            'is_popular' => $request->boolean('is_popular'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()
            ->route('admin.cities.index')
            ->with('success', 'City created successfully.');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);

        $icons = config('city_icons');

        return view('admin.cities.edit', compact('city', 'icons'));
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string',
            'sort_order' => 'nullable|integer',
        ]);

        $city->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'icon' => $request->icon,
            'is_popular' => $request->boolean('is_popular'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()
            ->route('admin.cities.all')
            ->with('success', 'City updated successfully.');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);

        $city->delete();

        return redirect()
            ->route('admin.cities.index')
            ->with('success', 'City deleted successfully.');
    }
}