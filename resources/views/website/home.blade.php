@extends('layouts.website')
@section('content')


    <section class="hero">
        <div class="container hero-inner">

            <!-- Hero Content -->
            <div class="hero-copy">

                <div class="eyebrow">
                    BANGALORE'S TRUSTED RENTAL PLATFORM
                </div>

                <h1>
                    Find Your Perfect<br>
                    Rental Home in<br>
                    <strong>Bangalore</strong>
                </h1>

                <p>
                    Explore verified rental properties across top localities.<br>
                    Connect with trusted brokers. 100% transparent.
                </p>

            </div>


            <!-- Search Card -->
            <!-- Search Card -->
            <div class="rpf-search-card">

                <div class="rpf-tabs">
                    <button class="rpf-tab rpf-tab-active" type="button" data-mode="rent">
                        <i class="fa-solid fa-house"></i> Rent
                    </button>

                    <button class="rpf-tab" type="button" data-mode="locality">
                        <i class="fa-solid fa-location-dot"></i> By Locality
                    </button>
                </div>

                <div class="rpf-form-grid">

                    <!-- Location -->
                    <div class="rpf-field">
                        <label for="rpfLocation">Location</label>

                        <div class="rpf-control" id="rpfLocationControl">
                            <i class="fa-solid fa-location-dot"></i>

                            <input type="text" id="rpfLocation" name="rpfLocation"
                                placeholder="Search Locality, Area or Landmark" autocomplete="off">

                            <span class="rpf-control-icon rpf-clear-icon" id="rpfLocationClear" style="display:none;">
                                <i class="fa-solid fa-xmark"></i>
                            </span>

                            <div class="rpf-dropdown" id="rpfLocationDropdown">
                                <button type="button" data-value="Koramangala">
                                    <i class="fa-solid fa-location-dot"></i> Koramangala
                                </button>
                                <button type="button" data-value="HSR Layout">
                                    <i class="fa-solid fa-location-dot"></i> HSR Layout
                                </button>
                                <button type="button" data-value="Indiranagar">
                                    <i class="fa-solid fa-location-dot"></i> Indiranagar
                                </button>
                                <button type="button" data-value="Whitefield">
                                    <i class="fa-solid fa-location-dot"></i> Whitefield
                                </button>
                                <button type="button" data-value="Electronic City">
                                    <i class="fa-solid fa-location-dot"></i> Electronic City
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Property Type -->
                    <div class="rpf-field">
                        <label for="rpfPropertyType">Property Type</label>

                        <div class="rpf-control" id="rpfPropertyTypeControl" data-target="rpfPropertyTypeDropdown">
                            <span class="rpf-control-value" id="rpfPropertyTypeValue">Any Type</span>
                            <span class="rpf-control-icon">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>

                            <div class="rpf-dropdown" id="rpfPropertyTypeDropdown">
                                <button type="button" data-value="Any Type">Any Type</button>
                                <button type="button" data-value="Apartment">Apartment</button>
                                <button type="button" data-value="Villa">Villa</button>
                                <button type="button" data-value="Independent House">Independent House</button>
                                <button type="button" data-value="PG">PG</button>
                            </div>
                        </div>
                    </div>

                    <!-- BHK -->
                    <div class="rpf-field">
                        <label for="rpfBhk">BHK</label>

                        <div class="rpf-control" id="rpfBhkControl" data-target="rpfBhkDropdown">
                            <span class="rpf-control-value" id="rpfBhkValue">Any</span>
                            <span class="rpf-control-icon">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>

                            <div class="rpf-dropdown" id="rpfBhkDropdown">
                                <button type="button" data-value="Any">Any</button>
                                <button type="button" data-value="1">1 BHK</button>
                                <button type="button" data-value="2">2 BHK</button>
                                <button type="button" data-value="3">3 BHK</button>
                                <button type="button" data-value="4">4+ BHK</button>
                            </div>
                        </div>
                    </div>

                    <!-- Rent Range -->
                    <div class="rpf-field">
                        <label for="rpfRentRange">Rent Range</label>

                        <div class="rpf-control" id="rpfRentRangeControl" data-target="rpfRentRangeDropdown">
                            <span class="rpf-control-value" id="rpfRentRangeValue">Any Range</span>
                            <span class="rpf-control-icon">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>

                            <div class="rpf-dropdown" id="rpfRentRangeDropdown">
                                <button type="button" data-value="Any Range">Any Range</button>
                                <button type="button" data-value="0-25000">₹ 0 - ₹ 25,000</button>
                                <button type="button" data-value="25000-50000">₹ 25,000 - ₹ 50,000</button>
                                <button type="button" data-value="50000-75000">₹ 50,000 - ₹ 75,000</button>
                                <button type="button" data-value="75000+">₹ 75,000+</button>
                            </div>
                        </div>
                    </div>

                </div>

                <button class="rpf-search-btn" type="button" onclick="rpfSearchProperties()">
                    <i class="fa-solid fa-magnifying-glass"></i> Search Properties
                </button>

            </div>

        </div>
    </section>


    <div class="container">
        <div class="trust">

            <div class="trust-item">
                <div class="trust-icon"><i class="fa-solid fa-circle-check"></i></div>

                <div class="trust-content">
                    <div class="trust-title">
                        Verified Properties
                    </div>

                    <div class="trust-sub">
                        All listings are verified
                    </div>
                </div>
            </div>


            <div class="trust-item">
                <div class="trust-icon"><i class="fa-solid fa-user-tie"></i></div>

                <div class="trust-content">
                    <div class="trust-title">
                        Trusted Brokers
                    </div>

                    <div class="trust-sub">
                        Connect with professional brokers
                    </div>
                </div>
            </div>


            <div class="trust-item">
                <div class="trust-icon"><i class="fa-solid fa-lock"></i></div>

                <div class="trust-content">
                    <div class="trust-title">
                        Secure Enquiries
                    </div>

                    <div class="trust-sub">
                        Your data is safe with us
                    </div>
                </div>
            </div>


            <div class="trust-item">
                <div class="trust-icon"><i class="fa-solid fa-eye"></i></div>

                <div class="trust-content">
                    <div class="trust-title">
                        No Hidden Charges
                    </div>

                    <div class="trust-sub">
                        100% transparent process
                    </div>
                </div>
            </div>

        </div>
    </div>



    <section id="localities" class="reveal">

        <div class="container">

            <div class="section-head">
                <h2>Popular Localities in Bangalore</h2>

                <a class="view" href="#">
                    View all localities <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>


            <div class="locality-grid stagger">

                <a class="locality" href="#">
                    <img src="https://images.unsplash.com/photo-1511818966892-d7d671e672a2?auto=format&fit=crop&w=500&q=80"
                        alt="Whitefield">

                    <div class="name"><i class="fa-solid fa-location-dot"></i> Whitefield</div>
                    <div class="count">1,250+ Properties</div>
                </a>


                <a class="locality" href="#">
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=500&q=80"
                        alt="Koramangala">

                    <div class="name"><i class="fa-solid fa-location-dot"></i> Koramangala</div>
                    <div class="count">980+ Properties</div>
                </a>


                <a class="locality" href="#">
                    <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=500&q=80"
                        alt="Indiranagar">

                    <div class="name"><i class="fa-solid fa-location-dot"></i> Indiranagar</div>
                    <div class="count">850+ Properties</div>
                </a>


                <a class="locality" href="#">
                    <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=500&q=80"
                        alt="HSR Layout">

                    <div class="name"><i class="fa-solid fa-location-dot"></i> HSR Layout</div>
                    <div class="count">760+ Properties</div>
                </a>


                <a class="locality" href="#">
                    <img src="https://images.unsplash.com/photo-1487958449943-2429e8be8625?auto=format&fit=crop&w=500&q=80"
                        alt="Marathahalli">

                    <div class="name"><i class="fa-solid fa-location-dot"></i> Marathahalli</div>
                    <div class="count">680+ Properties</div>
                </a>


                <a class="locality" href="#">
                    <img src="https://images.unsplash.com/photo-1511818966892-d7d671e672a2?auto=format&fit=crop&w=500&q=80"
                        alt="Bellandur">

                    <div class="name"><i class="fa-solid fa-location-dot"></i> Bellandur</div>
                    <div class="count">540+ Properties</div>
                </a>


                <a class="locality" href="#">
                    <img src="https://images.unsplash.com/photo-1494526585095-c41746248156?auto=format&fit=crop&w=500&q=80"
                        alt="JP Nagar">

                    <div class="name"><i class="fa-solid fa-location-dot"></i> JP Nagar</div>
                    <div class="count">620+ Properties</div>
                </a>


                <a class="locality" href="#">
                    <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=500&q=80"
                        alt="Electronic City">

                    <div class="name"><i class="fa-solid fa-location-dot"></i> Electronic City</div>
                    <div class="count">1,100+ Properties</div>
                </a>

            </div>

        </div>

    </section>



    <section id="properties" class="reveal">

        <div class="container">

            <div class="section-head">
                <h2>Featured Rental Properties</h2>

                <a class="view" href="#">
                    View all properties <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>


            <div class="property-grid stagger">

                <!-- Property 1 -->
                <article class="card">

                    <div class="card-image">

                        <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=800&q=85"
                            alt="2 BHK Apartment in Indiranagar">

                        <span class="badge">FEATURED</span>

                        <button class="heart" type="button" aria-label="Add to favorites">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <span class="location">
                            <i class="fa-solid fa-location-dot"></i> Indiranagar
                        </span>

                    </div>


                    <div class="card-body">

                        <div class="price">
                            ₹ 28,000
                            <span>/month</span>
                        </div>

                        <div class="title">
                            2 BHK Apartment
                        </div>

                        <div class="place">
                            Indiranagar, Bangalore
                        </div>

                        <div class="meta">
                            <span><i class="fa-solid fa-bed"></i> 2</span>
                            <span><i class="fa-solid fa-bath"></i> 2</span>
                            <span><i class="fa-solid fa-ruler-combined"></i> 1100 sq.ft</span>
                        </div>

                        <span class="tag">
                            Semi Furnished
                        </span>

                        <div class="broker">

                            <div class="avatar">
                                RP
                            </div>

                            <div class="broker-info">

                                <div class="broker-name">
                                    Ravi Properties
                                </div>

                                <div class="verified">
                                    <i class="fa-solid fa-circle-check"></i> Verified Broker
                                </div>

                            </div>

                        </div>

                    </div>

                </article>


                <!-- Property 2 -->
                <article class="card">

                    <div class="card-image">

                        <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=800&q=85"
                            alt="3 BHK Apartment in Koramangala">

                        <span class="badge">FEATURED</span>

                        <button class="heart" type="button" aria-label="Add to favorites">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <span class="location">
                            <i class="fa-solid fa-location-dot"></i> Koramangala
                        </span>

                    </div>


                    <div class="card-body">

                        <div class="price">
                            ₹ 45,000
                            <span>/month</span>
                        </div>

                        <div class="title">
                            3 BHK Apartment
                        </div>

                        <div class="place">
                            Koramangala 4th Block, Bangalore
                        </div>

                        <div class="meta">
                            <span><i class="fa-solid fa-bed"></i> 3</span>
                            <span><i class="fa-solid fa-bath"></i> 2</span>
                            <span><i class="fa-solid fa-ruler-combined"></i> 1600 sq.ft</span>
                        </div>

                        <span class="tag">
                            Fully Furnished
                        </span>

                        <div class="broker">

                            <div class="avatar">
                                US
                            </div>

                            <div class="broker-info">

                                <div class="broker-name">
                                    Urban Spaces
                                </div>

                                <div class="verified">
                                    <i class="fa-solid fa-circle-check"></i> Verified Broker
                                </div>

                            </div>

                        </div>

                    </div>

                </article>


                <!-- Property 3 -->
                <article class="card">

                    <div class="card-image">

                        <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=800&q=85"
                            alt="1 BHK Apartment in Whitefield">

                        <span class="badge new">
                            NEW
                        </span>

                        <button class="heart" type="button" aria-label="Add to favorites">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <span class="location">
                            <i class="fa-solid fa-location-dot"></i> Whitefield
                        </span>

                    </div>


                    <div class="card-body">

                        <div class="price">
                            ₹ 22,000
                            <span>/month</span>
                        </div>

                        <div class="title">
                            1 BHK Apartment
                        </div>

                        <div class="place">
                            Whitefield, Bangalore
                        </div>

                        <div class="meta">
                            <span><i class="fa-solid fa-bed"></i> 1</span>
                            <span><i class="fa-solid fa-bath"></i> 1</span>
                            <span><i class="fa-solid fa-ruler-combined"></i> 650 sq.ft</span>
                        </div>

                        <span class="tag">
                            Semi Furnished
                        </span>

                        <div class="broker">

                            <div class="avatar">
                                WR
                            </div>

                            <div class="broker-info">

                                <div class="broker-name">
                                    Whitefield Realty
                                </div>

                                <div class="verified">
                                    <i class="fa-solid fa-circle-check"></i> Verified Broker
                                </div>

                            </div>

                        </div>

                    </div>

                </article>


                <!-- Property 4 -->
                <article class="card">

                    <div class="card-image">

                        <img src="https://images.unsplash.com/photo-1600607688969-a5bfcd646154?auto=format&fit=crop&w=800&q=85"
                            alt="3 BHK Apartment in HSR Layout">

                        <span class="badge new">
                            NEW
                        </span>

                        <button class="heart" type="button" aria-label="Add to favorites">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <span class="location">
                            <i class="fa-solid fa-location-dot"></i> HSR Layout
                        </span>

                    </div>


                    <div class="card-body">

                        <div class="price">
                            ₹ 55,000
                            <span>/month</span>
                        </div>

                        <div class="title">
                            3 BHK Apartment
                        </div>

                        <div class="place">
                            HSR Layout, Bangalore
                        </div>

                        <div class="meta">
                            <span><i class="fa-solid fa-bed"></i> 3</span>
                            <span><i class="fa-solid fa-bath"></i> 3</span>
                            <span><i class="fa-solid fa-ruler-combined"></i> 1800 sq.ft</span>
                        </div>

                        <span class="tag">
                            Semi Furnished
                        </span>

                        <div class="broker">

                            <div class="avatar">
                                LB
                            </div>

                            <div class="broker-info">

                                <div class="broker-name">
                                    Home Line Brokers
                                </div>

                                <div class="verified">
                                    <i class="fa-solid fa-circle-check"></i> Verified Broker
                                </div>

                            </div>

                        </div>

                    </div>

                </article>

            </div>

        </div>

    </section>



    <section id="types" class="reveal">

        <div class="container">

            <div class="section-head">
                <h2>Browse Rental Properties by Type</h2>
            </div>


            <div class="type-grid stagger">

                <a class="type" href="#">
                    <div class="type-icon"><i class="fa-solid fa-building"></i></div>

                    <div class="type-name">
                        Apartment
                    </div>

                    <div class="type-count">
                        5,200+ Properties
                    </div>
                </a>


                <a class="type" href="#">
                    <div class="type-icon"><i class="fa-solid fa-house"></i></div>

                    <div class="type-name">
                        Independent House
                    </div>

                    <div class="type-count">
                        2,100+ Properties
                    </div>
                </a>


                <a class="type" href="#">
                    <div class="type-icon"><i class="fa-solid fa-layer-group"></i></div>

                    <div class="type-name">
                        Builder Floor
                    </div>

                    <div class="type-count">
                        850+ Properties
                    </div>
                </a>


                <a class="type" href="#">
                    <div class="type-icon"><i class="fa-solid fa-door-open"></i></div>

                    <div class="type-name">
                        Studio Apartment
                    </div>

                    <div class="type-count">
                        620+ Properties
                    </div>
                </a>


                <a class="type" href="#">
                    <div class="type-icon"><i class="fa-solid fa-people-roof"></i></div>

                    <div class="type-name">
                        PG / Co-Living
                    </div>

                    <div class="type-count">
                        1,100+ Properties
                    </div>
                </a>


                <a class="type" href="#">
                    <div class="type-icon"><i class="fa-solid fa-house-chimney"></i></div>

                    <div class="type-name">
                        Villa
                    </div>

                    <div class="type-count">
                        480+ Properties
                    </div>
                </a>

            </div>

        </div>

    </section>

    <section id="about" class="reveal">
        <div class="container">

            <div class="section-head">
                <h2>Why Choose Keys Please Venture?</h2>
            </div>

            <div class="why-grid stagger">

                <!-- Why 1 -->
                <!-- Why 1 -->
                <div class="why">
                    <div class="why-icon"><i class="fa-solid fa-circle-check"></i></div>

                    <h3>Only Verified Listings</h3>

                    <p>
                        All properties are verified for your safety.
                    </p>
                </div>


                <!-- Why 2 -->
                <div class="why">
                    <div class="why-icon"><i class="fa-solid fa-magnifying-glass-location"></i></div>

                    <h3>Easy Area-wise Search</h3>

                    <p>
                        Find properties in your preferred localities.
                    </p>
                </div>


                <!-- Why 3 -->
                <div class="why">
                    <div class="why-icon"><i class="fa-solid fa-lock"></i></div>

                    <h3>Secure &amp; Transparent</h3>

                    <p>
                        100% transparent process with no hidden charges.
                    </p>
                </div>


                <!-- Why 4 -->
                <div class="why">
                    <div class="why-icon"><i class="fa-solid fa-bolt"></i></div>

                    <h3>Quick Enquiry</h3>

                    <p>
                        Get quick response from brokers &amp; owners.
                    </p>
                </div>


                <!-- Why 5 -->
                <div class="why">
                    <div class="why-icon"><i class="fa-solid fa-people-group"></i></div>

                    <h3>Trusted by Thousands</h3>

                    <p>
                        Helping 1000+ families find homes.
                    </p>
                </div>

            </div>

        </div>
    </section>


    <div class="container">

        <div class="cta-row">

            <!-- Brokerage Policy -->
            <div class="policy">

                <div class="policy-icon">
                    <i class="fa-solid fa-percent"></i>
                </div>

                <div class="policy-content">

                    <h3>Brokerage Policy</h3>

                    <p>
                        One month's rent will be applicable as brokerage
                        upon successful closure of the rental agreement / deal.
                    </p>

                </div>

            </div>


            <!-- Owner / Broker CTA -->
            <div class="cta" id="brokers">

                <div class="cta-content">

                    <h2>
                        Are you a Property Owner or Broker?
                    </h2>

                    <p>
                        List your rental properties and connect with genuine tenants.
                        <br>
                        Grow your business with Keys Please Venture.
                    </p>

                    <button type="button">
                        List Your Property Now
                        <span><i class="fa-solid fa-arrow-right"></i></span>
                    </button>

                </div>

            </div>

        </div>

    </div>

    <!-- =========================================================
                                                                                     NEWSLETTER
                                                                                     ========================================================= -->

    <div class="newsletter">

        <div class="container news-inner">

            <div class="news-content">

                <div class="news-title">
                    Stay Updated
                </div>

                <div class="news-sub">
                    Subscribe to get the latest rental properties in Bangalore.
                </div>

            </div>


            <form class="subscribe" id="subscribeForm" action="{{ route('subscribe.store') }}" method="POST">
                @csrf

                <i class="fa-solid fa-envelope"></i>

                <input id="email" type="email" name="email" placeholder="Enter your email address" autocomplete="email"
                    required>

                <button type="submit">
                    Subscribe
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>

        </div>

    </div>



    <script>
        (function () {

            // ---- Tabs ----
            var rpfTabs = document.querySelectorAll('.rpf-tab');
            rpfTabs.forEach(function (tab) {
                tab.addEventListener('click', function () {
                    rpfTabs.forEach(function (t) { t.classList.remove('rpf-tab-active'); });
                    tab.classList.add('rpf-tab-active');
                });
            });

            // ---- Generic dropdown controls (Property Type, BHK, Rent Range) ----
            var rpfControls = document.querySelectorAll('.rpf-control[data-target]');

            function rpfCloseAllDropdowns(except) {
                document.querySelectorAll('.rpf-dropdown').forEach(function (dd) {
                    if (dd !== except) {
                        dd.classList.remove('rpf-dropdown-open');
                    }
                });
                document.querySelectorAll('.rpf-control').forEach(function (c) {
                    var dd = c.querySelector('.rpf-dropdown');
                    if (!dd || dd !== except) {
                        c.classList.remove('rpf-control-open');
                    }
                });
            }

            rpfControls.forEach(function (control) {
                var dropdownId = control.getAttribute('data-target');
                var dropdown = document.getElementById(dropdownId);
                var valueEl = control.querySelector('.rpf-control-value');

                control.addEventListener('click', function (e) {
                    e.stopPropagation();
                    var isOpen = dropdown.classList.contains('rpf-dropdown-open');
                    rpfCloseAllDropdowns();
                    if (!isOpen) {
                        dropdown.classList.add('rpf-dropdown-open');
                        control.classList.add('rpf-control-open');
                    }
                });

                dropdown.querySelectorAll('button').forEach(function (btn) {
                    btn.addEventListener('click', function (e) {
                        e.stopPropagation();
                        valueEl.textContent = btn.textContent.trim();
                        dropdown.classList.remove('rpf-dropdown-open');
                        control.classList.remove('rpf-control-open');
                    });
                });
            });

            // ---- Location input + dropdown ----
            var rpfLocationControl = document.getElementById('rpfLocationControl');
            var rpfLocationInput = document.getElementById('rpfLocation');
            var rpfLocationDropdown = document.getElementById('rpfLocationDropdown');
            var rpfLocationClear = document.getElementById('rpfLocationClear');

            rpfLocationInput.addEventListener('focus', function () {
                rpfCloseAllDropdowns(rpfLocationDropdown);
                rpfLocationDropdown.classList.add('rpf-dropdown-open');
                rpfLocationControl.classList.add('rpf-control-open');
            });

            rpfLocationInput.addEventListener('input', function () {
                rpfLocationClear.style.display = rpfLocationInput.value ? 'flex' : 'none';
            });

            rpfLocationClear.addEventListener('click', function (e) {
                e.stopPropagation();
                rpfLocationInput.value = '';
                rpfLocationClear.style.display = 'none';
                rpfLocationInput.focus();
            });

            rpfLocationDropdown.querySelectorAll('button').forEach(function (btn) {
                btn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    rpfLocationInput.value = btn.getAttribute('data-value');
                    rpfLocationClear.style.display = 'flex';
                    rpfLocationDropdown.classList.remove('rpf-dropdown-open');
                    rpfLocationControl.classList.remove('rpf-control-open');
                });
            });

            // ---- Close dropdowns when clicking outside ----
            document.addEventListener('click', function () {
                rpfCloseAllDropdowns();
            });

        })();

        function rpfSearchProperties() {
            var location = document.getElementById('rpfLocation').value;
            var propertyType = document.getElementById('rpfPropertyTypeValue').textContent;
            var bhk = document.getElementById('rpfBhkValue').textContent;
            var rentRange = document.getElementById('rpfRentRangeValue').textContent;

            var params = new URLSearchParams();
            if (location) params.set('location', location);
            if (propertyType && propertyType !== 'Any Type') params.set('property_type', propertyType);
            if (bhk && bhk !== 'Any') params.set('bhk', bhk);
            if (rentRange && rentRange !== 'Any Range') params.set('rent_range', rentRange);

            // Laravel route: Route::get('propertydetails', ...)->name('propertydetails')
            var url = '/rent';
            var query = params.toString();
            if (query) {
                url += '?' + query;
            }

            window.location.href = url;
        }
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const subscribeForm = document.getElementById('subscribeForm');

            if (!subscribeForm) return;

            subscribeForm.addEventListener('submit', async function (event) {
                event.preventDefault();

                const button = subscribeForm.querySelector('button[type="submit"]');
                const originalText = button.innerHTML;

                button.disabled = true;
                button.innerHTML =
                    '<i class="fa-solid fa-spinner fa-spin"></i> Subscribing...';

                try {
                    const formData = new FormData(subscribeForm);

                    const response = await fetch(subscribeForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const result = await response.json();

                    if (!response.ok) {
                        const firstError = result.errors
                            ? Object.values(result.errors).flat()[0]
                            : result.message;

                        Swal.fire({
                            icon: 'error',
                            title: 'Subscription Failed',
                            text: firstError || 'Unable to subscribe. Please try again.',
                            confirmButtonColor: '#071b3d'
                        });

                        return;
                    }

                    if (result.success) {

                        subscribeForm.reset();

                        Swal.fire({
                            icon: 'success',
                            title: 'Subscribed!',
                            text: result.message || 'You have subscribed successfully.',
                            confirmButtonColor: '#071b3d'
                        });

                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Subscription Failed',
                            text: result.message || 'Unable to subscribe. Please try again.',
                            confirmButtonColor: '#071b3d'
                        });
                    }

                } catch (error) {

                    console.error('Subscription error:', error);

                    Swal.fire({
                        icon: 'error',
                        title: 'Something Went Wrong',
                        text: 'Unable to subscribe. Please try again.',
                        confirmButtonColor: '#071b3d'
                    });

                } finally {

                    button.disabled = false;
                    button.innerHTML = originalText;

                }
            });

        });
    </script>

@endsection


<style id="keys-please-responsive-final">
    /* =========================================================
   KEYS PLEASE — FINAL RESPONSIVE SYSTEM
   Existing HTML, routes, JS, API calls and business logic
   are intentionally untouched.
========================================================= */

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    html,
    body {
        width: 100%;
        max-width: 100%;
        overflow-x: hidden;
    }

    body {
        margin: 0;
    }

    img,
    svg,
    video,
    iframe,
    canvas {
        display: block;
        max-width: 100%;
    }

    button,
    input,
    select,
    textarea {
        max-width: 100%;
    }

    .container {
        width: min(100% - 40px, 1600px);
        margin-inline: auto;
    }

    /* ---------- HERO ---------- */

    .hero {
        width: 100%;
        min-height: clamp(460px, 42vw, 550px);
        overflow: hidden;
    }

    .hero-inner {
        width: 100%;
        max-width: 1600px;
        min-width: 0;
    }

    .hero-copy,
    .search-card,
    .rpf-search-card {
        min-width: 0;
    }

    .hero h1,
    .hero p,
    .eyebrow {
        max-width: 100%;
    }

    .hero p br {
        display: none;
    }

    /* ---------- SEARCH ---------- */

    .search-card,
    .rpf-search-card {
        max-width: 100%;
    }

    .search-tabs,
    .rpf-tabs {
        display: flex;
        flex-wrap: wrap;
    }

    .form-grid,
    .rpf-form-grid {
        min-width: 0;
    }

    .field,
    .rpf-field {
        min-width: 0;
    }

    .control,
    .rpf-control {
        min-width: 0;
        max-width: 100%;
    }

    .control input,
    .rpf-control input {
        min-width: 0;
        max-width: 100%;
    }

    .control-dropdown,
    .rpf-dropdown {
        max-width: 100%;
        z-index: 1000;
    }

    .search-btn,
    .rpf-search-btn {
        width: 100%;
        max-width: 100%;
    }

    /* ---------- TRUST ---------- */

    .trust {
        width: 100%;
        min-width: 0;
    }

    .trust-item,
    .trust-content {
        min-width: 0;
    }

    .trust-title,
    .trust-sub {
        white-space: normal;
        overflow-wrap: anywhere;
    }

    /* ---------- SECTIONS ---------- */

    section {
        width: 100%;
        min-width: 0;
    }

    .section-head {
        min-width: 0;
        gap: 16px;
    }

    .section-head h2 {
        min-width: 0;
        overflow-wrap: anywhere;
    }

    .view {
        flex: 0 0 auto;
        white-space: nowrap;
    }

    /* ---------- GRIDS ---------- */

    .locality-grid,
    .property-grid,
    .type-grid,
    .why-grid {
        width: 100%;
        min-width: 0;
    }

    .locality,
    .card,
    .type,
    .why {
        min-width: 0;
        max-width: 100%;
    }

    .locality img,
    .card-image,
    .card-image img {
        width: 100%;
        max-width: 100%;
    }

    .card-image img,
    .locality img {
        object-fit: cover;
    }

    .card-body,
    .broker,
    .broker-info {
        min-width: 0;
    }

    .place,
    .broker-name,
    .type-name {
        max-width: 100%;
        overflow-wrap: anywhere;
    }

    /* Keep metadata usable on narrow cards */
    .meta {
        display: flex;
        flex-wrap: wrap;
        min-width: 0;
    }

    .meta span {
        max-width: 100%;
        white-space: normal;
    }

    /* ---------- CTA / NEWSLETTER ---------- */

    .cta-row {
        width: 100%;
        min-width: 0;
    }

    .policy,
    .cta,
    .policy-content,
    .cta-content,
    .news-inner,
    .news-content,
    .subscribe {
        min-width: 0;
        max-width: 100%;
    }

    .cta p,
    .policy p,
    .news-sub {
        overflow-wrap: anywhere;
    }

    .subscribe {
        display: flex;
    }

    .subscribe input {
        min-width: 0;
        width: 100%;
    }

    .subscribe button {
        flex: 0 0 auto;
    }

    /* =========================================================
   LARGE DESKTOP — 1441px+
========================================================= */

    @media (min-width: 1441px) {
        .container {
            width: min(100% - 64px, 1600px);
        }

        .hero-inner {
            gap: 56px;
        }

        .hero-copy {
            width: min(52%, 680px);
        }

        .hero h1 {
            font-size: clamp(38px, 3vw, 48px);
        }

        .search-card,
        .rpf-search-card {
            width: min(480px, 42vw);
        }

        .locality-grid {
            grid-template-columns: repeat(8, minmax(0, 1fr));
        }

        .property-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .type-grid {
            grid-template-columns: repeat(6, minmax(0, 1fr));
        }

        .why-grid {
            grid-template-columns: repeat(5, minmax(0, 1fr));
        }
    }

    /* =========================================================
   DESKTOP — 1025px–1440px
========================================================= */

    @media (min-width: 1025px) and (max-width: 1440px) {
        .container {
            width: calc(100% - 48px);
            max-width: 1360px;
        }

        .hero-inner {
            gap: clamp(24px, 3vw, 42px);
        }

        .hero-copy {
            width: min(50%, 620px);
        }

        .hero h1 {
            font-size: clamp(34px, 3vw, 42px);
        }

        .search-card,
        .rpf-search-card {
            width: min(450px, 44vw);
        }

        .locality-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .property-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .type-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .why-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    /* =========================================================
   SMALL LAPTOP — 769px–1024px
========================================================= */

    @media (min-width: 769px) and (max-width: 1024px) {
        .container {
            width: calc(100% - 32px);
            max-width: 960px;
        }

        .hero {
            min-height: auto;
        }

        .hero-inner {
            min-height: 0;
            padding: 40px 0 55px;
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(320px, 430px);
            gap: 28px;
            align-items: center;
        }

        .hero-copy {
            width: auto;
        }

        .hero h1 {
            font-size: clamp(32px, 4vw, 40px);
        }

        .hero p {
            max-width: 420px;
        }

        .search-card,
        .rpf-search-card {
            width: 100%;
        }

        .locality-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
        }

        .property-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .type-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
        }

        .why-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .cta-row {
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .news-inner {
            flex-wrap: wrap;
            gap: 16px;
        }

        .subscribe {
            width: min(100%, 440px);
        }
    }

    /* =========================================================
   TABLET — 481px–768px
========================================================= */

    @media (min-width: 481px) and (max-width: 768px) {
        .container {
            width: calc(100% - 28px);
        }

        .hero {
            min-height: auto;
        }

        .hero-inner {
            min-height: 0;
            padding: 34px 0 48px;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            gap: 24px;
        }

        .hero-copy {
            width: 100%;
            text-align: center;
            padding-top: 0;
        }

        .hero h1 {
            font-size: clamp(30px, 7vw, 38px);
            line-height: 1.12;
            letter-spacing: -1px;
        }

        .hero p {
            max-width: 600px;
            margin-inline: auto;
            font-size: 14px;
            line-height: 1.6;
        }

        .search-card,
        .rpf-search-card {
            width: 100%;
            padding: 18px;
        }

        .form-grid,
        .rpf-form-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .field.full,
        .rpf-field.full {
            grid-column: 1 / -1;
        }

        .locality-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 12px;
        }

        .property-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .type-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
        }

        .why-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
        }

        .cta-row {
            grid-template-columns: 1fr;
        }

        .news-inner {
            flex-direction: column;
            align-items: stretch;
            gap: 16px;
            padding: 24px 0;
        }

        .subscribe {
            width: 100%;
        }
    }

    /* =========================================================
   MOBILE — 320px–480px
========================================================= */

    @media (min-width: 320px) and (max-width: 480px) {
        .container {
            width: calc(100% - 20px);
        }

        .hero {
            min-height: auto;
        }

        .hero-inner {
            min-height: 0;
            padding: 28px 0 42px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .hero-copy {
            width: 100%;
            padding: 0;
            text-align: center;
        }

        .eyebrow {
            font-size: clamp(10px, 3vw, 13px);
            line-height: 1.35;
            margin-bottom: 9px;
        }

        .hero h1 {
            font-size: clamp(27px, 8vw, 34px);
            line-height: 1.12;
            letter-spacing: -.8px;
        }

        .hero p {
            max-width: 100%;
            margin-top: 11px;
            font-size: 12px;
            line-height: 1.55;
        }

        .search-card,
        .rpf-search-card {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
        }

        .search-tabs,
        .rpf-tabs {
            gap: 7px;
        }

        .tab,
        .rpf-tab {
            flex: 1 1 0;
            min-width: 0;
            padding-inline: 8px;
        }

        .form-grid,
        .rpf-form-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .field.full,
        .rpf-field.full {
            grid-column: auto;
        }

        .control,
        .rpf-control {
            min-height: 40px;
            height: auto;
        }

        .control input,
        .rpf-control input {
            min-width: 0;
            width: 100%;
        }

        .control-dropdown,
        .rpf-dropdown {
            width: 100%;
            min-width: 0;
            max-height: 240px;
            overflow-y: auto;
        }

        .search-btn,
        .rpf-search-btn {
            min-height: 42px;
            height: auto;
        }

        .trust {
            grid-template-columns: 1fr 1fr;
            margin-top: -18px;
        }

        .trust-item {
            padding: 12px 10px;
            gap: 8px;
            border-right: 1px solid rgba(255, 255, 255, .18);
            border-bottom: 1px solid rgba(255, 255, 255, .18);
        }

        .trust-item:nth-child(2n) {
            border-right: 0;
        }

        .trust-item:nth-last-child(-n + 2) {
            border-bottom: 0;
        }

        .trust-icon {
            width: 28px;
            height: 28px;
            font-size: 18px;
        }

        .trust-title {
            font-size: 11px;
            line-height: 1.25;
        }

        .trust-sub {
            font-size: 9px;
            line-height: 1.35;
        }

        section {
            padding-top: 28px;
        }

        .section-head {
            align-items: flex-end;
            margin-bottom: 14px;
            gap: 8px;
        }

        .section-head h2 {
            font-size: clamp(17px, 5vw, 21px);
            line-height: 1.2;
        }

        .view {
            font-size: 9px;
        }

        .locality-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        .locality img {
            height: clamp(90px, 25vw, 120px);
        }

        .locality .name {
            font-size: 11px;
            white-space: normal;
            line-height: 1.3;
        }

        .locality .count {
            font-size: 8px;
            white-space: normal;
        }

        .property-grid {
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .card-image {
            height: clamp(190px, 58vw, 260px);
        }

        .card-body {
            padding: 13px;
        }

        .price {
            font-size: 18px;
        }

        .title {
            font-size: 13px;
        }

        .place {
            font-size: 10px;
            white-space: normal;
        }

        .meta {
            gap: 10px;
            row-gap: 7px;
            font-size: 9px;
        }

        .tag {
            font-size: 8px;
        }

        .type-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        .type {
            height: 125px;
            padding: 12px 7px;
        }

        .type-icon {
            width: 43px;
            height: 43px;
            font-size: 24px;
            margin-bottom: 8px;
        }

        .type-name {
            font-size: 10px;
            white-space: normal;
            line-height: 1.3;
        }

        .type-count {
            font-size: 8px;
        }

        .why-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .why {
            min-height: 0;
            padding: 18px 15px;
        }

        .why h3 {
            font-size: 13px;
        }

        .why p {
            max-width: 100%;
            font-size: 10px;
        }

        .cta-row {
            grid-template-columns: 1fr;
            gap: 12px;
            margin-top: 22px;
        }

        .policy,
        .cta {
            min-height: 0;
            padding: 18px 15px;
        }

        .policy-content,
        .cta-content {
            min-width: 0;
        }

        .policy h3,
        .cta h2 {
            font-size: 18px;
            line-height: 1.25;
        }

        .policy p,
        .cta p {
            font-size: 10px;
            line-height: 1.55;
        }

        .cta button {
            width: 100%;
            max-width: 100%;
        }

        .news-inner {
            min-height: auto;
            padding: 22px 0;
            flex-direction: column;
            align-items: stretch;
            gap: 14px;
        }

        .news-title {
            font-size: 19px;
        }

        .news-sub {
            font-size: 10px;
            line-height: 1.5;
        }

        .subscribe {
            width: 100%;
            height: auto;
            min-height: 44px;
        }

        .subscribe input {
            min-width: 0;
            font-size: 11px;
        }

        .subscribe button {
            width: 88px;
            min-width: 78px;
            height: 36px;
            font-size: 10px;
        }

        /* Any modal/dropdown that is wider than the viewport is contained */
        .modal,
        .overlay,
        .dialog,
        [role="dialog"] {
            max-width: calc(100vw - 16px);
        }

        table {
            display: block;
            width: 100%;
            max-width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        a,
        span,
        label,
        button,
        td,
        th {
            overflow-wrap: anywhere;
        }
    }

    /* =========================================================
   BELOW 320px — overflow safety only
========================================================= */

    @media (max-width: 319px) {
        .container {
            width: calc(100% - 14px);
        }

        .hero h1 {
            font-size: 26px;
        }

        .search-card,
        .rpf-search-card {
            padding: 11px;
        }

        .locality-grid,
        .type-grid {
            gap: 8px;
        }

        .property-grid {
            gap: 12px;
        }

        .trust {
            grid-template-columns: 1fr;
        }

        .trust-item,
        .trust-item:nth-child(2n),
        .trust-item:nth-last-child(-n + 2) {
            border-right: 0;
            border-bottom: 1px solid rgba(255, 255, 255, .18);
        }

        .trust-item:last-child {
            border-bottom: 0;
        }

        .subscribe button {
            width: 78px;
        }
    }

    /* ---------- touch devices ---------- */

    @media (hover: none) and (pointer: coarse) {

        .locality:hover,
        .card:hover,
        .type:hover,
        .why:hover,
        .policy:hover,
        .cta:hover,
        .search-card:hover,
        .rpf-search-card:hover {
            transform: none;
        }

        .locality:hover img,
        .card:hover .card-image img,
        .type:hover .type-icon {
            transform: none;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }
    }

    /* ---------- accessibility ---------- */

    @media (prefers-reduced-motion: reduce) {

        *,
        *::before,
        *::after {
            animation-duration: .01ms !important;
            animation-iteration-count: 1 !important;
            scroll-behavior: auto !important;
            transition-duration: .01ms !important;
        }
    }
</style>