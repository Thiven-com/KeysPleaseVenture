
@extends('layouts.website')

@section('title', 'Broker Benefits | Keys Please Venture')

@section('content')

<style>
    .broker-page {
        --bb-navy: #171d3b;
        --bb-blue: #1119a5;
        --bb-light: #eef0ff;
        --bb-text: #303750;
        --bb-muted: #737d94;
        --bb-border: #e0e5f0;
        --bb-bg: #f6f8fd;

        color: var(--bb-text);
        background: #fff;
        overflow: hidden;
    }

    .broker-page * {
        box-sizing: border-box;
    }

    .bb-container {
        max-width: 1250px;
        width: 100%;
        padding: 0 22px;
        margin: 0 auto;
    }

    /* HERO */
    .bb-hero {
        padding: 55px 0;
        background: #f6f8fd;
    }

    .bb-hero-grid {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        gap: 45px;
        align-items: center;
    }

    .bb-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        background: #eef0ff;
        border: 1px solid #dfe3ff;
        color: #1119a5;
        padding: 9px 14px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    .bb-eyebrow span {
        width: 7px;
        height: 7px;
        background: #1119a5;
        border-radius: 50%;
    }

    .bb-hero h1 {
        color: #171d3b;
        font-size: clamp(35px, 4.5vw, 54px);
        line-height: 1.15;
        letter-spacing: -1.5px;
        font-weight: 850;
        margin: 0 0 20px;
    }

    .bb-hero h1 span {
        color: #303fa6;
    }

    .bb-hero-description {
        max-width: 550px;
        color: #737d94;
        font-size: 15px;
        line-height: 1.95;
        margin: 0 0 25px;
    }

    .bb-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 28px;
    }

    .bb-btn-primary,
    .bb-btn-secondary {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        padding: 14px 20px;
        border-radius: 9px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 750;
        transition: .2s;
    }

    .bb-btn-primary {
        background: #1119a5;
        border: 1px solid #1119a5;
        color: #fff;
    }

    .bb-btn-primary:hover {
        background: #0b127d;
        color: #fff;
    }

    .bb-btn-secondary {
        background: #fff;
        border: 1px solid #dce1ef;
        color: #171d3b;
    }

    .bb-btn-secondary:hover {
        border-color: #1119a5;
        color: #1119a5;
    }

    .bb-hero-points {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .bb-hero-point {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #59637c;
        font-size: 12px;
        font-weight: 650;
    }

    .bb-hero-check {
        width: 22px;
        height: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        background: #e8ecff;
        color: #1119a5;
        border-radius: 50%;
        font-weight: 800;
    }

    /* PROPERTY PREVIEW */
    .bb-hero-visual {
        padding: 17px;
        background: #e9edfa;
        border: 1px solid #dfe4f3;
        border-radius: 22px;
    }

    .bb-dashboard {
        background: #fff;
        border: 1px solid #e0e5f0;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 12px 30px rgba(23,29,59,.06);
    }

    .bb-dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 19px;
        border-bottom: 1px solid #edf0f5;
    }

    .bb-dashboard-header h3 {
        color: #171d3b;
        font-size: 15px;
        font-weight: 800;
        margin: 0 0 5px;
    }

    .bb-dashboard-header p {
        color: #737d94;
        font-size: 11px;
        margin: 0;
    }

    .bb-demo-badge {
        padding: 7px 9px;
        background: #eef0ff;
        color: #1119a5;
        border-radius: 7px;
        font-size: 10px;
        font-weight: 800;
        white-space: nowrap;
    }

    .bb-property-preview {
        padding: 18px;
    }

    .bb-property-image {
        height: 205px;
        border-radius: 11px;
        background:
            linear-gradient(180deg, transparent 55%, rgba(14,21,62,.4)),
            url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1000&q=85')
            center / cover no-repeat;
        position: relative;
        overflow: hidden;
    }

    .bb-property-image-label {
        position: absolute;
        bottom: 13px;
        left: 13px;
        padding: 7px 10px;
        border-radius: 7px;
        background: #fff;
        color: #171d3b;
        font-size: 11px;
        font-weight: 800;
    }

    .bb-property-details {
        padding-top: 17px;
    }

    .bb-property-details h4 {
        color: #171d3b;
        font-size: 17px;
        font-weight: 800;
        margin: 0 0 7px;
    }

    .bb-property-location {
        color: #737d94;
        font-size: 12px;
        margin: 0 0 16px;
    }

    .bb-property-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 9px;
        padding-bottom: 17px;
        border-bottom: 1px solid #edf0f5;
    }

    .bb-property-meta span {
        padding: 8px 10px;
        background: #f6f8fd;
        border: 1px solid #e7eaf3;
        border-radius: 7px;
        color: #59637c;
        font-size: 11px;
    }

    .bb-property-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding-top: 15px;
    }

    .bb-property-footer strong {
        color: #1119a5;
        font-size: 18px;
        font-weight: 850;
    }

    .bb-property-footer small {
        color: #737d94;
        font-size: 11px;
    }

    .bb-preview-link {
        padding: 10px 13px;
        border-radius: 8px;
        background: #1119a5;
        color: #fff;
        font-size: 11px;
        font-weight: 750;
        text-decoration: none;
    }

    /* SECTION HEADINGS */
    .bb-section {
        padding: 72px 0;
    }

    .bb-section-muted {
        background: #f6f8fd;
    }

    .bb-section-heading {
        max-width: 690px;
        text-align: center;
        margin: 0 auto 40px;
    }

    .bb-section-label {
        color: #1119a5;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.5px;
    }

    .bb-section-heading h2 {
        color: #171d3b;
        font-size: clamp(26px, 3vw, 35px);
        line-height: 1.3;
        font-weight: 850;
        margin: 12px 0;
    }

    .bb-section-heading p {
        color: #737d94;
        font-size: 14px;
        line-height: 1.9;
        margin: 0;
    }

    /* BENEFITS */
    .bb-benefits-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
    }

    .bb-benefit-card {
        padding: 27px;
        border: 1px solid #e0e5f0;
        border-radius: 15px;
        background: #fff;
        transition: transform .2s, box-shadow .2s;
    }

    .bb-benefit-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 13px 30px rgba(23,29,59,.07);
    }

    .bb-benefit-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 54px;
        height: 54px;
        margin-bottom: 20px;
        border-radius: 14px;
        background: #eef0ff;
        color: #1119a5;
        font-size: 24px;
        font-weight: 800;
    }

    .bb-benefit-card h3 {
        color: #171d3b;
        font-size: 17px;
        font-weight: 800;
        margin: 0 0 11px;
    }

    .bb-benefit-card p {
        color: #737d94;
        font-size: 13px;
        line-height: 1.9;
        margin: 0;
    }

    /* WORKFLOW */
    .bb-workflow {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
    }

    .bb-workflow-card {
        position: relative;
        padding: 28px;
        background: #fff;
        border: 1px solid #e0e5f0;
        border-radius: 14px;
    }

    .bb-step {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        margin-bottom: 19px;
        background: #1119a5;
        color: #fff;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 800;
    }

    .bb-workflow-card h3 {
        color: #171d3b;
        font-size: 17px;
        font-weight: 800;
        margin: 0 0 10px;
    }

    .bb-workflow-card p {
        color: #737d94;
        font-size: 13px;
        line-height: 1.9;
        margin: 0;
    }

    /* TRUST SECTION */
    .bb-trust-panel {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: center;
        padding: 35px;
        border: 1px solid #e0e5f0;
        border-radius: 18px;
        background: #fff;
    }

    .bb-trust-panel h2 {
        color: #171d3b;
        font-size: 29px;
        line-height: 1.35;
        font-weight: 850;
        margin: 0 0 14px;
    }

    .bb-trust-panel > div:first-child p {
        color: #737d94;
        font-size: 14px;
        line-height: 1.9;
        margin: 0;
    }

    .bb-trust-list {
        display: grid;
        gap: 17px;
    }

    .bb-trust-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .bb-trust-check {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 26px;
        height: 26px;
        flex-shrink: 0;
        border-radius: 8px;
        background: #eef0ff;
        color: #1119a5;
        font-weight: 800;
    }

    .bb-trust-item p {
        color: #59637c;
        font-size: 13px;
        line-height: 1.8;
        margin: 2px 0 0;
    }

    /* CTA */
    .bb-cta-wrap {
        padding: 0 22px 65px;
    }

    .bb-cta {
        max-width: 1206px;
        margin: 0 auto;
        padding: 52px 25px;
        text-align: center;
        border-radius: 19px;
        background: linear-gradient(120deg, #171d65, #303fa6);
        color: #fff;
    }

    .bb-cta h2 {
        color: #fff;
        font-size: clamp(26px, 3vw, 35px);
        font-weight: 850;
        margin: 0 0 13px;
    }

    .bb-cta p {
        max-width: 640px;
        margin: 0 auto 25px;
        color: #e1e6ff;
        font-size: 14px;
        line-height: 1.9;
    }

    .bb-cta .bb-btn-white {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 14px 23px;
        border-radius: 9px;
        background: #fff;
        color: #1119a5;
        text-decoration: none;
        font-size: 13px;
        font-weight: 800;
        transition: .2s;
    }

    .bb-cta .bb-btn-white:hover {
        background: #eef0ff;
    }

    /* RESPONSIVE */
    @media (max-width: 950px) {
        .bb-hero-grid {
            grid-template-columns: 1fr;
            gap: 32px;
        }

        .bb-benefits-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .bb-trust-panel {
            grid-template-columns: 1fr;
            gap: 25px;
        }
    }

    @media (max-width: 650px) {
        .bb-container {
            padding: 0 16px;
        }

        .bb-hero {
            padding: 32px 0 40px;
        }

        .bb-hero h1 {
            font-size: 36px;
            letter-spacing: -1px;
        }

        .bb-hero-actions {
            flex-direction: column;
        }

        .bb-btn-primary,
        .bb-btn-secondary {
            width: 100%;
        }

        .bb-hero-visual {
            padding: 10px;
            border-radius: 15px;
        }

        .bb-property-image {
            height: 180px;
        }

        .bb-section {
            padding: 48px 0;
        }

        .bb-benefits-grid,
        .bb-workflow {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .bb-benefit-card,
        .bb-workflow-card {
            padding: 23px;
        }

        .bb-trust-panel {
            padding: 23px;
        }

        .bb-trust-panel h2 {
            font-size: 25px;
        }

        .bb-cta-wrap {
            padding: 0 14px 40px;
        }

        .bb-cta {
            padding: 38px 20px;
        }
    }
</style>

<div class="broker-page">

    {{-- Hero --}}
    <section class="bb-hero">
        <div class="bb-container">

            <div class="bb-hero-grid">

                <div>
                    <div class="bb-eyebrow">
                        <span></span>
                        For Real Estate Professionals
                    </div>

                    <h1>
                        Take Your Property Business
                        <span>Further.</span>
                    </h1>

                    <p class="bb-hero-description">
                        Showcase rental properties, help prospective tenants
                        discover suitable homes, and create a professional
                        online presence with Keys Please Venture.
                    </p>

                    <div class="bb-hero-actions">
                        <a href="#broker-start" class="bb-btn-primary">
                            Get Started <span>→</span>
                        </a>

                        <a href="#broker-benefits" class="bb-btn-secondary">
                            Explore Benefits
                        </a>
                    </div>

                    <div class="bb-hero-points">
                        <div class="bb-hero-point">
                            <span class="bb-hero-check">✓</span>
                            Property Owners
                        </div>

                        <div class="bb-hero-point">
                            <span class="bb-hero-check">✓</span>
                            Rental Brokers
                        </div>

                        <div class="bb-hero-point">
                            <span class="bb-hero-check">✓</span>
                            Property Managers
                        </div>
                    </div>
                </div>

                {{-- Property Preview --}}
                <div class="bb-hero-visual">
                    <div class="bb-dashboard">

                        <div class="bb-dashboard-header">
                            <div>
                                <h3>Property Listing Preview</h3>
                                <p>Example of a property showcase</p>
                            </div>

                            <span class="bb-demo-badge">DEMO PREVIEW</span>
                        </div>

                        <div class="bb-property-preview">

                            <div class="bb-property-image">
                                <span class="bb-property-image-label">
                                    Rental Property
                                </span>
                            </div>

                            <div class="bb-property-details">
                                <h4>Modern Residential Home</h4>

                                <p class="bb-property-location">
                                    ◉ Location and address details
                                </p>

                                <div class="bb-property-meta">
                                    <span>2–3 Bedrooms</span>
                                    <span>Parking</span>
                                    <span>Furnished options</span>
                                </div>

                                <div class="bb-property-footer">
                                    <div>
                                        <strong>Rental Listing</strong>
                                        <br>
                                        <small>Example display only</small>
                                    </div>

                                    <a
                                        href="#broker-start"
                                        class="bb-preview-link">
                                        Get Started →
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Benefits --}}
    <section class="bb-section" id="broker-benefits">
        <div class="bb-container">

            <div class="bb-section-heading">
                <span class="bb-section-label">BROKER BENEFITS</span>

                <h2>Built Around Your Property Business</h2>

                <p>
                    Make your listings easier to understand and give property
                    seekers the information they need to explore their options.
                </p>
            </div>

            <div class="bb-benefits-grid">

                <article class="bb-benefit-card">
                    <div class="bb-benefit-icon">⌂</div>
                    <h3>Showcase Properties</h3>
                    <p>
                        Present property photographs, pricing, location,
                        amenities, and descriptions in an organised format.
                    </p>
                </article>

                <article class="bb-benefit-card">
                    <div class="bb-benefit-icon">◎</div>
                    <h3>Reach Property Seekers</h3>
                    <p>
                        Help prospective tenants discover available rentals
                        that fit their requirements.
                    </p>
                </article>

                <article class="bb-benefit-card">
                    <div class="bb-benefit-icon">✉</div>
                    <h3>Coordinate Enquiries</h3>
                    <p>
                        Provide clear contact information and follow up with
                        people interested in your properties.
                    </p>
                </article>

                <article class="bb-benefit-card">
                    <div class="bb-benefit-icon">▤</div>
                    <h3>Organise Listing Details</h3>
                    <p>
                        Keep important property information together so that
                        renters can review the available features.
                    </p>
                </article>

                <article class="bb-benefit-card">
                    <div class="bb-benefit-icon">◷</div>
                    <h3>Coordinate Visits</h3>
                    <p>
                        Discuss suitable inspection times and help prospective
                        tenants arrange property visits.
                    </p>
                </article>

                <article class="bb-benefit-card">
                    <div class="bb-benefit-icon">↗</div>
                    <h3>Build Your Online Presence</h3>
                    <p>
                        Present your property portfolio professionally to
                        people exploring rental opportunities.
                    </p>
                </article>

            </div>
        </div>
    </section>

    {{-- Process --}}
    <section class="bb-section bb-section-muted">
        <div class="bb-container">

            <div class="bb-section-heading">
                <span class="bb-section-label">GETTING STARTED</span>

                <h2>Three Steps to Get Started</h2>

                <p>
                    Prepare your information and follow your website's
                    property listing process.
                </p>
            </div>

            <div class="bb-workflow">

                <article class="bb-workflow-card">
                    <div class="bb-step">01</div>

                    <h3>Prepare Your Details</h3>

                    <p>
                        Gather property photographs, accurate rental prices,
                        location information, and amenities.
                    </p>
                </article>

                <article class="bb-workflow-card">
                    <div class="bb-step">02</div>

                    <h3>Submit Your Listing</h3>

                    <p>
                        Use the available property listing process to provide
                        the information required for publication.
                    </p>
                </article>

                <article class="bb-workflow-card">
                    <div class="bb-step">03</div>

                    <h3>Respond to Enquiries</h3>

                    <p>
                        Keep listing details up to date and coordinate with
                        prospective tenants interested in your property.
                    </p>
                </article>

            </div>
        </div>
    </section>

    {{-- Professional Practices --}}
    <section class="bb-section">
        <div class="bb-container">

            <div class="bb-trust-panel">

                <div>
                    <span class="bb-section-label">
                        PROFESSIONAL STANDARDS
                    </span>

                    <h2>
                        Earn Trust Through Better Property Listings
                    </h2>

                    <p>
                        Accurate property information helps renters make
                        informed decisions and creates a better experience
                        for everyone involved.
                    </p>
                </div>

                <div class="bb-trust-list">

                    <div class="bb-trust-item">
                        <span class="bb-trust-check">✓</span>
                        <p>
                            Use genuine photographs and accurate descriptions.
                        </p>
                    </div>

                    <div class="bb-trust-item">
                        <span class="bb-trust-check">✓</span>
                        <p>
                            Clearly communicate rental prices and applicable charges.
                        </p>
                    </div>

                    <div class="bb-trust-item">
                        <span class="bb-trust-check">✓</span>
                        <p>
                            Update listings when property availability changes.
                        </p>
                    </div>

                    <div class="bb-trust-item">
                        <span class="bb-trust-check">✓</span>
                        <p>
                            Respond professionally to enquiries and visit requests.
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </section>

    {{-- CTA --}}
    <section class="bb-cta-wrap" id="broker-start">
        <div class="bb-cta">

            <h2>Ready to Showcase Your Properties?</h2>

            <p>
                Start with your existing property listing process and
                present your rental properties to prospective tenants.
            </p>

            <a
                href="{{ route('contact') }}#list-property"
                class="bb-btn-white">
                Contact With Us To List Your Property <span>→</span>
            </a>

        </div>
    </section>

</div>

@endsection
