
@extends('layouts.website')

@section('title', 'FAQs | Rental Properties')

@section('content')

<style>
    .faq-page {
        color: #252943;
        background: #fff;
        font-family: inherit;
    }

    .faq-hero {
        padding: 65px 20px;
        text-align: center;
        background: linear-gradient(135deg, #f0f2ff, #ffffff);
    }

    .faq-tag {
        color: #494bc5;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 2px;
    }

    .faq-hero h1 {
        margin: 14px 0;
        font-size: clamp(30px, 5vw, 46px);
        font-weight: 800;
    }

    .faq-hero p {
        max-width: 650px;
        margin: auto;
        color: #697087;
        line-height: 1.8;
    }

    .faq-container {
        width: min(900px, 100%);
        margin: auto;
        padding: 45px 20px 65px;
    }

    .faq-search {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 25px;
        padding: 0 17px;
        border: 1px solid #e3e5ef;
        border-radius: 12px;
        background: #fff;
    }

    .faq-search span {
        color: #494bc5;
        font-size: 23px;
    }

    .faq-search input {
        width: 100%;
        padding: 16px 0;
        border: none;
        outline: none;
        color: #252943;
        background: transparent;
    }

    .faq-filters {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        margin-bottom: 30px;
    }

    .faq-filter {
        padding: 10px 17px;
        border: 1px solid #e2e4ef;
        border-radius: 30px;
        color: #626980;
        background: #fff;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        transition: .2s;
    }

    .faq-filter:hover,
    .faq-filter.active {
        color: #fff;
        background: #494bc5;
        border-color: #494bc5;
    }

    .faq-list {
        display: grid;
        gap: 14px;
    }

    .faq-item {
        overflow: hidden;
        border: 1px solid #e7e8f0;
        border-radius: 12px;
        background: #fff;
        transition: .2s;
    }

    .faq-item:hover {
        border-color: #c9cbf4;
        box-shadow: 0 6px 22px rgba(40, 45, 100, .06);
    }

    .faq-item summary {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 21px;
        cursor: pointer;
        list-style: none;
        font-size: 15px;
        font-weight: 700;
    }

    .faq-item summary::-webkit-details-marker {
        display: none;
    }

    .faq-icon {
        flex-shrink: 0;
        color: #494bc5;
        font-size: 22px;
        transition: transform .2s;
    }

    .faq-item[open] .faq-icon {
        transform: rotate(45deg);
    }

    .faq-answer {
        padding: 0 21px 21px;
        color: #697087;
        font-size: 14px;
        line-height: 1.9;
    }

    .faq-empty {
        display: none;
        padding: 25px;
        text-align: center;
        color: #697087;
        background: #f8f9fc;
        border-radius: 12px;
    }

    .faq-support {
        margin-top: 40px;
        padding: 35px 22px;
        text-align: center;
        background: #f3f4ff;
        border: 1px solid #e8e9ff;
        border-radius: 18px;
    }

    .faq-support .support-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 55px;
        height: 55px;
        margin: 0 auto 15px;
        border-radius: 15px;
        color: #494bc5;
        background: #e4e6ff;
        font-size: 25px;
    }

    .faq-support h2 {
        margin-bottom: 10px;
        font-size: 25px;
        font-weight: 800;
    }

    .faq-support p {
        max-width: 520px;
        margin: 0 auto 22px;
        color: #697087;
        line-height: 1.8;
    }

    .faq-support a {
        display: inline-block;
        padding: 13px 24px;
        color: #fff;
        background: #494bc5;
        border-radius: 9px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
        transition: .2s;
    }

    .faq-support a:hover {
        background: #34369e;
        transform: translateY(-2px);
    }

    @media (max-width: 576px) {
        .faq-hero {
            padding: 45px 18px;
        }

        .faq-container {
            padding: 30px 16px 45px;
        }

        .faq-filters {
            justify-content: flex-start;
        }

        .faq-filter {
            padding: 9px 13px;
        }

        .faq-item summary {
            padding: 17px;
            font-size: 14px;
        }

        .faq-answer {
            padding: 0 17px 18px;
        }

        .faq-support {
            padding: 28px 17px;
        }

        .faq-support h2 {
            font-size: 22px;
        }
    }
</style>

<div class="faq-page">

    {{-- Hero Section --}}
    <section class="faq-hero">
        <div class="faq-tag">HELP CENTER</div>

        <h1>Frequently Asked Questions</h1>

        <p>
            Everything you need to know about finding your ideal
            rental property, contacting owners, arranging visits
            and making informed rental decisions.
        </p>
    </section>

    <section class="faq-container">

        {{-- Search --}}
        <label class="faq-search">
            <span>⌕</span>

            <input
                type="search"
                id="faqSearch"
                placeholder="Search questions..."
                aria-label="Search FAQs"
            >
        </label>

        {{-- Category Filters --}}
        <div class="faq-filters">
            <button class="faq-filter active"
                type="button" data-category="All">
                All Questions
            </button>

            <button class="faq-filter"
                type="button" data-category="General">
                General
            </button>

            <button class="faq-filter"
                type="button" data-category="Properties">
                Properties
            </button>

            <button class="faq-filter"
                type="button" data-category="Enquiries">
                Enquiries
            </button>

            <button class="faq-filter"
                type="button" data-category="Visits">
                Visits
            </button>

            <button class="faq-filter"
                type="button" data-category="Payments">
                Payments
            </button>
        </div>

        {{-- FAQ Questions --}}
        <div class="faq-list" id="faqList">

            <details class="faq-item" data-category="General">
                <summary>
                    <span>How does this rental website work?</span>
                    <span class="faq-icon">+</span>
                </summary>
                <div class="faq-answer">
                    Browse property listings, review the details,
                    contact the owner or broker, and arrange a visit
                    to a property you are interested in.
                </div>
            </details>

            <details class="faq-item" data-category="Properties">
                <summary>
                    <span>How can I find a property within my budget?</span>
                    <span class="faq-icon">+</span>
                </summary>
                <div class="faq-answer">
                    Explore the rental listings and use the available
                    location, property type and budget filters to
                    narrow down your choices.
                </div>
            </details>

            <details class="faq-item" data-category="Properties">
                <summary>
                    <span>Can I view property photos and details?</span>
                    <span class="faq-icon">+</span>
                </summary>
                <div class="faq-answer">
                    Open a property listing to review its available
                    photos, rental price, location, amenities and
                    other published details.
                </div>
            </details>

            <details class="faq-item" data-category="Enquiries">
                <summary>
                    <span>How do I contact a property owner?</span>
                    <span class="faq-icon">+</span>
                </summary>
                <div class="faq-answer">
                    Visit the property details page and use the
                    available enquiry form to request further
                    information from the owner or broker.
                </div>
            </details>

            <details class="faq-item" data-category="Visits">
                <summary>
                    <span>Can I schedule a property visit?</span>
                    <span class="faq-icon">+</span>
                </summary>
                <div class="faq-answer">
                    Submit a visit request through the property page.
                    Confirm the date and time with the owner or broker
                    before travelling to the property.
                </div>
            </details>

            <details class="faq-item" data-category="Payments">
                <summary>
                    <span>What should I check before paying a deposit?</span>
                    <span class="faq-icon">+</span>
                </summary>
                <div class="faq-answer">
                    Verify the property and the recipient, inspect
                    the rental terms, confirm the deposit refund
                    conditions, and obtain a written receipt.
                </div>
            </details>

            <details class="faq-item" data-category="Payments">
                <summary>
                    <span>Are maintenance charges included in rent?</span>
                    <span class="faq-icon">+</span>
                </summary>
                <div class="faq-answer">
                    This depends on the individual property and
                    rental agreement. Confirm maintenance charges,
                    utilities and other additional costs with
                    the owner before agreeing to rent.
                </div>
            </details>

            <details class="faq-item" data-category="General">
                <summary>
                    <span>What documents should I prepare for renting?</span>
                    <span class="faq-icon">+</span>
                </summary>
                <div class="faq-answer">
                    Requirements vary by property and landlord.
                    Ask which identity documents and other
                    paperwork are needed before signing the
                    rental agreement.
                </div>
            </details>

        </div>

        <div class="faq-empty" id="faqEmpty">
            <h3>No questions found</h3>
            <p>Try another search term or choose a different category.</p>
        </div>

        {{-- Contact Support --}}
        <div class="faq-support">
            <div class="support-icon">?</div>

            <h2>Still Have Questions?</h2>

            <p>
                Can't find the answer you need?
                Get in touch with our team for assistance
                with your rental property enquiries.
            </p>

            <a href="{{ route('contact') }}">
                Contact Support &rarr;
            </a>
        </div>

    </section>

</div>

{{-- Search and Filter UI --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const search = document.getElementById('faqSearch');
    const items = document.querySelectorAll('.faq-item');
    const buttons = document.querySelectorAll('.faq-filter');
    const empty = document.getElementById('faqEmpty');

    let selectedCategory = 'All';

    function filterFaqs() {
        const term = search.value.trim().toLowerCase();
        let visibleCount = 0;

        items.forEach(function (item) {
            const category = item.dataset.category;
            const text = item.textContent.toLowerCase();

            const matchesCategory =
                selectedCategory === 'All' ||
                selectedCategory === category;

            const matchesSearch = text.includes(term);
            const visible = matchesCategory && matchesSearch;

            item.style.display = visible ? '' : 'none';

            if (visible) {
                visibleCount++;
            } else {
                item.open = false;
            }
        });

        empty.style.display =
            visibleCount === 0 ? 'block' : 'none';
    }

    search.addEventListener('input', filterFaqs);

    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            selectedCategory = button.dataset.category;

            buttons.forEach(function (item) {
                item.classList.toggle(
                    'active',
                    item === button
                );
            });

            filterFaqs();
        });
    });

    filterFaqs();
});
</script>

@endsection
