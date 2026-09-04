@extends('layout.mainlayout')

@section('content')

<style>
    /* =========================================================
       SUBSCRIBERS PAGE
       Same layout/UI structure as Contact Enquiries
    ========================================================= */

    .subscriber-page {
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

    .subscriber-main {
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

    .subscriber-header {
        width: 100%;
        margin: 0 0 24px;
        padding: 0;
        box-sizing: border-box;
    }

    .subscriber-title {
        margin: 0 0 6px;
        color: #071b3d !important;
        font-size: 25px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
    }

    .subscriber-subtitle {
        margin: 0;
        color: #687389 !important;
        font-size: 13px !important;
        font-weight: 400 !important;
        line-height: 1.5 !important;
    }

    /* =========================================================
       SUCCESS
    ========================================================= */

    .subscriber-success {
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

    .subscriber-card {
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

    .subscriber-table-scroll {
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

    .subscriber-table-scroll::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    .subscriber-table-scroll::-webkit-scrollbar-track {
        background: #f3f5f8;
    }

    .subscriber-table-scroll::-webkit-scrollbar-thumb {
        background: #c3cbd7;
        border-radius: 20px;
    }

    .subscriber-table-scroll::-webkit-scrollbar-thumb:hover {
        background: #9fa9b8;
    }

    /* =========================================================
       TABLE
    ========================================================= */

    .subscriber-table {
        width: 100%;
        min-width: 850px;
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

    .subscriber-table thead {
        background: #f3f6fa;
    }

    .subscriber-table thead th {
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

    .subscriber-table thead th:nth-child(1),
    .subscriber-table thead th:nth-child(3),
    .subscriber-table thead th:nth-child(4),
    .subscriber-table thead th:nth-child(5) {
        text-align: center;
    }

    /* =========================================================
       BODY
    ========================================================= */

    .subscriber-table tbody tr {
        background: #ffffff;
        transition: background-color .2s ease;
    }

    .subscriber-table tbody tr:hover {
        background: #fafbfd;
    }

    .subscriber-table tbody tr:hover td {
        background: #fafbfd;
    }

    .subscriber-table tbody td {
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

    .subscriber-table tbody tr:last-child td {
        border-bottom: 0;
    }

    /* =========================================================
       COLUMN WIDTHS
    ========================================================= */

    .subscriber-table th:nth-child(1),
    .subscriber-table td:nth-child(1) {
        width: 70px;
        text-align: center;
    }

    .subscriber-table th:nth-child(2),
    .subscriber-table td:nth-child(2) {
        width: 400px;
    }

    .subscriber-table th:nth-child(3),
    .subscriber-table td:nth-child(3) {
        width: 150px;
        text-align: center;
    }

    .subscriber-table th:nth-child(4),
    .subscriber-table td:nth-child(4) {
        width: 220px;
        text-align: center;
    }

    .subscriber-table th:nth-child(5),
    .subscriber-table td:nth-child(5) {
        width: 100px;
        text-align: center;
    }

    /* =========================================================
       NUMBER
    ========================================================= */

    .subscriber-number {
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
       EMAIL
    ========================================================= */

    .subscriber-email {
        color: #071b3d !important;
        font-size: 13px;
        font-weight: 600;
        word-break: break-word;
    }

    .subscriber-email-link {
        color: inherit;
        text-decoration: none;
        transition: color .2s ease;
    }

    .subscriber-email-link:hover {
        color: #071b3d !important;
    }

    /* =========================================================
       STATUS
    ========================================================= */

    .subscriber-status {
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

    .subscriber-status-active {
        background: #ecfdf3;
        color: #18794e !important;
    }

    .subscriber-status-inactive {
        background: #f1f3f5;
        color: #687389 !important;
    }

    .subscriber-status-default {
        background: #f1f3f5;
        color: #687389 !important;
    }

    /* =========================================================
       CREATED DATE
    ========================================================= */

    .subscriber-created-date {
        color: #687389 !important;
        font-size: 10px !important;
        white-space: nowrap;
    }

    /* =========================================================
       DELETE BUTTON
    ========================================================= */

    .subscriber-delete-form {
        display: inline-block;
        margin: 0;
        padding: 0;
    }

    .subscriber-delete {
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

    .subscriber-delete:hover {
        background: #e52229;
        color: #ffffff !important;
        transform: translateY(-1px);
    }

    .subscriber-delete i {
        font-size: 15px;
    }

    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .subscriber-empty {
        height: 180px;
        text-align: center !important;
        vertical-align: middle !important;
    }

    .subscriber-empty-title {
        margin: 0 0 6px;
        color: #687389;
        font-size: 14px;
        font-weight: 600;
    }

    .subscriber-empty-text {
        margin: 0;
        color: #8a94a6;
        font-size: 11px;
    }

    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 991px) {

        .subscriber-main {
            padding: 20px 15px 30px;
        }

        .subscriber-table-scroll {
            max-height: calc(100vh - 180px);
        }

    }

    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 576px) {

        .subscriber-main {
            padding: 16px 10px 25px;
        }

        .subscriber-title {
            font-size: 20px !important;
        }

        .subscriber-subtitle {
            font-size: 11px !important;
        }

        .subscriber-table {
            min-width: 850px;
        }

    }
</style>


<div class="subscriber-page">

    <div class="subscriber-main">

        {{-- =====================================================
        PAGE HEADER
        ====================================================== --}}

        <div class="subscriber-header">

            <h3 class="subscriber-title">
                Subscribers
            </h3>

            <p class="subscriber-subtitle">
                Manage newsletter subscribers
            </p>

        </div>


        {{-- =====================================================
        SUCCESS MESSAGE
        ====================================================== --}}

        @if(session('success'))

            <div class="subscriber-success">

                <i class="ti ti-circle-check me-2"></i>

                {{ session('success') }}

            </div>

        @endif


        {{-- =====================================================
        TABLE CARD
        ====================================================== --}}

        <div class="subscriber-card">

            <div class="subscriber-table-scroll">

                <table class="subscriber-table">

                    <thead>

                        <tr>

                            <th>S.No</th>

                            <th>Email</th>

                            <th>Status</th>

                            <th>Date</th>

                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($subscribers as $subscriber)

                            <tr>

                                {{-- NUMBER --}}

                                <td>

                                    <span class="subscriber-number">
                                        {{ $loop->iteration }}
                                    </span>

                                </td>


                                {{-- EMAIL --}}

                                <td>

                                    @if($subscriber->email)

                                        <a
                                            href="mailto:{{ $subscriber->email }}"
                                            class="subscriber-email-link"
                                        >

                                            <span class="subscriber-email">
                                                {{ $subscriber->email }}
                                            </span>

                                        </a>

                                    @else

                                        <span class="subscriber-email">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- STATUS --}}

                                <td>

                                    @php

                                        $status = strtolower(
                                            trim($subscriber->status ?? 'active')
                                        );

                                        $statusClass = match ($status) {

                                            'active' =>
                                                'subscriber-status-active',

                                            'inactive' =>
                                                'subscriber-status-inactive',

                                            default =>
                                                'subscriber-status-default',

                                        };

                                    @endphp

                                    <span class="subscriber-status {{ $statusClass }}">
                                        {{ ucfirst($status) }}
                                    </span>

                                </td>


                                {{-- DATE --}}

                                <td>

                                    <span class="subscriber-created-date">

                                        {{ $subscriber->created_at
                                            ? $subscriber->created_at->format('d M Y, h:i A')
                                            : '-'
                                        }}

                                    </span>

                                </td>


                                {{-- ACTION --}}

                                <td>

                                    <form
                                        class="subscriber-delete-form"
                                        action="{{ route(
                                            'admin.subscribers.destroy',
                                            $subscriber->id
                                        ) }}"
                                        method="POST"
                                        onsubmit="return confirmDeleteSubscriber(this, event);"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="subscriber-delete"
                                            title="Delete Subscriber"
                                            aria-label="Delete Subscriber"
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
                                    colspan="5"
                                    class="subscriber-empty"
                                >

                                    <h5 class="subscriber-empty-title">
                                        No Subscribers Found
                                    </h5>

                                    <p class="subscriber-empty-text">
                                        No newsletter subscribers have been added yet.
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

    function confirmDeleteSubscriber(form, event) {

        if (typeof Swal === 'undefined') {

            return confirm(
                'Are you sure you want to delete this subscriber?'
            );

        }

        event.preventDefault();

        Swal.fire({

            title: 'Delete Subscriber?',

            text: 'Are you sure you want to delete this subscriber?',

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


    /* =========================================================
       SIDEBAR SYNCHRONIZATION
    ========================================================= */

    document.addEventListener('DOMContentLoaded', function () {

        const sidebar = document.getElementById('sidebar');

        const subscriberPage =
            document.querySelector('.subscriber-page');


        if (!sidebar || !subscriberPage) {
            return;
        }


        function syncSubscriberPageWithSidebar() {

            /*
             * Mobile:
             * Sidebar behaves differently.
             */

            if (window.innerWidth <= 991) {

                subscriberPage.style.marginLeft = '0px';

                subscriberPage.style.width = '100%';

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

            subscriberPage.style.marginLeft =
                sidebarWidth + 'px';


            /*
             * Keep page inside viewport.
             */

            subscriberPage.style.width =
                'calc(100% - ' + sidebarWidth + 'px)';

        }


        /*
         * Initial position
         */

        syncSubscriberPageWithSidebar();


        /*
         * Detect sidebar width changes.
         */

        if (typeof ResizeObserver !== 'undefined') {

            const observer =
                new ResizeObserver(function () {

                    syncSubscriberPageWithSidebar();

                });

            observer.observe(sidebar);

        }


        /*
         * Backup for sidebar
         * class-based animations.
         */

        document.addEventListener('click', function () {

            setTimeout(function () {

                syncSubscriberPageWithSidebar();

            }, 100);


            setTimeout(function () {

                syncSubscriberPageWithSidebar();

            }, 300);

        });


        /*
         * Browser resize
         */

        window.addEventListener('resize', function () {

            syncSubscriberPageWithSidebar();

        });

    });

</script>

@endsection