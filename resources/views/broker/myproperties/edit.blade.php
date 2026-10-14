@extends('layout.brokermainlayout')

@section('title', 'Edit Property')

@section('content')

<style>
    :root {
        --broker-blue: #071b3d;
        --broker-primary: #1464e8;
        --broker-bg: #f5f8fc;
        --broker-border: #e2e8f0;
        --broker-text: #172033;
        --broker-muted: #64748b;
        --broker-white: #ffffff;
        --broker-success: #16a34a;
        --broker-danger: #dc2626;
    }

    .broker-edit-page {
        margin-left: 250px;
        padding: 105px 25px 45px;
        background: var(--broker-bg);
        min-height: 100vh;
    }

    .broker-edit-container {
        max-width: 1250px;
        margin: 0 auto;
    }

    /* Header */
    .edit-page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .edit-page-header h2 {
        margin: 0;
        color: var(--broker-blue);
        font-size: 26px;
        font-weight: 700;
    }

    .edit-page-header p {
        margin: 6px 0 0;
        color: var(--broker-muted);
        font-size: 14px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 18px;
        border: 1px solid var(--broker-border);
        background: #fff;
        color: var(--broker-blue);
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
    }

    .back-btn:hover {
        color: var(--broker-primary);
        border-color: var(--broker-primary);
    }

    /* Main card */
    .edit-card {
        background: #fff;
        border: 1px solid var(--broker-border);
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(15, 23, 42, 0.05);
        overflow: hidden;
    }

    .form-section {
        padding: 26px 30px;
        border-bottom: 1px solid var(--broker-border);
    }

    .form-section:last-child {
        border-bottom: 0;
    }

    .section-heading {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 22px;
    }

    .section-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #edf4ff;
        color: var(--broker-primary);
        border-radius: 9px;
        font-size: 17px;
    }

    .section-heading h4 {
        margin: 0;
        color: var(--broker-blue);
        font-size: 18px;
        font-weight: 700;
    }

    .section-heading p {
        margin: 3px 0 0;
        color: var(--broker-muted);
        font-size: 13px;
    }

    /* Grid */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px 20px;
    }

    .form-grid.three {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .form-group {
        min-width: 0;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        margin-bottom: 7px;
        color: var(--broker-text);
        font-size: 13px;
        font-weight: 600;
    }

    .required {
        color: var(--broker-danger);
    }

    .form-control,
    .form-select {
        width: 100%;
        height: 45px;
        padding: 0 13px;
        border: 1px solid #d9e1ec;
        border-radius: 8px;
        background: #fff;
        color: var(--broker-text);
        font-size: 14px;
        outline: none;
        transition: .2s ease;
    }

    textarea.form-control {
        height: 115px;
        padding: 12px 13px;
        resize: vertical;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--broker-primary);
        box-shadow: 0 0 0 3px rgba(20, 100, 232, .08);
    }

    .form-control::placeholder {
        color: #94a3b8;
    }

    /* Existing Images */
    .existing-images {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 14px;
        margin-bottom: 22px;
    }

    .existing-image {
        position: relative;
        height: 145px;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid var(--broker-border);
        background: #f8fafc;
    }

    .existing-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-label {
        position: absolute;
        left: 8px;
        bottom: 8px;
        padding: 4px 8px;
        background: rgba(7, 27, 61, .85);
        color: #fff;
        border-radius: 5px;
        font-size: 11px;
    }

    .no-images {
        padding: 25px;
        border: 1px dashed #cbd5e1;
        border-radius: 10px;
        color: var(--broker-muted);
        text-align: center;
        margin-bottom: 20px;
    }

    /* Upload */
    .upload-box {
        border: 1.5px dashed #b8c6d9;
        border-radius: 10px;
        padding: 25px;
        text-align: center;
        background: #f8fbff;
    }

    .upload-box i {
        font-size: 30px;
        color: var(--broker-primary);
        margin-bottom: 8px;
    }

    .upload-box h6 {
        margin: 0 0 5px;
        color: var(--broker-blue);
        font-weight: 700;
    }

    .upload-box p {
        margin: 0 0 15px;
        color: var(--broker-muted);
        font-size: 12px;
    }

    .upload-box input {
        max-width: 400px;
        margin: auto;
    }

    /* Amenities */
    .amenities-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
    }

    .amenity-item {
        position: relative;
    }

    .amenity-item input {
        position: absolute;
        opacity: 0;
    }

    .amenity-label {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 12px 13px;
        border: 1px solid var(--broker-border);
        border-radius: 8px;
        background: #fff;
        cursor: pointer;
        color: #334155;
        font-size: 13px;
        transition: .2s ease;
    }

    .amenity-label i {
        color: #94a3b8;
    }

    .amenity-item input:checked + .amenity-label {
        border-color: var(--broker-primary);
        background: #edf4ff;
        color: var(--broker-primary);
    }

    .amenity-item input:checked + .amenity-label i {
        color: var(--broker-primary);
    }

    /* Status */
    .current-status {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 12px;
        border-radius: 20px;
        background: #f1f5f9;
        color: #475569;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    /* Bottom actions */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 12px;
        padding: 22px 30px;
        background: #fbfcfe;
        border-top: 1px solid var(--broker-border);
    }

    .btn-cancel,
    .btn-save {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-width: 135px;
        height: 44px;
        padding: 0 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        border: 0;
    }

    .btn-cancel {
        background: #fff;
        color: #475569;
        border: 1px solid #d7dee8;
    }

    .btn-save {
        background: var(--broker-primary);
        color: #fff;
    }

    .btn-save:hover {
        background: #0f55c8;
        color: #fff;
    }

    /* Errors */
    .field-error {
        color: var(--broker-danger);
        font-size: 12px;
        margin-top: 5px;
    }

    .alert-errors {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
        border-radius: 9px;
        padding: 14px 18px;
        margin-bottom: 20px;
    }

    .alert-errors ul {
        margin: 0;
        padding-left: 18px;
    }

    /* Responsive */
    @media (max-width: 1100px) {
        .form-grid.three {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .amenities-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .existing-images {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    @media (max-width: 768px) {
        .broker-edit-page {
            margin-left: 0;
            padding: 90px 15px 30px;
        }

        .edit-page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .form-grid,
        .form-grid.three {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .amenities-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .existing-images {
            grid-template-columns: repeat(2, 1fr);
        }

        .form-section {
            padding: 22px 18px;
        }

        .form-actions {
            padding: 18px;
            flex-direction: column-reverse;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .amenities-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="broker-edit-page">

    <div class="broker-edit-container">

        {{-- PAGE HEADER --}}
        <div class="edit-page-header">

            <div>
                <h2>Edit Property</h2>
                <p>Update your property information and keep your listing accurate.</p>
            </div>

            <a href="{{ route('broker.properties') }}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
                Back to My Properties
            </a>

        </div>

        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())
            <div class="alert-errors">
                <strong>Please correct the following errors:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('broker.properties.update', $property->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="edit-card">

                {{-- CURRENT STATUS --}}
                <div class="form-section">

                    <div class="current-status">
                        <i class="fa-solid fa-circle"></i>

                        Current Status:
                        {{ ucfirst($property->status ?? 'pending') }}
                    </div>

                    @if($property->admin_remark)
                        <div style="
                            padding:12px 15px;
                            background:#fff7ed;
                            border:1px solid #fed7aa;
                            border-radius:8px;
                            color:#9a3412;
                            font-size:13px;
                        ">
                            <strong>Admin Remark:</strong>
                            {{ $property->admin_remark }}
                        </div>
                    @endif

                </div>


                {{-- BASIC DETAILS --}}
                <div class="form-section">

                    <div class="section-heading">

                        <div class="section-icon">
                            <i class="fa-solid fa-building"></i>
                        </div>

                        <div>
                            <h4>Basic Property Information</h4>
                            <p>Enter the basic information of your property.</p>
                        </div>

                    </div>

                    <div class="form-grid">

                        <div class="form-group full">

                            <label class="form-label">
                                Property Title <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="property_title"
                                class="form-control"
                                value="{{ old('property_title', $property->property_title) }}"
                                placeholder="Enter property title"
                                required
                            >

                            @error('property_title')
                                <div class="field-error">{{ $message }}</div>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                Property Type <span class="required">*</span>
                            </label>

                            <select
                                name="property_type"
                                class="form-select"
                                required
                            >

                                <option value="">Select Property Type</option>

                                @foreach($propertyTypes as $type)

                                    <option
                                        value="{{ $type->name }}"
                                        {{ old('property_type', $property->property_type) == $type->name ? 'selected' : '' }}
                                    >
                                        {{ $type->name }}
                                    </option>

                                @endforeach

                            </select>

                            @error('property_type')
                                <div class="field-error">{{ $message }}</div>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                Listing For <span class="required">*</span>
                            </label>

                            <select
                                name="listing_for"
                                class="form-select"
                                required
                            >

                                <option value="">Select Listing Type</option>

                                @foreach(['Rent', 'Lease', 'PG', 'Sell'] as $listing)

                                    <option
                                        value="{{ $listing }}"
                                        {{ old('listing_for', $property->listing_for) == $listing ? 'selected' : '' }}
                                    >
                                        {{ $listing }}
                                    </option>

                                @endforeach

                            </select>

                            @error('listing_for')
                                <div class="field-error">{{ $message }}</div>
                            @enderror

                        </div>


                        {{-- TENANT PREFERENCE --}}

<div class="form-group">

    <label class="form-label">
        Tenant Preference
        <span class="required">*</span>
    </label>

    <select
        name="tenant_preference"
        class="form-select"
        required
    >

        <option value="">
            Select Tenant Preference
        </option>

        <option value="Family"
            {{ old('tenant_preference', $property->tenant_preference) == 'Family' ? 'selected' : '' }}>
            Family
        </option>

        <option value="Bachelor"
            {{ old('tenant_preference', $property->tenant_preference) == 'Bachelor' ? 'selected' : '' }}>
            Bachelor
        </option>

        <option value="Both"
            {{ old('tenant_preference', $property->tenant_preference) == 'Both' ? 'selected' : '' }}>
            Fam & Bac
        </option>

    </select>

    @error('tenant_preference')
        <div class="field-error">{{ $message }}</div>
    @enderror

</div>


                        <div class="form-group">

                            <label class="form-label">BHK</label>

                            <input
                                type="text"
                                name="bhk"
                                class="form-control"
                                value="{{ old('bhk', $property->bhk) }}"
                                placeholder="Example: 2 BHK"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Bathrooms</label>

                            <input
                                type="number"
                                name="bathrooms"
                                class="form-control"
                                value="{{ old('bathrooms', $property->bathrooms) }}"
                                min="0"
                                placeholder="Number of bathrooms"
                            >

                        </div>


                        <div class="form-group full">

                            <label class="form-label">Description</label>

                            <textarea
                                name="description"
                                class="form-control"
                                placeholder="Describe your property..."
                            >{{ old('description', $property->description) }}</textarea>

                        </div>

                    </div>

                </div>


                {{-- LOCATION DETAILS --}}
                <div class="form-section">

                    <div class="section-heading">

                        <div class="section-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <div>
                            <h4>Location Details</h4>
                            <p>Provide the complete property location.</p>
                        </div>

                    </div>

                    <div class="form-grid three">

                        <div class="form-group">

                            <label class="form-label">
                                Country <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="country"
                                class="form-control"
                                value="{{ old('country', $property->country ?? 'India') }}"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                State <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="state"
                                class="form-control"
                                value="{{ old('state', $property->state) }}"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                District <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="district"
                                class="form-control"
                                value="{{ old('district', $property->district) }}"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                City <span class="required">*</span>
                            </label>

                            <select
                                name="city_id"
                                class="form-select"
                                required
                            >

                                <option value="">Select City</option>

                                @foreach($cities as $city)

                                    <option
                                        value="{{ $city->id }}"
                                        {{ old('city_id', $property->city_id) == $city->id ? 'selected' : '' }}
                                    >
                                        {{ $city->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                Locality <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="locality"
                                class="form-control"
                                value="{{ old('locality', $property->locality) }}"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Pincode</label>

                            <input
                                type="text"
                                name="pincode"
                                class="form-control"
                                value="{{ old('pincode', $property->pincode) }}"
                                maxlength="10"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Landmark</label>

                            <input
                                type="text"
                                name="landmark"
                                class="form-control"
                                value="{{ old('landmark', $property->landmark) }}"
                            >

                        </div>


                        <div class="form-group full">

                            <label class="form-label">Full Address</label>

                            <textarea
                                name="address"
                                class="form-control"
                                placeholder="Enter complete address"
                            >{{ old('address', $property->address) }}</textarea>

                        </div>


                        <div class="form-group full">

                            <label class="form-label">Google Map URL</label>

                            <input
                                type="url"
                                name="google_map_url"
                                class="form-control"
                                value="{{ old('google_map_url', $property->google_map_url) }}"
                                placeholder="https://maps.google.com/..."
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Latitude</label>

                            <input
                                type="text"
                                name="latitude"
                                class="form-control"
                                value="{{ old('latitude', $property->latitude) }}"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Longitude</label>

                            <input
                                type="text"
                                name="longitude"
                                class="form-control"
                                value="{{ old('longitude', $property->longitude) }}"
                            >

                        </div>

                    </div>

                </div>


                {{-- PROPERTY DETAILS --}}
                <div class="form-section">

                    <div class="section-heading">

                        <div class="section-icon">
                            <i class="fa-solid fa-house"></i>
                        </div>

                        <div>
                            <h4>Property Details</h4>
                            <p>Update area, furnishing and other property specifications.</p>
                        </div>

                    </div>

                    <div class="form-grid three">

                        <div class="form-group">

                            <label class="form-label">Area (Sq Ft)</label>

                            <input
                                type="number"
                                step="0.01"
                                name="area_sqft"
                                class="form-control"
                                value="{{ old('area_sqft', $property->area_sqft) }}"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Built-up Area</label>

                            <input
                                type="number"
                                step="0.01"
                                name="built_up_area"
                                class="form-control"
                                value="{{ old('built_up_area', $property->built_up_area) }}"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Carpet Area</label>

                            <input
                                type="number"
                                step="0.01"
                                name="carpet_area"
                                class="form-control"
                                value="{{ old('carpet_area', $property->carpet_area) }}"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Furnishing</label>

                            <select name="furnishing" class="form-select">

                                <option value="">Select Furnishing</option>

                                @foreach(['Unfurnished', 'Semi-Furnished', 'Fully Furnished'] as $item)

                                    <option
                                        value="{{ $item }}"
                                        {{ old('furnishing', $property->furnishing) == $item ? 'selected' : '' }}
                                    >
                                        {{ $item }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="form-group">

                            <label class="form-label">Available From</label>

                            <input
                                type="date"
                                name="available_from"
                                class="form-control"
                                value="{{ old('available_from', optional($property->available_from)->format('Y-m-d')) }}"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Balconies</label>

                            <input
                                type="number"
                                name="balconies"
                                class="form-control"
                                min="0"
                                value="{{ old('balconies', $property->balconies) }}"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Floor Number</label>

                            <input
                                type="text"
                                name="floor_number"
                                class="form-control"
                                value="{{ old('floor_number', $property->floor_number) }}"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Total Floors</label>

                            <input
                                type="number"
                                name="total_floors"
                                class="form-control"
                                min="0"
                                value="{{ old('total_floors', $property->total_floors) }}"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Property Age</label>

                            <input
                                type="text"
                                name="property_age"
                                class="form-control"
                                value="{{ old('property_age', $property->property_age) }}"
                                placeholder="Example: 5 Years"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Property Condition</label>

                            <input
                                type="text"
                                name="property_condition"
                                class="form-control"
                                value="{{ old('property_condition', $property->property_condition) }}"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Facing</label>

                            <select name="facing" class="form-select">

                                <option value="">Select Facing</option>

                                @foreach(['East', 'West', 'North', 'South', 'North-East', 'North-West', 'South-East', 'South-West'] as $direction)

                                    <option
                                        value="{{ $direction }}"
                                        {{ old('facing', $property->facing) == $direction ? 'selected' : '' }}
                                    >
                                        {{ $direction }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="form-group">

                            <label class="form-label">Road Width</label>

                            <input
                                type="number"
                                step="0.01"
                                name="road_width"
                                class="form-control"
                                value="{{ old('road_width', $property->road_width) }}"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Car Parking</label>

                            <input
                                type="text"
                                name="car_parking"
                                class="form-control"
                                value="{{ old('car_parking', $property->car_parking) }}"
                                placeholder="Example: 1 Car"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Possession Status</label>

                            <select name="possession_status" class="form-select">

                                <option value="">Select Status</option>

                                @foreach(['Ready to Move', 'Under Construction', 'New Launch'] as $status)

                                    <option
                                        value="{{ $status }}"
                                        {{ old('possession_status', $property->possession_status) == $status ? 'selected' : '' }}
                                    >
                                        {{ $status }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                </div>


                {{-- PRICING --}}
                <div class="form-section">

                    <div class="section-heading">

                        <div class="section-icon">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                        </div>

                        <div>
                            <h4>Pricing</h4>
                            <p>Update the property price and security deposit.</p>
                        </div>

                    </div>

                    <div class="form-grid">

                        <div class="form-group">

                            <label class="form-label">
                                Price <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="price"
                                class="form-control"
                                value="{{ old('price', $property->price) }}"
                                min="0"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">Security Deposit</label>

                            <input
                                type="number"
                                step="0.01"
                                name="security_deposit"
                                class="form-control"
                                value="{{ old('security_deposit', $property->security_deposit) }}"
                                min="0"
                            >

                        </div>

                    </div>

                </div>


                {{-- PHOTOS --}}
                <div class="form-section">

                    <div class="section-heading">

                        <div class="section-icon">
                            <i class="fa-solid fa-images"></i>
                        </div>

                        <div>
                            <h4>Property Photos</h4>
                            <p>View existing photos and upload additional images.</p>
                        </div>

                    </div>


                    @if($property->images && $property->images->count())

                        <div class="existing-images">

                            @foreach($property->images as $index => $image)

                                <div class="existing-image">

                                    <img
                                        src="{{ asset($image->image_path) }}"
                                        alt="Property Image"
                                    >

                                    <span class="image-label">
                                        Image {{ $index + 1 }}
                                    </span>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="no-images">
                            <i class="fa-regular fa-image"></i>
                            <br>
                            No property images uploaded.
                        </div>

                    @endif


                    <div class="upload-box">

                        <i class="fa-solid fa-cloud-arrow-up"></i>

                        <h6>Upload New Photos</h6>

                        <p>
                            JPG, JPEG, PNG or WEBP. You can select multiple images.
                        </p>

                        <input
                            type="file"
                            name="photos[]"
                            class="form-control"
                            accept="image/jpeg,image/png,image/webp"
                            multiple
                        >

                    </div>

                </div>


                {{-- AMENITIES --}}
                <div class="form-section">

                    <div class="section-heading">

                        <div class="section-icon">
                            <i class="fa-solid fa-list-check"></i>
                        </div>

                        <div>
                            <h4>Amenities</h4>
                            <p>Select all amenities available with this property.</p>
                        </div>

                    </div>


                    @php
                        $selectedAmenities = old(
                            'amenities',
                            $property->propertyAmenities
                                ? $property->propertyAmenities->pluck('id')->toArray()
                                : []
                        );
                    @endphp


                    <div class="amenities-grid">

                        @forelse($amenities as $amenity)

                            <div class="amenity-item">

                                <input
                                    type="checkbox"
                                    name="amenities[]"
                                    value="{{ $amenity->id }}"
                                    id="amenity_{{ $amenity->id }}"
                                    {{ in_array($amenity->id, $selectedAmenities) ? 'checked' : '' }}
                                >

                                <label
                                    for="amenity_{{ $amenity->id }}"
                                    class="amenity-label"
                                >
                                    <i class="fa-solid fa-check"></i>
                                    {{ $amenity->name }}
                                </label>

                            </div>

                        @empty

                            <div style="color:#64748b;font-size:14px;">
                                No active amenities available.
                            </div>

                        @endforelse

                    </div>

                </div>


                {{-- OWNER DETAILS --}}
                <div class="form-section">

                    <div class="section-heading">

                        <div class="section-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <div>
                            <h4>Owner / Broker Details</h4>
                            <p>Update the contact details associated with this property.</p>
                        </div>

                    </div>

                    <div class="form-grid">

                        <div class="form-group">

                            <label class="form-label">
                                Owner / Broker Name <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="owner_name"
                                class="form-control"
                                value="{{ old('owner_name', $property->owner_name) }}"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                Contact Phone <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="owner_phone"
                                class="form-control"
                                value="{{ old('owner_phone', $property->owner_phone) }}"
                                required
                            >

                        </div>

                    </div>

                </div>


                {{-- ACTIONS --}}
                <div class="form-actions">

                    <a
                        href="{{ route('broker.properties') }}"
                        class="btn-cancel"
                    >
                        <i class="fa-solid fa-xmark"></i>
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="btn-save"
                    >
                        <i class="fa-solid fa-floppy-disk"></i>
                        Save Changes
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection