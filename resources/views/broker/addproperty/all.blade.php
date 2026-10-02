@extends('layout.brokermainlayout')

@section('content')

<style>
    :root {
        --broker-blue: #071b3d;
        --broker-blue-light: #edf4ff;
        --broker-border: #e1e7f0;
        --broker-text: #1f2b43;
        --broker-muted: #718096;
        --broker-bg: #f5f8fc;
        --broker-primary: #1464e8;
    }

    .broker-add-page {
        margin-left: 250px;
        padding: 105px 25px 35px;
        min-height: 100vh;
        background: var(--broker-bg);
    }

    .broker-add-container {
        max-width: 1450px;
        margin: auto;
    }

    /* =========================
       PAGE HEADER
    ========================= */

    .add-page-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .add-page-header h1 {
        margin: 0;
        color: var(--broker-blue);
        font-size: 30px;
        font-weight: 700;
    }

    .add-page-header p {
        margin: 6px 0 0;
        color: var(--broker-muted);
        font-size: 14px;
    }

    .back-properties-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        border: 1px solid #d5deeb;
        border-radius: 8px;
        background: #fff;
        color: var(--broker-blue);
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: .2s;
    }

    .back-properties-btn:hover {
        border-color: var(--broker-blue);
        background: #f8fbff;
    }

    /* =========================
       STEPPER
    ========================= */

    .property-stepper {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        background: #fff;
        border: 1px solid var(--broker-border);
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(25, 45, 80, .04);
    }

    .step-item {
        position: relative;
        min-height: 82px;
        padding: 15px 14px;
        display: flex;
        align-items: center;
        gap: 11px;
        border-right: 1px solid #edf0f5;
        cursor: pointer;
        transition: .2s;
    }

    .step-item:last-child {
        border-right: 0;
    }

    .step-number {
        width: 36px;
        height: 36px;
        flex: 0 0 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #eef1f6;
        color: #657187;
        font-size: 15px;
        font-weight: 700;
    }

    .step-content strong {
        display: block;
        color: #35415b;
        font-size: 12px;
        font-weight: 700;
    }

    .step-content span {
        display: block;
        margin-top: 3px;
        color: #8a94a5;
        font-size: 10px;
        line-height: 1.4;
    }

    .step-item.active {
        background: #f8fbff;
    }

    .step-item.active .step-number {
        background: var(--broker-primary);
        color: #fff;
    }

    .step-item.active .step-content strong,
    .step-item.active .step-content span {
        color: var(--broker-primary);
    }

    .step-item.completed .step-number {
        background: var(--broker-blue);
        color: #fff;
    }

    /* =========================
       MAIN FORM LAYOUT
    ========================= */

    .property-form-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 330px;
        gap: 18px;
        align-items: start;
    }

    .property-form-card,
    .tips-card {
        background: #fff;
        border: 1px solid var(--broker-border);
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(25, 45, 80, .04);
    }

    .property-form-card {
        overflow: hidden;
    }

    /* =========================
       STEP CONTENT
    ========================= */

    .form-step {
        display: none;
    }

    .form-step.active {
        display: block;
    }

    .form-section {
        padding: 25px;
        border-bottom: 1px solid #edf0f4;
    }

    .form-section:last-child {
        border-bottom: 0;
    }

    .section-heading {
        margin-bottom: 20px;
    }

    .section-heading h2 {
        margin: 0;
        color: var(--broker-blue);
        font-size: 20px;
        font-weight: 700;
    }

    .section-heading p {
        margin: 5px 0 0;
        color: var(--broker-muted);
        font-size: 13px;
    }

    .field-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 17px;
    }

    .field-grid.three {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .field.full {
        grid-column: 1 / -1;
    }

    .field label {
        display: block;
        margin-bottom: 7px;
        color: #25324a;
        font-size: 12px;
        font-weight: 700;
    }

    .required {
        color: #e33434;
    }

    .field input,
    .field select,
    .field textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #d9e1ec;
        border-radius: 8px;
        background: #fff;
        color: #26344d;
        font-size: 13px;
        outline: none;
        transition: .2s;
    }

    .field input,
    .field select {
        height: 44px;
        padding: 0 13px;
    }

    .field textarea {
        min-height: 115px;
        padding: 12px 13px;
        resize: vertical;
        line-height: 1.5;
    }

    .field input:focus,
    .field select:focus,
    .field textarea:focus {
        border-color: var(--broker-primary);
        box-shadow: 0 0 0 3px rgba(20, 100, 232, .08);
    }

    .field-help {
        display: block;
        margin-top: 5px;
        color: #8b95a5;
        font-size: 10px;
    }

    /* =========================
       LISTING TYPE
    ========================= */

    .listing-options {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 18px;
        min-height: 44px;
    }

    .listing-option {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #35415b;
        font-size: 13px;
        cursor: pointer;
    }

    .listing-option input {
        width: 17px;
        height: 17px;
        accent-color: var(--broker-primary);
    }

    /* =========================
       TIPS
    ========================= */

    .tips-card {
        padding: 20px;
        background: linear-gradient(180deg, #f1f7ff 0%, #f8fbff 100%);
    }

    .tips-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 18px;
    }

    .tips-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #fff;
        color: var(--broker-primary);
        font-size: 16px;
    }

    .tips-header h3 {
        margin: 0;
        color: var(--broker-blue);
        font-size: 17px;
        font-weight: 700;
    }

    .tip-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 16px;
        color: #52627d;
        font-size: 12px;
        line-height: 1.5;
    }

    .tip-item:last-child {
        margin-bottom: 0;
    }

    .tip-item i {
        margin-top: 2px;
        color: var(--broker-primary);
        font-size: 14px;
    }

    /* =========================
       IMAGE UPLOAD
    ========================= */

    .image-upload-box {
        padding: 35px 20px;
        border: 2px dashed #cdd8e7;
        border-radius: 10px;
        background: #fafcff;
        text-align: center;
        cursor: pointer;
        transition: .2s;
    }

    .image-upload-box:hover {
        border-color: var(--broker-primary);
        background: #f6faff;
    }

    .image-upload-icon {
        width: 52px;
        height: 52px;
        margin: 0 auto 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #eaf2ff;
        color: var(--broker-primary);
        font-size: 22px;
    }

    .image-upload-title {
        margin: 0;
        color: var(--broker-blue);
        font-size: 14px;
        font-weight: 700;
    }

    .image-upload-text {
        margin: 7px 0 15px;
        color: #8a95a6;
        font-size: 11px;
    }

    .image-upload-box input {
        max-width: 100%;
    }

    .image-preview {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 10px;
        margin-top: 15px;
    }

    .preview-item {
        position: relative;
        height: 90px;
        overflow: hidden;
        border-radius: 7px;
        background: #edf1f6;
    }

    .preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* =========================
       AMENITIES
    ========================= */

    .amenities-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 10px;
    }

    .amenity-item {
        display: flex;
        align-items: center;
        gap: 9px;
        min-height: 42px;
        padding: 9px 11px;
        border: 1px solid #e0e6ef;
        border-radius: 7px;
        background: #fff;
        color: #46546d;
        font-size: 12px;
        cursor: pointer;
        transition: .2s;
    }

    .amenity-item:hover {
        border-color: #b9cce9;
        background: #f8fbff;
    }

    .amenity-item input {
        width: 16px;
        height: 16px;
        accent-color: var(--broker-primary);
    }

    .amenity-item i {
        color: var(--broker-primary);
    }

    /* =========================
       STEP ACTIONS
    ========================= */

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 17px 25px;
        border-top: 1px solid #e9edf3;
        background: #fff;
    }

    .actions-left,
    .actions-right {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-form {
        min-height: 42px;
        padding: 0 19px;
        border-radius: 8px;
        border: 1px solid #d7dfeb;
        background: #fff;
        color: #3f4e68;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: .2s;
    }

    .btn-form:hover {
        border-color: var(--broker-blue);
        color: var(--broker-blue);
    }

    .btn-next,
    .btn-submit {
        border-color: var(--broker-primary);
        background: var(--broker-primary);
        color: #fff;
    }

    .btn-next:hover,
    .btn-submit:hover {
        border-color: #0d56cc;
        background: #0d56cc;
        color: #fff;
    }

    .btn-back {
        display: none;
    }

    /* =========================
       ERROR
    ========================= */

    .form-errors {
        margin-bottom: 18px;
        padding: 14px 17px;
        border: 1px solid #f1caca;
        border-radius: 8px;
        background: #fff4f4;
        color: #a52d2d;
        font-size: 12px;
    }

    .form-errors ul {
        margin: 7px 0 0;
        padding-left: 18px;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 1200px) {
        .property-form-layout {
            grid-template-columns: 1fr;
        }

        .tips-card {
            order: -1;
        }
    }

    @media (max-width: 1000px) {
        .property-stepper {
            grid-template-columns: repeat(3, 1fr);
        }

        .step-item:nth-child(3) {
            border-right: 0;
        }

        .field-grid.three {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 991px) {
        .broker-add-page {
            margin-left: 0;
            padding: 95px 18px 30px;
        }
    }

    @media (max-width: 650px) {
        .broker-add-page {
            padding: 90px 12px 25px;
        }

        .add-page-header {
            flex-direction: column;
        }

        .back-properties-btn {
            width: 100%;
            justify-content: center;
        }

        .property-stepper {
            grid-template-columns: repeat(2, 1fr);
        }

        .step-item {
            border-right: 1px solid #edf0f5;
        }

        .step-item:nth-child(even) {
            border-right: 0;
        }

        .field-grid,
        .field-grid.three {
            grid-template-columns: 1fr;
        }

        .field.full {
            grid-column: auto;
        }

        .form-section {
            padding: 18px;
        }

        .amenities-grid {
            grid-template-columns: 1fr;
        }

        .image-preview {
            grid-template-columns: repeat(2, 1fr);
        }

        .form-actions {
            padding: 14px 18px;
        }

        .actions-left,
        .actions-right {
            flex: 1;
        }

        .btn-form {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="broker-add-page">

    <div class="broker-add-container">

        {{-- PAGE HEADER --}}
        <div class="add-page-header">

            <div>
                <h1>Add New Property</h1>
                <p>List your property and connect with genuine tenants.</p>
            </div>

            <a href="{{ route('broker.properties') }}" class="back-properties-btn">
                <i class="fa-solid fa-arrow-left"></i>
                Back to My Properties
            </a>

        </div>

        {{-- VALIDATION ERRORS --}}
        @if($errors->any())
            <div class="form-errors">
                <strong>Please check the following:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- STEPPER --}}
        <div class="property-stepper">

            <div class="step-item active" data-step="1">
                <div class="step-number">1</div>
                <div class="step-content">
                    <strong>Basic Details</strong>
                    <span>Property type, title, description</span>
                </div>
            </div>

            <div class="step-item" data-step="2">
                <div class="step-number">2</div>
                <div class="step-content">
                    <strong>Location Details</strong>
                    <span>Address and area information</span>
                </div>
            </div>

            <div class="step-item" data-step="3">
                <div class="step-number">3</div>
                <div class="step-content">
                    <strong>Property Details</strong>
                    <span>Rooms, furnishing, etc.</span>
                </div>
            </div>

            <div class="step-item" data-step="4">
                <div class="step-number">4</div>
                <div class="step-content">
                    <strong>Photos</strong>
                    <span>Upload property images</span>
                </div>
            </div>

            <div class="step-item" data-step="5">
                <div class="step-number">5</div>
                <div class="step-content">
                    <strong>Pricing</strong>
                    <span>Rent and deposit</span>
                </div>
            </div>

            <div class="step-item" data-step="6">
                <div class="step-number">6</div>
                <div class="step-content">
                    <strong>Amenities</strong>
                    <span>Amenities and contact</span>
                </div>
            </div>

        </div>

        {{-- =========================================================
             ONE FORM FOR ALL SIX STEPS
        ========================================================== --}}

        <form
            action="{{ route('broker.properties.store') }}"
            method="POST"
            enctype="multipart/form-data"
            id="brokerPropertyForm"
        >

            @csrf

            <div class="property-form-layout">

                <div class="property-form-card">

                    {{-- =================================================
                         STEP 1 - BASIC DETAILS
                    ================================================== --}}

                    <div class="form-step active" data-step="1">

                        <div class="form-section">

                            <div class="section-heading">
                                <h2>Basic Details</h2>
                                <p>Enter the basic information about your property.</p>
                            </div>

                            <div class="field-grid">

                                {{-- PROPERTY TITLE --}}
                                <div class="field">

                                    <label>
                                        Property Title
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="property_title"
                                        value="{{ old('property_title') }}"
                                        placeholder="e.g. Spacious 3 BHK Apartment"
                                        required
                                    >

                                </div>

                                {{-- PROPERTY TYPE --}}
                                <div class="field">

                                    <label>
                                        Property Type
                                        <span class="required">*</span>
                                    </label>

                                    <select name="property_type" required>

                                        <option value="">
                                            Select Property Type
                                        </option>

                                        @foreach($propertyTypes as $type)

                                            <option
                                                value="{{ $type->name }}"
                                                {{ old('property_type') == $type->name ? 'selected' : '' }}
                                            >
                                                {{ $type->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                {{-- LISTING FOR --}}
                                <div class="field">

                                    <label>
                                        Listing For
                                        <span class="required">*</span>
                                    </label>

                                    <div class="listing-options">

                                        @foreach(['Rent', 'Lease', 'PG', 'Sell'] as $listingType)

                                            <label class="listing-option">

                                                <input
                                                    type="radio"
                                                    name="listing_for"
                                                    value="{{ $listingType }}"
                                                    {{ old('listing_for', 'Rent') == $listingType ? 'checked' : '' }}
                                                    required
                                                >

                                                {{ $listingType }}

                                            </label>

                                        @endforeach

                                    </div>

                                </div>

                                {{-- BHK --}}
                                <div class="field">

                                    <label>Bedrooms / BHK</label>

                                    <select name="bhk">

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
                                                {{ old('bhk') == $bhk ? 'selected' : '' }}
                                            >
                                                {{ $bhk }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                {{-- BATHROOMS --}}
                                <div class="field">

                                    <label>Bathrooms</label>

                                    <input
                                        type="number"
                                        name="bathrooms"
                                        value="{{ old('bathrooms') }}"
                                        min="1"
                                        placeholder="e.g. 2"
                                    >

                                </div>

                                {{-- DESCRIPTION --}}
                                <div class="field full">

                                    <label>Description</label>

                                    <textarea
                                        name="description"
                                        maxlength="1000"
                                        placeholder="Describe the property, nearby facilities, surroundings, etc."
                                    >{{ old('description') }}</textarea>

                                    <span class="field-help">
                                        Maximum 1000 characters.
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         STEP 2 - LOCATION
                    ================================================== --}}

                    <div class="form-step" data-step="2">

                        <div class="form-section">

                            <div class="section-heading">
                                <h2>Location Details</h2>
                                <p>Provide the property location and address.</p>
                            </div>

                            <div class="field-grid three">

                                {{-- COUNTRY --}}
                                <div class="field">

                                    <label>
                                        Country
                                        <span class="required">*</span>
                                    </label>

                                    <select name="country" required>

                                        <option value="">Select Country</option>

                                        <option
                                            value="India"
                                            {{ old('country', 'India') == 'India' ? 'selected' : '' }}
                                        >
                                            India
                                        </option>

                                    </select>

                                </div>

                                {{-- STATE --}}
                                <div class="field">

                                    <label>
                                        State
                                        <span class="required">*</span>
                                    </label>

                                    <select name="state" required>

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
                                                {{ old('state') == $state ? 'selected' : '' }}
                                            >
                                                {{ $state }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                {{-- DISTRICT --}}
                                <div class="field">

                                    <label>
                                        District
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="district"
                                        value="{{ old('district') }}"
                                        placeholder="e.g. Annamayya"
                                        required
                                    >

                                </div>

                                {{-- CITY --}}
                                <div class="field">

                                    <label>
                                        City
                                        <span class="required">*</span>
                                    </label>

                                    <select name="city_id" required>

                                        <option value="">Select City</option>

                                        @foreach($cities as $city)

                                            <option
                                                value="{{ $city->id }}"
                                                {{ old('city_id') == $city->id ? 'selected' : '' }}
                                            >
                                                {{ $city->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                {{-- LOCALITY --}}
                                <div class="field">

                                    <label>
                                        Area / Locality
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="locality"
                                        value="{{ old('locality') }}"
                                        placeholder="e.g. Bharath Nagar"
                                        required
                                    >

                                </div>

                                {{-- PINCODE --}}
                                <div class="field">

                                    <label>Pincode</label>

                                    <input
                                        type="text"
                                        name="pincode"
                                        value="{{ old('pincode') }}"
                                        placeholder="e.g. 516115"
                                        maxlength="6"
                                    >

                                </div>

                                {{-- LANDMARK --}}
                                <div class="field">

                                    <label>Landmark</label>

                                    <input
                                        type="text"
                                        name="landmark"
                                        value="{{ old('landmark') }}"
                                        placeholder="e.g. Near Bus Stand"
                                    >

                                </div>

                                {{-- ADDRESS --}}
                                <div class="field full">

                                    <label>Detailed Address</label>

                                    <textarea
                                        name="address"
                                        placeholder="Enter complete property address"
                                    >{{ old('address') }}</textarea>

                                </div>

                                {{-- GOOGLE MAP --}}
                                <div class="field full">

                                    <label>Google Map Location</label>

                                    <input
                                        type="url"
                                        name="google_map_url"
                                        value="{{ old('google_map_url') }}"
                                        placeholder="https://maps.google.com/..."
                                    >

                                    <span class="field-help">
                                        Paste the Google Maps location URL for this property.
                                    </span>

                                </div>

                                {{-- LATITUDE --}}
                                <div class="field">

                                    <label>Latitude</label>

                                    <input
                                        type="text"
                                        name="latitude"
                                        value="{{ old('latitude') }}"
                                        placeholder="e.g. 14.0516"
                                    >

                                </div>

                                {{-- LONGITUDE --}}
                                <div class="field">

                                    <label>Longitude</label>

                                    <input
                                        type="text"
                                        name="longitude"
                                        value="{{ old('longitude') }}"
                                        placeholder="e.g. 79.1240"
                                    >

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         STEP 3 - PROPERTY DETAILS
                    ================================================== --}}

                    <div class="form-step" data-step="3">

                        <div class="form-section">

                            <div class="section-heading">
                                <h2>Property Details</h2>
                                <p>Add size, furnishing and property specifications.</p>
                            </div>

                            <div class="field-grid three">

                                {{-- AREA --}}
                                <div class="field">

                                    <label>
                                        Property Area (sq.ft)
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="number"
                                        name="area_sqft"
                                        value="{{ old('area_sqft') }}"
                                        min="1"
                                        placeholder="e.g. 1650"
                                        required
                                    >

                                </div>

                                {{-- BUILT UP --}}
                                <div class="field">

                                    <label>Built-up Area (sq.ft)</label>

                                    <input
                                        type="number"
                                        name="built_up_area"
                                        value="{{ old('built_up_area') }}"
                                        min="0"
                                        placeholder="e.g. 1500"
                                    >

                                </div>

                                {{-- CARPET --}}
                                <div class="field">

                                    <label>Carpet Area (sq.ft)</label>

                                    <input
                                        type="number"
                                        name="carpet_area"
                                        value="{{ old('carpet_area') }}"
                                        min="0"
                                        placeholder="e.g. 1300"
                                    >

                                </div>

                                {{-- FURNISHING --}}
                                <div class="field">

                                    <label>Furnishing</label>

                                    <select name="furnishing">

                                        <option value="">Select Furnishing</option>

                                        @foreach([
                                            'Unfurnished',
                                            'Semi Furnished',
                                            'Fully Furnished'
                                        ] as $furnishing)

                                            <option
                                                value="{{ $furnishing }}"
                                                {{ old('furnishing') == $furnishing ? 'selected' : '' }}
                                            >
                                                {{ $furnishing }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                {{-- AVAILABLE FROM --}}
                                <div class="field">

                                    <label>Available From</label>

                                    <input
                                        type="date"
                                        name="available_from"
                                        value="{{ old('available_from') }}"
                                    >

                                </div>

                                {{-- BALCONIES --}}
                                <div class="field">

                                    <label>Balconies</label>

                                    <input
                                        type="number"
                                        name="balconies"
                                        value="{{ old('balconies') }}"
                                        min="0"
                                        placeholder="e.g. 2"
                                    >

                                </div>

                                {{-- FLOOR --}}
                                <div class="field">

                                    <label>Floor Number</label>

                                    <input
                                        type="number"
                                        name="floor_number"
                                        value="{{ old('floor_number') }}"
                                        min="0"
                                        placeholder="e.g. 3"
                                    >

                                </div>

                                {{-- TOTAL FLOORS --}}
                                <div class="field">

                                    <label>Total Floors</label>

                                    <input
                                        type="number"
                                        name="total_floors"
                                        value="{{ old('total_floors') }}"
                                        min="1"
                                        placeholder="e.g. 5"
                                    >

                                </div>

                                {{-- PROPERTY AGE --}}
                                <div class="field">

                                    <label>Property Age</label>

                                    <select name="property_age">

                                        <option value="">Select Property Age</option>

                                        @foreach([
                                            'New',
                                            '0-5 Years',
                                            '5-10 Years',
                                            '10-20 Years',
                                            '20+ Years'
                                        ] as $age)

                                            <option
                                                value="{{ $age }}"
                                                {{ old('property_age') == $age ? 'selected' : '' }}
                                            >
                                                {{ $age }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                {{-- CONDITION --}}
                                <div class="field">

                                    <label>Property Condition</label>

                                    <select name="property_condition">

                                        <option value="">Select Condition</option>

                                        @foreach([
                                            'Excellent',
                                            'Good',
                                            'Average',
                                            'Needs Renovation'
                                        ] as $condition)

                                            <option
                                                value="{{ $condition }}"
                                                {{ old('property_condition') == $condition ? 'selected' : '' }}
                                            >
                                                {{ $condition }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                {{-- FACING --}}
                                <div class="field">

                                    <label>Facing</label>

                                    <select name="facing">

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
                                                {{ old('facing') == $facing ? 'selected' : '' }}
                                            >
                                                {{ $facing }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                {{-- ROAD WIDTH --}}
                                <div class="field">

                                    <label>Road Width (ft)</label>

                                    <input
                                        type="number"
                                        name="road_width"
                                        value="{{ old('road_width') }}"
                                        min="0"
                                        step="0.1"
                                        placeholder="e.g. 30"
                                    >

                                </div>

                                {{-- CAR PARKING --}}
                                <div class="field">

                                    <label>Car Parking</label>

                                    <select name="car_parking">

                                        <option value="">Select Parking</option>

                                        <option
                                            value="None"
                                            {{ old('car_parking') == 'None' ? 'selected' : '' }}
                                        >
                                            No Parking
                                        </option>

                                        <option
                                            value="1 Car"
                                            {{ old('car_parking') == '1 Car' ? 'selected' : '' }}
                                        >
                                            1 Car
                                        </option>

                                        <option
                                            value="2 Cars"
                                            {{ old('car_parking') == '2 Cars' ? 'selected' : '' }}
                                        >
                                            2 Cars
                                        </option>

                                        <option
                                            value="3+ Cars"
                                            {{ old('car_parking') == '3+ Cars' ? 'selected' : '' }}
                                        >
                                            3+ Cars
                                        </option>

                                    </select>

                                </div>

                                {{-- POSSESSION --}}
                                <div class="field">

                                    <label>Possession Status</label>

                                    <select name="possession_status">

                                        <option value="">
                                            Select Possession Status
                                        </option>

                                        @foreach([
                                            'Ready to Move',
                                            'Under Construction',
                                            'Available Soon'
                                        ] as $possession)

                                            <option
                                                value="{{ $possession }}"
                                                {{ old('possession_status') == $possession ? 'selected' : '' }}
                                            >
                                                {{ $possession }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         STEP 4 - PHOTOS
                    ================================================== --}}

                    <div class="form-step" data-step="4">

                        <div class="form-section">

                            <div class="section-heading">
                                <h2>Property Photos</h2>
                                <p>Upload high-quality images of the property.</p>
                            </div>

                            <label class="image-upload-box">

                                <div class="image-upload-icon">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                </div>

                                <p class="image-upload-title">
                                    Upload Property Images
                                </p>

                                <p class="image-upload-text">
                                    JPG, JPEG, PNG or WEBP — Maximum 10 images
                                </p>

                                <input
                                    type="file"
                                    name="photos[]"
                                    id="propertyPhotos"
                                    accept=".jpg,.jpeg,.png,.webp"
                                    multiple
                                >

                            </label>

                            <div
                                class="image-preview"
                                id="imagePreview"
                            ></div>

                        </div>

                    </div>


                    {{-- =================================================
                         STEP 5 - PRICING
                    ================================================== --}}

                    <div class="form-step" data-step="5">

                        <div class="form-section">

                            <div class="section-heading">
                                <h2>Pricing</h2>
                                <p>Provide the correct rental price and deposit details.</p>
                            </div>

                            <div class="field-grid">

                                {{-- PRICE --}}
                                <div class="field">

                                    <label>
                                        Monthly Rent
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="number"
                                        name="price"
                                        value="{{ old('price') }}"
                                        min="0"
                                        step="0.01"
                                        placeholder="₹ 45,000"
                                        required
                                    >

                                </div>

                                {{-- SECURITY --}}
                                <div class="field">

                                    <label>Security Deposit</label>

                                    <input
                                        type="number"
                                        name="security_deposit"
                                        value="{{ old('security_deposit') }}"
                                        min="0"
                                        step="0.01"
                                        placeholder="₹ 2,50,000"
                                    >

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         STEP 6 - AMENITIES + OWNER
                    ================================================== --}}

                    <div class="form-step" data-step="6">

                        <div class="form-section">

                            <div class="section-heading">
                                <h2>Amenities</h2>
                                <p>Select the amenities available at the property.</p>
                            </div>

                            @php
                                $oldAmenities = old('amenities', []);
                            @endphp

                            <div class="amenities-grid">

                                @forelse($amenities as $amenity)

                                    <label class="amenity-item">

                                        <input
                                            type="checkbox"
                                            name="amenities[]"
                                            value="{{ $amenity->id }}"
                                            {{ in_array($amenity->id, $oldAmenities) ? 'checked' : '' }}
                                        >

                                        @if($amenity->icon)
                                            <i class="{{ $amenity->icon }}"></i>
                                        @endif

                                        <span>
                                            {{ $amenity->name }}
                                        </span>

                                    </label>

                                @empty

                                    <div>
                                        No active amenities available.
                                    </div>

                                @endforelse

                            </div>

                        </div>


                        {{-- OWNER DETAILS --}}

                        <div class="form-section">

                            <div class="section-heading">
                                <h2>Owner / Broker Contact Details</h2>
                                <p>Add the person responsible for this property.</p>
                            </div>

                            <div class="field-grid">

                                <div class="field">

                                    <label>
                                        Owner / Broker Name
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="owner_name"
                                        value="{{ old('owner_name') }}"
                                        placeholder="Enter owner or broker name"
                                        required
                                    >

                                </div>

                                <div class="field">

                                    <label>
                                        Contact Phone
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="owner_phone"
                                        value="{{ old('owner_phone') }}"
                                        placeholder="+91 98765 43210"
                                        required
                                    >

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- FORM ACTIONS --}}

                    <div class="form-actions">

                        <div class="actions-left">

                            <a
                                href="{{ route('broker.properties') }}"
                                class="btn-form"
                            >
                                Cancel
                            </a>

                        </div>

                        <div class="actions-right">

                            <button
                                type="button"
                                class="btn-form btn-back"
                                id="backBtn"
                            >
                                <i class="fa-solid fa-arrow-left"></i>
                                Back
                            </button>

                            <button
                                type="button"
                                class="btn-form btn-next"
                                id="nextBtn"
                            >
                                Next
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>

                            <button
                                type="submit"
                                class="btn-form btn-submit"
                                id="submitBtn"
                                style="display:none;"
                            >
                                <i class="fa-solid fa-check"></i>
                                Publish Property
                            </button>

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                     RIGHT TIPS PANEL
                ====================================================== --}}

                <div class="tips-card">

                    <div class="tips-header">

                        <div class="tips-icon">
                            <i class="fa-regular fa-lightbulb"></i>
                        </div>

                        <h3>Tips for a Better Listing</h3>

                    </div>

                    <div class="tip-item">
                        <i class="fa-regular fa-circle-check"></i>
                        <span>Use a clear and descriptive property title.</span>
                    </div>

                    <div class="tip-item">
                        <i class="fa-regular fa-circle-check"></i>
                        <span>Mention important features and nearby locations.</span>
                    </div>

                    <div class="tip-item">
                        <i class="fa-regular fa-circle-check"></i>
                        <span>Provide accurate property details.</span>
                    </div>

                    <div class="tip-item">
                        <i class="fa-regular fa-circle-check"></i>
                        <span>Upload clear and high-quality photos.</span>
                    </div>

                    <div class="tip-item">
                        <i class="fa-regular fa-circle-check"></i>
                        <span>Enter the correct rental price and deposit.</span>
                    </div>

                    <div class="tip-item">
                        <i class="fa-regular fa-circle-check"></i>
                        <span>Select all relevant amenities.</span>
                    </div>

                    <div class="tip-item">
                        <i class="fa-regular fa-circle-check"></i>
                        <span>Provide complete owner or broker contact information.</span>
                    </div>

                </div>

            </div>

        </form>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    let currentStep = 1;
    const totalSteps = 6;

    const form = document.getElementById('brokerPropertyForm');
    const steps = document.querySelectorAll('.form-step');
    const stepItems = document.querySelectorAll('.step-item');

    const nextBtn = document.getElementById('nextBtn');
    const backBtn = document.getElementById('backBtn');
    const submitBtn = document.getElementById('submitBtn');

    function showStep(step) {

        currentStep = step;

        steps.forEach(function (section) {

            section.classList.toggle(
                'active',
                Number(section.dataset.step) === step
            );

        });

        stepItems.forEach(function (item) {

            const itemStep = Number(item.dataset.step);

            item.classList.toggle(
                'active',
                itemStep === step
            );

            item.classList.toggle(
                'completed',
                itemStep < step
            );

        });

        backBtn.style.display =
            step > 1 ? 'inline-flex' : 'none';

        nextBtn.style.display =
            step < totalSteps ? 'inline-flex' : 'none';

        submitBtn.style.display =
            step === totalSteps ? 'inline-flex' : 'none';

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }


    function validateCurrentStep() {

        const currentSection =
            document.querySelector(
                '.form-step[data-step="' + currentStep + '"]'
            );

        if (!currentSection) {
            return true;
        }

        const requiredFields =
            currentSection.querySelectorAll(
                'input[required], select[required], textarea[required]'
            );

        for (const field of requiredFields) {

            if (!field.checkValidity()) {

                field.reportValidity();

                return false;
            }
        }

        return true;
    }


    nextBtn.addEventListener('click', function () {

        if (!validateCurrentStep()) {
            return;
        }

        if (currentStep < totalSteps) {
            showStep(currentStep + 1);
        }

    });


    backBtn.addEventListener('click', function () {

        if (currentStep > 1) {
            showStep(currentStep - 1);
        }

    });


    stepItems.forEach(function (item) {

        item.addEventListener('click', function () {

            const targetStep =
                Number(item.dataset.step);

            /*
             * Allow moving backwards freely.
             * Moving forward requires current step validation.
             */
            if (targetStep < currentStep) {

                showStep(targetStep);

                return;
            }

            if (targetStep === currentStep) {
                return;
            }

            if (validateCurrentStep()) {

                showStep(targetStep);

            }

        });

    });


    /* =========================
       IMAGE PREVIEW
    ========================= */

    const photoInput =
        document.getElementById('propertyPhotos');

    const imagePreview =
        document.getElementById('imagePreview');


    if (photoInput) {

        photoInput.addEventListener('change', function () {

            imagePreview.innerHTML = '';

            const files =
                Array.from(photoInput.files);

            if (files.length > 10) {

                alert('You can upload a maximum of 10 images.');

                photoInput.value = '';

                return;
            }

            files.forEach(function (file) {

                if (!file.type.startsWith('image/')) {
                    return;
                }

                const reader =
                    new FileReader();

                reader.onload = function (event) {

                    const preview =
                        document.createElement('div');

                    preview.className =
                        'preview-item';

                    preview.innerHTML = `
                        <img
                            src="${event.target.result}"
                            alt="Property image"
                        >
                    `;

                    imagePreview.appendChild(preview);

                };

                reader.readAsDataURL(file);

            });

        });

    }


    /* =========================
       FINAL SUBMIT
    ========================= */

    form.addEventListener('submit', function (event) {

        /*
         * Native browser validation checks
         * all required fields before submitting.
         */

        if (!form.checkValidity()) {

            event.preventDefault();

            form.reportValidity();

            return;
        }

        submitBtn.disabled = true;

        submitBtn.innerHTML = `
            <i class="fa-solid fa-spinner fa-spin"></i>
            Publishing...
        `;

    });


    showStep(1);

});
</script>

@endsection