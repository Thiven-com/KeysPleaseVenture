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

    public function rent()
    {
        $properties = Property::with([
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
            ])
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
