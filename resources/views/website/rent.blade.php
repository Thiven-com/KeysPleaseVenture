@extends('layouts.website')
@section('content')





    <!-- =====================================================
                                         SEARCH AREA
                                    ====================================================== -->

    <div class="rent-container search-area">

        <div class="search-panel">

            <!-- Location -->
            <div class="field">

                <label for="locationInput">
                    Location / Locality
                </label>

                <div class="control location-control">

                    <i class="fa-solid fa-location-dot"></i>

                    <input type="text" id="locationInput" placeholder="Search Locality, Area or Landmark"
                        autocomplete="off">

                    <button type="button" class="control-icon-btn" id="locationClear" aria-label="Clear location">
                        <i class="fa-solid fa-xmark"></i>
                    </button>

                </div>

                <!-- Location Suggestions -->
                <div class="location-suggestions" id="locationSuggestions">

                    <button type="button" data-location="Koramangala">
                        <i class="fa-solid fa-location-dot"></i>
                        Koramangala
                    </button>

                    <button type="button" data-location="HSR Layout">
                        <i class="fa-solid fa-location-dot"></i>
                        HSR Layout
                    </button>

                    <button type="button" data-location="Indiranagar">
                        <i class="fa-solid fa-location-dot"></i>
                        Indiranagar
                    </button>

                    <button type="button" data-location="Whitefield">
                        <i class="fa-solid fa-location-dot"></i>
                        Whitefield
                    </button>

                    <button type="button" data-location="Electronic City">
                        <i class="fa-solid fa-location-dot"></i>
                        Electronic City
                    </button>

                </div>

            </div>


            <!-- Property Type -->
            <div class="field">

                <label>
                    Property Type
                </label>

                <div class="custom-select">

                    <button type="button" class="control select-trigger" data-target="propertyTypeMenu">
                        <strong id="propertyTypeValue">
                            Any Type
                        </strong>

                        <i class="fa-solid fa-chevron-down arrow"></i>
                    </button>

                    <div class="select-menu" id="propertyTypeMenu">

                        <button type="button" data-value="Any Type">
                            Any Type
                        </button>

                        <button type="button" data-value="Apartment">
                            Apartment
                        </button>

                        <button type="button" data-value="Villa">
                            Villa
                        </button>

                        <button type="button" data-value="Independent House">
                            Independent House
                        </button>

                        <button type="button" data-value="PG">
                            PG
                        </button>

                    </div>

                </div>

            </div>


            <!-- BHK -->
            <div class="field">

                <label>
                    BHK
                </label>

                <div class="custom-select">

                    <button type="button" class="control select-trigger" data-target="bhkMenu">
                        <strong id="bhkValue">
                            Any
                        </strong>

                        <i class="fa-solid fa-chevron-down arrow"></i>
                    </button>

                    <div class="select-menu" id="bhkMenu">

                        <button type="button" data-value="Any">
                            Any
                        </button>

                        <button type="button" data-value="1 BHK">
                            1 BHK
                        </button>

                        <button type="button" data-value="2 BHK">
                            2 BHK
                        </button>

                        <button type="button" data-value="3 BHK">
                            3 BHK
                        </button>

                        <button type="button" data-value="4+ BHK">
                            4+ BHK
                        </button>

                    </div>

                </div>

            </div>


            <!-- Rent Range -->
            <div class="field">

                <label>
                    Rent Range
                </label>

                <div class="custom-select">

                    <button type="button" class="control select-trigger" data-target="rentMenu">
                        <strong id="rentValue">
                            ₹ 0 - ₹ 1,00,000+
                        </strong>

                        <i class="fa-solid fa-chevron-down arrow"></i>
                    </button>

                    <div class="select-menu" id="rentMenu">

                        <button type="button" data-value="₹ 0 - ₹ 1,00,000+">
                            ₹ 0 - ₹ 1,00,000+
                        </button>

                        <button type="button" data-value="₹ 0 - ₹ 25,000">
                            ₹ 0 - ₹ 25,000
                        </button>

                        <button type="button" data-value="₹ 25,000 - ₹ 50,000">
                            ₹ 25,000 - ₹ 50,000
                        </button>

                        <button type="button" data-value="₹ 50,000 - ₹ 75,000">
                            ₹ 50,000 - ₹ 75,000
                        </button>

                        <button type="button" data-value="₹ 75,000+">
                            ₹ 75,000+
                        </button>

                    </div>

                </div>

            </div>


            <!-- More Filters -->
            <button type="button" class="filter-action" id="moreFiltersBtn">
                <i class="fa-solid fa-sliders"></i>

                <span>
                    More Filters
                </span>
            </button>


            <!-- Search -->
            <button type="button" class="search-action" id="searchBtn">
                <i class="fa-solid fa-magnifying-glass"></i>

                <span>
                    Search
                </span>
            </button>

        </div>

    </div>


    <!-- =====================================================
                                         CONTENT AREA
                                    ====================================================== -->

    <div class="rent-container content">


        <!-- =================================================
                                             SIDEBAR
                                        ================================================== -->

        <aside class="sidebar" id="filters">

            <div class="filter-head">

                <span>
                    Filters
                </span>

                <button type="button" class="reset" id="resetFiltersBtn">
                    <i class="fa-solid fa-rotate-left"></i>
                    Reset All
                </button>

            </div>


            <!-- LOCATION FILTER -->

            <div class="filter-section">

                <button type="button" class="filter-title">
                    <span>
                        Location
                    </span>

                    <i class="fa-solid fa-chevron-up"></i>
                </button>


                <div class="tree">

                    <button type="button" class="tree-row active-parent">
                        <i class="fa-solid fa-chevron-down"></i>
                        Bangalore
                    </button>

                    <button type="button" class="tree-row active-parent">
                        <i class="fa-solid fa-chevron-down"></i>
                        Koramangala
                    </button>

                    <button type="button" class="tree-row checked">
                        <i class="fa-solid fa-chevron-down"></i>

                        <span>
                            Koramangala 4th Block
                        </span>

                        <span class="checkbox checked">
                            <i class="fa-solid fa-check"></i>
                        </span>

                    </button>


                    <div class="tree-line"></div>


                    <button type="button" class="tree-row child">
                        Koramangala 5th Block

                        <span class="checkbox"></span>
                    </button>


                    <div class="tree-line"></div>


                    <button type="button" class="tree-row child">
                        Koramangala 6th Block

                        <span class="checkbox"></span>
                    </button>


                    <div class="tree-line"></div>


                    <button type="button" class="tree-row child">
                        Koramangala 7th Block

                        <span class="checkbox"></span>
                    </button>

                </div>


                <button type="button" class="more">
                    <i class="fa-solid fa-plus"></i>
                    Show More Areas
                </button>

            </div>


            <!-- RENT RANGE -->

            <!-- <div class="filter-section">

                        <button type="button" class="filter-title">
                            <span>
                                Rent Range
                            </span>

                            <i class="fa-solid fa-chevron-up"></i>
                        </button>


                        <div class="range">

                            <span class="range-progress"></span>

                            <button type="button" class="range-thumb left" aria-label="Minimum rent"></button>

                            <button type="button" class="range-thumb right" aria-label="Maximum rent"></button>

                        </div>


                        <div class="range-values">

                            <div class="range-box">
                                ₹ 0
                            </div>

                            <span class="range-to">
                                to
                            </span>

                            <div class="range-box">
                                ₹ 1,00,000+
                            </div>

                        </div>

                    </div> -->


            <!-- BHK -->

            <div class="filter-section">

                <button type="button" class="filter-title">
                    <span>
                        BHK
                    </span>

                    <i class="fa-solid fa-chevron-up"></i>
                </button>


                <button type="button" class="tree-row filter-checkbox-row" data-filter="1 BHK">
                    <span class="checkbox"></span>
                    1 BHK
                    <span class="count">
                        (234)
                    </span>
                </button>


                <button type="button" class="tree-row filter-checkbox-row" data-filter="2 BHK">
                    <span class="checkbox"></span>
                    2 BHK
                    <span class="count">
                        (512)
                    </span>
                </button>


                <button type="button" class="tree-row filter-checkbox-row" data-filter="3 BHK">
                    <span class="checkbox"></span>
                    3 BHK
                    <span class="count">
                        (896)
                    </span>
                </button>


                <button type="button" class="tree-row filter-checkbox-row" data-filter="4+ BHK">
                    <span class="checkbox"></span>
                    4+ BHK
                    <span class="count">
                        (204)
                    </span>
                </button>

            </div>


            <!-- PROPERTY TYPE -->

            <div class="filter-section">

                <button type="button" class="filter-title">
                    <span>
                        Property Type
                    </span>

                    <i class="fa-solid fa-chevron-up"></i>
                </button>


                <div class="property-type-filters">

                    <button type="button">
                        <span class="checkbox"></span>
                        Apartment
                    </button>

                    <button type="button">
                        <span class="checkbox"></span>
                        Villa
                    </button>

                    <button type="button">
                        <span class="checkbox"></span>
                        Independent House
                    </button>

                    <button type="button">
                        <span class="checkbox"></span>
                        PG
                    </button>

                </div>

            </div>

        </aside>


        <!-- =================================================
                                             RESULTS
                                        ================================================== -->

        <section class="results">


            <!-- RESULT TOOLBAR -->

            <div class="result-toolbar">

                <div class="showing">

                    Showing

                    <strong id="resultCount">
                        1,248
                    </strong>

                    Rental Properties

                </div>


                <div class="sort">

                    <span>
                        Sort By:
                    </span>


                    <select class="sort-select" id="sortSelect">

                        <option value="newest">
                            Newest First
                        </option>

                        <option value="low">
                            Price: Low to High
                        </option>

                        <option value="high">
                            Price: High to Low
                        </option>

                    </select>


                    <div class="view-toggle">

                        <button type="button" class="active" id="gridViewBtn" aria-label="Grid view">
                            <i class="fa-solid fa-grip"></i>
                        </button>

                        <button type="button" id="listViewBtn" aria-label="List view">
                            <i class="fa-solid fa-list"></i>
                        </button>

                    </div>

                </div>

            </div>


            <!-- =================================================
                                                 PROPERTY 1
                                            ================================================== -->

            <article class="result-card" data-property="property1" data-price="45000" data-age="2" data-bhk="3"
                data-location="Koramangala 4th Block" data-type="Apartment">

                <div class="gallery">

                    <span class="featured">
                        FEATURED
                    </span>


                    <button type="button" class="heart" aria-label="Add to favourites">
                        <i class="fa-regular fa-heart"></i>
                    </button>


                    <img class="main"
                        src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=900&q=85"
                        alt="Spacious 3 BHK Apartment" loading="lazy">


                    <span class="photo-count">

                        <i class="fa-regular fa-images"></i>

                        12 Photos

                    </span>

                </div>


                <div class="details">

                    <div class="title-row">

                        <div class="property-title">
                            Spacious 3 BHK Apartment
                        </div>

                        <span class="verified">

                            <i class="fa-solid fa-circle-check"></i>

                            Verified

                        </span>

                    </div>


                    <div class="location">

                        <i class="fa-solid fa-location-dot"></i>

                        Koramangala 4th Block,
                        Koramangala, Bangalore

                    </div>


                    <div class="price">

                        ₹ 45,000

                        <span>
                            /month
                        </span>

                    </div>


                    <div class="deposit">

                        Security Deposit:
                        ₹ 2,50,000

                    </div>


                    <div class="meta">

                        <span>
                            <i class="fa-solid fa-bed"></i>
                            3 BHK
                        </span>

                        <span>
                            <i class="fa-solid fa-bath"></i>
                            3 Bath
                        </span>

                        <span>
                            <i class="fa-solid fa-ruler-combined"></i>
                            1650 sq.ft
                        </span>

                        <span>
                            <i class="fa-solid fa-couch"></i>
                            Semi Furnished
                        </span>

                    </div>


                    <div class="broker">

                        <div class="broker-avatar">
                            US<br>
                            SPACE
                        </div>

                        <div>

                            <div class="broker-name">

                                Urban Spaces

                                <span class="tick">
                                    <i class="fa-solid fa-circle-check"></i>
                                </span>

                            </div>

                            <div class="broker-role">
                                Verified Broker
                            </div>

                        </div>

                    </div>

                </div>


                <div class="actions">

                    <span class="age">
                        2 hours ago
                    </span>

                    <span class="new">
                        New
                    </span>


                    <button type="button" class="action-btn primary view-details">
                        View Details
                    </button>


                    <button type="button" class="action-btn enquire-btn">
                        Enquire Now
                    </button>


                    <div class="phone">

                        <i class="fa-solid fa-phone"></i>

                        +91 80 1234 5678

                    </div>

                </div>

            </article>


            <!-- =================================================
                                                 PROPERTY 2
                                            ================================================== -->

            <article class="result-card" data-property="property2" data-price="32000" data-age="5" data-bhk="2"
                data-location="HSR Layout" data-type="Apartment">

                <div class="gallery">

                    <button type="button" class="heart" aria-label="Add to favourites">
                        <i class="fa-regular fa-heart"></i>
                    </button>


                    <img class="main"
                        src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=900&q=85"
                        alt="Modern 2 BHK Apartment" loading="lazy">


                    <span class="photo-count">

                        <i class="fa-regular fa-images"></i>

                        10 Photos

                    </span>

                </div>


                <div class="details">

                    <div class="title-row">

                        <div class="property-title">
                            Modern 2 BHK Apartment
                        </div>

                        <span class="verified">

                            <i class="fa-solid fa-circle-check"></i>

                            Verified

                        </span>

                    </div>


                    <div class="location">

                        <i class="fa-solid fa-location-dot"></i>

                        HSR Layout, Sector 2,
                        Bangalore

                    </div>


                    <div class="price">

                        ₹ 32,000

                        <span>
                            /month
                        </span>

                    </div>


                    <div class="deposit">

                        Security Deposit:
                        ₹ 2,00,000

                    </div>


                    <div class="meta">

                        <span>
                            <i class="fa-solid fa-bed"></i>
                            2 BHK
                        </span>

                        <span>
                            <i class="fa-solid fa-bath"></i>
                            2 Bath
                        </span>

                        <span>
                            <i class="fa-solid fa-ruler-combined"></i>
                            1200 sq.ft
                        </span>

                        <span>
                            <i class="fa-solid fa-couch"></i>
                            Fully Furnished
                        </span>

                    </div>


                    <div class="broker">

                        <div class="broker-avatar" style="background:#ff7d22;color:#fff">
                            <i class="fa-solid fa-house"></i>
                        </div>

                        <div>

                            <div class="broker-name">

                                Home Line Brokers

                                <span class="tick">
                                    <i class="fa-solid fa-circle-check"></i>
                                </span>

                            </div>

                            <div class="broker-role">
                                Verified Broker
                            </div>

                        </div>

                    </div>

                </div>


                <div class="actions">

                    <span class="age">
                        5 hours ago
                    </span>

                    <span class="new">
                        New
                    </span>


                    <button type="button" class="action-btn primary view-details">
                        View Details
                    </button>


                    <button type="button" class="action-btn enquire-btn">
                        Enquire Now
                    </button>


                    <div class="phone">

                        <i class="fa-solid fa-phone"></i>

                        +91 80 9876 5432

                    </div>

                </div>

            </article>


            <!-- =================================================
                                                 PROPERTY 3
                                            ================================================== -->

            <article class="result-card" data-property="property3" data-price="78000" data-age="24" data-bhk="4"
                data-location="Indiranagar" data-type="Apartment">

                <div class="gallery">

                    <button type="button" class="heart" aria-label="Add to favourites">
                        <i class="fa-regular fa-heart"></i>
                    </button>


                    <img class="main"
                        src="https://images.unsplash.com/photo-1600607688969-a5bfcd646154?auto=format&fit=crop&w=900&q=85"
                        alt="Luxurious 4 BHK Apartment" loading="lazy">


                    <span class="photo-count">

                        <i class="fa-regular fa-images"></i>

                        14 Photos

                    </span>

                </div>


                <div class="details">

                    <div class="title-row">

                        <div class="property-title">
                            Luxurious 4 BHK Apartment
                        </div>

                        <span class="verified">

                            <i class="fa-solid fa-circle-check"></i>

                            Verified

                        </span>

                    </div>


                    <div class="location">

                        <i class="fa-solid fa-location-dot"></i>

                        Indiranagar, 100 Ft Road,
                        Bangalore

                    </div>


                    <div class="price">

                        ₹ 78,000

                        <span>
                            /month
                        </span>

                    </div>


                    <div class="deposit">

                        Security Deposit:
                        ₹ 4,00,000

                    </div>


                    <div class="meta">

                        <span>
                            <i class="fa-solid fa-bed"></i>
                            4 BHK
                        </span>

                        <span>
                            <i class="fa-solid fa-bath"></i>
                            4 Bath
                        </span>

                        <span>
                            <i class="fa-solid fa-ruler-combined"></i>
                            2400 sq.ft
                        </span>

                        <span>
                            <i class="fa-solid fa-couch"></i>
                            Semi Furnished
                        </span>

                    </div>


                    <div class="broker">

                        <div class="broker-avatar" style="background:#1627c5;color:#fff">
                            WR
                        </div>

                        <div>

                            <div class="broker-name">

                                Whitefield Realty

                                <span class="tick">
                                    <i class="fa-solid fa-circle-check"></i>
                                </span>

                            </div>

                            <div class="broker-role">
                                Verified Broker
                            </div>

                        </div>

                    </div>

                </div>


                <div class="actions">

                    <span class="age">
                        1 day ago
                    </span>

                    <span class="new">
                        New
                    </span>


                    <button type="button" class="action-btn primary view-details">
                        View Details
                    </button>


                    <button type="button" class="action-btn enquire-btn">
                        Enquire Now
                    </button>


                    <div class="phone">

                        <i class="fa-solid fa-phone"></i>

                        +91 80 1122 3344

                    </div>

                </div>

            </article>


            <!-- No Results -->
            <div class="no-results" id="noResults" style="display:none;">

                <i class="fa-solid fa-house-circle-exclamation"></i>

                <h3>
                    No properties found
                </h3>

                <p>
                    Try changing your search filters.
                </p>

                <button type="button" id="clearSearchBtn">
                    Clear Filters
                </button>

            </div>

        </section>

    </div>





    <!-- =====================================================
                                         ENQUIRY MODAL
                                    ====================================================== -->

    <div class="enquiry-modal" id="enquiryModal" aria-hidden="true">

        <div class="enquiry-overlay"></div>

        <div class="enquiry-box">

            <button type="button" class="enquiry-close" id="enquiryClose" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>


            <div class="enquiry-icon">
                <i class="fa-solid fa-house"></i>
            </div>


            <h2>
                Enquire About This Property
            </h2>

            <p>
                Fill in your details and our property expert
                will contact you shortly.
            </p>


            <form id="enquiryForm">

                <!-- Full Name -->
                <div class="enquiry-field">
                    <label for="enquiryName">
                        Full Name
                    </label>

                    <div>
                        <i class="fa-solid fa-user"></i>

                        <input type="text" id="enquiryName" name="name" placeholder="Enter your full name"
                            autocomplete="name" required>
                    </div>
                </div>


                <!-- Mobile Number -->
                <div class="enquiry-field">
                    <label for="enquiryPhone">
                        Mobile Number
                    </label>

                    <div>
                        <i class="fa-solid fa-phone"></i>

                        <input type="tel" id="enquiryPhone" name="phone" placeholder="Enter your mobile number"
                            autocomplete="tel" inputmode="tel" required>
                    </div>
                </div>


                <!-- Email Address -->
                <div class="enquiry-field">
                    <label for="enquiryEmail">
                        Email Address
                    </label>

                    <div>
                        <i class="fa-solid fa-envelope"></i>

                        <input type="email" id="enquiryEmail" name="email" placeholder="Enter your email address"
                            autocomplete="email" required>
                    </div>
                </div>


                <!-- Preferred Contact -->
                <div class="enquiry-field">
                    <label for="preferredContact">
                        Preferred Contact Details
                    </label>

                    <div>
                        <i class="fa-solid fa-address-book"></i>

                        <select id="preferredContact" name="preferred_contact" required>
                            <option value="">Select preferred contact method</option>
                            <option value="phone">Phone Call</option>
                            <option value="whatsapp">WhatsApp</option>
                            <option value="email">Email</option>
                        </select>
                    </div>
                </div>


                <!-- Message / Enquiry -->
                <div class="enquiry-field">
                    <label for="enquiryMessage">
                        Message / Enquiry
                    </label>

                    <div>
                        <i class="fa-regular fa-message"></i>

                        <textarea id="enquiryMessage" name="message" rows="4"
                            placeholder="I am interested in this property..."></textarea>
                    </div>
                </div>


                <!-- Submit -->
                <button type="submit" class="enquiry-submit">
                    <i class="fa-solid fa-paper-plane"></i>
                    Send Enquiry
                </button>

            </form>

        </div>

    </div>


    <!-- =====================================================
                                         JAVASCRIPT
                                    ====================================================== -->

    <script>

        document.addEventListener("DOMContentLoaded", function () {


            /* =================================================
               ELEMENTS
            ================================================= */

            const locationInput =
                document.getElementById("locationInput");

            const locationClear =
                document.getElementById("locationClear");

            const locationSuggestions =
                document.getElementById("locationSuggestions");

            const searchBtn =
                document.getElementById("searchBtn");

            const moreFiltersBtn =
                document.getElementById("moreFiltersBtn");

            const filters =
                document.getElementById("filters");

            const resetFiltersBtn =
                document.getElementById("resetFiltersBtn");

            const resultCount =
                document.getElementById("resultCount");

            const sortSelect =
                document.getElementById("sortSelect");

            const gridViewBtn =
                document.getElementById("gridViewBtn");

            const listViewBtn =
                document.getElementById("listViewBtn");

            const noResults =
                document.getElementById("noResults");

            const clearSearchBtn =
                document.getElementById("clearSearchBtn");


            const enquiryModal =
                document.getElementById("enquiryModal");

            const enquiryClose =
                document.getElementById("enquiryClose");

            const enquiryForm =
                document.getElementById("enquiryForm");


            const propertyCards =
                Array.from(
                    document.querySelectorAll(".result-card")
                );


            /* NEW: sidebar filter elements */

            const treeRows =
                Array.from(
                    document.querySelectorAll(".tree .tree-row.child, .tree .tree-row.checked")
                );

            const moreAreasBtn =
                document.querySelector(".more");

            const rangeTrack =
                document.querySelector(".range");

            const rangeProgress =
                document.querySelector(".range-progress");

            const rangeThumbLeft =
                document.querySelector(".range-thumb.left");

            const rangeThumbRight =
                document.querySelector(".range-thumb.right");

            const rangeBoxes =
                document.querySelectorAll(".range-box");

            const RENT_MIN = 0;
            const RENT_MAX = 100000;

            let rentLow = RENT_MIN;
            let rentHigh = RENT_MAX;

            const bhkRows =
                document.querySelectorAll(".filter-checkbox-row");

            const propertyTypeButtons =
                document.querySelectorAll(".property-type-filters button");


            /* =================================================
               LOCATION SUGGESTIONS
            ================================================= */

            locationInput.addEventListener("focus", function () {

                locationSuggestions.classList.add("show");

            });


            locationInput.addEventListener("input", function () {

                const searchValue =
                    this.value.trim().toLowerCase();

                const suggestions =
                    locationSuggestions.querySelectorAll("button");


                suggestions.forEach(function (button) {

                    const location =
                        button.dataset.location.toLowerCase();

                    button.style.display =
                        location.includes(searchValue)
                            ? "flex"
                            : "none";

                });

                locationSuggestions.classList.add("show");

            });


            locationSuggestions
                .querySelectorAll("button")
                .forEach(function (button) {

                    button.addEventListener("click", function () {

                        locationInput.value =
                            this.dataset.location;

                        locationSuggestions.classList.remove("show");

                    });

                });


            locationClear.addEventListener("click", function () {

                locationInput.value = "";

                locationInput.focus();

            });


            document.addEventListener("click", function (event) {

                if (
                    !event.target.closest(".location-control") &&
                    !event.target.closest(".location-suggestions")
                ) {

                    locationSuggestions.classList.remove("show");

                }

            });


            /* =================================================
               CUSTOM SELECTS
            ================================================= */

            document
                .querySelectorAll(".select-trigger")
                .forEach(function (trigger) {

                    trigger.addEventListener("click", function (event) {

                        event.stopPropagation();

                        const targetId =
                            this.dataset.target;

                        const target =
                            document.getElementById(targetId);


                        document
                            .querySelectorAll(".select-menu")
                            .forEach(function (menu) {

                                if (menu !== target) {
                                    menu.classList.remove("show");
                                }

                            });


                        target.classList.toggle("show");

                    });

                });


            document
                .querySelectorAll(".select-menu button")
                .forEach(function (option) {

                    option.addEventListener("click", function () {

                        const value =
                            this.dataset.value;

                        const menu =
                            this.closest(".select-menu");

                        const trigger =
                            menu
                                .closest(".custom-select")
                                .querySelector(".select-trigger");

                        const strong =
                            trigger.querySelector("strong");


                        strong.textContent = value;

                        menu.classList.remove("show");


                        /*
                         * Store selected value
                         */

                        trigger.dataset.value = value;

                    });

                });


            document.addEventListener("click", function () {

                document
                    .querySelectorAll(".select-menu")
                    .forEach(function (menu) {

                        menu.classList.remove("show");

                    });

            });


            /* =================================================
               MORE FILTERS
            ================================================= */

            moreFiltersBtn.addEventListener("click", function () {

                filters.classList.toggle("show");

                this.classList.toggle("active");

            });


            /* =================================================
               FILTER TITLE COLLAPSE
            ================================================= */

            document
                .querySelectorAll(".filter-title")
                .forEach(function (title) {

                    title.addEventListener("click", function () {

                        const section =
                            this.closest(".filter-section");

                        const content =
                            Array.from(section.children)
                                .filter(function (child) {
                                    return child !== title;
                                });


                        section.classList.toggle("collapsed");

                    });

                });


            /* =================================================
               LOCATION TREE (NEW — was inert, now filters)
            ================================================= */

            treeRows.forEach(function (row) {

                row.addEventListener("click", function () {

                    const checkbox =
                        this.querySelector(".checkbox");

                    if (!checkbox) return;

                    checkbox.classList.toggle("checked");
                    this.classList.toggle("checked");

                    checkbox.innerHTML =
                        checkbox.classList.contains("checked")
                            ? '<i class="fa-solid fa-check"></i>'
                            : "";

                    performSearch();

                });

            });


            if (moreAreasBtn) {

                moreAreasBtn.addEventListener("click", function () {

                    this.classList.toggle("expanded");

                    const icon =
                        this.querySelector("i");

                    if (icon) {
                        icon.classList.toggle("fa-plus");
                        icon.classList.toggle("fa-minus");
                    }

                    // Hook point: reveal additional .tree-row elements here
                    // once they exist in the DOM.

                });

            }


            /* =================================================
               RENT RANGE SLIDER (NEW — drag to resize)
            ================================================= */

            function rentToPercent(value) {
                return ((value - RENT_MIN) / (RENT_MAX - RENT_MIN)) * 100;
            }

            function percentToRent(percent) {
                const raw = RENT_MIN + (percent / 100) * (RENT_MAX - RENT_MIN);
                return Math.round(raw / 1000) * 1000;
            }

            function formatRent(value) {
                if (value >= RENT_MAX) return "₹ 1,00,000+";
                return "₹ " + value.toLocaleString("en-IN");
            }

            function updateRangeUI() {

                const leftPct = rentToPercent(rentLow);
                const rightPct = rentToPercent(rentHigh);

                rangeThumbLeft.style.left = leftPct + "%";
                rangeThumbRight.style.left = rightPct + "%";

                rangeProgress.style.left = leftPct + "%";
                rangeProgress.style.width = (rightPct - leftPct) + "%";

                rangeBoxes[0].textContent = formatRent(rentLow);
                rangeBoxes[1].textContent = formatRent(rentHigh);

                document.getElementById("rentValue").textContent =
                    formatRent(rentLow) + " - " + formatRent(rentHigh);

            }

            function startDrag(isLeft) {

                function onMove(clientX) {

                    const rect = rangeTrack.getBoundingClientRect();
                    let percent = ((clientX - rect.left) / rect.width) * 100;
                    percent = Math.max(0, Math.min(100, percent));

                    const value = percentToRent(percent);

                    if (isLeft) {
                        rentLow = Math.min(value, rentHigh);
                    } else {
                        rentHigh = Math.max(value, rentLow);
                    }

                    updateRangeUI();

                }

                function onMouseMove(e) {
                    onMove(e.clientX);
                }

                function onTouchMove(e) {
                    onMove(e.touches[0].clientX);
                    e.preventDefault();
                }

                function stopDrag() {

                    document.removeEventListener("mousemove", onMouseMove);
                    document.removeEventListener("mouseup", stopDrag);
                    document.removeEventListener("touchmove", onTouchMove);
                    document.removeEventListener("touchend", stopDrag);

                    performSearch();

                }

                document.addEventListener("mousemove", onMouseMove);
                document.addEventListener("mouseup", stopDrag);
                document.addEventListener("touchmove", onTouchMove, { passive: false });
                document.addEventListener("touchend", stopDrag);

            }

            if (rangeThumbLeft && rangeThumbRight) {

                rangeThumbLeft.addEventListener("mousedown", function () {
                    startDrag(true);
                });

                rangeThumbRight.addEventListener("mousedown", function () {
                    startDrag(false);
                });

                rangeThumbLeft.addEventListener("touchstart", function () {
                    startDrag(true);
                });

                rangeThumbRight.addEventListener("touchstart", function () {
                    startDrag(false);
                });

                rangeThumbLeft.addEventListener("keydown", function (e) {
                    if (e.key === "ArrowLeft") rentLow = Math.max(RENT_MIN, rentLow - 1000);
                    if (e.key === "ArrowRight") rentLow = Math.min(rentHigh, rentLow + 1000);
                    updateRangeUI();
                    performSearch();
                });

                rangeThumbRight.addEventListener("keydown", function (e) {
                    if (e.key === "ArrowLeft") rentHigh = Math.max(rentLow, rentHigh - 1000);
                    if (e.key === "ArrowRight") rentHigh = Math.min(RENT_MAX, rentHigh + 1000);
                    updateRangeUI();
                    performSearch();
                });

                updateRangeUI();

            }


            /* =================================================
               BHK CHECKBOXES (now filters, not just visual)
            ================================================= */

            bhkRows.forEach(function (row) {

                row.addEventListener("click", function () {

                    const checkbox =
                        this.querySelector(".checkbox");


                    checkbox.classList.toggle("checked");


                    if (
                        checkbox.classList.contains("checked")
                    ) {

                        checkbox.innerHTML =
                            '<i class="fa-solid fa-check"></i>';

                    } else {

                        checkbox.innerHTML = "";

                    }

                    performSearch();

                });

            });


            /* =================================================
               SIDEBAR PROPERTY TYPE (now filters, not just visual)
            ================================================= */

            propertyTypeButtons.forEach(function (button) {

                button.addEventListener("click", function () {

                    const checkbox =
                        this.querySelector(".checkbox");


                    checkbox.classList.toggle("checked");


                    if (
                        checkbox.classList.contains("checked")
                    ) {

                        checkbox.innerHTML =
                            '<i class="fa-solid fa-check"></i>';

                    } else {

                        checkbox.innerHTML = "";

                    }

                    performSearch();

                });

            });


            /* =================================================
               FAVORITE
            ================================================= */

            document
                .querySelectorAll(".heart")
                .forEach(function (heart) {

                    heart.addEventListener("click", function (event) {

                        event.stopPropagation();

                        const icon =
                            this.querySelector("i");


                        this.classList.toggle("active");


                        if (
                            this.classList.contains("active")
                        ) {

                            icon.classList.remove(
                                "fa-regular"
                            );

                            icon.classList.add(
                                "fa-solid"
                            );

                            icon.style.color =
                                "#e63946";

                        } else {

                            icon.classList.remove(
                                "fa-solid"
                            );

                            icon.classList.add(
                                "fa-regular"
                            );

                            icon.style.color = "";

                        }

                    });

                });


            /* =================================================
               PROPERTY DETAILS
            ================================================= */

            document
                .querySelectorAll(".view-details")
                .forEach(function (button) {

                    button.addEventListener("click", function (event) {

                        event.stopPropagation();

                        const card =
                            this.closest(".result-card");

                        const propertyId =
                            card.dataset.property;

                        window.location.href =
                            "{{ route('propertydetails') }}?property=" + propertyId;

                    });

                });


            /* =================================================
               CARD CLICK
            ================================================= */

            propertyCards.forEach(function (card) {

                card.addEventListener("click", function (event) {

                    if (
                        event.target.closest("button") ||
                        event.target.closest("select") ||
                        event.target.closest("a")
                    ) {
                        return;
                    }

                    const propertyId =
                        this.dataset.property;

                    window.location.href =
                        "{{ route('propertydetails') }}?property=" + propertyId;

                });

            });


            /* =================================================
               ENQUIRE NOW
            ================================================= */

            document
                .querySelectorAll(".enquire-btn")
                .forEach(function (button) {

                    button.addEventListener("click", function (event) {

                        event.stopPropagation();


                        const card =
                            this.closest(".result-card");

                        const title =
                            card.querySelector(
                                ".property-title"
                            ).textContent.trim();


                        document.getElementById(
                            "enquiryMessage"
                        ).value =
                            "I am interested in " + title + ".";


                        enquiryModal.classList.add("show");

                        enquiryModal.setAttribute(
                            "aria-hidden",
                            "false"
                        );

                        document.documentElement.classList.add(
                            "enquiry-modal-open"
                        );

                        document.body.classList.add(
                            "enquiry-modal-open"
                        );


                        setTimeout(function () {

                            document.getElementById(
                                "enquiryName"
                            ).focus();

                        }, 200);

                    });

                });


            /* =================================================
               CLOSE MODAL
            ================================================= */

            function closeEnquiryModal() {

                enquiryModal.classList.remove("show");

                enquiryModal.setAttribute(
                    "aria-hidden",
                    "true"
                );

                document.documentElement.classList.remove(
                    "enquiry-modal-open"
                );

                document.body.classList.remove(
                    "enquiry-modal-open"
                );

            }


            enquiryClose.addEventListener(
                "click",
                closeEnquiryModal
            );


            document
                .querySelector(".enquiry-overlay")
                .addEventListener(
                    "click",
                    closeEnquiryModal
                );


            /* =================================================
               ESCAPE KEY
            ================================================= */

            document.addEventListener(
                "keydown",
                function (event) {

                    if (event.key === "Escape") {

                        closeEnquiryModal();

                        locationSuggestions
                            .classList.remove("show");

                    }

                }
            );


            /* =================================================
               ENQUIRY FORM
            ================================================= */

            enquiryForm.addEventListener(
                "submit",
                function (event) {

                    event.preventDefault();


                    const name =
                        document.getElementById(
                            "enquiryName"
                        ).value.trim();


                    const phone =
                        document.getElementById(
                            "enquiryPhone"
                        ).value.trim();


                    if (!name || !phone) {

                        alert(
                            "Please enter your name and phone number."
                        );

                        return;

                    }


                    alert(
                        "Thank you, " +
                        name +
                        "! Your enquiry has been submitted."
                    );


                    enquiryForm.reset();

                    closeEnquiryModal();

                }
            );


            /* =================================================
               SORTING
            ================================================= */

            sortSelect.addEventListener(
                "change",
                function () {

                    const value =
                        this.value;


                    const results =
                        document.querySelector(".results");


                    const cards =
                        Array.from(
                            results.querySelectorAll(
                                ".result-card"
                            )
                        );


                    cards.sort(function (a, b) {

                        if (value === "low") {

                            return (
                                Number(a.dataset.price) -
                                Number(b.dataset.price)
                            );

                        }


                        if (value === "high") {

                            return (
                                Number(b.dataset.price) -
                                Number(a.dataset.price)
                            );

                        }


                        return (
                            Number(a.dataset.age) -
                            Number(b.dataset.age)
                        );

                    });


                    cards.forEach(function (card) {

                        results.appendChild(card);

                    });

                }
            );


            /* =================================================
               GRID VIEW
            ================================================= */

            gridViewBtn.addEventListener(
                "click",
                function () {

                    document
                        .querySelector(".results")
                        .classList.remove("list-view");


                    gridViewBtn.classList.add("active");

                    listViewBtn.classList.remove("active");

                }
            );


            /* =================================================
               LIST VIEW
            ================================================= */

            listViewBtn.addEventListener(
                "click",
                function () {

                    document
                        .querySelector(".results")
                        .classList.add("list-view");


                    listViewBtn.classList.add("active");

                    gridViewBtn.classList.remove("active");

                }
            );


            /* =================================================
               SEARCH (UPDATED — now reads sidebar filters too)
            ================================================= */

            function performSearch() {

                const location =
                    locationInput.value
                        .trim()
                        .toLowerCase();


                const propertyType =
                    document
                        .getElementById(
                            "propertyTypeValue"
                        )
                        .textContent
                        .trim();


                const bhk =
                    document
                        .getElementById(
                            "bhkValue"
                        )
                        .textContent
                        .trim();


                /* NEW: sidebar location tree — checked areas */

                const checkedLocations =
                    treeRows
                        .filter(function (row) {
                            return row.classList.contains("checked");
                        })
                        .map(function (row) {
                            const label =
                                row.querySelector("span:not(.checkbox)");

                            return (
                                label ? label.textContent : row.textContent
                            ).trim().toLowerCase();
                        });


                /* NEW: sidebar BHK checkboxes */

                const checkedBhks =
                    Array.from(bhkRows)
                        .filter(function (row) {
                            return row.querySelector(".checkbox").classList.contains("checked");
                        })
                        .map(function (row) {
                            return row.dataset.filter;
                        });


                /* NEW: sidebar property type checkboxes */

                const checkedTypes =
                    Array.from(propertyTypeButtons)
                        .filter(function (button) {
                            return button.querySelector(".checkbox").classList.contains("checked");
                        })
                        .map(function (button) {
                            return button.textContent.trim();
                        });


                let visibleCount = 0;


                propertyCards.forEach(function (card) {

                    const cardLocation =
                        card.dataset.location
                            .toLowerCase();


                    const cardType =
                        card.dataset.type;


                    const cardBhk =
                        card.dataset.bhk;


                    const cardPrice =
                        Number(card.dataset.price);


                    let visible = true;


                    /*
                     * Location (top search bar, free text)
                     */

                    if (
                        location &&
                        !cardLocation.includes(location)
                    ) {

                        visible = false;

                    }


                    /*
                     * Property type (top search bar dropdown)
                     */

                    if (
                        propertyType !== "Any Type" &&
                        cardType !== propertyType
                    ) {

                        visible = false;

                    }


                    /*
                     * BHK (top search bar dropdown)
                     */

                    if (
                        bhk !== "Any"
                    ) {

                        if (
                            bhk === "4+ BHK"
                        ) {

                            if (
                                Number(cardBhk) < 4
                            ) {
                                visible = false;
                            }

                        } else {

                            const selectedBhk =
                                parseInt(bhk);


                            if (
                                Number(cardBhk) !==
                                selectedBhk
                            ) {

                                visible = false;

                            }

                        }

                    }


                    /*
                     * NEW: Sidebar location tree (OR match)
                     */

                    if (checkedLocations.length > 0) {

                        const matchesArea =
                            checkedLocations.some(function (area) {
                                return cardLocation.includes(area);
                            });

                        if (!matchesArea) visible = false;

                    }


                    /*
                     * NEW: Sidebar BHK checkboxes (OR match)
                     */

                    if (checkedBhks.length > 0) {

                        const matchesBhk =
                            checkedBhks.some(function (filterValue) {
                                if (filterValue === "4+ BHK") return Number(cardBhk) >= 4;
                                return Number(cardBhk) === parseInt(filterValue);
                            });

                        if (!matchesBhk) visible = false;

                    }


                    /*
                     * NEW: Sidebar property type checkboxes (OR match)
                     */

                    if (
                        checkedTypes.length > 0 &&
                        !checkedTypes.includes(cardType)
                    ) {

                        visible = false;

                    }


                    /*
                     * NEW: Rent range slider
                     */

                    if (
                        cardPrice < rentLow ||
                        (rentHigh < RENT_MAX && cardPrice > rentHigh)
                    ) {

                        visible = false;

                    }


                    card.style.display =
                        visible
                            ? ""
                            : "none";


                    if (visible) {
                        visibleCount++;
                    }

                });


                resultCount.textContent =
                    visibleCount.toLocaleString();


                noResults.style.display =
                    visibleCount === 0
                        ? "block"
                        : "none";

            }


            searchBtn.addEventListener(
                "click",
                performSearch
            );


            /* =================================================
               ENTER TO SEARCH
            ================================================= */

            locationInput.addEventListener(
                "keydown",
                function (event) {

                    if (
                        event.key === "Enter"
                    ) {

                        event.preventDefault();

                        performSearch();

                    }

                }
            );


            /* =================================================
               RESET FILTERS (UPDATED — clears sidebar state too)
            ================================================= */

            function resetFilters() {

                /*
                 * Location
                 */

                locationInput.value = "";


                /*
                 * Property type
                 */

                document.getElementById(
                    "propertyTypeValue"
                ).textContent =
                    "Any Type";


                /*
                 * BHK
                 */

                document.getElementById(
                    "bhkValue"
                ).textContent =
                    "Any";


                /*
                 * Rent
                 */

                document.getElementById(
                    "rentValue"
                ).textContent =
                    "₹ 0 - ₹ 1,00,000+";


                /*
                 * Checkboxes
                 */

                document
                    .querySelectorAll(
                        ".checkbox.checked"
                    )
                    .forEach(function (checkbox) {

                        checkbox.classList.remove(
                            "checked"
                        );

                        checkbox.innerHTML = "";

                    });


                /*
                 * NEW: Location tree rows
                 */

                treeRows.forEach(function (row) {
                    row.classList.remove("checked");
                });


                /*
                 * Favorites
                 */

                document
                    .querySelectorAll(
                        ".heart.active"
                    )
                    .forEach(function (heart) {

                        heart.classList.remove(
                            "active"
                        );

                        const icon =
                            heart.querySelector("i");


                        icon.classList.remove(
                            "fa-solid"
                        );

                        icon.classList.add(
                            "fa-regular"
                        );

                        icon.style.color = "";

                    });


                /*
                 * NEW: Rent range slider
                 */

                rentLow = RENT_MIN;
                rentHigh = RENT_MAX;

                if (rangeThumbLeft && rangeThumbRight) {
                    updateRangeUI();
                }


                /*
                 * Show all properties
                 */

                propertyCards.forEach(
                    function (card) {

                        card.style.display =
                            "";

                    }
                );


                resultCount.textContent =
                    propertyCards.length.toLocaleString();


                noResults.style.display =
                    "none";


                /*
                 * Sort reset
                 */

                sortSelect.value =
                    "newest";


                /*
                 * Close suggestions
                 */

                locationSuggestions
                    .classList.remove("show");


                /*
                 * Re-run search so the grid reflects the cleared state
                 */

                performSearch();

            }


            resetFiltersBtn.addEventListener(
                "click",
                resetFilters
            );


            clearSearchBtn.addEventListener(
                "click",
                resetFilters
            );


            /*
             * Run once on load so counts/labels start accurate
             */

            performSearch();


        });

    </script>


    <style>
        .enquiry-field select {
            width: 100%;
            height: 42px;
            padding: 0 12px 0 36px;
            border: 1px solid #dce2ed;
            border-radius: 7px;
            outline: none;
            background: #fff;
            color: #202940;
            font-size: 12px;
            line-height: 1.5;
            cursor: pointer;
            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .enquiry-field select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(23, 36, 201, 0.07);
        }

        .enquiry-field select:invalid {
            color: #929bad;
        }

        .enquiry-field select option {
            color: #202940;
        }
    </style>



@endsection