@extends('layout.mainlayout')

@section('content')

    <style>
        /* =========================================================
           SCHEDULE VISIT ENQUIRY PAGE
           Same layout/UI structure as Rent Enquiries
        ========================================================= */

        .schedule-visit-enquiry-page {
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

        .schedule-visit-enquiry-main {
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

        .schedule-visit-enquiry-header {
            width: 100%;

            margin: 0 0 24px;
            padding: 0;

            box-sizing: border-box;
        }

        .schedule-visit-enquiry-title {
            margin: 0 0 6px;

            color: #071b3d !important;

            font-size: 25px !important;
            font-weight: 700 !important;

            line-height: 1.3 !important;
        }

        .schedule-visit-enquiry-subtitle {
            margin: 0;

            color: #687389 !important;

            font-size: 13px !important;
            font-weight: 400 !important;

            line-height: 1.5 !important;
        }


        /* =========================================================
           SUCCESS
        ========================================================= */

        .schedule-visit-enquiry-success {
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

        .schedule-visit-enquiry-card {
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

        .schedule-visit-enquiry-table-scroll {
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

        .schedule-visit-enquiry-table-scroll::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .schedule-visit-enquiry-table-scroll::-webkit-scrollbar-track {
            background: #f3f5f8;
        }

        .schedule-visit-enquiry-table-scroll::-webkit-scrollbar-thumb {
            background: #c3cbd7;

            border-radius: 20px;
        }

        .schedule-visit-enquiry-table-scroll::-webkit-scrollbar-thumb:hover {
            background: #9fa9b8;
        }


        /* =========================================================
           TABLE
        ========================================================= */

        .schedule-visit-enquiry-table {
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

        .schedule-visit-enquiry-table thead {
            background: #f3f6fa;
        }

        .schedule-visit-enquiry-table thead th {
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
           CENTER COLUMNS
        ========================================================= */

        .schedule-visit-enquiry-table thead th:nth-child(1),
        .schedule-visit-enquiry-table thead th:nth-child(4),
        .schedule-visit-enquiry-table thead th:nth-child(5),
        .schedule-visit-enquiry-table thead th:nth-child(7),
        .schedule-visit-enquiry-table thead th:nth-child(9),
        .schedule-visit-enquiry-table thead th:nth-child(10) {
            text-align: center;
        }


        /* =========================================================
           BODY
        ========================================================= */

        .schedule-visit-enquiry-table tbody tr {
            background: #ffffff;

            transition: background-color .2s ease;
        }

        .schedule-visit-enquiry-table tbody tr:hover {
            background: #fafbfd;
        }

        .schedule-visit-enquiry-table tbody tr:hover td {
            background: #fafbfd;
        }

        .schedule-visit-enquiry-table tbody td {
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

        .schedule-visit-enquiry-table tbody tr:last-child td {
            border-bottom: 0;
        }


        /* =========================================================
           COLUMN WIDTHS
        ========================================================= */

        .schedule-visit-enquiry-table th:nth-child(1),
        .schedule-visit-enquiry-table td:nth-child(1) {
            width: 65px;
            text-align: center;
        }

        .schedule-visit-enquiry-table th:nth-child(2),
        .schedule-visit-enquiry-table td:nth-child(2) {
            width: 160px;
        }

        .schedule-visit-enquiry-table th:nth-child(3),
        .schedule-visit-enquiry-table td:nth-child(3) {
            width: 135px;
        }

        .schedule-visit-enquiry-table th:nth-child(4),
        .schedule-visit-enquiry-table td:nth-child(4) {
            width: 135px;
            text-align: center;
        }

        .schedule-visit-enquiry-table th:nth-child(5),
        .schedule-visit-enquiry-table td:nth-child(5) {
            width: 125px;
            text-align: center;
        }

        .schedule-visit-enquiry-table th:nth-child(6),
        .schedule-visit-enquiry-table td:nth-child(6) {
            width: 155px;
        }

        .schedule-visit-enquiry-table th:nth-child(7),
        .schedule-visit-enquiry-table td:nth-child(7) {
            width: 150px;
            text-align: center;
        }

        .schedule-visit-enquiry-table th:nth-child(8),
        .schedule-visit-enquiry-table td:nth-child(8) {
            width: 250px;
        }

        .schedule-visit-enquiry-table th:nth-child(9),
        .schedule-visit-enquiry-table td:nth-child(9) {
            width: 110px;
            text-align: center;
        }

        .schedule-visit-enquiry-table th:nth-child(10),
        .schedule-visit-enquiry-table td:nth-child(10) {
            width: 90px;
            text-align: center;
        }


        /* =========================================================
           NUMBER
        ========================================================= */

        .schedule-visit-enquiry-number {
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

        .schedule-visit-enquiry-name {
            margin: 0;

            color: #071b3d !important;

            font-size: 13px;
            font-weight: 700;

            line-height: 1.35;
        }


        /* =========================================================
           PHONE
        ========================================================= */

        .schedule-visit-enquiry-phone {
            color: #344158 !important;

            font-size: 12px;
            font-weight: 600;

            white-space: nowrap;
        }

        .schedule-visit-enquiry-phone-link {
            color: inherit;
            text-decoration: none;
        }


        /* =========================================================
           VISIT DATE
        ========================================================= */

        .schedule-visit-enquiry-date {
            color: #344158 !important;

            font-size: 11px;
            font-weight: 600;

            white-space: nowrap;
        }


        /* =========================================================
           VISIT TIME
        ========================================================= */

        .schedule-visit-enquiry-time {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 5px;

            color: #344158 !important;

            font-size: 11px;
            font-weight: 600;

            white-space: nowrap;
        }

        .schedule-visit-enquiry-time i {
            color: #687389;
            font-size: 13px;
        }


        /* =========================================================
           PROPERTY TYPE
        ========================================================= */

        .schedule-visit-enquiry-property {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 30px;

            padding: 0 10px;

            background: #f5f7fa;

            border-radius: 7px;

            color: #071b3d;

            font-size: 10px;
            font-weight: 700;

            white-space: nowrap;
        }


        /* =========================================================
           MONTHLY RENT
        ========================================================= */

        .schedule-visit-enquiry-rent {
            color: #344158 !important;

            font-size: 11px;
            font-weight: 600;

            white-space: nowrap;
        }

        .schedule-visit-enquiry-rent-empty {
            color: #8a94a6;

            font-size: 10px;
            font-style: italic;
        }


        /* =========================================================
           MESSAGE
        ========================================================= */

        .schedule-visit-enquiry-message {
            color: #4f5d72;

            font-size: 11px;

            line-height: 1.5;
        }

        .schedule-visit-enquiry-message-text {
            display: -webkit-box;

            overflow: hidden;

            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;

            line-clamp: 2;
        }

        .schedule-visit-enquiry-message-empty {
            color: #8a94a6;

            font-size: 10px;

            font-style: italic;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .schedule-visit-enquiry-status {
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

        .schedule-visit-enquiry-status-new {
            background: #fff7e6;

            color: #b7791f !important;
        }

        .schedule-visit-enquiry-status-contacted {
            background: #eef3ff;

            color: #3157a6 !important;
        }

        .schedule-visit-enquiry-status-closed {
            background: #ecfdf3;

            color: #18794e !important;
        }

        .schedule-visit-enquiry-status-default {
            background: #f1f3f5;

            color: #687389 !important;
        }


        /* =========================================================
           DATE CREATED
        ========================================================= */

        .schedule-visit-enquiry-created-date {
            color: #687389 !important;

            font-size: 10px !important;

            white-space: nowrap;
        }


        /* =========================================================
           DELETE BUTTON
        ========================================================= */

        .schedule-visit-enquiry-delete-form {
            display: inline-block;

            margin: 0;
            padding: 0;
        }

        .schedule-visit-enquiry-delete {
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

        .schedule-visit-enquiry-delete:hover {
            background: #e52229;

            color: #ffffff !important;

            transform: translateY(-1px);
        }

        .schedule-visit-enquiry-delete i {
            font-size: 15px;
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .schedule-visit-enquiry-empty {
            height: 180px;

            text-align: center !important;

            vertical-align: middle !important;
        }

        .schedule-visit-enquiry-empty-title {
            margin: 0 0 6px;

            color: #687389;

            font-size: 14px;
            font-weight: 600;
        }

        .schedule-visit-enquiry-empty-text {
            margin: 0;

            color: #8a94a6;

            font-size: 11px;
        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 991px) {

            .schedule-visit-enquiry-main {
                padding: 20px 15px 30px;
            }

            .schedule-visit-enquiry-table-scroll {
                max-height: calc(100vh - 180px);
            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 576px) {

            .schedule-visit-enquiry-main {
                padding: 16px 10px 25px;
            }

            .schedule-visit-enquiry-title {
                font-size: 20px !important;
            }

            .schedule-visit-enquiry-subtitle {
                font-size: 11px !important;
            }

            .schedule-visit-enquiry-table {
                min-width: 1250px;
            }

        }
    </style>


    <div class="schedule-visit-enquiry-page">

        <div class="schedule-visit-enquiry-main">


            {{-- =====================================================
            PAGE HEADER
            ====================================================== --}}

            <div class="schedule-visit-enquiry-header">

                <h3 class="schedule-visit-enquiry-title">

                    Schedule Visit Enquiries

                </h3>

                <p class="schedule-visit-enquiry-subtitle">

                    Manage customer property visit enquiries

                </p>

            </div>


            {{-- =====================================================
            SUCCESS MESSAGE
            ====================================================== --}}

            @if(session('success'))

                <div class="schedule-visit-enquiry-success">

                    <i class="ti ti-circle-check me-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            {{-- =====================================================
            TABLE CARD
            ====================================================== --}}

            <div class="schedule-visit-enquiry-card">

                <div class="schedule-visit-enquiry-table-scroll">

                    <table class="schedule-visit-enquiry-table">

                        <thead>

                            <tr>

                                <th>S.No</th>

                                <th>Name</th>

                                <th>Phone</th>

                                <th>Visit Date</th>

                                <th>Visit Time</th>

                                <th>Property Type</th>

                                <th>Monthly Rent</th>

                                <th>Message</th>

                                <th>Status</th>

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

                                        <span class="schedule-visit-enquiry-number">

                                            {{ $loop->iteration }}

                                        </span>

                                    </td>


                                    {{-- =================================================
                                    NAME
                                    ================================================== --}}

                                    <td>

                                        <div class="schedule-visit-enquiry-name">

                                            {{ $enquiry->name ?: '-' }}

                                        </div>

                                    </td>


                                    {{-- =================================================
                                    PHONE
                                    ================================================== --}}

                                    <td>

                                        @if($enquiry->phone)

                                            <a
                                                href="tel:{{ $enquiry->phone }}"
                                                class="schedule-visit-enquiry-phone-link"
                                            >

                                                <span class="schedule-visit-enquiry-phone">

                                                    {{ $enquiry->phone }}

                                                </span>

                                            </a>

                                        @else

                                            <span class="schedule-visit-enquiry-phone">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- =================================================
                                    VISIT DATE
                                    ================================================== --}}

                                    <td>

                                        <span class="schedule-visit-enquiry-date">

                                            {{ $enquiry->visit_date
                                                ? \Carbon\Carbon::parse($enquiry->visit_date)->format('d M Y')
                                                : '-'
                                            }}

                                        </span>

                                    </td>


                                    {{-- =================================================
                                    VISIT TIME
                                    ================================================== --}}

                                    <td>

                                        @if($enquiry->visit_time)

                                            <span class="schedule-visit-enquiry-time">

                                                <i class="ti ti-clock"></i>

                                                {{ \Carbon\Carbon::parse($enquiry->visit_time)->format('h:i A') }}

                                            </span>

                                        @else

                                            <span class="schedule-visit-enquiry-time">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- =================================================
                                    PROPERTY TYPE
                                    ================================================== --}}

                                    <td>

                                        @if($enquiry->property_type)

                                            <span class="schedule-visit-enquiry-property">

                                                {{ ucwords(
                                                    str_replace(
                                                        '-',
                                                        ' ',
                                                        $enquiry->property_type
                                                    )
                                                ) }}

                                            </span>

                                        @else

                                            <span>
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- =================================================
                                    MONTHLY RENT
                                    ================================================== --}}

                                    <td>

                                        @if($enquiry->monthly_rent)

                                            <span class="schedule-visit-enquiry-rent">

                                                {{ ucwords(
                                                    str_replace(
                                                        '-',
                                                        ' ',
                                                        $enquiry->monthly_rent
                                                    )
                                                ) }}

                                            </span>

                                        @else

                                            <span class="schedule-visit-enquiry-rent-empty">

                                                Not specified

                                            </span>

                                        @endif

                                    </td>


                                    {{-- =================================================
                                    MESSAGE
                                    ================================================== --}}

                                    <td>

                                        <div class="schedule-visit-enquiry-message">

                                            @if($enquiry->message)

                                                <span
                                                    class="schedule-visit-enquiry-message-text"
                                                    title="{{ $enquiry->message }}"
                                                >

                                                    {{ $enquiry->message }}

                                                </span>

                                            @else

                                                <span class="schedule-visit-enquiry-message-empty">

                                                    No additional requirements

                                                </span>

                                            @endif

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
                                                'schedule-visit-enquiry-status-new',

                                                'contacted' =>
                                                'schedule-visit-enquiry-status-contacted',

                                                'closed' =>
                                                'schedule-visit-enquiry-status-closed',

                                                default =>
                                                'schedule-visit-enquiry-status-default',

                                            };

                                        @endphp


                                        <span class="schedule-visit-enquiry-status {{ $statusClass }}">

                                            {{ ucfirst($status) }}

                                        </span>

                                    </td>


                                    {{-- =================================================
                                    ACTION
                                    ================================================== --}}

                                    <td>

                                        <form
                                            class="schedule-visit-enquiry-delete-form"
                                            action="{{ route(
                                                'admin.schedule.visit.enquiries.destroy',
                                                $enquiry->id
                                            ) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this enquiry?');"
                                        >

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="schedule-visit-enquiry-delete"
                                                title="Delete Enquiry"
                                                aria-label="Delete Enquiry"
                                            >

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

                                    <td
                                        colspan="10"
                                        class="schedule-visit-enquiry-empty"
                                    >

                                        <h5 class="schedule-visit-enquiry-empty-title">

                                            No Schedule Visit Enquiries Found

                                        </h5>

                                        <p class="schedule-visit-enquiry-empty-text">

                                            No customer property visit enquiries have been
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

            const scheduleVisitPage =
                document.querySelector('.schedule-visit-enquiry-page');


            if (!sidebar || !scheduleVisitPage) {
                return;
            }


            function syncScheduleVisitPageWithSidebar() {

                /*
                 * Mobile:
                 * Sidebar behaves differently.
                 */

                if (window.innerWidth <= 991) {

                    scheduleVisitPage.style.marginLeft = '0px';

                    scheduleVisitPage.style.width = '100%';

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

                scheduleVisitPage.style.marginLeft =
                    sidebarWidth + 'px';


                /*
                 * Keep page inside viewport.
                 */

                scheduleVisitPage.style.width =
                    'calc(100% - ' + sidebarWidth + 'px)';
            }


            /*
             * Initial position
             */

            syncScheduleVisitPageWithSidebar();


            /*
             * Detect sidebar width changes.
             */

            if (typeof ResizeObserver !== 'undefined') {

                const observer =
                    new ResizeObserver(function () {

                        syncScheduleVisitPageWithSidebar();

                    });


                observer.observe(sidebar);
            }


            /*
             * Backup for sidebar
             * class-based animations.
             */

            document.addEventListener('click', function () {

                setTimeout(function () {

                    syncScheduleVisitPageWithSidebar();

                }, 100);


                setTimeout(function () {

                    syncScheduleVisitPageWithSidebar();

                }, 300);

            });


            /*
             * Browser resize
             */

            window.addEventListener('resize', function () {

                syncScheduleVisitPageWithSidebar();

            });

        });

    </script>

@endsection