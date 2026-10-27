
@extends('layouts.website')

@section('content')
<style>
    .kp-enquiries {
        --kp-primary: #00068a;
        --kp-text: #20243a;
        --kp-muted: #72798b;
        --kp-border: #e8eaf1;
        background: #f6f7fb;
        min-height: 75vh;
        padding: 40px 0 60px;
    }

    .kp-enquiries .kp-container {
        width: min(1180px, calc(100% - 32px));
        margin: 0 auto;
    }

    .kp-enquiries .kp-heading {
        margin-bottom: 26px;
    }

    .kp-enquiries .kp-heading h1 {
        color: var(--kp-text);
        font-size: 28px;
        font-weight: 750;
        margin: 0 0 8px;
    }

    .kp-enquiries .kp-heading p {
        color: var(--kp-muted);
        margin: 0;
        font-size: 14px;
    }

    .kp-enquiries .kp-panel {
        background: #fff;
        border: 1px solid var(--kp-border);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 28px rgba(20, 30, 80, .04);
    }

    .kp-enquiries .kp-panel-header {
        padding: 22px 24px;
        border-bottom: 1px solid var(--kp-border);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .kp-enquiries .kp-panel-header h2 {
        color: var(--kp-text);
        font-size: 17px;
        font-weight: 700;
        margin: 0;
    }

    .kp-enquiries .kp-count {
        background: #eef0ff;
        color: var(--kp-primary);
        border-radius: 30px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 700;
    }

    .kp-enquiries .kp-table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .kp-enquiries table {
        width: 100%;
        border-collapse: collapse;
        min-width: 760px;
    }

    .kp-enquiries th {
        text-align: left;
        background: #fafbff;
        color: #747b91;
        padding: 15px 22px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .6px;
        font-weight: 700;
        white-space: nowrap;
    }

    .kp-enquiries td {
        padding: 19px 22px;
        border-top: 1px solid #f0f1f6;
        color: var(--kp-text);
        font-size: 13px;
        vertical-align: middle;
    }

    .kp-enquiries .kp-property {
        font-weight: 700;
        margin-bottom: 5px;
    }

    .kp-enquiries .kp-subtext {
        font-size: 12px;
        color: var(--kp-muted);
    }

    .kp-enquiries .kp-status {
        display: inline-block;
        border-radius: 20px;
        padding: 6px 10px;
        font-size: 11px;
        font-weight: 700;
        background: #fff4df;
        color: #986000;
        white-space: nowrap;
    }

    .kp-enquiries .kp-status.status-approved,
    .kp-enquiries .kp-status.status-completed {
        background: #e8f8ee;
        color: #167444;
    }

    .kp-enquiries .kp-status.status-rejected,
    .kp-enquiries .kp-status.status-cancelled {
        background: #fff0f0;
        color: #b42318;
    }

    .kp-enquiries .kp-status.status-contacted,
    .kp-enquiries .kp-status.status-in-progress {
        background: #eaf2ff;
        color: #2058a5;
    }

    .kp-enquiries .kp-empty {
        text-align: center;
        padding: 60px 20px;
    }

    .kp-enquiries .kp-empty-icon {
        width: 66px;
        height: 66px;
        border-radius: 20px;
        background: #eef0ff;
        color: var(--kp-primary);
        display: grid;
        place-items: center;
        margin: 0 auto 18px;
    }

    .kp-enquiries .kp-empty h3 {
        font-size: 18px;
        color: var(--kp-text);
        margin: 0 0 8px;
        font-weight: 750;
    }

    .kp-enquiries .kp-empty p {
        color: var(--kp-muted);
        font-size: 13px;
        margin: 0 0 22px;
    }

    .kp-enquiries .kp-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--kp-primary);
        color: #fff;
        border: 1px solid var(--kp-primary);
        border-radius: 9px;
        padding: 11px 17px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: .2s ease;
    }

    .kp-enquiries .kp-btn:hover {
        background: #00045f;
        color: #fff;
    }

    .kp-enquiries .kp-pagination {
        padding: 20px 24px;
        border-top: 1px solid var(--kp-border);
    }

    .kp-enquiries .kp-pagination nav p {
        margin-bottom: 0;
    }

    @media (max-width: 600px) {
        .kp-enquiries {
            padding: 26px 0 40px;
        }

        .kp-enquiries .kp-heading h1 {
            font-size: 23px;
        }

        .kp-enquiries .kp-panel-header {
            padding: 18px;
        }
    }
</style>

<div class="kp-enquiries">
    <div class="kp-container">

        <div class="kp-heading">
            <h1>My Enquiries</h1>
            <p>Track the property enquiries you have submitted.</p>
        </div>

        <div class="kp-panel">
            <div class="kp-panel-header">
                <h2>Property Enquiries</h2>
                <span class="kp-count">
                    {{ $enquiries->total() }} Total
                </span>
            </div>

            @if ($enquiries->count())
                <div class="kp-table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Enquiry ID</th>
                                <th>Move-in Date</th>
                                <th>Contact Method</th>
                                <th>Status</th>
                                <th>Submitted</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($enquiries as $enquiry)
                                @php
                                    $status = strtolower(
                                        str_replace(' ', '-', $enquiry->status ?? 'new')
                                    );
                                @endphp

                                <tr>
                                    <td>
                                        <div class="kp-property">
                                            {{ $enquiry->property_title ?: 'Property Enquiry' }}
                                        </div>
                                        <div class="kp-subtext">
                                            {{ $enquiry->property_type ?: 'Rental property' }}
                                        </div>
                                    </td>

                                    <td>#{{ $enquiry->id }}</td>

                                    <td>
                                        {{ $enquiry->move_in_date
                                            ? \Illuminate\Support\Carbon::parse($enquiry->move_in_date)->format('d M Y')
                                            : 'Not specified' }}
                                    </td>

                                    <td>
                                        {{ ucfirst($enquiry->preferred_contact ?? 'N/A') }}
                                    </td>

                                    <td>
                                        <span class="kp-status status-{{ $status }}">
                                            {{ ucwords(str_replace('-', ' ', $status)) }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $enquiry->created_at
                                            ? $enquiry->created_at->format('d M Y')
                                            : 'N/A' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="kp-pagination">
                    {{ $enquiries->links() }}
                </div>
            @else
                <div class="kp-empty">
                    <div class="kp-empty-icon">
                        <svg width="30" height="30" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="1.7" stroke-linecap="round">
                            <rect x="5" y="3" width="14" height="18" rx="2"></rect>
                            <path d="M9 8h6M9 12h6M9 16h4"></path>
                        </svg>
                    </div>

                    <h3>No enquiries yet</h3>
                    <p>Your property enquiries will appear here after you submit them.</p>

                    <a href="{{ url('/') }}" class="kp-btn">
                        Explore Properties
                    </a>
                </div>
            @endif
        </div>

    </div>
</div>
@endsection
