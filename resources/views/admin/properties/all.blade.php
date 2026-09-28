@extends('layout.mainlayout')

@section('content')

<style>
    /* =========================================================
       PROPERTY MANAGEMENT PAGE
       Same layout/UI structure as Contact Enquiries
    ========================================================= */

    .properties-page {
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

    .properties-main {
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

    .properties-header {
        width: 100%;

        margin: 0 0 24px;
        padding: 0;

        box-sizing: border-box;

        display: flex;
        align-items: flex-start;
        justify-content: space-between;

        gap: 20px;
    }

    .properties-title {
        margin: 0 0 6px;

        color: #071b3d !important;

        font-size: 25px !important;
        font-weight: 700 !important;

        line-height: 1.3 !important;
    }

    .properties-subtitle {
        margin: 0;

        color: #687389 !important;

        font-size: 13px !important;
        font-weight: 400 !important;

        line-height: 1.5 !important;
    }


    /* =========================================================
       ADD BUTTON
    ========================================================= */

    .add-property-btn {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        min-height: 40px;

        padding: 0 16px;

        background: #071b3d;

        color: #ffffff !important;

        border-radius: 8px;

        text-decoration: none;

        font-size: 11px;
        font-weight: 700;

        white-space: nowrap;

        transition: all .2s ease;
    }

    .add-property-btn:hover {
        background: #0d2c60;

        color: #ffffff !important;

        transform: translateY(-1px);
    }


    /* =========================================================
       ALERTS
    ========================================================= */

    .properties-alert {
        display: flex;

        align-items: center;

        width: 100%;
        min-height: 44px;

        margin: 0 0 18px;

        padding: 11px 15px;

        box-sizing: border-box;

        border-radius: 9px;

        font-size: 13px;
        font-weight: 600;
    }

    .properties-alert-success {
        background: #ecfdf3;

        border: 1px solid #b7ebc6;

        color: #18794e;
    }

    .properties-alert-error {
        background: #fff1f2;

        border: 1px solid #fecdd3;

        color: #e52229;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .properties-card {
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
       TABLE SCROLL
    ========================================================= */

    .properties-table-scroll {
        width: 100%;
        max-width: 100%;
        min-width: 0;

        margin: 0;
        padding: 0;

        box-sizing: border-box;

        overflow-x: auto;
        overflow-y: auto;

        max-height: calc(100vh - 210px);

        scrollbar-width: thin;

        -webkit-overflow-scrolling: touch;
    }


    /* =========================================================
       SCROLLBAR
    ========================================================= */

    .properties-table-scroll::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    .properties-table-scroll::-webkit-scrollbar-track {
        background: #f3f5f8;
    }

    .properties-table-scroll::-webkit-scrollbar-thumb {
        background: #c3cbd7;

        border-radius: 20px;
    }

    .properties-table-scroll::-webkit-scrollbar-thumb:hover {
        background: #9fa9b8;
    }


    /* =========================================================
       TABLE
    ========================================================= */

    .properties-table {
        width: 100%;

        min-width: 1250px;

        margin: 0;
        padding: 0;

        border: 0;

        border-collapse: separate;
        border-spacing: 0;

        table-layout: fixed;

        background: #ffffff;
    }


    /* =========================================================
       TABLE HEADER
    ========================================================= */

    .properties-table thead {
        background: #f3f6fa;
    }

    .properties-table thead th {
        height: 52px;

        padding: 0 14px;

        box-sizing: border-box;

        background: #f3f6fa;

        color: #071b3d !important;

        font-size: 11px !important;
        font-weight: 700 !important;

        line-height: 1 !important;

        text-align: left;

        text-transform: uppercase;

        letter-spacing: .35px;

        white-space: nowrap;

        border: 0;

        border-bottom: 1px solid #e0e6ee;

        vertical-align: middle;
    }


    /* =========================================================
       CENTER HEADER
    ========================================================= */

    .properties-table thead th:nth-child(1),
    .properties-table thead th:nth-child(7),
    .properties-table thead th:nth-child(8) {
        text-align: center;
    }


    /* =========================================================
       BODY
    ========================================================= */

    .properties-table tbody tr {
        background: #ffffff;

        transition: background-color .2s ease;
    }

    .properties-table tbody tr:hover {
        background: #fafbfd;
    }

    .properties-table tbody tr:hover td {
        background: #fafbfd;
    }

    .properties-table tbody td {
        height: 78px;

        padding: 12px 14px;

        box-sizing: border-box;

        color: #4f5d72;

        font-size: 12px;
        font-weight: 400;

        line-height: 1.45;

        border: 0;

        border-bottom: 1px solid #edf0f4;

        vertical-align: middle;

        word-break: break-word;
    }

    .properties-table tbody tr:last-child td {
        border-bottom: 0;
    }


    /* =========================================================
       COLUMN WIDTHS
    ========================================================= */

    .properties-table th:nth-child(1),
    .properties-table td:nth-child(1) {
        width: 65px;

        text-align: center;
    }

    .properties-table th:nth-child(2),
    .properties-table td:nth-child(2) {
        width: 240px;
    }

    .properties-table th:nth-child(3),
    .properties-table td:nth-child(3) {
        width: 220px;
    }

    .properties-table th:nth-child(4),
    .properties-table td:nth-child(4) {
        width: 145px;
    }

    .properties-table th:nth-child(5),
    .properties-table td:nth-child(5) {
        width: 160px;
    }

    .properties-table th:nth-child(6),
    .properties-table td:nth-child(6) {
        width: 160px;
    }

    .properties-table th:nth-child(7),
    .properties-table td:nth-child(7) {
        width: 120px;

        text-align: center;
    }

    .properties-table th:nth-child(8),
    .properties-table td:nth-child(8) {
        width: 220px;

        text-align: center;
    }


    /* =========================================================
       NUMBER
    ========================================================= */

    .property-number {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        width: 28px;
        height: 28px;

        background: #f5f7fa;

        border-radius: 7px;

        color: #687389;

        font-size: 11px;
        font-weight: 600;
    }


    /* =========================================================
       PROPERTY
    ========================================================= */

    .property-wrapper {
        display: flex;

        align-items: center;

        gap: 10px;

        min-width: 0;
    }

    .property-image {
        width: 58px;
        height: 46px;

        flex-shrink: 0;

        border-radius: 7px;

        object-fit: cover;

        background: #f3f5f8;
    }

    .property-image-empty {
        width: 58px;
        height: 46px;

        flex-shrink: 0;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 7px;

        background: #f3f5f8;

        color: #8a94a6;

        font-size: 18px;
    }

    .property-info {
        min-width: 0;
    }

    .property-name {
        margin: 0;

        color: #071b3d !important;

        font-size: 13px;

        font-weight: 700;

        line-height: 1.35;
    }

    .property-type {
        margin-top: 3px;

        color: #8a94a6;

        font-size: 10px;

        line-height: 1.4;
    }


    /* =========================================================
       LOCATION
    ========================================================= */

    .property-location {
        color: #687389 !important;

        font-size: 11px;

        line-height: 1.5;
    }

    .property-address {
        margin-top: 3px;

        color: #8a94a6;

        font-size: 10px;

        line-height: 1.4;
    }


    /* =========================================================
       RENT
    ========================================================= */

    .property-rent {
        color: #071b3d !important;

        font-size: 13px;

        font-weight: 700;

        white-space: nowrap;
    }

    .property-rent-period {
        margin-top: 3px;

        color: #8a94a6;

        font-size: 10px;
    }


    /* =========================================================
       DETAILS
    ========================================================= */

    .property-details {
        color: #687389;

        font-size: 11px;

        line-height: 1.8;
    }

    .property-details strong {
        color: #071b3d;
    }


    /* =========================================================
       POSTED BY
    ========================================================= */

    .posted-name {
        display: block;

        color: #071b3d !important;

        font-size: 12px;

        font-weight: 700;
    }

    .posted-type {
        display: block;

        margin-top: 3px;

        color: #8a94a6;

        font-size: 10px;
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .status-badge {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        min-width: 75px;

        min-height: 30px;

        padding: 0 11px;

        border-radius: 7px;

        font-size: 10px;

        font-weight: 700;

        white-space: nowrap;
    }

    .status-approved {
        background: #ecfdf3;

        color: #18794e !important;
    }

    .status-pending {
        background: #fff7e6;

        color: #b7791f !important;
    }

    .status-rejected {
        background: #fff1f2;

        color: #e52229 !important;
    }

    .status-rented {
        background: #eef3ff;

        color: #3157a6 !important;
    }

    .status-inactive {
        background: #f1f3f5;

        color: #687389 !important;
    }


    /* =========================================================
       ACTIONS
    ========================================================= */

    .property-actions {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 6px;

        flex-wrap: wrap;
    }

    .property-action {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        width: 34px;
        height: 34px;

        padding: 0;

        background: #ffffff;

        border: 1px solid #e5eaf1;

        border-radius: 8px;

        text-decoration: none;

        cursor: pointer;

        font-size: 15px;

        transition: all .2s ease;
    }

    .property-action:hover {
        transform: translateY(-1px);
    }

    .property-view {
        color: #3157a6 !important;

        background: #eef3ff;
    }

    .property-view:hover {
        background: #3157a6;

        color: #ffffff !important;
    }

    .property-edit {
        color: #b7791f !important;

        background: #fff7e6;
    }

    .property-edit:hover {
        background: #b7791f;

        color: #ffffff !important;
    }

    .property-approve {
        color: #18794e !important;

        background: #ecfdf3;
    }

    .property-approve:hover {
        background: #18794e;

        color: #ffffff !important;
    }

    .property-reject {
        color: #e52229 !important;

        background: #fff1f2;
    }

    .property-reject:hover {
        background: #e52229;

        color: #ffffff !important;
    }

    .property-delete {
        color: #e52229 !important;

        background: #fff1f2;
    }

    .property-delete:hover {
        background: #e52229;

        color: #ffffff !important;
    }

    .property-action-form {
        display: inline-block;

        margin: 0;
        padding: 0;
    }


    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .properties-empty {
        height: 180px;

        text-align: center !important;

        vertical-align: middle !important;

        color: #8a94a6 !important;
    }

    .properties-empty-title {
        margin: 10px 0 6px;

        color: #687389;

        font-size: 14px;

        font-weight: 600;
    }

    .properties-empty-text {
        margin: 0;

        color: #8a94a6;

        font-size: 11px;
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .properties-pagination {
        padding: 18px;

        border-top: 1px solid #edf0f4;
    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 991px) {

        .properties-main {
            padding: 20px 15px 30px;
        }

        .properties-table-scroll {
            max-height: calc(100vh - 180px);
        }
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 576px) {

        .properties-main {
            padding: 16px 10px 25px;
        }

        .properties-title {
            font-size: 20px !important;
        }

        .properties-subtitle {
            font-size: 11px !important;
        }

        .properties-header {
            flex-direction: column;
        }

        .add-property-btn {
            width: 100%;
        }

        .properties-table {
            min-width: 1250px;
        }
    }
</style>


<div class="properties-page">

    <div class="properties-main">


        {{-- =====================================================
        PAGE HEADER
        ====================================================== --}}

        <div class="properties-header">

            <div>

                <h3 class="properties-title">
                    Property Management
                </h3>

                <p class="properties-subtitle">
                    Manage rental properties and approval status
                </p>

            </div>


            <a
                href="{{ route('properties.create') }}"
                class="add-property-btn"
            >

                <i class="ti ti-plus me-1"></i>

                Add Rent Property

            </a>

        </div>


        {{-- =====================================================
        SUCCESS MESSAGE
        ====================================================== --}}

        @if(session('success'))

            <div class="properties-alert properties-alert-success">

                <i class="ti ti-circle-check me-2"></i>

                {{ session('success') }}

            </div>

        @endif


        {{-- =====================================================
        ERROR MESSAGE
        ====================================================== --}}

        @if(session('error'))

            <div class="properties-alert properties-alert-error">

                <i class="ti ti-alert-circle me-2"></i>

                {{ session('error') }}

            </div>

        @endif


        {{-- =====================================================
        VALIDATION ERRORS
        ====================================================== --}}

        @if($errors->any())

            <div class="properties-alert properties-alert-error">

                <i class="ti ti-alert-circle me-2"></i>

                <div>

                    {{ $errors->first() }}

                </div>

            </div>

        @endif


        {{-- =====================================================
        TABLE CARD
        ====================================================== --}}

        <div class="properties-card">

            <div class="properties-table-scroll">

                <table class="properties-table">

                    <thead>

                        <tr>

                            <th>S.No</th>

                            <th>Property</th>

                            <th>Location</th>

                            <th>Rent</th>

                            <th>Details</th>

                            <th>Posted By</th>

                            <th>Status</th>

                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($properties as $property)

                            <tr>


                                {{-- =================================================
                                S.NO
                                ================================================== --}}

                                <td>

                                    <span class="property-number">

                                        {{ $properties->firstItem() + $loop->index }}

                                    </span>

                                </td>


                                {{-- =================================================
                                PROPERTY
                                ================================================== --}}

                                <td>

                                    <div class="property-wrapper">


                                        @if($property->images && $property->images->count() > 0)

                                            @php

                                                $firstImage =
                                                    $property->images->first();

                                            @endphp

                                            <img
                                                src="{{ asset('storage/' . $firstImage->image_path) }}"
                                                alt="{{ $property->property_title ?? 'Property' }}"
                                                class="property-image"
                                                onerror="this.style.display='none';"
                                            >

                                        @else

                                            <div class="property-image-empty">

                                                <i class="ti ti-building"></i>

                                            </div>

                                        @endif


                                        <div class="property-info">

                                            <div class="property-name">

                                                {{ $property->property_title ?? 'Untitled Property' }}

                                            </div>

                                            <div class="property-type">

                                                {{ $property->property_type ?? '-' }}

                                            </div>

                                        </div>

                                    </div>

                                </td>


                                {{-- =================================================
                                LOCATION
                                ================================================== --}}

                                <td>

                                    <div
                                        class="property-location"
                                        title="{{ $property->locality ?? '' }}"
                                    >

                                        {{ $property->locality ?? '-' }}

                                    </div>


                                    @if($property->address)

                                        <div
                                            class="property-address"
                                            title="{{ $property->address }}"
                                        >

                                            {{ \Illuminate\Support\Str::limit(
                                                $property->address,
                                                45
                                            ) }}

                                        </div>

                                    @endif

                                </td>


                                {{-- =================================================
                                RENT
                                ================================================== --}}

                                <td>

                                    <span class="property-rent">

                                        ₹{{ number_format(
                                            (float) ($property->price ?? 0)
                                        ) }}

                                    </span>


                                    <div class="property-rent-period">

                                        / month

                                    </div>

                                </td>


                                {{-- =================================================
                                DETAILS
                                ================================================== --}}

                                <td>

                                    <div class="property-details">

                                        <strong>
                                            {{ $property->bhk ?? '-' }}
                                        </strong>

                                        BHK

                                        <br>


                                        <strong>
                                            {{ $property->bathrooms ?? '-' }}
                                        </strong>

                                        Bath

                                        <br>


                                        <strong>

                                            {{ $property->area_sqft
                                                ? number_format(
                                                    $property->area_sqft
                                                )
                                                : '-'
                                            }}

                                        </strong>

                                        Sq.Ft

                                    </div>

                                </td>


                                {{-- =================================================
                                POSTED BY
                                ================================================== --}}

                                <td>

                                    @if($property->user)

                                        <span class="posted-name">

                                            {{ $property->user->name ?? 'Vendor' }}

                                        </span>

                                        <span class="posted-type">

                                            Vendor

                                        </span>

                                    @else

                                        <span class="posted-name">

                                            Admin

                                        </span>

                                        <span class="posted-type">

                                            Admin Posted

                                        </span>

                                    @endif

                                </td>


                                {{-- =================================================
                                STATUS
                                ================================================== --}}

                                <td>

                                    @php

                                        $status = strtolower(
                                            trim(
                                                $property->status ?? 'pending'
                                            )
                                        );

                                        $statusClass = match ($status) {

                                            'approved' =>
                                                'status-approved',

                                            'pending' =>
                                                'status-pending',

                                            'rejected' =>
                                                'status-rejected',

                                            'rented' =>
                                                'status-rented',

                                            'inactive' =>
                                                'status-inactive',

                                            default =>
                                                'status-inactive',

                                        };

                                    @endphp


                                    <span
                                        class="status-badge {{ $statusClass }}"
                                    >

                                        {{ ucfirst($status) }}

                                    </span>

                                </td>


                                {{-- =================================================
                                ACTIONS
                                ================================================== --}}

                                <td>

                                    <div class="property-actions">


                                        {{-- VIEW --}}

                                        <a
                                            href="{{ route(
                                                'properties.show',
                                                $property->id
                                            ) }}"
                                            class="property-action property-view"
                                            title="View Property"
                                            aria-label="View Property"
                                        >

                                            <i class="ti ti-eye"></i>

                                        </a>


                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route(
                                                'properties.edit',
                                                $property->id
                                            ) }}"
                                            class="property-action property-edit"
                                            title="Edit Property"
                                            aria-label="Edit Property"
                                        >

                                            <i class="ti ti-edit"></i>

                                        </a>


                                        {{-- =================================================
                                        PENDING ACTIONS
                                        ================================================== --}}

                                        @if($property->status === 'pending')


                                            {{-- APPROVE --}}

                                            <form
                                                action="{{ route(
                                                    'properties.approve',
                                                    $property->id
                                                ) }}"
                                                method="POST"
                                                class="property-action-form"
                                                onsubmit="return confirm(
                                                    'Approve this property?'
                                                );"
                                            >

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="property-action property-approve"
                                                    title="Approve Property"
                                                    aria-label="Approve Property"
                                                >

                                                    <i class="ti ti-check"></i>

                                                </button>

                                            </form>


                                            {{-- REJECT --}}

                                            <form
                                                action="{{ route(
                                                    'properties.reject',
                                                    $property->id
                                                ) }}"
                                                method="POST"
                                                class="property-action-form reject-form"
                                            >

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="property-action property-reject"
                                                    title="Reject Property"
                                                    aria-label="Reject Property"
                                                >

                                                    <i class="ti ti-x"></i>

                                                </button>

                                            </form>

                                        @endif


                                        {{-- =================================================
                                        APPROVED ACTIONS
                                        ================================================== --}}

                                        @if($property->status === 'approved')


                                            {{-- MARK RENTED --}}

                                            <form
                                                action="{{ route(
                                                    'properties.rented',
                                                    $property->id
                                                ) }}"
                                                method="POST"
                                                class="property-action-form"
                                                onsubmit="return confirm(
                                                    'Mark this property as rented?'
                                                );"
                                            >

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="property-action"
                                                    title="Mark Rented"
                                                    aria-label="Mark Rented"
                                                >

                                                    <i class="ti ti-home-check"></i>

                                                </button>

                                            </form>


                                            {{-- DISABLE --}}

                                            <form
                                                action="{{ route(
                                                    'properties.disable',
                                                    $property->id
                                                ) }}"
                                                method="POST"
                                                class="property-action-form"
                                                onsubmit="return confirm(
                                                    'Disable this property?'
                                                );"
                                            >

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="property-action"
                                                    title="Disable Property"
                                                    aria-label="Disable Property"
                                                >

                                                    <i class="ti ti-ban"></i>

                                                </button>

                                            </form>

                                        @endif


                                        {{-- =================================================
                                        ENABLE
                                        ================================================== --}}

                                        @if(
                                            $property->status === 'rejected' ||
                                            $property->status === 'rented' ||
                                            $property->status === 'inactive'
                                        )

                                            <form
                                                action="{{ route(
                                                    'properties.enable',
                                                    $property->id
                                                ) }}"
                                                method="POST"
                                                class="property-action-form"
                                                onsubmit="return confirm(
                                                    'Enable this property?'
                                                );"
                                            >

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="property-action property-approve"
                                                    title="Enable Property"
                                                    aria-label="Enable Property"
                                                >

                                                    <i class="ti ti-toggle-on"></i>

                                                </button>

                                            </form>

                                        @endif


                                        {{-- =================================================
                                        DELETE
                                        ================================================== --}}

                                        <form
                                            action="{{ route(
                                                'properties.destroy',
                                                $property->id
                                            ) }}"
                                            method="POST"
                                            class="property-action-form delete-property-form"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="property-action property-delete"
                                                title="Delete Property"
                                                aria-label="Delete Property"
                                            >

                                                <i class="ti ti-trash"></i>

                                            </button>

                                        </form>


                                    </div>

                                </td>

                            </tr>


                        @empty


                            {{-- =================================================
                            EMPTY STATE
                            ================================================== --}}

                            <tr>

                                <td
                                    colspan="8"
                                    class="properties-empty"
                                >

                                    <i
                                        class="ti ti-building-off"
                                        style="font-size:40px;"
                                    ></i>


                                    <div class="properties-empty-title">

                                        No Properties Found

                                    </div>


                                    <p class="properties-empty-text">

                                        No rental properties have been added yet.

                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- =====================================================
            PAGINATION
            ====================================================== --}}

            @if($properties->hasPages())

                <div class="properties-pagination">

                    {{ $properties->links() }}

                </div>

            @endif

        </div>

    </div>

</div>


<script>

    document.addEventListener('DOMContentLoaded', function () {


        /* =========================================================
           REJECT PROPERTY
        ========================================================= */

        document
            .querySelectorAll('.reject-form')
            .forEach(function (form) {

                form.addEventListener('submit', function (event) {

                    event.preventDefault();


                    const reason = prompt(
                        'Enter rejection reason (optional):'
                    );


                    if (reason === null) {

                        return;

                    }


                    let input = form.querySelector(
                        'input[name="admin_remark"]'
                    );


                    if (!input) {

                        input = document.createElement('input');

                        input.type = 'hidden';

                        input.name = 'admin_remark';

                        form.appendChild(input);

                    }


                    input.value = reason;

                    form.submit();

                });

            });


        /* =========================================================
           DELETE PROPERTY
        ========================================================= */

        document
            .querySelectorAll('.delete-property-form')
            .forEach(function (form) {

                form.addEventListener('submit', function (event) {

                    event.preventDefault();


                    if (typeof Swal === 'undefined') {

                        if (
                            confirm(
                                'Are you sure you want to delete this property?'
                            )
                        ) {

                            form.submit();

                        }

                        return;

                    }


                    Swal.fire({

                        title: 'Delete Property?',

                        text:
                            'Are you sure you want to delete this property?',

                        icon: 'warning',

                        showCancelButton: true,

                        confirmButtonText: 'Yes, Delete',

                        cancelButtonText: 'Cancel',

                        confirmButtonColor: '#e52229',

                        cancelButtonColor: '#687389',

                        reverseButtons: true,

                        allowOutsideClick: false

                    }).then(function (result) {

                        if (result.isConfirmed) {

                            form.submit();

                        }

                    });

                });

            });


        /* =========================================================
           SIDEBAR RESPONSIVE SYNC
        ========================================================= */

        const sidebar =
            document.getElementById('sidebar');

        const propertiesPage =
            document.querySelector('.properties-page');


        if (!sidebar || !propertiesPage) {

            return;

        }


        function syncPropertiesPageWithSidebar() {


            /* -----------------------------------------------------
               MOBILE
            ----------------------------------------------------- */

            if (window.innerWidth <= 991) {

                propertiesPage.style.marginLeft = '0px';

                propertiesPage.style.width = '100%';

                return;

            }


            /* -----------------------------------------------------
               DESKTOP
            ----------------------------------------------------- */

            const sidebarWidth =
                Math.round(
                    sidebar.getBoundingClientRect().width
                );


            propertiesPage.style.marginLeft =
                sidebarWidth + 'px';


            propertiesPage.style.width =
                'calc(100% - ' +
                sidebarWidth +
                'px)';

        }


        /* INITIAL */

        syncPropertiesPageWithSidebar();


        /* SIDEBAR RESIZE */

        if (typeof ResizeObserver !== 'undefined') {

            const observer =
                new ResizeObserver(function () {

                    syncPropertiesPageWithSidebar();

                });

            observer.observe(sidebar);

        }


        /* CLICK */

        document.addEventListener('click', function () {

            setTimeout(function () {

                syncPropertiesPageWithSidebar();

            }, 100);


            setTimeout(function () {

                syncPropertiesPageWithSidebar();

            }, 300);

        });


        /* RESIZE */

        window.addEventListener('resize', function () {

            syncPropertiesPageWithSidebar();

        });

    });

</script>

@endsection