
@extends('layouts.website')

@section('title', 'Partner With Us | Keys Please Venture')

@section('content')

<style>
    .partner-page {
        --p-navy: #171d3b;
        --p-blue: #1119a5;
        --p-blue-light: #eef0ff;
        --p-text: #303750;
        --p-muted: #737d94;
        --p-border: #e0e5f0;
        --p-bg: #f6f8fd;

        background: #fff;
        color: var(--p-text);
        overflow: hidden;
    }

    .partner-page * {
        box-sizing: border-box;
    }

    .partner-container {
        max-width: 1250px;
        width: 100%;
        padding-left: 22px;
        padding-right: 22px;
        margin: 0 auto;
    }

    /* HERO */
    .partner-hero {
        padding: 45px 0 55px;
        background: #f6f8fd;
    }

    .partner-hero-grid {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        gap: 45px;
        align-items: center;
    }

    .partner-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 9px 14px;
        background: #eef0ff;
        border: 1px solid #dfe3ff;
        color: #1119a5;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    .partner-eyebrow span {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #1119a5;
    }

    .partner-hero h1 {
        color: #171d3b;
        font-size: clamp(35px, 4.5vw, 55px);
        font-weight: 850;
        line-height: 1.15;
        letter-spacing: -1.5px;
        margin: 0 0 20px;
    }

    .partner-hero h1 span {
        color: #303fa6;
    }

    .partner-hero-description {
        max-width: 540px;
        color: #737d94;
        font-size: 15px;
        line-height: 1.95;
        margin: 0 0 25px;
    }

    .partner-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 30px;
    }

    .partner-btn-primary,
    .partner-btn-secondary {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        padding: 14px 20px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 750;
        text-decoration: none;
        transition: .2s ease;
    }

    .partner-btn-primary {
        background: #1119a5;
        color: #fff;
        border: 1px solid #1119a5;
    }

    .partner-btn-primary:hover {
        background: #0b127d;
        color: #fff;
    }

    .partner-btn-secondary {
        background: #fff;
        border: 1px solid #dce1ef;
        color: #171d3b;
    }

    .partner-btn-secondary:hover {
        border-color: #1119a5;
        color: #1119a5;
    }

    .partner-trust-row {
        display: flex;
        flex-wrap: wrap;
        gap: 18px;
    }

    .partner-trust-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #59637c;
        font-size: 12px;
        font-weight: 650;
    }

    .partner-trust-check {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 22px;
        height: 22px;
        background: #e8ecff;
        color: #1119a5;
        border-radius: 50%;
        font-size: 12px;
        font-weight: 800;
    }

    /* HERO VISUAL */
    .partner-hero-visual {
        position: relative;
        min-height: 440px;
        border-radius: 22px;
        overflow: hidden;
        background: linear-gradient(135deg, #dce4f7, #aab9e8);
    }

    .partner-visual-image {
        position: absolute;
        inset: 0;
        background:
            linear-gradient(180deg, rgba(17,25,90,.02), rgba(17,25,90,.35)),
            url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=85')
            center / cover no-repeat;
    }

    .partner-visual-card {
        position: absolute;
        left: 20px;
        right: 20px;
        bottom: 20px;
        padding: 21px;
        background: rgba(255,255,255,.96);
        border: 1px solid rgba(255,255,255,.8);
        border-radius: 14px;
        box-shadow: 0 12px 35px rgba(23,29,59,.12);
    }

    .partner-visual-card-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 14px;
    }

    .partner-visual-card h3 {
        color: #171d3b;
        font-size: 17px;
        font-weight: 800;
        margin: 0 0 5px;
    }

    .partner-visual-card p {
        color: #737d94;
        font-size: 12px;
        margin: 0;
    }

    .partner-verified {
        flex-shrink: 0;
        padding: 7px 10px;
        border-radius: 30px;
        background: #eef0ff;
        color: #1119a5;
        font-size: 10px;
        font-weight: 800;
    }

    .partner-visual-divider {
        height: 1px;
        background: #e8ebf3;
        margin-bottom: 14px;
    }

    .partner-visual-bottom {
        display: flex;
        flex-wrap: wrap;
        gap: 18px;
    }

    .partner-visual-stat strong {
        display: block;
        color: #171d3b;
        font-size: 15px;
        font-weight: 800;
    }

    .partner-visual-stat span {
        display: block;
        color: #737d94;
        font-size: 11px;
        margin-top: 4px;
    }

    /* SECTION HEADINGS */
    .partner-section {
        padding: 70px 0;
    }

    .partner-section-muted {
        background: #f6f8fd;
    }

    .partner-section-heading {
        max-width: 680px;
        margin: 0 auto 38px;
        text-align: center;
    }

    .partner-section-label {
        color: #1119a5;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .partner-section-heading h2 {
        color: #171d3b;
        font-size: clamp(26px, 3vw, 35px);
        line-height: 1.3;
        font-weight: 850;
        margin: 12px 0;
    }

    .partner-section-heading p {
        color: #737d94;
        font-size: 14px;
        line-height: 1.9;
        margin: 0;
    }

    /* BENEFITS */
    .partner-benefits-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
    }

    .partner-benefit-card {
        padding: 27px;
        background: #fff;
        border: 1px solid #e0e5f0;
        border-radius: 15px;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .partner-benefit-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 13px 30px rgba(23,29,59,.07);
    }

    .partner-benefit-icon {
        width: 54px;
        height: 54px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eef0ff;
        color: #1119a5;
        border-radius: 14px;
        font-size: 24px;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .partner-benefit-card h3 {
        color: #171d3b;
        font-size: 17px;
        font-weight: 800;
        margin: 0 0 11px;
    }

    .partner-benefit-card p {
        color: #737d94;
        font-size: 13px;
        line-height: 1.9;
        margin: 0;
    }

    /* PROCESS */
    .partner-process-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 25px;
        counter-reset: partner-step;
    }

    .partner-process-card {
        position: relative;
        padding: 27px;
        background: #fff;
        border: 1px solid #e0e5f0;
        border-radius: 14px;
        counter-increment: partner-step;
    }

    .partner-step-number {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 43px;
        height: 43px;
        background: #1119a5;
        color: #fff;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .partner-process-card h3 {
        color: #171d3b;
        font-size: 17px;
        font-weight: 800;
        margin: 0 0 10px;
    }

    .partner-process-card p {
        color: #737d94;
        font-size: 13px;
        line-height: 1.9;
        margin: 0;
    }

    /* ENQUIRY SECTION */
    .partner-enquiry-section {
        padding: 70px 0;
        background: #fff;
        scroll-margin-top: 25px;
    }

    .partner-enquiry-layout {
        display: grid;
        grid-template-columns: .85fr 1.15fr;
        gap: 30px;
        align-items: stretch;
    }

    .partner-enquiry-info {
        position: relative;
        overflow: hidden;
        padding: 35px;
        border-radius: 18px;
        background: linear-gradient(145deg, #171d65, #303fa6);
        color: #fff;
    }

    .partner-enquiry-info::after {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        border: 28px solid rgba(255,255,255,.06);
        border-radius: 50%;
        right: -80px;
        bottom: -75px;
        pointer-events: none;
    }

    .partner-enquiry-info h2 {
        position: relative;
        z-index: 1;
        color: #fff;
        font-size: 29px;
        line-height: 1.3;
        font-weight: 850;
        margin: 0 0 15px;
    }

    .partner-enquiry-info > p {
        position: relative;
        z-index: 1;
        color: #e1e6ff;
        font-size: 14px;
        line-height: 1.9;
        margin: 0 0 28px;
    }

    .partner-info-list {
        position: relative;
        z-index: 1;
        display: grid;
        gap: 20px;
    }

    .partner-info-item {
        display: flex;
        gap: 13px;
        align-items: flex-start;
    }

    .partner-info-check {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 27px;
        height: 27px;
        background: rgba(255,255,255,.13);
        border-radius: 8px;
        color: #fff;
        font-size: 13px;
        font-weight: 800;
    }

    .partner-info-item strong {
        display: block;
        color: #fff;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .partner-info-item p {
        color: #dce2ff;
        font-size: 12px;
        line-height: 1.8;
        margin: 0;
    }

    .partner-enquiry-form-card {
        padding: 32px;
        background: #fff;
        border: 1px solid #e0e5f0;
        border-radius: 18px;
        box-shadow: 0 8px 28px rgba(23,29,59,.035);
    }

    .partner-form-heading {
        margin-bottom: 25px;
    }

    .partner-form-heading h2 {
        color: #171d3b;
        font-size: 24px;
        font-weight: 850;
        margin: 0 0 9px;
    }

    .partner-form-heading p {
        color: #737d94;
        font-size: 13px;
        line-height: 1.8;
        margin: 0;
    }

    .partner-form {
        display: grid;
        gap: 18px;
    }

    .partner-form-row {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 15px;
    }

    .partner-form-field label {
        display: block;
        color: #303750;
        font-size: 12px;
        font-weight: 750;
        margin-bottom: 8px;
    }

    .partner-form-field input,
    .partner-form-field select,
    .partner-form-field textarea {
        width: 100%;
        min-width: 0;
        padding: 13px 14px;
        border: 1px solid #dfe4ef;
        border-radius: 9px;
        outline: none;
        background: #fff;
        color: #303750;
        font-family: inherit;
        font-size: 13px;
        transition: border-color .2s, box-shadow .2s;
    }

    .partner-form-field input::placeholder,
    .partner-form-field textarea::placeholder {
        color: #9aa2b5;
    }

    .partner-form-field input:focus,
    .partner-form-field select:focus,
    .partner-form-field textarea:focus {
        border-color: #1119a5;
        box-shadow: 0 0 0 3px rgba(17,25,165,.08);
    }

    .partner-form-field textarea {
        min-height: 120px;
        resize: vertical;
    }

    .partner-submit {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        padding: 15px 20px;
        background: #1119a5;
        border: 1px solid #1119a5;
        border-radius: 9px;
        color: #fff;
        font-family: inherit;
        font-size: 13px;
        font-weight: 800;
        cursor: pointer;
        transition: background .2s ease;
    }

    .partner-submit:hover {
        background: #0b127d;
    }

    .partner-form-note {
        color: #8991a5;
        font-size: 11px;
        line-height: 1.8;
        margin: 0;
    }

    .partner-form-message {
        display: none;
        padding: 13px;
        border-radius: 8px;
        background: #eef0ff;
        color: #1119a5;
        font-size: 12px;
        line-height: 1.7;
        margin: 0;
    }

    /* FINAL CTA */
    .partner-bottom-cta {
        padding: 55px 20px;
        background: #f6f8fd;
        text-align: center;
    }

    .partner-bottom-cta h2 {
        color: #171d3b;
        font-size: clamp(25px, 3vw, 34px);
        font-weight: 850;
        margin: 0 0 12px;
    }

    .partner-bottom-cta p {
        max-width: 620px;
        margin: 0 auto 23px;
        color: #737d94;
        font-size: 14px;
        line-height: 1.9;
    }

    /* RESPONSIVE */
    @media (max-width: 950px) {
        .partner-hero-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .partner-hero-visual {
            min-height: 400px;
        }

        .partner-benefits-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .partner-enquiry-layout {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 650px) {
        .partner-container {
            padding-left: 16px;
            padding-right: 16px;
        }

        .partner-hero {
            padding: 30px 0 40px;
        }

        .partner-hero h1 {
            font-size: 36px;
            letter-spacing: -1px;
        }

        .partner-hero-visual {
            min-height: 350px;
            border-radius: 15px;
        }

        .partner-visual-card {
            left: 12px;
            right: 12px;
            bottom: 12px;
            padding: 16px;
        }

        .partner-section,
        .partner-enquiry-section {
            padding: 48px 0;
        }

        .partner-benefits-grid,
        .partner-process-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .partner-benefit-card,
        .partner-process-card {
            padding: 23px;
        }

        .partner-enquiry-info,
        .partner-enquiry-form-card {
            padding: 24px 19px;
        }

        .partner-form-row {
            grid-template-columns: 1fr;
        }

        .partner-hero-actions {
            flex-direction: column;
        }

        .partner-btn-primary,
        .partner-btn-secondary {
            width: 100%;
        }

        .partner-trust-row {
            gap: 12px;
        }
    }
</style>

<div class="partner-page">

    {{-- Hero --}}
    <section class="partner-hero">
        <div class="partner-container">

            <div class="partner-hero-grid">

                <div class="partner-hero-content">

                    <div class="partner-eyebrow">
                        <span></span>
                        Partnership Opportunities
                    </div>

                    <h1>
                        Your Properties.<br>
                        Our Platform.<br>
                        <span>Shared Growth.</span>
                    </h1>

                    <p class="partner-hero-description">
                        Join Keys Please Venture to showcase your rental
                        properties, connect with prospective tenants, and
                        build meaningful relationships in the rental market.
                    </p>

                    <div class="partner-hero-actions">
                        <a href="#partner-enquiry" class="partner-btn-primary">
                            Become a Partner <span>→</span>
                        </a>

                        <a href="#partner-benefits" class="partner-btn-secondary">
                            Explore Benefits
                        </a>
                    </div>

                    <div class="partner-trust-row">
                        <div class="partner-trust-item">
                            <span class="partner-trust-check">✓</span>
                            Property Owners
                        </div>

                        <div class="partner-trust-item">
                            <span class="partner-trust-check">✓</span>
                            Real Estate Brokers
                        </div>

                        <div class="partner-trust-item">
                            <span class="partner-trust-check">✓</span>
                            Builders & Developers
                        </div>
                    </div>

                </div>

                <div class="partner-hero-visual">
                    <div class="partner-visual-image"></div>

                    <div class="partner-visual-card">

                        <div class="partner-visual-card-top">
                            <div>
                                <h3>Grow With Keys Please Venture</h3>
                                <p>A place to showcase your property business</p>
                            </div>

                            <span class="partner-verified">PARTNERSHIPS</span>
                        </div>

                        <div class="partner-visual-divider"></div>

                        <div class="partner-visual-bottom">
                            <div class="partner-visual-stat">
                                <strong>Property</strong>
                                <span>Showcase listings</span>
                            </div>

                            <div class="partner-visual-stat">
                                <strong>Connect</strong>
                                <span>Receive enquiries</span>
                            </div>

                            <div class="partner-visual-stat">
                                <strong>Grow</strong>
                                <span>Build relationships</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Benefits --}}
    <section class="partner-section" id="partner-benefits">
        <div class="partner-container">

            <div class="partner-section-heading">
                <span class="partner-section-label">WHY PARTNER WITH US</span>

                <h2>Everything You Need to Present Your Properties</h2>

                <p>
                    Create a professional presence for your properties
                    and make it easier for potential tenants to discover
                    relevant rental opportunities.
                </p>
            </div>

            <div class="partner-benefits-grid">

                <article class="partner-benefit-card">
                    <div class="partner-benefit-icon">⌂</div>
                    <h3>Showcase Your Properties</h3>
                    <p>
                        Present your rental properties with clear descriptions,
                        photographs, pricing, amenities, and location details.
                    </p>
                </article>

                <article class="partner-benefit-card">
                    <div class="partner-benefit-icon">◎</div>
                    <h3>Connect With Tenants</h3>
                    <p>
                        Help property seekers discover listings that match
                        their preferred locations and rental requirements.
                    </p>
                </article>

                <article class="partner-benefit-card">
                    <div class="partner-benefit-icon">↗</div>
                    <h3>Build Your Presence</h3>
                    <p>
                        Give your property business an online presence where
                        prospective tenants can explore your listings.
                    </p>
                </article>

                <article class="partner-benefit-card">
                    <div class="partner-benefit-icon">▤</div>
                    <h3>Organised Property Details</h3>
                    <p>
                        Present important information in a structured format
                        so tenants can compare their rental options.
                    </p>
                </article>

                <article class="partner-benefit-card">
                    <div class="partner-benefit-icon">♧</div>
                    <h3>Professional Relationships</h3>
                    <p>
                        Create opportunities to communicate with prospective
                        tenants and respond to property enquiries.
                    </p>
                </article>

                <article class="partner-benefit-card">
                    <div class="partner-benefit-icon">✓</div>
                    <h3>Clear Communication</h3>
                    <p>
                        Share accurate property information and help interested
                        renters understand the next steps.
                    </p>
                </article>

            </div>
        </div>
    </section>

    {{-- Process --}}
    <section class="partner-section partner-section-muted">
        <div class="partner-container">

            <div class="partner-section-heading">
                <span class="partner-section-label">HOW IT WORKS</span>

                <h2>Start Your Partnership in Three Steps</h2>

                <p>
                    Tell us about your business and the type of partnership
                    you are interested in exploring.
                </p>
            </div>

            <div class="partner-process-grid">

                <article class="partner-process-card">
                    <div class="partner-step-number">01</div>
                    <h3>Share Your Details</h3>
                    <p>
                        Complete the partnership enquiry form with your
                        contact information and business details.
                    </p>
                </article>

                <article class="partner-process-card">
                    <div class="partner-step-number">02</div>
                    <h3>Discuss Your Requirements</h3>
                    <p>
                        Describe your properties, services, and the type of
                        partnership that suits your business.
                    </p>
                </article>

                <article class="partner-process-card">
                    <div class="partner-step-number">03</div>
                    <h3>Explore Next Steps</h3>
                    <p>
                        Our team can review your enquiry and discuss suitable
                        next steps once the partnership process is established.
                    </p>
                </article>

            </div>
        </div>
    </section>

    {{-- Partnership Enquiry --}}
    <section class="partner-enquiry-section" id="partner-enquiry">
        <div class="partner-container">

            <div class="partner-enquiry-layout">

                <aside class="partner-enquiry-info">

                    <h2>Let's Build Something Together.</h2>

                    <p>
                        Interested in partnering with Keys Please Venture?
                        Tell us a little about your business and what you
                        would like to achieve.
                    </p>

                    <div class="partner-info-list">

                        <div class="partner-info-item">
                            <span class="partner-info-check">✓</span>
                            <div>
                                <strong>Tell Us About Your Business</strong>
                                <p>
                                    Share your role, business name, and
                                    property-related services.
                                </p>
                            </div>
                        </div>

                        <div class="partner-info-item">
                            <span class="partner-info-check">✓</span>
                            <div>
                                <strong>Explain Your Requirements</strong>
                                <p>
                                    Let us know what kind of partnership
                                    you would like to explore.
                                </p>
                            </div>
                        </div>

                        <div class="partner-info-item">
                            <span class="partner-info-check">✓</span>
                            <div>
                                <strong>Share Your Contact Details</strong>
                                <p>
                                    Provide the information needed to
                                    follow up on your enquiry.
                                </p>
                            </div>
                        </div>

                    </div>

                </aside>

                <div class="partner-enquiry-form-card">

                    <div class="partner-form-heading">
                        <h2>Partnership Enquiry</h2>
                        <p>
                            Complete the details below. Fields marked
                            with * are required.
                        </p>
                    </div>

                    <form class="partner-form" id="partnerForm">

                        <div class="partner-form-row">

                            <div class="partner-form-field">
                                <label for="partnerName">Full Name *</label>
                                <input
                                    id="partnerName"
                                    name="name"
                                    type="text"
                                    placeholder="Enter your full name"
                                    autocomplete="name"
                                    required
                                >
                            </div>

                            <div class="partner-form-field">
                                <label for="partnerEmail">Email Address *</label>
                                <input
                                    id="partnerEmail"
                                    name="email"
                                    type="email"
                                    placeholder="you@example.com"
                                    autocomplete="email"
                                    required
                                >
                            </div>

                        </div>

                        <div class="partner-form-row">

                            <div class="partner-form-field">
                                <label for="partnerPhone">Phone Number *</label>
                                <input
                                    id="partnerPhone"
                                    name="phone"
                                    type="tel"
                                    placeholder="Enter your phone number"
                                    autocomplete="tel"
                                    required
                                >
                            </div>

                            <div class="partner-form-field">
                                <label for="partnerType">Partner Type *</label>
                                <select
                                    id="partnerType"
                                    name="partner_type"
                                    required
                                >
                                    <option value="">Select partner type</option>
                                    <option value="Property Owner">Property Owner</option>
                                    <option value="Broker">Real Estate Broker</option>
                                    <option value="Builder">Builder / Developer</option>
                                    <option value="Property Manager">Property Manager</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                        </div>

                        <div class="partner-form-field">
                            <label for="partnerBusiness">Business Name</label>
                            <input
                                id="partnerBusiness"
                                name="business_name"
                                type="text"
                                placeholder="Enter your company or agency name"
                            >
                        </div>

                        <div class="partner-form-field">
                            <label for="partnerLocation">Business Location</label>
                            <input
                                id="partnerLocation"
                                name="location"
                                type="text"
                                placeholder="City or area"
                            >
                        </div>

                        <div class="partner-form-field">
                            <label for="partnerMessage">
                                Tell Us About Your Partnership *
                            </label>

                            <textarea
                                id="partnerMessage"
                                name="message"
                                placeholder="Describe your business, properties, or partnership interests..."
                                required
                            ></textarea>
                        </div>

                        <button class="partner-submit" type="submit">
                            Submit Partnership Enquiry <span>→</span>
                        </button>

                        <p class="partner-form-note">
                            This form is currently a UI preview. Your enquiry
                            will not be stored or sent until a backend submission
                            endpoint is connected.
                        </p>

                        <p
                            class="partner-form-message"
                            id="partnerFormMessage"
                            role="status"
                            aria-live="polite"
                        ></p>

                    </form>

                </div>

            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section class="partner-bottom-cta">
        <div class="partner-container">

            <h2>Ready to Explore a Partnership?</h2>

            <p>
                Take the first step towards working with Keys Please Venture.
                Share your details and tell us how you would like to collaborate.
            </p>

            <a href="#partner-enquiry" class="partner-btn-primary">
                Get Started <span>→</span>
            </a>

        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('partnerForm');
    const message = document.getElementById('partnerFormMessage');

    if (!form || !message) {
        return;
    }

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        message.style.display = 'block';
        message.textContent =
            'This is a UI preview. Your enquiry has not been sent or saved because the backend is not connected.';

        message.scrollIntoView({
            behavior: 'smooth',
            block: 'nearest'
        });
    });
});
</script>

@endsection
