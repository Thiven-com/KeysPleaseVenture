@extends('layouts.website')
@section('content')

<style>
    @media (max-width: 480px) {
    section {
        padding-top: 0px;
    }
}
</style>

    <style>
        /* Mobile search modal: hidden on desktop */
        .mobile-filter-open,
        .mobile-filter-modal {
            display: none;
        }

        @media (max-width: 767px) {
            .search-area>.search-panel {
                display: none !important;
            }

            .mobile-filter-body .search-panel {
                display: grid !important;
            }
        }

        @media (max-width: 767px) {
            .mobile-filter-open {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                width: 100%;
                min-height: 46px;
                margin-bottom: 12px;
                padding: 12px 16px;
                border: none;
                border-radius: 8px;
                background: #1724c9;
                color: #fff;
                font-size: 14px;
                font-weight: 700;
                cursor: pointer;
            }

            .mobile-filter-modal.is-open {
                display: block;
                position: fixed;
                inset: 0;
                z-index: 99999;
            }

            .mobile-filter-overlay {
                position: absolute;
                inset: 0;
                background: rgba(15, 23, 42, 0.6);
            }

            .mobile-filter-dialog {
                position: absolute;
                inset: 12px;
                display: flex;
                flex-direction: column;
                min-width: 0;
                max-width: 600px;
                margin: auto;
                max-height: calc(100dvh - 24px);
                overflow: hidden;
                background: #fff;
                border-radius: 14px;
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            }

            .mobile-filter-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                padding: 16px;
                border-bottom: 1px solid #e5e7eb;
            }

            .mobile-filter-header h2 {
                margin: 0;
                font-size: 18px;
                color: #172033;
            }

            #mobileFilterClose {
                width: 36px;
                height: 36px;
                flex-shrink: 0;
                border: none;
                border-radius: 50%;
                background: #f1f5f9;
                color: #334155;
                font-size: 18px;
                cursor: pointer;
            }

            .mobile-filter-body {
                flex: 1;
                min-height: 0;
                overflow-y: auto;
                overscroll-behavior: contain;
                padding: 16px;
            }

            /* Search panel becomes a vertical form inside the modal */
            .mobile-filter-body .search-panel {
                display: grid;
                grid-template-columns: minmax(0, 1fr);
                gap: 16px;
                width: 100%;
                max-width: 100%;
                padding: 0;
                border: none;
                box-shadow: none;
                box-sizing: border-box;
            }

            .mobile-filter-body .field,
            .mobile-filter-body .rent-range-field {
                width: 100%;
                min-width: 0;
            }

            .mobile-filter-body .control,
            .mobile-filter-body .custom-select,
            .mobile-filter-body .rent-range-container {
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
            }

            .mobile-filter-body .search-action {
                width: 100%;
                min-height: 46px;
            }

            body.mobile-filter-opened {
                overflow: hidden;
            }
        }
    </style>

    <style>
        .mobile-sort {
            display: none;
            position: relative;
            width: 100%;
            min-width: 0;
        }

        @media (max-width: 767px) {
            .sort {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                min-width: 0;
                width: 100%;
            }

            .sort>.sort-select {
                display: none;
            }

            .mobile-sort {
                display: block;
            }

            #mobileSortButton {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
                height: 42px;
                padding: 0 12px;
                border: 1px solid #cbd5e1;
                border-radius: 8px;
                background: #fff;
                color: #334155;
                font-size: 13px;
                box-sizing: border-box;
            }

            .mobile-sort-options {
                /* position: absolute;
                        top: calc(100% + 4px);
                        left: 0;
                        right: 0;
                        z-index: 999; */
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
                overflow: hidden;
                border: 1px solid #dce2ed;
                border-radius: 8px;
                background: #fff;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
            }

            .mobile-sort-options[hidden] {
                display: none;
            }

            .mobile-sort-options button {
                display: block;
                width: 100%;
                padding: 12px;
                border: 0;
                background: #fff;
                color: #172554;
                text-align: left;
                font-size: 13px;
                white-space: normal;
            }

            .mobile-sort-options button:active {
                background: #eef2ff;
            }

            .sort .view-toggle {
                display: none !important;
            }
        }
    </style>

    <style>
        /* Property Card Image Gallery */
        .result-card .gallery {
            position: relative;
            width: 100%;
            height: 220px;
            overflow: hidden;
            border-radius: 12px;
            flex-shrink: 0;
        }

        /* Fixed image dimensions */
        .result-card .gallery img.main {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: 12px;
        }

        /* Photo count */
        .result-card .gallery .photo-count {
            position: absolute;
            right: 12px;
            bottom: 12px;
            z-index: 2;
        }

        /* New badge */
        .result-card .gallery .featured {
            position: absolute;
            top: 12px;
            left: 12px;
            z-index: 2;
        }

        /* Responsive image height */
        @media (max-width: 768px) {
            .result-card .gallery {
                height: 200px;
            }
        }

        @media (max-width: 480px) {
            .result-card .gallery {
                height: 180px;
            }
        }
    </style>

    <style>
        /* Rent range matches the existing search controls */
        .search-panel {
            grid-template-columns: 1.7fr 1.15fr 0.72fr 1.35fr 0.85fr;
            align-items: end;
        }

        .rent-range-field {
            min-width: 0;
        }

        .rent-range-field>label {
            margin-bottom: 7px;
            font-size: 12px;
            font-weight: 700;
            color: #30384e;
        }

        .rent-range-container {
            height: 44px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px;
            background: #fff;
            border: 1px solid #d5dbe7;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .rent-range-values {
            display: flex;
            flex-direction: column;
            gap: 2px;
            flex: 0 0 auto;
        }

        .rent-price-box {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .rent-price-box span {
            display: none;
        }

        .rent-price-box strong {
            color: #30384e;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .rent-slider {
            position: relative;
            height: 5px;
            flex: 1;
            min-width: 35px;
            margin: 0 7px;
        }

        .rent-slider-track,
        .rent-slider-progress {
            position: absolute;
            top: 0;
            height: 5px;
            border-radius: 5px;
        }

        .rent-slider-track {
            width: 100%;
            background: #dce2ee;
        }

        .rent-slider-progress {
            background: #16a34a;
        }

        .rent-slider input[type="range"] {
            position: absolute;
            top: -8px;
            left: 0;
            width: 100%;
            height: 21px;
            margin: 0;
            background: transparent;
            pointer-events: none;
            appearance: none;
            -webkit-appearance: none;
        }

        .rent-slider input[type="range"]::-webkit-slider-thumb {
            width: 17px;
            height: 17px;
            border: 3px solid #16a34a;
            border-radius: 50%;
            background: #fff;
            cursor: grab;
            pointer-events: auto;
            appearance: none;
            -webkit-appearance: none;
        }

        .rent-slider input[type="range"]::-moz-range-thumb {
            width: 11px;
            height: 11px;
            border: 3px solid #16a34a;
            border-radius: 50%;
            background: #fff;
            cursor: grab;
            pointer-events: auto;
        }

        .rent-range-labels {
            display: none;
        }

        @media (max-width: 900px) {
            .search-panel {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .rent-range-field {
                min-width: 0;
            }
        }

        @media (max-width: 520px) {
            .search-panel {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- =====================================================
                                                                                                                                                                                                                                                                                                                                                             SEARCH AREA
                                                                                                                                                                                                                                                                                                                                                        ====================================================== -->

    <div class="rent-container search-area">
        <button type="button" class="mobile-filter-open" id="mobileFilterOpen">
            <i class="fa-solid fa-sliders"></i>
            Search Properties & Filters
        </button>

        <div class="search-panel" style="">

            <!-- Location -->
            <!-- <div class="field">

                                                            <label for="locationInput">
                                                                Location / Locality
                                                            </label>

                                                            <div class="control location-control">

                                                                <i class="fa-solid fa-location-dot"></i>

                                                                <input type="text" id="locationInput" placeholder="Search Locality, Area or Landmark"
                                                                    autocomplete="off">

                                                                <button type="button" class="control-icon-btn" id="locationClear" aria-label="Clear location">
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                </button>

                                                            </div> -->

            <!-- Location Suggestions -->
            <!-- @php
                                                                $locations = $properties
                                                                    ->flatMap(function ($property) {
                                                                        return [
                                                                            $property->locality,
                                                                            $property->landmark,
                                                                            optional($property->cityRelation)->name,
                                                                        ];
                                                                    })
                                                                    ->filter()
                                                                    ->map(function ($location) {
                                                                        return trim($location);
                                                                    })
                                                                    ->unique()
                                                                    ->sort()
                                                                    ->values();
                                                            @endphp

                                                            <div class="location-suggestions" id="locationSuggestions">

                                                                @foreach($locations as $location)

                                                                    <button type="button" data-location="{{ $location }}">

                                                                        <i class="fa-solid fa-location-dot"></i>

                                                                        {{ $location }}

                                                                    </button>

                                                                @endforeach

                                                            </div>
                                                        </div> -->


            <div class="field">
                <label for="locationInput">Location / Locality</label>

                <div class="control location-control">
                    <i class="fa-solid fa-location-dot"></i>

                    <input type="text" id="locationInput" name="location" placeholder="Search Locality, Area or Landmark"
                        autocomplete="off">

                    <button type="button" class="control-icon-btn" id="locationClear" aria-label="Clear location"
                        style="display: none;">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>



            <!-- Property Type -->
            <div class="field">

                <label>
                    Property Type
                </label>

                <div class="custom-select">

                    <button type="button" class="control select-trigger" data-target="propertyTypeMenu">
                        <strong id="propertyTypeValue">
                            Any Type
                        </strong>

                        <i class="fa-solid fa-chevron-down arrow"></i>
                    </button>

                    @php
                        $propertyTypes = \App\Models\PropertyType::where('status', true)
                            ->orderBy('sort_order')
                            ->orderBy('name')
                            ->get();
                    @endphp

                    <div class="select-menu" id="propertyTypeMenu">

                        <button type="button" data-value="Any Type">
                            Any Type
                        </button>

                        @foreach($propertyTypes as $propertyType)

                            <button type="button" data-value="{{ $propertyType->name }}">
                                {{ $propertyType->name }}
                            </button>

                        @endforeach

                    </div>

                </div>

            </div>


            <!-- BHK -->
            <div class="field">

                <label>
                    BHK
                </label>

                <div class="custom-select">

                    <button type="button" class="control select-trigger" data-target="bhkMenu">
                        <strong id="bhkValue">
                            Any
                        </strong>

                        <i class="fa-solid fa-chevron-down arrow"></i>
                    </button>

                    @php
                        $bhkOptions = $properties
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
                            ->values();
                    @endphp

                    <div class="select-menu" id="bhkMenu">

                        <button type="button" data-value="Any">
                            Any
                        </button>

                        @foreach($bhkOptions as $bhkNumber)

                            <button type="button" data-value="{{ $bhkNumber }} BHK">

                                {{ $bhkNumber }} BHK

                            </button>

                        @endforeach

                        @if($bhkOptions->contains(fn($value) => $value >= 4))

                            <!-- <button type="button" data-value="4+ BHK">
                                                                                        4+ BHK
                                                                                    </button> -->

                        @endif

                    </div>

                </div>

            </div>


            <!-- Rent Range -->
            <!-- <div class="field">

                                            <label>
                                                Rent Range
                                            </label>

                                            <div class="custom-select">

                                                <button type="button" class="control select-trigger" data-target="rentMenu">
                                                    <strong id="rentValue">
                                                        ₹ 0 - ₹ 1,00,000+
                                                    </strong>

                                                    <i class="fa-solid fa-chevron-down arrow"></i>
                                                </button>

                                                <div class="select-menu" id="rentMenu">

                                                    <button type="button" data-value="₹ 0 - ₹ 1,00,000+">
                                                        ₹ 0 - ₹ 1,00,000+
                                                    </button>

                                                    <button type="button" data-value="₹ 0 - ₹ 25,000">
                                                        ₹ 0 - ₹ 25,000
                                                    </button>

                                                    <button type="button" data-value="₹ 25,000 - ₹ 50,000">
                                                        ₹ 25,000 - ₹ 50,000
                                                    </button>

                                                    <button type="button" data-value="₹ 50,000 - ₹ 75,000">
                                                        ₹ 50,000 - ₹ 75,000
                                                    </button>

                                                    <button type="button" data-value="₹ 75,000+">
                                                        ₹ 75,000+
                                                    </button>

                                                </div>

                                            </div>

                                        </div> -->



            <!-- Rent Range -->
            <div class="field rent-range-field">
                <label>Rent Range</label>

                <div class="rent-range-container">

                    <div class="rent-range-values">
                        <div class="rent-price-box">
                            <span>Minimum</span>
                            <strong id="minRentValue">₹ 0</strong>
                        </div>

                        <div class="rent-price-box">
                            <span>Maximum</span>
                            <strong id="maxRentValue">₹ 1,00,000+</strong>
                        </div>
                    </div>

                    <div class="rent-slider">
                        <div class="rent-slider-track"></div>
                        <div class="rent-slider-progress" id="rentSliderProgress"></div>

                        <input type="range" id="minRent" min="0" max="100000" step="1" value="0" aria-label="Minimum rent">

                        <input type="range" id="maxRent" min="0" max="100000" step="1" value="100000"
                            aria-label="Maximum rent">
                    </div>

                    <div class="rent-range-labels">
                        <span>₹0</span>
                        <span>₹25k</span>
                        <span>₹50k</span>
                        <span>₹75k</span>
                        <span>₹1L+</span>
                    </div>

                </div>

                <input type="hidden" name="min_rent" id="min_rent" value="0">
                <input type="hidden" name="max_rent" id="max_rent" value="100000">
            </div>



            <!-- More Filters
                                        <button type="button" class="filter-action" id="moreFiltersBtn">
                                            <i class="fa-solid fa-sliders"></i>

                                            <span>
                                                More Filters
                                            </span>
                                        </button> -->


            <!-- Search -->
            <button type="button" class="search-action" id="searchBtn">
                <i class="fa-solid fa-magnifying-glass"></i>

                <span>
                    Search
                </span>
            </button>

        </div>

    </div>

    <!-- Mobile Search and Filters Modal -->
    <div class="mobile-filter-modal" id="mobileFilterModal" aria-hidden="true">
        <div class="mobile-filter-overlay" id="mobileFilterOverlay"></div>

        <div class="mobile-filter-dialog" role="dialog" aria-modal="true" aria-labelledby="mobileFilterTitle">

            <div class="mobile-filter-header">
                <h2 id="mobileFilterTitle">Search Properties</h2>

                <button type="button" id="mobileFilterClose" aria-label="Close filters">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="mobile-filter-body" id="mobileFilterBody">
                <!-- Existing search panel will be moved here on mobile -->
            </div>
        </div>
    </div>


    <!-- =====================================================
                                                                                                                                                                                                                                                                                                                                                             CONTENT AREA
                                                                                                                                                                                                                                                                                                                                                        ====================================================== -->

    <div class="rent-container content">


        <!-- =================================================
                                                                                                                                                                                                                                                                                                                                                                 SIDEBAR
                                                                                                                                                                                                                                                                                                                                                            ================================================== -->

        <aside class="sidebar" id="filters">

            <div class="filter-head">

                <span>
                    Filters
                </span>

                <button type="button" class="reset" id="resetFiltersBtn">
                    <i class="fa-solid fa-rotate-left"></i>
                    Reset All
                </button>

            </div>


            <!-- LOCATION FILTER

                                LOCATION FILTER -->

            @php
                $locationTree = $properties
                    ->filter(function ($property) {
                        return $property->cityRelation || $property->locality;
                    })
                    ->groupBy(function ($property) {
                        return optional($property->cityRelation)->name ?: 'Other';
                    })
                    ->map(function ($cityProperties) {

                        return $cityProperties
                            ->pluck('locality')
                            ->filter()
                            ->map(function ($locality) {
                                return trim($locality);
                            })
                            ->filter()
                            ->unique()
                            ->sort()
                            ->values();

                    })
                    ->sortKeys();
            @endphp

            <div class="filter-section">

                <button type="button" class="filter-title">

                    <span>
                        Location
                    </span>

                    <i class="fa-solid fa-chevron-up"></i>

                </button>


                <div class="tree">

                    @foreach($locationTree as $city => $localities)

                        {{-- CITY --}}
                        <button type="button" class="tree-row active-parent city-filter-row" data-city="{{ $city }}">
                            <i class="fa-solid fa-chevron-down"></i>

                            {{ $city }}

                            <span class="checkbox"></span>
                        </button>


                        @foreach($localities as $index => $locality)

                            <div class="tree-line {{ $index >= 4 ? 'extra-location' : '' }}" @if($index >= 4) style="display:none;"
                            @endif>
                            </div>

                            {{-- LOCALITY --}}
                            <button type="button" class="tree-row child {{ $index >= 4 ? 'extra-location' : '' }}"
                                data-location="{{ $locality }}" @if($index >= 4) style="display:none;" @endif>

                                {{ $locality }}

                                <span class="checkbox"></span>

                            </button>

                        @endforeach

                    @endforeach

                </div>


                <button type="button" class="more">

                    <i class="fa-solid fa-plus"></i>

                    Show More Areas

                </button>

            </div>


            <!-- RENT RANGE -->

            <!-- <div class="filter-section">

                                                                                                                                                                                                                                                                                                                                            <button type="button" class="filter-title">
                                                                                                                                                                                                                                                                                                                                                <span>
                                                                                                                                                                                                                                                                                                                                                    Rent Range
                                                                                                                                                                                                                                                                                                                                                </span>

                                                                                                                                                                                                                                                                                                                                                <i class="fa-solid fa-chevron-up"></i>
                                                                                                                                                                                                                                                                                                                                            </button>


                                                                                                                                                                                                                                                                                                                                            <div class="range">

                                                                                                                                                                                                                                                                                                                                                <span class="range-progress"></span>

                                                                                                                                                                                                                                                                                                                                                <button type="button" class="range-thumb left" aria-label="Minimum rent"></button>

                                                                                                                                                                                                                                                                                                                                                <button type="button" class="range-thumb right" aria-label="Maximum rent"></button>

                                                                                                                                                                                                                                                                                                                                            </div>


                                                                                                                                                                                                                                                                                                                                            <div class="range-values">

                                                                                                                                                                                                                                                                                                                                                <div class="range-box">
                                                                                                                                                                                                                                                                                                                                                    ₹ 0
                                                                                                                                                                                                                                                                                                                                                </div>

                                                                                                                                                                                                                                                                                                                                                <span class="range-to">
                                                                                                                                                                                                                                                                                                                                                    to
                                                                                                                                                                                                                                                                                                                                                </span>

                                                                                                                                                                                                                                                                                                                                                <div class="range-box">
                                                                                                                                                                                                                                                                                                                                                    ₹ 1,00,000+
                                                                                                                                                                                                                                                                                                                                                </div>

                                                                                                                                                                                                                                                                                                                                            </div>

                                                                                                                                                                                                                                                                                                                                        </div> -->


            <!-- BHK -->

            <!-- BHK -->

            @php
                $bhkCounts = [
                    '1 BHK' => 0,
                    '2 BHK' => 0,
                    '3 BHK' => 0,
                    '4+ BHK' => 0,
                ];

                foreach ($properties as $property) {

                    if (!$property->bhk) {
                        continue;
                    }

                    preg_match('/\d+/', $property->bhk, $match);

                    $bhkNumber = isset($match[0])
                        ? (int) $match[0]
                        : null;

                    if ($bhkNumber === 1) {

                        $bhkCounts['1 BHK']++;

                    } elseif ($bhkNumber === 2) {

                        $bhkCounts['2 BHK']++;

                    } elseif ($bhkNumber === 3) {

                        $bhkCounts['3 BHK']++;

                    } elseif ($bhkNumber >= 4) {

                        $bhkCounts['4+ BHK']++;

                    }
                }
            @endphp

            <div class="filter-section">

                <button type="button" class="filter-title">

                    <span>
                        BHK
                    </span>

                    <i class="fa-solid fa-chevron-up"></i>

                </button>


                @foreach($bhkCounts as $bhk => $count)

                    <button type="button" class="tree-row filter-checkbox-row" data-filter="{{ $bhk }}">

                        <span class="checkbox"></span>

                        {{ $bhk }}

                        <span class="count">
                            ({{ $count }})
                        </span>

                    </button>

                @endforeach

            </div>

            {{-- TENANT PREFERENCE --}}
            <!-- <div class="filter-section">

                                                                <button type="button" class="filter-title">

                                                                    <span>
                                                                        Tenant Preference
                                                                    </span>

                                                                    <i class="fa-solid fa-chevron-up"></i>

                                                                </button>

                                                                <div class="property-type-filters">

                                                                    <button type="button" data-tenant-filter="Family">

                                                                        <span class="checkbox"></span>

                                                                        Family

                                                                    </button>

                                                                    <button type="button" data-tenant-filter="Bachelor">

                                                                        <span class="checkbox"></span>

                                                                        Bachelor

                                                                    </button>

                                                                    <button type="button" data-tenant-filter="Both">

                                                                        <span class="checkbox"></span>

                                                                        Fam & Bac

                                                                    </button>

                                                                </div>

                                                            </div> -->


            <!-- PROPERTY TYPE -->

            <div class="filter-section">

                <button type="button" class="filter-title">
                    <span>
                        Property Type
                    </span>

                    <i class="fa-solid fa-chevron-up"></i>
                </button>


                @php
                    $propertyTypes = \App\Models\PropertyType::where('status', true)
                        ->orderBy('sort_order')
                        ->orderBy('name')
                        ->get();
                @endphp

                <div class="property-type-filters">

                    @foreach($propertyTypes as $propertyType)

                        <button type="button" data-property-type="{{ $propertyType->name }}" aria-pressed="false">
                            <span class="checkbox"></span>
                            {{ $propertyType->name }}
                        </button>

                    @endforeach

                </div>

            </div>

        </aside>


        <!-- =================================================
                                                                                                                                                                                                                                                                                                                                                                 RESULTS
                                                                                                                                                                                                                                                                                                                                                            ================================================== -->

        <section class="results">


            <!-- RESULT TOOLBAR -->

            <div class="result-toolbar">

                <div class="showing">

                    Showing

                    <strong id="resultCount">
                        {{ $properties->count() }}
                    </strong>

                    Rental Properties

                </div>


                <div class="sort">

                    <span>
                        Sort By:
                    </span>


                    <select class="sort-select" id="sortSelect">
                        <option value="newest">Newest First</option>
                        <option value="low">Price: Low to High</option>
                        <option value="high">Price: High to Low</option>
                    </select>

                    <div class="mobile-sort">
                        <button type="button" id="mobileSortButton" aria-expanded="false">
                            <span id="mobileSortLabel">Newest First</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>

                        <div class="mobile-sort-options" id="mobileSortOptions" hidden>
                            <button type="button" data-value="newest">Newest First</button>
                            <button type="button" data-value="low">Price: Low to High</button>
                            <button type="button" data-value="high">Price: High to Low</button>
                        </div>
                    </div>


                    <div class="view-toggle">

                        <button type="button" class="active" id="gridViewBtn" aria-label="Grid view">
                            <i class="fa-solid fa-grip"></i>
                        </button>

                        <button type="button" id="listViewBtn" aria-label="List view">
                            <i class="fa-solid fa-list"></i>
                        </button>

                    </div>

                </div>

            </div>


            @forelse($properties as $property)

                @php
                    $firstImage = $property->images->first();

                    if ($firstImage && $firstImage->image_path) {
                        $propertyImage = asset($firstImage->image_path);
                    } else {
                        $propertyImage = asset('images/default-property.jpg');
                    }

                    // Extract number from "3 BHK", "2 BHK", etc.
                    $bhkNumber = null;

                    if ($property->bhk) {
                        preg_match('/\d+/', $property->bhk, $bhkMatch);
                        $bhkNumber = $bhkMatch[0] ?? null;
                    }

                    // Property age
                    $ageHours = $property->created_at
                        ? $property->created_at->diffInHours(now())
                        : 0;

                    if ($ageHours < 1) {
                        $ageText = 'Just now';
                    } elseif ($ageHours < 24) {
                        $ageText = $ageHours . ' hours ago';
                    } else {
                        $ageDays = floor($ageHours / 24);
                        $ageText = $ageDays . ($ageDays == 1 ? ' day ago' : ' days ago');
                    }

                    $isNew = $ageHours <= 48;

                    // Owner / vendor name
                    $brokerName =
                        $property->owner_name
                        ?: optional($property->user)->name
                        ?: 'Property Owner';

                    // Broker initials
                    $brokerWords = preg_split('/\s+/', trim($brokerName));

                    if (count($brokerWords) >= 2) {
                        $brokerInitials = strtoupper(
                            substr($brokerWords[0], 0, 1) .
                            substr($brokerWords[1], 0, 1)
                        );
                    } else {
                        $brokerInitials = strtoupper(substr($brokerName, 0, 2));
                    }

                    // Location
                    $locationText = collect([
                        $property->locality,
                        optional($property->cityRelation)->name,
                        $property->district,
                        $property->state
                    ])
                        ->filter()
                        ->unique()
                        ->implode(', ');
                    // Image count
                    $photoCount = $property->images->count();
                @endphp


                <article class="result-card" data-property="{{ $property->id }}" data-property-slug="{{ $property->slug }}"
                    data-price="{{ (float) $property->price }}" data-age="{{ $ageHours }}" data-bhk="{{ $bhkNumber ?? 0 }}"
                    data-city-id="{{ $property->city_id }}" data-city="{{ optional($property->cityRelation)->name }}"
                    data-location="{{ $locationText }}" data-type="{{ $property->property_type }}"
                    data-tenant-preference="{{ $property->tenant_preference }}"
                    data-amenities="{{ $property->propertyAmenities->pluck('name')->implode(',') }}">

                    {{-- IMAGE --}}
                    <div class="gallery">

                        @if($isNew)
                            <span class="featured">NEW</span>
                        @endif

                        <!-- <button type="button" class="heart" aria-label="Add to favourites">
                                                                                                                                                                            <i class="fa-regular fa-heart"></i>
                                                                                                                                                                        </button> -->

                        <img class="main" src="{{ $propertyImage }}" alt="{{ $property->property_title }}" loading="lazy">

                        @if($photoCount > 0)

                            <span class="photo-count">
                                <i class="fa-regular fa-images"></i>

                                {{ $photoCount }}

                                {{ $photoCount == 1 ? 'Photo' : 'Photos' }}
                            </span>

                        @endif

                    </div>


                    {{-- DETAILS --}}
                    <div class="details">

                        <div class="title-row">

                            <div class="property-title">
                                {{ $property->property_title }}
                            </div>

                            @if($property->status === 'approved')
                                <span class="verified">
                                    <i class="fa-solid fa-circle-check"></i>
                                    Verified
                                </span>
                            @endif

                        </div>


                        {{-- LOCATION --}}
                        <div class="location">

                            <i class="fa-solid fa-location-dot"></i>

                            {{ $locationText ?: 'Location not available' }}

                        </div>

                        {{-- PROPERTY TYPE / LISTING FOR --}}
                        {{-- PROPERTY TYPE / LISTING FOR / TENANT PREFERENCE --}}
                        <div class="property-subtitle">

                            @if($property->property_type)
                                {{ $property->property_type }}
                            @endif

                            @if($property->listing_for)
                                <span>
                                    • {{ $property->listing_for }}
                                </span>
                            @endif

                            @if($property->tenant_preference)
                                        <span>
                                            •
                                            {{ $property->tenant_preference === 'Both'
                                ? 'Fam & Bac'
                                : $property->tenant_preference }}
                                        </span>
                            @endif

                        </div>


                        {{-- PRICE --}}
                        {{-- PRICE --}}
                        <div class="price">

                            @if($property->price)

                                ₹ {{ number_format((float) $property->price) }}

                                <span>/month</span>

                            @else

                                Contact for Price

                            @endif

                        </div>


                        {{-- SECURITY DEPOSIT --}}
                        @if($property->security_deposit !== null)

                            <div class="deposit">

                                Security Deposit:

                                @if((float) $property->security_deposit > 0)

                                    ₹ {{ number_format((float) $property->security_deposit) }}

                                @else

                                    No Security Deposit

                                @endif

                            </div>

                        @endif


                        {{-- PROPERTY META --}}
                        {{-- PROPERTY META --}}
                        <div class="meta">

                            @if($property->bhk)
                                <span>
                                    <i class="fa-solid fa-bed"></i>
                                    {{ $property->bhk }}
                                </span>
                            @endif

                            @if($property->bathrooms)
                                <span>
                                    <i class="fa-solid fa-bath"></i>
                                    {{ $property->bathrooms }} Bath
                                </span>
                            @endif

                            @if($property->area_sqft)
                                <span>
                                    <i class="fa-solid fa-ruler-combined"></i>
                                    {{ number_format($property->area_sqft) }} sq.ft
                                </span>
                            @endif

                            @if($property->furnishing)
                                <span>
                                    <i class="fa-solid fa-couch"></i>
                                    {{ $property->furnishing }}
                                </span>
                            @endif



                            @if($property->car_parking)
                                <span>
                                    <i class="fa-solid fa-car"></i>
                                    {{ $property->car_parking }}
                                </span>
                            @endif

                            @if($property->available_from)

                                <span>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    Available {{ $property->available_from->format('d M Y') }}
                                </span>

                            @endif

                            @if($property->property_age)

                                <span>
                                    <i class="fa-solid fa-building"></i>
                                    {{ $property->property_age }}
                                </span>

                            @endif

                            @if($property->property_condition)

                                <span>
                                    <i class="fa-solid fa-house-circle-check"></i>
                                    {{ $property->property_condition }}
                                </span>

                            @endif

                        </div>


                        {{-- BROKER --}}
                        <!-- <div class="broker">

                                                                    <div class="broker-avatar">
                                                                        {{ $brokerInitials }}
                                                                    </div>

                                                                    <div>

                                                                        <div class="broker-name">

                                                                            {{ $brokerName }}

                                                                            <span class="tick">
                                                                                <i class="fa-solid fa-circle-check"></i>
                                                                            </span>

                                                                        </div>

                                                                        <div class="broker-role">

                                                                            @if($property->user)
                                                                                {{ ucfirst($property->user->role ?? 'Property Owner') }}
                                                                            @else
                                                                                Property Owner
                                                                            @endif

                                                                        </div>

                                                                    </div>

                                                                </div> -->

                    </div>


                    {{-- ACTIONS --}}
                    <div class="actions">

                        <span class="age">
                            {{ $ageText }}
                        </span>


                        @if($isNew)

                            <span class="new">
                                New
                            </span>

                        @endif


                        {{-- VIEW DETAILS --}}
                        <button type="button" class="action-btn primary view-details"
                            data-property-slug="{{ $property->slug }}">
                            View Details
                        </button>


                        {{-- ENQUIRE --}}
                        <!-- <button type="button" class="action-btn enquire-btn" data-property-slug="{{ $property->slug }}">
                                                                                                                    Enquire Now
                                                                                                                </button> -->


                        {{-- PHONE --}}
                        <!-- @if($property->owner_phone)

                                                                    <div class="phone">

                                                                        <i class="fa-solid fa-phone"></i>

                                                                        {{ $property->owner_phone }}

                                                                    </div>

                                                                @endif -->

                    </div>

                </article>

            @empty

                {{-- No properties from database --}}

            @endforelse
            <!-- No Results -->
            <div class="no-results" id="noResults" style="display:none;">

                <i class="fa-solid fa-house-circle-exclamation"></i>

                <h3>
                    No properties found
                </h3>

                <p>
                    Try changing your search filters.
                </p>

                <button type="button" id="clearSearchBtn">
                    Clear Filters
                </button>

            </div>

            <!-- PAGINATION -->
            <div class="pagination-wrapper" id="paginationWrapper">
                <button type="button" class="pagination-btn" id="prevPage">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <div class="pagination-pages" id="paginationPages"></div>

                <button type="button" class="pagination-btn" id="nextPage">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
            <p class="pagination-hint" id="paginationHint" aria-live="polite" style="display:none;">
                <i class="fa-solid fa-circle-info"></i> Click the arrow to view more pages.
            </p>

        </section>

    </div>

    <style>
        /* =================================================
                                                                                                                                                               PAGINATION
                                                                                                                                                            ================================================= */

        .pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            margin: 30px 0 20px;
        }

        .pagination-pages {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .pagination-btn,
        .pagination-page {
            min-width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid #dce2ed;
            border-radius: 7px;

            background: #fff;
            color: #1724c9;

            font-size: 13px;
            font-weight: 700;

            cursor: pointer;
            transition: all .2s ease;
        }

        .pagination-btn:hover,
        .pagination-page:hover {
            background: #eef2ff;
            border-color: #1724c9;
        }

        .pagination-page.active {
            background: #1724c9;
            color: #fff;
            border-color: #1724c9;
        }

        .pagination-btn:disabled {
            opacity: .45;
            cursor: not-allowed;
        }

        .pagination-wrapper.hidden {
            display: none;
        }

        .pagination-hint {
            text-align: center;
            color: #667085;
            font-size: 12px;
            margin: 8px 0 24px;
        }

        #filters .filter-title {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
        }

        #filters .filter-title i {
            transition: transform .2s ease;
        }

        #filters .filter-section.collapsed>.filter-title i {
            transform: rotate(180deg);
        }

        #filters .filter-section.collapsed>.tree,
        #filters .filter-section.collapsed>.more,
        #filters .filter-section.collapsed>.filter-checkbox-row,
        #filters .filter-section.collapsed>.property-type-filters {
            display: none !important;
        }

        #filters .city-filter-row>i {
            transition: transform .2s ease;
        }

        #filters .city-filter-row[aria-expanded="false"]>i {
            transform: rotate(-90deg);
        }
    </style>



    <!-- =====================================================
                                                                                                                                                                                                                                                                                                                                                             ENQUIRY MODAL
                                                                                                                                                                                                                                                                                                                                                        ====================================================== -->
    <div class="enquiry-modal" id="enquiryModal" aria-hidden="true">

        <div class="enquiry-overlay"></div>

        <div class="enquiry-box">

            <button type="button" class="enquiry-close" id="enquiryClose" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="enquiry-icon">
                <i class="fa-solid fa-house"></i>
            </div>

            <h2>
                Enquire About This Property
            </h2>

            <p>
                Fill in your details and our property expert
                will contact you shortly.
            </p>

            <form id="enquiryForm" action="{{ route('rent.enquiry.store') }}" method="POST">
                @csrf


                <div class="enquiry-field">
                    <label for="enquiryName">
                        Full Name
                    </label>

                    <div>
                        <i class="fa-solid fa-user"></i>

                        <input type="text" id="enquiryName" name="name" placeholder="Enter your full name"
                            autocomplete="name" required>
                    </div>
                </div>


                <div class="enquiry-field">
                    <label for="enquiryPhone">
                        Mobile Number
                    </label>

                    <div>
                        <i class="fa-solid fa-phone"></i>

                        <input type="tel" id="enquiryPhone" name="phone" placeholder="Enter your mobile number"
                            autocomplete="tel" inputmode="tel" required>
                    </div>
                </div>


                <div class="enquiry-field">
                    <label for="enquiryEmail">
                        Email Address
                    </label>

                    <div>
                        <i class="fa-solid fa-envelope"></i>

                        <input type="email" id="enquiryEmail" name="email" placeholder="Enter your email address"
                            autocomplete="email" required>
                    </div>
                </div>


                <div class="enquiry-field">
                    <label for="preferredContact">
                        Preferred Contact Details
                    </label>

                    <div>
                        <i class="fa-solid fa-address-book"></i>

                        <select id="preferredContact" name="preferred_contact" required>
                            <option value="">
                                Select preferred contact method
                            </option>

                            <option value="phone">
                                Phone Call
                            </option>

                            <option value="whatsapp">
                                WhatsApp
                            </option>

                            <option value="email">
                                Email
                            </option>
                        </select>
                    </div>
                </div>


                <div class="enquiry-field">
                    <label for="enquiryMessage">
                        Message / Enquiry
                    </label>

                    <div>
                        <i class="fa-regular fa-message"></i>

                        <textarea id="enquiryMessage" name="message" rows="4"
                            placeholder="I am interested in this property..."></textarea>
                    </div>
                </div>


                <button type="submit" class="enquiry-submit">
                    <i class="fa-solid fa-paper-plane"></i>
                    Send Enquiry
                </button>

            </form>

        </div>

    </div>

    <script>

        document.addEventListener("DOMContentLoaded", function () {



            const paginationWrapper =
                document.getElementById("paginationWrapper");

            const paginationPages =
                document.getElementById("paginationPages");

            const prevPage =
                document.getElementById("prevPage");

            const nextPage =
                document.getElementById("nextPage");

            const ITEMS_PER_PAGE = 12;

            let currentPage = 1;



            /* =================================================
               ELEMENTS
            ================================================= */

            const locationInput =
                document.getElementById("locationInput");

            const locationClear =
                document.getElementById("locationClear");

            const locationSuggestions =
                document.getElementById("locationSuggestions");

            const searchBtn =
                document.getElementById("searchBtn");

            const moreFiltersBtn =
                document.getElementById("moreFiltersBtn");

            const filters =
                document.getElementById("filters");

            const resetFiltersBtn =
                document.getElementById("resetFiltersBtn");

            const resultCount =
                document.getElementById("resultCount");

            const sortSelect =
                document.getElementById("sortSelect");

            const gridViewBtn =
                document.getElementById("gridViewBtn");

            const listViewBtn =
                document.getElementById("listViewBtn");

            const noResults =
                document.getElementById("noResults");

            const clearSearchBtn =
                document.getElementById("clearSearchBtn");


            const enquiryModal =
                document.getElementById("enquiryModal");

            const enquiryClose =
                document.getElementById("enquiryClose");

            const enquiryForm =
                document.getElementById("enquiryForm");

            const enquiryName =
                document.getElementById("enquiryName");

            const enquiryMessage =
                document.getElementById("enquiryMessage");


            const propertyCards =
                Array.from(
                    document.querySelectorAll(".result-card")
                );


            /* =================================================
    URL FILTERS FROM RENT MENU
    ================================================= */

            /* =================================================
    APPLY RENT MENU URL FILTERS
    ================================================= */

            const urlParams = new URLSearchParams(window.location.search);

            const urlLocation = urlParams.get("location");
            const urlType = urlParams.get("type");
            const urlBhk = urlParams.get("bhk");


            if (urlLocation) {

                locationInput.value =
                    decodeURIComponent(urlLocation).trim();

            }


            if (urlType) {

                const typeValue =
                    decodeURIComponent(urlType).trim();

                const typeOption =
                    Array.from(
                        document.querySelectorAll("#propertyTypeMenu button")
                    ).find(function (button) {

                        return (
                            button.dataset.value &&
                            button.dataset.value.toLowerCase() ===
                            typeValue.toLowerCase()
                        );

                    });

                if (typeOption) {

                    document.getElementById("propertyTypeValue").textContent =
                        typeOption.dataset.value;

                }

            }


            if (urlBhk) {

                let bhkValue;

                if (Number(urlBhk) >= 4) {
                    bhkValue = "4+ BHK";
                } else {
                    bhkValue = urlBhk + " BHK";
                }

                const bhkOption =
                    Array.from(
                        document.querySelectorAll("#bhkMenu button")
                    ).find(function (button) {

                        return button.dataset.value === bhkValue;

                    });

                if (bhkOption) {

                    document.getElementById("bhkValue").textContent =
                        bhkOption.dataset.value;

                }

            }


            /* NEW: sidebar filter elements */

            const treeRows =
                Array.from(
                    document.querySelectorAll(".tree .tree-row.child")
                );

            const cityFilterRows =
                Array.from(
                    document.querySelectorAll(".city-filter-row")
                );


            /* ================================================= 
    CITY FILTER 
    ================================================= */

            cityFilterRows.forEach(function (row) {
                row.setAttribute("aria-expanded", "true");
                row.addEventListener("click", function (event) {
                    const checkbox = row.querySelector(".checkbox");
                    if (!checkbox) return;

                    // Click the city row to select/deselect the city.
                    checkbox.classList.toggle("checked");
                    row.classList.toggle("checked");
                    checkbox.innerHTML = checkbox.classList.contains("checked")
                        ? '<i class="fa-solid fa-check"></i>' : "";

                    // Keep its locality rows expandable via the chevron icon area.
                    const isOpen = row.getAttribute("aria-expanded") !== "false";
                    row.setAttribute("aria-expanded", String(!isOpen));
                    let next = row.nextElementSibling;
                    while (next && !next.classList.contains("city-filter-row")) {
                        if (next.matches(".tree-line, .tree-row.child")) {
                            const extra = next.classList.contains("extra-location");
                            const showMore = moreAreasBtn && moreAreasBtn.classList.contains("expanded");
                            next.style.display = (!isOpen && extra && !showMore) ? "none" : (!isOpen ? "none" : (extra && !showMore ? "none" : ""));
                        }
                        next = next.nextElementSibling;
                    }
                    performSearch();
                });
            });

            const moreAreasBtn =
                document.querySelector(".more");

            const rangeTrack =
                document.querySelector(".range");

            const rangeProgress =
                document.querySelector(".range-progress");

            const rangeThumbLeft =
                document.querySelector(".range-thumb.left");

            const rangeThumbRight =
                document.querySelector(".range-thumb.right");

            const rangeBoxes =
                document.querySelectorAll(".range-box");

            const RENT_MIN = 0;
            const RENT_MAX = 100000;

            let rentLow = RENT_MIN;
            let rentHigh = RENT_MAX;

            const bhkRows =
                document.querySelectorAll(".filter-checkbox-row");

            const propertyTypeButtons =
                document.querySelectorAll(".property-type-filters button");


            /* =================================================
               LOCATION SUGGESTIONS
            ================================================= */

            /*
             * LOCATION SUGGESTIONS
             * The suggestion panel is commented out in this Blade file.
             * Keep these handlers optional so a missing panel cannot stop
             * the rest of the page JavaScript (including pagination).
             */
            if (locationInput && locationSuggestions) {

                locationInput.addEventListener("focus", function () {
                    locationSuggestions.classList.add("show");
                });

                locationInput.addEventListener("input", function () {
                    const searchValue = this.value.trim().toLowerCase();
                    const suggestions = locationSuggestions.querySelectorAll("button");

                    suggestions.forEach(function (button) {
                        const location = (button.dataset.location || "").toLowerCase();
                        button.style.display = location.includes(searchValue) ? "flex" : "none";
                    });

                    locationSuggestions.classList.add("show");
                });

                locationSuggestions.querySelectorAll("button").forEach(function (button) {
                    button.addEventListener("click", function () {
                        locationInput.value = this.dataset.location || "";
                        locationSuggestions.classList.remove("show");
                    });
                });

                document.addEventListener("click", function (event) {
                    if (
                        !event.target.closest(".location-control") &&
                        !event.target.closest(".location-suggestions")
                    ) {
                        locationSuggestions.classList.remove("show");
                    }
                });
            }

            if (locationClear && locationInput) {
                locationClear.addEventListener("click", function () {
                    locationInput.value = "";
                    if (locationClear) locationClear.style.display = "none";
                    locationInput.focus();
                });
            }


            /* =================================================
               CUSTOM SELECTS
            ================================================= */

            document
                .querySelectorAll(".select-trigger")
                .forEach(function (trigger) {

                    trigger.addEventListener("click", function (event) {

                        event.stopPropagation();

                        const targetId =
                            this.dataset.target;

                        const target =
                            document.getElementById(targetId);


                        document
                            .querySelectorAll(".select-menu")
                            .forEach(function (menu) {

                                if (menu !== target) {
                                    menu.classList.remove("show");
                                }

                            });


                        target.classList.toggle("show");

                    });

                });

            document
                .querySelectorAll(".select-menu button")
                .forEach(function (option) {

                    option.addEventListener("click", function () {

                        const value =
                            this.dataset.value;

                        const menu =
                            this.closest(".select-menu");

                        const trigger =
                            menu
                                .closest(".custom-select")
                                .querySelector(".select-trigger");

                        const strong =
                            trigger.querySelector("strong");

                        strong.textContent = value;

                        menu.classList.remove("show");

                        trigger.dataset.value = value;


                        /* ==========================================
                           RENT RANGE DROPDOWN
                        ========================================== */

                        if (menu.id === "rentMenu") {

                            if (value === "₹ 0 - ₹ 1,00,000+") {

                                rentLow = RENT_MIN;
                                rentHigh = RENT_MAX;

                            } else if (value === "₹ 0 - ₹ 25,000") {

                                rentLow = 0;
                                rentHigh = 25000;

                            } else if (value === "₹ 25,000 - ₹ 50,000") {

                                rentLow = 25000;
                                rentHigh = 50000;

                            } else if (value === "₹ 50,000 - ₹ 75,000") {

                                rentLow = 50000;
                                rentHigh = 75000;

                            } else if (value === "₹ 75,000+") {

                                rentLow = 75000;
                                rentHigh = RENT_MAX;

                            }

                            if (rangeThumbLeft && rangeThumbRight) {
                                updateRangeUI();
                            }

                            performSearch();

                        }

                    });

                });


            document.addEventListener("click", function () {

                document
                    .querySelectorAll(".select-menu")
                    .forEach(function (menu) {

                        menu.classList.remove("show");

                    });

            });


            /* =================================================
               MORE FILTERS
            ================================================= */

            // moreFiltersBtn.addEventListener("click", function () {

            //     filters.classList.toggle("show");

            //     this.classList.toggle("active");

            // });


            /* =================================================
               FILTER TITLE COLLAPSE
            ================================================= */

            document.querySelectorAll(".filter-title").forEach(function (title) {
                title.setAttribute("aria-expanded", "true");
                title.addEventListener("click", function () {
                    const section = title.closest(".filter-section");
                    if (!section) return;
                    const collapsed = section.classList.toggle("collapsed");
                    title.setAttribute("aria-expanded", String(!collapsed));
                });
            });


            /* =================================================
               LOCATION TREE (NEW — was inert, now filters)
            ================================================= */

            treeRows.forEach(function (row) {

                row.addEventListener("click", function () {

                    const checkbox =
                        this.querySelector(".checkbox");

                    if (!checkbox) return;

                    checkbox.classList.toggle("checked");
                    this.classList.toggle("checked");
                    this.setAttribute("aria-pressed", String(checkbox.classList.contains("checked")));

                    checkbox.innerHTML =
                        checkbox.classList.contains("checked")
                            ? '<i class="fa-solid fa-check"></i>'
                            : "";

                    performSearch();

                });

            });


            if (moreAreasBtn) {

                moreAreasBtn.addEventListener("click", function () {

                    const extraLocations =
                        document.querySelectorAll(".extra-location");

                    const isExpanded =
                        this.classList.toggle("expanded");

                    extraLocations.forEach(function (element) {

                        element.style.display =
                            isExpanded ? "" : "none";

                    });

                    const icon =
                        this.querySelector("i");

                    if (icon) {

                        icon.classList.toggle(
                            "fa-plus",
                            !isExpanded
                        );

                        icon.classList.toggle(
                            "fa-minus",
                            isExpanded
                        );

                    }

                    this.innerHTML = isExpanded
                        ? '<i class="fa-solid fa-minus"></i> Show Less Areas'
                        : '<i class="fa-solid fa-plus"></i> Show More Areas';

                });

            }


            /* =================================================
               RENT RANGE SLIDER (NEW — drag to resize)
            ================================================= */

            function rentToPercent(value) {
                return ((value - RENT_MIN) / (RENT_MAX - RENT_MIN)) * 100;
            }

            function percentToRent(percent) {
                const raw = RENT_MIN + (percent / 100) * (RENT_MAX - RENT_MIN);
                return Math.round(raw / 1000) * 1000;
            }

            function formatRent(value) {
                if (value >= RENT_MAX) return "₹ 1,00,000+";
                return "₹ " + value.toLocaleString("en-IN");
            }

            function updateRangeUI() {

                const leftPct = rentToPercent(rentLow);
                const rightPct = rentToPercent(rentHigh);

                rangeThumbLeft.style.left = leftPct + "%";
                rangeThumbRight.style.left = rightPct + "%";

                rangeProgress.style.left = leftPct + "%";
                rangeProgress.style.width = (rightPct - leftPct) + "%";

                rangeBoxes[0].textContent = formatRent(rentLow);
                rangeBoxes[1].textContent = formatRent(rentHigh);

                document.getElementById("rentValue").textContent =
                    formatRent(rentLow) + " - " + formatRent(rentHigh);

            }

            function startDrag(isLeft) {

                function onMove(clientX) {

                    const rect = rangeTrack.getBoundingClientRect();
                    let percent = ((clientX - rect.left) / rect.width) * 100;
                    percent = Math.max(0, Math.min(100, percent));

                    const value = percentToRent(percent);

                    if (isLeft) {
                        rentLow = Math.min(value, rentHigh);
                    } else {
                        rentHigh = Math.max(value, rentLow);
                    }

                    updateRangeUI();

                }

                function onMouseMove(e) {
                    onMove(e.clientX);
                }

                function onTouchMove(e) {
                    onMove(e.touches[0].clientX);
                    e.preventDefault();
                }

                function stopDrag() {

                    document.removeEventListener("mousemove", onMouseMove);
                    document.removeEventListener("mouseup", stopDrag);
                    document.removeEventListener("touchmove", onTouchMove);
                    document.removeEventListener("touchend", stopDrag);

                    performSearch();

                }

                document.addEventListener("mousemove", onMouseMove);
                document.addEventListener("mouseup", stopDrag);
                document.addEventListener("touchmove", onTouchMove, { passive: false });
                document.addEventListener("touchend", stopDrag);

            }

            if (rangeThumbLeft && rangeThumbRight) {

                rangeThumbLeft.addEventListener("mousedown", function () {
                    startDrag(true);
                });

                rangeThumbRight.addEventListener("mousedown", function () {
                    startDrag(false);
                });

                rangeThumbLeft.addEventListener("touchstart", function () {
                    startDrag(true);
                });

                rangeThumbRight.addEventListener("touchstart", function () {
                    startDrag(false);
                });

                rangeThumbLeft.addEventListener("keydown", function (e) {
                    if (e.key === "ArrowLeft") rentLow = Math.max(RENT_MIN, rentLow - 1000);
                    if (e.key === "ArrowRight") rentLow = Math.min(rentHigh, rentLow + 1000);
                    updateRangeUI();
                    performSearch();
                });

                rangeThumbRight.addEventListener("keydown", function (e) {
                    if (e.key === "ArrowLeft") rentHigh = Math.max(rentLow, rentHigh - 1000);
                    if (e.key === "ArrowRight") rentHigh = Math.min(RENT_MAX, rentHigh + 1000);
                    updateRangeUI();
                    performSearch();
                });

                updateRangeUI();

            }


            /* =================================================
               BHK CHECKBOXES (now filters, not just visual)
            ================================================= */

            bhkRows.forEach(function (row) {

                row.addEventListener("click", function () {

                    const checkbox =
                        this.querySelector(".checkbox");


                    if (!checkbox) return;
                    checkbox.classList.toggle("checked");
                    this.classList.toggle("checked");
                    this.setAttribute("aria-pressed", String(checkbox.classList.contains("checked")));

                    if (
                        checkbox.classList.contains("checked")
                    ) {

                        checkbox.innerHTML =
                            '<i class="fa-solid fa-check"></i>';

                    } else {

                        checkbox.innerHTML = "";

                    }

                    performSearch();

                });

            });


            /* =================================================
               SIDEBAR PROPERTY TYPE (now filters, not just visual)
            ================================================= */

            propertyTypeButtons.forEach(function (button) {
                button.addEventListener("click", function () {
                    const checkbox = this.querySelector(".checkbox");
                    if (!checkbox) return;
                    checkbox.classList.toggle("checked");
                    this.classList.toggle("checked");
                    this.setAttribute("aria-pressed", String(checkbox.classList.contains("checked")));


                    if (
                        checkbox.classList.contains("checked")
                    ) {

                        checkbox.innerHTML =
                            '<i class="fa-solid fa-check"></i>';

                    } else {

                        checkbox.innerHTML = "";

                    }

                    performSearch();

                });

            });


            /* =================================================
               FAVORITE
            ================================================= */

            document
                .querySelectorAll(".heart")
                .forEach(function (heart) {

                    heart.addEventListener("click", function (event) {

                        event.stopPropagation();

                        const icon =
                            this.querySelector("i");


                        this.classList.toggle("active");


                        if (
                            this.classList.contains("active")
                        ) {

                            icon.classList.remove(
                                "fa-regular"
                            );

                            icon.classList.add(
                                "fa-solid"
                            );

                            icon.style.color =
                                "#e63946";

                        } else {

                            icon.classList.remove(
                                "fa-solid"
                            );

                            icon.classList.add(
                                "fa-regular"
                            );

                            icon.style.color = "";

                        }

                    });

                });


            /* =================================================
               PROPERTY DETAILS
            ================================================= */

            /* =================================================
    PROPERTY DETAILS
    ================================================= */

            document
                .querySelectorAll(".view-details")
                .forEach(function (button) {

                    button.addEventListener("click", function (event) {

                        event.preventDefault();
                        event.stopPropagation();

                        const propertySlug =
                            this.dataset.propertySlug;

                        if (!propertySlug) {
                            console.error(
                                "Property slug is missing."
                            );
                            return;
                        }

                        window.location.href =
                            "{{ url('propertydetails') }}/" +
                            encodeURIComponent(propertySlug);

                    });

                });


            /* =================================================
               CARD CLICK
            ================================================= */

            propertyCards.forEach(function (card) {

                card.addEventListener("click", function (event) {

                    if (
                        event.target.closest("button") ||
                        event.target.closest("select") ||
                        event.target.closest("a")
                    ) {
                        return;
                    }

                    const propertySlug =
                        this.dataset.propertySlug;

                    if (!propertySlug) {
                        console.error(
                            "Property slug is missing."
                        );
                        return;
                    }

                    window.location.href =
                        "{{ url('propertydetails') }}/" +
                        encodeURIComponent(propertySlug);

                });

            });


            /* =================================================
    ENQUIRE NOW
    ================================================= */

            document
                .querySelectorAll(".enquire-btn")
                .forEach(function (button) {

                    button.addEventListener("click", function (event) {

                        event.preventDefault();
                        event.stopPropagation();

                        if (!enquiryModal) {
                            console.error("Enquiry modal not found.");
                            return;
                        }

                        const card = this.closest(".result-card");

                        const titleElement = card
                            ? card.querySelector(".property-title")
                            : null;

                        const title = titleElement
                            ? titleElement.textContent.trim()
                            : "this property";

                        /*
                         * Set message only.
                         * No property ID is required.
                         */
                        if (enquiryMessage) {
                            enquiryMessage.value =
                                "I am interested in " + title + ".";
                        }

                        /*
                         * Open enquiry modal
                         */
                        enquiryModal.classList.add("show");

                        enquiryModal.setAttribute(
                            "aria-hidden",
                            "false"
                        );

                        document.documentElement.classList.add(
                            "enquiry-modal-open"
                        );

                        document.body.classList.add(
                            "enquiry-modal-open"
                        );

                        /*
                         * Focus name field
                         */
                        setTimeout(function () {

                            if (enquiryName) {
                                enquiryName.focus();
                            }

                        }, 200);

                    });

                });

            /* =================================================
               CLOSE MODAL
            ================================================= */

            function closeEnquiryModal() {

                enquiryModal.classList.remove("show");

                enquiryModal.setAttribute(
                    "aria-hidden",
                    "true"
                );

                document.documentElement.classList.remove(
                    "enquiry-modal-open"
                );

                document.body.classList.remove(
                    "enquiry-modal-open"
                );

            }


            enquiryClose.addEventListener(
                "click",
                closeEnquiryModal
            );


            document
                .querySelector(".enquiry-overlay")
                .addEventListener(
                    "click",
                    closeEnquiryModal
                );


            /* =================================================
               ESCAPE KEY
            ================================================= */

            document.addEventListener(
                "keydown",
                function (event) {

                    if (event.key === "Escape") {

                        closeEnquiryModal();

                        if (locationSuggestions) {
                            locationSuggestions.classList.remove("show");
                        }

                    }

                }
            );


            /* =================================================
    ENQUIRY FORM
    ================================================= */

            if (enquiryForm) {

                enquiryForm.addEventListener("submit", async function (event) {

                    event.preventDefault();

                    const submitButton =
                        enquiryForm.querySelector(".enquiry-submit");

                    const originalButtonText =
                        submitButton
                            ? submitButton.innerHTML
                            : "";

                    /*
                     * Get form values
                     */
                    const name =
                        document
                            .getElementById("enquiryName")
                            .value
                            .trim();

                    const phone =
                        document
                            .getElementById("enquiryPhone")
                            .value
                            .trim();

                    const email =
                        document
                            .getElementById("enquiryEmail")
                            .value
                            .trim();

                    const preferredContact =
                        document
                            .getElementById("preferredContact")
                            .value;

                    const message =
                        document
                            .getElementById("enquiryMessage")
                            .value
                            .trim();

                    /*
                     * Basic validation
                     */
                    if (!name) {
                        alert("Please enter your name.");
                        return;
                    }

                    if (!phone) {
                        alert("Please enter your mobile number.");
                        return;
                    }

                    if (!email) {
                        alert("Please enter your email address.");
                        return;
                    }

                    if (!preferredContact) {
                        alert("Please select your preferred contact method.");
                        return;
                    }

                    /*
                     * Disable button
                     */
                    if (submitButton) {

                        submitButton.disabled = true;

                        submitButton.innerHTML =
                            '<i class="fa-solid fa-spinner fa-spin"></i> Submitting...';
                    }

                    try {

                        /*
                         * Create form data
                         */
                        const formData = new FormData();

                        formData.append("name", name);
                        formData.append("phone", phone);
                        formData.append("email", email);
                        formData.append(
                            "preferred_contact",
                            preferredContact
                        );
                        formData.append("message", message);

                        /*
                         * Laravel request
                         */
                        const response = await fetch(
                            enquiryForm.action,
                            {
                                method: "POST",

                                body: formData,

                                headers: {
                                    "Accept": "application/json",
                                    "X-Requested-With": "XMLHttpRequest"
                                }
                            }
                        );

                        const result = await response.json();

                        console.log(
                            "Enquiry response:",
                            result
                        );

                        /*
                         * Validation error
                         */
                        if (!response.ok) {

                            if (result.errors) {

                                const firstError =
                                    Object.values(result.errors)
                                        .flat()[0];

                                alert(
                                    firstError ||
                                    "Please check the form."
                                );

                            } else {

                                alert(
                                    result.message ||
                                    "Unable to submit enquiry."
                                );
                            }

                            return;
                        }

                        /*
                         * Success
                         */
                        if (result.success) {

                            alert(
                                result.message ||
                                "Your enquiry has been submitted successfully."
                            );

                            /*
                             * Clear form
                             */
                            enquiryForm.reset();

                            /*
                             * Close modal
                             */
                            closeEnquiryModal();

                        } else {

                            alert(
                                result.message ||
                                "Unable to submit enquiry."
                            );
                        }

                    } catch (error) {

                        console.error(
                            "Enquiry submission error:",
                            error
                        );

                        alert(
                            "Unable to submit your enquiry. Please try again."
                        );

                    } finally {

                        /*
                         * Enable button again
                         */
                        if (submitButton) {

                            submitButton.disabled = false;

                            submitButton.innerHTML =
                                originalButtonText;
                        }

                    }

                });

            }


            /* =================================================
               SORTING
            ================================================= */

            sortSelect.addEventListener(
                "change",
                function () {

                    const value =
                        this.value;


                    const results = document.querySelector(".results");

                    if (!results) {
                        console.error('Pagination/Sorting: ".results" container not found.');
                        return;
                    }

                    const cards = Array.from(
                        results.querySelectorAll(".result-card")
                    );

                    cards.sort(function (a, b) {

                        if (value === "low") {

                            return (
                                Number(a.dataset.price) -
                                Number(b.dataset.price)
                            );

                        }


                        if (value === "high") {

                            return (
                                Number(b.dataset.price) -
                                Number(a.dataset.price)
                            );

                        }


                        return (
                            Number(a.dataset.age) -
                            Number(b.dataset.age)
                        );

                    });


                    cards.forEach(function (card) {
                        results.appendChild(card);
                    });

                    currentPage = 1;
                    renderPagination();

                }
            );
            // PASTE THE NEW MOBILE SORT CODE HERE
            const mobileSortButton = document.getElementById("mobileSortButton");
            const mobileSortLabel = document.getElementById("mobileSortLabel");
            const mobileSortOptions = document.getElementById("mobileSortOptions");

            if (mobileSortButton && mobileSortOptions && sortSelect) {
                mobileSortButton.addEventListener("click", function (event) {
                    event.stopPropagation();

                    const isOpening = mobileSortOptions.hidden;
                    mobileSortOptions.hidden = !isOpening;
                    mobileSortButton.setAttribute("aria-expanded", String(isOpening));
                });

                mobileSortOptions.querySelectorAll("button").forEach(function (option) {
                    option.addEventListener("click", function () {
                        sortSelect.value = this.dataset.value;
                        mobileSortLabel.textContent = this.textContent.trim();

                        mobileSortOptions.hidden = true;
                        mobileSortButton.setAttribute("aria-expanded", "false");

                        sortSelect.dispatchEvent(
                            new Event("change", { bubbles: true })
                        );
                    });
                });

                document.addEventListener("click", function (event) {
                    if (!event.target.closest(".mobile-sort")) {
                        mobileSortOptions.hidden = true;
                        mobileSortButton.setAttribute("aria-expanded", "false");
                    }
                });
            }

            /* =================================================
               GRID VIEW
            ================================================= */

            gridViewBtn.addEventListener(
                "click",
                function () {

                    document
                        .querySelector(".results")
                        .classList.remove("list-view");


                    gridViewBtn.classList.add("active");

                    listViewBtn.classList.remove("active");

                }
            );


            /* =================================================
               LIST VIEW
            ================================================= */

            listViewBtn.addEventListener(
                "click",
                function () {

                    document
                        .querySelector(".results")
                        .classList.add("list-view");


                    listViewBtn.classList.add("active");

                    gridViewBtn.classList.remove("active");

                }
            );



            /* =================================================
              PAGINATION
                 ================================================= */

            function renderPagination() {

                const visibleCards = propertyCards.filter(function (card) {
                    return card.dataset.filteredVisible === "true";
                });

                const totalPages = Math.ceil(
                    visibleCards.length / ITEMS_PER_PAGE
                );

                /* Hide pagination if only one page */
                if (totalPages <= 1) {

                    paginationWrapper.classList.add("hidden");

                } else {

                    paginationWrapper.classList.remove("hidden");

                }

                /* Make sure current page is valid */
                if (currentPage > totalPages) {
                    currentPage = totalPages || 1;
                }

                /* Clear page buttons */
                paginationPages.innerHTML = "";

                /* Show only five page numbers at a time */
                const maxPageButtons = 5;
                const firstPage = Math.floor((currentPage - 1) / maxPageButtons) * maxPageButtons + 1;
                const lastPage = Math.min(firstPage + maxPageButtons - 1, totalPages);

                for (let i = firstPage; i <= lastPage; i++) {
                    const button = document.createElement("button");
                    button.type = "button";
                    button.className = "pagination-page";
                    button.setAttribute("aria-label", "Go to page " + i);
                    if (i === currentPage) {
                        button.classList.add("active");
                        button.setAttribute("aria-current", "page");
                    }
                    button.textContent = i;
                    button.addEventListener("click", function () {
                        currentPage = i;
                        renderPagination();
                        window.scrollTo({ top: 0, behavior: "smooth" });
                    });
                    paginationPages.appendChild(button);
                }

                const paginationHint = document.getElementById("paginationHint");
                if (paginationHint) {
                    paginationHint.style.display = totalPages > maxPageButtons ? "block" : "none";
                    if (totalPages > maxPageButtons) {
                        paginationHint.innerHTML = currentPage < totalPages
                            ? '<i class="fa-solid fa-circle-info"></i> Click the right arrow to view more pages.'
                            : '<i class="fa-solid fa-circle-info"></i> You are viewing the last page.';
                    }
                }

                /* Previous button */
                prevPage.disabled =
                    currentPage <= 1 || totalPages === 0;

                /* Next button */
                nextPage.disabled =
                    currentPage >= totalPages || totalPages === 0;

                /* Calculate current page items */
                const startIndex =
                    (currentPage - 1) * ITEMS_PER_PAGE;

                const endIndex =
                    startIndex + ITEMS_PER_PAGE;

                const currentPageCards =
                    visibleCards.slice(startIndex, endIndex);

                /* Hide all cards first */
                // propertyCards.forEach(function (card) {

                //     card.style.display = "none";

                // });

                // /* Show only current page cards */
                // currentPageCards.forEach(function (card) {

                //     card.style.display = "";

                // });


                /* Hide every card except those on the current page */
                propertyCards.forEach(function (card) {
                    card.hidden = !currentPageCards.includes(card);
                });

            }


            /* =================================================
               PREVIOUS PAGE
            ================================================= */

            prevPage.addEventListener("click", function () {

                if (currentPage > 1) {

                    currentPage--;

                    renderPagination();

                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });

                }

            });


            /* =================================================
               NEXT PAGE
            ================================================= */

            nextPage.addEventListener("click", function () {

                const visibleCards = propertyCards.filter(function (card) {
                    return card.dataset.filteredVisible === "true";
                });

                const totalPages = Math.ceil(
                    visibleCards.length / ITEMS_PER_PAGE
                );

                if (currentPage < totalPages) {

                    currentPage++;

                    renderPagination();

                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });

                }

            });


            /* =================================================
               SEARCH (UPDATED — now reads sidebar filters too)
            ================================================= */

            function performSearch() {

                const location =
                    locationInput.value
                        .trim()
                        .toLowerCase();


                const propertyType =
                    document
                        .getElementById(
                            "propertyTypeValue"
                        )
                        .textContent
                        .trim();


                const bhk =
                    document
                        .getElementById(
                            "bhkValue"
                        )
                        .textContent
                        .trim();


                /* NEW: sidebar location tree — checked areas */

                const checkedLocations =
                    treeRows
                        .filter(function (row) {
                            return row.classList.contains("checked");
                        })
                        .map(function (row) {
                            const location = row.dataset.location;

                            if (location) {
                                return location.trim().toLowerCase();
                            }

                            const label =
                                row.querySelector("span:not(.checkbox)");

                            return (
                                label ? label.textContent : row.textContent
                            ).trim().toLowerCase();
                        });

                /* SELECTED CITIES */

                const checkedCities =
                    cityFilterRows
                        .filter(function (row) {
                            return row.classList.contains("checked");
                        })
                        .map(function (row) {

                            return (row.dataset.city || row.textContent)
                                .replace(/\s+/g, " ")
                                .trim()
                                .toLowerCase();

                        });


                /* NEW: sidebar BHK checkboxes */

                const checkedBhks =
                    Array.from(bhkRows)
                        .filter(function (row) {
                            return row.querySelector(".checkbox").classList.contains("checked");
                        })
                        .map(function (row) {
                            return row.dataset.filter;
                        });


                /* NEW: sidebar property type checkboxes */

                const checkedTypes =
                    Array.from(propertyTypeButtons)
                        .filter(function (button) {
                            return button.querySelector(".checkbox").classList.contains("checked");
                        })
                        .map(function (button) {
                            return button.textContent.trim();
                        });


                let visibleCount = 0;


                propertyCards.forEach(function (card) {

                    const cardLocation =
                        (card.dataset.location || "").toLowerCase();

                    const cardCity =
                        (card.dataset.city || "")
                            .trim()
                            .toLowerCase();

                    const cardType = card.dataset.type;
                    const cardBhk = card.dataset.bhk;
                    const rawCardPrice = card.dataset.price;
                    const cardPrice = rawCardPrice === undefined || rawCardPrice.trim() === ""
                        ? NaN
                        : Number(rawCardPrice);

                    let visible = true;


                    /*
                     * Location (top search bar, free text)
                     */

                    if (
                        location &&
                        !cardLocation.includes(location)
                    ) {

                        visible = false;

                    }


                    /* CITY FILTER */

                    if (checkedCities.length > 0) {

                        const matchesCity =
                            checkedCities.some(function (city) {

                                return cardCity === city;

                            });

                        if (!matchesCity) {
                            visible = false;
                        }

                    }


                    /*
                     * Property type (top search bar dropdown)
                     */

                    if (
                        propertyType !== "Any Type" &&
                        cardType !== propertyType
                    ) {

                        visible = false;

                    }


                    /*
                     * BHK (top search bar dropdown)
                     */

                    if (
                        bhk !== "Any"
                    ) {

                        if (
                            bhk === "4+ BHK"
                        ) {

                            if (
                                Number(cardBhk) < 4
                            ) {
                                visible = false;
                            }

                        } else {

                            const selectedBhk =
                                parseInt(bhk);


                            if (
                                Number(cardBhk) !==
                                selectedBhk
                            ) {

                                visible = false;

                            }

                        }

                    }


                    /*
                     * NEW: Sidebar location tree (OR match)
                     */

                    /*
                        * Sidebar location tree (OR match)
                       */

                    if (checkedLocations.length > 0) {

                        const matchesLocation =
                            checkedLocations.some(function (selectedLocation) {

                                return (
                                    cardCity.includes(selectedLocation) ||
                                    cardLocation.includes(selectedLocation)
                                );

                            });

                        if (!matchesLocation) {
                            visible = false;
                        }

                    }


                    /*
                     * NEW: Sidebar BHK checkboxes (OR match)
                     */

                    if (checkedBhks.length > 0) {

                        const matchesBhk =
                            checkedBhks.some(function (filterValue) {
                                if (filterValue === "4+ BHK") return Number(cardBhk) >= 4;
                                return Number(cardBhk) === parseInt(filterValue);
                            });

                        if (!matchesBhk) visible = false;

                    }


                    /*
                     * NEW: Sidebar property type checkboxes (OR match)
                     */

                    if (
                        checkedTypes.length > 0 &&
                        !checkedTypes.includes(cardType)
                    ) {

                        visible = false;

                    }


                    /*
                     * Rent range filter — read the values from the active
                     * dual sliders. The older sidebar slider is no longer used.
                     */
                    const selectedMinRent = Number(
                        document.getElementById("min_rent")?.value ?? RENT_MIN
                    );
                    const selectedMaxRent = Number(
                        document.getElementById("max_rent")?.value ?? RENT_MAX
                    );

                    // Treat missing/invalid card prices as zero only when the
                    // attribute is genuinely empty; normal cards have data-price.
                    if (
                        !Number.isFinite(cardPrice) ||
                        cardPrice < selectedMinRent ||
                        cardPrice > selectedMaxRent
                    ) {
                        visible = false;
                    }


                    card.dataset.filteredVisible =
                        visible ? "true" : "false";

                    // card.style.display = "none";
                    card.hidden = true;


                    if (visible) {
                        visibleCount++;
                    }

                });


                resultCount.textContent =
                    visibleCount.toLocaleString();


                noResults.style.display =
                    visibleCount === 0
                        ? "block"
                        : "none";

                currentPage = 1;

                renderPagination();

            }

            /* APPLY URL FILTERS ON PAGE LOAD */

            if (urlLocation || urlType || urlBhk) {
                performSearch();
            }


            searchBtn.addEventListener(
                "click",
                performSearch
            );

            // The dual-slider script dispatches this event because
            // performSearch is private to this DOMContentLoaded callback.
            document.addEventListener("rent-range-changed", performSearch);


            /* =================================================
               ENTER TO SEARCH
            ================================================= */

            if (locationInput) locationInput.addEventListener(
                "keydown",
                function (event) {

                    if (
                        event.key === "Enter"
                    ) {

                        event.preventDefault();

                        performSearch();

                    }

                }
            );


            /* =================================================
               RESET FILTERS (UPDATED — clears sidebar state too)
            ================================================= */

            function resetFilters() {
                // Clear the top search controls.
                if (locationInput) locationInput.value = "";
                if (locationClear) locationClear.style.display = "none";

                const propertyTypeValue = document.getElementById("propertyTypeValue");
                const bhkValue = document.getElementById("bhkValue");
                if (propertyTypeValue) propertyTypeValue.textContent = "Any Type";
                if (bhkValue) bhkValue.textContent = "Any";

                // Clear custom dropdown selections.
                document.querySelectorAll(".select-trigger").forEach(function (trigger) {
                    delete trigger.dataset.value;
                });
                document.querySelectorAll(".select-menu").forEach(function (menu) {
                    menu.classList.remove("show");
                });

                // Clear all sidebar checkbox states.
                document.querySelectorAll("#filters .checkbox.checked").forEach(function (checkbox) {
                    checkbox.classList.remove("checked");
                    checkbox.innerHTML = "";
                });
                document.querySelectorAll("#filters .checked").forEach(function (element) {
                    element.classList.remove("checked");
                });

                // Reset city expansion and extra localities.
                cityFilterRows.forEach(function (row) {
                    row.setAttribute("aria-expanded", "true");
                    const icon = row.querySelector("i");
                    if (icon) icon.style.transform = "";
                });
                document.querySelectorAll(".tree-line, .tree-row.child").forEach(function (element) {
                    element.style.display = element.classList.contains("extra-location") ? "none" : "";
                });
                if (moreAreasBtn) {
                    moreAreasBtn.classList.remove("expanded");
                    moreAreasBtn.innerHTML = '<i class="fa-solid fa-plus"></i> Show More Areas';
                }

                // Expand all filter sections and restore their arrows.
                document.querySelectorAll("#filters .filter-section").forEach(function (section) {
                    section.classList.remove("collapsed");
                    const title = section.querySelector(".filter-title");
                    if (title) {
                        title.setAttribute("aria-expanded", "true");
                        const content = section.querySelector(".filter-content");
                        if (content) content.classList.remove("is-collapsed");
                    }
                });

                // Reset the rent range sliders and their labels.
                rentLow = RENT_MIN;
                rentHigh = RENT_MAX;
                if (rangeThumbLeft && rangeThumbRight && rangeProgress) updateRangeUI();

                const minRentSlider = document.getElementById("minRent");
                const maxRentSlider = document.getElementById("maxRent");
                const minRentInput = document.getElementById("min_rent");
                const maxRentInput = document.getElementById("max_rent");
                if (minRentSlider) minRentSlider.value = RENT_MIN;
                if (maxRentSlider) maxRentSlider.value = RENT_MAX;
                if (minRentInput) minRentInput.value = RENT_MIN;
                if (maxRentInput) maxRentInput.value = RENT_MAX;
                if (maxRentSlider) maxRentSlider.dispatchEvent(new Event("input", { bubbles: true }));

                // Reset sorting and view state.
                if (sortSelect) sortSelect.value = "newest";
                if (locationSuggestions) locationSuggestions.classList.remove("show");

                // Reset to the first page and re-run all filters/pagination.
                currentPage = 1;
                performSearch();
            }

            if (resetFiltersBtn) {
                resetFiltersBtn.addEventListener("click", resetFilters);
            }


            if (clearSearchBtn) {
                clearSearchBtn.addEventListener("click", resetFilters);
            }


            /*
             * Run once on load so counts/labels start accurate
             */

            performSearch();

            // Mobile search/filter modal
            const mobileFilterOpen = document.getElementById("mobileFilterOpen");
            const mobileFilterModal = document.getElementById("mobileFilterModal");
            const mobileFilterClose = document.getElementById("mobileFilterClose");
            const mobileFilterOverlay = document.getElementById("mobileFilterOverlay");
            const mobileFilterBody = document.getElementById("mobileFilterBody");
            const searchPanel = document.querySelector(".search-area .search-panel");

            if (
                mobileFilterOpen &&
                mobileFilterModal &&
                mobileFilterClose &&
                mobileFilterOverlay &&
                mobileFilterBody &&
                searchPanel
            ) {
                const originalParent = searchPanel.parentNode;
                const originalNextSibling = searchPanel.nextSibling;

                function openMobileFilter() {
                    if (window.innerWidth > 767) return;

                    mobileFilterBody.appendChild(searchPanel);
                    mobileFilterModal.classList.add("is-open");
                    mobileFilterModal.setAttribute("aria-hidden", "false");
                    document.body.classList.add("mobile-filter-opened");

                    mobileFilterClose.focus();
                }

                function closeMobileFilter() {
                    mobileFilterModal.classList.remove("is-open");
                    mobileFilterModal.setAttribute("aria-hidden", "true");
                    document.body.classList.remove("mobile-filter-opened");

                    // Restore the original search panel location.
                    if (originalNextSibling && originalNextSibling.parentNode === originalParent) {
                        originalParent.insertBefore(searchPanel, originalNextSibling);
                    } else {
                        originalParent.appendChild(searchPanel);
                    }

                    mobileFilterOpen.focus();
                }

                mobileFilterOpen.addEventListener("click", openMobileFilter);
                mobileFilterClose.addEventListener("click", closeMobileFilter);
                mobileFilterOverlay.addEventListener("click", closeMobileFilter);

                document.addEventListener("keydown", function (event) {
                    if (event.key === "Escape" && mobileFilterModal.classList.contains("is-open")) {
                        closeMobileFilter();
                    }
                });

                window.addEventListener("resize", function () {
                    if (window.innerWidth > 767 && mobileFilterModal.classList.contains("is-open")) {
                        closeMobileFilter();
                    }
                });
            }


        });

    </script>

    <style>
        .enquiry-field select {
            width: 100%;
            height: 42px;
            padding: 0 12px 0 36px;
            border: 1px solid #dce2ed;
            border-radius: 7px;
            outline: none;
            background: #fff;
            color: #202940;
            font-size: 12px;
            line-height: 1.5;
            cursor: pointer;
            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .enquiry-field select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(23, 36, 201, 0.07);
        }

        .enquiry-field select:invalid {
            color: #929bad;
        }

        .enquiry-field select option {
            color: #202940;
        }


        /* Ensure pagination can hide property cards */
        article.result-card[hidden] {
            display: none !important;
        }
    </style>




    <script>

        let locationAutocomplete;

        function initLocationAutocomplete() {
            const input = document.getElementById("locationInput");
            const clearButton = document.getElementById("locationClear");

            if (!input || !clearButton || !window.google?.maps?.places) {
                return;
            }

            const bengaluruBounds = new google.maps.LatLngBounds(
                { lat: 12.7343, lng: 77.3790 },
                { lat: 13.1737, lng: 77.8827 }
            );

            locationAutocomplete = new google.maps.places.Autocomplete(input, {
                bounds: bengaluruBounds,
                strictBounds: true,
                componentRestrictions: { country: "in" },
                fields: ["formatted_address", "name", "geometry"],
                types: ["geocode"]
            });

            locationAutocomplete.addListener("place_changed", function () {
                const place = locationAutocomplete.getPlace();

                if (!place.geometry?.location ||
                    !bengaluruBounds.contains(place.geometry.location)) {
                    input.value = "";
                    clearButton.style.display = "none";
                    alert("Please select a location within Bengaluru.");
                    return;
                }

                input.value = place.name || place.formatted_address || "";
                clearButton.style.display = input.value ? "inline-flex" : "none";
            });

            input.addEventListener("input", function () {
                clearButton.style.display = input.value ? "inline-flex" : "none";
            });

            clearButton.addEventListener("click", function () {
                input.value = "";
                clearButton.style.display = "none";
                input.focus();
            });
        }

    </script>

    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbHPicLYkLGF_-HUU8TTzdU0RQKg8bNTM&loading=async&libraries=places&callback=initLocationAutocomplete">
        </script>


    <script>



        (function () {
            const minSlider = document.getElementById("minRent");
            const maxSlider = document.getElementById("maxRent");

            const minValue = document.getElementById("minRentValue");
            const maxValue = document.getElementById("maxRentValue");
            const progress = document.getElementById("rentSliderProgress");

            const minInput = document.getElementById("min_rent");
            const maxInput = document.getElementById("max_rent");

            if (!minSlider || !maxSlider || !minValue || !maxValue || !progress) {
                return;
            }

            const MAX_RENT = 100000;

            function formatRent(value) {
                return "₹ " + Number(value).toLocaleString("en-IN");
            }

            function updateRange(changedSlider) {
                let min = Number(minSlider.value);
                let max = Number(maxSlider.value);

                // Keep the handles from crossing.
                if (min > max) {
                    if (changedSlider === minSlider) {
                        min = max;
                        minSlider.value = min;
                    } else {
                        max = min;
                        maxSlider.value = max;
                    }
                }

                // Display selected amounts.
                minValue.textContent = formatRent(min);
                maxValue.textContent =
                    max >= MAX_RENT ? "₹ 1,00,000+" : formatRent(max);

                // Update the green track.
                const minPercent = (min / MAX_RENT) * 100;
                const maxPercent = (max / MAX_RENT) * 100;

                progress.style.left = minPercent + "%";
                progress.style.width = (maxPercent - minPercent) + "%";

                // Update form values.
                if (minInput) minInput.value = min;
                if (maxInput) maxInput.value = max;

                // Bring the active handle to the front.
                minSlider.style.zIndex =
                    changedSlider === minSlider ? "4" : "3";

                maxSlider.style.zIndex =
                    changedSlider === maxSlider ? "4" : "3";
            }

            minSlider.addEventListener("input", function () {
                updateRange(minSlider);
            });

            maxSlider.addEventListener("input", function () {
                updateRange(maxSlider);
            });

            // Notify the main search script, where performSearch is scoped.
            function notifyRentFilterChanged() {
                document.dispatchEvent(new Event("rent-range-changed"));
            }

            minSlider.addEventListener("input", notifyRentFilterChanged);
            maxSlider.addEventListener("input", notifyRentFilterChanged);
            minSlider.addEventListener("change", notifyRentFilterChanged);
            maxSlider.addEventListener("change", notifyRentFilterChanged);



            // Initialize without resetting existing values.
            updateRange();
        })();


    </script>

@endsection