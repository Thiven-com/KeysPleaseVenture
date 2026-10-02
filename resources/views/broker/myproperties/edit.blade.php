@extends('layout.brokermainlayout')

@section('content')

<style>
    /* =========================================================
       BROKER EDIT PROPERTY
       Same design language as Add Property
       ========================================================= */

    .broker-edit-page {
        width: 100%;
        min-width: 0;
        box-sizing: border-box;
        overflow-x: hidden;
    }

    .broker-edit-main {
        width: calc(100% - 250px);
        max-width: calc(100% - 250px);
        margin-left: 250px;
        margin-top: 50px;
        padding: 28px 30px 35px;
        box-sizing: border-box;
        transition: all .2s ease;
    }


    /* =========================================================
       HEADER
       ========================================================= */

    .broker-edit-header {
        margin-bottom: 24px;
    }

    .broker-edit-header h3 {
        margin: 0 0 6px;
        color: #071b3d;
        font-size: 25px;
        font-weight: 700;
        line-height: 1.3;
    }

    .broker-edit-header p {
        margin: 0;
        color: #687389;
        font-size: 13px;
        line-height: 1.5;
    }


    /* =========================================================
       MAIN CARD
       ========================================================= */

    .broker-edit-card {
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

    .broker-edit-card-header {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 20px 25px;
        border-bottom: 1px solid #edf0f4;
    }

    .broker-edit-card-icon {
        width: 34px;
        height: 34px;
        flex-shrink: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #f3f6fa;
        border-radius: 8px;
        color: #071b3d;
        font-size: 16px;
    }

    .broker-edit-card-header h5 {
        margin: 0;
        color: #071b3d;
        font-size: 15px;
        font-weight: 700;
    }

    .broker-edit-card-header p {
        margin: 2px 0 0;
        color: #8a94a6;
        font-size: 10px;
    }


    /* =========================================================
       FORM
       ========================================================= */

    .broker-edit-form {
        padding: 25px;
    }

    .broker-edit-section {
        margin-bottom: 25px;
    }

    .broker-edit-section:last-child {
        margin-bottom: 0;
    }

    .broker-edit-section-title {
        display: flex;
        align-items: center;
        gap: 8px;
        margin: 0 0 18px;
        padding-bottom: 11px;
        border-bottom: 1px solid #edf0f4;
        color: #071b3d;
        font-size: 13px;
        font-weight: 700;
    }

    .broker-edit-section-title i {
        color: #071b3d;
        font-size: 15px;
    }


    /* =========================================================
       FORM GROUP
       ========================================================= */

    .broker-edit-group {
        margin-bottom: 18px;
    }

    .broker-edit-label {
        display: block;
        margin-bottom: 7px;
        color: #344158;
        font-size: 11px;
        font-weight: 700;
    }

    .broker-edit-label .required {
        color: #dc3545;
    }

    .broker-edit-control {
        display: block;
        width: 100%;
        height: 42px;
        padding: 9px 12px;
        box-sizing: border-box;
        background: #ffffff;
        border: 1px solid #dfe4eb;
        border-radius: 8px;
        color: #344158;
        font-size: 11px;
        outline: none;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .broker-edit-control::placeholder {
        color: #a0a8b5;
    }

    .broker-edit-control:focus {
        border-color: #071b3d;
        box-shadow: 0 0 0 3px rgba(7, 27, 61, .06);
    }

    textarea.broker-edit-control {
        min-height: 120px;
        height: auto;
        padding-top: 11px;
        resize: vertical;
        line-height: 1.6;
    }


    /* =========================================================
       CURRENT IMAGE
       ========================================================= */

    .broker-current-image-wrapper {
        padding: 14px;
        background: #f8f9fb;
        border: 1px solid #e5eaf1;
        border-radius: 10px;
    }

    .broker-current-image {
        display: block;
        width: 150px;
        height: 105px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #dfe4eb;
    }

    .broker-image-help {
        margin-top: 8px;
        color: #8a94a6;
        font-size: 10px;
    }


    /* =========================================================
       FORM ACTIONS
       ========================================================= */

    .broker-edit-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 8px;
        padding-top: 20px;
        border-top: 1px solid #edf0f4;
    }

    .broker-edit-cancel,
    .broker-edit-save {
        min-height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 0 18px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: all .2s ease;
    }

    .broker-edit-cancel {
        background: #ffffff;
        border: 1px solid #dfe4eb;
        color: #687389;
    }

    .broker-edit-cancel:hover {
        background: #f8f9fb;
        color: #071b3d;
        border-color: #cfd5de;
    }

    .broker-edit-save {
        background: #071b3d;
        border: 1px solid #071b3d;
        color: #ffffff;
    }

    .broker-edit-save:hover {
        background: #0d2c60;
        border-color: #0d2c60;
        color: #ffffff;
        transform: translateY(-1px);
    }


    /* =========================================================
       VALIDATION
       ========================================================= */

    .broker-edit-error {
        margin-top: 5px;
        color: #dc3545;
        font-size: 10px;
    }


    /* =========================================================
       RESPONSIVE
       ========================================================= */

    @media (max-width: 991px) {

        .broker-edit-main {
            width: 100%;
            max-width: 100%;
            margin-left: 0;
            padding: 22px 20px 30px;
        }

    }


    @media (max-width: 768px) {

        .broker-edit-main {
            padding: 18px 15px 25px;
        }

        .broker-edit-header h3 {
            font-size: 21px;
        }

        .broker-edit-header p {
            font-size: 11px;
        }

        .broker-edit-card-header {
            padding: 18px 15px;
        }

        .broker-edit-form {
            padding: 18px 15px;
        }

        .broker-edit-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .broker-edit-cancel,
        .broker-edit-save {
            width: 100%;
        }

    }


    @media (max-width: 576px) {

        .broker-edit-main {
            padding: 16px 10px 25px;
        }

        .broker-edit-card {
            border-radius: 10px;
        }

        .broker-current-image {
            width: 130px;
            height: 95px;
        }

    }
</style>


<div class="broker-edit-page">

    <div class="broker-edit-main">

        {{-- =====================================================
             PAGE HEADER
        ====================================================== --}}

        <div class="broker-edit-header">

            <h3>
                Edit Property
            </h3>

            <p>
                Update your property information and keep your listing details accurate.
            </p>

        </div>


        {{-- =====================================================
             MAIN CARD
        ====================================================== --}}

        <div class="broker-edit-card">

            {{-- CARD HEADER --}}
            <div class="broker-edit-card-header">

                <div class="broker-edit-card-icon">
                    <i class="ti ti-edit"></i>
                </div>

                <div>

                    <h5>
                        Property Information
                    </h5>

                    <p>
                        Update the details of your property.
                    </p>

                </div>

            </div>


            {{-- =================================================
                 FORM
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('broker.properties.update', $property->id) }}"
                class="broker-edit-form"
            >

                @csrf

                @method('PUT')


                {{-- =================================================
                     BASIC INFORMATION
                ================================================== --}}

                <div class="broker-edit-section">

                    <div class="broker-edit-section-title">

                        <i class="ti ti-building"></i>

                        Basic Information

                    </div>


                    <div class="row">


                        {{-- PROPERTY TYPE --}}
                        <div class="col-md-6">

                            <div class="broker-edit-group">

                                <label class="broker-edit-label">

                                    Property Type

                                    <span class="required">*</span>

                                </label>

                                <input
                                    type="text"
                                    name="property_type"
                                    class="broker-edit-control"
                                    value="{{ old('property_type', $property->property_type) }}"
                                    placeholder="Enter property type"
                                >

                                @error('property_type')
                                    <div class="broker-edit-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>


                        {{-- BHK --}}
                        <div class="col-md-6">

                            <div class="broker-edit-group">

                                <label class="broker-edit-label">
                                    BHK
                                </label>

                                <input
                                    type="text"
                                    name="bhk"
                                    class="broker-edit-control"
                                    value="{{ old('bhk', $property->bhk) }}"
                                    placeholder="Example: 2 BHK"
                                >

                                @error('bhk')
                                    <div class="broker-edit-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>


                        {{-- LOCALITY --}}
                        <div class="col-md-6">

                            <div class="broker-edit-group">

                                <label class="broker-edit-label">
                                    Locality
                                </label>

                                <input
                                    type="text"
                                    name="locality"
                                    class="broker-edit-control"
                                    value="{{ old('locality', $property->locality) }}"
                                    placeholder="Enter locality"
                                >

                                @error('locality')
                                    <div class="broker-edit-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>


                        {{-- CITY --}}
                        <div class="col-md-6">

                            <div class="broker-edit-group">

                                <label class="broker-edit-label">
                                    City
                                </label>

                                <input
                                    type="text"
                                    name="city"
                                    class="broker-edit-control"
                                    value="{{ old('city', $property->cityRelation->name ?? $property->city) }}"
                                    placeholder="Enter city"
                                >

                                @error('city')
                                    <div class="broker-edit-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     PROPERTY DETAILS
                ================================================== --}}

                <div class="broker-edit-section">

                    <div class="broker-edit-section-title">

                        <i class="ti ti-currency-rupee"></i>

                        Property Details

                    </div>


                    <div class="row">


                        {{-- PRICE --}}
                        <div class="col-md-6">

                            <div class="broker-edit-group">

                                <label class="broker-edit-label">

                                    Price

                                    <span class="required">*</span>

                                </label>

                                <input
                                    type="number"
                                    name="price"
                                    class="broker-edit-control"
                                    value="{{ old('price', $property->price) }}"
                                    placeholder="Enter property price"
                                    min="0"
                                >

                                @error('price')
                                    <div class="broker-edit-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>


                        {{-- AREA --}}
                        <div class="col-md-6">

                            <div class="broker-edit-group">

                                <label class="broker-edit-label">
                                    Area
                                </label>

                                <input
                                    type="text"
                                    name="area"
                                    class="broker-edit-control"
                                    value="{{ old('area', $property->area) }}"
                                    placeholder="Example: 1200 sq.ft"
                                >

                                @error('area')
                                    <div class="broker-edit-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     DESCRIPTION
                ================================================== --}}

                <div class="broker-edit-section">

                    <div class="broker-edit-section-title">

                        <i class="ti ti-file-description"></i>

                        Description

                    </div>


                    <div class="broker-edit-group">

                        <label class="broker-edit-label">
                            Property Description
                        </label>

                        <textarea
                            name="description"
                            class="broker-edit-control"
                            placeholder="Enter property description"
                        >{{ old('description', $property->description) }}</textarea>

                        @error('description')
                            <div class="broker-edit-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                {{-- =================================================
                     CURRENT IMAGE
                ================================================== --}}

                @if($property->images->first())

                    <div class="broker-edit-section">

                        <div class="broker-edit-section-title">

                            <i class="ti ti-photo"></i>

                            Current Property Image

                        </div>


                        <div class="broker-current-image-wrapper">

                            <img
                                src="{{ asset('storage/' . $property->images->first()->image_path) }}"
                                alt="Property"
                                class="broker-current-image"
                            >

                            <div class="broker-image-help">
                                Current property image
                            </div>

                        </div>

                    </div>

                @endif


                {{-- =================================================
                     ACTIONS
                ================================================== --}}

                <div class="broker-edit-actions">

                    <a
                        href="{{ route('broker.properties') }}"
                        class="broker-edit-cancel"
                    >

                        <i class="ti ti-arrow-left"></i>

                        Cancel

                    </a>


                    <button
                        type="submit"
                        class="broker-edit-save"
                    >

                        <i class="ti ti-device-floppy"></i>

                        Save Changes

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- =========================================================
     SIDEBAR WIDTH SYNC
========================================================= --}}

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const sidebar = document.getElementById('sidebar');
        const main = document.querySelector('.broker-edit-main');

        function syncSidebarLayout() {

            if (!main) {
                return;
            }

            if (window.innerWidth <= 991) {

                main.style.marginLeft = '0';
                main.style.width = '100%';
                main.style.maxWidth = '100%';

                return;
            }

            const sidebarWidth = sidebar
                ? sidebar.getBoundingClientRect().width
                : 250;

            main.style.marginLeft = sidebarWidth + 'px';
            main.style.width = `calc(100% - ${sidebarWidth}px)`;
            main.style.maxWidth = `calc(100% - ${sidebarWidth}px)`;
        }

        syncSidebarLayout();

        if (sidebar && window.ResizeObserver) {

            const observer = new ResizeObserver(function () {
                syncSidebarLayout();
            });

            observer.observe(sidebar);
        }

        window.addEventListener('resize', syncSidebarLayout);

    });

</script>

@endsection