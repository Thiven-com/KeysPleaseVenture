
@extends('layouts.website')

@section('title', 'Rental Safety Tips')

@section('content')

<style>
    .safety-page {
        color: #252943;
        background: #fff;
    }

    .safety-hero {
        padding: 70px 20px;
        text-align: center;
        background: linear-gradient(135deg, #f1f3ff, #fff);
    }

    .safety-label {
        color: #494bc5;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 2px;
    }

    .safety-hero h1 {
        margin: 15px 0;
        font-size: clamp(30px, 5vw, 46px);
        font-weight: 800;
    }

    .safety-hero p {
        max-width: 680px;
        margin: auto;
        color: #697087;
        line-height: 1.8;
    }

    .safety-container {
        width: min(1100px, 100%);
        margin: auto;
        padding: 55px 20px;
    }

    .safety-heading {
        margin-bottom: 12px;
        text-align: center;
        font-size: 30px;
        font-weight: 800;
    }

    .safety-description {
        max-width: 650px;
        margin: 0 auto 35px;
        color: #697087;
        text-align: center;
        line-height: 1.8;
    }

    .safety-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }

    .safety-card {
        padding: 26px;
        border: 1px solid #e6e8f0;
        border-radius: 15px;
        background: #fff;
        transition: .2s;
    }

    .safety-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 28px rgba(30, 40, 90, .07);
    }

    .safety-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 52px;
        height: 52px;
        margin-bottom: 20px;
        border-radius: 14px;
        background: #eef0ff;
        color: #494bc5;
        font-size: 24px;
    }

    .safety-card h3 {
        margin-bottom: 12px;
        font-size: 18px;
        font-weight: 750;
    }

    .safety-card p {
        margin: 0;
        color: #697087;
        font-size: 14px;
        line-height: 1.8;
    }

    .safety-warning {
        padding: 28px;
        border: 1px solid #f1d9b0;
        border-radius: 14px;
        background: #fff8eb;
    }

    .safety-warning h2 {
        margin-bottom: 15px;
        color: #85551a;
        font-size: 23px;
        font-weight: 800;
    }

    .safety-warning ul {
        margin: 0;
        padding-left: 22px;
        color: #6d5a40;
    }

    .safety-warning li {
        margin-bottom: 10px;
        line-height: 1.8;
    }

    .safety-checklist {
        background: #f7f8fc;
    }

    .safety-checklist-inner {
        max-width: 800px;
        margin: auto;
    }

    .safety-check-item {
        display: flex;
        gap: 13px;
        align-items: flex-start;
        margin-bottom: 14px;
        padding: 19px;
        border: 1px solid #e6e8f0;
        border-radius: 12px;
        background: #fff;
    }

    .safety-check {
        color: #494bc5;
        font-size: 20px;
        font-weight: 800;
    }

    .safety-check-item h3 {
        margin: 0 0 6px;
        font-size: 16px;
        font-weight: 750;
    }

    .safety-check-item p {
        margin: 0;
        color: #697087;
        font-size: 14px;
        line-height: 1.7;
    }

    .safety-cta {
        margin: 0 20px 60px;
        padding: 42px 22px;
        text-align: center;
        color: #fff;
        background: #252d72;
        border-radius: 18px;
    }

    .safety-cta h2 {
        margin-bottom: 12px;
        font-size: 28px;
        font-weight: 800;
    }

    .safety-cta p {
        max-width: 600px;
        margin: 0 auto 24px;
        color: #e1e4ff;
        line-height: 1.8;
    }

    .safety-cta a {
        display: inline-block;
        padding: 13px 24px;
        color: #252d72;
        background: #fff;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 750;
    }

    @media (max-width: 768px) {
        .safety-hero {
            padding: 48px 18px;
        }

        .safety-container {
            padding: 40px 18px;
        }

        .safety-grid {
            grid-template-columns: 1fr;
        }

        .safety-heading {
            font-size: 26px;
        }

        .safety-warning {
            padding: 22px;
        }

        .safety-cta {
            margin-bottom: 40px;
        }
    }
</style>

<div class="safety-page">

    {{-- Hero Section --}}
    <section class="safety-hero">
        <div class="safety-label">YOUR SAFETY MATTERS</div>

        <h1>Stay Safe While Renting</h1>

        <p>
            Make informed rental decisions by verifying property
            details, protecting your payments and understanding
            your rental agreement before committing.
        </p>
    </section>

    {{-- Safety Cards --}}
    <section class="safety-container">
        <h2 class="safety-heading">Essential Safety Tips</h2>

        <p class="safety-description">
            Follow these practical precautions throughout your
            property search and rental journey.
        </p>

        <div class="safety-grid">

            <article class="safety-card">
                <div class="safety-icon">⌂</div>
                <h3>Verify the Property</h3>
                <p>
                    Visit the property in person and verify the
                    address, ownership or the representative's
                    authority before proceeding.
                </p>
            </article>

            <article class="safety-card">
                <div class="safety-icon">₹</div>
                <h3>Protect Your Payments</h3>
                <p>
                    Confirm the recipient and agreed payment terms.
                    Use traceable payment methods and keep receipts
                    for rent and deposits.
                </p>
            </article>

            <article class="safety-card">
                <div class="safety-icon">▤</div>
                <h3>Read the Agreement</h3>
                <p>
                    Check rent, deposit, notice period, maintenance
                    charges and refund conditions before signing.
                </p>
            </article>

            <article class="safety-card">
                <div class="safety-icon">◎</div>
                <h3>Meet Safely</h3>
                <p>
                    Arrange visits at a suitable time, tell someone
                    where you are going and consider taking a
                    trusted person with you.
                </p>
            </article>

            <article class="safety-card">
                <div class="safety-icon">⌕</div>
                <h3>Check Property Details</h3>
                <p>
                    Inspect locks, electrical fittings, water supply,
                    access arrangements and visible damage.
                </p>
            </article>

            <article class="safety-card">
                <div class="safety-icon">✓</div>
                <h3>Keep Written Records</h3>
                <p>
                    Save the signed agreement, receipts, property
                    inspection records and important communications.
                </p>
            </article>

        </div>
    </section>

    {{-- Warning Section --}}
    <section class="safety-container">
        <div class="safety-warning">
            <h2>⚠ Watch Out for Rental Scams</h2>

            <ul>
                <li>
                    Be cautious if someone demands immediate payment
                    before allowing reasonable verification.
                </li>
                <li>
                    Never share OTPs, passwords or banking PINs
                    with property owners or brokers.
                </li>
                <li>
                    Verify unusual payment requests independently
                    before transferring money.
                </li>
                <li>
                    Be careful with offers that seem unusually cheap
                    or involve pressure to skip a property visit.
                </li>
                <li>
                    Do not rely only on property photographs or
                    identity documents sent through messages.
                </li>
            </ul>
        </div>
    </section>

    {{-- Move-in Checklist --}}
    <section class="safety-checklist">
        <div class="safety-container safety-checklist-inner">

            <h2 class="safety-heading">Before You Move In</h2>

            <p class="safety-description">
                Complete these checks before taking possession
                of your new rental property.
            </p>

            <div class="safety-check-item">
                <div class="safety-check">✓</div>
                <div>
                    <h3>Confirm the Rental Agreement</h3>
                    <p>
                        Make sure both parties have the agreed
                        rental terms in writing.
                    </p>
                </div>
            </div>

            <div class="safety-check-item">
                <div class="safety-check">✓</div>
                <div>
                    <h3>Document Existing Damage</h3>
                    <p>
                        Take dated photographs of existing damage
                        and keep a copy for your records.
                    </p>
                </div>
            </div>

            <div class="safety-check-item">
                <div class="safety-check">✓</div>
                <div>
                    <h3>Record Payments and Meter Readings</h3>
                    <p>
                        Keep deposit and rent receipts and record
                        applicable utility meter readings.
                    </p>
                </div>
            </div>

            <div class="safety-check-item">
                <div class="safety-check">✓</div>
                <div>
                    <h3>Check Access and Security</h3>
                    <p>
                        Confirm how keys, locks, entry access
                        and emergency contacts are managed.
                    </p>
                </div>
            </div>

        </div>
    </section>

    {{-- Contact Section --}}
    <section class="safety-cta">
        <h2>Need Help With a Property?</h2>

        <p>
            If you have a concern about a property listed on our
            website, contact our team for assistance.
        </p>

        <a href="{{ route('contact') }}">
            Contact Support &rarr;
        </a>
    </section>

</div>

@endsection
