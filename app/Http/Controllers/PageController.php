<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\Testimonial;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\City;

class PageController extends Controller
{
    public function home()
    {
        return view('website.home');
    }

    public function about()
    {
        return view('website.about');
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function rent(Request $request)
    {
        $query = Property::with([
            'images',
            'user',
            'propertyAmenities',
            'cityRelation'
        ])
            ->where('status', 'approved')
            ->whereIn('listing_for', [
                'Rent',
                'PG',
                'Sell',
                'Lease'
            ]);

        // Location filter
        if ($request->filled('location')) {
            $location = trim($request->location);

            $query->where(function ($q) use ($location) {

                // Match locality
                $q->where('locality', 'LIKE', '%' . $location . '%')

                    // Match city
                    ->orWhereHas('cityRelation', function ($cityQuery) use ($location) {
                        $cityQuery->where('name', 'LIKE', '%' . $location . '%');
                    });

                // If URL contains "Locality, City"
                if (str_contains($location, ',')) {

                    [$locality, $city] = array_map('trim', explode(',', $location, 2));

                    $q->orWhere(function ($subQuery) use ($locality, $city) {

                        $subQuery->where('locality', 'LIKE', '%' . $locality . '%')
                            ->whereHas('cityRelation', function ($cityQuery) use ($city) {
                                $cityQuery->where('name', 'LIKE', '%' . $city . '%');
                            });
                    });
                }
            });
        }

        // Property type filter
        if ($request->filled('type')) {
            $query->where('property_type', $request->type);
        }

        // BHK filter
        if ($request->filled('bhk')) {
            $bhk = (int) $request->bhk;

            if ($bhk >= 4) {
                $query->where('bhk', 'LIKE', '4%');
            } else {
                $query->where('bhk', 'LIKE', $bhk . '%');
            }
        }

        // Rent range filter
        if ($request->filled('rent_range')) {

            switch ($request->rent_range) {

                case '0-25000':
                    $query->whereBetween('price', [0, 25000]);
                    break;

                case '25000-50000':
                    $query->whereBetween('price', [25000, 50000]);
                    break;

                case '50000-75000':
                    $query->whereBetween('price', [50000, 75000]);
                    break;

                case '75000+':
                    $query->where('price', '>=', 75000);
                    break;
            }
        }

        $properties = $query
            ->latest()
            ->get();

        return view('website.rent', compact('properties'));
    }

    public function login()
    {
        return view('website.login');
    }

    public function propertydetails($slug)
    {
        $property = Property::with([
            'images',
            'user',
            'propertyAmenities',
            'cityRelation'
        ])
            ->where('status', 'approved')
            ->where('slug', $slug)
            ->first();

        // Invalid or incomplete slug → Rent page
        if (!$property) {
            return redirect()->route('rent');
        }

        $similarProperties = Property::with([
            'images',
            'user',
            'propertyAmenities',
            'cityRelation'
        ])
            ->where('status', 'approved')
            ->where('listing_for', $property->listing_for)
            ->where('id', '!=', $property->id)
            ->latest()
            ->take(8)
            ->get();

        return view('website.propertydetails', compact(
            'property',
            'similarProperties'
        ));
    }


    public function rentByCity($citySlug)
    {
        $city = City::where('slug', $citySlug)
            ->where('status', true)
            ->first();

        if (!$city) {
            return redirect()->route('rent');
        }

        $properties = Property::with([
            'images',
            'user',
            'propertyAmenities',
            'cityRelation'
        ])
            ->where('status', 'approved')
            ->where('city_id', $city->id)
            ->whereIn('listing_for', [
                'Rent',
                'PG',
                'Sell',
                'Lease'
            ])
            ->latest()
            ->get();

        return view('website.rent', [
            'properties' => $properties,
            'selectedCityModel' => $city,
        ]);
    }
}
