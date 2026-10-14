<?php $page = 'index'; ?>
@extends('layout.mainlayout')

@section('title', 'Admin Dashboard')

@section('content')

<link rel="stylesheet" href="https\://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>
    .kp-dashboard {
        padding: 28px 30px 40px;
        margin-top: 35px;
        color: #263247;
        background: #f6f8fc;
        min-height: calc(100vh - 100px);
        box-sizing: border-box;
    }

    .kp-dashboard * {
        box-sizing: border-box;
    }

    .kp-dashboard-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 28px;
        margin-top: 40px;
    }

    .kp-dashboard-title {
        margin: 0 0 7px;
        color: #071b3d;
        font-size: 26px;
        font-weight: 750;
    }

    .kp-dashboard-subtitle {
        margin: 0;
        color: #7a8497;
        font-size: 13px;
    }

    .kp-dashboard-date {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 15px;
        background: #fff;
        border: 1px solid #e6eaf1;
        border-radius: 10px;
        color: #344158;
        font-size: 12px;
        font-weight: 600;
    }

    .kp-dashboard-section-title {
        margin: 0 0 16px;
        color: #071b3d;
        font-size: 16px;
        font-weight: 700;
    }

    .kp-dashboard-stats {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 30px;
    }

    .kp-stat-card {
        position: relative;
        min-width: 0;
        padding: 22px;
        background: #fff;
        border: 1px solid #e8edf5;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(7, 27, 61, .035);
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .kp-stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 28px rgba(7, 27, 61, .07);
    }

    .kp-stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        margin-bottom: 22px;
    }

    .kp-stat-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 12px;
        font-size: 23px;
    }

    .kp-icon-blue {
        color: #3157a6;
        background: #edf3ff;
    }

    .kp-icon-green {
        color: #16845b;
        background: #e8f8ef;
    }

    .kp-icon-purple {
        color: #7950c9;
        background: #f2ecff;
    }

    .kp-icon-orange {
        color: #c77916;
        background: #fff4e3;
    }

    .kp-stat-label {
        margin-bottom: 8px;
        color: #778196;
        font-size: 12px;
        font-weight: 600;
    }

    .kp-stat-value {
        margin: 0;
        color: #071b3d;
        font-size: 30px;
        font-weight: 750;
        line-height: 1.2;
        overflow-wrap: anywhere;
    }

    .kp-stat-description {
        margin-top: 9px;
        color: #98a1b1;
        font-size: 11px;
    }

    .kp-dashboard-content {
        display: grid;
        grid-template-columns: minmax(0, 1.7fr) minmax(260px, 1fr);
        gap: 22px;
        align-items: start;
    }

    .kp-dashboard-panel {
        min-width: 0;
        background: #fff;
        border: 1px solid #e7ebf2;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(7, 27, 61, .035);
        overflow: hidden;
    }

    .kp-panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        padding: 21px 22px;
        border-bottom: 1px solid #edf0f5;
    }

    .kp-panel-title {
        margin: 0;
        color: #071b3d;
        font-size: 15px;
        font-weight: 700;
    }

    .kp-panel-subtitle {
        margin: 5px 0 0;
        color: #8992a3;
        font-size: 11px;
    }

    .kp-view-all {
        color: #243ca8;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
    }

    .kp-view-all:hover {
        color: #5169e8;
    }

    .kp-table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .kp-dashboard-table {
        width: 100%;
        min-width: 580px;
        border-collapse: collapse;
    }

    .kp-dashboard-table th {
        padding: 14px 18px;
        background: #fafbfe;
        color: #7d8799;
        font-size: 10px;
        font-weight: 700;
        text-align: left;
        text-transform: uppercase;
        letter-spacing: .4px;
        white-space: nowrap;
    }

    .kp-dashboard-table td {
        padding: 16px 18px;
        border-bottom: 1px solid #f0f2f6;
        color: #596579;
        font-size: 12px;
        vertical-align: middle;
    }

    .kp-dashboard-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .kp-dashboard-table tbody tr:hover {
        background: #fbfcff;
    }

    .kp-customer-name {
        color: #071b3d;
        font-weight: 700;
    }

    .kp-property-name {
        max-width: 190px;
        color: #344158;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .kp-property-id {
        display: block;
        margin-top: 4px;
        color: #9aa3b2;
        font-size: 10px;
    }

    .kp-status {
        display: inline-flex;
        align-items: center;
        padding: 6px 10px;
        border-radius: 7px;
        background: #fff5df;
        color: #a96b0b;
        font-size: 10px;
        font-weight: 700;
        text-transform: capitalize;
        white-space: nowrap;
    }

    .kp-status-contacted {
        background: #edf3ff;
        color: #3157a6;
    }

    .kp-status-closed {
        background: #e8f8ef;
        color: #16845b;
    }

    .kp-empty-state {
        padding: 45px 20px !important;
        color: #8a94a6 !important;
        text-align: center;
    }

    .kp-quick-actions {
        padding: 10px 20px 20px;
    }

    .kp-quick-action {
        display: flex;
        align-items: center;
        gap: 13px;
        margin-top: 12px;
        padding: 14px;
        border: 1px solid #edf0f5;
        border-radius: 11px;
        color: #344158;
        text-decoration: none;
        transition: background .2s ease, border-color .2s ease;
    }

    .kp-quick-action:hover {
        background: #f7f8ff;
        border-color: #dce3ff;
        color: #243ca8;
    }

    .kp-action-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: #f0f3ff;
        color: #243ca8;
        font-size: 19px;
    }

    .kp-action-text {
        flex: 1;
        min-width: 0;
    }

    .kp-action-title {
        display: block;
        color: #071b3d;
        font-size: 12px;
        font-weight: 700;
    }

    .kp-action-description {
        display: block;
        margin-top: 4px;
        color: #8992a3;
        font-size: 10px;
    }

    .kp-action-arrow {
        color: #9aa3b2;
        font-size: 16px;
    }

    .kp-dashboard-footer {
        margin-top: 24px;
        color: #9aa3b2;
        font-size: 11px;
        text-align: center;
    }

    @media (max-width: 1200px) {
        .kp-dashboard-stats {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .kp-dashboard-content {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .kp-dashboard {
            padding: 20px 12px 28px;
            margin-top: 15px;
        }

        .kp-dashboard-title {
            font-size: 22px;
        }

        .kp-dashboard-stats {
            gap: 10px;
        }

        .kp-stat-card {
            padding: 15px;
        }

        .kp-stat-icon {
            width: 40px;
            height: 40px;
            font-size: 19px;
        }

        .kp-stat-value {
            font-size: 25px;
        }

        .kp-stat-top {
            margin-bottom: 16px;
        }

        .kp-panel-header {
            padding: 17px;
        }
    }
</style>

<div class="kp-dashboard">

    {{-- DASHBOARD HEADER --}}
    <div class="kp-dashboard-header">
        <div>
            <h1 class="kp-dashboard-title">Dashboard</h1>
            <p class="kp-dashboard-subtitle">
                Welcome back! Here's an overview of your property management.
            </p>
        </div>

        <div class="kp-dashboard-date">
            <i class="ti ti-calendar"></i>
            {{ now()->format('d M Y') }}
        </div>
    </div>

    {{-- SUMMARY CARDS --}}
    <h2 class="kp-dashboard-section-title">Overview</h2>

    <div class="kp-dashboard-stats">

        <div class="kp-stat-card">
            <div class="kp-stat-top">
                <div class="kp-stat-icon kp-icon-blue">
                    <i class="ti ti-building"></i>
                </div>
            </div>

            <div class="kp-stat-label">Total Properties</div>
            <h3 class="kp-stat-value">
                {{ number_format($totalProperties ?? 0) }}
            </h3>
            <div class="kp-stat-description">
                Properties in your database
            </div>
        </div>

        <div class="kp-stat-card">
            <div class="kp-stat-top">
                <div class="kp-stat-icon kp-icon-green">
                    <i class="ti ti-calendar-check"></i>
                </div>
            </div>

            <div class="kp-stat-label">Schedule Visit Enquiries</div>
            <h3 class="kp-stat-value">
                {{ number_format($totalScheduleVisits ?? 0) }}
            </h3>
            <div class="kp-stat-description">
                Customer property visit requests
            </div>
        </div>

        <div class="kp-stat-card">
            <div class="kp-stat-top">
                <div class="kp-stat-icon kp-icon-purple">
                    <i class="ti ti-users"></i>
                </div>
            </div>

            <div class="kp-stat-label">Total Brokers</div>
            <h3 class="kp-stat-value">
                {{ number_format($totalBrokers ?? 0) }}
            </h3>
            <div class="kp-stat-description">
                Registered brokers
            </div>
        </div>

        <div class="kp-stat-card">
            <div class="kp-stat-top">
                <div class="kp-stat-icon kp-icon-orange">
                    <i class="ti ti-mail"></i>
                </div>
            </div>

            <div class="kp-stat-label">Contact Enquiries</div>
            <h3 class="kp-stat-value">
                {{ number_format($totalContactEnquiries ?? 0) }}
            </h3>
            <div class="kp-stat-description">
                Customer contact requests
            </div>
        </div>

    </div>

    {{-- MAIN DASHBOARD CONTENT --}}
    <div class="kp-dashboard-content">

        {{-- RECENT VISIT ENQUIRIES --}}
        <section class="kp-dashboard-panel">

            <div class="kp-panel-header">
                <div>
                    <h2 class="kp-panel-title">Recent Schedule Visits</h2>
                    <p class="kp-panel-subtitle">
                        Latest customer property visit requests
                    </p>
                </div>

                <a
                    href="{{ url('/admin/schedule-visit-enquiries') }}"
                    class="kp-view-all"
                >
                    View All <i class="ti ti-arrow-up-right"></i>
                </a>
            </div>

            <div class="kp-table-wrap">
                <table class="kp-dashboard-table">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Property</th>
                            <th>Visit Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse(($recentScheduleVisits ?? collect()) as $enquiry)
                            @php
                                $status = strtolower(
                                    trim($enquiry->status ?? 'new')
                                );

                                $statusClass = match ($status) {
                                    'contacted' => 'kp-status-contacted',
                                    'closed', 'completed' => 'kp-status-closed',
                                    default => '',
                                };
                            @endphp

                            <tr>
                                <td>
                                    <div class="kp-customer-name">
                                        {{ $enquiry->name ?: 'Unknown customer' }}
                                    </div>
                                    <small>
                                        {{ $enquiry->phone ?: 'No phone provided' }}
                                    </small>
                                </td>

                                <td>
                                    <div class="kp-property-name">
                                        {{ $enquiry->property?->property_title
                                            ?? $enquiry->property_title
                                            ?? 'Property unavailable' }}
                                    </div>
                                    <span class="kp-property-id">
                                        Property ID:
                                        {{ $enquiry->property_id ?? 'N/A' }}
                                    </span>
                                </td>

                                <td>
                                    {{ $enquiry->visit_date
                                        ? \Carbon\Carbon::parse($enquiry->visit_date)->format('d M Y')
                                        : '-' }}
                                    <br>
                                    <small>
                                        {{ $enquiry->visit_time
                                            ? \Carbon\Carbon::parse($enquiry->visit_time)->format('h:i A')
                                            : '' }}
                                    </small>
                                </td>

                                <td>
                                    <span class="kp-status {{ $statusClass }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="kp-empty-state">
                                    <i class="ti ti-calendar-off"
                                       style="font-size: 25px;"></i>
                                    <div style="margin-top: 8px;">
                                        No schedule visit enquiries found.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </section>

        {{-- QUICK ACTIONS --}}
        <section class="kp-dashboard-panel">

            <div class="kp-panel-header">
                <div>
                    <h2 class="kp-panel-title">Quick Actions</h2>
                    <p class="kp-panel-subtitle">
                        Frequently used management pages
                    </p>
                </div>
            </div>

            <div class="kp-quick-actions">

                <a href="{{ url('/admin/properties') }}"
                   class="kp-quick-action">
                    <span class="kp-action-icon">
                        <i class="ti ti-building"></i>
                    </span>
                    <span class="kp-action-text">
                        <span class="kp-action-title">Manage Properties</span>
                        <span class="kp-action-description">
                            View and manage property listings
                        </span>
                    </span>
                    <i class="ti ti-chevron-right kp-action-arrow"></i>
                </a>

                <a href="{{ url('/admin/schedule-visit-enquiries') }}"
                   class="kp-quick-action">
                    <span class="kp-action-icon">
                        <i class="ti ti-calendar-event"></i>
                    </span>
                    <span class="kp-action-text">
                        <span class="kp-action-title">Schedule Visit</span>
                        <span class="kp-action-description">
                            Review customer visit requests
                        </span>
                    </span>
                    <i class="ti ti-chevron-right kp-action-arrow"></i>
                </a>

                <a href="{{ url('/admin/brokers') }}"
                   class="kp-quick-action">
                    <span class="kp-action-icon">
                        <i class="ti ti-users"></i>
                    </span>
                    <span class="kp-action-text">
                        <span class="kp-action-title">Manage Brokers</span>
                        <span class="kp-action-description">
                            View registered brokers
                        </span>
                    </span>
                    <i class="ti ti-chevron-right kp-action-arrow"></i>
                </a>

                <a href="{{ url('/admin/contact-enquiries') }}"
                   class="kp-quick-action">
                    <span class="kp-action-icon">
                        <i class="ti ti-mail"></i>
                    </span>
                    <span class="kp-action-text">
                        <span class="kp-action-title">Contact Enquiries</span>
                        <span class="kp-action-description">
                            Review customer messages
                        </span>
                    </span>
                    <i class="ti ti-chevron-right kp-action-arrow"></i>
                </a>

            </div>

        </section>

    </div>

    <div class="kp-dashboard-footer">
        Keys Please Venture &middot; Admin Dashboard
    </div>

</div>



<script>
document.addEventListener('DOMContentLoaded', function () {

    /* =========================================================
       SIDEBAR RESPONSIVE SYNC
    ========================================================= */

    const sidebar = document.getElementById('sidebar');
    const dashboardPage = document.querySelector('.kp-dashboard');

    if (!sidebar || !dashboardPage) {
        return;
    }

    function syncDashboardPageWithSidebar() {

        /* Mobile and tablet */
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

            dashboardPage.style.setProperty(
                'max-width',
                '100%',
                'important'
            );

            return;
        }

        /* Get actual sidebar width */
        const sidebarWidth = Math.round(
            sidebar.getBoundingClientRect().width
        );

        /* Position dashboard beside sidebar */
        dashboardPage.style.setProperty(
            'margin-left',
            sidebarWidth + 'px',
            'important'
        );

        /* Keep dashboard within available space */
        dashboardPage.style.setProperty(
            'width',
            'calc(100% - ' + sidebarWidth + 'px)',
            'important'
        );

        dashboardPage.style.setProperty(
            'max-width',
            'none',
            'important'
        );
    }

    /* Initial synchronization */
    syncDashboardPageWithSidebar();

    /* Observe sidebar width changes */
    let sidebarObserver = null;

    if (typeof ResizeObserver !== 'undefined') {

        sidebarObserver = new ResizeObserver(function () {
            syncDashboardPageWithSidebar();
        });

        sidebarObserver.observe(sidebar);
    }

    /* Detect sidebar toggle and animation changes */
    document.addEventListener('click', function () {

        setTimeout(syncDashboardPageWithSidebar, 100);
        setTimeout(syncDashboardPageWithSidebar, 300);
    });

    /* Browser resize */
    window.addEventListener('resize', function () {
        syncDashboardPageWithSidebar();
    });

});
</script>


@endsection
