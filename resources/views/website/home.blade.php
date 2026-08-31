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


            <form class="subscribe" onsubmit="subscribe(event)">

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

@endsection