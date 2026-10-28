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
            ->where(function ($q) {
                $q->where('expires_at', '>', now())
                    ->orWhere(function ($legacy) {
                        $legacy->whereNull('expires_at')
                            ->where('created_at', '>', now()->subDays(60));
                    });
            })
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
            ->where(function ($q) {
                $q->where('expires_at', '>', now())
                    ->orWhere(function ($legacy) {
                        $legacy->whereNull('expires_at')
                            ->where('created_at', '>', now()->subDays(60));
                    });
            })
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
            ->where(function ($q) {
                $q->where('expires_at', '>', now())
                    ->orWhere(function ($legacy) {
                        $legacy->whereNull('expires_at')
                            ->where('created_at', '>', now()->subDays(60));
                    });
            })
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Count all approved properties for each broker
        |--------------------------------------------------------------------------
        */


        $brokerPropertyCounts = Property::where('status', 'approved')
            ->whereNotNull('broker_id')
            ->where(function ($q) {
                $q->where('expires_at', '>', now())
                    ->orWhere(function ($legacy) {
                        $legacy->whereNull('expires_at')
                            ->where('created_at', '>', now()->subDays(60));
                    });
            })
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
            ->whereIn('listing_for', ['Rent', 'PG', 'Lease'])
            ->where(function ($q) {
                $q->where('expires_at', '>', now())
                    ->orWhere(function ($legacy) {
                        $legacy->whereNull('expires_at')
                            ->where('created_at', '>', now()->subDays(60));
                    });
            });


        // Locality filter
        if ($request->filled('locality')) {
            $locality = trim($request->query('locality'));

            $query->whereRaw(
                'LOWER(TRIM(locality)) LIKE LOWER(?)',
                ['%' . $locality . '%']
            );
        }

        // Location filter
        elseif ($request->filled('location')) {
            $location = trim($request->query('location'));

            $query->where(function ($q) use ($location) {
                $q->where('locality', 'LIKE', '%' . $location . '%')
                    ->orWhereHas('cityRelation', function ($cityQuery) use ($location) {
                        $cityQuery->where('name', 'LIKE', '%' . $location . '%');
                    });
            });
        }

        // Property type filter
        if ($request->filled('type')) {
            $query->where('property_type', $request->query('type'));
        }

        // BHK filter
        if ($request->filled('bhk')) {
            $bhk = (int) $request->query('bhk');

            if ($bhk >= 4) {
                $query->whereRaw(
                    "CAST(SUBSTRING_INDEX(bhk, ' ', 1) AS UNSIGNED) >= ?",
                    [4]
                );
            } elseif ($bhk > 0) {
                $query->whereRaw(
                    "CAST(SUBSTRING_INDEX(bhk, ' ', 1) AS UNSIGNED) = ?",
                    [$bhk]
                );
            }
        }

        // Minimum rent
        if ($request->filled('min_rent')) {
            $minRent = (float) $request->query('min_rent');

            if ($minRent >= 0) {
                $query->where('price', '>=', $minRent);
            }
        }

        // Maximum rent
        if ($request->filled('max_rent')) {
            $maxRent = (float) $request->query('max_rent');

            if ($maxRent >= 0) {
                $query->where('price', '<=', $maxRent);
            }
        }

        $properties = $query->latest()->get();

        return view('website.rent', compact('properties'))
            ->with('listingMode', 'rent');
    }


    public function sell(Request $request)
    {


        $query = Property::with([
            'images',
            'user',
            'propertyAmenities',
            'cityRelation'
        ])
            ->where('status', 'approved')
            ->whereRaw("LOWER(TRIM(listing_for)) = ?", ['sell'])
            ->where(function ($q) {
                $q->where('expires_at', '>', now())
                    ->orWhere(function ($legacy) {
                        $legacy->whereNull('expires_at')
                            ->where('created_at', '>', now()->subDays(60));
                    });
            });



        // Locality filter
        if ($request->filled('locality')) {
            $locality = trim($request->query('locality'));

            $query->whereRaw(
                'LOWER(TRIM(locality)) LIKE LOWER(?)',
                ['%' . $locality . '%']
            );
        }

        // Location filter
        elseif ($request->filled('location')) {
            $location = trim($request->query('location'));

            $query->where(function ($q) use ($location) {
                $q->where('locality', 'LIKE', '%' . $location . '%')
                    ->orWhereHas('cityRelation', function ($cityQuery) use ($location) {
                        $cityQuery->where('name', 'LIKE', '%' . $location . '%');
                    });
            });
        }

        // Property type filter
        if ($request->filled('type')) {
            $query->where('property_type', $request->query('type'));
        }

        // BHK filter
        if ($request->filled('bhk')) {
            $bhk = (int) $request->query('bhk');

            if ($bhk >= 4) {
                $query->whereRaw(
                    "CAST(SUBSTRING_INDEX(bhk, ' ', 1) AS UNSIGNED) >= ?",
                    [4]
                );
            } elseif ($bhk > 0) {
                $query->whereRaw(
                    "CAST(SUBSTRING_INDEX(bhk, ' ', 1) AS UNSIGNED) = ?",
                    [$bhk]
                );
            }
        }

        // Minimum sale price
        if ($request->filled('min_price')) {
            $minPrice = (float) $request->query('min_price');

            if ($minPrice >= 0) {
                $query->where('price', '>=', $minPrice);
            }
        }

        // Maximum sale price
        if ($request->filled('max_price')) {
            $maxPrice = (float) $request->query('max_price');

            if ($maxPrice >= 0) {
                $query->where('price', '<=', $maxPrice);
            }
        }

        $properties = $query->latest()->get();

        return view('website.rent', compact('properties'))
            ->with('listingMode', 'sell');
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
            ->where(function ($q) {
                $q->where('expires_at', '>', now())
                    ->orWhere(function ($legacy) {
                        $legacy->whereNull('expires_at')
                            ->where('created_at', '>', now()->subDays(60));
                    });
            })
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
            ->where(function ($q) {
                $q->where('expires_at', '>', now())
                    ->orWhere(function ($legacy) {
                        $legacy->whereNull('expires_at')
                            ->where('created_at', '>', now()->subDays(60));
                    });
            })
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
                'Lease'
            ])
            ->where(function ($q) {
                $q->where('expires_at', '>', now())
                    ->orWhere(function ($legacy) {
                        $legacy->whereNull('expires_at')
                            ->where('created_at', '>', now()->subDays(60));
                    });
            })
            ->latest()

            ->get();

        return view('website.rent', [
            'properties' => $properties,
            'selectedCityModel' => $city,
            'listingMode' => 'rent',
        ]);
    }



    public function sellByCity($citySlug)
    {
        $city = City::where('slug', $citySlug)
            ->where('status', true)
            ->first();

        if (!$city) {
            return redirect()->route('sell');
        }

        $properties = Property::with([
            'images',
            'user',
            'propertyAmenities',
            'cityRelation'
        ])

            ->where('status', 'approved')
            ->where('city_id', $city->id)
            ->whereRaw(
                'LOWER(TRIM(listing_for)) = ?',
                ['sell']
            )
            ->where(function ($q) {
                $q->where('expires_at', '>', now())
                    ->orWhere(function ($legacy) {
                        $legacy->whereNull('expires_at')
                            ->where('created_at', '>', now()->subDays(60));
                    });
            })
            ->latest()

            ->get();



        return view('website.rent', [
            'properties' => $properties,
            'selectedCityModel' => $city,
            'listingMode' => 'sell',
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




    public function subscription()
    {
        return view('website.subscription');
    }





}
