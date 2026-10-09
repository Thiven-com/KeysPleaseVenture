
@extends('layouts.website')

@section('title', 'How It Works | Rental Properties')

@section('content')

<style>
    .how-page {
        font-family: inherit;
        color: #20243a;
        background: #fff;
    }

    .how-hero {
        padding: 75px 20px;
        text-align: center;
        background: linear-gradient(135deg, #f5f7ff, #ffffff);
    }

    .how-hero .eyebrow {
        color: #4148c5;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .how-hero h1 {
        margin: 15px auto;
        max-width: 750px;
        font-size: clamp(32px, 5vw, 48px);
        font-weight: 800;
        line-height: 1.2;
    }

    .how-hero p {
        max-width: 650px;
        margin: 0 auto;
        color: #626980;
        font-size: 17px;
        line-height: 1.8;
    }

    .how-container {
        width: min(1120px, 100%);
        margin: auto;
        padding: 65px 20px;
    }

    .how-heading {
        margin-bottom: 12px;
        text-align: center;
        font-size: 30px;
        font-weight: 800;
    }

    .how-description {
        max-width: 650px;
        margin: 0 auto 40px;
        text-align: center;
        color: #6b7185;
        line-height: 1.7;
    }

    .how-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 25px;
    }

    .how-card {
        padding: 30px 24px;
        background: #fff;
        border: 1px solid #e8eaf2;
        border-radius: 16px;
        box-shadow: 0 8px 28px rgba(25, 35, 80, .05);
        transition: transform .2s ease,
                    box-shadow .2s ease;
    }

    .how-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 35px rgba(25, 35, 80, .10);
    }

    .how-number {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 54px;
        height: 54px;
        margin-bottom: 22px;
        color: #4148c5;
        background: #eef0ff;
        border-radius: 14px;
        font-size: 22px;
        font-weight: 800;
    }

    .how-card h3 {
        margin-bottom: 12px;
        font-size: 20px;
        font-weight: 750;
    }

    .how-card p {
        margin: 0;
        color: #6b7185;
        line-height: 1.8;
        font-size: 15px;
    }

    .how-benefits {
        background: #f7f8fc;
    }

    .how-benefit-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px;
        max-width: 850px;
        margin: 35px auto 0;
    }

    .how-benefit {
        display: flex;
        gap: 14px;
        padding: 22px;
        background: #fff;
        border-radius: 12px;
        border: 1px solid #eceef5;
    }

    .how-check {
        color: #4148c5;
        font-size: 22px;
        font-weight: 800;
    }

    .how-benefit h3 {
        margin: 0 0 7px;
        font-size: 17px;
    }

    .how-benefit p {
        margin: 0;
        color: #6b7185;
        font-size: 14px;
        line-height: 1.7;
    }

    .how-cta {
        margin: 0 20px 65px;
        padding: 45px 25px;
        text-align: center;
        color: #fff;
        background: #252d72;
        border-radius: 20px;
    }

    .how-cta h2 {
        margin: 0 0 12px;
        font-size: 29px;
        font-weight: 800;
    }

    .how-cta p {
        margin: 0 auto 25px;
        max-width: 600px;
        color: #e1e4ff;
        line-height: 1.7;
    }

    .how-cta a {
        display: inline-block;
        padding: 13px 26px;
        color: #252d72;
        background: #fff;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 700;
    }

    .how-cta a:hover {
        background: #eef0ff;
    }

    @media (max-width: 768px) {
        .how-hero {
            padding: 50px 20px;
        }

        .how-container {
            padding: 45px 18px;
        }

        .how-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .how-benefit-list {
            grid-template-columns: 1fr;
        }

        .how-heading {
            font-size: 26px;
        }

        .how-cta {
            margin-bottom: 40px;
            border-radius: 14px;
        }
    }
</style>

<div class="how-page">

    {{-- Hero Section --}}
    <section class="how-hero">
        <div class="eyebrow">Simple. Convenient. Reliable.</div>

        <h1>Finding Your Rental Home Made Simple</h1>

        <p>
            Discover properties that match your needs, connect with
            owners or brokers, and arrange a visit with ease.
            Your next rental home starts here.
        </p>
    </section>

    {{-- Process Section --}}
    <section class="how-container">
        <h2 class="how-heading">How It Works</h2>

        <p class="how-description">
            Follow three simple steps to find and explore your
            next rental property.
        </p>

        <div class="how-grid">

            <article class="how-card">
                <div class="how-number">01</div>

                <h3>Find Your Property</h3>

                <p>
                    Explore available rental homes and properties.
                    Compare locations, rental prices and property
                    details to find a suitable option.
                </p>
            </article>

            <article class="how-card">
                <div class="how-number">02</div>

                <h3>Send an Enquiry</h3>

                <p>
                    Interested in a property? Submit an enquiry
                    through our website to request more information
                    from the owner or broker.
                </p>
            </article>

            <article class="how-card">
                <div class="how-number">03</div>

                <h3>Visit and Decide</h3>

                <p>
                    Schedule a property visit, inspect the home,
                    clarify the rental terms and make an informed
                    decision before proceeding.
                </p>
            </article>

        </div>
    </section>

    {{-- Benefits Section --}}
    <section class="how-benefits">
        <div class="how-container">

            <h2 class="how-heading">
                A Better Rental Experience
            </h2>

            <p class="how-description">
                Everything you need to begin your property search
                in one convenient place.
            </p>

            <div class="how-benefit-list">

                <div class="how-benefit">
                    <div class="how-check">✓</div>
                    <div>
                        <h3>Explore Property Options</h3>
                        <p>
                            Browse available listings and review
                            property information before enquiring.
                        </p>
                    </div>
                </div>

                <div class="how-benefit">
                    <div class="how-check">✓</div>
                    <div>
                        <h3>Connect with Owners</h3>
                        <p>
                            Send your questions and request details
                            about properties you are interested in.
                        </p>
                    </div>
                </div>

                <div class="how-benefit">
                    <div class="how-check">✓</div>
                    <div>
                        <h3>Arrange Property Visits</h3>
                        <p>
                            Request a visit to evaluate the property
                            before making your rental decision.
                        </p>
                    </div>
                </div>

                <div class="how-benefit">
                    <div class="how-check">✓</div>
                    <div>
                        <h3>Make Informed Decisions</h3>
                        <p>
                            Clarify rent, deposit, agreement terms
                            and other charges before committing.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Call to Action --}}
    <section class="how-cta">
        <h2>Ready to Find Your Next Home?</h2>

        <p>
            Start exploring rental properties and find an option
            that suits your location, budget and requirements.
        </p>

        <a href="{{ route('rent') }}">
            Explore Properties &rarr;
        </a>
    </section>

</div>

@endsection
