@extends('layout.mainlayout')

@section('content')

    <div class="page-wrapper">
        <div class="content">

            {{-- =========================================================
            PAGE HEADER
            ========================================================== --}}
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-1">Property Details</h4>
                    <p class="text-muted mb-0">
                        View complete rental property information.
                    </p>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-primary">
                        <i class="ti ti-edit me-1"></i>
                        Edit Property
                    </a>

                    <a href="{{ route('properties.all') }}" class="btn btn-light">
                        <i class="ti ti-arrow-left me-1"></i>
                        Back
                    </a>
                </div>
            </div>


            {{-- =========================================================
            SUCCESS / ERROR
            ========================================================== --}}
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="ti ti-check me-1"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="ti ti-alert-circle me-1"></i>
                    {{ session('error') }}
                </div>
            @endif


            <div class="row">

                {{-- =====================================================
                LEFT COLUMN
                ====================================================== --}}
                <div class="col-lg-8">


                    {{-- =================================================
                    PROPERTY IMAGES
                    ================================================== --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ti ti-photo me-1"></i>
                                Property Images
                            </h5>
                        </div>

                        <div class="card-body">

                            @if($property->images->count())

                                <div class="row g-3">

                                    @foreach($property->images as $image)

                                        <div class="col-md-4 col-sm-6">

                                            <div class="property-image">
                                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                                    alt="{{ $property->property_title }}">
                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            @else

                                <div class="text-center py-5 text-muted">
                                    <i class="ti ti-photo-off fs-1 d-block mb-2"></i>
                                    No images available.
                                </div>

                            @endif

                        </div>
                    </div>


                    {{-- =================================================
                    BASIC PROPERTY INFORMATION
                    ================================================== --}}
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ti ti-home me-1"></i>
                                Property Information
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="property-title-block">

                                <h3 class="mb-2">
                                    {{ $property->property_title ?: 'Untitled Property' }}
                                </h3>

                                <p class="text-muted mb-4">
                                    <i class="ti ti-map-pin me-1"></i>
                                    {{ $property->locality ?: 'Location not specified' }}

                                    @if($property->city)
                                        , {{ $property->city }}
                                    @endif

                                    @if($property->address)
                                        <br>
                                        <span class="ms-4">
                                            {{ $property->address }}
                                        </span>
                                    @endif
                                </p>

                            </div>


                            <div class="row">

                                {{-- Property Type --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Property Type</span>
                                        <strong>
                                            {{ $property->property_type ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Listing For --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Listing For</span>
                                        <strong>
                                            {{ $property->listing_for ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- BHK --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>BHK</span>
                                        <strong>
                                            {{ $property->bhk ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Bathrooms --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Bathrooms</span>
                                        <strong>
                                            {{ $property->bathrooms ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Balconies --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Balconies</span>
                                        <strong>
                                            {{ $property->balconies ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Furnishing --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Furnishing</span>
                                        <strong>
                                            {{ $property->furnishing ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                    {{-- =================================================
                    PROPERTY SPECIFICATIONS
                    ================================================== --}}
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ti ti-list-details me-1"></i>
                                Property Specifications
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="row">

                                {{-- Area --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Property Area</span>
                                        <strong>
                                            {{ $property->area_sqft
        ? number_format($property->area_sqft) . ' Sq.Ft'
        : 'N/A'
                                            }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Built-up Area --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Built-up Area</span>
                                        <strong>
                                            {{ $property->built_up_area
        ? number_format($property->built_up_area) . ' Sq.Ft'
        : 'N/A'
                                            }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Carpet Area --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Carpet Area</span>
                                        <strong>
                                            {{ $property->carpet_area
        ? number_format($property->carpet_area) . ' Sq.Ft'
        : 'N/A'
                                            }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Floor Number --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Floor Number</span>
                                        <strong>
                                            {{ $property->floor_number !== null
        ? $property->floor_number
        : 'N/A'
                                            }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Total Floors --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Total Floors</span>
                                        <strong>
                                            {{ $property->total_floors ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Property Age --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Property Age</span>
                                        <strong>
                                            {{ $property->property_age ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Property Condition --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Property Condition</span>
                                        <strong>
                                            {{ $property->property_condition ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Facing --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Facing</span>
                                        <strong>
                                            {{ $property->facing ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Road Width --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Road Width</span>
                                        <strong>
                                            {{ $property->road_width
        ? $property->road_width . ' Ft'
        : 'N/A'
                                            }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Car Parking --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Car Parking</span>
                                        <strong>
                                            {{ $property->car_parking ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Possession Status --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Possession Status</span>
                                        <strong>
                                            {{ $property->possession_status ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                    {{-- =================================================
                    LOCATION DETAILS
                    ================================================== --}}
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ti ti-map-pin me-1"></i>
                                Location Details
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="row">

                                {{-- Country --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Country</span>
                                        <strong>
                                            {{ $property->country ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- State --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>State</span>
                                        <strong>
                                            {{ $property->state ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- District --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>District</span>
                                        <strong>
                                            {{ $property->district ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- City --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>City</span>
                                        <strong>
                                            {{ $property->city ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Locality --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Area / Locality</span>
                                        <strong>
                                            {{ $property->locality ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Pincode --}}
                                <div class="col-md-4 mb-4">
                                    <div class="detail-box">
                                        <span>Pincode</span>
                                        <strong>
                                            {{ $property->pincode ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Landmark --}}
                                <div class="col-md-6 mb-4">
                                    <div class="detail-box">
                                        <span>Landmark</span>
                                        <strong>
                                            {{ $property->landmark ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                {{-- Address --}}
                                <div class="col-md-6 mb-4">
                                    <div class="detail-box">
                                        <span>Detailed Address</span>
                                        <strong>
                                            {{ $property->address ?: 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                            </div>


                            {{-- Google Map --}}
                            @if($property->google_map_url)

                                <div class="location-link-box mt-2">

                                    <div>
                                        <span>Google Map Location</span>
                                        <strong>
                                            Location available
                                        </strong>
                                    </div>

                                    <a href="{{ $property->google_map_url }}" target="_blank" rel="noopener noreferrer"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="ti ti-map-2 me-1"></i>
                                        Open Map
                                    </a>

                                </div>

                            @endif


                            {{-- Coordinates --}}
                            @if($property->latitude || $property->longitude)

                                <div class="coordinates-box mt-3">

                                    <div>
                                        <span>Latitude</span>
                                        <strong>
                                            {{ $property->latitude ?: 'N/A' }}
                                        </strong>
                                    </div>

                                    <div>
                                        <span>Longitude</span>
                                        <strong>
                                            {{ $property->longitude ?: 'N/A' }}
                                        </strong>
                                    </div>

                                </div>

                            @endif

                        </div>
                    </div>


                    {{-- =================================================
                    RENTAL INFORMATION
                    ================================================== --}}
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ti ti-currency-rupee me-1"></i>
                                Rental Information
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="row">

                                {{-- Monthly Rent --}}
                                <div class="col-md-6 mb-3">

                                    <div class="price-box">

                                        <span>Monthly Rent</span>

                                        <h3>
                                            ₹{{ number_format($property->price) }}
                                        </h3>

                                        <small>
                                            per month
                                        </small>

                                    </div>

                                </div>


                                {{-- Security Deposit --}}
                                <div class="col-md-6 mb-3">

                                    <div class="price-box">

                                        <span>Security Deposit</span>

                                        <h3>
                                            @if($property->security_deposit)
                                                ₹{{ number_format($property->security_deposit) }}
                                            @else
                                                N/A
                                            @endif
                                        </h3>

                                        <small>
                                            refundable deposit
                                        </small>

                                    </div>

                                </div>

                            </div>


                            <div class="row mt-2">

                                {{-- Furnishing --}}
                                <div class="col-md-6 mb-3">

                                    <div class="detail-box">

                                        <span>Furnishing</span>

                                        <strong>
                                            {{ $property->furnishing ?: 'N/A' }}
                                        </strong>

                                    </div>

                                </div>


                                {{-- Available From --}}
                                <div class="col-md-6 mb-3">

                                    <div class="detail-box">

                                        <span>Available From</span>

                                        <strong>
                                            @if($property->available_from)
                                                {{ $property->available_from->format('d M Y') }}
                                            @else
                                                Not specified
                                            @endif
                                        </strong>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>


                    {{-- =================================================
                    DESCRIPTION
                    ================================================== --}}
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ti ti-align-left me-1"></i>
                                Property Description
                            </h5>
                        </div>

                        <div class="card-body">

                            @if($property->description)

                                <p class="mb-0 description-text">
                                    {!! nl2br(e($property->description)) !!}
                                </p>

                            @else

                                <p class="text-muted mb-0">
                                    No description provided.
                                </p>

                            @endif

                        </div>
                    </div>


                    {{-- =================================================
                    AMENITIES
                    ================================================== --}}
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ti ti-building-community me-1"></i>
                                Amenities
                            </h5>
                        </div>

                        <div class="card-body">

                            @if($property->propertyAmenities && $property->propertyAmenities->count())

                                <div class="row">

                                    @foreach($property->propertyAmenities as $amenity)

                                        <div class="col-md-4 col-sm-6 mb-3">

                                            <div class="amenity-item">

                                                @if($amenity->icon)
                                                    <i class="{{ $amenity->icon }}"></i>
                                                @else
                                                    <i class="ti ti-circle-check"></i>
                                                @endif

                                                <span>
                                                    {{ $amenity->name }}
                                                </span>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            @elseif(is_array($property->amenities) && count($property->amenities))

                                {{-- Fallback for old properties --}}
                                <div class="row">

                                    @foreach($property->amenities as $amenity)

                                        <div class="col-md-4 col-sm-6 mb-3">

                                            <div class="amenity-item">

                                                <i class="ti ti-circle-check"></i>

                                                <span>
                                                    {{ $amenity }}
                                                </span>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            @else

                                <p class="text-muted mb-0">
                                    No amenities added.
                                </p>

                            @endif

                        </div>
                    </div>

                </div>


                {{-- =====================================================
                RIGHT COLUMN
                ====================================================== --}}
                <div class="col-lg-4">


                    {{-- =================================================
                    PROPERTY STATUS
                    ================================================== --}}
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                Property Status
                            </h5>
                        </div>

                        <div class="card-body text-center">

                            @php
                                $statusClass = match ($property->status) {
                                    'approved' => 'bg-success',
                                    'pending' => 'bg-warning text-dark',
                                    'rejected' => 'bg-danger',
                                    'rented' => 'bg-info',
                                    'inactive' => 'bg-secondary',
                                    default => 'bg-secondary'
                                };
                            @endphp

                            <span class="badge {{ $statusClass }} status-badge">
                                {{ ucfirst($property->status) }}
                            </span>

                        </div>

                    </div>


                    {{-- =================================================
                    PROPERTY ACTIONS
                    ================================================== --}}
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                Property Actions
                            </h5>
                        </div>

                        <div class="card-body">

                            @if($property->status === 'pending')

                                <form action="{{ route('properties.approve', $property->id) }}" method="POST" class="mb-2">
                                    @csrf

                                    <button type="submit" class="btn btn-success w-100">
                                        <i class="ti ti-check me-1"></i>
                                        Approve Property
                                    </button>
                                </form>


                                <form action="{{ route('properties.reject', $property->id) }}" method="POST"
                                    onsubmit="return rejectProperty(event, this);">

                                    @csrf

                                    <input type="hidden" name="admin_remark" id="adminRemark">

                                    <button type="submit" class="btn btn-danger w-100">
                                        <i class="ti ti-x me-1"></i>
                                        Reject Property
                                    </button>

                                </form>


                            @elseif($property->status === 'approved')

                                <form action="{{ route('properties.rented', $property->id) }}" method="POST" class="mb-2">
                                    @csrf

                                    <button type="submit" class="btn btn-info w-100">
                                        <i class="ti ti-home-check me-1"></i>
                                        Mark as Rented
                                    </button>
                                </form>


                                <form action="{{ route('properties.disable', $property->id) }}" method="POST">
                                    @csrf

                                    <button type="submit" class="btn btn-warning w-100">
                                        <i class="ti ti-ban me-1"></i>
                                        Disable Property
                                    </button>
                                </form>


                            @elseif(
                                    $property->status === 'rejected' ||
                                    $property->status === 'rented' ||
                                    $property->status === 'inactive'
                                )

                                <form action="{{ route('properties.enable', $property->id) }}" method="POST">

                                    @csrf

                                    <button type="submit" class="btn btn-success w-100">
                                        <i class="ti ti-check me-1"></i>
                                        Enable Property
                                    </button>

                                </form>

                            @endif

                        </div>

                    </div>


                    {{-- =================================================
                    OWNER INFORMATION
                    ================================================== --}}
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ti ti-user me-1"></i>
                                Owner / Broker Information
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="owner-info mb-3">

                                <div class="owner-icon">
                                    <i class="ti ti-user"></i>
                                </div>

                                <div>
                                    <small>Owner / Broker Name</small>

                                    <strong>
                                        {{ $property->owner_name ?: 'N/A' }}
                                    </strong>
                                </div>

                            </div>


                            <div class="owner-info">

                                <div class="owner-icon">
                                    <i class="ti ti-phone"></i>
                                </div>

                                <div>
                                    <small>Phone Number</small>

                                    <strong>
                                        {{ $property->owner_phone ?: 'N/A' }}
                                    </strong>
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                    AVAILABILITY
                    ================================================== --}}
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ti ti-calendar me-1"></i>
                                Availability
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="availability-box">

                                <i class="ti ti-calendar"></i>

                                <div>

                                    <small>Available From</small>

                                    <strong>

                                        @if($property->available_from)
                                            {{ $property->available_from->format('d M Y') }}
                                        @else
                                            Not specified
                                        @endif

                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                    POSTED BY
                    ================================================== --}}
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                Posted By
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="posted-by-box">

                                <div class="posted-icon">
                                    <i class="ti ti-user-circle"></i>
                                </div>

                                <div>

                                    <small>
                                        Property Added By
                                    </small>

                                    <strong>
                                        {{ $property->user?->name ?: 'Admin' }}
                                    </strong>

                                    @if($property->user?->email)
                                        <span>
                                            {{ $property->user->email }}
                                        </span>
                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                    ADMIN REMARK
                    ================================================== --}}
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ti ti-message-circle me-1"></i>
                                Admin Remark
                            </h5>
                        </div>

                        <div class="card-body">

                            @if($property->admin_remark)

                                <div class="remark-box">
                                    {{ $property->admin_remark }}
                                </div>

                            @else

                                <p class="text-muted mb-0">
                                    No admin remark.
                                </p>

                            @endif

                        </div>

                    </div>


                    {{-- =================================================
                    DELETE
                    ================================================== --}}
                    <div class="card">

                        <div class="card-body">

                            <form action="{{ route('properties.destroy', $property->id) }}" method="POST"
                                onsubmit="return confirmDeleteProperty(event);">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-outline-danger w-100">
                                    <i class="ti ti-trash me-1"></i>
                                    Delete Property
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>


    {{-- =============================================================
    STYLES
    ============================================================= --}}
    <style>
        .property-title-block h3 {
            font-weight: 700;
            color: #212529;
        }

        .property-image {
            width: 100%;
            height: 210px;
            overflow: hidden;
            border-radius: 10px;
            background: #f5f6f8;
        }

        .property-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .3s ease;
        }

        .property-image:hover img {
            transform: scale(1.04);
        }

        .detail-box {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            height: 100%;
            border: 1px solid #f0f1f3;
        }

        .detail-box span {
            display: block;
            color: #6c757d;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .detail-box strong {
            display: block;
            font-size: 15px;
            color: #212529;
            word-break: break-word;
        }

        .price-box {
            padding: 20px;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            background: #fff;
        }

        .price-box span {
            display: block;
            color: #6c757d;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .price-box h3 {
            margin: 0;
            font-weight: 700;
        }

        .price-box small {
            color: #6c757d;
        }

        .description-text {
            line-height: 1.8;
            color: #555;
            white-space: normal;
        }

        .amenity-item {
            display: flex;
            align-items: center;
            gap: 9px;
            min-height: 42px;
            padding: 9px 12px;
            background: #f8f9fa;
            border-radius: 8px;
            border: 1px solid #f0f1f3;
        }

        .amenity-item i {
            font-size: 18px;
            color: #198754;
            flex-shrink: 0;
        }

        .amenity-item span {
            font-size: 14px;
            font-weight: 500;
            color: #343a40;
        }

        .status-badge {
            font-size: 14px;
            padding: 9px 18px;
            border-radius: 20px;
        }

        .owner-info,
        .availability-box {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .owner-icon,
        .posted-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #f1f3f5;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .owner-icon i,
        .posted-icon i {
            font-size: 20px;
        }

        .owner-info small,
        .availability-box small,
        .posted-by-box small {
            display: block;
            color: #6c757d;
            font-size: 12px;
            margin-bottom: 2px;
        }

        .owner-info strong,
        .availability-box strong,
        .posted-by-box strong {
            display: block;
            font-size: 14px;
        }

        .availability-box i {
            font-size: 28px;
        }

        .posted-by-box {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .posted-by-box span {
            display: block;
            color: #6c757d;
            font-size: 12px;
            margin-top: 2px;
        }

        .location-link-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 15px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
        }

        .location-link-box span {
            display: block;
            color: #6c757d;
            font-size: 12px;
            margin-bottom: 3px;
        }

        .location-link-box strong {
            font-size: 14px;
        }

        .coordinates-box {
            display: flex;
            gap: 30px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .coordinates-box span {
            display: block;
            color: #6c757d;
            font-size: 12px;
            margin-bottom: 3px;
        }

        .coordinates-box strong {
            font-size: 14px;
        }

        .remark-box {
            padding: 12px 14px;
            background: #fff8e1;
            border-radius: 8px;
            line-height: 1.6;
            font-size: 14px;
            border: 1px solid #ffecb5;
        }


        @media (max-width: 991px) {

            .property-image {
                height: 180px;
            }

        }


        @media (max-width: 575px) {

            .property-image {
                height: 220px;
            }

            .location-link-box {
                align-items: flex-start;
                flex-direction: column;
            }

            .coordinates-box {
                flex-direction: column;
                gap: 15px;
            }

        }
    </style>


    {{-- =============================================================
    JAVASCRIPT
    ============================================================= --}}
    <script>

        function rejectProperty(event, form) {

            event.preventDefault();

            const remark = prompt(
                'Enter a reason for rejecting this property:'
            );

            if (remark === null) {
                return false;
            }

            document.getElementById('adminRemark').value = remark;

            form.submit();

            return false;
        }


        function confirmDeleteProperty(event) {

            return confirm(
                'Are you sure you want to permanently delete this property and all its images?'
            );

        }

    </script>

@endsection