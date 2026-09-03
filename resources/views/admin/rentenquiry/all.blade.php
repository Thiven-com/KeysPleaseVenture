@extends('layout.mainlayout')

@section('content')

    <style>
        /* =========================================================
           RENT ENQUIRY PAGE
           Same layout/UI structure as Property Listings
        ========================================================= */

        .rent-enquiry-page {
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
           RENT ENQUIRY MAIN
        ========================================================= */

        .rent-enquiry-main {
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

        .rent-enquiry-header {
            width: 100%;

            margin: 0 0 24px;
            padding: 0;

            box-sizing: border-box;
        }

        .rent-enquiry-title {
            margin: 0 0 6px;

            color: #071b3d !important;

            font-size: 25px !important;
            font-weight: 700 !important;

            line-height: 1.3 !important;
        }

        .rent-enquiry-subtitle {
            margin: 0;

            color: #687389 !important;

            font-size: 13px !important;
            font-weight: 400 !important;

            line-height: 1.5 !important;
        }


        /* =========================================================
           SUCCESS
        ========================================================= */

        .rent-enquiry-success {
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

        .rent-enquiry-card {
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

        .rent-enquiry-table-scroll {
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

        .rent-enquiry-table-scroll::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .rent-enquiry-table-scroll::-webkit-scrollbar-track {
            background: #f3f5f8;
        }

        .rent-enquiry-table-scroll::-webkit-scrollbar-thumb {
            background: #c3cbd7;

            border-radius: 20px;
        }

        .rent-enquiry-table-scroll::-webkit-scrollbar-thumb:hover {
            background: #9fa9b8;
        }


        /* =========================================================
           TABLE
        ========================================================= */

        .rent-enquiry-table {
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

        .rent-enquiry-table thead {
            background: #f3f6fa;
        }

        .rent-enquiry-table thead th {
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

        .rent-enquiry-table thead th:nth-child(1),
        .rent-enquiry-table thead th:nth-child(5),
        .rent-enquiry-table thead th:nth-child(7),
        .rent-enquiry-table thead th:nth-child(9) {
            text-align: center;
        }


        /* =========================================================
           BODY
        ========================================================= */

        .rent-enquiry-table tbody tr {
            background: #ffffff;

            transition: background-color .2s ease;
        }

        .rent-enquiry-table tbody tr:hover {
            background: #fafbfd;
        }

        .rent-enquiry-table tbody tr:hover td {
            background: #fafbfd;
        }

        .rent-enquiry-table tbody td {
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

        .rent-enquiry-table tbody tr:last-child td {
            border-bottom: 0;
        }


        /* =========================================================
           COLUMN WIDTHS
        ========================================================= */

        .rent-enquiry-table th:nth-child(1),
        .rent-enquiry-table td:nth-child(1) {
            width: 65px;
            text-align: center;
        }

        .rent-enquiry-table th:nth-child(2),
        .rent-enquiry-table td:nth-child(2) {
            width: 160px;
        }

        .rent-enquiry-table th:nth-child(3),
        .rent-enquiry-table td:nth-child(3) {
            width: 135px;
        }

        .rent-enquiry-table th:nth-child(4),
        .rent-enquiry-table td:nth-child(4) {
            width: 210px;
        }

        .rent-enquiry-table th:nth-child(5),
        .rent-enquiry-table td:nth-child(5) {
            width: 150px;
            text-align: center;
        }

        .rent-enquiry-table th:nth-child(6),
        .rent-enquiry-table td:nth-child(6) {
            width: 270px;
        }

        .rent-enquiry-table th:nth-child(7),
        .rent-enquiry-table td:nth-child(7) {
            width: 110px;
            text-align: center;
        }

        .rent-enquiry-table th:nth-child(8),
        .rent-enquiry-table td:nth-child(8) {
            width: 175px;
        }

        .rent-enquiry-table th:nth-child(9),
        .rent-enquiry-table td:nth-child(9) {
            width: 90px;
            text-align: center;
        }


        /* =========================================================
           NUMBER
        ========================================================= */

        .rent-enquiry-number {
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
           CUSTOMER NAME
        ========================================================= */

        .rent-enquiry-name {
            margin: 0;

            color: #071b3d !important;

            font-size: 13px;
            font-weight: 700;

            line-height: 1.35;
        }


        /* =========================================================
           PHONE
        ========================================================= */

        .rent-enquiry-phone {
            color: #344158 !important;

            font-size: 12px;
            font-weight: 600;

            white-space: nowrap;
        }


        /* =========================================================
           EMAIL
        ========================================================= */

        .rent-enquiry-email {
            color: #4f5d72 !important;

            font-size: 11px;

            word-break: break-word;
        }


        /* =========================================================
           CONTACT METHOD
        ========================================================= */

        .rent-enquiry-contact {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 5px;

            min-width: 90px;
            min-height: 30px;

            padding: 0 10px;

            border-radius: 7px;

            font-size: 10px;
            font-weight: 700;

            white-space: nowrap;
        }

        .rent-enquiry-contact-phone {
            background: #eef3ff;

            color: #3157a6 !important;
        }

        .rent-enquiry-contact-whatsapp {
            background: #ecfdf3;

            color: #18794e !important;
        }

        .rent-enquiry-contact-email {
            background: #fff7e6;

            color: #b7791f !important;
        }


        /* =========================================================
           MESSAGE
        ========================================================= */

        .rent-enquiry-message {
            color: #4f5d72;

            font-size: 11px;

            line-height: 1.5;
        }

        .rent-enquiry-message-text {
            display: -webkit-box;

            overflow: hidden;

            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;

            line-clamp: 2;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .rent-enquiry-status {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-width: 70px;
            min-height: 30px;

            padding: 0 11px;

            border-radius: 7px;

            font-size: 10px;
            font-weight: 700;

            white-space: nowrap;
        }

        .rent-enquiry-status-new {
            background: #fff7e6;

            color: #b7791f !important;
        }

        .rent-enquiry-status-contacted {
            background: #eef3ff;

            color: #3157a6 !important;
        }

        .rent-enquiry-status-closed {
            background: #ecfdf3;

            color: #18794e !important;
        }

        .rent-enquiry-status-default {
            background: #f1f3f5;

            color: #687389 !important;
        }


        /* =========================================================
           DATE
        ========================================================= */

        .rent-enquiry-date {
            color: #687389 !important;

            font-size: 10px !important;

            white-space: nowrap;
        }


        /* =========================================================
           DELETE BUTTON
        ========================================================= */

        .rent-enquiry-delete-form {
            display: inline-block;

            margin: 0;
            padding: 0;
        }

        .rent-enquiry-delete {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            width: 38px;
            height: 36px;

            padding: 0;

            background: #fff1f2;

            border: 0;
            border-radius: 8px;

            color: #e52229 !important;

            cursor: pointer;

            transition: all .2s ease;
        }

        .rent-enquiry-delete:hover {
            background: #e52229;

            color: #ffffff !important;

            transform: translateY(-1px);
        }

        .rent-enquiry-delete i {
            font-size: 15px;
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .rent-enquiry-empty {
            height: 180px;

            text-align: center !important;

            vertical-align: middle !important;
        }

        .rent-enquiry-empty-title {
            margin: 0 0 6px;

            color: #687389;

            font-size: 14px;
            font-weight: 600;
        }

        .rent-enquiry-empty-text {
            margin: 0;

            color: #8a94a6;

            font-size: 11px;
        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 991px) {

            .rent-enquiry-main {
                padding: 20px 15px 30px;
            }

            .rent-enquiry-table-scroll {
                max-height: calc(100vh - 180px);
            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 576px) {

            .rent-enquiry-main {
                padding: 16px 10px 25px;
            }

            .rent-enquiry-title {
                font-size: 20px !important;
            }

            .rent-enquiry-subtitle {
                font-size: 11px !important;
            }

            .rent-enquiry-table {
                min-width: 1250px;
            }

        }
    </style>

    <div class="rent-enquiry-page">

        ```
        <div class="rent-enquiry-main">


            {{-- =====================================================
            PAGE HEADER
            ====================================================== --}}

            <div class="rent-enquiry-header">

                <h3 class="rent-enquiry-title">

                    Rent Enquiries

                </h3>

                <p class="rent-enquiry-subtitle">

                    Manage customer rent enquiries

                </p>

            </div>


            {{-- =====================================================
            SUCCESS MESSAGE
            ====================================================== --}}

            @if(session('success'))

                <div class="rent-enquiry-success">

                    <i class="ti ti-circle-check me-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            {{-- =====================================================
            TABLE CARD
            ====================================================== --}}

            <div class="rent-enquiry-card">

                <div class="rent-enquiry-table-scroll">

                    <table class="rent-enquiry-table">

                        <thead>

                            <tr>

                                <th>S.No</th>

                                <th>Name</th>

                                <th>Phone</th>

                                <th>Email</th>

                                <th>Preferred Contact</th>

                                <th>Message</th>

                                <th>Status</th>

                                <th>Date</th>

                                <th>Action</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($enquiries as $enquiry)

                                                    <tr>


                                                        {{-- =================================================
                                                        NUMBER
                                                        ================================================== --}}

                                                        <td>

                                                            <span class="rent-enquiry-number">

                                                                {{ $loop->iteration }}

                                                            </span>

                                                        </td>


                                                        {{-- =================================================
                                                        NAME
                                                        ================================================== --}}

                                                        <td>

                                                            <div class="rent-enquiry-name">

                                                                {{ $enquiry->name ?: '-' }}

                                                            </div>

                                                        </td>


                                                        {{-- =================================================
                                                        PHONE
                                                        ================================================== --}}

                                                        <td>

                                                            <span class="rent-enquiry-phone">

                                                                {{ $enquiry->phone ?: '-' }}

                                                            </span>

                                                        </td>


                                                        {{-- =================================================
                                                        EMAIL
                                                        ================================================== --}}

                                                        <td>

                                                            <span class="rent-enquiry-email">

                                                                {{ $enquiry->email ?: '-' }}

                                                            </span>

                                                        </td>


                                                        {{-- =================================================
                                                        PREFERRED CONTACT
                                                        ================================================== --}}

                                                        <td>

                                                            @if($enquiry->preferred_contact === 'phone')

                                                                <span class="rent-enquiry-contact rent-enquiry-contact-phone">

                                                                    <i class="ti ti-phone"></i>

                                                                    Phone

                                                                </span>


                                                            @elseif($enquiry->preferred_contact === 'whatsapp')

                                                                <span class="rent-enquiry-contact rent-enquiry-contact-whatsapp">

                                                                    <i class="ti ti-brand-whatsapp"></i>

                                                                    WhatsApp

                                                                </span>


                                                            @elseif($enquiry->preferred_contact === 'email')

                                                                <span class="rent-enquiry-contact rent-enquiry-contact-email">

                                                                    <i class="ti ti-mail"></i>

                                                                    Email

                                                                </span>


                                                            @else

                                                                <span class="rent-enquiry-contact">

                                                                    -

                                                                </span>

                                                            @endif

                                                        </td>


                                                        {{-- =================================================
                                                        MESSAGE
                                                        ================================================== --}}

                                                        <td>

                                                            <div class="rent-enquiry-message">

                                                                <span class="rent-enquiry-message-text">

                                                                    {{ $enquiry->message ?: '-' }}

                                                                </span>

                                                            </div>

                                                        </td>


                                                        {{-- =================================================
                                                        STATUS
                                                        ================================================== --}}

                                                        <td>

                                                            @php

                                                                $status = strtolower(
                                                                    trim($enquiry->status ?? 'new')
                                                                );

                                                                $statusClass = match ($status) {

                                                                    'new' =>
                                                                    'rent-enquiry-status-new',

                                                                    'contacted' =>
                                                                    'rent-enquiry-status-contacted',

                                                                    'closed' =>
                                                                    'rent-enquiry-status-closed',

                                                                    default =>
                                                                    'rent-enquiry-status-default',

                                                                };

                                                            @endphp


                                                            <span class="rent-enquiry-status {{ $statusClass }}">

                                                                {{ ucfirst($status) }}

                                                            </span>

                                                        </td>


                                                        {{-- =================================================
                                                        DATE
                                                        ================================================== --}}

                                                        <td>

                                                            <span class="rent-enquiry-date">

                                                                {{ $enquiry->created_at
                                    ? $enquiry->created_at->format('d M Y, h:i A')
                                    : '-'
                                                                }}

                                                            </span>

                                                        </td>


                                                        {{-- =================================================
                                                        ACTION
                                                        ================================================== --}}

                                                        <td>

                                                            <form class="rent-enquiry-delete-form" action="{{ route(
                                    'admin.rent-enquiries.destroy',
                                    $enquiry->id
                                ) }}" method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this enquiry?');">

                                                                @csrf

                                                                @method('DELETE')


                                                                <button type="submit" class="rent-enquiry-delete" title="Delete Enquiry"
                                                                    aria-label="Delete Enquiry">

                                                                    <i class="ti ti-trash"></i>

                                                                </button>

                                                            </form>

                                                        </td>

                                                    </tr>


                            @empty


                                {{-- =================================================
                                EMPTY STATE
                                ================================================== --}}

                                <tr>

                                    <td colspan="9" class="rent-enquiry-empty">

                                        <h5 class="rent-enquiry-empty-title">

                                            No Rent Enquiries Found

                                        </h5>

                                        <p class="rent-enquiry-empty-text">

                                            No customer enquiries have been
                                            submitted yet.

                                        </p>

                                    </td>

                                </tr>


                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const sidebar = document.getElementById('sidebar');

            const rentPage =
                document.querySelector('.rent-enquiry-page');


            if (!sidebar || !rentPage) {
                return;
            }


            function syncRentPageWithSidebar() {

                /*
                 * Mobile:
                 * Sidebar behaves differently.
                 */

                if (window.innerWidth <= 991) {

                    rentPage.style.marginLeft = '0px';

                    rentPage.style.width = '100%';

                    return;
                }


                /*
                 * Get actual sidebar width.
                 *
                 * Example:
                 *
                 * Open      = 280px
                 * Collapsed = 94px
                 */

                const sidebarWidth = Math.round(
                    sidebar.getBoundingClientRect().width
                );


                /*
                 * Move page after sidebar.
                 */

                rentPage.style.marginLeft =
                    sidebarWidth + 'px';


                /*
                 * Keep page inside viewport.
                 */

                rentPage.style.width =
                    'calc(100% - ' + sidebarWidth + 'px)';
            }


            /*
             * Initial position
             */

            syncRentPageWithSidebar();


            /*
             * Detect sidebar width changes.
             */

            if (typeof ResizeObserver !== 'undefined') {

                const observer =
                    new ResizeObserver(function () {

                        syncRentPageWithSidebar();

                    });


                observer.observe(sidebar);
            }


            /*
             * Backup for sidebar
             * class-based animations.
             */

            document.addEventListener('click', function () {

                setTimeout(function () {

                    syncRentPageWithSidebar();

                }, 100);


                setTimeout(function () {

                    syncRentPageWithSidebar();

                }, 300);

            });


            /*
             * Browser resize
             */

            window.addEventListener('resize', function () {

                syncRentPageWithSidebar();

            });

        });
    </script>

@endsection