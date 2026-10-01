<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.website', function ($view) {

            // ACTIVE CITIES
            $cities = City::where('status', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get();

            // APPROVED RENT PROPERTIES
            $rentMenuProperties = Property::with('cityRelation')
                ->where('status', 'approved')
                ->whereIn('listing_for', [
                    'Rent',
                    'PG',
                    'Sell',
                    'Lease'
                ])
                ->get([
                    'property_type',
                    'locality',
                    'bhk',
                    'city_id'
                ]);

            // PROPERTY TYPES - MAX 5
            $rentMenuTypes = PropertyType::where('status', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->pluck('name')
                ->take(5);


            $rentMenuAreas = $rentMenuProperties
                ->filter(function ($property) {
                    return $property->locality &&
                        $property->cityRelation;
                })
                ->groupBy(function ($property) {
                    return $property->cityRelation->id . '|' . trim($property->locality);
                })
                ->map(function ($properties) {
                    $property = $properties->first();

                    return [
                        'city' => $property->cityRelation->name,
                        'locality' => trim($property->locality),
                        'count' => $properties->count(),
                    ];
                })
                ->sortByDesc('count')
                ->take(5)
                ->values();


            $rentMenuBhks = $rentMenuProperties
                ->pluck('bhk')
                ->filter()
                ->map(function ($bhk) {

                    preg_match('/\d+/', $bhk, $match);

                    return isset($match[0])
                        ? (int) $match[0]
                        : null;
                })
                ->filter()
                ->unique()
                ->sort()
                ->values()
                ->take(5);

            $view->with([
                'cities' => $cities,
                'rentMenuTypes' => $rentMenuTypes,
                'rentMenuAreas' => $rentMenuAreas,
                'rentMenuBhks' => $rentMenuBhks,
            ]);
        });



        View::composer('website.home', function ($view) {

            $searchLocations = Property::where('status', 'approved')
                ->whereIn('listing_for', [
                    'Rent',
                    'PG',
                    'Sell',
                    'Lease'
                ])
                ->whereNotNull('locality')
                ->where('locality', '!=', '')
                ->pluck('locality')
                ->map(function ($location) {
                    return trim($location);
                })
                ->unique()
                ->sort()
                ->values()
                ->take(10);


            $searchPropertyTypes = PropertyType::where('status', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->pluck('name')
                ->take(10);

            $searchBhks = Property::where('status', 'approved')
                ->whereIn('listing_for', [
                    'Rent',
                    'PG',
                    'Sell',
                    'Lease'
                ])
                ->whereNotNull('bhk')
                ->where('bhk', '!=', '')
                ->pluck('bhk')
                ->map(function ($bhk) {
                    preg_match('/\d+/', $bhk, $match);

                    return isset($match[0]) ? (int) $match[0] : null;
                })
                ->filter()
                ->unique()
                ->sort()
                ->values()
                ->take(10);

            $searchRentRanges = Property::where('status', 'approved')
                ->whereIn('listing_for', [
                    'Rent',
                    'PG',
                    'Sell',
                    'Lease'
                ])
                ->whereNotNull('price')
                ->where('price', '>', 0)
                ->pluck('price')
                ->map(function ($price) {
                    return (float) $price;
                })
                ->sort()
                ->values();

            $view->with([
                'searchLocations' => $searchLocations,
                'searchPropertyTypes' => $searchPropertyTypes,
                'searchBhks' => $searchBhks,
                'searchRentRanges' => $searchRentRanges,
            ]);
        });
    }
}