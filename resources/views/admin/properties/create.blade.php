@extends('layout.mainlayout')

@section('content')

    <style>
        /* =========================================================
           PROPERTY CREATE PAGE
           Same layout/UI structure as Contact Enquiries
        ========================================================= */

        .property-create-page {
            position: relative;

            width: 100%;
            max-width: 100%;

            min-width: 0;

            margin: 0;
            padding: 0;

            box-sizing: border-box;

            overflow-x: hidden;
        }


        /* =========================================================
           MAIN
        ========================================================= */

        .property-create-main {
            width: 100%;
            max-width: 100%;

            min-width: 0;

            margin: 0;
            padding: 28px 30px 35px;

            box-sizing: border-box;

            overflow-x: hidden;

            margin-top: 50px;
        }


        /* =========================================================
           PAGE HEADER
        ========================================================= */

        .property-create-header {
            width: 100%;

            margin: 0 0 24px;
            padding: 0;

            box-sizing: border-box;
        }

        .property-create-title {
            margin: 0 0 6px;

            color: #071b3d !important;

            font-size: 25px !important;
            font-weight: 700 !important;

            line-height: 1.3 !important;
        }

        .property-create-subtitle {
            margin: 0;

            color: #687389 !important;

            font-size: 13px !important;
            font-weight: 400 !important;

            line-height: 1.5 !important;
        }


        /* =========================================================
           ALERT
        ========================================================= */

        .property-create-alert {
            display: flex;
            align-items: flex-start;

            width: 100%;
            min-height: 44px;

            margin: 0 0 18px;
            padding: 11px 15px;

            box-sizing: border-box;

            border-radius: 9px;

            font-size: 13px;
            font-weight: 600;
        }

        .property-create-alert-success {
            background: #ecfdf3;

            border: 1px solid #b7ebc6;

            color: #18794e;
        }

        .property-create-alert-danger {
            background: #fff1f2;

            border: 1px solid #fecdd3;

            color: #e52229;
        }

        .property-create-alert-danger ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .property-create-alert-danger li {
            margin-bottom: 3px;
            font-size: 11px;
            font-weight: 400;
        }


        /* =========================================================
           CARD
        ========================================================= */

        .property-create-card {
            width: 100%;
            max-width: 100%;

            min-width: 0;

            margin: 0;
            padding: 0;

            box-sizing: border-box;

            background: #ffffff;

            border: 1px solid #e5eaf1;

            border-radius: 14px;

            overflow: hidden;

            box-shadow:
                0 4px 15px rgba(7, 27, 61, 0.04),
                0 12px 35px rgba(7, 27, 61, 0.04);
        }


        /* =========================================================
           FORM
        ========================================================= */

        .property-create-form {
            width: 100%;

            margin: 0;
            padding: 0;

            box-sizing: border-box;
        }


        /* =========================================================
           FORM SECTION
        ========================================================= */

        .property-form-section {
            width: 100%;

            margin: 0;
            padding: 25px 25px 27px;

            box-sizing: border-box;

            border-bottom: 1px solid #edf0f4;
        }

        .property-form-section:last-child {
            border-bottom: 0;
        }


        /* =========================================================
           SECTION HEADER
        ========================================================= */

        .property-form-section-header {
            display: flex;

            align-items: center;

            gap: 10px;

            margin: 0 0 20px;

            padding: 0 0 13px;

            border-bottom: 1px solid #edf0f4;
        }

        .property-form-section-icon {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            width: 32px;
            height: 32px;

            flex-shrink: 0;

            background: #f3f6fa;

            border-radius: 8px;

            color: #071b3d;

            font-size: 16px;
        }

        .property-form-section-title {
            margin: 0;

            color: #071b3d !important;

            font-size: 15px !important;

            font-weight: 700 !important;

            line-height: 1.4 !important;
        }

        .property-form-section-subtitle {
            margin: 2px 0 0;

            color: #8a94a6;

            font-size: 10px;

            line-height: 1.4;
        }


        /* =========================================================
           LABEL
        ========================================================= */

        .property-form-label {
            display: block;

            margin: 0 0 7px;

            color: #071b3d !important;

            font-size: 11px;

            font-weight: 700;

            line-height: 1.4;
        }

        .property-form-required {
            color: #e52229;

            margin-left: 2px;
        }


        /* =========================================================
           INPUTS
        ========================================================= */

        .property-form-control,
        .property-form-select {
            display: block;

            width: 100%;

            min-height: 44px;

            padding: 9px 12px;

            box-sizing: border-box;

            background: #ffffff;

            border: 1px solid #dfe4eb;

            border-radius: 8px;

            color: #344158;

            font-size: 12px;

            font-weight: 400;

            outline: none;

            box-shadow: none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease;
        }

        .property-form-control::placeholder {
            color: #a0a8b5;

            font-size: 11px;
        }

        .property-form-control:focus,
        .property-form-select:focus {
            border-color: #071b3d;

            box-shadow:
                0 0 0 3px rgba(7, 27, 61, .06);
        }

        textarea.property-form-control {
            min-height: 115px;

            resize: vertical;

            line-height: 1.6;
        }

        input[type="date"].property-form-control {
            color: #344158;
        }


        /* =========================================================
           FORM HELP TEXT
        ========================================================= */

        .property-form-help {
            display: block;

            margin-top: 5px;

            color: #8a94a6;

            font-size: 9px;

            line-height: 1.4;
        }


        /* =========================================================
           GRID
        ========================================================= */

        .property-form-row {
            display: grid;

            grid-template-columns:
                repeat(12, minmax(0, 1fr));

            gap: 18px;
        }

        .property-col-12 {
            grid-column: span 12;
        }

        .property-col-8 {
            grid-column: span 8;
        }

        .property-col-6 {
            grid-column: span 6;
        }

        .property-col-4 {
            grid-column: span 4;
        }


        /* =========================================================
           AMENITIES
        ========================================================= */

        .property-amenities-wrapper {
            display: flex;

            flex-wrap: wrap;

            gap: 8px;
        }

        .property-amenity-item {
            position: relative;

            display: inline-flex;

            align-items: center;

            gap: 7px;

            min-height: 36px;

            padding: 0 11px;

            background: #f8f9fb;

            border: 1px solid #e2e6ec;

            border-radius: 8px;

            color: #4f5d72;

            font-size: 10px;

            font-weight: 600;

            cursor: pointer;

            transition: all .2s ease;
        }

        .property-amenity-item:hover {
            background: #f3f6fa;

            border-color: #cbd3df;

            color: #071b3d;
        }

        .property-amenity-item input {
            width: 14px;
            height: 14px;

            margin: 0;

            accent-color: #071b3d;

            cursor: pointer;
        }

        .property-amenity-item:has(input:checked) {
            background: #eef3ff;

            border-color: #b9c8e8;

            color: #071b3d;
        }


        /* =========================================================
           IMAGE UPLOAD
        ========================================================= */

        .property-image-upload {
            width: 100%;

            padding: 25px 20px;

            box-sizing: border-box;

            background: #fafbfd;

            border: 1px dashed #cbd3df;

            border-radius: 10px;

            text-align: center;

            transition: all .2s ease;
        }

        .property-image-upload:hover {
            background: #f7f9fc;

            border-color: #071b3d;
        }

        .property-image-upload-icon {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            width: 48px;
            height: 48px;

            margin-bottom: 10px;

            background: #f3f6fa;

            border-radius: 10px;

            color: #071b3d;

            font-size: 22px;
        }

        .property-image-upload-title {
            margin: 0 0 4px;

            color: #071b3d;

            font-size: 12px;

            font-weight: 700;
        }

        .property-image-upload-text {
            margin: 0 0 15px;

            color: #8a94a6;

            font-size: 10px;
        }

        .property-image-input {
            width: 100%;

            min-height: 42px;

            padding: 8px;

            background: #ffffff;

            border: 1px solid #dfe4eb;

            border-radius: 8px;

            color: #687389;

            font-size: 10px;

            cursor: pointer;
        }


        /* =========================================================
           ACTIONS
        ========================================================= */

        .property-create-actions {
            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 10px;

            width: 100%;

            margin: 0;

            padding: 20px 25px;

            box-sizing: border-box;

            background: #ffffff;

            border-top: 1px solid #edf0f4;
        }

        .property-btn-cancel,
        .property-btn-submit {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 40px;

            padding: 0 18px;

            border-radius: 8px;

            font-size: 11px;

            font-weight: 700;

            text-decoration: none;

            cursor: pointer;

            transition: all .2s ease;
        }

        .property-btn-cancel {
            min-width: 100px;

            background: #ffffff;

            border: 1px solid #dfe4eb;

            color: #687389 !important;
        }

        .property-btn-cancel:hover {
            background: #f5f7fa;

            border-color: #cbd3df;

            color: #071b3d !important;
        }

        .property-btn-submit {
            min-width: 170px;

            background: #071b3d;

            border: 1px solid #071b3d;

            color: #ffffff !important;
        }

        .property-btn-submit:hover {
            background: #0d2c60;

            border-color: #0d2c60;

            color: #ffffff !important;

            transform: translateY(-1px);
        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 991px) {

            .property-create-main {
                padding: 20px 15px 30px;
            }

            .property-form-section {
                padding: 22px 20px 24px;
            }

            .property-create-actions {
                padding: 18px 20px;
            }

            .property-col-8,
            .property-col-6 {
                grid-column: span 12;
            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 576px) {

            .property-create-main {
                padding: 16px 10px 25px;
            }

            .property-create-title {
                font-size: 20px !important;
            }

            .property-create-subtitle {
                font-size: 11px !important;
            }

            .property-form-section {
                padding: 20px 15px 22px;
            }

            .property-form-row {
                grid-template-columns: 1fr;

                gap: 15px;
            }

            .property-col-12,
            .property-col-8,
            .property-col-6,
            .property-col-4 {
                grid-column: span 1;
            }

            .property-create-actions {
                flex-direction: column;

                padding: 16px 15px;
            }

            .property-btn-cancel,
            .property-btn-submit {
                width: 100%;
            }

            .property-amenity-item {
                width: 100%;
            }

        }
    </style>


    <div class="property-create-page">

        <div class="property-create-main">


            {{-- =====================================================
            PAGE HEADER
            ====================================================== --}}

            <div class="property-create-header">

                <h3 class="property-create-title">

                    Add Rent Property

                </h3>

                <p class="property-create-subtitle">

                    Publish a rental property directly from the admin portal.

                </p>

            </div>


            {{-- =====================================================
            VALIDATION ERRORS
            ====================================================== --}}

            @if ($errors->any())

                <div class="property-create-alert property-create-alert-danger">

                    <i class="ti ti-alert-circle me-2"></i>

                    <div>

                        <strong>
                            Please fix the following errors:
                        </strong>

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            @endif


            {{-- =====================================================
            SUCCESS MESSAGE
            ====================================================== --}}

            @if(session('success'))

                <div class="property-create-alert property-create-alert-success">

                    <i class="ti ti-circle-check me-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            @if(session('error'))
                <div class="property-create-alert property-create-alert-danger">
                    <i class="ti ti-alert-circle me-2"></i>

                    <div>
                        <strong>Error:</strong>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            {{-- =====================================================
            FORM CARD
            ====================================================== --}}

            <div class="property-create-card">

                <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data"
                    class="property-create-form">

                    @csrf


                    {{-- =================================================
                    BASIC PROPERTY INFORMATION
                    ================================================== --}}

                    <div class="property-form-section">

                        <div class="property-form-section-header">

                            <div class="property-form-section-icon">

                                <i class="ti ti-building"></i>

                            </div>

                            <div>

                                <h5 class="property-form-section-title">

                                    Basic Property Information

                                </h5>

                                <p class="property-form-section-subtitle">

                                    Enter the main information about the rental property.

                                </p>

                            </div>

                        </div>


                        <div class="property-form-row">


                            {{-- PROPERTY TITLE --}}

                            <div class="property-col-8">

                                <label class="property-form-label">

                                    Property Title

                                    <span class="property-form-required">*</span>

                                </label>

                                <input type="text" name="property_title" class="property-form-control"
                                    value="{{ old('property_title') }}" placeholder="e.g. Spacious 3 BHK Apartment"
                                    required>

                            </div>


                            {{-- PROPERTY TYPE --}}

                            <div class="property-col-4">

                                <label class="property-form-label">

                                    Property Type

                                    <span class="property-form-required">*</span>

                                </label>

                                <select name="property_type" class="property-form-select" required>

                                    <option value="">
                                        Select Property Type
                                    </option>

                                    <option value="Apartment" {{ old('property_type') == 'Apartment' ? 'selected' : '' }}>
                                        Apartment
                                    </option>

                                    <option value="Villa" {{ old('property_type') == 'Villa' ? 'selected' : '' }}>
                                        Villa
                                    </option>

                                    <option value="Independent House" {{ old('property_type') == 'Independent House' ? 'selected' : '' }}>
                                        Independent House
                                    </option>

                                    <option value="Plot" {{ old('property_type') == 'Plot' ? 'selected' : '' }}>
                                        Plot
                                    </option>

                                </select>

                            </div>


                            {{-- LISTING FOR --}}

                            <div class="property-col-4">

                                <label class="property-form-label">

                                    Listing For

                                    <span class="property-form-required">*</span>

                                </label>

                                <select name="listing_for" class="property-form-select" required>

                                    <option value="">
                                        Select Listing For
                                    </option>

                                    <option value="Rent" {{ old('listing_for') == 'Rent' ? 'selected' : '' }}>
                                        Rent
                                    </option>

                                    <option value="Lease" {{ old('listing_for') == 'Lease' ? 'selected' : '' }}>
                                        Lease
                                    </option>

                                    <option value="PG" {{ old('listing_for') == 'PG' ? 'selected' : '' }}>
                                        PG
                                    </option>

                                    <option value="Sell" {{ old('listing_for') == 'Sell' ? 'selected' : '' }}>
                                        Sell
                                    </option>

                                </select>

                            </div>


                            {{-- BHK --}}

                            <div class="property-col-4">

                                <label class="property-form-label">

                                    Bedrooms / BHK

                                </label>

                                <select name="bhk" class="property-form-select">

                                    <option value="">
                                        Select BHK
                                    </option>

                                    @foreach(
                                            [
                                                '1 BHK',
                                                '2 BHK',
                                                '3 BHK',
                                                '4 BHK',
                                                '5 BHK',
                                                '6+ BHK'
                                            ]
                                            as $bhk
                                        )

                                        <option value="{{ $bhk }}" {{ old('bhk') == $bhk ? 'selected' : '' }}>

                                            {{ $bhk }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- BATHROOMS --}}

                            <div class="property-col-4">

                                <label class="property-form-label">

                                    Bathrooms

                                </label>

                                <input type="number" name="bathrooms" class="property-form-control"
                                    value="{{ old('bathrooms') }}" min="1" placeholder="e.g. 2">

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                    LOCATION
                    ================================================== --}}

                    <div class="property-form-section">

                        <div class="property-form-section-header">

                            <div class="property-form-section-icon">

                                <i class="ti ti-map-pin"></i>

                            </div>

                            <div>

                                <h5 class="property-form-section-title">

                                    Location Details

                                </h5>

                                <p class="property-form-section-subtitle">

                                    Provide the property location and address.

                                </p>

                            </div>

                        </div>


                        <div class="property-form-row">

                            {{-- COUNTRY --}}
                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Country
                                    <span class="property-form-required">*</span>
                                </label>

                                <select name="country" class="property-form-select" required>
                                    <option value="">Select Country</option>

                                    <option value="India" {{ old('country', 'India') == 'India' ? 'selected' : '' }}>
                                        India
                                    </option>

                                </select>

                            </div>


                            {{-- STATE --}}
                            <div class="property-col-4">

                                <label class="property-form-label">
                                    State
                                    <span class="property-form-required">*</span>
                                </label>

                                <select name="state" class="property-form-select" required>
                                    <option value="">Select State</option>

                                    <option value="Andhra Pradesh" {{ old('state') == 'Andhra Pradesh' ? 'selected' : '' }}>
                                        Andhra Pradesh
                                    </option>

                                    <option value="Telangana" {{ old('state') == 'Telangana' ? 'selected' : '' }}>
                                        Telangana
                                    </option>

                                    <option value="Karnataka" {{ old('state') == 'Karnataka' ? 'selected' : '' }}>
                                        Karnataka
                                    </option>

                                    <option value="Tamil Nadu" {{ old('state') == 'Tamil Nadu' ? 'selected' : '' }}>
                                        Tamil Nadu
                                    </option>

                                    <option value="Kerala" {{ old('state') == 'Kerala' ? 'selected' : '' }}>
                                        Kerala
                                    </option>

                                </select>

                            </div>


                            {{-- DISTRICT --}}
                            <div class="property-col-4">

                                <label class="property-form-label">
                                    District
                                    <span class="property-form-required">*</span>
                                </label>

                                <input type="text" name="district" class="property-form-control"
                                    value="{{ old('district') }}" placeholder="e.g. Annamayya" required>

                            </div>


                            {{-- CITY --}}
                            <div class="property-col-4">

                                <label class="property-form-label">
                                    City
                                    <span class="property-form-required">*</span>
                                </label>

                                <input type="text" name="city" class="property-form-control" value="{{ old('city') }}"
                                    placeholder="e.g. Rajampet" required>

                            </div>


                            {{-- LOCALITY --}}
                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Area / Locality
                                    <span class="property-form-required">*</span>
                                </label>

                                <input type="text" name="locality" class="property-form-control"
                                    value="{{ old('locality') }}" placeholder="e.g. Bharath Nagar" required>

                            </div>


                            {{-- PINCODE --}}
                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Pincode
                                </label>

                                <input type="text" name="pincode" class="property-form-control" value="{{ old('pincode') }}"
                                    placeholder="e.g. 516115" maxlength="6">

                            </div>


                            {{-- LANDMARK --}}
                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Landmark
                                </label>

                                <input type="text" name="landmark" class="property-form-control"
                                    value="{{ old('landmark') }}" placeholder="e.g. Near Bus Stand">

                            </div>


                            {{-- ADDRESS --}}
                            <div class="property-col-8">

                                <label class="property-form-label">
                                    Detailed Address
                                </label>

                                <textarea name="address" class="property-form-control"
                                    placeholder="Enter complete property address">{{ old('address') }}</textarea>

                            </div>


                            {{-- GOOGLE MAP --}}
                            <div class="property-col-12">

                                <label class="property-form-label">
                                    Google Map Location
                                </label>

                                <input type="url" name="google_map_url" class="property-form-control"
                                    value="{{ old('google_map_url') }}" placeholder="https://maps.google.com/...">

                                <span class="property-form-help">
                                    Paste the Google Maps location URL for this property.
                                </span>

                            </div>


                            {{-- LATITUDE --}}
                            <div class="property-col-6">

                                <label class="property-form-label">
                                    Latitude
                                </label>

                                <input type="text" name="latitude" class="property-form-control"
                                    value="{{ old('latitude') }}" placeholder="e.g. 14.0516">

                            </div>


                            {{-- LONGITUDE --}}
                            <div class="property-col-6">

                                <label class="property-form-label">
                                    Longitude
                                </label>

                                <input type="text" name="longitude" class="property-form-control"
                                    value="{{ old('longitude') }}" placeholder="e.g. 79.1240">

                            </div>

                        </div>
                    </div>


                    {{-- =================================================
                    RENT & PROPERTY DETAILS
                    ================================================== --}}

                    <div class="property-form-section">

                        <div class="property-form-section-header">

                            <div class="property-form-section-icon">
                                <i class="ti ti-building"></i>
                            </div>

                            <div>

                                <h5 class="property-form-section-title">
                                    Rent & Property Details
                                </h5>

                                <p class="property-form-section-subtitle">
                                    Add rental price, property size, furnishing and property specifications.
                                </p>

                            </div>

                        </div>


                        <div class="property-form-row">


                            {{-- =================================================
                            MONTHLY RENT
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">

                                    Monthly Rent

                                    <span class="property-form-required">*</span>

                                </label>

                                <input type="number" name="price" class="property-form-control" value="{{ old('price') }}"
                                    min="0" step="0.01" placeholder="₹ 45,000" required>

                            </div>


                            {{-- =================================================
                            SECURITY DEPOSIT
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Security Deposit
                                </label>

                                <input type="number" name="security_deposit" class="property-form-control"
                                    value="{{ old('security_deposit') }}" min="0" step="0.01" placeholder="₹ 2,50,000">

                            </div>


                            {{-- =================================================
                            PROPERTY AREA
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">

                                    Property Area (sq.ft)

                                    <span class="property-form-required">*</span>

                                </label>

                                <input type="number" name="area_sqft" class="property-form-control"
                                    value="{{ old('area_sqft') }}" min="1" placeholder="e.g. 1650" required>

                            </div>


                            {{-- =================================================
                            BUILT-UP AREA
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Built-up Area (sq.ft)
                                </label>

                                <input type="number" name="built_up_area" class="property-form-control"
                                    value="{{ old('built_up_area') }}" min="1" placeholder="e.g. 1500">

                            </div>


                            {{-- =================================================
                            CARPET AREA
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Carpet Area (sq.ft)
                                </label>

                                <input type="number" name="carpet_area" class="property-form-control"
                                    value="{{ old('carpet_area') }}" min="1" placeholder="e.g. 1250">

                            </div>


                            {{-- =================================================
                            FURNISHING
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">

                                    Furnishing Status

                                    <span class="property-form-required">*</span>

                                </label>

                                <select name="furnishing" class="property-form-select" required>

                                    <option value="">
                                        Select Furnishing
                                    </option>

                                    <option value="Fully Furnished" {{ old('furnishing') == 'Fully Furnished' ? 'selected' : '' }}>
                                        Fully Furnished
                                    </option>

                                    <option value="Semi Furnished" {{ old('furnishing') == 'Semi Furnished' ? 'selected' : '' }}>
                                        Semi Furnished
                                    </option>

                                    <option value="Unfurnished" {{ old('furnishing') == 'Unfurnished' ? 'selected' : '' }}>
                                        Unfurnished
                                    </option>

                                </select>

                            </div>


                            {{-- =================================================
                            AVAILABLE FROM
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Available From
                                </label>

                                <input type="date" name="available_from" class="property-form-control"
                                    value="{{ old('available_from') }}">

                            </div>


                            {{-- =================================================
                            BALCONIES
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Balconies
                                </label>

                                <input type="number" name="balconies" class="property-form-control"
                                    value="{{ old('balconies') }}" min="0" placeholder="e.g. 2">

                            </div>


                            {{-- =================================================
                            FLOOR NUMBER
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Floor Number
                                </label>

                                <input type="number" name="floor_number" class="property-form-control"
                                    value="{{ old('floor_number') }}" min="0" placeholder="e.g. 3">

                            </div>


                            {{-- =================================================
                            TOTAL FLOORS
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Total Floors
                                </label>

                                <input type="number" name="total_floors" class="property-form-control"
                                    value="{{ old('total_floors') }}" min="0" placeholder="e.g. 10">

                            </div>


                            {{-- =================================================
                            PROPERTY AGE
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Property Age
                                </label>

                                <select name="property_age" class="property-form-select">

                                    <option value="">
                                        Select Property Age
                                    </option>

                                    <option value="New" {{ old('property_age') == 'New' ? 'selected' : '' }}>
                                        New / Under Construction
                                    </option>

                                    <option value="0-5 Years" {{ old('property_age') == '0-5 Years' ? 'selected' : '' }}>
                                        0 - 5 Years
                                    </option>

                                    <option value="5-10 Years" {{ old('property_age') == '5-10 Years' ? 'selected' : '' }}>
                                        5 - 10 Years
                                    </option>

                                    <option value="10-20 Years" {{ old('property_age') == '10-20 Years' ? 'selected' : '' }}>
                                        10 - 20 Years
                                    </option>

                                    <option value="20+ Years" {{ old('property_age') == '20+ Years' ? 'selected' : '' }}>
                                        20+ Years
                                    </option>

                                </select>

                            </div>


                            {{-- =================================================
                            PROPERTY CONDITION
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Property Condition
                                </label>

                                <select name="property_condition" class="property-form-select">

                                    <option value="">
                                        Select Condition
                                    </option>

                                    <option value="Excellent" {{ old('property_condition') == 'Excellent' ? 'selected' : '' }}>
                                        Excellent
                                    </option>

                                    <option value="Good" {{ old('property_condition') == 'Good' ? 'selected' : '' }}>
                                        Good
                                    </option>

                                    <option value="Average" {{ old('property_condition') == 'Average' ? 'selected' : '' }}>
                                        Average
                                    </option>

                                    <option value="Needs Renovation" {{ old('property_condition') == 'Needs Renovation' ? 'selected' : '' }}>
                                        Needs Renovation
                                    </option>

                                </select>

                            </div>


                            {{-- =================================================
                            FACING
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Facing
                                </label>

                                <select name="facing" class="property-form-select">

                                    <option value="">
                                        Select Facing
                                    </option>

                                    <option value="East" {{ old('facing') == 'East' ? 'selected' : '' }}>
                                        East
                                    </option>

                                    <option value="West" {{ old('facing') == 'West' ? 'selected' : '' }}>
                                        West
                                    </option>

                                    <option value="North" {{ old('facing') == 'North' ? 'selected' : '' }}>
                                        North
                                    </option>

                                    <option value="South" {{ old('facing') == 'South' ? 'selected' : '' }}>
                                        South
                                    </option>

                                    <option value="North-East" {{ old('facing') == 'North-East' ? 'selected' : '' }}>
                                        North-East
                                    </option>

                                    <option value="North-West" {{ old('facing') == 'North-West' ? 'selected' : '' }}>
                                        North-West
                                    </option>

                                    <option value="South-East" {{ old('facing') == 'South-East' ? 'selected' : '' }}>
                                        South-East
                                    </option>

                                    <option value="South-West" {{ old('facing') == 'South-West' ? 'selected' : '' }}>
                                        South-West
                                    </option>

                                </select>

                            </div>


                            {{-- =================================================
                            ROAD WIDTH
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Road Width (ft)
                                </label>

                                <input type="number" name="road_width" class="property-form-control"
                                    value="{{ old('road_width') }}" min="0" step="0.1" placeholder="e.g. 30">

                            </div>


                            {{-- =================================================
                            CAR PARKING
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Car Parking
                                </label>

                                <select name="car_parking" class="property-form-select">

                                    <option value="">
                                        Select Parking
                                    </option>

                                    <option value="None" {{ old('car_parking') == 'None' ? 'selected' : '' }}>
                                        No Parking
                                    </option>

                                    <option value="1 Car" {{ old('car_parking') == '1 Car' ? 'selected' : '' }}>
                                        1 Car
                                    </option>

                                    <option value="2 Cars" {{ old('car_parking') == '2 Cars' ? 'selected' : '' }}>
                                        2 Cars
                                    </option>

                                    <option value="3+ Cars" {{ old('car_parking') == '3+ Cars' ? 'selected' : '' }}>
                                        3+ Cars
                                    </option>

                                </select>

                            </div>


                            {{-- =================================================
                            POSSESSION STATUS
                            ================================================== --}}

                            <div class="property-col-4">

                                <label class="property-form-label">
                                    Possession Status
                                </label>

                                <select name="possession_status" class="property-form-select">

                                    <option value="">
                                        Select Possession Status
                                    </option>

                                    <option value="Ready to Move" {{ old('possession_status') == 'Ready to Move' ? 'selected' : '' }}>
                                        Ready to Move
                                    </option>

                                    <option value="Under Construction" {{ old('possession_status') == 'Under Construction' ? 'selected' : '' }}>
                                        Under Construction
                                    </option>

                                    <option value="Available Soon" {{ old('possession_status') == 'Available Soon' ? 'selected' : '' }}>
                                        Available Soon
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                    {{-- =================================================
                    DESCRIPTION
                    ================================================== --}}

                    <div class="property-form-section">

                        <div class="property-form-section-header">

                            <div class="property-form-section-icon">

                                <i class="ti ti-align-left"></i>

                            </div>

                            <div>

                                <h5 class="property-form-section-title">

                                    Property Description

                                </h5>

                                <p class="property-form-section-subtitle">

                                    Describe the property and nearby facilities.

                                </p>

                            </div>

                        </div>


                        <div class="property-form-row">

                            <div class="property-col-12">

                                <label class="property-form-label">

                                    Description

                                </label>

                                <textarea name="description" class="property-form-control"
                                    placeholder="Describe the property, nearby facilities, surroundings, etc.">{{ old('description') }}</textarea>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                    AMENITIES
                    ================================================== --}}


                    <div class="property-form-section">

                        <div class="property-form-section-header">

                            <div class="property-form-section-icon">
                                <i class="ti ti-list-check"></i>
                            </div>

                            <div>
                                <h5 class="property-form-section-title">
                                    Amenities
                                </h5>

                                <p class="property-form-section-subtitle">
                                    Select the amenities available at the property.
                                </p>
                            </div>

                        </div>

                        @php
                            $oldAmenities = old('amenities', []);
                        @endphp

                        <div class="property-amenities-wrapper">

                            @forelse($amenities as $amenity)

                                <label class="property-amenity-item">

                                    <input type="checkbox" name="amenities[]" value="{{ $amenity->id }}" {{ in_array($amenity->id, $oldAmenities) ? 'checked' : '' }}>

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


                    {{-- =================================================
                    PROPERTY IMAGES
                    ================================================== --}}

                    <div class="property-form-section">

                        <div class="property-form-section-header">

                            <div class="property-form-section-icon">

                                <i class="ti ti-photo"></i>

                            </div>

                            <div>

                                <h5 class="property-form-section-title">

                                    Property Images

                                </h5>

                                <p class="property-form-section-subtitle">

                                    Upload high-quality images of the property.

                                </p>

                            </div>

                        </div>


                        <div class="property-image-upload">

                            <div class="property-image-upload-icon">

                                <i class="ti ti-cloud-upload"></i>

                            </div>


                            <p class="property-image-upload-title">

                                Upload Property Images

                            </p>


                            <p class="property-image-upload-text">

                                JPG, JPEG, PNG or WEBP — Maximum 10 images, 2MB each

                            </p>


                            <input type="file" name="photos[]" class="property-image-input" accept=".jpg,.jpeg,.png,.webp"
                                multiple>

                        </div>

                    </div>


                    {{-- =================================================
                    OWNER / BROKER DETAILS
                    ================================================== --}}

                    <div class="property-form-section">

                        <div class="property-form-section-header">

                            <div class="property-form-section-icon">

                                <i class="ti ti-user"></i>

                            </div>

                            <div>

                                <h5 class="property-form-section-title">

                                    Owner / Broker Contact Details

                                </h5>

                                <p class="property-form-section-subtitle">

                                    Add the person responsible for this property.

                                </p>

                            </div>

                        </div>


                        <div class="property-form-row">


                            {{-- OWNER NAME --}}

                            <div class="property-col-6">

                                <label class="property-form-label">

                                    Owner / Broker Name

                                    <span class="property-form-required">*</span>

                                </label>

                                <input type="text" name="owner_name" class="property-form-control"
                                    value="{{ old('owner_name') }}" placeholder="Enter owner or broker name" required>

                            </div>


                            {{-- OWNER PHONE --}}

                            <div class="property-col-6">

                                <label class="property-form-label">

                                    Contact Phone

                                    <span class="property-form-required">*</span>

                                </label>

                                <input type="text" name="owner_phone" class="property-form-control"
                                    value="{{ old('owner_phone') }}" placeholder="+91 98765 43210" required>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                    ACTIONS
                    ================================================== --}}

                    <div class="property-create-actions">


                        <a href="{{ route('properties.all') }}" class="property-btn-cancel">

                            <i class="ti ti-arrow-left me-1"></i>

                            Cancel

                        </a>


                        <button type="submit" class="property-btn-submit">

                            <i class="ti ti-check me-1"></i>

                            Publish Rent Property

                        </button>


                    </div>

                </form>

            </div>

        </div>

    </div>


    <script>

        document.addEventListener('DOMContentLoaded', function () {


            /* =========================================================
               SIDEBAR RESPONSIVE SYNC
            ========================================================= */

            const sidebar =
                document.getElementById('sidebar');

            const propertyCreatePage =
                document.querySelector('.property-create-page');


            if (!sidebar || !propertyCreatePage) {

                return;

            }


            function syncPropertyCreatePageWithSidebar() {


                /*
                 * Mobile
                 */

                if (window.innerWidth <= 991) {

                    propertyCreatePage.style.marginLeft = '0px';

                    propertyCreatePage.style.width = '100%';

                    return;

                }


                /*
                 * Get actual sidebar width
                 */

                const sidebarWidth =
                    Math.round(
                        sidebar.getBoundingClientRect().width
                    );


                /*
                 * Move page after sidebar
                 */

                propertyCreatePage.style.marginLeft =
                    sidebarWidth + 'px';


                /*
                 * Keep page inside viewport
                 */

                propertyCreatePage.style.width =
                    'calc(100% - ' +
                    sidebarWidth +
                    'px)';

            }


            /*
             * Initial position
             */

            syncPropertyCreatePageWithSidebar();


            /*
             * Detect sidebar width changes
             */

            if (typeof ResizeObserver !== 'undefined') {

                const observer =
                    new ResizeObserver(function () {

                        syncPropertyCreatePageWithSidebar();

                    });

                observer.observe(sidebar);

            }


            /*
             * Backup for sidebar
             * class-based animations
             */

            document.addEventListener('click', function () {

                setTimeout(function () {

                    syncPropertyCreatePageWithSidebar();

                }, 100);


                setTimeout(function () {

                    syncPropertyCreatePageWithSidebar();

                }, 300);

            });


            /*
             * Browser resize
             */

            window.addEventListener('resize', function () {

                syncPropertyCreatePageWithSidebar();

            });

        });

    </script>

@endsection