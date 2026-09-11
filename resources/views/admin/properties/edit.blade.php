@extends('layout.mainlayout')

@section('content')

<div class="page-wrapper">
    <div class="content property-edit-page">

        {{-- =========================================================
            PAGE HEADER
        ========================================================== --}}
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h4 class="mb-1">Edit Rental Property</h4>
                <p class="text-muted mb-0">
                    Update property information and listing details.
                </p>
            </div>

            <a href="{{ route('properties.all') }}" class="btn btn-light">
                <i class="ti ti-arrow-left me-1"></i>
                Back to Properties
            </a>
        </div>


        {{-- =========================================================
            VALIDATION ERRORS
        ========================================================== --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix the following errors:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- =========================================================
            FORM
        ========================================================== --}}
        <form
            action="{{ route('properties.update', $property->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            {{-- =====================================================
                BASIC PROPERTY INFORMATION
            ====================================================== --}}
            <div class="property-form-section">

                <div class="property-section-header">
                    <div class="property-section-icon">
                        <i class="ti ti-building"></i>
                    </div>

                    <div>
                        <h5>Basic Property Information</h5>
                        <p>Enter the basic details of the property.</p>
                    </div>
                </div>


                <div class="property-form-row">

                    {{-- Property Title --}}
                    <div class="property-col-12">
                        <label class="property-form-label">
                            Property Title
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="property_title"
                            class="form-control"
                            value="{{ old('property_title', $property->property_title) }}"
                            placeholder="Enter property title"
                            required
                        >
                    </div>


                    {{-- Property Type --}}
                    <div class="property-col-6">
                        <label class="property-form-label">
                            Property Type
                            <span class="text-danger">*</span>
                        </label>

                        <select
                            name="property_type"
                            class="form-select"
                            required
                        >
                            <option value="">Select Property Type</option>

                            @foreach([
                                'Apartment',
                                'Villa',
                                'Independent House',
                                'Plot'
                            ] as $type)

                                <option
                                    value="{{ $type }}"
                                    {{ old('property_type', $property->property_type) == $type ? 'selected' : '' }}
                                >
                                    {{ $type }}
                                </option>

                            @endforeach
                        </select>
                    </div>


                    {{-- Listing For --}}
                    <div class="property-col-6">
                        <label class="property-form-label">
                            Listing For
                            <span class="text-danger">*</span>
                        </label>

                        <select
                            name="listing_for"
                            class="form-select"
                            required
                        >
                            <option value="">Select Listing Type</option>

                            @foreach([
                                'Rent',
                                'Lease',
                                'PG',
                                'Sell'
                            ] as $listing)

                                <option
                                    value="{{ $listing }}"
                                    {{ old('listing_for', $property->listing_for) == $listing ? 'selected' : '' }}
                                >
                                    {{ $listing }}
                                </option>

                            @endforeach
                        </select>
                    </div>


                    {{-- BHK --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Bedrooms / BHK
                        </label>

                        <select name="bhk" class="form-select">

                            <option value="">Select BHK</option>

                            @foreach([
                                '1 BHK',
                                '2 BHK',
                                '3 BHK',
                                '4 BHK',
                                '5 BHK',
                                '6+ BHK'
                            ] as $bhk)

                                <option
                                    value="{{ $bhk }}"
                                    {{ old('bhk', $property->bhk) == $bhk ? 'selected' : '' }}
                                >
                                    {{ $bhk }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    {{-- Bathrooms --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Bathrooms
                        </label>

                        <input
                            type="number"
                            name="bathrooms"
                            class="form-control"
                            min="0"
                            value="{{ old('bathrooms', $property->bathrooms) }}"
                            placeholder="2"
                        >
                    </div>


                    {{-- Balconies --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Balconies
                        </label>

                        <input
                            type="number"
                            name="balconies"
                            class="form-control"
                            min="0"
                            value="{{ old('balconies', $property->balconies) }}"
                            placeholder="2"
                        >
                    </div>

                </div>
            </div>


            {{-- =====================================================
                LOCATION DETAILS
            ====================================================== --}}
            <div class="property-form-section">

                <div class="property-section-header">
                    <div class="property-section-icon">
                        <i class="ti ti-map-pin"></i>
                    </div>

                    <div>
                        <h5>Location Details</h5>
                        <p>Provide the complete location of the property.</p>
                    </div>
                </div>


                <div class="property-form-row">

                    {{-- Country --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Country
                            <span class="text-danger">*</span>
                        </label>

                        <select
                            name="country"
                            class="form-select"
                            required
                        >
                            <option value="">Select Country</option>

                            <option
                                value="India"
                                {{ old('country', $property->country) == 'India' ? 'selected' : '' }}
                            >
                                India
                            </option>
                        </select>
                    </div>


                    {{-- State --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            State
                            <span class="text-danger">*</span>
                        </label>

                        <select
                            name="state"
                            class="form-select"
                            required
                        >
                            <option value="">Select State</option>

                            @foreach([
                                'Andhra Pradesh',
                                'Telangana',
                                'Karnataka',
                                'Tamil Nadu',
                                'Kerala'
                            ] as $state)

                                <option
                                    value="{{ $state }}"
                                    {{ old('state', $property->state) == $state ? 'selected' : '' }}
                                >
                                    {{ $state }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    {{-- District --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            District
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="district"
                            class="form-control"
                            value="{{ old('district', $property->district) }}"
                            placeholder="Enter district"
                            required
                        >
                    </div>


                    {{-- City --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            City
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="city"
                            class="form-control"
                            value="{{ old('city', $property->city) }}"
                            placeholder="Enter city"
                            required
                        >
                    </div>


                    {{-- Locality --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Area / Locality
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="locality"
                            class="form-control"
                            value="{{ old('locality', $property->locality) }}"
                            placeholder="Enter area or locality"
                            required
                        >
                    </div>


                    {{-- Pincode --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Pincode
                        </label>

                        <input
                            type="text"
                            name="pincode"
                            class="form-control"
                            value="{{ old('pincode', $property->pincode) }}"
                            placeholder="Enter pincode"
                        >
                    </div>


                    {{-- Landmark --}}
                    <div class="property-col-6">
                        <label class="property-form-label">
                            Landmark
                        </label>

                        <input
                            type="text"
                            name="landmark"
                            class="form-control"
                            value="{{ old('landmark', $property->landmark) }}"
                            placeholder="Nearby landmark"
                        >
                    </div>


                    {{-- Google Map URL --}}
                    <div class="property-col-6">
                        <label class="property-form-label">
                            Google Map Location URL
                        </label>

                        <input
                            type="url"
                            name="google_map_url"
                            class="form-control"
                            value="{{ old('google_map_url', $property->google_map_url) }}"
                            placeholder="https://maps.google.com/..."
                        >
                    </div>


                    {{-- Latitude --}}
                    <div class="property-col-6">
                        <label class="property-form-label">
                            Latitude
                        </label>

                        <input
                            type="number"
                            name="latitude"
                            class="form-control"
                            step="any"
                            value="{{ old('latitude', $property->latitude) }}"
                            placeholder="17.3850"
                        >
                    </div>


                    {{-- Longitude --}}
                    <div class="property-col-6">
                        <label class="property-form-label">
                            Longitude
                        </label>

                        <input
                            type="number"
                            name="longitude"
                            class="form-control"
                            step="any"
                            value="{{ old('longitude', $property->longitude) }}"
                            placeholder="78.4867"
                        >
                    </div>


                    {{-- Detailed Address --}}
                    <div class="property-col-12">
                        <label class="property-form-label">
                            Detailed Address
                        </label>

                        <textarea
                            name="address"
                            class="form-control"
                            rows="3"
                            placeholder="Enter complete property address"
                        >{{ old('address', $property->address) }}</textarea>
                    </div>

                </div>
            </div>


            {{-- =====================================================
                RENT & PROPERTY DETAILS
            ====================================================== --}}
            <div class="property-form-section">

                <div class="property-section-header">
                    <div class="property-section-icon">
                        <i class="ti ti-home-dollar"></i>
                    </div>

                    <div>
                        <h5>Rent & Property Details</h5>
                        <p>Update pricing, size and property specifications.</p>
                    </div>
                </div>


                <div class="property-form-row">

                    {{-- Monthly Rent --}}
                    <div class="property-col-6">
                        <label class="property-form-label">
                            Monthly Rent
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="number"
                            name="price"
                            class="form-control"
                            min="0"
                            step="0.01"
                            value="{{ old('price', $property->price) }}"
                            placeholder="25000"
                            required
                        >
                    </div>


                    {{-- Security Deposit --}}
                    <div class="property-col-6">
                        <label class="property-form-label">
                            Security Deposit
                        </label>

                        <input
                            type="number"
                            name="security_deposit"
                            class="form-control"
                            min="0"
                            step="0.01"
                            value="{{ old('security_deposit', $property->security_deposit) }}"
                            placeholder="100000"
                        >
                    </div>


                    {{-- Property Area --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Property Area (Sq.Ft)
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="number"
                            name="area_sqft"
                            class="form-control"
                            min="1"
                            value="{{ old('area_sqft', $property->area_sqft) }}"
                            placeholder="1650"
                            required
                        >
                    </div>


                    {{-- Built-up Area --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Built-up Area (Sq.Ft)
                        </label>

                        <input
                            type="number"
                            name="built_up_area"
                            class="form-control"
                            min="1"
                            value="{{ old('built_up_area', $property->built_up_area) }}"
                            placeholder="1500"
                        >
                    </div>


                    {{-- Carpet Area --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Carpet Area (Sq.Ft)
                        </label>

                        <input
                            type="number"
                            name="carpet_area"
                            class="form-control"
                            min="1"
                            value="{{ old('carpet_area', $property->carpet_area) }}"
                            placeholder="1350"
                        >
                    </div>


                    {{-- Furnishing --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Furnishing
                            <span class="text-danger">*</span>
                        </label>

                        <select
                            name="furnishing"
                            class="form-select"
                            required
                        >
                            <option value="">Select Furnishing</option>

                            @foreach([
                                'Fully Furnished',
                                'Semi Furnished',
                                'Unfurnished'
                            ] as $furnishing)

                                <option
                                    value="{{ $furnishing }}"
                                    {{ old('furnishing', $property->furnishing) == $furnishing ? 'selected' : '' }}
                                >
                                    {{ $furnishing }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    {{-- Available From --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Available From
                        </label>

                        <input
                            type="date"
                            name="available_from"
                            class="form-control"
                            value="{{ old(
                                'available_from',
                                optional($property->available_from)->format('Y-m-d')
                            ) }}"
                        >
                    </div>


                    {{-- Floor Number --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Floor Number
                        </label>

                        <input
                            type="number"
                            name="floor_number"
                            class="form-control"
                            min="0"
                            value="{{ old('floor_number', $property->floor_number) }}"
                            placeholder="3"
                        >
                    </div>


                    {{-- Total Floors --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Total Floors
                        </label>

                        <input
                            type="number"
                            name="total_floors"
                            class="form-control"
                            min="1"
                            value="{{ old('total_floors', $property->total_floors) }}"
                            placeholder="10"
                        >
                    </div>


                    {{-- Property Age --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Property Age
                        </label>

                        <select
                            name="property_age"
                            class="form-select"
                        >
                            <option value="">Select Property Age</option>

                            @foreach([
                                'New / Under Construction',
                                '0-5 Years',
                                '5-10 Years',
                                '10-20 Years',
                                '20+ Years'
                            ] as $age)

                                <option
                                    value="{{ $age }}"
                                    {{ old('property_age', $property->property_age) == $age ? 'selected' : '' }}
                                >
                                    {{ $age }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    {{-- Property Condition --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Property Condition
                        </label>

                        <select
                            name="property_condition"
                            class="form-select"
                        >
                            <option value="">Select Condition</option>

                            @foreach([
                                'Excellent',
                                'Good',
                                'Average',
                                'Needs Renovation'
                            ] as $condition)

                                <option
                                    value="{{ $condition }}"
                                    {{ old('property_condition', $property->property_condition) == $condition ? 'selected' : '' }}
                                >
                                    {{ $condition }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    {{-- Facing --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Facing
                        </label>

                        <select
                            name="facing"
                            class="form-select"
                        >
                            <option value="">Select Facing</option>

                            @foreach([
                                'East',
                                'West',
                                'North',
                                'South',
                                'North-East',
                                'North-West',
                                'South-East',
                                'South-West'
                            ] as $facing)

                                <option
                                    value="{{ $facing }}"
                                    {{ old('facing', $property->facing) == $facing ? 'selected' : '' }}
                                >
                                    {{ $facing }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    {{-- Road Width --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Road Width
                        </label>

                        <input
                            type="number"
                            name="road_width"
                            class="form-control"
                            min="0"
                            step="0.01"
                            value="{{ old('road_width', $property->road_width) }}"
                            placeholder="30"
                        >
                    </div>


                    {{-- Car Parking --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Car Parking
                        </label>

                        <select
                            name="car_parking"
                            class="form-select"
                        >
                            <option value="">Select Parking</option>

                            @foreach([
                                'None',
                                '1 Car',
                                '2 Cars',
                                '3+ Cars'
                            ] as $parking)

                                <option
                                    value="{{ $parking }}"
                                    {{ old('car_parking', $property->car_parking) == $parking ? 'selected' : '' }}
                                >
                                    {{ $parking }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    {{-- Possession Status --}}
                    <div class="property-col-4">
                        <label class="property-form-label">
                            Possession Status
                        </label>

                        <select
                            name="possession_status"
                            class="form-select"
                        >
                            <option value="">Select Possession Status</option>

                            @foreach([
                                'Ready to Move',
                                'Under Construction',
                                'Available Soon'
                            ] as $possession)

                                <option
                                    value="{{ $possession }}"
                                    {{ old('possession_status', $property->possession_status) == $possession ? 'selected' : '' }}
                                >
                                    {{ $possession }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                </div>
            </div>


            {{-- =====================================================
                PROPERTY DESCRIPTION
            ====================================================== --}}
            <div class="property-form-section">

                <div class="property-section-header">
                    <div class="property-section-icon">
                        <i class="ti ti-file-description"></i>
                    </div>

                    <div>
                        <h5>Property Description</h5>
                        <p>Describe the property and its important features.</p>
                    </div>
                </div>


                <div class="property-form-row">

                    <div class="property-col-12">

                        <label class="property-form-label">
                            Description
                        </label>

                        <textarea
                            name="description"
                            class="form-control"
                            rows="6"
                            placeholder="Enter property description"
                        >{{ old('description', $property->description) }}</textarea>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                AMENITIES
            ====================================================== --}}
            <div class="property-form-section">

                <div class="property-section-header">
                    <div class="property-section-icon">
                        <i class="ti ti-stars"></i>
                    </div>

                    <div>
                        <h5>Amenities</h5>
                        <p>Select the amenities available in this property.</p>
                    </div>
                </div>


                @php

                    /*
                     * New normalized amenity system.
                     *
                     * Prefer propertyAmenities relationship.
                     * Fallback to old JSON amenities for existing records.
                     */

                    $selectedAmenityIds = old('amenities', null);

                    if ($selectedAmenityIds === null) {

                        $selectedAmenityIds = $property->propertyAmenities
                            ? $property->propertyAmenities
                                ->pluck('id')
                                ->toArray()
                            : [];

                    }

                    if (!is_array($selectedAmenityIds)) {
                        $selectedAmenityIds = [];
                    }

                    $oldAmenityNames = $property->amenities ?? [];

                    if (!is_array($oldAmenityNames)) {
                        $oldAmenityNames = [];
                    }

                @endphp


                <div class="property-amenities-wrapper">

                    @forelse($amenities as $amenity)

                        @php

                            $checked =
                                in_array($amenity->id, $selectedAmenityIds)
                                ||
                                (
                                    old('amenities', null) === null
                                    &&
                                    in_array($amenity->name, $oldAmenityNames)
                                );

                        @endphp


                        <label class="property-amenity-item">

                            <input
                                type="checkbox"
                                name="amenities[]"
                                value="{{ $amenity->id }}"
                                {{ $checked ? 'checked' : '' }}
                            >

                            @if($amenity->icon)

                                <i class="{{ $amenity->icon }}"></i>

                            @endif

                            <span>
                                {{ $amenity->name }}
                            </span>

                        </label>

                    @empty

                        <div class="property-form-help">
                            No active amenities available.
                        </div>

                    @endforelse

                </div>

            </div>


            {{-- =====================================================
                PROPERTY IMAGES
            ====================================================== --}}
            <div class="property-form-section">

                <div class="property-section-header">
                    <div class="property-section-icon">
                        <i class="ti ti-photo"></i>
                    </div>

                    <div>
                        <h5>Property Images</h5>
                        <p>Manage existing images and upload new property images.</p>
                    </div>
                </div>


                {{-- Existing Images --}}
                <div class="mb-4">

                    <label class="property-form-label mb-3">
                        Existing Property Images
                    </label>


                    @if($property->images->count())

                        <div class="row g-3">

                            @foreach($property->images as $image)

                                <div
                                    class="col-xl-3 col-lg-4 col-md-4 col-sm-6"
                                    id="image-{{ $image->id }}"
                                >

                                    <div class="property-image-card">

                                        <img
                                            src="{{ asset('storage/' . $image->image_path) }}"
                                            alt="Property Image"
                                            class="img-fluid"
                                        >


                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm delete-image-btn"
                                            onclick="deletePropertyImage({{ $image->id }})"
                                            title="Delete image"
                                        >
                                            <i class="ti ti-trash"></i>
                                        </button>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="property-empty-images">
                            <i class="ti ti-photo-off"></i>

                            <p class="mb-0">
                                No property images uploaded.
                            </p>
                        </div>

                    @endif

                </div>


                {{-- Add New Images --}}
                <div>

                    <label class="property-form-label">
                        Add New Images
                    </label>

                    <input
                        type="file"
                        name="photos[]"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp"
                        multiple
                    >

                    <div class="property-form-help mt-2">
                        JPG, JPEG, PNG or WEBP.
                        Maximum 10 images, 5MB each.
                    </div>

                </div>

            </div>


            {{-- =====================================================
                OWNER / BROKER
            ====================================================== --}}
            <div class="property-form-section">

                <div class="property-section-header">
                    <div class="property-section-icon">
                        <i class="ti ti-user"></i>
                    </div>

                    <div>
                        <h5>Owner / Broker Contact Details</h5>
                        <p>Update the property owner or broker information.</p>
                    </div>
                </div>


                <div class="property-form-row">

                    {{-- Owner Name --}}
                    <div class="property-col-6">

                        <label class="property-form-label">
                            Owner / Broker Name
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="owner_name"
                            class="form-control"
                            value="{{ old('owner_name', $property->owner_name) }}"
                            placeholder="Enter owner or broker name"
                            required
                        >

                    </div>


                    {{-- Owner Phone --}}
                    <div class="property-col-6">

                        <label class="property-form-label">
                            Contact Phone
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="owner_phone"
                            class="form-control"
                            value="{{ old('owner_phone', $property->owner_phone) }}"
                            placeholder="Enter contact phone"
                            required
                        >

                    </div>

                </div>

            </div>


            {{-- =====================================================
                STATUS / ADMIN REMARK
            ====================================================== --}}
            <div class="property-form-section">

                <div class="property-section-header">
                    <div class="property-section-icon">
                        <i class="ti ti-settings"></i>
                    </div>

                    <div>
                        <h5>Property Status</h5>
                        <p>Manage property approval and administrative information.</p>
                    </div>
                </div>


                <div class="property-form-row">

                    {{-- Status --}}
                    <div class="property-col-6">

                        <label class="property-form-label">
                            Property Status
                        </label>

                        <select
                            name="status"
                            class="form-select"
                        >

                            @foreach([
                                'pending',
                                'approved',
                                'rejected',
                                'rented',
                                'inactive'
                            ] as $status)

                                <option
                                    value="{{ $status }}"
                                    {{ old('status', $property->status) == $status ? 'selected' : '' }}
                                >
                                    {{ ucfirst($status) }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Admin Remark --}}
                    <div class="property-col-6">

                        <label class="property-form-label">
                            Admin Remark
                        </label>

                        <textarea
                            name="admin_remark"
                            class="form-control"
                            rows="4"
                            placeholder="Enter admin remark"
                        >{{ old('admin_remark', $property->admin_remark) }}</textarea>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                ACTIONS
            ====================================================== --}}
            <div class="property-action-bar">

                <a
                    href="{{ route('properties.all') }}"
                    class="btn btn-light"
                >
                    <i class="ti ti-x me-1"></i>
                    Cancel
                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    <i class="ti ti-device-floppy me-1"></i>
                    Update Property
                </button>

            </div>


        </form>

    </div>
</div>


{{-- =============================================================
    STYLES
============================================================== --}}
<style>

    .property-edit-page {
        padding-bottom: 40px;
    }


    .property-form-section {
        background: #ffffff;
        border: 1px solid #e6e9ef;
        border-radius: 14px;
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
    }


    .property-section-header {
        display: flex;
        align-items: center;
        gap: 14px;
        padding-bottom: 20px;
        margin-bottom: 22px;
        border-bottom: 1px solid #edf0f4;
    }


    .property-section-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f1f5ff;
        color: #405189;
        font-size: 21px;
        flex-shrink: 0;
    }


    .property-section-header h5 {
        margin: 0 0 4px;
        font-size: 17px;
        font-weight: 600;
    }


    .property-section-header p {
        margin: 0;
        color: #7b8190;
        font-size: 13px;
    }


    .property-form-row {
        display: grid;
        grid-template-columns: repeat(12, minmax(0, 1fr));
        gap: 20px;
    }


    .property-col-4 {
        grid-column: span 4;
    }


    .property-col-6 {
        grid-column: span 6;
    }


    .property-col-8 {
        grid-column: span 8;
    }


    .property-col-12 {
        grid-column: span 12;
    }


    .property-form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #344054;
    }


    .property-form-help {
        color: #7b8190;
        font-size: 12px;
        line-height: 1.5;
    }


    .property-form-section .form-control,
    .property-form-section .form-select {
        min-height: 44px;
        border-color: #d9dee8;
        border-radius: 8px;
    }


    .property-form-section textarea.form-control {
        min-height: auto;
    }


    .property-form-section .form-control:focus,
    .property-form-section .form-select:focus {
        border-color: #405189;
        box-shadow: 0 0 0 3px rgba(64, 81, 137, 0.08);
    }


    /* =========================================================
       AMENITIES
    ========================================================== */

    .property-amenities-wrapper {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 12px;
    }


    .property-amenity-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 13px 14px;
        border: 1px solid #e1e5ec;
        border-radius: 9px;
        background: #fff;
        cursor: pointer;
        transition: all 0.2s ease;
    }


    .property-amenity-item:hover {
        border-color: #405189;
        background: #f8f9ff;
    }


    .property-amenity-item input {
        width: 17px;
        height: 17px;
        cursor: pointer;
        flex-shrink: 0;
    }


    .property-amenity-item i {
        font-size: 17px;
        color: #405189;
    }


    .property-amenity-item span {
        font-size: 13px;
        color: #344054;
    }


    /* =========================================================
       IMAGES
    ========================================================== */

    .property-image-card {
        position: relative;
        overflow: hidden;
        border: 1px solid #e3e7ee;
        border-radius: 10px;
        background: #fff;
    }


    .property-image-card img {
        display: block;
        width: 100%;
        height: 155px;
        object-fit: cover;
    }


    .delete-image-btn {
        position: absolute;
        top: 9px;
        right: 9px;
        width: 35px;
        height: 35px;
        padding: 0;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .property-empty-images {
        padding: 35px 20px;
        text-align: center;
        border: 1px dashed #d9dee8;
        border-radius: 10px;
        color: #8a91a0;
    }


    .property-empty-images i {
        display: block;
        font-size: 35px;
        margin-bottom: 8px;
    }


    /* =========================================================
       ACTION BAR
    ========================================================== */

    .property-action-bar {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
        padding: 20px 24px;
        background: #fff;
        border: 1px solid #e6e9ef;
        border-radius: 14px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
    }


    .property-action-bar .btn {
        min-width: 150px;
        min-height: 44px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================== */

    @media (max-width: 1199px) {

        .property-amenities-wrapper {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

    }


    @media (max-width: 991px) {

        .property-col-4,
        .property-col-6,
        .property-col-8 {
            grid-column: span 6;
        }

        .property-col-12 {
            grid-column: span 12;
        }

        .property-amenities-wrapper {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

    }


    @media (max-width: 575px) {

        .property-form-section {
            padding: 18px;
            border-radius: 10px;
        }

        .property-form-row {
            gap: 15px;
        }

        .property-col-4,
        .property-col-6,
        .property-col-8,
        .property-col-12 {
            grid-column: span 12;
        }

        .property-amenities-wrapper {
            grid-template-columns: 1fr;
        }

        .property-section-header {
            align-items: flex-start;
        }

        .property-action-bar {
            flex-direction: column-reverse;
        }

        .property-action-bar .btn {
            width: 100%;
        }

    }

</style>


{{-- =============================================================
    DELETE PROPERTY IMAGE
============================================================== --}}
<script>

    function deletePropertyImage(imageId) {

        if (!confirm('Are you sure you want to delete this image?')) {
            return;
        }


        fetch(
            "{{ url('properties/images') }}/" + imageId,
            {
                method: 'DELETE',

                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            }
        )
        .then(response => {

            if (!response.ok) {
                throw new Error('Request failed');
            }

            return response.json();

        })
        .then(data => {

            if (data.success) {

                const imageElement =
                    document.getElementById('image-' + imageId);

                if (imageElement) {
                    imageElement.remove();
                }

            } else {

                alert(
                    data.message ||
                    'Unable to delete image.'
                );

            }

        })
        .catch(error => {

            console.error(error);

            alert(
                'Something went wrong while deleting the image.'
            );

        });

    }

</script>

@endsection