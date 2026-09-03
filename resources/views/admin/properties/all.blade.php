@extends('layout.mainlayout')

@section('content')

    <style>
        /* =========================================================
       PROPERTY PAGE
    ========================================================= */

        .property-list-page {
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
       PROPERTY MAIN
    ========================================================= */

        .property-list-main {
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

        .property-list-header {
            width: 100%;

            margin: 0 0 24px;
            padding: 0;

            box-sizing: border-box;
        }

        .property-list-title {
            margin: 0 0 6px;

            color: #071b3d !important;

            font-size: 25px !important;
            font-weight: 700 !important;

            line-height: 1.3 !important;
        }

        .property-list-subtitle {
            margin: 0;

            color: #687389 !important;

            font-size: 13px !important;
            font-weight: 400 !important;

            line-height: 1.5 !important;
        }


        /* =========================================================
       SUCCESS
    ========================================================= */

        .property-list-success {
            display: flex;
            align-items: center;

            width: 100%;
            min-height: 44px;

            margin: 0 0 18px;
            padding: 11px 15px;

            box-sizing: border-box;

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

        .property-list-card {
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

        .property-list-table-scroll {
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

        .property-list-table-scroll::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .property-list-table-scroll::-webkit-scrollbar-track {
            background: #f3f5f8;
        }

        .property-list-table-scroll::-webkit-scrollbar-thumb {
            background: #c3cbd7;

            border-radius: 20px;
        }

        .property-list-table-scroll::-webkit-scrollbar-thumb:hover {
            background: #9fa9b8;
        }


        /* =========================================================
       TABLE
    ========================================================= */

        .property-list-table {
            width: 100%;
            min-width: 1050px;

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

        .property-list-table thead {
            background: #f3f6fa;
        }

        .property-list-table thead th {
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


        /* Center columns */

        .property-list-table thead th:nth-child(1),
        .property-list-table thead th:nth-child(3),
        .property-list-table thead th:nth-child(7),
        .property-list-table thead th:nth-child(8) {
            text-align: center;
        }


        /* =========================================================
       BODY
    ========================================================= */

        .property-list-table tbody tr {
            background: #ffffff;

            transition: background-color .2s ease;
        }

        .property-list-table tbody tr:hover {
            background: #fafbfd;
        }

        .property-list-table tbody td {
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

        .property-list-table tbody tr:last-child td {
            border-bottom: 0;
        }


        /* =========================================================
       COLUMNS
    ========================================================= */

        .property-list-table th:nth-child(1),
        .property-list-table td:nth-child(1) {
            width: 70px;
            text-align: center;
        }

        .property-list-table th:nth-child(2),
        .property-list-table td:nth-child(2) {
            width: 205px;
        }

        .property-list-table th:nth-child(3),
        .property-list-table td:nth-child(3) {
            width: 120px;
            text-align: center;
        }

        .property-list-table th:nth-child(4),
        .property-list-table td:nth-child(4) {
            width: 170px;
        }

        .property-list-table th:nth-child(5),
        .property-list-table td:nth-child(5) {
            width: 190px;
        }

        .property-list-table th:nth-child(6),
        .property-list-table td:nth-child(6) {
            width: 155px;
        }

        .property-list-table th:nth-child(7),
        .property-list-table td:nth-child(7) {
            width: 125px;
            text-align: center;
        }

        .property-list-table th:nth-child(8),
        .property-list-table td:nth-child(8) {
            width: 115px;
            text-align: center;
        }


        /* =========================================================
       PROPERTY
    ========================================================= */

        .property-list-number {
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

        .property-list-property-name {
            margin: 0 0 5px;

            color: #071b3d !important;

            font-size: 13px;
            font-weight: 700;

            line-height: 1.35;
        }

        .property-list-property-meta {
            color: #7d899b !important;

            font-size: 10px;

            line-height: 1.5;
        }


        /* =========================================================
       LISTING
    ========================================================= */

        .property-list-listing {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-width: 65px;
            min-height: 30px;

            padding: 0 12px;

            background: #eef3ff;

            border-radius: 7px;

            color: #3157a6 !important;

            font-size: 10px;
            font-weight: 700;

            white-space: nowrap;
        }


        /* =========================================================
       LOCATION
    ========================================================= */

        .property-list-location {
            color: #344158 !important;

            font-size: 12px;
            font-weight: 600;
        }


        /* =========================================================
       OWNER
    ========================================================= */

        .property-list-owner {
            margin: 0 0 4px;

            color: #071b3d !important;

            font-size: 12px;
            font-weight: 700;
        }

        .property-list-phone {
            color: #7d899b !important;

            font-size: 10px;

            white-space: nowrap;
        }


        /* =========================================================
       PRICE
    ========================================================= */

        .property-list-price {
            color: #071b3d !important;

            font-size: 12px;
            font-weight: 700;

            white-space: nowrap;
        }


        /* =========================================================
       STATUS
    ========================================================= */

        .property-list-status {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-width: 80px;
            min-height: 30px;

            padding: 0 11px;

            border-radius: 7px;

            font-size: 10px;
            font-weight: 700;

            white-space: nowrap;
        }

        .property-list-status-pending {
            background: #fff7e6;
            color: #b7791f;
        }

        .property-list-status-approved {
            background: #ecfdf3;
            color: #18794e;
        }

        .property-list-status-rejected {
            background: #fff1f2;
            color: #e52229;
        }

        .property-list-status-rented {
            background: #eef3ff;
            color: #3157a6;
        }

        .property-list-status-inactive {
            background: #f1f3f5;
            color: #687389;
        }


        /* =========================================================
       VIEW BUTTON
    ========================================================= */

        .property-list-view {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 6px;

            width: 76px;
            height: 36px;

            background: #071b3d;

            border-radius: 8px;

            color: #ffffff !important;

            font-size: 11px;
            font-weight: 600;

            text-decoration: none !important;

            transition: all .2s ease;
        }

        .property-list-view:hover {
            background: #102b5a;

            color: #ffffff !important;

            transform: translateY(-1px);
        }

        .property-list-view i {
            font-size: 14px;
        }


        /* =========================================================
       EMPTY
    ========================================================= */

        .property-list-empty {
            height: 180px;

            text-align: center !important;

            vertical-align: middle !important;
        }

        .property-list-empty-title {
            margin: 0 0 6px;

            color: #687389;

            font-size: 14px;
            font-weight: 600;
        }

        .property-list-empty-text {
            margin: 0;

            color: #8a94a6;

            font-size: 11px;
        }


        /* =========================================================
       PAGINATION
    ========================================================= */

        .property-list-pagination {
            display: flex;

            align-items: center;
            justify-content: flex-end;

            min-height: 65px;

            padding: 12px 18px;

            box-sizing: border-box;

            border-top: 1px solid #edf0f4;
        }


        /* =========================================================
       MOBILE
    ========================================================= */

        @media (max-width: 991px) {

            .property-list-main {
                padding: 20px 15px 30px;
            }

            .property-list-table-scroll {
                max-height: calc(100vh - 180px);
            }

        }


        @media (max-width: 576px) {

            .property-list-main {
                padding: 16px 10px 25px;
            }

            .property-list-title {
                font-size: 20px !important;
            }

            .property-list-subtitle {
                font-size: 11px !important;
            }

            .property-list-table {
                min-width: 1050px;
            }

        }
    </style>


    <div class="property-list-page">

        <div class="property-list-main">

            <div class="property-list-header">

                <h3 class="property-list-title">
                    Property Listings
                </h3>

                <p class="property-list-subtitle">
                    Manage submitted property listings and approvals
                </p>

            </div>


            @if(session('success'))

                <div class="property-list-success">
                    {{ session('success') }}
                </div>

            @endif


            <div class="property-list-card">

                <div class="property-list-table-scroll">

                    <table class="property-list-table">

                        <thead>

                            <tr>

                                <th>S.No</th>

                                <th>Property</th>

                                <th>Listing</th>

                                <th>Location</th>

                                <th>Owner</th>

                                <th>Price</th>

                                <th>Status</th>

                                <th>Action</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($properties as $property)

                                <tr>

                                    <td>

                                        <span class="property-list-number">

                                            {{ $properties->firstItem() + $loop->index }}

                                        </span>

                                    </td>


                                    <td>

                                        <div class="property-list-property-name">

                                            {{ $property->property_type }}

                                        </div>

                                        <div class="property-list-property-meta">

                                            @if($property->bhk)
                                                {{ $property->bhk }}
                                            @endif

                                            @if($property->area_sqft)

                                                @if($property->bhk)
                                                    ·
                                                @endif

                                                {{ $property->area_sqft }} sq ft

                                            @endif

                                        </div>

                                    </td>


                                    <td>

                                        <span class="property-list-listing">

                                            {{ $property->listing_for }}

                                        </span>

                                    </td>


                                    <td>

                                        <div class="property-list-location">

                                            {{ $property->locality }}

                                        </div>

                                    </td>


                                    <td>

                                        <div class="property-list-owner">

                                            {{ $property->owner_name }}

                                        </div>

                                        <div class="property-list-phone">

                                            {{ $property->owner_phone }}

                                        </div>

                                    </td>


                                    <td>

                                        <span class="property-list-price">

                                            ₹ {{ number_format($property->price, 2) }}

                                        </span>

                                    </td>


                                    <td>

                                        @php

                                            $propertyStatusClass = match ($property->status) {

                                                'approved' =>
                                                'property-list-status-approved',

                                                'rejected' =>
                                                'property-list-status-rejected',

                                                'rented' =>
                                                'property-list-status-rented',

                                                'inactive' =>
                                                'property-list-status-inactive',

                                                default =>
                                                'property-list-status-pending',

                                            };

                                        @endphp

                                        <span class="property-list-status {{ $propertyStatusClass }}">

                                            {{ ucfirst($property->status) }}

                                        </span>

                                    </td>


                                    <td>

                                        <a href="{{ route('properties.show', $property->id) }}" class="property-list-view">

                                            <i class="ti ti-eye"></i>

                                            <span>
                                                View
                                            </span>

                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8" class="property-list-empty">

                                        <h5 class="property-list-empty-title">

                                            No Property Listings Found

                                        </h5>

                                        <p class="property-list-empty-text">

                                            No properties have been submitted yet.

                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                @if($properties->hasPages())

                    <div class="property-list-pagination">

                        {{ $properties->links() }}

                    </div>

                @endif

            </div>

        </div>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const sidebar = document.getElementById('sidebar');
            const propertyPage = document.querySelector('.property-list-page');

            if (!sidebar || !propertyPage) {
                return;
            }

            function syncPropertyWithSidebar() {

                /*
                 * Mobile: sidebar behaves differently.
                 */
                if (window.innerWidth <= 991) {

                    propertyPage.style.marginLeft = '0px';
                    propertyPage.style.width = '100%';

                    return;
                }


                /*
                 * Get REAL sidebar width.
                 *
                 * Example:
                 * open     = 280px
                 * collapsed = 94px
                 */
                const sidebarWidth = Math.round(
                    sidebar.getBoundingClientRect().width
                );


                /*
                 * Move property page after sidebar.
                 */
                propertyPage.style.marginLeft =
                    sidebarWidth + 'px';


                /*
                 * Keep the page inside the viewport.
                 */
                propertyPage.style.width =
                    'calc(100% - ' + sidebarWidth + 'px)';
            }


            /*
             * Initial position
             */
            syncPropertyWithSidebar();


            /*
             * Detect sidebar open / close.
             */
            if (typeof ResizeObserver !== 'undefined') {

                const observer = new ResizeObserver(function () {

                    syncPropertyWithSidebar();

                });

                observer.observe(sidebar);

            }


            /*
             * Backup:
             * Some sidebar templates change classes instead
             * of changing the actual sidebar width immediately.
             */
            document.addEventListener('click', function () {

                setTimeout(function () {

                    syncPropertyWithSidebar();

                }, 100);

                setTimeout(function () {

                    syncPropertyWithSidebar();

                }, 300);

            });


            /*
             * Browser resize
             */
            window.addEventListener('resize', function () {

                syncPropertyWithSidebar();

            });

        });
    </script>

@endsection