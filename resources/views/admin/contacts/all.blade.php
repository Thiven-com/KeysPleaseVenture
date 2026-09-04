@extends('layout.mainlayout')

@section('content')

    <style>
        /* =========================================================
           CONTACT ENQUIRY PAGE
           Same layout/UI structure as Schedule Visit Enquiries
        ========================================================= */

        .contact-enquiry-page {
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

        .contact-enquiry-main {
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

        .contact-enquiry-header {
            width: 100%;

            margin: 0 0 24px;
            padding: 0;

            box-sizing: border-box;
        }

        .contact-enquiry-title {
            margin: 0 0 6px;

            color: #071b3d !important;

            font-size: 25px !important;
            font-weight: 700 !important;

            line-height: 1.3 !important;
        }

        .contact-enquiry-subtitle {
            margin: 0;

            color: #687389 !important;

            font-size: 13px !important;
            font-weight: 400 !important;

            line-height: 1.5 !important;
        }


        /* =========================================================
           SUCCESS
        ========================================================= */

        .contact-enquiry-success {
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

        .contact-enquiry-card {
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

        .contact-enquiry-table-scroll {
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

        .contact-enquiry-table-scroll::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .contact-enquiry-table-scroll::-webkit-scrollbar-track {
            background: #f3f5f8;
        }

        .contact-enquiry-table-scroll::-webkit-scrollbar-thumb {
            background: #c3cbd7;

            border-radius: 20px;
        }

        .contact-enquiry-table-scroll::-webkit-scrollbar-thumb:hover {
            background: #9fa9b8;
        }


        /* =========================================================
           TABLE
        ========================================================= */

        .contact-enquiry-table {
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

        .contact-enquiry-table thead {
            background: #f3f6fa;
        }

        .contact-enquiry-table thead th {
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

        .contact-enquiry-table thead th:nth-child(1),
        .contact-enquiry-table thead th:nth-child(7),
        .contact-enquiry-table thead th:nth-child(8),
        .contact-enquiry-table thead th:nth-child(9) {
            text-align: center;
        }


        /* =========================================================
           BODY
        ========================================================= */

        .contact-enquiry-table tbody tr {
            background: #ffffff;

            transition: background-color .2s ease;
        }

        .contact-enquiry-table tbody tr:hover {
            background: #fafbfd;
        }

        .contact-enquiry-table tbody tr:hover td {
            background: #fafbfd;
        }

        .contact-enquiry-table tbody td {
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

        .contact-enquiry-table tbody tr:last-child td {
            border-bottom: 0;
        }


        /* =========================================================
           COLUMN WIDTHS
        ========================================================= */

        .contact-enquiry-table th:nth-child(1),
        .contact-enquiry-table td:nth-child(1) {
            width: 65px;
            text-align: center;
        }

        .contact-enquiry-table th:nth-child(2),
        .contact-enquiry-table td:nth-child(2) {
            width: 170px;
        }

        .contact-enquiry-table th:nth-child(3),
        .contact-enquiry-table td:nth-child(3) {
            width: 220px;
        }

        .contact-enquiry-table th:nth-child(4),
        .contact-enquiry-table td:nth-child(4) {
            width: 145px;
        }

        .contact-enquiry-table th:nth-child(5),
        .contact-enquiry-table td:nth-child(5) {
            width: 210px;
        }

        .contact-enquiry-table th:nth-child(6),
        .contact-enquiry-table td:nth-child(6) {
            width: 320px;
        }

        .contact-enquiry-table th:nth-child(7),
        .contact-enquiry-table td:nth-child(7) {
            width: 120px;
            text-align: center;
        }

        .contact-enquiry-table th:nth-child(8),
        .contact-enquiry-table td:nth-child(8) {
            width: 170px;
            text-align: center;
        }

        .contact-enquiry-table th:nth-child(9),
        .contact-enquiry-table td:nth-child(9) {
            width: 90px;
            text-align: center;
        }


        /* =========================================================
           NUMBER
        ========================================================= */

        .contact-enquiry-number {
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
           NAME
        ========================================================= */

        .contact-enquiry-name {
            margin: 0;

            color: #071b3d !important;

            font-size: 13px;
            font-weight: 700;

            line-height: 1.35;
        }


        /* =========================================================
           EMAIL
        ========================================================= */

        .contact-enquiry-email {
            color: #344158 !important;

            font-size: 11px;
            font-weight: 600;

            word-break: break-word;
        }

        .contact-enquiry-email-link {
            color: inherit;

            text-decoration: none;

            transition: color .2s ease;
        }

        .contact-enquiry-email-link:hover {
            color: #071b3d !important;
        }


        /* =========================================================
           PHONE
        ========================================================= */

        .contact-enquiry-phone {
            color: #344158 !important;

            font-size: 12px;
            font-weight: 600;

            white-space: nowrap;
        }

        .contact-enquiry-phone-link {
            color: inherit;

            text-decoration: none;
        }


        /* =========================================================
           SUBJECT
        ========================================================= */

        .contact-enquiry-subject {
            color: #071b3d !important;

            font-size: 12px;
            font-weight: 600;

            line-height: 1.4;

            word-break: break-word;
        }


        /* =========================================================
           MESSAGE
        ========================================================= */

        .contact-enquiry-message {
            color: #4f5d72;

            font-size: 11px;

            line-height: 1.5;
        }

        .contact-enquiry-message-text {
            display: -webkit-box;

            overflow: hidden;

            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;

            line-clamp: 3;
        }

        .contact-enquiry-message-empty {
            color: #8a94a6;

            font-size: 10px;

            font-style: italic;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .contact-enquiry-status {
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

        .contact-enquiry-status-new {
            background: #fff7e6;

            color: #b7791f !important;
        }

        .contact-enquiry-status-contacted {
            background: #eef3ff;

            color: #3157a6 !important;
        }

        .contact-enquiry-status-closed {
            background: #ecfdf3;

            color: #18794e !important;
        }

        .contact-enquiry-status-default {
            background: #f1f3f5;

            color: #687389 !important;
        }


        /* =========================================================
           CREATED DATE
        ========================================================= */

        .contact-enquiry-created-date {
            color: #687389 !important;

            font-size: 10px !important;

            white-space: nowrap;
        }


        /* =========================================================
           DELETE BUTTON
        ========================================================= */

        .contact-enquiry-delete-form {
            display: inline-block;

            margin: 0;
            padding: 0;
        }

        .contact-enquiry-delete {
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

        .contact-enquiry-delete:hover {
            background: #e52229;

            color: #ffffff !important;

            transform: translateY(-1px);
        }

        .contact-enquiry-delete i {
            font-size: 15px;
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .contact-enquiry-empty {
            height: 180px;

            text-align: center !important;

            vertical-align: middle !important;
        }

        .contact-enquiry-empty-title {
            margin: 0 0 6px;

            color: #687389;

            font-size: 14px;
            font-weight: 600;
        }

        .contact-enquiry-empty-text {
            margin: 0;

            color: #8a94a6;

            font-size: 11px;
        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 991px) {

            .contact-enquiry-main {
                padding: 20px 15px 30px;
            }

            .contact-enquiry-table-scroll {
                max-height: calc(100vh - 180px);
            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 576px) {

            .contact-enquiry-main {
                padding: 16px 10px 25px;
            }

            .contact-enquiry-title {
                font-size: 20px !important;
            }

            .contact-enquiry-subtitle {
                font-size: 11px !important;
            }

            .contact-enquiry-table {
                min-width: 1250px;
            }

        }
    </style>


    <div class="contact-enquiry-page">

        <div class="contact-enquiry-main">


            {{-- =====================================================
            PAGE HEADER
            ====================================================== --}}

            <div class="contact-enquiry-header">

                <h3 class="contact-enquiry-title">

                    Contact Enquiries

                </h3>

                <p class="contact-enquiry-subtitle">

                    Manage customer contact enquiries

                </p>

            </div>


            {{-- =====================================================
            SUCCESS MESSAGE
            ====================================================== --}}

            @if(session('success'))

                <div class="contact-enquiry-success">

                    <i class="ti ti-circle-check me-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            {{-- =====================================================
            TABLE CARD
            ====================================================== --}}

            <div class="contact-enquiry-card">

                <div class="contact-enquiry-table-scroll">

                    <table class="contact-enquiry-table">

                        <thead>

                            <tr>

                                <th>S.No</th>

                                <th>Name</th>

                                <th>Email</th>

                                <th>Phone</th>

                                <th>Subject</th>

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

                                        <span class="contact-enquiry-number">

                                            {{ $loop->iteration }}

                                        </span>

                                    </td>


                                    {{-- =================================================
                                    NAME
                                    ================================================== --}}

                                    <td>

                                        <div class="contact-enquiry-name">

                                            {{ $enquiry->name ?: '-' }}

                                        </div>

                                    </td>


                                    {{-- =================================================
                                    EMAIL
                                    ================================================== --}}

                                    <td>

                                        @if($enquiry->email)

                                            <a
                                                href="mailto:{{ $enquiry->email }}"
                                                class="contact-enquiry-email-link"
                                            >

                                                <span class="contact-enquiry-email">

                                                    {{ $enquiry->email }}

                                                </span>

                                            </a>

                                        @else

                                            <span class="contact-enquiry-email">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- =================================================
                                    PHONE
                                    ================================================== --}}

                                    <td>

                                        @if($enquiry->phone)

                                            <a
                                                href="tel:{{ $enquiry->phone }}"
                                                class="contact-enquiry-phone-link"
                                            >

                                                <span class="contact-enquiry-phone">

                                                    {{ $enquiry->phone }}

                                                </span>

                                            </a>

                                        @else

                                            <span class="contact-enquiry-phone">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- =================================================
                                    SUBJECT
                                    ================================================== --}}

                                    <td>

                                        <div
                                            class="contact-enquiry-subject"
                                            title="{{ $enquiry->subject }}"
                                        >

                                            {{ $enquiry->subject ?: '-' }}

                                        </div>

                                    </td>


                                    {{-- =================================================
                                    MESSAGE
                                    ================================================== --}}

                                    <td>

                                        <div class="contact-enquiry-message">

                                            @if($enquiry->message)

                                                <span
                                                    class="contact-enquiry-message-text"
                                                    title="{{ $enquiry->message }}"
                                                >

                                                    {{ $enquiry->message }}

                                                </span>

                                            @else

                                                <span class="contact-enquiry-message-empty">

                                                    No message provided

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
                                                'contact-enquiry-status-new',

                                                'contacted' =>
                                                'contact-enquiry-status-contacted',

                                                'closed' =>
                                                'contact-enquiry-status-closed',

                                                default =>
                                                'contact-enquiry-status-default',

                                            };

                                        @endphp


                                        <span class="contact-enquiry-status {{ $statusClass }}">

                                            {{ ucfirst($status) }}

                                        </span>

                                    </td>


                                    {{-- =================================================
                                    CREATED DATE
                                    ================================================== --}}

                                    <td>

                                        <span class="contact-enquiry-created-date">

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

                                        <form
                                            class="contact-enquiry-delete-form"
                                            action="{{ route(
                                                'admin.contact.enquiries.destroy',
                                                $enquiry->id
                                            ) }}"
                                            method="POST"
                                            onsubmit="return confirmDeleteContact(this);"
                                        >

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="contact-enquiry-delete"
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
                                        colspan="9"
                                        class="contact-enquiry-empty"
                                    >

                                        <h5 class="contact-enquiry-empty-title">

                                            No Contact Enquiries Found

                                        </h5>

                                        <p class="contact-enquiry-empty-text">

                                            No customer contact enquiries have been
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

        function confirmDeleteContact(form) {

            if (typeof Swal === 'undefined') {

                return confirm(
                    'Are you sure you want to delete this enquiry?'
                );

            }

            event.preventDefault();

            Swal.fire({

                title: 'Delete Enquiry?',

                text: 'Are you sure you want to delete this contact enquiry?',

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

            const contactEnquiryPage =
                document.querySelector('.contact-enquiry-page');


            if (!sidebar || !contactEnquiryPage) {

                return;

            }


            function syncContactEnquiryPageWithSidebar() {

                /*
                 * Mobile:
                 * Sidebar behaves differently.
                 */

                if (window.innerWidth <= 991) {

                    contactEnquiryPage.style.marginLeft = '0px';

                    contactEnquiryPage.style.width = '100%';

                    return;

                }


                /*
                 * Get actual sidebar width.
                 */

                const sidebarWidth = Math.round(
                    sidebar.getBoundingClientRect().width
                );


                /*
                 * Move page after sidebar.
                 */

                contactEnquiryPage.style.marginLeft =
                    sidebarWidth + 'px';


                /*
                 * Keep page inside viewport.
                 */

                contactEnquiryPage.style.width =
                    'calc(100% - ' + sidebarWidth + 'px)';

            }


            /*
             * Initial position
             */

            syncContactEnquiryPageWithSidebar();


            /*
             * Detect sidebar width changes.
             */

            if (typeof ResizeObserver !== 'undefined') {

                const observer =
                    new ResizeObserver(function () {

                        syncContactEnquiryPageWithSidebar();

                    });

                observer.observe(sidebar);

            }


            /*
             * Backup for sidebar
             * class-based animations.
             */

            document.addEventListener('click', function () {

                setTimeout(function () {

                    syncContactEnquiryPageWithSidebar();

                }, 100);


                setTimeout(function () {

                    syncContactEnquiryPageWithSidebar();

                }, 300);

            });


            /*
             * Browser resize
             */

            window.addEventListener('resize', function () {

                syncContactEnquiryPageWithSidebar();

            });

        });

    </script>

@endsection