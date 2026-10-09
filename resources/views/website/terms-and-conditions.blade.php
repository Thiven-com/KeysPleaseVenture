
@extends('layouts.website')

@section('title', 'Terms & Conditions | Keys Please Venture')

@section('content')

<style>
    .terms-page {
        --terms-navy: #171d3b;
        --terms-blue: #1119a5;
        --terms-light-blue: #eef0ff;
        --terms-text: #303750;
        --terms-muted: #737d94;
        --terms-border: #e0e5f0;

        background: #f6f8fd;
        color: var(--terms-text);
        padding: 38px 20px 65px;
        font-family: inherit;
    }

    .terms-page * {
        box-sizing: border-box;
    }

    .terms-container {
        max-width: 1250px;
        margin: 0 auto;
    }

    /* Breadcrumb */
    .terms-breadcrumb {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 9px;
        color: var(--terms-muted);
        font-size: 13px;
        margin-bottom: 25px;
    }

    .terms-breadcrumb a {
        color: var(--terms-blue);
        text-decoration: none;
        font-weight: 650;
    }

    /* Hero */
    .terms-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(120deg, #171d65, #303fa6);
        border-radius: 16px;
        padding: 45px 42px;
        color: #fff;
        margin-bottom: 28px;
    }

    .terms-hero::after {
        content: "";
        position: absolute;
        width: 230px;
        height: 230px;
        border: 35px solid rgba(255,255,255,.07);
        border-radius: 50%;
        right: -55px;
        top: -90px;
        pointer-events: none;
    }

    .terms-hero-content {
        position: relative;
        z-index: 1;
        max-width: 750px;
    }

    .terms-badge {
        display: inline-block;
        background: rgba(255,255,255,.14);
        color: #fff;
        padding: 8px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 650;
        margin-bottom: 17px;
    }

    .terms-hero h1 {
        color: #fff;
        font-size: clamp(30px, 4vw, 42px);
        line-height: 1.2;
        font-weight: 800;
        margin: 0 0 15px;
    }

    .terms-hero p {
        max-width: 680px;
        color: #e4e9ff;
        font-size: 15px;
        line-height: 1.85;
        margin: 0;
    }

    .terms-updated {
        margin-top: 20px;
        color: #d7ddff;
        font-size: 12px;
    }

    /* Summary cards */
    .terms-highlights {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 30px;
    }

    .terms-highlight-card {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        background: #fff;
        border: 1px solid var(--terms-border);
        border-radius: 12px;
        padding: 21px;
        box-shadow: 0 4px 14px rgba(23,29,59,.025);
    }

    .terms-highlight-icon {
        flex-shrink: 0;
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--terms-light-blue);
        color: var(--terms-blue);
        font-size: 22px;
        font-weight: 800;
    }

    .terms-highlight-card h3 {
        color: var(--terms-navy);
        font-size: 15px;
        font-weight: 800;
        margin: 2px 0 7px;
    }

    .terms-highlight-card p {
        color: var(--terms-muted);
        font-size: 12px;
        line-height: 1.7;
        margin: 0;
    }

    /* Main layout */
    .terms-layout {
        display: grid;
        grid-template-columns: 285px minmax(0, 1fr);
        gap: 24px;
        align-items: start;
    }

    .terms-sidebar,
    .terms-content {
        background: #fff;
        border: 1px solid var(--terms-border);
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(23,29,59,.025);
    }

    .terms-sidebar {
        position: sticky;
        top: 25px;
        padding: 23px 17px;
    }

    .terms-sidebar h3 {
        color: var(--terms-navy);
        font-size: 16px;
        font-weight: 800;
        margin: 0 10px 8px;
    }

    .terms-sidebar-caption {
        color: var(--terms-muted);
        font-size: 12px;
        line-height: 1.6;
        margin: 0 10px 17px;
    }

    .terms-sidebar nav {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .terms-sidebar a {
        display: block;
        padding: 11px 10px;
        color: #5e6881;
        text-decoration: none;
        font-size: 12px;
        line-height: 1.5;
        font-weight: 600;
        border-radius: 8px;
        transition: .2s;
    }

    .terms-sidebar a:hover,
    .terms-sidebar a.active {
        color: var(--terms-blue);
        background: #eef0ff;
    }

    .terms-sidebar a.active {
        box-shadow: inset 3px 0 0 var(--terms-blue);
    }

    .terms-content {
        padding: 32px;
        min-width: 0;
    }

    .terms-intro {
        background: #f7f8ff;
        border: 1px solid #e5e8ff;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 28px;
    }

    .terms-intro h2 {
        color: var(--terms-navy);
        font-size: 19px;
        font-weight: 800;
        margin: 0 0 10px;
    }

    .terms-intro p {
        color: #626c85;
        font-size: 13px;
        line-height: 1.9;
        margin: 0;
    }

    /* Policy sections */
    .terms-content section.terms-section {
        padding: 0 0 25px;
        margin-bottom: 25px;
        border-bottom: 1px solid #edf0f5;
        scroll-margin-top: 30px;
    }

    .terms-content section.terms-section:last-of-type {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .terms-content .terms-section h2 {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        color: var(--terms-navy);
        font-size: 19px;
        line-height: 1.5;
        font-weight: 800;
        margin: 0 0 13px;
    }

    .terms-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 32px;
        height: 32px;
        border-radius: 9px;
        background: var(--terms-light-blue);
        color: var(--terms-blue);
        font-size: 13px;
        font-weight: 800;
    }

    .terms-content .terms-section p,
    .terms-content .terms-section li {
        color: #69738a;
        font-size: 13px;
        line-height: 1.95;
    }

    .terms-content .terms-section p {
        margin: 0 0 12px;
    }

    .terms-content .terms-section ul {
        padding-left: 21px;
        margin: 10px 0 14px;
    }

    .terms-content .terms-section li {
        padding-left: 3px;
        margin-bottom: 7px;
    }

    .terms-content .terms-section strong {
        color: #343d58;
    }

    .terms-note {
        background: #f0f3ff;
        border-left: 4px solid #3445c4;
        padding: 17px 18px;
        border-radius: 8px;
        margin-top: 17px;
    }

    .terms-note p {
        color: #505c87 !important;
        margin: 0 !important;
    }

    /* Contact card */
    .terms-contact {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 22px;
        margin-top: 25px;
        padding: 25px;
        border: 1px solid #dfe4ff;
        border-radius: 12px;
        background: linear-gradient(120deg, #f0f2ff, #fafbff);
    }

    .terms-contact h3 {
        color: var(--terms-navy);
        font-size: 18px;
        font-weight: 800;
        margin: 0 0 8px;
    }

    .terms-contact p {
        color: var(--terms-muted);
        font-size: 13px;
        line-height: 1.8;
        margin: 0;
    }

    .terms-contact a {
        flex-shrink: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 13px 19px;
        border-radius: 8px;
        background: var(--terms-blue);
        border: 1px solid var(--terms-blue);
        color: #fff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 750;
        transition: .2s;
    }

    .terms-contact a:hover {
        background: #0b127d;
        color: #fff;
    }

    .terms-footer-links {
        display: flex;
        flex-wrap: wrap;
        gap: 17px;
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid var(--terms-border);
    }

    .terms-footer-links a {
        color: var(--terms-blue);
        text-decoration: none;
        font-size: 12px;
        font-weight: 650;
    }

    .terms-footer-links a:hover {
        text-decoration: underline;
    }

    @media (max-width: 900px) {
        .terms-highlights {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .terms-layout {
            grid-template-columns: 1fr;
        }

        .terms-sidebar {
            position: static;
        }

        .terms-sidebar nav {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .terms-page {
            padding: 25px 13px 40px;
        }

        .terms-hero {
            padding: 32px 23px;
        }

        .terms-hero h1 {
            font-size: 30px;
        }

        .terms-sidebar {
            padding: 20px 13px;
        }

        .terms-sidebar nav {
            grid-template-columns: 1fr;
        }

        .terms-content {
            padding: 22px 17px;
        }

        .terms-content .terms-section h2 {
            font-size: 17px;
        }

        .terms-contact {
            flex-direction: column;
            align-items: flex-start;
            padding: 22px;
        }

        .terms-contact a {
            width: 100%;
        }
    }
</style>

<div class="terms-page">
    <div class="terms-container">

        {{-- Breadcrumb --}}
        <div class="terms-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <span>Terms &amp; Conditions</span>
        </div>

        {{-- Hero --}}
        <section class="terms-hero">
            <div class="terms-hero-content">
                <span class="terms-badge">LEGAL INFORMATION</span>

                <h1>Terms &amp; Conditions</h1>

                <p>
                    Welcome to Keys Please Venture. These terms explain the
                    rules and responsibilities that apply when you use our
                    rental property platform to explore properties, submit
                    enquiries, or publish property listings.
                </p>

                <div class="terms-updated">
                    Please review these terms before using our services.
                </div>
            </div>
        </section>

        {{-- Summary Cards --}}
        <div class="terms-highlights">

            <div class="terms-highlight-card">
                <div class="terms-highlight-icon">✓</div>
                <div>
                    <h3>Fair Platform Use</h3>
                    <p>
                        Use the platform honestly and provide accurate
                        information when interacting with other users.
                    </p>
                </div>
            </div>

            <div class="terms-highlight-card">
                <div class="terms-highlight-icon">⌂</div>
                <div>
                    <h3>Property Information</h3>
                    <p>
                        Verify property details, rental terms, and availability
                        before making commitments.
                    </p>
                </div>
            </div>

            <div class="terms-highlight-card">
                <div class="terms-highlight-icon">♙</div>
                <div>
                    <h3>User Responsibilities</h3>
                    <p>
                        Understand the responsibilities of tenants, owners,
                        brokers, and website users.
                    </p>
                </div>
            </div>

        </div>

        <div class="terms-layout">

            {{-- Sidebar --}}
            <aside class="terms-sidebar">
                <h3>Terms &amp; Conditions</h3>

                <p class="terms-sidebar-caption">
                    Navigate through the terms and learn about your
                    responsibilities when using our platform.
                </p>

                <nav>
                    <a href="#acceptance" class="active">01&nbsp; Acceptance of Terms</a>
                    <a href="#services">02&nbsp; Our Services</a>
                    <a href="#accounts">03&nbsp; User Accounts</a>
                    <a href="#listings">04&nbsp; Property Listings</a>
                    <a href="#responsibilities">05&nbsp; User Responsibilities</a>
                    <a href="#payments">06&nbsp; Payments and Fees</a>
                    <a href="#privacy">07&nbsp; Privacy</a>
                    <a href="#liability">08&nbsp; Liability</a>
                    <a href="#termination">09&nbsp; Account Termination</a>
                    <a href="#changes">10&nbsp; Changes to Terms</a>
                    <a href="#contact">11&nbsp; Contact Us</a>
                </nav>
            </aside>

            {{-- Main Content --}}
            <main class="terms-content">

                <div class="terms-intro">
                    <h2>Understanding Our Terms</h2>
                    <p>
                        These terms apply to the use of the Keys Please Venture
                        website and its rental property services. Please read
                        each section carefully. Your rights and obligations
                        may also depend on applicable law and any separate
                        agreement you enter into.
                    </p>
                </div>

                <section class="terms-section" id="acceptance">
                    <h2>
                        <span class="terms-number">01</span>
                        Acceptance of Terms
                    </h2>

                    <p>
                        By accessing or using this website, you agree to
                        comply with these Terms and Conditions and applicable
                        laws. If you do not agree with these terms, please
                        discontinue using the platform.
                    </p>
                </section>

                <section class="terms-section" id="services">
                    <h2>
                        <span class="terms-number">02</span>
                        Our Services
                    </h2>

                    <p>
                        Keys Please Venture provides a platform to help tenants
                        discover rental properties and allows owners and
                        brokers to publish property information and receive
                        enquiries.
                    </p>

                    <p>
                        Property listings and enquiries do not guarantee
                        availability, approval, or completion of a rental
                        agreement. Rental decisions and agreements remain
                        subject to verification and the parties involved.
                    </p>
                </section>

                <section class="terms-section" id="accounts">
                    <h2>
                        <span class="terms-number">03</span>
                        User Accounts
                    </h2>

                    <p>When creating or using an account, you agree to:</p>

                    <ul>
                        <li>Provide accurate and up-to-date information.</li>
                        <li>Keep your login credentials secure.</li>
                        <li>Notify us if you suspect unauthorised account access.</li>
                        <li>Use your account only for lawful purposes.</li>
                        <li>Avoid impersonating another person or organisation.</li>
                    </ul>
                </section>

                <section class="terms-section" id="listings">
                    <h2>
                        <span class="terms-number">04</span>
                        Property Listings
                    </h2>

                    <p>
                        Property owners and brokers are responsible for ensuring
                        that information they submit is accurate, current,
                        and authorised for publication.
                    </p>

                    <ul>
                        <li>Do not publish misleading property details or images.</li>
                        <li>Update listings when a property is no longer available.</li>
                        <li>Do not publish fraudulent or unauthorised content.</li>
                        <li>Provide accurate rental prices and property descriptions.</li>
                    </ul>

                    <p>
                        Prospective tenants should independently verify property
                        details, ownership or authorisation, rental terms,
                        and availability before making payments or commitments.
                    </p>
                </section>

                <section class="terms-section" id="responsibilities">
                    <h2>
                        <span class="terms-number">05</span>
                        User Responsibilities
                    </h2>

                    <p>All users agree not to:</p>

                    <ul>
                        <li>Use the platform for fraudulent or unlawful activities.</li>
                        <li>Harass, threaten, or mislead other users.</li>
                        <li>Attempt unauthorised access to the website or its systems.</li>
                        <li>Upload harmful code or interfere with website operation.</li>
                        <li>Copy or distribute website content unlawfully.</li>
                    </ul>
                </section>

                <section class="terms-section" id="payments">
                    <h2>
                        <span class="terms-number">06</span>
                        Payments and Fees
                    </h2>

                    <p>
                        Any applicable service charges, booking fees, brokerage
                        charges, or other payments should be clearly disclosed
                        before a user commits to a paid service.
                    </p>

                    <p>
                        Tenants should confirm deposits, rent, refund conditions,
                        brokerage fees, and payment arrangements directly with
                        the relevant party before transferring money.
                    </p>
                </section>

                <section class="terms-section" id="privacy">
                    <h2>
                        <span class="terms-number">07</span>
                        Privacy
                    </h2>

                    <p>
                        Personal information should be handled in accordance
                        with our Privacy Policy and applicable data protection
                        requirements.
                    </p>

                    <p>
                        Users should avoid sharing passwords, banking
                        credentials, or unnecessary sensitive information
                        through public listings or enquiries.
                    </p>
                </section>

                <section class="terms-section" id="liability">
                    <h2>
                        <span class="terms-number">08</span>
                        Limitation of Liability
                    </h2>

                    <p>
                        Property information may be supplied by owners or
                        brokers. Users should verify important details before
                        entering into a transaction or rental agreement.
                    </p>

                    <p>
                        To the extent permitted by applicable law, Keys Please
                        Venture is not responsible for inaccurate third-party
                        listings, property disputes, or agreements made
                        directly between users and property providers.
                    </p>
                </section>

                <section class="terms-section" id="termination">
                    <h2>
                        <span class="terms-number">09</span>
                        Account Termination
                    </h2>

                    <p>
                        Access may be restricted or an account may be suspended
                        where there is reasonable evidence of fraudulent
                        activity, misuse, security risks, or violations of
                        these terms, subject to applicable law.
                    </p>
                </section>

                <section class="terms-section" id="changes">
                    <h2>
                        <span class="terms-number">10</span>
                        Changes to Terms
                    </h2>

                    <p>
                        These terms may be updated to reflect changes in our
                        services, business practices, or legal requirements.
                        Updated terms will be published on this page.
                    </p>

                    <p>
                        Where required, users will be notified of material
                        changes in an appropriate manner.
                    </p>

                    <div class="terms-note">
                        <p>
                            <strong>Important:</strong> This page is a general
                            template, not legal advice. Review and adapt these
                            terms to your actual business model and applicable
                            laws before publishing.
                        </p>
                    </div>
                </section>

                <section class="terms-section" id="contact">
                    <h2>
                        <span class="terms-number">11</span>
                        Contact Us
                    </h2>

                    <p>
                        If you have questions about these Terms and Conditions,
                        please contact our support team through the website.
                    </p>

                    <div class="terms-contact">
                        <div>
                            <h3>Need clarification?</h3>
                            <p>
                                Contact our team if you have questions about
                                using the Keys Please Venture platform.
                            </p>
                        </div>

                        <a href="{{ route('contact') }}">
                            Contact Support <span>→</span>
                        </a>
                    </div>
                </section>

                <div class="terms-footer-links">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('website.privacy-policy') }}">
                        Privacy Policy
                    </a>
                    <a href="{{ route('contact') }}">Contact Us</a>
                </div>

            </main>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.terms-sidebar nav a');

    links.forEach(function (link) {
        link.addEventListener('click', function () {
            links.forEach(function (item) {
                item.classList.remove('active');
            });

            link.classList.add('active');
        });
    });
});
</script>

@endsection
