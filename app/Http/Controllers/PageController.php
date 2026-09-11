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
            'propertyAmenities'
        ])
            ->where('status', 'approved')
            ->where('listing_for', 'Rent')
            ->latest()
            ->get();

        return view('website.rent', compact('properties'));
    }

    public function login()
    {
        return view('website.login');
    }

    public function propertydetails(Request $request)
    {
        $propertyId = $request->query('property');

        if (!$propertyId) {
            abort(404);
        }

        $property = Property::with([
            'images',
            'user',
            'propertyAmenities'
        ])
            ->where('status', 'approved')
            ->where('id', $propertyId)
            ->firstOrFail();

        $similarProperties = Property::with([
            'images',
            'user',
            'propertyAmenities'
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
}
