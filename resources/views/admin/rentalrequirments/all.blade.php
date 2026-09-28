@extends('layout.mainlayout')

@section('content')

<style>
    /* =========================================================
       RENTAL REQUIREMENTS ENQUIRIES
       ADMIN PAGE
       Scoped styles - will not affect other admin pages
    ========================================================= */

    .rental-requirements-page {
        width: 100%;
        min-width: 0;
        padding: 28px 30px 35px;
        margin-top: 50px;
        box-sizing: border-box;
    }

    /* =========================================================
       HEADER
    ========================================================= */

    .rental-requirements-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 20px;
    }

    .rental-requirements-title {
        margin: 0;
        color: #071b3d;
        font-size: 24px;
        font-weight: 800;
        line-height: 1.3;
    }

    .rental-requirements-subtitle {
        margin: 5px 0 0;
        color: #7a8498;
        font-size: 13px;
        line-height: 1.5;
    }

    .rental-requirements-count {
        flex: 0 0 auto;
        padding: 8px 14px;
        border: 1px solid #dce3ed;
        border-radius: 8px;
        background: #fff;
        color: #071b3d;
        font-size: 12px;
        font-weight: 700;
    }

    /* =========================================================
       SUCCESS MESSAGE
    ========================================================= */

    .rental-requirements-alert {
        margin-bottom: 18px;
        padding: 12px 15px;
        border: 1px solid #bce8d0;
        border-radius: 9px;
        background: #effcf5;
        color: #168653;
        font-size: 13px;
        font-weight: 600;
    }

    /* =========================================================
       CARD
    ========================================================= */

    .rental-requirements-card {
        width: 100%;
        overflow: hidden;
        border: 1px solid #e5eaf1;
        border-radius: 14px;
        background: #fff;
        box-shadow:
            0 4px 18px rgba(20, 35, 70, .06);
    }

    /* =========================================================
       TABLE SCROLL
    ========================================================= */

    .rental-requirements-table-scroll {
        width: 100%;
        max-height: calc(100vh - 210px);
        overflow-x: auto;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: thin;
    }

    .rental-requirements-table-scroll::-webkit-scrollbar {
        width: 7px;
        height: 7px;
    }

    .rental-requirements-table-scroll::-webkit-scrollbar-track {
        background: #f5f7fa;
    }

    .rental-requirements-table-scroll::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: #c7ceda;
    }

    /* =========================================================
       TABLE
    ========================================================= */

    .rental-requirements-table {
        width: 100%;
        min-width: 1450px;
        border-collapse: collapse;
        table-layout: fixed;
    }

    .rental-requirements-table thead th {
        position: sticky;
        top: 0;
        z-index: 5;

        height: 48px;
        padding: 0 12px;

        border-bottom: 1px solid #e1e6ee;

        background: #f3f6fa;
        color: #071b3d;

        font-size: 11px;
        font-weight: 800;
        letter-spacing: .4px;
        text-align: left;
        text-transform: uppercase;

        white-space: nowrap;
    }

    .rental-requirements-table tbody tr {
        height: 78px;
        border-bottom: 1px solid #edf0f4;
        transition: background .2s ease;
    }

    .rental-requirements-table tbody tr:hover {
        background: #fafcff;
    }

    .rental-requirements-table tbody tr:last-child {
        border-bottom: 0;
    }

    .rental-requirements-table td {
        padding: 10px 12px;
        color: #3d475d;
        font-size: 12px;
        vertical-align: middle;
    }

    /* =========================================================
       COLUMN WIDTHS
    ========================================================= */

    .rental-col-id {
        width: 65px;
    }

    .rental-col-name {
        width: 160px;
    }

    .rental-col-phone {
        width: 135px;
    }

    .rental-col-email {
        width: 220px;
    }

    .rental-col-property {
        width: 145px;
    }

    .rental-col-budget {
        width: 145px;
    }

    .rental-col-date {
        width: 135px;
    }

    .rental-col-furnishing {
        width: 145px;
    }

    .rental-col-contact {
        width: 120px;
    }

    .rental-col-message {
        width: 280px;
    }

    .rental-col-status {
        width: 100px;
    }

    .rental-col-action {
        width: 100px;
    }

    /* =========================================================
       CUSTOMER
    ========================================================= */

    .rental-customer-name {
        color: #071b3d;
        font-size: 13px;
        font-weight: 700;
    }

    .rental-customer-email {
        color: #56627a;
        font-size: 12px;
        word-break: break-word;
    }

    .rental-phone {
        color: #3e4960;
        font-weight: 600;
        white-space: nowrap;
    }

    /* =========================================================
       PROPERTY TYPE
    ========================================================= */

    .rental-property-type {
        display: inline-flex;
        align-items: center;
        min-height: 28px;
        padding: 5px 9px;
        border-radius: 6px;
        background: #eef2ff;
        color: #2434a5;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        white-space: nowrap;
    }

    /* =========================================================
       BUDGET
    ========================================================= */

    .rental-budget {
        color: #263452;
        font-weight: 700;
        white-space: nowrap;
    }

    /* =========================================================
       DATE
    ========================================================= */

    .rental-date {
        color: #56627a;
        white-space: nowrap;
    }

    .rental-date.empty {
        color: #a0a8b8;
        font-style: italic;
    }

    /* =========================================================
       FURNISHING
    ========================================================= */

    .rental-furnishing {
        color: #4c5870;
        font-size: 11px;
        font-weight: 600;
    }

    /* =========================================================
       CONTACT
    ========================================================= */

    .rental-contact {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        color: #34405a;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .rental-contact i {
        color: #071b3d;
        font-size: 12px;
    }

    /* =========================================================
       MESSAGE
    ========================================================= */

    .rental-message {
        max-width: 270px;
        color: #59647a;
        font-size: 11px;
        line-height: 1.55;

        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;

        overflow: hidden;
    }

    .rental-message.empty {
        color: #a0a8b8;
        font-style: italic;
    }

    /* =========================================================
       STATUS
    ========================================================= */

    .rental-status {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-width: 58px;
        padding: 6px 9px;

        border-radius: 20px;

        background: #fff4df;
        color: #c47b00;

        font-size: 10px;
        font-weight: 800;
        text-transform: capitalize;
    }

    .rental-status.new {
        background: #eaf3ff;
        color: #2563a8;
    }

    .rental-status.contacted {
        background: #effcf5;
        color: #168653;
    }

    .rental-status.closed {
        background: #f0f1f4;
        color: #68728a;
    }

    /* =========================================================
       DELETE
    ========================================================= */

    .rental-delete-form {
        margin: 0;
    }

    .rental-delete-btn {
        width: 34px;
        height: 34px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border: 1px solid #f1c8cf;
        border-radius: 7px;

        background: #fff5f6;
        color: #d43d55;

        font-size: 13px;

        cursor: pointer;
        transition: .25s ease;
    }

    .rental-delete-btn:hover {
        border-color: #d43d55;
        background: #d43d55;
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 5px 12px rgba(212, 61, 85, .16);
    }

    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .rental-empty {
        padding: 70px 30px;
        text-align: center;
    }

    .rental-empty-icon {
        width: 55px;
        height: 55px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin: 0 auto 15px;

        border-radius: 50%;

        background: #f2f5fa;
        color: #78849a;

        font-size: 21px;
    }

    .rental-empty h3 {
        margin: 0;
        color: #071b3d;
        font-size: 16px;
        font-weight: 800;
    }

    .rental-empty p {
        margin: 7px 0 0;
        color: #7b8599;
        font-size: 12px;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1199px) {

        .rental-requirements-page {
            padding: 25px 22px 30px;
        }

        .rental-requirements-title {
            font-size: 22px;
        }

        .rental-requirements-table {
            min-width: 1400px;
        }

    }


    @media (max-width: 767px) {

        .rental-requirements-page {
            padding: 20px 15px 25px;
            margin-top: 45px;
        }

        .rental-requirements-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 10px;
        }

        .rental-requirements-title {
            font-size: 20px;
        }

        .rental-requirements-subtitle {
            font-size: 12px;
        }

        .rental-requirements-count {
            padding: 7px 11px;
        }

        .rental-requirements-table-scroll {
            max-height: calc(100vh - 230px);
        }

        .rental-requirements-card {
            border-radius: 11px;
        }

    }

</style>


<div class="rental-requirements-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="rental-requirements-header">

        <div>

            <h1 class="rental-requirements-title">
                Rental Requirements Enquiries
            </h1>

            <p class="rental-requirements-subtitle">
                Manage customer rental requirements submitted from the website.
            </p>

        </div>


        <div class="rental-requirements-count">

            {{ $enquiries->count() }}
            {{ $enquiries->count() == 1 ? 'Enquiry' : 'Enquiries' }}

        </div>

    </div>



    {{-- =====================================================
         SUCCESS MESSAGE
    ====================================================== --}}

    @if(session('success'))

        <div class="rental-requirements-alert">

            <i class="fa-solid fa-circle-check"></i>

            {{ session('success') }}

        </div>

    @endif



    {{-- =====================================================
         TABLE CARD
    ====================================================== --}}

    <div class="rental-requirements-card">

        @if($enquiries->count())

            <div class="rental-requirements-table-scroll">

                <table class="rental-requirements-table">

                    <thead>

                        <tr>

                            <th class="rental-col-id">
                                ID
                            </th>

                            <th class="rental-col-name">
                                Customer
                            </th>

                            <th class="rental-col-phone">
                                Phone
                            </th>

                            <th class="rental-col-email">
                                Email
                            </th>

                            <th class="rental-col-property">
                                Property Type
                            </th>

                            <th class="rental-col-budget">
                                Monthly Rent
                            </th>

                            <th class="rental-col-date">
                                Move-in Date
                            </th>

                            <th class="rental-col-furnishing">
                                Furnishing
                            </th>

                            <th class="rental-col-contact">
                                Contact
                            </th>

                            <th class="rental-col-message">
                                Requirements
                            </th>

                            <th class="rental-col-status">
                                Status
                            </th>

                            <th class="rental-col-action">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($enquiries as $enquiry)

                            <tr>

                                {{-- ID --}}
                                <td>
                                    #{{ $enquiry->id }}
                                </td>


                                {{-- CUSTOMER --}}
                                <td>

                                    <div class="rental-customer-name">
                                        {{ $enquiry->name }}
                                    </div>

                                </td>


                                {{-- PHONE --}}
                                <td>

                                    <div class="rental-phone">
                                        {{ $enquiry->phone }}
                                    </div>

                                </td>


                                {{-- EMAIL --}}
                                <td>

                                    <div class="rental-customer-email">
                                        {{ $enquiry->email }}
                                    </div>

                                </td>


                                {{-- PROPERTY TYPE --}}
                                <td>

                                    <span class="rental-property-type">

                                        {{ ucwords(
                                            str_replace(
                                                '-',
                                                ' ',
                                                $enquiry->property_type
                                            )
                                        ) }}

                                    </span>

                                </td>


                                {{-- BUDGET --}}
                                <td>

                                    <span class="rental-budget">

                                        @switch($enquiry->budget)

                                            @case('below-10k')
                                                Below ₹10,000
                                                @break

                                            @case('10k-20k')
                                                ₹10,000 – ₹20,000
                                                @break

                                            @case('20k-30k')
                                                ₹20,000 – ₹30,000
                                                @break

                                            @case('30k-50k')
                                                ₹30,000 – ₹50,000
                                                @break

                                            @case('above-50k')
                                                Above ₹50,000
                                                @break

                                            @default
                                                <span style="color:#a0a8b8;">
                                                    Not specified
                                                </span>

                                        @endswitch

                                    </span>

                                </td>


                                {{-- MOVE IN DATE --}}
                                <td>

                                    @if($enquiry->move_in_date)

                                        <span class="rental-date">

                                            {{ $enquiry->move_in_date->format('d M Y') }}

                                        </span>

                                    @else

                                        <span class="rental-date empty">
                                            Not specified
                                        </span>

                                    @endif

                                </td>


                                {{-- FURNISHING --}}
                                <td>

                                    @if($enquiry->furnishing)

                                        <span class="rental-furnishing">

                                            {{ ucwords(
                                                str_replace(
                                                    '-',
                                                    ' ',
                                                    $enquiry->furnishing
                                                )
                                            ) }}

                                        </span>

                                    @else

                                        <span class="rental-date empty">
                                            Not specified
                                        </span>

                                    @endif

                                </td>


                                {{-- CONTACT --}}
                                <td>

                                    <span class="rental-contact">

                                        @if($enquiry->preferred_contact === 'phone')

                                            <i class="fa-solid fa-phone"></i>
                                            Phone

                                        @elseif($enquiry->preferred_contact === 'whatsapp')

                                            <i class="fa-brands fa-whatsapp"></i>
                                            WhatsApp

                                        @else

                                            <i class="fa-solid fa-envelope"></i>
                                            Email

                                        @endif

                                    </span>

                                </td>


                                {{-- REQUIREMENTS --}}
                                <td>

                                    @if($enquiry->message)

                                        <div
                                            class="rental-message"
                                            title="{{ $enquiry->message }}"
                                        >
                                            {{ $enquiry->message }}
                                        </div>

                                    @else

                                        <div class="rental-message empty">
                                            No requirements provided
                                        </div>

                                    @endif

                                </td>


                                {{-- STATUS --}}
                                <td>

                                    <span
                                        class="rental-status {{ strtolower($enquiry->status) }}"
                                    >
                                        {{ $enquiry->status }}
                                    </span>

                                </td>


                                {{-- DELETE --}}
                                <td>

                                    <form
                                        action="{{ route(
                                            'admin.rental.requirments.enquiries.destroy',
                                            $enquiry->id
                                        ) }}"
                                        method="POST"
                                        class="rental-delete-form"
                                        onsubmit="return confirm('Are you sure you want to delete this rental enquiry?');"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rental-delete-btn"
                                            title="Delete enquiry"
                                            aria-label="Delete enquiry"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}

            <div class="rental-empty">

                <div class="rental-empty-icon">

                    <i class="fa-solid fa-house-circle-exclamation"></i>

                </div>

                <h3>
                    No Rental Enquiries
                </h3>

                <p>
                    Rental requirements submitted from the website
                    will appear here.
                </p>

            </div>

        @endif

    </div>

</div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const sidebar = document.getElementById('sidebar');
            const rentalRequirementsPage =
                document.querySelector('.rental-requirements-page');

            if (!sidebar || !rentalRequirementsPage) {
                return;
            }


            function syncRentalRequirementsWithSidebar() {

                /*
                 * Mobile:
                 * sidebar behaves differently.
                 */
                if (window.innerWidth <= 991) {

                    rentalRequirementsPage.style.marginLeft = '0px';
                    rentalRequirementsPage.style.width = '100%';

                    return;
                }


                /*
                 * Get the REAL sidebar width.
                 *
                 * Example:
                 * open      = 280px
                 * collapsed = 94px
                 */
                const sidebarWidth = Math.round(
                    sidebar.getBoundingClientRect().width
                );


                /*
                 * Move Rental Requirements page after sidebar.
                 */
                rentalRequirementsPage.style.marginLeft =
                    sidebarWidth + 'px';


                /*
                 * Keep the page inside the viewport.
                 */
                rentalRequirementsPage.style.width =
                    'calc(100% - ' + sidebarWidth + 'px)';
            }


            /*
             * Initial position.
             */
            syncRentalRequirementsWithSidebar();


            /*
             * Detect sidebar open / close.
             */
            if (typeof ResizeObserver !== 'undefined') {

                const observer = new ResizeObserver(function () {

                    syncRentalRequirementsWithSidebar();

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

                    syncRentalRequirementsWithSidebar();

                }, 100);

                setTimeout(function () {

                    syncRentalRequirementsWithSidebar();

                }, 300);
            });


            /*
             * Browser resize.
             */
            window.addEventListener('resize', function () {

                syncRentalRequirementsWithSidebar();

            });

        });
    </script>

@endsection