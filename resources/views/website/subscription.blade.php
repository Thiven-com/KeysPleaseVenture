
@extends('layouts.website')

@section('title', 'Subscription Plans')

@section('content')

<div class="subscription-page">

    {{-- PAGE HEADER --}}
    <section class="subscription-header">
        <div class="container">

            <span class="subscription-label">
                KEYS PLEASE VENTURE
            </span>

            <h1>Choose Your Subscription Plan</h1>

            <p>
                Select the right subscription plan to promote your properties
                and grow your property listings.
            </p>

        </div>
    </section>


    {{-- SUBSCRIPTION PLANS SECTION --}}
    <section class="subscription-plans-section">

        <div class="container">

            <div class="subscription-section-heading">

                <h2>Our Subscription Plans</h2>

                <p>
                    Choose the right plan based on the number of properties
                    you want to list.
                </p>

            </div>


            {{-- SUBSCRIPTION PLAN CARDS --}}
            <div class="subscription-plans-grid">


                {{-- BASIC PLAN --}}
                <div class="subscription-plan-card">

                    <div class="plan-header">

                        <h3>Basic</h3>

                        <p class="plan-description">
                            Perfect for getting started.
                        </p>

                    </div>


                    {{-- PRICE --}}
                    <div class="plan-price">

                        <span class="currency">₹</span>

                        <span class="price">499</span>

                        <span class="price-duration">
                            / month
                        </span>

                    </div>


                    {{-- PROPERTY LIMIT --}}
                    <div class="plan-listing-limit">

                        <i class="fa fa-check-circle"></i>

                        <span class="property-limit">
                            List up to 5 properties
                        </span>

                    </div>


                    {{-- FEATURES --}}
                    <ul class="plan-features">

                        <li>
                            <i class="fa fa-check"></i>
                            Property listing
                        </li>

                        <li>
                            <i class="fa fa-check"></i>
                            Property details
                        </li>

                        <li>
                            <i class="fa fa-check"></i>
                            Contact enquiry access
                        </li>

                        <li>
                            <i class="fa fa-check"></i>
                            Basic property visibility
                        </li>

                    </ul>


                    {{-- SUBSCRIBE BUTTON --}}
                    <button
                        type="button"
                        class="subscription-btn"
                        onclick="selectSubscriptionPlan('basic')"
                    >
                        Subscribe Now
                    </button>

                </div>



                {{-- PREMIUM PLAN --}}
                <div class="subscription-plan-card popular-plan">

                    <div class="popular-badge">
                        Most Popular
                    </div>


                    <div class="plan-header">

                        <h3>Premium</h3>

                        <p class="plan-description">
                            Best for growing property listings.
                        </p>

                    </div>


                    {{-- PRICE --}}
                    <div class="plan-price">

                        <span class="currency">₹</span>

                        <span class="price">999</span>

                        <span class="price-duration">
                            / month
                        </span>

                    </div>


                    {{-- PROPERTY LIMIT --}}
                    <div class="plan-listing-limit">

                        <i class="fa fa-check-circle"></i>

                        <span class="property-limit">
                            List up to 20 properties
                        </span>

                    </div>


                    {{-- FEATURES --}}
                    <ul class="plan-features">

                        <li>
                            <i class="fa fa-check"></i>
                            Property listing
                        </li>

                        <li>
                            <i class="fa fa-check"></i>
                            Property details
                        </li>

                        <li>
                            <i class="fa fa-check"></i>
                            Contact enquiry access
                        </li>

                        <li>
                            <i class="fa fa-check"></i>
                            Better property visibility
                        </li>

                        <li>
                            <i class="fa fa-check"></i>
                            More property listings
                        </li>

                    </ul>


                    {{-- SUBSCRIBE BUTTON --}}
                    <button
                        type="button"
                        class="subscription-btn premium-btn"
                        onclick="selectSubscriptionPlan('premium')"
                    >
                        Subscribe Now
                    </button>

                </div>



                {{-- BUSINESS PLAN --}}
                <div class="subscription-plan-card">

                    <div class="plan-header">

                        <h3>Business</h3>

                        <p class="plan-description">
                            For businesses with multiple properties.
                        </p>

                    </div>


                    {{-- PRICE --}}
                    <div class="plan-price">

                        <span class="currency">₹</span>

                        <span class="price">1999</span>

                        <span class="price-duration">
                            / month
                        </span>

                    </div>


                    {{-- PROPERTY LIMIT --}}
                    <div class="plan-listing-limit">

                        <i class="fa fa-check-circle"></i>

                        <span class="property-limit">
                            List up to 50 properties
                        </span>

                    </div>


                    {{-- FEATURES --}}
                    <ul class="plan-features">

                        <li>
                            <i class="fa fa-check"></i>
                            Property listing
                        </li>

                        <li>
                            <i class="fa fa-check"></i>
                            Property details
                        </li>

                        <li>
                            <i class="fa fa-check"></i>
                            Contact enquiry access
                        </li>

                        <li>
                            <i class="fa fa-check"></i>
                            Better property visibility
                        </li>

                        <li>
                            <i class="fa fa-check"></i>
                            More property listings
                        </li>

                        <li>
                            <i class="fa fa-check"></i>
                            Business listing capacity
                        </li>

                    </ul>


                    {{-- SUBSCRIBE BUTTON --}}
                    <button
                        type="button"
                        class="subscription-btn"
                        onclick="selectSubscriptionPlan('business')"
                    >
                        Subscribe Now
                    </button>

                </div>


            </div>

        </div>

    </section>



    {{-- SUBSCRIPTION INFORMATION --}}
    <section class="subscription-info-section">

        <div class="container">

            <div class="subscription-info-content">

                <h2>Why Choose Keys Please Venture?</h2>

                <p>
                    Choose a subscription plan based on the number of
                    properties you want to list. Select the plan that
                    best suits your requirements and grow your property
                    listing business.
                </p>

            </div>

        </div>

    </section>


</div>



{{-- SUBSCRIPTION PAGE CSS --}}
<style>

.subscription-page {
    background: #f7f8fc;
    color: #222;
    font-family: 'Poppins', sans-serif;
}


/* COMMON CONTAINER */

.subscription-page .container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding-left: 20px;
    padding-right: 20px;
}


/* HEADER */

.subscription-header {
    background: linear-gradient(
        135deg,
        #00068a,
        #252ba8
    );

    padding: 65px 0;
    text-align: center;
    color: #fff;
}


.subscription-label {
    display: inline-block;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 2px;
    margin-bottom: 15px;
    color: #dce0ff;
}


.subscription-header h1 {
    font-size: 38px;
    font-weight: 700;
    margin: 0 0 15px;
    color: #fff;
}


.subscription-header p {
    font-size: 16px;
    line-height: 1.8;
    max-width: 650px;
    margin: 0 auto;
    color: #e7e9ff;
}


/* SECTION HEADINGS */

.subscription-section-heading {
    text-align: center;
    margin-bottom: 40px;
}


.subscription-section-heading h2 {
    font-size: 30px;
    font-weight: 700;
    color: #00068a;
    margin-bottom: 12px;
}


.subscription-section-heading p {
    font-size: 15px;
    color: #666;
    margin: 0;
    line-height: 1.7;
}


/* SUBSCRIPTION PLANS */

.subscription-plans-section {
    padding: 65px 0 75px;
}


.subscription-plans-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 25px;
    align-items: stretch;
}


.subscription-plan-card {
    background: #fff;
    border: 1px solid #e5e7f1;
    border-radius: 15px;
    padding: 35px 28px;
    position: relative;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
}


.subscription-plan-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0, 6, 138, 0.09);
}


.subscription-plan-card.popular-plan {
    border: 2px solid #00068a;
    box-shadow: 0 10px 30px rgba(0, 6, 138, 0.08);
}


/* POPULAR BADGE */

.popular-badge {
    position: absolute;
    top: -14px;
    left: 50%;
    transform: translateX(-50%);
    background: #00068a;
    color: #fff;
    padding: 7px 20px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
}


/* PLAN HEADER */

.plan-header {
    text-align: center;
    margin-bottom: 25px;
}


.plan-header h3 {
    font-size: 24px;
    font-weight: 700;
    color: #00068a;
    margin-bottom: 10px;
}


.plan-description {
    font-size: 13px;
    color: #777;
    margin: 0;
    line-height: 1.6;
}


/* PRICE */

.plan-price {
    display: flex;
    align-items: baseline;
    justify-content: center;
    margin-bottom: 25px;
    color: #00068a;
}


.currency {
    font-size: 22px;
    font-weight: 600;
    margin-right: 3px;
}


.price {
    font-size: 42px;
    font-weight: 700;
    line-height: 1;
}


.price-duration {
    font-size: 13px;
    color: #777;
    margin-left: 5px;
}


/* PROPERTY LIMIT */

.plan-listing-limit {
    background: #f0f2ff;
    padding: 13px 12px;
    border-radius: 8px;
    margin-bottom: 25px;
    text-align: center;
    color: #00068a;
    font-size: 13px;
    font-weight: 600;
    line-height: 1.6;
}


.plan-listing-limit i {
    margin-right: 5px;
}


/* PLAN FEATURES */

.plan-features {
    list-style: none;
    padding: 0;
    margin: 0 0 30px;
    flex-grow: 1;
}


.plan-features li {
    font-size: 14px;
    color: #555;
    margin-bottom: 15px;
    display: flex;
    align-items: flex-start;
    line-height: 1.6;
}


.plan-features li i {
    color: #00068a;
    margin-right: 10px;
    margin-top: 4px;
    font-size: 13px;
}


/* SUBSCRIBE BUTTON */

.subscription-btn {
    display: block;
    width: 100%;
    background: #00068a;
    color: #fff;
    border: 2px solid #00068a;
    border-radius: 8px;
    padding: 14px 20px;
    font-family: inherit;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}


.subscription-btn:hover {
    background: #fff;
    color: #00068a;
}


.premium-btn {
    background: #00068a;
    color: #fff;
}


/* INFORMATION SECTION */

.subscription-info-section {
    padding: 60px 0;
    background: #fff;
}


.subscription-info-content {
    max-width: 800px;
    text-align: center;
    margin: 0 auto;
}


.subscription-info-content h2 {
    color: #00068a;
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 15px;
}


.subscription-info-content p {
    font-size: 15px;
    color: #666;
    line-height: 1.9;
    margin: 0;
}


/* TABLET */

@media (max-width: 991px) {

    .subscription-plans-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .subscription-plan-card:last-child {
        grid-column: 1 / -1;
        max-width: 500px;
        width: 100%;
        margin: 0 auto;
    }

    .subscription-header h1 {
        font-size: 32px;
    }

}


/* MOBILE */

@media (max-width: 767px) {

    .subscription-header {
        padding: 45px 0;
    }

    .subscription-header h1 {
        font-size: 27px;
    }

    .subscription-header p {
        font-size: 14px;
    }

    .subscription-section-heading h2 {
        font-size: 24px;
    }

    .subscription-plans-section {
        padding: 45px 0 50px;
    }

    .subscription-plans-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }

    .subscription-plan-card:last-child {
        grid-column: auto;
        max-width: none;
    }

    .subscription-plan-card {
        padding: 30px 22px;
    }

    .price {
        font-size: 38px;
    }

    .subscription-info-section {
        padding: 45px 0;
    }

    .subscription-info-content h2 {
        font-size: 24px;
    }

}

</style>



{{-- SUBSCRIPTION PAGE JAVASCRIPT --}}
<script>

    // SUBSCRIPTION PLAN SELECTION

    function selectSubscriptionPlan(plan) {

        console.log('Selected Subscription Plan:', plan);

        alert(
            'You selected the ' +
            plan +
            ' subscription plan.'
        );

    }

</script>

@endsection
