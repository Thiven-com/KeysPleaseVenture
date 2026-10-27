
@extends('layouts.website')

@section('content')
<style>
    .kp-visits {
        background: #f6f7fb;
        min-height: 75vh;
        padding: 40px 0 60px;
        color: #20243a;
    }

    .kp-visits .kp-container {
        width: min(1180px, calc(100% - 32px));
        margin: 0 auto;
    }

    .kp-visits .kp-heading {
        margin-bottom: 24px;
    }

    .kp-visits .kp-heading h1 {
        font-size: 28px;
        font-weight: 750;
        margin: 0 0 8px;
    }

    .kp-visits .kp-heading p {
        font-size: 14px;
        color: #72798b;
        margin: 0;
    }

    .kp-visits .kp-panel {
        background: #fff;
        border: 1px solid #e8eaf1;
        border-radius: 16px;
        overflow: hidden;
    }

    .kp-visits .kp-panel-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
        padding: 22px 24px;
        border-bottom: 1px solid #e8eaf1;
    }

    .kp-visits .kp-panel-head h2 {
        font-size: 17px;
        font-weight: 700;
        margin: 0;
    }

    .kp-visits .kp-count {
        background: #eef0ff;
        color: #00068a;
        border-radius: 20px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 700;
    }

    .kp-visits .kp-visit-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 18px;
        padding: 22px 24px;
        border-bottom: 1px solid #f0f1f6;
    }

    .kp-visits .kp-visit-item:last-child {
        border-bottom: none;
    }

    .kp-visits .kp-property-title {
        font-size: 15px;
        font-weight: 700;
        margin: 0 0 8px;
    }

    .kp-visits .kp-meta {
        color: #72798b;
        font-size: 12px;
        margin: 5px 0;
    }

    .kp-visits .kp-status {
        display: inline-block;
        background: #fff4df;
        color: #986000;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .kp-visits .status-confirmed,
    .kp-visits .status-approved,
    .kp-visits .status-completed {
        background: #e8f8ee;
        color: #167444;
    }

    .kp-visits .status-cancelled,
    .kp-visits .status-rejected {
        background: #fff0f0;
        color: #b42318;
    }

    .kp-visits .kp-empty {
        text-align: center;
        padding: 55px 20px;
    }

    .kp-visits .kp-empty h3 {
        font-size: 18px;
        margin: 0 0 8px;
    }

    .kp-visits .kp-empty p {
        color: #72798b;
        font-size: 13px;
        margin: 0 0 20px;
    }

    .kp-visits .kp-btn {
        display: inline-block;
        background: #00068a;
        color: #fff;
        padding: 11px 17px;
        border-radius: 9px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
    }

    .kp-visits .kp-pagination {
        padding: 20px 24px;
        border-top: 1px solid #e8eaf1;
    }

    @media (max-width: 600px) {
        .kp-visits {
            padding: 26px 0 40px;
        }

        .kp-visits .kp-heading h1 {
            font-size: 23px;
        }

        .kp-visits .kp-visit-item {
            align-items: flex-start;
            flex-direction: column;
            padding: 18px;
        }
    }
</style>

<div class="kp-visits">
    <div class="kp-container">

        <div class="kp-heading">
            <h1>My Site Visits</h1>
            <p>Manage your scheduled property visits and view their status.</p>
        </div>

        <div class="kp-panel">
            <div class="kp-panel-head">
                <h2>Your Property Visits</h2>
                <span class="kp-count">
                    {{ $siteVisits->total() }} Total
                </span>
            </div>

            @forelse($siteVisits as $visit)
                @php
                    $status = strtolower(
                        str_replace(' ', '-', $visit->status ?? 'new')
                    );
                @endphp

                <div class="kp-visit-item">
                    <div>
                        <h3 class="kp-property-title">
                            {{ $visit->property_title ?: 'Property Visit' }}
                        </h3>

                        <p class="kp-meta">
                            Booking #{{ $visit->id }}
                            · {{ $visit->property_type ?: 'Rental property' }}
                        </p>

                        <p class="kp-meta">
                            <strong>Visit date:</strong>
                            {{ \Illuminate\Support\Carbon::parse($visit->visit_date)->format('d M Y') }}
                        </p>

                        <p class="kp-meta">
                            <strong>Time:</strong>
                            {{ \Illuminate\Support\Carbon::parse($visit->visit_time)->format('h:i A') }}
                        </p>

                        @if($visit->monthly_rent)
                            <p class="kp-meta">
                                <strong>Monthly rent:</strong>
                                {{ $visit->monthly_rent }}
                            </p>
                        @endif
                    </div>

                    <div>
                        <span class="kp-status status-{{ $status }}">
                            {{ ucwords(str_replace('-', ' ', $status)) }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="kp-empty">
                    <h3>No site visits scheduled yet</h3>
                    <p>Your property visit bookings will appear here.</p>

                    <a href="{{ route('home') }}" class="kp-btn">
                        Browse Properties →
                    </a>
                </div>
            @endforelse

            @if($siteVisits->hasPages())
                <div class="kp-pagination">
                    {{ $siteVisits->links() }}
                </div>
            @endif
        </div>

    </div>
</div>
@endsection
