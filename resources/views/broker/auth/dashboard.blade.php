@extends('layout.brokermainlayout')

@section('content')

    <style>
        .broker-dashboard {
            margin-left: 95px !important;
            width: calc(100% - 95px);
            padding: 105px 25px 40px;
            background: #f5f7fb;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .broker-dashboard-container {
            max-width: 1500px;
            margin: 0 auto;
        }

        /* PAGE HEADER */
        .broker-dashboard-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .broker-dashboard-heading h1 {
            margin: 0;
            color: #071b3d;
            font-size: 30px;
            font-weight: 700;
            line-height: 1.2;
        }

        .broker-dashboard-heading p {
            margin: 8px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .broker-add-property-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 12px 20px;
            background: #071b3d;
            color: #fff !important;
            border-radius: 10px;
            text-decoration: none !important;
            font-size: 14px;
            font-weight: 600;
            transition: .25s ease;
            white-space: nowrap;
        }

        .broker-add-property-btn:hover {
            background: #0d2d63;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(7, 27, 61, .18);
        }

        /* STATISTICS */
        .broker-stat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .broker-stat-card {
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 15px;
            padding: 22px;
            min-height: 135px;
            box-sizing: border-box;
            transition: .25s ease;
        }

        .broker-stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(7, 27, 61, .08);
        }

        .broker-stat-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
        }

        .broker-stat-title {
            color: #737b89;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .broker-stat-value {
            color: #071b3d;
            font-size: 30px;
            line-height: 1;
            font-weight: 700;
        }

        .broker-stat-icon {
            width: 48px;
            height: 48px;
            min-width: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .broker-stat-icon.blue {
            background: #eaf2ff;
            color: #0d6efd;
        }

        .broker-stat-icon.green {
            background: #e9f8f0;
            color: #198754;
        }

        .broker-stat-icon.orange {
            background: #fff3e6;
            color: #f08c00;
        }

        .broker-stat-icon.red {
            background: #fdecec;
            color: #dc3545;
        }

        .broker-stat-footer {
            margin-top: 18px;
            color: #89919e;
            font-size: 12px;
        }

        /* MAIN GRID */
        .broker-dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(300px, .9fr);
            gap: 22px;
            margin-bottom: 22px;
        }

        .broker-dashboard-card {
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 15px;
            overflow: hidden;
        }

        .broker-dashboard-card-header {
            padding: 20px 22px;
            border-bottom: 1px solid #edf0f5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .broker-dashboard-card-title {
            margin: 0;
            color: #071b3d;
            font-size: 17px;
            font-weight: 700;
        }

        .broker-dashboard-card-subtitle {
            margin: 5px 0 0;
            color: #8a929f;
            font-size: 12px;
        }

        .broker-view-all {
            color: #0d6efd !important;
            text-decoration: none !important;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        .broker-view-all:hover {
            text-decoration: underline !important;
        }

        /* PROPERTY LIST */
        .broker-property-list {
            padding: 5px 22px;
        }

        .broker-property-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 17px 0;
            border-bottom: 1px solid #edf0f5;
        }

        .broker-property-item:last-child {
            border-bottom: 0;
        }

        .broker-property-image {
            width: 68px;
            height: 58px;
            min-width: 68px;
            border-radius: 9px;
            overflow: hidden;
            background: #eef2f7;
        }

        .broker-property-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .broker-property-info {
            min-width: 0;
            flex: 1;
        }

        .broker-property-name {
            margin: 0 0 5px;
            color: #172033;
            font-size: 14px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .broker-property-location {
            color: #8a929f;
            font-size: 12px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .broker-property-price {
            color: #071b3d;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* STATUS */
        .broker-status {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .broker-status.approved {
            background: #e9f8f0;
            color: #198754;
        }

        .broker-status.pending {
            background: #fff3e6;
            color: #d97706;
        }

        .broker-status.rejected {
            background: #fdecec;
            color: #dc3545;
        }

        .broker-status.default {
            background: #eef2f7;
            color: #667085;
        }

        /* QUICK ACTIONS */
        .broker-quick-actions {
            padding: 20px;
        }

        .broker-action {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px;
            margin-bottom: 11px;
            border: 1px solid #edf0f5;
            border-radius: 11px;
            color: #172033 !important;
            text-decoration: none !important;
            transition: .2s ease;
        }

        .broker-action:last-child {
            margin-bottom: 0;
        }

        .broker-action:hover {
            border-color: #cfd8e6;
            background: #f8fafc;
            transform: translateX(2px);
        }

        .broker-action-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #edf3fb;
            color: #071b3d;
            font-size: 16px;
        }

        .broker-action-content {
            flex: 1;
        }

        .broker-action-title {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #172033;
        }

        .broker-action-text {
            display: block;
            margin-top: 3px;
            color: #8a929f;
            font-size: 11px;
        }

        .broker-action-arrow {
            color: #9aa2ae;
            font-size: 12px;
        }

        /* EMPTY STATE */
        .broker-empty {
            padding: 45px 20px;
            text-align: center;
            color: #8a929f;
        }

        .broker-empty i {
            font-size: 35px;
            margin-bottom: 12px;
            color: #c4ccd7;
        }

        .broker-empty p {
            margin: 0;
            font-size: 13px;
        }

        /* RESPONSIVE */
        @media (max-width: 1200px) {
            .broker-stat-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .broker-dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 991px) {
            .broker-dashboard {
                margin-left: 0 !important;
                width: 100%;
                padding: 100px 20px 30px;
            }
        }

        @media (max-width: 767px) {
            .broker-dashboard {
                padding: 90px 15px 25px;
            }

            .broker-dashboard-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .broker-dashboard-heading h1 {
                font-size: 25px;
            }

            .broker-add-property-btn {
                width: 100%;
            }

            .broker-stat-grid {
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }

            .broker-stat-card {
                padding: 17px;
                min-height: 125px;
            }

            .broker-stat-value {
                font-size: 25px;
            }

            .broker-stat-icon {
                width: 40px;
                height: 40px;
                min-width: 40px;
                font-size: 17px;
            }

            .broker-property-item {
                flex-wrap: wrap;
            }

            .broker-property-price {
                margin-left: 82px;
                width: calc(100% - 82px);
            }
        }

        @media (max-width: 480px) {
            .broker-dashboard {
                padding: 85px 10px 20px;
            }

            .broker-stat-grid {
                grid-template-columns: 1fr;
            }

            .broker-stat-card {
                min-height: auto;
            }

            .broker-dashboard-card-header {
                padding: 17px;
            }

            .broker-property-list {
                padding: 5px 17px;
            }

            .broker-property-image {
                width: 60px;
                height: 52px;
                min-width: 60px;
            }

            .broker-property-price {
                margin-left: 74px;
                width: calc(100% - 74px);
            }

            .broker-dashboard-heading h1 {
                font-size: 22px;
            }
        }
    </style>

    <div class="broker-dashboard">

        <div class="broker-dashboard-container">

            {{-- PAGE HEADER --}}
            <div class="broker-dashboard-header">

                <div class="broker-dashboard-heading">

                    <h1>Dashboard</h1>

                    <p>
                        Welcome back,
                        {{ $broker->name ?? 'Broker' }}.
                        Here's what's happening with your properties.
                    </p>

                </div>

                <a href="{{ route('broker.properties.create') }}" class="broker-add-property-btn">

                    <i class="fas fa-plus"></i>

                    Add Property

                </a>

            </div>


            {{-- STATISTICS --}}
            <div class="broker-stat-grid">

                {{-- TOTAL --}}
                <div class="broker-stat-card">

                    <div class="broker-stat-top">

                        <div>

                            <div class="broker-stat-title">
                                Total Properties
                            </div>

                            <div class="broker-stat-value">
                                {{ $totalProperties }}
                            </div>

                        </div>

                        <div class="broker-stat-icon blue">
                            <i class="fas fa-building"></i>
                        </div>

                    </div>

                    <div class="broker-stat-footer">
                        All your property listings
                    </div>

                </div>


                {{-- APPROVED --}}
                <div class="broker-stat-card">

                    <div class="broker-stat-top">

                        <div>

                            <div class="broker-stat-title">
                                Approved Properties
                            </div>

                            <div class="broker-stat-value">
                                {{ $approvedProperties }}
                            </div>

                        </div>

                        <div class="broker-stat-icon green">
                            <i class="fas fa-circle-check"></i>
                        </div>

                    </div>

                    <div class="broker-stat-footer">
                        Visible on website
                    </div>

                </div>


                {{-- PENDING --}}
                <div class="broker-stat-card">

                    <div class="broker-stat-top">

                        <div>

                            <div class="broker-stat-title">
                                Pending Properties
                            </div>

                            <div class="broker-stat-value">
                                {{ $pendingProperties }}
                            </div>

                        </div>

                        <div class="broker-stat-icon orange">
                            <i class="fas fa-clock"></i>
                        </div>

                    </div>

                    <div class="broker-stat-footer">
                        Waiting for admin approval
                    </div>

                </div>


                {{-- REJECTED --}}
                <div class="broker-stat-card">

                    <div class="broker-stat-top">

                        <div>

                            <div class="broker-stat-title">
                                Rejected Properties
                            </div>

                            <div class="broker-stat-value">
                                {{ $rejectedProperties }}
                            </div>

                        </div>

                        <div class="broker-stat-icon red">
                            <i class="fas fa-circle-xmark"></i>
                        </div>

                    </div>

                    <div class="broker-stat-footer">
                        Requires attention
                    </div>

                </div>

            </div>


            {{-- RECENT PROPERTIES + QUICK ACTIONS --}}
            <div class="broker-dashboard-grid">

                {{-- RECENT PROPERTIES --}}
                <div class="broker-dashboard-card">

                    <div class="broker-dashboard-card-header">

                        <div>

                            <h3 class="broker-dashboard-card-title">
                                Recent Properties
                            </h3>

                            <p class="broker-dashboard-card-subtitle">
                                Your latest property listings
                            </p>

                        </div>

                        <a href="{{ route('broker.properties') }}" class="broker-view-all">

                            View All

                        </a>

                    </div>


                    <div class="broker-property-list">

                        @forelse($properties as $property)

                                        @php
                                            $image = $property->images->first();

                                            $imageUrl = $image
                                                ? asset('storage/' . $image->image_path)
                                                : asset('website/images/no-image.jpg');

                                            $location = collect([
                                                $property->locality,
                                                optional($property->cityRelation)->name ?? $property->city
                                            ])->filter()->implode(', ');

                                            $status = strtolower($property->status ?? 'pending');

                                            $statusClass = match ($status) {
                                                'approved' => 'approved',
                                                'pending' => 'pending',
                                                'rejected' => 'rejected',
                                                default => 'default',
                                            };
                                        @endphp

                                        <div class="broker-property-item">

                                            <div class="broker-property-image">

                                                <img src="{{ $imageUrl }}" alt="{{ $property->property_title ?? 'Property' }}">

                                            </div>


                                            <div class="broker-property-info">

                                                <p class="broker-property-name">

                                                    {{ $property->property_title
                            ?: trim(($property->bhk ? $property->bhk . ' BHK ' : '') . ($property->property_type ?? 'Property')) }}

                                                </p>

                                                <div class="broker-property-location">

                                                    <i class="fas fa-location-dot"></i>

                                                    {{ $location ?: 'Location not specified' }}

                                                </div>

                                            </div>


                                            <div>

                                                <span class="broker-status {{ $statusClass }}">

                                                    {{ ucfirst($status) }}

                                                </span>

                                            </div>


                                            <div class="broker-property-price">

                                                ₹{{ number_format((float) $property->price) }}

                                            </div>

                                        </div>

                        @empty

                            <div class="broker-empty">

                                <i class="fas fa-building"></i>

                                <p>
                                    You haven't added any properties yet.
                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>


                {{-- QUICK ACTIONS --}}
                <div class="broker-dashboard-card">

                    <div class="broker-dashboard-card-header">

                        <div>

                            <h3 class="broker-dashboard-card-title">
                                Quick Actions
                            </h3>

                            <p class="broker-dashboard-card-subtitle">
                                Frequently used options
                            </p>

                        </div>

                    </div>


                    <div class="broker-quick-actions">

                        <a href="{{ route('broker.properties.create') }}" class="broker-action">

                            <div class="broker-action-icon">
                                <i class="fas fa-plus"></i>
                            </div>

                            <div class="broker-action-content">

                                <span class="broker-action-title">
                                    Add Property
                                </span>

                                <span class="broker-action-text">
                                    Create a new property listing
                                </span>

                            </div>

                            <i class="fas fa-chevron-right broker-action-arrow"></i>

                        </a>


                        <a href="{{ route('broker.properties') }}" class="broker-action">

                            <div class="broker-action-icon">
                                <i class="fas fa-building"></i>
                            </div>

                            <div class="broker-action-content">

                                <span class="broker-action-title">
                                    My Properties
                                </span>

                                <span class="broker-action-text">
                                    Manage your property listings
                                </span>

                            </div>

                            <i class="fas fa-chevron-right broker-action-arrow"></i>

                        </a>


                        <!-- <a href="{{ route('broker.enquiries') }}" class="broker-action">

                            <div class="broker-action-icon">
                                <i class="fas fa-envelope"></i>
                            </div>

                            <div class="broker-action-content">

                                <span class="broker-action-title">
                                    Enquiries
                                </span>

                                <span class="broker-action-text">
                                    Check customer enquiries
                                </span>

                            </div>

                            <i class="fas fa-chevron-right broker-action-arrow"></i>

                        </a> -->


                        <!-- <a href="{{ route('broker.schedule') }}" class="broker-action">

                            <div class="broker-action-icon">
                                <i class="fas fa-calendar-days"></i>
                            </div>

                            <div class="broker-action-content">

                                <span class="broker-action-title">
                                    Schedule
                                </span>

                                <span class="broker-action-text">
                                    Manage property visits
                                </span>

                            </div>

                            <i class="fas fa-chevron-right broker-action-arrow"></i>

                        </a> -->

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            /* =========================================================
             *              SIDEBAR RESPONSIVE SYNC
             * ========================================================= */

            const sidebar =
                document.getElementById('sidebar');

            const dashboardPage =
                document.querySelector('.broker-dashboard');


            if (!sidebar || !dashboardPage) {
                return;
            }


            function syncDashboardPageWithSidebar() {

                /* Mobile */
                if (window.innerWidth <= 991) {

                    dashboardPage.style.setProperty(
                        'margin-left',
                        '0px',
                        'important'
                    );

                    dashboardPage.style.setProperty(
                        'width',
                        '100%',
                        'important'
                    );

                    return;
                }


                /* Get actual sidebar width */
                const sidebarWidth =
                    Math.round(
                        sidebar.getBoundingClientRect().width
                    );


                /* Move dashboard after sidebar */
                dashboardPage.style.setProperty(
                    'margin-left',
                    sidebarWidth + 'px',
                    'important'
                );


                /* Keep dashboard inside viewport */
                dashboardPage.style.setProperty(
                    'width',
                    'calc(100% - ' + sidebarWidth + 'px)',
                    'important'
                );
            }


            /* =========================================================
             * Initial position
             * ========================================================= */

            syncDashboardPageWithSidebar();


            /* =========================================================
             * Detect sidebar width changes
             * ========================================================= */

            if (typeof ResizeObserver !== 'undefined') {

                const observer =
                    new ResizeObserver(function () {

                        syncDashboardPageWithSidebar();

                    });

                observer.observe(sidebar);
            }


            /* =========================================================
             * Backup for sidebar class-based animations
             * ========================================================= */

            document.addEventListener('click', function () {

                setTimeout(function () {

                    syncDashboardPageWithSidebar();

                }, 100);


                setTimeout(function () {

                    syncDashboardPageWithSidebar();

                }, 300);

            });


            /* =========================================================
             * Browser resize
             * ========================================================= */

            window.addEventListener('resize', function () {

                syncDashboardPageWithSidebar();

            });

        });
    </script>

@endsection