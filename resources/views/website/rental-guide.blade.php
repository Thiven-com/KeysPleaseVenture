
@extends('layouts.website')

@section('title', 'Rental Guide | Find Your Rental Home')

@section('content')

<style>
    .rental-guide {
        color: #252943;
        background: #fff;
    }

    .rg-hero {
        padding: 70px 20px;
        text-align: center;
        background: linear-gradient(135deg, #f0f2ff, #fff);
    }

    .rg-label {
        color: #494bc5;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 2px;
    }

    .rg-hero h1 {
        margin: 15px 0;
        font-size: clamp(30px, 5vw, 46px);
        font-weight: 800;
    }

    .rg-hero p {
        max-width: 680px;
        margin: auto;
        color: #697087;
        line-height: 1.8;
    }

    .rg-container {
        width: min(1120px, 100%);
        margin: auto;
        padding: 55px 20px;
    }

    .rg-heading {
        margin-bottom: 12px;
        text-align: center;
        font-size: 30px;
        font-weight: 800;
    }

    .rg-description {
        max-width: 650px;
        margin: 0 auto 35px;
        color: #697087;
        text-align: center;
        line-height: 1.8;
    }

    .rg-steps {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }

    .rg-card {
        padding: 27px;
        border: 1px solid #e7e8f0;
        border-radius: 15px;
        background: #fff;
        transition: .2s;
    }

    .rg-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 28px rgba(30, 40, 90, .07);
    }

    .rg-number {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        margin-bottom: 20px;
        color: #494bc5;
        background: #eef0ff;
        border-radius: 13px;
        font-size: 19px;
        font-weight: 800;
    }

    .rg-card h3 {
        margin-bottom: 12px;
        font-size: 19px;
        font-weight: 750;
    }

    .rg-card p {
        margin: 0;
        color: #697087;
        font-size: 14px;
        line-height: 1.8;
    }

    .rg-documents {
        background: #f7f8fc;
    }

    .rg-document-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 15px;
        max-width: 850px;
        margin: auto;
    }

    .rg-document {
        display: flex;
        align-items: flex-start;
        gap: 13px;
        padding: 20px;
        border: 1px solid #e7e8f0;
        border-radius: 12px;
        background: #fff;
    }

    .rg-check {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 30px;
        height: 30px;
        color: #494bc5;
        background: #eef0ff;
        border-radius: 9px;
        font-weight: 800;
    }

    .rg-document h3 {
        margin: 2px 0 7px;
        font-size: 15px;
        font-weight: 750;
    }

    .rg-document p {
        margin: 0;
        color: #697087;
        font-size: 13px;
        line-height: 1.7;
    }

    .rg-tips {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .rg-tip {
        padding: 23px;
        border: 1px solid #e7e8f0;
        border-radius: 13px;
    }

    .rg-tip h3 {
        margin: 0 0 10px;
        font-size: 17px;
        font-weight: 750;
    }

    .rg-tip p {
        margin: 0;
        color: #697087;
        font-size: 14px;
        line-height: 1.8;
    }

    .rg-note {
        margin-top: 25px;
        padding: 20px;
        color: #555d75;
        background: #fff8e8;
        border: 1px solid #f4e4bd;
        border-radius: 12px;
        font-size: 14px;
        line-height: 1.8;
    }

    .rg-cta {
        margin: 0 20px 60px;
        padding: 45px 22px;
        text-align: center;
        color: #fff;
        background: #252d72;
        border-radius: 18px;
    }

    .rg-cta h2 {
        margin-bottom: 12px;
        font-size: 29px;
        font-weight: 800;
    }

    .rg-cta p {
        max-width: 600px;
        margin: 0 auto 24px;
        color: #e1e4ff;
        line-height: 1.8;
    }

    .rg-cta a {
        display: inline-block;
        padding: 13px 25px;
        color: #252d72;
        background: #fff;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 750;
    }

    .rg-cta a:hover {
        background: #eef0ff;
    }

    @media (max-width: 768px) {
        .rg-hero {
            padding: 48px 18px;
        }

        .rg-container {
            padding: 40px 18px;
        }

        .rg-steps {
            grid-template-columns: 1fr;
        }

        .rg-document-grid,
        .rg-tips {
            grid-template-columns: 1fr;
        }

        .rg-heading {
            font-size: 26px;
        }

        .rg-cta {
            margin-bottom: 40px;
        }
    }
</style>

<div class="rental-guide">

    {{-- Hero Section --}}
    <section class="rg-hero">
        <div class="rg-label">YOUR RENTAL COMPANION</div>

        <h1>Your Complete Rental Guide</h1>

        <p>
            From searching for a home to reviewing your rental
            agreement, learn the important steps to make your
            rental journey smoother and more informed.
        </p>
    </section>

    {{-- Rental Process --}}
    <section class="rg-container">
        <h2 class="rg-heading">How to Rent a Property</h2>

        <p class="rg-description">
            Follow these steps when choosing your next rental home.
        </p>

        <div class="rg-steps">

            <article class="rg-card">
                <div class="rg-number">01</div>
                <h3>Search Properties</h3>
                <p>
                    Explore available properties and compare their
                    location, rent, size, amenities and suitability
                    for your needs.
                </p>
            </article>

            <article class="rg-card">
                <div class="rg-number">02</div>
                <h3>Inspect the Property</h3>
                <p>
                    Arrange a visit and check the property's condition,
                    water supply, electricity, security and surroundings.
                </p>
            </article>

            <article class="rg-card">
                <div class="rg-number">03</div>
                <h3>Review the Agreement</h3>
                <p>
                    Confirm the rent, deposit, maintenance charges,
                    notice period and refund conditions before signing.
                </p>
            </article>

        </div>
    </section>

    {{-- Documents Checklist --}}
    <section class="rg-documents">
        <div class="rg-container">

            <h2 class="rg-heading">Rental Documents Checklist</h2>

            <p class="rg-description">
                Prepare the relevant documents and confirm the
                requirements with your landlord.
            </p>

            <div class="rg-document-grid">

                <div class="rg-document">
                    <div class="rg-check">✓</div>
                    <div>
                        <h3>Identity Proof</h3>
                        <p>
                            Keep an accepted identity document ready
                            as required by the landlord.
                        </p>
                    </div>
                </div>

                <div class="rg-document">
                    <div class="rg-check">✓</div>
                    <div>
                        <h3>Rental Agreement</h3>
                        <p>
                            Read the agreement and ensure both parties
                            understand the rental conditions.
                        </p>
                    </div>
                </div>

                <div class="rg-document">
                    <div class="rg-check">✓</div>
                    <div>
                        <h3>Payment Receipts</h3>
                        <p>
                            Keep records of rent, deposits and any
                            other payments you make.
                        </p>
                    </div>
                </div>

                <div class="rg-document">
                    <div class="rg-check">✓</div>
                    <div>
                        <h3>Move-in Records</h3>
                        <p>
                            Record the property's condition and
                            document existing damage before moving in.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Rental Tips --}}
    <section class="rg-container">

        <h2 class="rg-heading">Important Rental Tips</h2>

        <p class="rg-description">
            Keep these points in mind before finalising a property.
        </p>

        <div class="rg-tips">

            <article class="rg-tip">
                <h3>01. Set a Realistic Budget</h3>
                <p>
                    Consider monthly rent, deposit, maintenance,
                    utilities, transport and moving expenses.
                </p>
            </article>

            <article class="rg-tip">
                <h3>02. Verify Before Paying</h3>
                <p>
                    Verify the property and the recipient's authority.
                    Avoid advance payments before appropriate checks.
                </p>
            </article>

            <article class="rg-tip">
                <h3>03. Read Every Clause</h3>
                <p>
                    Understand the rent due date, notice period,
                    deposit deductions and termination conditions.
                </p>
            </article>

            <article class="rg-tip">
                <h3>04. Keep Written Records</h3>
                <p>
                    Save the signed agreement, payment receipts,
                    communications and move-in inspection records.
                </p>
            </article>

        </div>

        <div class="rg-note">
            <strong>Important:</strong>
            Rental requirements may differ by property and location.
            Confirm applicable legal requirements and all charges
            before entering into a rental agreement.
        </div>

    </section>

    {{-- Call to Action --}}
    <section class="rg-cta">
        <h2>Ready to Find Your Rental Home?</h2>

        <p>
            Explore available properties and find a home that
            matches your preferences and budget.
        </p>

        <a href="{{ route('rent') }}">
            Explore Properties &rarr;
        </a>
    </section>

</div>

@endsection
