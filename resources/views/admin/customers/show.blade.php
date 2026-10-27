
@extends('layout.mainlayout')

@section('content')

<style>
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

    .customer-back-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 40px;
        padding: 0 15px;
        background: #fff;
        color: #071b3d !important;
        border: 1px solid #e0e6ee;
        border-radius: 8px;
        text-decoration: none;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
        transition: all .2s ease;
    }

    .customer-back-btn:hover {
        background: #f3f6fa;
        border-color: #071b3d;
        color: #071b3d !important;
    }

    .properties-card {
        width: 100%;
        max-width: 100%;
        min-width: 0;
        margin: 0 0 24px;
        padding: 0;
        box-sizing: border-box;
        background: #fff;
        border: 1px solid #e5eaf1;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(7, 27, 61, .04),
                    0 12px 35px rgba(7, 27, 61, .04);
    }

    .customer-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding: 20px 22px;
        border-bottom: 1px solid #edf0f4;
    }

    .customer-card-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
        color: #071b3d !important;
        font-size: 15px !important;
        font-weight: 700 !important;
        line-height: 1.4;
    }

    .customer-card-title > i {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        flex-shrink: 0;
        border-radius: 8px;
        background: #eef3ff;
        color: #071b3d;
        font-size: 18px;
    }

    .customer-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 27px;
        padding: 0 10px;
        border: 1px solid #e5eaf1;
        border-radius: 7px;
        background: #f3f6fa;
        color: #071b3d;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .customer-card-body {
        padding: 22px;
    }

    .customer-info-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 24px 22px;
    }

    .customer-info-item {
        min-width: 0;
        padding: 0 0 16px;
        border-bottom: 1px solid #edf0f4;
    }

    .customer-info-label {
        display: block;
        margin-bottom: 7px;
        color: #8a94a6;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
    }

    .customer-info-value {
        display: block;
        color: #071b3d;
        font-size: 13px;
        font-weight: 600;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .customer-table-scroll {
        width: 100%;
        max-width: 100%;
        min-width: 0;
        overflow-x: auto;
        overflow-y: hidden;
        scrollbar-width: thin;
        -webkit-overflow-scrolling: touch;
    }

    .customer-table {
        width: 100%;
        min-width: 760px;
        margin: 0;
        border: 0;
        border-collapse: separate;
        border-spacing: 0;
        table-layout: fixed;
        background: #fff;
    }

    .customer-table thead th {
        height: 52px;
        padding: 0 16px;
        box-sizing: border-box;
        background: #f3f6fa;
        color: #071b3d !important;
        font-size: 10px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        text-align: left;
        text-transform: uppercase;
        letter-spacing: .35px;
        white-space: nowrap;
        border: 0;
        border-bottom: 1px solid #e0e6ee;
        vertical-align: middle;
    }

    .customer-table tbody tr {
        background: #fff;
        transition: background-color .2s ease;
    }

    .customer-table tbody tr:hover,
    .customer-table tbody tr:hover td {
        background: #fafbfd;
    }

    .customer-table tbody td {
        min-height: 58px;
        padding: 15px 16px;
        box-sizing: border-box;
        color: #4f5d72;
        font-size: 12px;
        font-weight: 400;
        line-height: 1.5;
        border: 0;
        border-bottom: 1px solid #edf0f4;
        vertical-align: middle;
        overflow-wrap: anywhere;
    }

    .customer-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .customer-table th:nth-child(1),
    .customer-table td:nth-child(1) {
        width: 25%;
    }

    .customer-table th:nth-child(2),
    .customer-table td:nth-child(2) {
        width: 20%;
    }

    .customer-table th:nth-child(3),
    .customer-table td:nth-child(3) {
        width: 18%;
    }

    .customer-table th:nth-child(4),
    .customer-table td:nth-child(4) {
        width: 17%;
    }

    .customer-table th:nth-child(5),
    .customer-table td:nth-child(5) {
        width: 20%;
    }

    .customer-status {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 27px;
        padding: 4px 10px;
        border: 1px solid #e5eaf1;
        border-radius: 7px;
        background: #f3f6fa;
        color: #071b3d;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .customer-date {
        color: #687389;
        font-size: 11px;
        white-space: nowrap;
    }

    .customer-empty {
        height: 130px;
        text-align: center !important;
        vertical-align: middle !important;
        color: #8a94a6 !important;
        font-size: 12px !important;
    }

    .customer-empty i {
        display: block;
        margin-bottom: 8px;
        color: #8a94a6;
        font-size: 30px;
    }

    @media (max-width: 991px) {
        .properties-main {
            padding: 20px 15px 30px;
        }

        .customer-info-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

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
            gap: 14px;
        }

        .customer-back-btn {
            min-height: 36px;
        }

        .customer-card-header {
            padding: 16px;
        }

        .customer-card-body {
            padding: 16px;
        }

        .customer-info-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .customer-info-item {
            padding-bottom: 12px;
        }
    }
</style>

<div class="properties-page">
    <div class="properties-main">

        {{-- PAGE HEADER --}}
        <div class="properties-header">
            <div>
                <h3 class="properties-title">Customer Details</h3>
                <p class="properties-subtitle">
                    Customer profile, enquiries and scheduled visits.
                </p>
            </div>

            <a href="{{ route('admin.customers.index') }}"
               class="customer-back-btn">
                <i class="ti ti-arrow-left"></i>
                Back to Customers
            </a>
        </div>

        {{-- PERSONAL INFORMATION --}}
        <div class="properties-card">

            <div class="customer-card-header">
                <h5 class="customer-card-title">
                    <i class="ti ti-user"></i>
                    Personal Information
                </h5>

                <span class="customer-count">
                    Customer #{{ $customer->id }}
                </span>
            </div>

            <div class="customer-card-body">
                <div class="customer-info-grid">

                    <div class="customer-info-item">
                        <span class="customer-info-label">
                            Customer Name
                        </span>
                        <span class="customer-info-value">
                            {{ $customer->name ?: '—' }}
                        </span>
                    </div>

                    <div class="customer-info-item">
                        <span class="customer-info-label">
                            Email Address
                        </span>
                        <span class="customer-info-value">
                            {{ $customer->email ?: '—' }}
                        </span>
                    </div>

                    <div class="customer-info-item">
                        <span class="customer-info-label">
                            Mobile Number
                        </span>
                        <span class="customer-info-value">
                            {{ $customer->mobile ?: '—' }}
                        </span>
                    </div>

                    <div class="customer-info-item">
                        <span class="customer-info-label">
                            Customer ID
                        </span>
                        <span class="customer-info-value">
                            #{{ $customer->id }}
                        </span>
                    </div>

                    <div class="customer-info-item">
                        <span class="customer-info-label">
                            Registered On
                        </span>
                        <span class="customer-info-value">
                            {{ $customer->created_at
                                ? $customer->created_at->format('d M Y')
                                : '—' }}
                        </span>
                    </div>

                </div>
            </div>
        </div>

        {{-- RENTAL REQUIREMENTS --}}
        <div class="properties-card">

            <div class="customer-card-header">
                <h5 class="customer-card-title">
                    <i class="ti ti-home-search"></i>
                    Rental Requirement Enquiries
                </h5>

                <span class="customer-count">
                    {{ $enquiries->count() }}
                    {{ $enquiries->count() === 1 ? 'Enquiry' : 'Enquiries' }}
                </span>
            </div>

            <div class="customer-table-scroll">
                <table class="customer-table">
                    <thead>
                        <tr>
                            <th>Property</th>
                            <th>Property Type</th>
                            <th>Move-in Date</th>
                            <th>Status</th>
                            <th>Submitted</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($enquiries as $enquiry)
                            <tr>
                                <td>
                                    {{ $enquiry->property_title ?: '—' }}
                                </td>

                                <td>
                                    {{ $enquiry->property_type ?: '—' }}
                                </td>

                                <td>
                                    {{ $enquiry->move_in_date ?: '—' }}
                                </td>

                                <td>
                                    <span class="customer-status">
                                        {{ ucfirst($enquiry->status ?: 'new') }}
                                    </span>
                                </td>

                                <td>
                                    <span class="customer-date">
                                        {{ $enquiry->created_at
                                            ? $enquiry->created_at->format('d M Y')
                                            : '—' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="customer-empty">
                                    <i class="ti ti-home-search"></i>
                                    No rental requirement enquiries found
                                    for this customer.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SCHEDULED SITE VISITS --}}
        <div class="properties-card">

            <div class="customer-card-header">
                <h5 class="customer-card-title">
                    <i class="ti ti-calendar-event"></i>
                    Scheduled Site Visits
                </h5>

                <span class="customer-count">
                    {{ $siteVisits->count() }}
                    {{ $siteVisits->count() === 1 ? 'Visit' : 'Visits' }}
                </span>
            </div>

            <div class="customer-table-scroll">
                <table class="customer-table">
                    <thead>
                        <tr>
                            <th>Property</th>
                            <th>Visit Date</th>
                            <th>Visit Time</th>
                            <th>Status</th>
                            <th>Submitted</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($siteVisits as $visit)
                            <tr>
                                <td>
                                    {{ $visit->property_title ?: '—' }}
                                </td>

                                <td>
                                    {{ $visit->visit_date ?: '—' }}
                                </td>

                                <td>
                                    {{ $visit->visit_time ?: '—' }}
                                </td>

                                <td>
                                    <span class="customer-status">
                                        {{ ucfirst($visit->status ?: 'new') }}
                                    </span>
                                </td>

                                <td>
                                    <span class="customer-date">
                                        {{ $visit->created_at
                                            ? $visit->created_at->format('d M Y')
                                            : '—' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="customer-empty">
                                    <i class="ti ti-calendar-event"></i>
                                    No scheduled visits found
                                    for this customer.
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
        const customerDetailsPage = document.querySelector('.properties-page');

        if (!sidebar || !customerDetailsPage) {
            return;
        }

        function syncCustomerPageWithSidebar() {
            if (window.innerWidth <= 991) {
                customerDetailsPage.style.marginLeft = '0px';
                customerDetailsPage.style.width = '100%';
                return;
            }

            const sidebarWidth = Math.round(
                sidebar.getBoundingClientRect().width
            );

            customerDetailsPage.style.marginLeft = sidebarWidth + 'px';
            customerDetailsPage.style.width =
                'calc(100% - ' + sidebarWidth + 'px)';
        }

        syncCustomerPageWithSidebar();

        if (typeof ResizeObserver !== 'undefined') {
            const observer = new ResizeObserver(function () {
                syncCustomerPageWithSidebar();
            });

            observer.observe(sidebar);
        }

        document.addEventListener('click', function () {
            setTimeout(syncCustomerPageWithSidebar, 100);
            setTimeout(syncCustomerPageWithSidebar, 300);
        });

        window.addEventListener('resize', syncCustomerPageWithSidebar);
    });
</script>

@endsection
