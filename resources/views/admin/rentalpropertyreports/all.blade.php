@extends('layout.mainlayout')

@section('content')

    <style>
        /* =========================================================
           PROPERTY REPORT PAGE
           Same layout/UI structure as Schedule Visit Enquiries
        ========================================================= */

        .property-report-page {
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

        .property-report-main {
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

        .property-report-header {
            width: 100%;

            margin: 0 0 24px;
            padding: 0;

            box-sizing: border-box;
        }

        .property-report-title {
            margin: 0 0 6px;

            color: #071b3d !important;

            font-size: 25px !important;
            font-weight: 700 !important;

            line-height: 1.3 !important;
        }

        .property-report-subtitle {
            margin: 0;

            color: #687389 !important;

            font-size: 13px !important;
            font-weight: 400 !important;

            line-height: 1.5 !important;
        }


        /* =========================================================
           SUCCESS
        ========================================================= */

        .property-report-success {
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

        .property-report-card {
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

        .property-report-table-scroll {
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

        .property-report-table-scroll::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .property-report-table-scroll::-webkit-scrollbar-track {
            background: #f3f5f8;
        }

        .property-report-table-scroll::-webkit-scrollbar-thumb {
            background: #c3cbd7;

            border-radius: 20px;
        }

        .property-report-table-scroll::-webkit-scrollbar-thumb:hover {
            background: #9fa9b8;
        }


        /* =========================================================
           TABLE
        ========================================================= */

        .property-report-table {
            width: 100%;
            min-width: 1100px;

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

        .property-report-table thead {
            background: #f3f6fa;
        }

        .property-report-table thead th {
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

        .property-report-table thead th:nth-child(1),
        .property-report-table thead th:nth-child(5),
        .property-report-table thead th:nth-child(6),
        .property-report-table thead th:nth-child(7) {
            text-align: center;
        }


        /* =========================================================
           BODY
        ========================================================= */

        .property-report-table tbody tr {
            background: #ffffff;

            transition: background-color .2s ease;
        }

        .property-report-table tbody tr:hover {
            background: #fafbfd;
        }

        .property-report-table tbody tr:hover td {
            background: #fafbfd;
        }

        .property-report-table tbody td {
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

        .property-report-table tbody tr:last-child td {
            border-bottom: 0;
        }


        /* =========================================================
           COLUMN WIDTHS
        ========================================================= */

        .property-report-table th:nth-child(1),
        .property-report-table td:nth-child(1) {
            width: 65px;
            text-align: center;
        }

        .property-report-table th:nth-child(2),
        .property-report-table td:nth-child(2) {
            width: 220px;
        }

        .property-report-table th:nth-child(3),
        .property-report-table td:nth-child(3) {
            width: 210px;
        }

        .property-report-table th:nth-child(4),
        .property-report-table td:nth-child(4) {
            width: 360px;
        }

        .property-report-table th:nth-child(5),
        .property-report-table td:nth-child(5) {
            width: 120px;
            text-align: center;
        }

        .property-report-table th:nth-child(6),
        .property-report-table td:nth-child(6) {
            width: 170px;
            text-align: center;
        }

        .property-report-table th:nth-child(7),
        .property-report-table td:nth-child(7) {
            width: 90px;
            text-align: center;
        }


        /* =========================================================
           NUMBER
        ========================================================= */

        .property-report-number {
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

        .property-report-property {
            margin: 0;

            color: #071b3d !important;

            font-size: 13px;
            font-weight: 700;

            line-height: 1.4;
        }


        /* =========================================================
           REASON
        ========================================================= */

        .property-report-reason {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 30px;

            padding: 0 10px;

            background: #fff7e6;

            border-radius: 7px;

            color: #b7791f !important;

            font-size: 10px;
            font-weight: 700;

            white-space: nowrap;
        }


        /* =========================================================
           MESSAGE
        ========================================================= */

        .property-report-message {
            color: #4f5d72;

            font-size: 11px;

            line-height: 1.5;
        }

        .property-report-message-text {
            display: -webkit-box;

            overflow: hidden;

            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;

            line-clamp: 3;
        }

        .property-report-message-empty {
            color: #8a94a6;

            font-size: 10px;

            font-style: italic;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .property-report-status {
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

        .property-report-status-new {
            background: #fff7e6;

            color: #b7791f !important;
        }

        .property-report-status-contacted {
            background: #eef3ff;

            color: #3157a6 !important;
        }

        .property-report-status-closed {
            background: #ecfdf3;

            color: #18794e !important;
        }

        .property-report-status-default {
            background: #f1f3f5;

            color: #687389 !important;
        }


        /* =========================================================
           CREATED DATE
        ========================================================= */

        .property-report-created-date {
            color: #687389 !important;

            font-size: 10px !important;

            white-space: nowrap;
        }


        /* =========================================================
           DELETE BUTTON
        ========================================================= */

        .property-report-delete-form {
            display: inline-block;

            margin: 0;
            padding: 0;
        }

        .property-report-delete {
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

        .property-report-delete:hover {
            background: #e52229;

            color: #ffffff !important;

            transform: translateY(-1px);
        }

        .property-report-delete i {
            font-size: 15px;
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .property-report-empty {
            height: 180px;

            text-align: center !important;

            vertical-align: middle !important;
        }

        .property-report-empty-title {
            margin: 0 0 6px;

            color: #687389;

            font-size: 14px;
            font-weight: 600;
        }

        .property-report-empty-text {
            margin: 0;

            color: #8a94a6;

            font-size: 11px;
        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 991px) {

            .property-report-main {
                padding: 20px 15px 30px;
            }

            .property-report-table-scroll {
                max-height: calc(100vh - 180px);
            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 576px) {

            .property-report-main {
                padding: 16px 10px 25px;
            }

            .property-report-title {
                font-size: 20px !important;
            }

            .property-report-subtitle {
                font-size: 11px !important;
            }

            .property-report-table {
                min-width: 1100px;
            }

        }
    </style>


    <div class="property-report-page">

        <div class="property-report-main">


            {{-- =====================================================
            PAGE HEADER
            ====================================================== --}}

            <div class="property-report-header">

                <h3 class="property-report-title">

                    Property Reports

                </h3>

                <p class="property-report-subtitle">

                    Manage customer property reports

                </p>

            </div>


            {{-- =====================================================
            SUCCESS MESSAGE
            ====================================================== --}}

            @if(session('success'))

                <div class="property-report-success">

                    <i class="ti ti-circle-check me-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            {{-- =====================================================
            TABLE CARD
            ====================================================== --}}

            <div class="property-report-card">

                <div class="property-report-table-scroll">

                    <table class="property-report-table">

                        <thead>

                            <tr>

                                <th>S.No</th>

                                <th>Property</th>

                                <th>Reason</th>

                                <th>Additional Details</th>

                                <th>Status</th>

                                <th>Date</th>

                                <th>Action</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($reports as $report)

                                <tr>


                                    {{-- =================================================
                                    NUMBER
                                    ================================================== --}}

                                    <td>

                                        <span class="property-report-number">

                                            {{ $loop->iteration }}

                                        </span>

                                    </td>


                                    {{-- =================================================
                                    PROPERTY
                                    ================================================== --}}

                                    <td>

                                        <div
                                            class="property-report-property"
                                            title="{{ $report->property }}"
                                        >

                                            {{ $report->property ?: '-' }}

                                        </div>

                                    </td>


                                    {{-- =================================================
                                    REASON
                                    ================================================== --}}

                                    <td>

                                        @if($report->reason)

                                            <span class="property-report-reason">

                                                {{ ucwords(
                                                    str_replace(
                                                        '_',
                                                        ' ',
                                                        $report->reason
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
                                    MESSAGE
                                    ================================================== --}}

                                    <td>

                                        <div class="property-report-message">

                                            @if($report->message)

                                                <span
                                                    class="property-report-message-text"
                                                    title="{{ $report->message }}"
                                                >

                                                    {{ $report->message }}

                                                </span>

                                            @else

                                                <span class="property-report-message-empty">

                                                    No additional details

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
                                                trim($report->status ?? 'new')
                                            );

                                            $statusClass = match ($status) {

                                                'new' =>
                                                'property-report-status-new',

                                                'contacted' =>
                                                'property-report-status-contacted',

                                                'closed' =>
                                                'property-report-status-closed',

                                                default =>
                                                'property-report-status-default',

                                            };

                                        @endphp


                                        <span class="property-report-status {{ $statusClass }}">

                                            {{ ucfirst($status) }}

                                        </span>

                                    </td>


                                    {{-- =================================================
                                    CREATED DATE
                                    ================================================== --}}

                                    <td>

                                        <span class="property-report-created-date">

                                            {{ $report->created_at
                                                ? $report->created_at->format('d M Y, h:i A')
                                                : '-'
                                            }}

                                        </span>

                                    </td>


                                    {{-- =================================================
                                    ACTION
                                    ================================================== --}}

                                    <td>

                                        <form
                                            class="property-report-delete-form"
                                            action="{{ route(
                                                'admin.rental.property.reports.destroy',
                                                $report->id
                                            ) }}"
                                            method="POST"
                                            onsubmit="return confirmDeletePropertyReport(this);"
                                        >

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="property-report-delete"
                                                title="Delete Report"
                                                aria-label="Delete Report"
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
                                        colspan="7"
                                        class="property-report-empty"
                                    >

                                        <h5 class="property-report-empty-title">

                                            No Property Reports Found

                                        </h5>

                                        <p class="property-report-empty-text">

                                            No customer property reports have been
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

        function confirmDeletePropertyReport(form) {

            if (typeof Swal === 'undefined') {

                return confirm(
                    'Are you sure you want to delete this property report?'
                );

            }

            event.preventDefault();

            Swal.fire({

                title: 'Delete Report?',

                text: 'Are you sure you want to delete this property report?',

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

            return false;
        }


        document.addEventListener('DOMContentLoaded', function () {

            const sidebar = document.getElementById('sidebar');

            const propertyReportPage =
                document.querySelector('.property-report-page');


            if (!sidebar || !propertyReportPage) {

                return;

            }


            function syncPropertyReportPageWithSidebar() {

                /*
                 * Mobile:
                 * Sidebar behaves differently.
                 */

                if (window.innerWidth <= 991) {

                    propertyReportPage.style.marginLeft = '0px';

                    propertyReportPage.style.width = '100%';

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

                propertyReportPage.style.marginLeft =
                    sidebarWidth + 'px';


                /*
                 * Keep page inside viewport.
                 */

                propertyReportPage.style.width =
                    'calc(100% - ' + sidebarWidth + 'px)';

            }


            /*
             * Initial position
             */

            syncPropertyReportPageWithSidebar();


            /*
             * Detect sidebar width changes.
             */

            if (typeof ResizeObserver !== 'undefined') {

                const observer =
                    new ResizeObserver(function () {

                        syncPropertyReportPageWithSidebar();

                    });

                observer.observe(sidebar);

            }


            /*
             * Backup for sidebar
             * class-based animations.
             */

            document.addEventListener('click', function () {

                setTimeout(function () {

                    syncPropertyReportPageWithSidebar();

                }, 100);


                setTimeout(function () {

                    syncPropertyReportPageWithSidebar();

                }, 300);

            });


            /*
             * Browser resize
             */

            window.addEventListener('resize', function () {

                syncPropertyReportPageWithSidebar();

            });

        });

    </script>

@endsection