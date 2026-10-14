
@extends('layouts.website')

@section('title', 'Privacy Policy | Keys Please Venture')

@section('content')

<style>
    .privacy-page {
        --privacy-navy: #171d3b;
        --privacy-blue: #1119a5;
        --privacy-light-blue: #eef0ff;
        --privacy-text: #303750;
        --privacy-muted: #737d94;
        --privacy-border: #e0e5f0;
        background: #f6f8fd;
        color: var(--privacy-text);
        padding: 38px 20px 65px;
        font-family: inherit;
    }

    .privacy-page * {
        box-sizing: border-box;
    }

    .privacy-container {
        max-width: 1250px;
        margin: 0 auto;
    }

    /* Breadcrumb */
    .privacy-breadcrumb {
        display: flex;
        flex-wrap: wrap;
        gap: 9px;
        align-items: center;
        color: var(--privacy-muted);
        font-size: 13px;
        margin-bottom: 25px;
    }

    .privacy-breadcrumb a {
        color: var(--privacy-blue);
        text-decoration: none;
        font-weight: 600;
    }

    /* Hero */
    .privacy-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(120deg, #171d65, #303fa6);
        border-radius: 16px;
        padding: 45px 42px;
        color: white;
        margin-bottom: 25px;
    }

    .privacy-hero::after {
        content: "";
        position: absolute;
        width: 240px;
        height: 240px;
        border: 35px solid rgba(255,255,255,.07);
        border-radius: 50%;
        right: -55px;
        top: -90px;
        pointer-events: none;
    }

    .privacy-hero-content {
        position: relative;
        z-index: 1;
        max-width: 760px;
    }

    .privacy-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 13px;
        border-radius: 30px;
        background: rgba(255,255,255,.13);
        color: #fff;
        font-size: 12px;
        font-weight: 650;
        margin-bottom: 17px;
    }

    .privacy-hero h1 {
        color: #fff;
        font-size: clamp(30px, 4vw, 42px);
        line-height: 1.2;
        font-weight: 800;
        margin: 0 0 15px;
    }

    .privacy-hero p {
        max-width: 680px;
        color: #e4e9ff;
        font-size: 15px;
        line-height: 1.85;
        margin: 0;
    }

    .privacy-updated {
        margin-top: 20px;
        color: #d7ddff;
        font-size: 12px;
    }

    /* Summary cards */
    .privacy-highlights {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 30px;
    }

    .privacy-highlight-card {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        background: #fff;
        border: 1px solid var(--privacy-border);
        border-radius: 12px;
        padding: 22px;
        box-shadow: 0 4px 14px rgba(23,29,59,.025);
    }

    .privacy-highlight-icon {
        flex-shrink: 0;
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--privacy-light-blue);
        color: var(--privacy-blue);
        font-size: 22px;
        font-weight: 800;
    }

    .privacy-highlight-card h3 {
        color: var(--privacy-navy);
        font-size: 15px;
        font-weight: 750;
        margin: 2px 0 7px;
    }

    .privacy-highlight-card p {
        color: var(--privacy-muted);
        font-size: 12px;
        line-height: 1.7;
        margin: 0;
    }

    /* Main layout */
    .privacy-layout {
        display: grid;
        grid-template-columns: 285px minmax(0, 1fr);
        gap: 24px;
        align-items: start;
    }

    .privacy-sidebar,
    .privacy-content {
        background: #fff;
        border: 1px solid var(--privacy-border);
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(23,29,59,.025);
    }

    .privacy-sidebar {
        position: sticky;
        top: 25px;
        padding: 23px 17px;
    }

    .privacy-sidebar h3 {
        color: var(--privacy-navy);
        font-size: 16px;
        font-weight: 800;
        margin: 0 10px 8px;
    }

    .privacy-sidebar .privacy-sidebar-caption {
        color: var(--privacy-muted);
        font-size: 12px;
        margin: 0 10px 17px;
        line-height: 1.6;
    }

    .privacy-sidebar nav {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .privacy-sidebar a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 11px 10px;
        color: #5e6881;
        text-decoration: none;
        font-size: 12px;
        line-height: 1.5;
        font-weight: 600;
        border-radius: 8px;
        transition: background .2s, color .2s;
    }

    .privacy-sidebar a:hover,
    .privacy-sidebar a.active {
        color: var(--privacy-blue);
        background: #eef0ff;
    }

    .privacy-sidebar a.active {
        box-shadow: inset 3px 0 0 var(--privacy-blue);
    }

    .privacy-content {
        padding: 32px;
        min-width: 0;
    }

    .privacy-intro {
        background: #f7f8ff;
        border: 1px solid #e5e8ff;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 28px;
    }

    .privacy-intro h2 {
        color: var(--privacy-navy);
        font-size: 19px;
        font-weight: 800;
        margin: 0 0 10px;
    }

    .privacy-intro p {
        color: #626c85;
        font-size: 13px;
        line-height: 1.9;
        margin: 0;
    }

    .privacy-section {
        padding: 0 0 25px;
        margin-bottom: 25px;
        border-bottom: 1px solid #edf0f5;
        scroll-margin-top: 30px;
    }

    .privacy-section:last-of-type {
        margin-bottom: 0;
        border-bottom: none;
    }

    .privacy-section h2 {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        color: var(--privacy-navy);
        font-size: 19px;
        line-height: 1.5;
        font-weight: 800;
        margin: 0 0 13px;
    }

    .privacy-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 32px;
        height: 32px;
        border-radius: 9px;
        background: var(--privacy-light-blue);
        color: var(--privacy-blue);
        font-size: 13px;
        font-weight: 800;
    }

    .privacy-section p,
    .privacy-section li {
        color: #69738a;
        font-size: 13px;
        line-height: 1.95;
    }

    .privacy-section p {
        margin: 0 0 12px;
    }

    .privacy-section ul {
        padding-left: 21px;
        margin: 10px 0 14px;
    }

    .privacy-section li {
        padding-left: 3px;
        margin-bottom: 7px;
    }

    .privacy-section strong {
        color: #343d58;
    }

    .privacy-note {
        background: #f0f3ff;
        border-left: 4px solid #3445c4;
        padding: 17px 18px;
        border-radius: 8px;
        margin-top: 16px;
    }

    .privacy-note p {
        color: #505c87;
        margin: 0;
    }

    /* Support */
    .privacy-support {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 22px;
        margin-top: 28px;
        padding: 25px;
        border: 1px solid #dfe4ff;
        border-radius: 12px;
        background: linear-gradient(120deg, #f0f2ff, #fafbff);
    }

    .privacy-support h3 {
        color: var(--privacy-navy);
        font-size: 18px;
        font-weight: 800;
        margin: 0 0 8px;
    }

    .privacy-support p {
        color: var(--privacy-muted);
        font-size: 13px;
        line-height: 1.8;
        margin: 0;
    }

    .privacy-support-btn {
        flex-shrink: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 13px 19px;
        background: var(--privacy-blue);
        border: 1px solid var(--privacy-blue);
        border-radius: 8px;
        color: #fff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 750;
        transition: .2s;
    }

    .privacy-support-btn:hover {
        background: #0b127d;
        color: #fff;
    }

    .privacy-footer-links {
        display: flex;
        flex-wrap: wrap;
        gap: 17px;
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid var(--privacy-border);
    }

    .privacy-footer-links a {
        color: var(--privacy-blue);
        font-size: 12px;
        font-weight: 650;
        text-decoration: none;
    }

    .privacy-footer-links a:hover {
        text-decoration: underline;
    }

    @media (max-width: 900px) {
        .privacy-highlights {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .privacy-layout {
            grid-template-columns: 1fr;
        }

        .privacy-sidebar {
            position: static;
        }

        .privacy-sidebar nav {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .privacy-page {
            padding: 25px 13px 40px;
        }

        .privacy-hero {
            padding: 32px 23px;
            border-radius: 13px;
        }

        .privacy-hero h1 {
            font-size: 30px;
        }

        .privacy-highlight-card {
            padding: 17px;
        }

        .privacy-sidebar {
            padding: 20px 13px;
        }

        .privacy-sidebar nav {
            grid-template-columns: 1fr;
        }

        .privacy-content {
            padding: 22px 17px;
        }

        .privacy-section h2 {
            font-size: 17px;
        }

        .privacy-support {
            flex-direction: column;
            align-items: flex-start;
            padding: 22px;
        }

        .privacy-support-btn {
            width: 100%;
        }
    }
</style>

<div class="privacy-page">
    <div class="privacy-container">

        {{-- Breadcrumb --}}
        <div class="privacy-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <span>Privacy Policy</span>
        </div>

        {{-- Hero --}}
        <section class="privacy-hero">
            <div class="privacy-hero-content">
                <span class="privacy-eyebrow">
                    <span>✓</span> YOUR PRIVACY MATTERS
                </span>

                <h1>Privacy Policy</h1>

                <p>
                    At Keys Please Venture, we understand the importance of
                    your personal information. Learn how information may be
                    collected, used, and protected when you explore rental
                    properties or connect with property owners and brokers.
                </p>

                <div class="privacy-updated">
                    Last updated: 9 October 2026
                </div>
            </div>
        </section>

        {{-- Summary Cards --}}
        <div class="privacy-highlights">

            <div class="privacy-highlight-card">
                <div class="privacy-highlight-icon">✓</div>
                <div>
                    <h3>Your Information</h3>
                    <p>
                        Understand what information may be collected when
                        you use our rental platform.
                    </p>
                </div>
            </div>

            <div class="privacy-highlight-card">
                <div class="privacy-highlight-icon">⌑</div>
                <div>
                    <h3>Responsible Use</h3>
                    <p>
                        Learn how information may be used to manage enquiries
                        and provide platform services.
                    </p>
                </div>
            </div>

            <div class="privacy-highlight-card">
                <div class="privacy-highlight-icon">♙</div>
                <div>
                    <h3>Your Privacy Choices</h3>
                    <p>
                        Find out how to contact us with privacy questions
                        and requests.
                    </p>
                </div>
            </div>

        </div>

        <div class="privacy-layout">

            {{-- Sidebar --}}
            <aside class="privacy-sidebar">
                <h3>Privacy Policy</h3>

                <p class="privacy-sidebar-caption">
                    Browse the sections below to learn about our privacy practices.
                </p>

                <nav>
                    <a href="#introduction" class="active">01&nbsp; Introduction</a>
                    <a href="#information">02&nbsp; Information We Collect</a>
                    <a href="#usage">03&nbsp; How We Use Information</a>
                    <a href="#sharing">04&nbsp; Information Sharing</a>
                    <a href="#cookies">05&nbsp; Cookies & Technologies</a>
                    <a href="#security">06&nbsp; Data Security</a>
                    <a href="#retention">07&nbsp; Data Retention</a>
                    <a href="#rights">08&nbsp; Your Privacy Choices</a>
                    <a href="#third-party">09&nbsp; Third-Party Services</a>
                    <a href="#children">10&nbsp; Children's Privacy</a>
                    <a href="#changes">11&nbsp; Policy Updates</a>
                    <a href="#contact">12&nbsp; Contact Us</a>
                </nav>
            </aside>

            {{-- Policy Content --}}
            <main class="privacy-content">

                <div class="privacy-intro">
                    <h2>Your privacy, explained clearly</h2>
                    <p>
                        This policy describes our intended privacy practices
                        for tenants, property owners, brokers, and website
                        visitors. The final policy should reflect the actual
                        data collected and services used by Keys Please Venture.
                    </p>
                </div>

                <section class="privacy-section" id="introduction">
                    <h2>
                        <span class="privacy-number">01</span>
                        Introduction
                    </h2>

                    <p>
                        Keys Please Venture provides a platform to explore
                        rental properties and connect with property owners
                        and brokers. This Privacy Policy explains how
                        information may be handled when you visit our website,
                        create an account, publish a listing, or submit an enquiry.
                    </p>

                    <p>
                        By using our services, you acknowledge this policy.
                        Where applicable law requires consent, we will seek
                        that consent before processing your information.
                    </p>
                </section>

                <section class="privacy-section" id="information">
                    <h2>
                        <span class="privacy-number">02</span>
                        Information We Collect
                    </h2>

                    <p>Depending on how you use our services, information may include:</p>

                    <ul>
                        <li>
                            <strong>Personal details:</strong>
                            Name, phone number, email address, and contact
                            details you submit.
                        </li>
                        <li>
                            <strong>Account details:</strong>
                            Profile information and authentication details
                            associated with your account.
                        </li>
                        <li>
                            <strong>Rental preferences:</strong>
                            Preferred location, property type, budget, and
                            other search preferences you choose to provide.
                        </li>
                        <li>
                            <strong>Property listings:</strong>
                            Property descriptions, photographs, rental prices,
                            and information submitted by owners or brokers.
                        </li>
                        <li>
                            <strong>Enquiry information:</strong>
                            Messages and contact details submitted when
                            requesting information about a property.
                        </li>
                        <li>
                            <strong>Technical information:</strong>
                            Device, browser, log, and usage information
                            where these details are collected.
                        </li>
                    </ul>
                </section>

                <section class="privacy-section" id="usage">
                    <h2>
                        <span class="privacy-number">03</span>
                        How We Use Information
                    </h2>

                    <p>Information may be used for legitimate platform purposes, including:</p>

                    <ul>
                        <li>Creating and maintaining user accounts.</li>
                        <li>Displaying properties and relevant rental information.</li>
                        <li>Forwarding enquiries to the relevant owner or broker.</li>
                        <li>Responding to customer support requests.</li>
                        <li>Maintaining platform functionality and security.</li>
                        <li>Detecting fraud, misuse, and suspicious activity.</li>
                        <li>Improving our services and meeting legal obligations.</li>
                    </ul>
                </section>

                <section class="privacy-section" id="sharing">
                    <h2>
                        <span class="privacy-number">04</span>
                        Information Sharing
                    </h2>

                    <p>
                        When you enquire about a property, the information
                        needed to respond may be shared with the relevant
                        property owner or broker.
                    </p>

                    <p>Information may also be shared where appropriate with:</p>

                    <ul>
                        <li>Service providers supporting hosting and website operations.</li>
                        <li>Technical providers used for communications or security.</li>
                        <li>Authorities when disclosure is required by law.</li>
                        <li>Relevant parties when necessary to address fraud or protect rights.</li>
                    </ul>

                    <p>
                        Information should only be shared for appropriate
                        purposes and on a lawful basis. Our actual sharing
                        practices must be reflected accurately in this policy.
                    </p>
                </section>

                <section class="privacy-section" id="cookies">
                    <h2>
                        <span class="privacy-number">05</span>
                        Cookies and Similar Technologies
                    </h2>

                    <p>
                        Cookies and similar technologies may be used to
                        maintain website sessions, remember preferences,
                        support essential features, and understand website
                        performance where enabled.
                    </p>

                    <p>
                        You can manage cookies through your browser settings.
                        Some features may not work as expected if essential
                        cookies are disabled. Consent will be obtained where
                        required for non-essential cookies.
                    </p>
                </section>

                <section class="privacy-section" id="security">
                    <h2>
                        <span class="privacy-number">06</span>
                        Data Security
                    </h2>

                    <p>
                        We aim to use appropriate technical and organisational
                        safeguards to help protect personal information
                        against unauthorised access, loss, misuse, or disclosure.
                    </p>

                    <p>
                        No internet-based service can guarantee absolute
                        security. Users should keep account credentials
                        confidential and avoid sharing sensitive information
                        through public listings or messages.
                    </p>
                </section>

                <section class="privacy-section" id="retention">
                    <h2>
                        <span class="privacy-number">07</span>
                        Data Retention
                    </h2>

                    <p>
                        Personal information should be retained only for as
                        long as reasonably necessary for the purposes for
                        which it was collected, including providing services,
                        maintaining accounts, resolving disputes, and meeting
                        legal obligations.
                    </p>

                    <p>
                        When information is no longer required, it should be
                        securely deleted or anonymised where appropriate.
                    </p>
                </section>

                <section class="privacy-section" id="rights">
                    <h2>
                        <span class="privacy-number">08</span>
                        Your Privacy Choices
                    </h2>

                    <p>
                        Depending on applicable law, you may be able to request
                        access to, correction of, or deletion of your personal
                        information, or exercise other available privacy rights.
                    </p>

                    <p>
                        You may contact us to make a privacy request. We may
                        need to verify your identity and may be required to
                        retain certain information to comply with the law.
                    </p>

                    <div class="privacy-note">
                        <p>
                            <strong>Privacy tip:</strong> Do not share account
                            passwords, banking credentials, or unnecessary
                            sensitive information in property enquiries.
                        </p>
                    </div>
                </section>

                <section class="privacy-section" id="third-party">
                    <h2>
                        <span class="privacy-number">09</span>
                        Third-Party Services
                    </h2>

                    <p>
                        Our website may link to third-party websites or use
                        external services. Those providers may have their
                        own privacy policies and data-handling practices.
                    </p>

                    <p>
                        We recommend reviewing their privacy policies before
                        sharing information through their services.
                    </p>
                </section>

                <section class="privacy-section" id="children">
                    <h2>
                        <span class="privacy-number">10</span>
                        Children's Privacy
                    </h2>

                    <p>
                        Our rental property platform is intended for people
                        who can legally use the services. We do not intend
                        to collect children's personal information where
                        doing so would be unlawful. If you believe a child
                        has submitted personal information improperly,
                        please contact us.
                    </p>
                </section>

                <section class="privacy-section" id="changes">
                    <h2>
                        <span class="privacy-number">11</span>
                        Changes to This Policy
                    </h2>

                    <p>
                        We may update this policy when our services,
                        data-handling practices, or legal obligations change.
                        The updated version will be published on this page
                        with a revised date where appropriate.
                    </p>

                    <div class="privacy-note">
                        <p>
                            This page is a template. Before publishing, ensure
                            that it accurately describes your actual hosting,
                            analytics, cookies, communication tools, and
                            information-sharing practices.
                        </p>
                    </div>
                </section>

                <section class="privacy-section" id="contact">
                    <h2>
                        <span class="privacy-number">12</span>
                        Contact Us
                    </h2>

                    <p>
                        If you have questions about this Privacy Policy or
                        would like to submit a privacy-related request,
                        contact our support team.
                    </p>

                    <div class="privacy-support">
                        <div>
                            <h3>Need help with your privacy?</h3>
                            <p>
                                Our team can help direct your privacy questions
                                to the appropriate contact.
                            </p>
                        </div>

                        <a href="{{ route('contact') }}"
                           class="privacy-support-btn">
                            Contact Support <span>→</span>
                        </a>
                    </div>
                </section>

                <div class="privacy-footer-links">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('website.terms-and-conditions') }}">
                        Terms &amp; Conditions
                    </a>
                    <a href="{{ route('contact') }}">Contact Us</a>
                </div>

            </main>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll(
        '.privacy-sidebar nav a'
    );

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
