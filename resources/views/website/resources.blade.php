
@extends('layouts.website')

@section('title', 'Resources | Keys Please Venture')

@section('content')

<style>
    .resources-page {
        background: #f6f8fd;
        color: #303750;
        padding: 45px 20px 75px;
        font-family: inherit;
    }

    .resources-page * {
        box-sizing: border-box;
    }

    .res-container {
        max-width: 1250px;
        margin: 0 auto;
    }

    /* Hero Section */
    .res-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(120deg, #171d65, #303fa6);
        padding: 52px 35px;
        border-radius: 18px;
        color: #fff;
        text-align: center;
        margin-bottom: 35px;
    }

    .res-hero::after {
        content: "";
        position: absolute;
        width: 240px;
        height: 240px;
        border: 35px solid rgba(255, 255, 255, .07);
        border-radius: 50%;
        right: -70px;
        top: -110px;
        pointer-events: none;
    }

    .res-hero-content {
        position: relative;
        z-index: 1;
    }

    .res-label {
        display: inline-block;
        padding: 8px 15px;
        border-radius: 30px;
        background: rgba(255, 255, 255, .14);
        color: #fff;
        font-size: 12px;
        font-weight: 650;
        margin-bottom: 17px;
    }

    .res-hero h1 {
        color: #fff;
        font-size: clamp(30px, 4vw, 44px);
        font-weight: 800;
        line-height: 1.2;
        margin: 0 0 15px;
    }

    .res-hero p {
        max-width: 700px;
        margin: 0 auto;
        color: #e4e9ff;
        font-size: 15px;
        line-height: 1.9;
    }

    /* Search */
    .res-search-wrap {
        max-width: 680px;
        margin: 28px auto 0;
        display: flex;
        gap: 10px;
        background: #fff;
        padding: 7px;
        border: 1px solid #e0e5f0;
        border-radius: 12px;
    }

    .res-search-wrap input {
        flex: 1;
        min-width: 0;
        border: none;
        outline: none;
        padding: 12px 14px;
        color: #303750;
        font-family: inherit;
        font-size: 14px;
        background: transparent;
    }

    .res-search-wrap input::placeholder {
        color: #929bb0;
    }

    .res-search-wrap button {
        background: #1119a5;
        color: #fff;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-family: inherit;
        font-size: 13px;
        font-weight: 750;
        cursor: pointer;
        transition: background .2s ease;
    }

    .res-search-wrap button:hover {
        background: #0b127d;
    }

    /* Section Heading */
    .res-section-heading {
        display: flex;
        justify-content: space-between;
        align-items: end;
        gap: 15px;
        margin: 38px 0 20px;
    }

    .res-section-heading h2 {
        color: #171d3b;
        font-size: 26px;
        font-weight: 800;
        margin: 0 0 8px;
    }

    .res-section-heading p {
        margin: 0;
        color: #737d94;
        font-size: 14px;
        line-height: 1.7;
    }

    .res-title-line {
        width: 48px;
        height: 3px;
        background: #1119a5;
        border-radius: 10px;
        margin-top: 12px;
    }

    /* Category Filters */
    .res-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 25px;
    }

    .res-filter {
        border: 1px solid #e0e5f0;
        background: #fff;
        color: #5e6881;
        padding: 10px 18px;
        border-radius: 30px;
        cursor: pointer;
        font-family: inherit;
        font-size: 13px;
        font-weight: 650;
        transition: .2s;
    }

    .res-filter:hover,
    .res-filter.active {
        background: #1119a5;
        border-color: #1119a5;
        color: #fff;
    }

    /* Resource Cards */
    .res-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }

    .res-card {
        background: #fff;
        border: 1px solid #e0e5f0;
        border-radius: 14px;
        padding: 25px;
        display: flex;
        flex-direction: column;
        min-height: 285px;
        box-shadow: 0 4px 14px rgba(23, 29, 59, .025);
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .res-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(23, 29, 59, .09);
    }

    .res-card-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        gap: 12px;
    }

    .res-icon {
        width: 52px;
        height: 52px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #eef0ff;
        color: #1119a5;
        border-radius: 13px;
        font-size: 25px;
        font-weight: 800;
        flex-shrink: 0;
    }

    .res-tag {
        font-size: 11px;
        font-weight: 750;
        letter-spacing: .4px;
        text-transform: uppercase;
        color: #1119a5;
        background: #eef0ff;
        border-radius: 30px;
        padding: 7px 10px;
    }

    .res-card h3 {
        color: #171d3b;
        font-size: 18px;
        line-height: 1.5;
        margin: 0 0 10px;
        font-weight: 800;
    }

    .res-card p {
        color: #737d94;
        font-size: 13px;
        line-height: 1.9;
        margin: 0 0 22px;
    }

    .res-card-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #1119a5;
        font-size: 13px;
        font-weight: 750;
        text-decoration: none;
        margin-top: auto;
        transition: gap .2s ease, color .2s ease;
    }

    .res-card-link:hover {
        color: #0b127d;
        gap: 12px;
    }

    .res-card-link span {
        font-size: 18px;
    }

    /* Empty Search Results */
    .res-empty {
        display: none;
        text-align: center;
        background: #fff;
        border: 1px dashed #cbd2e5;
        border-radius: 14px;
        padding: 35px 20px;
        color: #737d94;
        margin-top: 15px;
    }

    .res-empty h3 {
        color: #171d3b;
        font-size: 18px;
        margin: 0 0 8px;
    }

    .res-empty p {
        font-size: 13px;
        margin: 0;
    }

    /* Support Section */
    .res-help {
        margin-top: 45px;
        background: linear-gradient(120deg, #f0f2ff, #fafbff);
        border: 1px solid #dfe4ff;
        border-radius: 16px;
        padding: 32px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 25px;
    }

    .res-help-content {
        max-width: 700px;
    }

    .res-help h2 {
        color: #171d3b;
        font-size: 24px;
        font-weight: 800;
        margin: 0 0 10px;
    }

    .res-help p {
        color: #737d94;
        font-size: 14px;
        line-height: 1.8;
        margin: 0;
    }

    .res-help-btn {
        flex-shrink: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 13px 22px;
        background: #1119a5;
        color: #fff;
        border-radius: 9px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 750;
        transition: background .2s ease;
    }

    .res-help-btn:hover {
        background: #0b127d;
        color: #fff;
    }

    /* Accessibility */
    .res-search-wrap input:focus-visible,
    .res-filter:focus-visible,
    .res-search-wrap button:focus-visible,
    .res-card-link:focus-visible,
    .res-help-btn:focus-visible {
        outline: 2px solid #5365ef;
        outline-offset: 3px;
    }

    /* Tablet */
    @media (max-width: 1000px) {
        .res-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }
    }

    /* Mobile */
    @media (max-width: 600px) {
        .resources-page {
            padding: 28px 14px 45px;
        }

        .res-hero {
            padding: 35px 20px;
            border-radius: 14px;
        }

        .res-hero h1 {
            font-size: 30px;
        }

        .res-hero p {
            font-size: 14px;
        }

        .res-search-wrap {
            flex-direction: column;
        }

        .res-search-wrap button {
            width: 100%;
        }

        .res-section-heading {
            align-items: flex-start;
            flex-direction: column;
        }

        .res-section-heading h2 {
            font-size: 23px;
        }

        .res-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .res-card {
            min-height: auto;
            padding: 22px;
        }

        .res-help {
            padding: 25px 20px;
            flex-direction: column;
            align-items: flex-start;
        }

        .res-help h2 {
            font-size: 21px;
        }

        .res-help-btn {
            width: 100%;
        }
    }
</style>

<div class="resources-page">
    <div class="res-container">

        {{-- Hero Section --}}
        <section class="res-hero">
            <div class="res-hero-content">

                <span class="res-label">
                    PROPERTY RESOURCE CENTRE
                </span>

                <h1>Resources for Smarter Renting</h1>

                <p>
                    Find helpful guides, practical tips, and useful information
                    for tenants, property owners, and brokers. Make your next
                    property decision with greater confidence.
                </p>

                <form class="res-search-wrap" id="resourceSearchForm">
                    <input
                        type="search"
                        id="resourceSearch"
                        placeholder="Search rental guides, safety tips..."
                        aria-label="Search resources"
                    >

                    <button type="submit">Search Resources</button>
                </form>

            </div>
        </section>

        {{-- Resources Section --}}
        <section>

            <div class="res-section-heading">
                <div>
                    <h2>Explore Our Resources</h2>
                    <p>Choose a guide based on what you need help with.</p>
                    <div class="res-title-line"></div>
                </div>
            </div>

            {{-- Category Filters --}}
            <div class="res-filters">

                <button
                    type="button"
                    class="res-filter active"
                    data-filter="all"
                    aria-pressed="true">
                    All Resources
                </button>

                <button
                    type="button"
                    class="res-filter"
                    data-filter="tenant"
                    aria-pressed="false">
                    For Tenants
                </button>

                <button
                    type="button"
                    class="res-filter"
                    data-filter="owner"
                    aria-pressed="false">
                    For Owners
                </button>

                <button
                    type="button"
                    class="res-filter"
                    data-filter="broker"
                    aria-pressed="false">
                    For Brokers
                </button>

                <button
                    type="button"
                    class="res-filter"
                    data-filter="safety"
                    aria-pressed="false">
                    Safety
                </button>

            </div>

            {{-- Resource Cards --}}
            <div class="res-grid" id="resourceGrid">

                {{-- Rental Guide --}}
                <article
                    class="res-card"
                    data-category="tenant"
                    data-search="rental guide tenant renting property house apartment">

                    <div class="res-card-top">
                        <div class="res-icon">⌂</div>
                        <span class="res-tag">Tenants</span>
                    </div>

                    <h3>Complete Rental Guide</h3>

                    <p>
                        Learn how to search for properties, compare options,
                        prepare documents, and understand rental agreements.
                    </p>

                    <a
                        href="{{ route('website.rental-guide') }}"
                        class="res-card-link">
                        Read Rental Guide <span>→</span>
                    </a>

                </article>

                {{-- FAQs --}}
                <article
                    class="res-card"
                    data-category="tenant"
                    data-search="frequently asked questions faq rent deposit agreement tenant">

                    <div class="res-card-top">
                        <div class="res-icon">?</div>
                        <span class="res-tag">Help Centre</span>
                    </div>

                    <h3>Frequently Asked Questions</h3>

                    <p>
                        Find answers to common questions about rental searches,
                        property enquiries, deposits, and the rental process.
                    </p>

                    <a
                        href="{{ route('website.faqs') }}"
                        class="res-card-link">
                        Explore FAQs <span>→</span>
                    </a>

                </article>

                {{-- Safety --}}
                <article
                    class="res-card"
                    data-category="safety"
                    data-search="safety tips scam fraud verify property owner secure rental">

                    <div class="res-card-top">
                        <div class="res-icon">✓</div>
                        <span class="res-tag">Safety</span>
                    </div>

                    <h3>Rental Safety Checklist</h3>

                    <p>
                        Discover practical ways to identify suspicious listings,
                        verify property details, and protect yourself from scams.
                    </p>

                    <a
                        href="{{ route('website.safety-tips') }}"
                        class="res-card-link">
                        View Safety Tips <span>→</span>
                    </a>

                </article>

                {{-- Property Owner --}}
                <article
                    class="res-card"
                    data-category="owner"
                    data-search="property owner list property tenants property management">

                    <div class="res-card-top">
                        <div class="res-icon">⌂</div>
                        <span class="res-tag">Owners</span>
                    </div>

                    <h3>Property Owner Essentials</h3>

                    <p>
                        Prepare your property information, keep listing details
                        accurate, and help prospective tenants understand your offer.
                    </p>

                    <a
                        href="{{ route('home') }}#list-property"
                        class="res-card-link">
                        Explore Property Listing <span>→</span>
                    </a>

                </article>

                {{-- Broker Benefits --}}
                <article
                    class="res-card"
                    data-category="broker"
                    data-search="broker benefits real estate agent property listing leads">

                    <div class="res-card-top">
                        <div class="res-icon">◇</div>
                        <span class="res-tag">Brokers</span>
                    </div>

                    <h3>Broker Resource Guide</h3>

                    <p>
                        Explore platform benefits and learn how brokers can
                        present property listings clearly and professionally.
                    </p>

                    <a
                        href="{{ route('website.broker-benefits') }}"
                        class="res-card-link">
                        View Broker Benefits <span>→</span>
                    </a>

                </article>

                {{-- Rental Documents --}}
                <article
                    class="res-card"
                    data-category="tenant"
                    data-search="rental documents checklist identity proof address proof agreement">

                    <div class="res-card-top">
                        <div class="res-icon">▤</div>
                        <span class="res-tag">Checklist</span>
                    </div>

                    <h3>Rental Documents Checklist</h3>

                    <p>
                        Get organised before visiting a property by reviewing
                        the documents and details you may need during the rental process.
                    </p>

                    <a
                        href="{{ route('website.rental-guide') }}"
                        class="res-card-link">
                        Review the Checklist <span>→</span>
                    </a>

                </article>

            </div>

            {{-- No Results --}}
            <div class="res-empty" id="resourceEmpty" role="status">
                <h3>No resources found</h3>
                <p>Try a different search term or select another category.</p>
            </div>

        </section>

        {{-- Support Section --}}
        <section class="res-help">

            <div class="res-help-content">
                <h2>Need More Help?</h2>

                <p>
                    Can't find the information you're looking for?
                    Get in touch with our team for assistance.
                </p>
            </div>

            <a href="{{ route('contact') }}" class="res-help-btn">
                Contact Support <span>→</span>
            </a>

        </section>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('resourceSearch');
    const searchForm = document.getElementById('resourceSearchForm');
    const cards = document.querySelectorAll('.res-card');
    const filters = document.querySelectorAll('.res-filter');
    const emptyMessage = document.getElementById('resourceEmpty');

    let activeCategory = 'all';

    function filterResources() {
        const query = searchInput.value.trim().toLowerCase();
        let visibleCount = 0;

        cards.forEach(function (card) {
            const category = card.dataset.category || '';

            const searchableText =
                (card.dataset.search || '') + ' ' + card.innerText;

            const matchesCategory =
                activeCategory === 'all' ||
                category === activeCategory;

            const matchesSearch =
                searchableText.toLowerCase().includes(query);

            const showCard = matchesCategory && matchesSearch;

            card.style.display = showCard ? 'flex' : 'none';

            if (showCard) {
                visibleCount++;
            }
        });

        emptyMessage.style.display =
            visibleCount === 0 ? 'block' : 'none';
    }

    filters.forEach(function (button) {
        button.addEventListener('click', function () {
            filters.forEach(function (item) {
                item.classList.remove('active');
                item.setAttribute('aria-pressed', 'false');
            });

            button.classList.add('active');
            button.setAttribute('aria-pressed', 'true');

            activeCategory = button.dataset.filter;

            filterResources();
        });
    });

    searchInput.addEventListener('input', filterResources);

    searchForm.addEventListener('submit', function (event) {
        event.preventDefault();
        filterResources();
    });
});
</script>

@endsection
