@extends('layout.mainlayout')

@section('content')

<div class="property-details-page">

    <div class="property-details-container">

        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div class="property-details-header">

            <div>

                <a
                    href="{{ route('properties.all') }}"
                    class="property-back-btn"
                >
                    <i class="ti ti-arrow-left"></i>

                    Back to Properties
                </a>

                <h3 class="property-details-title">
                    Property Details
                </h3>

                <p class="property-details-subtitle">
                    Review submitted property information
                </p>

            </div>

        </div>


        {{-- =====================================================
             SUCCESS MESSAGE
        ====================================================== --}}

        @if(session('success'))

            <div class="property-alert-success">

                <i class="ti ti-circle-check"></i>

                {{ session('success') }}

            </div>

        @endif


        {{-- =====================================================
             PROPERTY INFORMATION
        ====================================================== --}}

        <div class="property-details-card">

            <div class="property-details-card-header">

                <div>

                    <h4>
                        {{ $property->property_type }}
                    </h4>

                    <span>
                        Property #{{ $property->id }}
                    </span>

                </div>


                @php

                    $statusClass = match($property->status) {

                        'approved' =>
                            'property-status-approved',

                        'rejected' =>
                            'property-status-rejected',

                        'rented' =>
                            'property-status-rented',

                        'inactive' =>
                            'property-status-inactive',

                        default =>
                            'property-status-pending',

                    };

                @endphp


                <span class="property-details-status {{ $statusClass }}">

                    {{ ucfirst($property->status) }}

                </span>

            </div>


            {{-- =================================================
                 BASIC INFORMATION
            ================================================== --}}

            <div class="property-details-grid">

                <div class="property-info-item">

                    <span>
                        Listing For
                    </span>

                    <strong>
                        {{ $property->listing_for }}
                    </strong>

                </div>


                <div class="property-info-item">

                    <span>
                        Property Type
                    </span>

                    <strong>
                        {{ $property->property_type }}
                    </strong>

                </div>


                <div class="property-info-item">

                    <span>
                        Location
                    </span>

                    <strong>
                        {{ $property->locality }}
                    </strong>

                </div>


                <div class="property-info-item">

                    <span>
                        BHK
                    </span>

                    <strong>
                        {{ $property->bhk ?: '-' }}
                    </strong>

                </div>


                <div class="property-info-item">

                    <span>
                        Area
                    </span>

                    <strong>
                        {{ $property->area_sqft ? $property->area_sqft . ' sq ft' : '-' }}
                    </strong>

                </div>


                <div class="property-info-item">

                    <span>
                        Price
                    </span>

                    <strong>
                        ₹ {{ number_format($property->price, 2) }}
                    </strong>

                </div>


                <div class="property-info-item">

                    <span>
                        Furnishing
                    </span>

                    <strong>
                        {{ $property->furnishing ?: '-' }}
                    </strong>

                </div>


                <div class="property-info-item">

                    <span>
                        Owner Name
                    </span>

                    <strong>
                        {{ $property->owner_name }}
                    </strong>

                </div>


                <div class="property-info-item">

                    <span>
                        Owner Phone
                    </span>

                    <strong>
                        {{ $property->owner_phone }}
                    </strong>

                </div>

            </div>


            {{-- =================================================
                 ADDRESS
            ================================================== --}}

            <div class="property-details-section">

                <h5>
                    Address
                </h5>

                <p>
                    {{ $property->address ?: 'No address provided.' }}
                </p>

            </div>


            {{-- =================================================
                 AMENITIES
            ================================================== --}}

            <div class="property-details-section">

                <h5>
                    Amenities
                </h5>

                @if(!empty($property->amenities))

                    <div class="property-amenities">

                        @foreach($property->amenities as $amenity)

                            <span>
                                {{ $amenity }}
                            </span>

                        @endforeach

                    </div>

                @else

                    <p>
                        No amenities selected.
                    </p>

                @endif

            </div>


            {{-- =================================================
                 PHOTOS
            ================================================== --}}

            <div class="property-details-section">

                <h5>
                    Property Photos
                </h5>

                @if($property->images->count())

                    <div class="property-photo-grid">

                        @foreach($property->images as $image)

                            <div class="property-photo">

                                <img
                                    src="{{ asset('storage/' . $image->image_path) }}"
                                    alt="Property Image"
                                >

                            </div>

                        @endforeach

                    </div>

                @else

                    <p>
                        No photos uploaded.
                    </p>

                @endif

            </div>


            {{-- =================================================
                 ADMIN REMARK
            ================================================== --}}

            @if($property->admin_remark)

                <div class="property-admin-remark">

                    <h5>
                        Admin Remark
                    </h5>

                    <p>
                        {{ $property->admin_remark }}
                    </p>

                </div>

            @endif


            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="property-details-actions">

                @if($property->status !== 'approved')

                    <form
                        method="POST"
                        action="{{ route('properties.approve', $property->id) }}"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="property-action-btn property-action-approve"
                        >

                            <i class="ti ti-check"></i>

                            Approve

                        </button>

                    </form>

                @endif


                @if($property->status !== 'rejected')

                    <form
                        method="POST"
                        action="{{ route('properties.reject', $property->id) }}"
                    >

                        @csrf

                        <input
                            type="text"
                            name="admin_remark"
                            placeholder="Rejection reason"
                            class="property-reject-input"
                        >

                        <button
                            type="submit"
                            class="property-action-btn property-action-reject"
                        >

                            <i class="ti ti-x"></i>

                            Reject

                        </button>

                    </form>

                @endif


                @if($property->status === 'approved')

                    <form
                        method="POST"
                        action="{{ route('properties.rented', $property->id) }}"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="property-action-btn property-action-rented"
                        >

                            <i class="ti ti-home-check"></i>

                            Mark Rented

                        </button>

                    </form>

                @endif


                @if($property->status !== 'inactive')

                    <form
                        method="POST"
                        action="{{ route('properties.disable', $property->id) }}"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="property-action-btn property-action-disable"
                        >

                            <i class="ti ti-ban"></i>

                            Disable

                        </button>

                    </form>

                @else

                    <form
                        method="POST"
                        action="{{ route('properties.enable', $property->id) }}"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="property-action-btn property-action-enable"
                        >

                            <i class="ti ti-check"></i>

                            Enable

                        </button>

                    </form>

                @endif

            </div>

        </div>

    </div>

</div>


<style>

/* =========================================================
   PROPERTY DETAILS PAGE
========================================================= */

.property-details-page {
    width: 100%;
    max-width: 100%;
    min-width: 0;

    margin: 0;
    padding: 0;

    box-sizing: border-box;

    overflow-x: hidden;
}

.property-details-container {
    width: 100%;
    max-width: 1200px;

    margin: 0 auto;

    padding: 28px 30px 40px;

    box-sizing: border-box;
    margin-top: 50px;
}


/* =========================================================
   HEADER
========================================================= */

.property-details-header {
    margin-bottom: 24px;
}

.property-back-btn {
    display: inline-flex;

    align-items: center;

    gap: 6px;

    margin-bottom: 14px;

    color: #687389;

    font-size: 12px;

    font-weight: 600;

    text-decoration: none;
}

.property-back-btn:hover {
    color: #071b3d;
}

.property-details-title {
    margin: 0 0 5px;

    color: #071b3d;

    font-size: 25px;

    font-weight: 700;
}

.property-details-subtitle {
    margin: 0;

    color: #687389;

    font-size: 13px;
}


/* =========================================================
   SUCCESS
========================================================= */

.property-alert-success {
    display: flex;

    align-items: center;

    gap: 8px;

    margin-bottom: 20px;

    padding: 12px 15px;

    background: #ecfdf3;

    border: 1px solid #b7ebc6;

    border-radius: 9px;

    color: #18794e;

    font-size: 13px;

    font-weight: 600;
}


/* =========================================================
   CARD
========================================================= */

.property-details-card {
    width: 100%;

    background: #ffffff;

    border: 1px solid #e5eaf1;

    border-radius: 14px;

    box-shadow:
        0 4px 15px rgba(7, 27, 61, .04),
        0 12px 35px rgba(7, 27, 61, .04);

    overflow: hidden;
}


/* =========================================================
   CARD HEADER
========================================================= */

.property-details-card-header {
    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 20px;

    padding: 22px 24px;

    border-bottom: 1px solid #edf0f4;
}

.property-details-card-header h4 {
    margin: 0 0 5px;

    color: #071b3d;

    font-size: 18px;

    font-weight: 700;
}

.property-details-card-header span {
    color: #8a94a6;

    font-size: 11px;
}


/* =========================================================
   STATUS
========================================================= */

.property-details-status {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    min-width: 85px;

    min-height: 32px;

    padding: 0 14px;

    border-radius: 8px;

    font-size: 11px !important;

    font-weight: 700 !important;
}

.property-status-pending {
    background: #fff7e6;
    color: #b7791f !important;
}

.property-status-approved {
    background: #ecfdf3;
    color: #18794e !important;
}

.property-status-rejected {
    background: #fff1f2;
    color: #e52229 !important;
}

.property-status-rented {
    background: #eef3ff;
    color: #3157a6 !important;
}

.property-status-inactive {
    background: #f1f3f5;
    color: #687389 !important;
}


/* =========================================================
   INFORMATION GRID
========================================================= */

.property-details-grid {
    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 0;

    border-bottom: 1px solid #edf0f4;
}

.property-info-item {
    min-height: 88px;

    padding: 18px 22px;

    border-right: 1px solid #edf0f4;

    border-bottom: 1px solid #edf0f4;
}

.property-info-item:nth-child(3n) {
    border-right: 0;
}

.property-info-item span {
    display: block;

    margin-bottom: 7px;

    color: #8a94a6;

    font-size: 10px;

    font-weight: 500;

    text-transform: uppercase;

    letter-spacing: .3px;
}

.property-info-item strong {
    display: block;

    color: #071b3d;

    font-size: 13px;

    font-weight: 700;
}


/* =========================================================
   SECTION
========================================================= */

.property-details-section {
    padding: 22px 24px;

    border-bottom: 1px solid #edf0f4;
}

.property-details-section h5,
.property-admin-remark h5 {
    margin: 0 0 12px;

    color: #071b3d;

    font-size: 14px;

    font-weight: 700;
}

.property-details-section p {
    margin: 0;

    color: #687389;

    font-size: 12px;

    line-height: 1.7;
}


/* =========================================================
   AMENITIES
========================================================= */

.property-amenities {
    display: flex;

    flex-wrap: wrap;

    gap: 8px;
}

.property-amenities span {
    display: inline-flex;

    align-items: center;

    padding: 7px 11px;

    background: #f3f6fa;

    border-radius: 7px;

    color: #344158;

    font-size: 10px;

    font-weight: 600;
}


/* =========================================================
   PHOTOS
========================================================= */

.property-photo-grid {
    display: grid;

    grid-template-columns:
        repeat(4, minmax(0, 1fr));

    gap: 12px;
}

.property-photo {
    height: 170px;

    border-radius: 10px;

    overflow: hidden;

    background: #f4f6f9;
}

.property-photo img {
    display: block;

    width: 100%;

    height: 100%;

    object-fit: cover;

    transition: transform .25s ease;
}

.property-photo:hover img {
    transform: scale(1.04);
}


/* =========================================================
   ADMIN REMARK
========================================================= */

.property-admin-remark {
    margin: 20px 24px;

    padding: 15px;

    background: #fff7e6;

    border: 1px solid #f4d99a;

    border-radius: 9px;
}

.property-admin-remark p {
    margin: 0;

    color: #805b16;

    font-size: 12px;

    line-height: 1.6;
}


/* =========================================================
   ACTIONS
========================================================= */

.property-details-actions {
    display: flex;

    align-items: center;

    flex-wrap: wrap;

    gap: 10px;

    padding: 20px 24px;

    background: #fafbfd;

    border-top: 1px solid #edf0f4;
}

.property-details-actions form {
    display: flex;

    align-items: center;

    gap: 8px;

    margin: 0;
}

.property-action-btn {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 6px;

    min-height: 38px;

    padding: 0 15px;

    border: 0;

    border-radius: 8px;

    color: #ffffff;

    font-size: 11px;

    font-weight: 600;

    cursor: pointer;

    transition: all .2s ease;
}

.property-action-btn:hover {
    transform: translateY(-1px);
}


/* Approve */

.property-action-approve {
    background: #18794e;
}

.property-action-approve:hover {
    background: #12613e;
}


/* Reject */

.property-action-reject {
    background: #e52229;
}

.property-action-reject:hover {
    background: #c91b21;
}


/* Rented */

.property-action-rented {
    background: #3157a6;
}

.property-action-rented:hover {
    background: #244487;
}


/* Disable */

.property-action-disable {
    background: #687389;
}

.property-action-disable:hover {
    background: #4f5d72;
}


/* Enable */

.property-action-enable {
    background: #18794e;
}


/* Reject input */

.property-reject-input {
    width: 190px;

    height: 38px;

    padding: 0 11px;

    border: 1px solid #dce2ea;

    border-radius: 8px;

    background: #ffffff;

    color: #344158;

    font-size: 11px;

    outline: none;
}

.property-reject-input:focus {
    border-color: #9ba9bd;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .property-details-container {
        padding: 20px 15px 30px;
    }

    .property-details-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

    .property-info-item:nth-child(3n) {
        border-right: 1px solid #edf0f4;
    }

    .property-info-item:nth-child(2n) {
        border-right: 0;
    }

    .property-photo-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

}


@media (max-width: 576px) {

    .property-details-container {
        padding: 16px 10px 25px;
    }

    .property-details-title {
        font-size: 20px;
    }

    .property-details-card-header {
        align-items: flex-start;

        flex-direction: column;

        padding: 18px;
    }

    .property-details-grid {
        grid-template-columns: 1fr;
    }

    .property-info-item {
        border-right: 0 !important;
    }

    .property-photo-grid {
        grid-template-columns: 1fr;
    }

    .property-photo {
        height: 220px;
    }

    .property-details-actions {
        align-items: stretch;

        flex-direction: column;
    }

    .property-details-actions form {
        width: 100%;
    }

    .property-action-btn {
        width: 100%;
    }

    .property-reject-input {
        width: 100%;
    }

}

</style>

@endsection