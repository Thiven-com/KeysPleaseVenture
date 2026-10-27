
@extends('layouts.website')

@section('title', 'Subscription Plans')

@section('content')


<style>
    
/* KEYS PLEASE VENTURE - LAUNCHING SOON */

.kp-launch-page {
    --launch-blue: #00068a;
    --launch-purple: #343bd0;
    position: relative;
    isolation: isolate;
    overflow: hidden;
    min-height: 76vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 75px 22px;
    background:
        radial-gradient(ellipse at 50% 0%, #e8eaff 0%, transparent 48%),
        linear-gradient(145deg, #f9faff 0%, #eef0ff 100%);
    font-family: 'Poppins', sans-serif;
    color: #171a36;
}

.kp-launch-content {
    position: relative;
    z-index: 2;
    width: 100%;
    max-width: 720px;
    margin: auto;
    text-align: center;
    animation: kp-launch-enter .9s ease both;
}

.kp-launch-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 11px;
    margin-bottom: 40px;
    color: var(--launch-blue);
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 1.4px;
}

.kp-launch-logo strong {
    font-weight: 800;
}

.kp-logo-mark {
    width: 40px;
    height: 40px;
    display: grid;
    place-items: center;
    color: #fff;
    background: var(--launch-blue);
    border-radius: 12px;
    font-size: 14px;
    font-weight: 800;
    letter-spacing: 0;
    box-shadow: 0 8px 20px #00068a2b;
}

.kp-launch-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 10px 17px;
    border: 1px solid #d9dcff;
    border-radius: 40px;
    background: #ffffffb8;
    color: var(--launch-blue);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.2px;
}

.kp-live-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #555ce8;
    animation: kp-live-pulse 1.7s infinite;
}

.kp-launch-icon {
    width: 108px;
    height: 108px;
    margin: 30px auto 23px;
    padding: 23px;
    border: 1px solid #ffffff;
    border-radius: 32px;
    background: linear-gradient(145deg, #fff, #e5e8ff);
    color: var(--launch-blue);
    box-shadow: 0 18px 50px #00068a12;
    animation: kp-icon-float 3.5s ease-in-out infinite;
}

.kp-launch-icon svg {
    width: 100%;
    height: 100%;
}

.kp-launch-eyebrow {
    margin: 0 0 13px;
    color: #575ec3;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 3px;
}

.kp-launch-page h1 {
    margin: 0;
    color: #181b39;
    font-size: clamp(35px, 5.5vw, 57px);
    font-weight: 800;
    letter-spacing: -2px;
    line-height: 1.18;
}

.kp-launch-page h1 span {
    display: block;
    color: var(--launch-blue);
}

.kp-launch-description {
    max-width: 570px;
    margin: 22px auto 0;
    color: #666d86;
    font-size: 14px;
    line-height: 1.95;
}

.kp-launch-progress {
    max-width: 380px;
    margin: 35px auto 0;
    text-align: left;
}

.kp-progress-label {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 11px;
    color: #515773;
    font-size: 11px;
    font-weight: 600;
}

.kp-loading-dots {
    display: inline-flex;
    gap: 4px;
}

.kp-loading-dots i {
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #3d45cc;
    animation: kp-dot-bounce .8s infinite alternate;
}

.kp-loading-dots i:nth-child(2) {
    animation-delay: .2s;
}

.kp-loading-dots i:nth-child(3) {
    animation-delay: .4s;
}

.kp-progress-track {
    height: 6px;
    overflow: hidden;
    border-radius: 10px;
    background: #dfe2fa;
}

.kp-progress-fill {
    width: 40%;
    height: 100%;
    border-radius: inherit;
    background: linear-gradient(90deg, #00068a, #777dff);
    animation: kp-progress-glow 2.5s ease-in-out infinite alternate;
}

.kp-launch-footer {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    margin-top: 40px;
    color: #7b8099;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 1.5px;
}

.kp-footer-star {
    color: #6268d7;
    font-size: 15px;
}

.kp-launch-glow {
    position: absolute;
    z-index: -1;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    filter: blur(70px);
    opacity: .38;
    pointer-events: none;
    animation: kp-glow-drift 8s ease-in-out infinite alternate;
}

.kp-launch-glow-one {
    top: 4%;
    left: -100px;
    background: #bfc5ff;
}

.kp-launch-glow-two {
    right: -100px;
    bottom: 0;
    background: #d8c9ff;
    animation-delay: -4s;
}

@keyframes kp-launch-enter {
    from {
        opacity: 0;
        transform: translateY(22px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes kp-icon-float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-9px); }
}

@keyframes kp-live-pulse {
    0%, 100% { box-shadow: 0 0 0 0 #555ce84d; }
    50% { box-shadow: 0 0 0 7px #555ce800; }
}

@keyframes kp-dot-bounce {
    from { transform: translateY(0); opacity: .45; }
    to { transform: translateY(-4px); opacity: 1; }
}

@keyframes kp-progress-glow {
    from { width: 32%; }
    to { width: 68%; }
}

@keyframes kp-glow-drift {
    from { transform: translate(0, 0); }
    to { transform: translate(35px, -25px); }
}

@media (max-width: 576px) {
    .kp-launch-page {
        min-height: 72vh;
        padding: 50px 20px;
    }

    .kp-launch-logo {
        margin-bottom: 30px;
        font-size: 11px;
        letter-spacing: 1px;
    }

    .kp-launch-badge {
        font-size: 8px;
        letter-spacing: .7px;
        padding: 9px 12px;
    }

    .kp-launch-icon {
        width: 88px;
        height: 88px;
        padding: 19px;
        border-radius: 26px;
    }

    .kp-launch-page h1 {
        letter-spacing: -1.3px;
    }

    .kp-launch-description {
        font-size: 13px;
        line-height: 1.8;
    }

    .kp-launch-footer {
        gap: 7px;
        font-size: 8px;
        letter-spacing: .7px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .kp-launch-page *,
    .kp-launch-page *::before,
    .kp-launch-page *::after {
        animation: none !important;
        transition: none !important;
    }
}

</style>


{{-- COMING SOON PAGE --}}
<div class="kp-launch-page">
    <div class="kp-launch-glow kp-launch-glow-one"></div>
    <div class="kp-launch-glow kp-launch-glow-two"></div>

    <div class="kp-launch-content">

        <div class="kp-launch-logo">
            <span class="kp-logo-mark">KP</span>
            <span>KEYS PLEASE <strong>VENTURE</strong></span>
        </div>

        <div class="kp-launch-badge">
            <span class="kp-live-dot"></span>
            SOMETHING EXCITING IS ON THE WAY
        </div>

        <div class="kp-launch-icon">
            <svg viewBox="0 0 64 64" fill="none"
                 stroke="currentColor" stroke-width="1.7"
                 stroke-linecap="round" stroke-linejoin="round">
                <path d="M10 29 32 10l22 19"/>
                <path d="M17 26v27h30V26"/>
                <path d="M26 53V37h12v16"/>
                <path d="M23 29h18"/>
                <path d="M32 20v6"/>
                <circle cx="32" cy="32" r="28"
                        stroke-dasharray="3 6"
                        opacity=".45"/>
            </svg>
        </div>

        <p class="kp-launch-eyebrow">A NEW CHAPTER BEGINS</p>

        <h1>
            Your Next Big Thing
            <span>Is Almost Here.</span>
        </h1>

        <p class="kp-launch-description">
            We're building something special to help property owners
            showcase their properties, reach more customers, and grow
            with Keys Please Venture.
        </p>

        <div class="kp-launch-progress">
            <div class="kp-progress-label">
                <span>Building something amazing</span>
                <span class="kp-loading-dots">
                    <i></i><i></i><i></i>
                </span>
            </div>

            <div class="kp-progress-track">
                <div class="kp-progress-fill"></div>
            </div>
        </div>

        <div class="kp-launch-footer">
            <span class="kp-footer-star">✦</span>
            BETTER LISTINGS. BIGGER POSSIBILITIES.
            <span class="kp-footer-star">✦</span>
        </div>

    </div>
</div>

@if(false)
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
@endif


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
