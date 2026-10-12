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
use App\Models\PropertyType;

class PageController extends Controller
{
    public function home()
    {
        $popularcities = City::where('is_popular', 1)
            ->where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->inRandomOrder()
            ->take(8)
            ->get();

        $popularLocalities = Property::where('status', 'approved')
            ->whereNotNull('locality')
            ->where('locality', '!=', '')
            ->selectRaw('locality, COUNT(*) as property_count')
            ->groupBy('locality')
            ->orderByDesc('property_count')
            ->take(8)
            ->get();
        $propertyTypes = PropertyType::where('status', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->take(6)
            ->get()
            ->values();

        $propertyTypeCounts = Property::where('status', 'approved')
            ->whereIn('listing_for', ['Rent', 'PG', 'Lease'])
            ->selectRaw('property_type, COUNT(*) as property_count')
            ->groupBy('property_type')
            ->pluck('property_count', 'property_type');

        /*
        |--------------------------------------------------------------------------
        | Featured Properties
        |--------------------------------------------------------------------------
        */

        $approvedProperties = Property::with([
            'images',
            'user',
            'cityRelation',
        ])
            ->where('status', 'approved')
            ->whereIn('listing_for', [
                'Rent',
                'Lease',
                'PG',
                'Sell',
            ])
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Count all approved properties for each broker
        |--------------------------------------------------------------------------
        */

        $brokerPropertyCounts = Property::where('status', 'approved')
            ->whereNotNull('broker_id')
            ->selectRaw('broker_id, COUNT(*) as property_count')
            ->groupBy('broker_id')
            ->pluck('property_count', 'broker_id');

        /*
        |--------------------------------------------------------------------------
        | Featured Keywords
        |--------------------------------------------------------------------------
        */

        $featuredKeywords = [
            'premium',
            'luxury',
            'modern',
            'spacious',
            'fully furnished',
            'furnished',
            'semi furnished',
            'prime location',
            'prime',
            'exclusive',
            'new',
            'newly built',
            'gated community',
            'gated',
            'well maintained',
            'ready to move',
            'ready to move in',
        ];

        /*
        |--------------------------------------------------------------------------
        | Calculate Featured Priority
        |--------------------------------------------------------------------------
        */

        $featuredProperties = $approvedProperties
            ->map(function ($property) use ($brokerPropertyCounts, $featuredKeywords) {
                $score = 0;

                // Broker popularity
                $score += ($brokerPropertyCounts[$property->broker_id] ?? 0) * 10;

                // Keyword priority
                $searchText = strtolower(
                    ($property->property_title ?? '') . ' ' .
                    ($property->description ?? '') . ' ' .
                    ($property->property_type ?? '') . ' ' .
                    ($property->furnishing ?? '') . ' ' .
                    ($property->locality ?? '')
                );

                foreach ($featuredKeywords as $keyword) {
                    if (str_contains($searchText, strtolower($keyword))) {
                        $score += 5;
                    }
                }

                // Property completeness
                if ($property->price) {
                    $score += 2;
                }

                if ($property->bhk !== null) {
                    $score += 2;
                }

                if ($property->bathrooms !== null) {
                    $score += 2;
                }

                if ($property->area_sqft) {
                    $score += 2;
                }

                if ($property->furnishing) {
                    $score += 2;
                }

                if ($property->images->count() > 0) {
                    $score += 3;
                }

                $property->featured_score = $score;

                return $property;
            })
            ->sortByDesc('featured_score')
            ->take(4)
            ->values();

        return view('website.home', compact(
            'popularcities',
            'popularLocalities',
            'featuredProperties',
            'propertyTypes',
            'propertyTypeCounts'
        ));
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

        /*
        |--------------------------------------------------------------------------
        | Locality Filter
        |--------------------------------------------------------------------------
        | Supports URLs such as:
        | /rent?locality=Marathahalli
        */

        if ($request->filled('locality')) {
            $locality = trim($request->query('locality'));

            $query->whereRaw(
                'LOWER(TRIM(locality)) = LOWER(?)',
                [$locality]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Location Search Filter
        |--------------------------------------------------------------------------
        | Supports searching by locality, city, or "Locality, City".
        */ elseif ($request->filled('location')) {
            $location = trim($request->query('location'));

            if (str_contains($location, ',')) {
                [$locality, $city] = array_map(
                    'trim',
                    explode(',', $location, 2)
                );

                $query->where(function ($q) use ($locality, $city, $location) {

                    $q->where(function ($subQuery) use ($locality, $city) {
                        $subQuery
                            ->where('locality', 'LIKE', '%' . $locality . '%')
                            ->whereHas('cityRelation', function ($cityQuery) use ($city) {
                                $cityQuery->where('name', 'LIKE', '%' . $city . '%');
                            });
                    })
                        ->orWhereHas('cityRelation', function ($cityQuery) use ($location) {
                            $cityQuery->where('name', 'LIKE', '%' . $location . '%');
                        });

                });
            } else {
                $query->where(function ($q) use ($location) {
                    $q->where('locality', 'LIKE', '%' . $location . '%')
                        ->orWhereHas('cityRelation', function ($cityQuery) use ($location) {
                            $cityQuery->where('name', 'LIKE', '%' . $location . '%');
                        });
                });
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Property Type Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('type')) {
            $query->where('property_type', $request->query('type'));
        }

        /*
        |--------------------------------------------------------------------------
        | BHK Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('bhk')) {
            $bhk = (int) $request->query('bhk');

            if ($bhk >= 4) {
                $query->where('bhk', '>=', 4);
            } elseif ($bhk > 0) {
                $query->where('bhk', $bhk);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Maximum Rent Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('max_rent')) {
            $maxRent = (float) $request->query('max_rent');

            if ($maxRent >= 0) {
                $query->where('price', '<=', $maxRent);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Fetch Filtered Properties
        |--------------------------------------------------------------------------
        */

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
            'broker',
            'propertyAmenities',
            'cityRelation',
        ])
            ->where('status', 'approved')
            ->where('slug', $slug)
            ->first();

        if (!$property) {
            return redirect()
                ->route('rent')
                ->with('error', 'Property not found.');
        }

        $similarProperties = Property::with([
            'images',
            'user',
            'broker',
            'propertyAmenities',
            'cityRelation',
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



    public function howItWorks()
    {
        return view('website.how-it-works');
    }

    public function faqs()
    {
        return view('website.faqs');
    }


    public function rentalGuide()
    {
        return view('website.rental-guide');
    }



    public function safetyTips()
    {
        return view('website.safety-tips');
    }


    public function enquirySupport()
    {
        return view('website.enquiry-support');
    }


    public function brokerBenefits()
    {
        return view('website.broker-benefits');
    }


    public function partnerWithUs()
    {
        return view('website.partner-with-us');
    }


    public function termsAndConditions()
    {
        return view('website.terms-and-conditions');
    }


    public function resources()
    {
        return view('website.resources');
    }


    public function privacyPolicy()
    {
        return view('website.privacy-policy');
    }








}
