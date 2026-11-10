@extends('layout.brokermainlayout')

@section('content')

<style>
    .reports-page {
        padding: 28px 30px 35px;
        margin-top: 50px;
        width: 100%;
        box-sizing: border-box;
    }

    .reports-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 24px;
    }

    .reports-title {
        color: #071b3d;
        font-size: 25px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .reports-subtitle {
        color: #687389;
        font-size: 13px;
        margin: 0;
    }

    .reports-count {
        padding: 12px 16px;
        border: 1px solid #e5eaf1;
        border-radius: 8px;
        background: #fff;
        color: #071b3d;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .reports-card {
        background: #fff;
        border: 1px solid #e5eaf1;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(7,27,61,.04);
    }

    .reports-table-scroll {
        width: 100%;
        overflow-x: auto;
    }

    .reports-table {
        width: 100%;
        min-width: 1100px;
        border-collapse: collapse;
    }

    .reports-table th {
        padding: 16px 14px;
        background: #f3f6fa;
        color: #071b3d;
        font-size: 11px;
        text-transform: uppercase;
        text-align: left;
        white-space: nowrap;
        border-bottom: 1px solid #e0e6ee;
    }

    .reports-table td {
        padding: 15px 14px;
        color: #4f5d72;
        font-size: 12px;
        border-bottom: 1px solid #edf0f4;
        vertical-align: middle;
    }

    .reports-table tr:last-child td {
        border-bottom: 0;
    }

    .report-property {
        color: #071b3d;
        font-weight: 700;
    }

    .report-owner {
        color: #071b3d;
        font-weight: 600;
    }

    .report-contact {
        color: #4f5d72;
        white-space: nowrap;
    }

    .report-reason {
        display: inline-block;
        padding: 6px 9px;
        background: #fff5e8;
        color: #a65c12;
        border-radius: 6px;
        font-size: 10px;
        font-weight: 700;
    }

    .report-status {
        display: inline-block;
        padding: 6px 10px;
        background: #f3f6fa;
        color: #4f5d72;
        border-radius: 6px;
        font-size: 10px;
        font-weight: 700;
        text-transform: capitalize;
    }

    .report-message {
        max-width: 220px;
        overflow-wrap: anywhere;
    }

    .report-date {
        white-space: nowrap;
        color: #687389;
    }

    .reports-empty {
        padding: 55px 15px !important;
        text-align: center;
        color: #8a94a6 !important;
    }

    .reports-pagination {
        padding: 18px;
        border-top: 1px solid #edf0f4;
    }

    @media(max-width: 576px) {
        .reports-page {
            padding: 16px 10px 25px;
        }

        .reports-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .reports-title {
            font-size: 20px;
        }
    }
</style>

<div class="reports-page">

    <div class="reports-header">
        <div>
            <h3 class="reports-title">Property Reports</h3>
            <p class="reports-subtitle">
                View reports submitted for your properties.
            </p>
        </div>

        <div class="reports-count">
            <i class="ti ti-flag me-2"></i>
            {{ $reportsCount }} Reports
        </div>
    </div>

    <div class="reports-card">

        <div class="reports-table-scroll">
            <table class="reports-table">

                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Property</th>
                        <!-- <th>Owner Name</th>
                        <th>Owner Contact</th> -->
                        <th>Reason</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Reported Date</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($reports as $report)

                        <tr>
                            <td>
                                {{ $reports->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <div class="report-property">
                                    {{ $report->propertyDetails?->property_title ?? $report->property ?? 'N/A' }}
                                </div>
                            </td>

                            <!-- <td>
                                <span class="report-owner">
                                    {{ $report->propertyDetails?->owner_name ?? 'N/A' }}
                                </span>
                            </td>

                            <td>
                                <span class="report-contact">
                                    {{ $report->propertyDetails?->owner_phone ?? 'N/A' }}
                                </span>
                            </td> -->

                            <td>
                                <span class="report-reason">
                                    {{ \Illuminate\Support\Str::headline($report->reason ?? 'Other') }}
                                </span>
                            </td>

                            <td>
                                <div class="report-message">
                                    {{ $report->message ?: '—' }}
                                </div>
                            </td>

                            <td>
                                <span class="report-status">
                                    {{ $report->status ?: 'New' }}
                                </span>
                            </td>

                            <td>
                                <span class="report-date">
                                    {{ $report->created_at?->format('d M Y') ?? '—' }}
                                </span>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="reports-empty">
                                <i class="ti ti-flag fs-2"></i>

                                <h5 class="mt-2">No Property Reports Found</h5>

                                <p class="mb-0">
                                    Reports submitted for your properties
                                    will appear here.
                                </p>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

        @if($reports->total() > 0)

            <div class="reports-pagination d-flex flex-wrap
                        justify-content-between align-items-center gap-3">

                <small class="text-muted">
                    Showing {{ $reports->firstItem() ?? 0 }}
                    to {{ $reports->lastItem() ?? 0 }}
                    of {{ $reports->total() }} reports
                </small>

                <div>
                    {{ $reports->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>

            </div>

        @endif

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const sidebar = document.getElementById('sidebar');
        const page = document.querySelector('.reports-page');

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