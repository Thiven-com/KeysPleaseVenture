<?php $page = 'index'; ?>

@extends('layout.brokermainlayout')

@section('content')

<style>
    /* =========================================
       BROKER DASHBOARD
    ========================================= */

    .broker-dashboard {
        margin-left: 250px;
        padding: 110px 25px 40px;
        background: #f5f7fb;
        min-height: 100vh;
        box-sizing: border-box;
    }

    .broker-dashboard-container {
        max-width: 1500px;
        margin: 0 auto;
    }

    /* =========================================
       PAGE HEADER
    ========================================= */

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

    /* =========================================
       STATISTICS
    ========================================= */

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
        position: relative;
        overflow: hidden;
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

    .broker-stat-icon.purple {
        background: #f2ebff;
        color: #7950f2;
    }

    .broker-stat-footer {
        margin-top: 18px;
        color: #89919e;
        font-size: 12px;
    }

    /* =========================================
       MAIN GRID
    ========================================= */

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

    /* =========================================
       RECENT PROPERTIES
    ========================================= */

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

    /* =========================================
       STATUS
    ========================================= */

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

    /* =========================================
       QUICK ACTIONS
    ========================================= */

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

    /* =========================================
       ENQUIRIES
    ========================================= */

    .broker-enquiry-table-wrapper {
        overflow-x: auto;
    }

    .broker-enquiry-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 650px;
    }

    .broker-enquiry-table th {
        background: #f8fafc;
        color: #7b8492;
        font-size: 11px;
        font-weight: 700;
        text-align: left;
        padding: 13px 20px;
        text-transform: uppercase;
        letter-spacing: .3px;
    }

    .broker-enquiry-table td {
        padding: 15px 20px;
        border-top: 1px solid #edf0f5;
        color: #344054;
        font-size: 13px;
        vertical-align: middle;
    }

    .broker-customer {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .broker-customer-avatar {
        width: 34px;
        height: 34px;
        min-width: 34px;
        border-radius: 50%;
        background: #eaf2ff;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 700;
    }

    .broker-customer-name {
        font-weight: 600;
        color: #172033;
    }

    .broker-customer-email {
        margin-top: 2px;
        color: #8a929f;
        font-size: 11px;
    }

    /* =========================================
       EMPTY / DEMO ROW
    ========================================= */

    .broker-demo-note {
        padding: 30px 20px;
        text-align: center;
        color: #929aa7;
        font-size: 13px;
    }

    /* =========================================
       RESPONSIVE
    ========================================= */

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
            margin-left: 0;
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
                    {{ auth('broker')->user()->name ?? 'Broker' }}.
                    Here's what's happening with your properties.
                </p>
            </div>

            <a href="{{ route('broker.properties.create') }}"
               class="broker-add-property-btn">
                <i class="fas fa-plus"></i>
                Add Property
            </a>

        </div>


        {{-- STATISTICS --}}
        <div class="broker-stat-grid">

            {{-- Total Properties --}}
            <div class="broker-stat-card">

                <div class="broker-stat-top">

                    <div>
                        <div class="broker-stat-title">
                            Total Properties
                        </div>

                        <div class="broker-stat-value">
                            18
                        </div>
                    </div>

                    <div class="broker-stat-icon blue">
                        <i class="fas fa-building"></i>
                    </div>

                </div>

                <div class="broker-stat-footer">
                    All listed properties
                </div>

            </div>


            {{-- Approved --}}
            <div class="broker-stat-card">

                <div class="broker-stat-top">

                    <div>
                        <div class="broker-stat-title">
                            Approved Properties
                        </div>

                        <div class="broker-stat-value">
                            12
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


            {{-- Pending --}}
            <div class="broker-stat-card">

                <div class="broker-stat-top">

                    <div>
                        <div class="broker-stat-title">
                            Pending Properties
                        </div>

                        <div class="broker-stat-value">
                            4
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


            {{-- Enquiries --}}
            <div class="broker-stat-card">

                <div class="broker-stat-top">

                    <div>
                        <div class="broker-stat-title">
                            Total Enquiries
                        </div>

                        <div class="broker-stat-value">
                            48
                        </div>
                    </div>

                    <div class="broker-stat-icon purple">
                        <i class="fas fa-envelope"></i>
                    </div>

                </div>

                <div class="broker-stat-footer">
                    Customer enquiries
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
                            Recently added properties
                        </p>
                    </div>

                    <a href="{{ route('broker.properties') }}"
                       class="broker-view-all">
                        View All
                    </a>

                </div>


                <div class="broker-property-list">

                    {{-- Property 1 --}}
                    <div class="broker-property-item">

                        <div class="broker-property-image">
                            <img src="{{ asset('website/images/no-image.jpg') }}"
                                 alt="Property">
                        </div>

                        <div class="broker-property-info">

                            <p class="broker-property-name">
                                Spacious 3 BHK Villa
                            </p>

                            <div class="broker-property-location">
                                <i class="fas fa-location-dot"></i>
                                Koramangala, Bengaluru
                            </div>

                        </div>

                        <div>
                            <span class="broker-status approved">
                                Approved
                            </span>
                        </div>

                        <div class="broker-property-price">
                            ₹45,000
                        </div>

                    </div>


                    {{-- Property 2 --}}
                    <div class="broker-property-item">

                        <div class="broker-property-image">
                            <img src="{{ asset('website/images/no-image.jpg') }}"
                                 alt="Property">
                        </div>

                        <div class="broker-property-info">

                            <p class="broker-property-name">
                                Modern 2 BHK Apartment
                            </p>

                            <div class="broker-property-location">
                                <i class="fas fa-location-dot"></i>
                                HSR Layout, Bengaluru
                            </div>

                        </div>

                        <div>
                            <span class="broker-status pending">
                                Pending
                            </span>
                        </div>

                        <div class="broker-property-price">
                            ₹28,000
                        </div>

                    </div>


                    {{-- Property 3 --}}
                    <div class="broker-property-item">

                        <div class="broker-property-image">
                            <img src="{{ asset('website/images/no-image.jpg') }}"
                                 alt="Property">
                        </div>

                        <div class="broker-property-info">

                            <p class="broker-property-name">
                                Premium 4 BHK House
                            </p>

                            <div class="broker-property-location">
                                <i class="fas fa-location-dot"></i>
                                Indiranagar, Bengaluru
                            </div>

                        </div>

                        <div>
                            <span class="broker-status approved">
                                Approved
                            </span>
                        </div>

                        <div class="broker-property-price">
                            ₹65,000
                        </div>

                    </div>

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

                    <a href="{{ route('broker.properties.create') }}"
                       class="broker-action">

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


                    <a href="{{ route('broker.properties') }}"
                       class="broker-action">

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


                    <a href="{{ route('broker.enquiries') }}"
                       class="broker-action">

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

                    </a>


                    <a href="{{ route('broker.schedule') }}"
                       class="broker-action">

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

                    </a>

                </div>

            </div>

        </div>


        {{-- RECENT ENQUIRIES --}}
        <div class="broker-dashboard-card">

            <div class="broker-dashboard-card-header">

                <div>
                    <h3 class="broker-dashboard-card-title">
                        Recent Enquiries
                    </h3>

                    <p class="broker-dashboard-card-subtitle">
                        Latest customer enquiries
                    </p>
                </div>

                <a href="{{ route('broker.enquiries') }}"
                   class="broker-view-all">
                    View All
                </a>

            </div>


            <div class="broker-enquiry-table-wrapper">

                <table class="broker-enquiry-table">

                    <thead>

                        <tr>
                            <th>Customer</th>
                            <th>Property</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>

                                <div class="broker-customer">

                                    <div class="broker-customer-avatar">
                                        AK
                                    </div>

                                    <div>
                                        <div class="broker-customer-name">
                                            Arun Kumar
                                        </div>

                                        <div class="broker-customer-email">
                                            arun@example.com
                                        </div>
                                    </div>

                                </div>

                            </td>

                            <td>
                                Spacious 3 BHK Villa
                            </td>

                            <td>
                                02 Oct 2026
                            </td>

                            <td>
                                <span class="broker-status approved">
                                    New
                                </span>
                            </td>

                        </tr>


                        <tr>

                            <td>

                                <div class="broker-customer">

                                    <div class="broker-customer-avatar">
                                        PS
                                    </div>

                                    <div>
                                        <div class="broker-customer-name">
                                            Priya Sharma
                                        </div>

                                        <div class="broker-customer-email">
                                            priya@example.com
                                        </div>
                                    </div>

                                </div>

                            </td>

                            <td>
                                Modern 2 BHK Apartment
                            </td>

                            <td>
                                01 Oct 2026
                            </td>

                            <td>
                                <span class="broker-status pending">
                                    Pending
                                </span>
                            </td>

                        </tr>


                        <tr>

                            <td>

                                <div class="broker-customer">

                                    <div class="broker-customer-avatar">
                                        RM
                                    </div>

                                    <div>
                                        <div class="broker-customer-name">
                                            Rahul Mehta
                                        </div>

                                        <div class="broker-customer-email">
                                            rahul@example.com
                                        </div>
                                    </div>

                                </div>

                            </td>

                            <td>
                                Premium 4 BHK House
                            </td>

                            <td>
                                30 Sep 2026
                            </td>

                            <td>
                                <span class="broker-status approved">
                                    New
                                </span>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection