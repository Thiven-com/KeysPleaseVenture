@extends('layout.brokermainlayout')

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

        .customer-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 0 16px;
            border: 1px solid #e5eaf1;
            border-radius: 8px;
            background: #fff;
            color: #071b3d;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .properties-card {
            width: 100%;
            max-width: 100%;
            min-width: 0;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: #fff;
            border: 1px solid #e5eaf1;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(7, 27, 61, .04),
                0 12px 35px rgba(7, 27, 61, .04);
        }

        .customer-toolbar {
            padding: 18px;
            border-bottom: 1px solid #edf0f4;
        }

        .customer-toolbar .form-control {
            min-height: 40px;
            border: 1px solid #e0e6ee;
            border-radius: 8px;
            font-size: 12px;
            box-shadow: none;
        }

        .customer-toolbar .form-control:focus {
            border-color: #071b3d;
        }

        .customer-search-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-height: 40px;
            padding: 0 16px;
            background: #071b3d;
            color: #fff !important;
            border: 1px solid #071b3d;
            border-radius: 8px;
            text-decoration: none;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
            cursor: pointer;
        }

        .customer-search-btn:hover {
            background: #0d2c60;
            color: #fff !important;
        }

        .customer-reset-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-height: 40px;
            padding: 0 15px;
            background: #fff;
            color: #687389 !important;
            border: 1px solid #e0e6ee;
            border-radius: 8px;
            text-decoration: none;
            font-size: 11px;
            font-weight: 700;
        }

        .customer-table-scroll {
            width: 100%;
            max-width: 100%;
            min-width: 0;
            overflow-x: auto;
            overflow-y: auto;
            max-height: calc(100vh - 210px);
            scrollbar-width: thin;
            -webkit-overflow-scrolling: touch;
        }

        .customer-table {
            width: 100%;
            min-width: 1250px;
            margin: 0;
            border: 0;
            border-collapse: separate;
            border-spacing: 0;
            table-layout: fixed;
            background: #fff;
        }

        .customer-table thead th {
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

        .customer-table tbody tr {
            background: #fff;
            transition: background-color .2s ease;
        }

        .customer-table tbody tr:hover,
        .customer-table tbody tr:hover td {
            background: #fafbfd;
        }

        .customer-table tbody td {
            min-height: 72px;
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

        .customer-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .customer-table th:nth-child(1),
        .customer-table td:nth-child(1) {
            width: 65px;
            text-align: center;
        }

        .customer-table th:nth-child(2),
        .customer-table td:nth-child(2) {
            width: 190px;
        }

        .customer-table th:nth-child(3),
        .customer-table td:nth-child(3) {
            width: 145px;
        }

        .customer-table th:nth-child(4),
        .customer-table td:nth-child(4) {
            width: 220px;
        }

        .customer-table th:nth-child(5),
        .customer-table td:nth-child(5) {
            width: 135px;
        }

        .customer-table th:nth-child(6),
        .customer-table td:nth-child(6) {
            width: 125px;
        }

        .customer-table th:nth-child(7),
        .customer-table td:nth-child(7) {
            width: 140px;
        }

        .customer-table th:nth-child(8),
        .customer-table td:nth-child(8) {
            width: 115px;
        }

        .customer-table th:nth-child(9),
        .customer-table td:nth-child(9) {
            width: 220px;
        }

        .customer-number {
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

        .customer-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .customer-avatar {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #eef0ff;
            color: #071b3d;
            font-size: 14px;
            font-weight: 700;
        }

        .customer-info {
            min-width: 0;
        }

        .customer-name {
            color: #071b3d !important;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.35;
            overflow-wrap: anywhere;
        }

        .customer-type {
            margin-top: 3px;
            color: #8a94a6;
            font-size: 10px;
            line-height: 1.4;
        }

        .customer-email {
            color: #687389;
            font-size: 11px;
            overflow-wrap: anywhere;
        }

        .customer-mobile {
            color: #4f5d72;
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .customer-date {
            color: #687389;
            font-size: 11px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 6px;
            background: #f3f6fa;
            color: #4f5d72;
            font-size: 10px;
            font-weight: 700;
            text-transform: capitalize;
        }

        .customer-empty {
            height: 180px;
            text-align: center !important;
            vertical-align: middle !important;
            color: #8a94a6 !important;
        }

        .customer-empty-icon {
            font-size: 35px;
            color: #8a94a6;
        }

        .customer-empty-title {
            margin: 10px 0 6px;
            color: #687389;
            font-size: 14px;
            font-weight: 600;
        }

        .customer-empty-text {
            margin: 0 0 12px;
            color: #8a94a6;
            font-size: 11px;
        }

        .customer-pagination {
            padding: 18px;
            border-top: 1px solid #edf0f4;
        }

        .customer-pagination .pagination {
            margin-bottom: 0;
        }

        .customer-pagination .page-link {
            color: #071b3d;
            border-color: #e0e6ee;
            font-size: 12px;
        }

        .customer-pagination .page-item.active .page-link {
            background: #071b3d;
            border-color: #071b3d;
            color: #fff;
        }

        @media (max-width: 991px) {
            .properties-main {
                padding: 20px 15px 30px;
            }

            .customer-table-scroll {
                max-height: calc(100vh - 180px);
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
            }

            .customer-count {
                min-height: 36px;
            }
        }
    </style>

    <div class="properties-page">
        <div class="properties-main">

            {{-- PAGE HEADER --}}
            <div class="properties-header">
                <div>
                    <h3 class="properties-title">Scheduled Visits</h3>
                    <p class="properties-subtitle">
                        View and manage visit requests received for your properties.
                    </p>
                </div>

                <div class="customer-count">
                    <i class="ti ti-calendar-event me-2"></i>
                    {{ $scheduledVisitsCount }} Scheduled Visits
                </div>
            </div>

            {{-- SCHEDULED VISITS TABLE CARD --}}
            <div class="properties-card">

                {{-- SEARCH --}}
                <div class="customer-toolbar">
                    <form method="GET" action="{{ route('broker.schedule') }}">
                        <div class="row g-2 align-items-center">
                            <div class="col-lg-5 col-md-6">
                                <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                                    placeholder="Search by customer, phone or property..."
                                    aria-label="Search scheduled visits">
                            </div>

                            <div class="col-auto">
                                <button type="submit" class="customer-search-btn">
                                    <i class="ti ti-search"></i>
                                    Search
                                </button>
                            </div>

                            @if(request()->filled('search'))
                                <div class="col-auto">
                                    <a href="{{ route('broker.schedule') }}" class="customer-reset-btn">
                                        <i class="ti ti-refresh"></i>
                                        Reset
                                    </a>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>

                {{-- TABLE --}}
                <div class="customer-table-scroll">
                    <table class="customer-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Property</th>
                                <th>Visit Date</th>
                                <th>Visit Time</th>
                                <th>Monthly Rent</th>
                                <th>Status</th>
                                <th>Message</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($scheduledVisits as $visit)
                                                <tr>
                                                    <td>
                                                        <span class="customer-number">
                                                            {{ $scheduledVisits->firstItem() + $loop->index }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <div class="customer-wrapper">
                                                            <div class="customer-avatar">
                                                                {{ strtoupper(substr($visit->name ?: 'C', 0, 1)) }}
                                                            </div>

                                                            <div class="customer-info">
                                                                <div class="customer-name">
                                                                    {{ $visit->name ?: 'Unnamed Customer' }}
                                                                </div>

                                                                <div class="customer-type">
                                                                    Property Visit Request
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <span class="customer-mobile">
                                                            {{ $visit->phone ?: '—' }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <div class="customer-name">
                                                            {{ $visit->property_title
                                ?? optional($visit->property)->title
                                ?? 'Property #' . $visit->property_id }}
                                                        </div>

                                                        <div class="customer-type">
                                                            {{ $visit->property_type ?? 'Property' }}
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <span class="customer-date">
                                                            {{ $visit->visit_date
                                ? $visit->visit_date->format('d M Y')
                                : '—' }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <span class="customer-date">
                                                            {{ $visit->visit_time ?? '—' }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <span class="customer-mobile">
                                                            @if (!empty($visit->monthly_rent))
                                                                {{ $visit->monthly_rent }}
                                                            @elseif ($visit->property && $visit->property->price !== null)
                                                                ₹{{ number_format((float) $visit->property->price, 0) }}
                                                            @else
                                                                —
                                                            @endif
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <span class="status-badge">
                                                            {{ $visit->status ?: 'Pending' }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <span class="customer-email">
                                                            {{ \Illuminate\Support\Str::limit($visit->message, 70) ?: '—' }}
                                                        </span>
                                                    </td>
                                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="customer-empty">
                                        <i class="ti ti-calendar-event customer-empty-icon"></i>

                                        <div class="customer-empty-title">
                                            No Scheduled Visits Found
                                        </div>

                                        <p class="customer-empty-text">
                                            @if(request()->filled('search'))
                                                No scheduled visits match your search.
                                            @else
                                                Customer visit requests for your properties will appear here.
                                            @endif
                                        </p>

                                        @if(request()->filled('search'))
                                            <a href="{{ route('broker.schedule') }}" class="customer-search-btn">
                                                Clear Search
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- PAGINATION --}}
                @if($scheduledVisits->hasPages() || $scheduledVisits->total() > 0)
                    <div class="customer-pagination d-flex flex-wrap
                                    justify-content-between align-items-center gap-3">

                        <small class="text-muted">
                            Showing {{ $scheduledVisits->firstItem() ?? 0 }}
                            to {{ $scheduledVisits->lastItem() ?? 0 }}
                            of {{ $scheduledVisits->total() }} scheduled visits
                        </small>

                        <div>
                            {{ $scheduledVisits->appends(request()->query())->links() }}
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const page = document.querySelector('.properties-page');

            if (!sidebar || !page) {
                return;
            }

            function syncPageWithSidebar() {
                if (window.innerWidth <= 991) {
                    page.style.marginLeft = '0px';
                    page.style.width = '100%';
                    return;
                }

                const sidebarWidth = Math.round(
                    sidebar.getBoundingClientRect().width
                );

                page.style.marginLeft = sidebarWidth + 'px';
                page.style.width = 'calc(100% - ' + sidebarWidth + 'px)';
            }

            syncPageWithSidebar();

            if (typeof ResizeObserver !== 'undefined') {
                const observer = new ResizeObserver(function () {
                    syncPageWithSidebar();
                });

                observer.observe(sidebar);
            }

            document.addEventListener('click', function () {
                setTimeout(syncPageWithSidebar, 100);
                setTimeout(syncPageWithSidebar, 300);
            });

            window.addEventListener('resize', syncPageWithSidebar);
        });
    </script>

@endsection