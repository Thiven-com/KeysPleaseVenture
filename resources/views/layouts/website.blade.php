<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- =========================================================
     SEO META TAGS
========================================================= -->

  <title>Rental Properties in Bangalore | Keys Please Venture</title>

  <meta name="description"
    content="Explore verified rental properties in Bangalore including apartments, flats, villas, houses and commercial spaces. Search by location, property type and budget with Keys Please Venture.">

  <meta name="keywords"
    content="rental properties in Bangalore, properties for rent in Bangalore, apartments for rent Bangalore, flats for rent Bangalore, houses for rent Bangalore, villas for rent Bangalore, rental homes Bangalore, commercial properties for rent Bangalore, furnished flats Bangalore, semi furnished apartments Bangalore, Bangalore real estate, property rental Bangalore, Keys Please Venture">

  <meta name="author" content="Keys Please Venture">

  <meta name="robots" content="index, follow, max-image-preview:large">

  <link rel="canonical" href="{{ url()->current() }}">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <!-- Website CSS -->
  <link rel="stylesheet" href="{{ asset('website/css/website.css') }}">
  <link rel="stylesheet" href="{{ asset('website/css/home.css') }}">
  <link rel="stylesheet" href="{{ asset('website/css/about.css') }}">
  <link rel="stylesheet" href="{{ asset('website/css/contact.css') }}">
  <link rel="stylesheet" href="{{ asset('website/css/rent.css') }}">
  <link rel="stylesheet" href="{{ asset('website/css/propertydetails.css') }}">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website/images/venlogo.png') }}">

  <style>
    /* =========================================================
   LIST YOUR PROPERTY - MODAL SCROLL FIX
========================================================= */

    html.lpf-modal-open,
    body.lpf-modal-open {
      overflow: hidden !important;
      height: 100%;
    }

    .lpf-overlay {
      position: fixed !important;
      inset: 0 !important;
      width: 100vw !important;
      height: 100vh !important;
      height: 100dvh !important;

      display: flex;
      align-items: center;
      justify-content: center;

      overflow: hidden !important;
      z-index: 99999;
    }

    .lpf-modal {
      width: min(760px, calc(100vw - 40px));
      max-height: calc(100dvh - 40px);

      overflow-x: hidden !important;
      overflow-y: auto !important;

      -webkit-overflow-scrolling: touch;
      overscroll-behavior: contain;
    }

    @media (max-width: 767px) {
      .lpf-overlay {
        align-items: flex-start;
        padding: 12px !important;
      }

      .lpf-modal {
        width: 100% !important;
        max-width: 100% !important;

        height: calc(100dvh - 24px);
        max-height: calc(100dvh - 24px);

        overflow-x: hidden !important;
        overflow-y: auto !important;

        -webkit-overflow-scrolling: touch;
      }

      .mobile-sidebar-btn .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
      }
    }
  </style>

</head>

<body>

  <!-- ================= HEADER ================= -->

  <header>
    <div class="container nav">

      <!-- Logo -->
      <a class="logo" href="{{ route('home') }}">
        <img src="{{ asset('website/images/venlogo.png') }}" alt="Keys Please Venture">
      </a>

      <!-- City -->
      <div class="city-selector">

        <button class="city" type="button">
          <span class="location-icon">
            <i class="fa-solid fa-location-dot"></i>
          </span>

          <span class="city-name">Bengaluru</span>

          <span class="city-arrow">
            <i class="fa-solid fa-chevron-down"></i>
          </span>
        </button>


        <!-- City Dropdown -->

        <div class="city-dropdown">

          <div class="city-search">
            <i class="fa-solid fa-magnifying-glass"></i>

            <input type="text" placeholder="Search for city">
          </div>


          <div class="city-dropdown-content">

            <h3>Popular cities</h3>


            <div class="popular-cities">

              <button class="city-option active">
                <span class="city-option-icon">
                  🏙️
                </span>
                <span>Bengaluru</span>
              </button>

              <button class="city-option">
                <span class="city-option-icon">
                  🏛️
                </span>
                <span>Mumbai</span>
              </button>

              <button class="city-option">
                <span class="city-option-icon">
                  🏢
                </span>
                <span>Pune</span>
              </button>

              <button class="city-option">
                <span class="city-option-icon">
                  🏘️
                </span>
                <span>Chennai</span>
              </button>

              <button class="city-option">
                <span class="city-option-icon">
                  🏙️
                </span>
                <span>Kolkata</span>
              </button>

              <button class="city-option">
                <span class="city-option-icon">
                  🏢
                </span>
                <span>Ahmedabad</span>
              </button>

              <button class="city-option">
                <span class="city-option-icon">
                  🏙️
                </span>
                <span>Delhi</span>
              </button>

              <button class="city-option">
                <span class="city-option-icon">
                  🏢
                </span>
                <span>Noida</span>
              </button>

              <button class="city-option">
                <span class="city-option-icon">
                  🏙️
                </span>
                <span>Gurgaon</span>
              </button>

              <button class="city-option">
                <span class="city-option-icon">
                  🏢
                </span>
                <span>Hyderabad</span>
              </button>

              <button class="city-option">
                <span class="city-option-icon">
                  🏛️
                </span>
                <span>Thane</span>
              </button>

              <button class="city-option">
                <span class="city-option-icon">
                  🏙️
                </span>
                <span>Navi Mumbai</span>
              </button>

            </div>

          </div>


          <!-- Bottom -->

          <div class="city-dropdown-footer">

            <div class="footer-links">

              <a href="#">All India</a>

              <span></span>

              <a href="#">International</a>

            </div>

            <a href="#" class="view-all-cities">
              View all cities
              <i class="fa-solid fa-chevron-right"></i>
            </a>

          </div>

        </div>

      </div>

      <!-- Navigation -->
      <nav class="menu">

        <a href="{{ route('home') }}">
          Home
        </a>

        <a href="{{ route('about') }}">
          About Us
        </a>

        <!-- RENT DROPDOWN -->
        <div class="nav-dropdown">

          <a href="#" class="nav-dropdown-trigger">
            Rent
            <i class="fa-solid fa-chevron-down nav-arrow"></i>
          </a>

          <div class="nav-mega-menu">

            <div class="nav-mega-menu-inner">

              <!-- Property Type -->
              <div class="mega-col">
                <h4>Property Type</h4>

                <a href="{{ route('rent') }}?type=flat">
                  <i class="fa-solid fa-building"></i>
                  Flats
                </a>

                <a href="{{ route('rent') }}?type=house">
                  <i class="fa-solid fa-house"></i>
                  Independent House
                </a>

                <a href="{{ route('rent') }}?type=villa">
                  <i class="fa-solid fa-house-chimney"></i>
                  Villas
                </a>

                <a href="{{ route('rent') }}?type=pg">
                  <i class="fa-solid fa-bed"></i>
                  PG / Co-living
                </a>

              </div>

              <!-- Popular Areas -->
              <div class="mega-col">
                <h4>Popular Areas</h4>

                <a href="{{ route('rent') }}?location=Koramangala">Koramangala</a>
                <a href="{{ route('rent') }}?location=HSR Layout">HSR Layout</a>
                <a href="{{ route('rent') }}?location=Indiranagar">Indiranagar</a>
                <a href="{{ route('rent') }}?location=Whitefield">Whitefield</a>
                <a href="{{ route('rent') }}?location=Electronic City">Electronic City</a>

              </div>

              <!-- Search by BHK -->
              <div class="mega-col">
                <h4>Search by BHK</h4>

                <a href="{{ route('rent') }}?bhk=1">1 BHK for Rent</a>
                <a href="{{ route('rent') }}?bhk=2">2 BHK for Rent</a>
                <a href="{{ route('rent') }}?bhk=3">3 BHK for Rent</a>
                <a href="{{ route('rent') }}?bhk=4">4+ BHK for Rent</a>

              </div>

              <!-- Popular Searches -->
              <div class="mega-col">
                <h4>Popular Searches</h4>

                <a href="#">Flats without brokerage</a>
                <a href="#">Furnished flats for rent</a>
                <a href="#">Pet friendly flats</a>
                <a href="#">Verified listings only</a>

              </div>

            </div>

          </div>

        </div>

        <!-- <a href="#">
          Localities <span>⌄</span>
        </a>

        <a href="#">
          Property Types <span>⌄</span>
        </a> -->

        <!-- <a href="#">
          Brokers
        </a> -->


        <a href="{{ route('contact') }}">
          Contact Us
        </a>

      </nav>

      <!-- Header Actions -->
      <div class="nav-actions">

        <button class="nav-btn" type="button" id="lpfOpenBtn">
          <span class="btn-icon"><i class="fa-solid fa-building"></i></span>
          <span>List Your Property</span>
        </button>

        <button class="nav-btn primary" type="button">
          <span class="btn-icon">♙</span>
          <a href="{{ route('login') }}"><span>Login / Register</span></a>
        </button>

      </div>

      <!-- Mobile Menu Button -->
      <button class="mobile-menu-btn" type="button" aria-label="Open menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
      </button>

    </div>
  </header>
  <!-- ================= MOBILE SIDEBAR ================= -->

  <div class="mobile-overlay"></div>

  <aside class="mobile-sidebar" aria-hidden="true">

    <div class="mobile-sidebar-header">

      <a class="mobile-sidebar-logo" href="{{ route('home') }}">
        <img src="{{ asset('website/images/venlogo.png') }}" alt="Keys Please Venture">
      </a>

      <button class="mobile-close-btn" type="button" aria-label="Close menu">
        &times;
      </button>

    </div>

    <div class="mobile-sidebar-content">

      <!-- City -->
      <!-- <button class="mobile-city" type="button">
        <span>⌖</span>
        <span>Bangalore</span>
        <span>⌄</span>
      </button> -->

      <!-- Navigation -->
      <nav class="mobile-sidebar-menu">

        <a href="{{ route('home') }}">
          <span>Home</span>
          <span>›</span>
        </a>

        <a href="{{ route('rent') }}">
          <span>Rent</span>
          <i class="fa-solid fa-chevron-down"></i>
        </a>

        <!-- <a href="#">
          <span>Localities</span>
          <span>⌄</span>
        </a>

        <a href="#">
          <span>Property Types</span>
          <span>⌄</span>
        </a>

        <a href="#">
          <span>Brokers</span>
          <span>›</span>
        </a> -->

        <a href="{{ route('about') }}">
          <span>About Us</span>
          <span>›</span>
        </a>

        <a href="{{ route('contact') }}">
          <span>Contact Us</span>
          <span>›</span>
        </a>

      </nav>

      <!-- Actions -->
      <div class="mobile-sidebar-actions">

        <button class="mobile-sidebar-btn" type="button" id="lpfMobileOpenBtn">
          <span class="btn-icon"><i class="fa-solid fa-building"></i></span>
          <span>List Your Property</span>
        </button>

        <button type="button" class="mobile-sidebar-btn primary" onclick="window.location.href='{{ route('login') }}'">

          <span>♙</span>
          <span>Login / Register</span>

        </button>

      </div>

    </div>

  </aside>


  <!-- ================= PAGE CONTENT ================= -->

  <main>
    @yield('content')
  </main>


  <!-- ================= FOOTER ================= -->

  <footer id="contact">

    <div class="container footer-main">

      <!-- Company -->
      <div class="footer-company">

        <a class="logo" href="{{ route('home') }}">
          <img src="{{ asset('website/images/venlogo.png') }}" alt="Keys Please Venture">
        </a>

        <div class="footer-copy">
          Bangalore's trusted platform for rental properties.
          Find verified listings, connect with trusted brokers,
          and move into your dream rental home.
        </div>

        <div class="social">
          <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
          <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
        </div>

      </div>


      <!-- Quick Links -->
      <div class="footer-col">

        <h4>Quick Links</h4>

        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('rent') }}">Search Properties</a>
        <!-- <a href="#">Localities</a>
        <a href="#">Property Types</a> -->
        <!-- <a href="#">Brokers</a> -->
        <a href="{{ route('about') }}">About Us</a>
        <a href="{{ route('contact') }}">Contact Us</a>

      </div>


      <!-- Tenants -->
      <div class="footer-col">

        <h4>For Tenants</h4>

        <a href="#">How it Works</a>
        <a href="#">FAQs</a>
        <a href="#">Rental Guide</a>
        <a href="#">Safety Tips</a>
        <a href="#">Enquiry Support</a>

      </div>


      <!-- Owners & Brokers -->
      <div class="footer-col">

        <h4>For Owners &amp; Brokers</h4>

        <a href="#">List Your Property</a>
        <a href="#">Broker Benefits</a>
        <a href="#">Partner with Us</a>
        <a href="#">Resources</a>
        <a href="#">Terms &amp; Conditions</a>

      </div>


      <!-- Contact -->
      <div class="footer-col contact">

        <h4>Contact Us</h4>

        <a href="tel:+918012345678">
          <i class="fa-solid fa-phone"></i> &nbsp; +91 80 1234 5678
        </a>

        <a href="mailto:info@keyspleaseventure.com">
          <i class="fa-solid fa-envelope"></i> &nbsp; info@keyspleaseventure.com
        </a>

        <a href="#">
          <i class="fa-solid fa-location-dot"></i> &nbsp; Bangalore, Karnataka, India
        </a>


        <h4 class="download-title">
          Download Our App
        </h4>

        <div class="apps">

          <div class="app">
            <i class="fa-brands fa-google-play"></i> &nbsp; Google Play
          </div>

          <div class="app">
            <i class="fa-brands fa-app-store-ios"></i> &nbsp; App Store
          </div>

        </div>

      </div>

    </div>


    <!-- Copyright -->

    <div class="container copyright">

      <span>
        © 2026 Keys Please Venture. All Rights Reserved.Developed By <a href="https://www.thiven.com/" target="_blank"
                style="text-decoration: none;color: #000;">ThiVen</a>
      </span>

      <span>
        Privacy Policy &nbsp; | &nbsp; Terms &amp; Conditions
      </span>

    </div>

  </footer>






  <!-- ================= MODAL ================= -->
  <div class="lpf-overlay" id="lpfOverlay">
    <div class="lpf-modal">

      <div class="lpf-modal-header">
        <h3 class="lpf-modal-title">List Your Property</h3>
        <button class="lpf-modal-close" id="lpfCloseBtn" type="button">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>

      <!-- Stepper -->
      <div class="lpf-stepper" id="lpfStepper">
        <div class="lpf-step-dot-wrap lpf-step-active" data-step="1">
          <div class="lpf-step-dot">1</div>
          <div class="lpf-step-label">Type</div>
          <div class="lpf-step-line"></div>
        </div>
        <div class="lpf-step-dot-wrap" data-step="2">
          <div class="lpf-step-dot">2</div>
          <div class="lpf-step-label">Location</div>
          <div class="lpf-step-line"></div>
        </div>
        <div class="lpf-step-dot-wrap" data-step="3">
          <div class="lpf-step-dot">3</div>
          <div class="lpf-step-label">Pricing</div>
          <div class="lpf-step-line"></div>
        </div>
        <div class="lpf-step-dot-wrap" data-step="4">
          <div class="lpf-step-dot">4</div>
          <div class="lpf-step-label">Photos</div>
          <div class="lpf-step-line"></div>
        </div>
        <div class="lpf-step-dot-wrap" data-step="5">
          <div class="lpf-step-dot">5</div>
          <div class="lpf-step-label">Review</div>
        </div>
      </div>

      <div class="lpf-modal-body">

        <!-- ===== Step 1: Property Type + Rent/Sell ===== -->
        <div class="lpf-panel lpf-panel-active" data-panel="1">
          <p class="lpf-panel-title">What are you listing?</p>

          <div class="lpf-field">
            <label>Looking to</label>
            <div class="lpf-pill-group" id="lpfListingFor">
              <button type="button" class="lpf-pill lpf-pill-active" data-value="Rent">Rent</button>
              <button type="button" class="lpf-pill" data-value="Sell">Sell</button>
              <button type="button" class="lpf-pill" data-value="PG">PG / Co-living</button>
            </div>
          </div>

          <div class="lpf-field">
            <label>Property Type</label>
            <div class="lpf-pill-group" id="lpfPropertyType">
              <button type="button" class="lpf-pill lpf-pill-active" data-value="Apartment">Apartment</button>
              <button type="button" class="lpf-pill" data-value="Villa">Villa</button>
              <button type="button" class="lpf-pill" data-value="Independent House">Independent House</button>
              <button type="button" class="lpf-pill" data-value="Plot">Plot</button>
            </div>
          </div>
        </div>

        <!-- ===== Step 2: Location details ===== -->
        <div class="lpf-panel" data-panel="2">
          <p class="lpf-panel-title">Where is your property?</p>

          <div class="lpf-field">
            <label for="lpfLocality">Locality / Area</label>
            <input type="text" id="lpfLocality" class="lpf-input" placeholder="e.g. Koramangala">
          </div>

          <div class="lpf-field">
            <label for="lpfAddress">Full Address</label>
            <textarea id="lpfAddress" class="lpf-textarea" placeholder="House / Flat no, street, landmark"></textarea>
          </div>

          <div class="lpf-row">
            <div class="lpf-field" style="margin-bottom:0;">
              <label for="lpfBhk">BHK</label>
              <select id="lpfBhk" class="lpf-select">
                <option>1 BHK</option>
                <option>2 BHK</option>
                <option>3 BHK</option>
                <option>4+ BHK</option>
              </select>
            </div>
            <div class="lpf-field" style="margin-bottom:0;">
              <label for="lpfArea">Area (sq ft)</label>
              <input type="number" id="lpfArea" class="lpf-input" placeholder="e.g. 1200">
            </div>
          </div>
        </div>

        <!-- ===== Step 3: Pricing, amenities, furnishing ===== -->
        <div class="lpf-panel" data-panel="3">
          <p class="lpf-panel-title">Pricing & amenities</p>

          <div class="lpf-row">
            <div class="lpf-field" style="margin-bottom:0;">
              <label for="lpfRent">Expected Rent / Price (₹)</label>
              <input type="number" id="lpfRent" class="lpf-input" placeholder="e.g. 35000">
            </div>
            <div class="lpf-field" style="margin-bottom:0;">
              <label for="lpfFurnishing">Furnishing</label>
              <select id="lpfFurnishing" class="lpf-select">
                <option>Unfurnished</option>
                <option>Semi-Furnished</option>
                <option>Fully Furnished</option>
              </select>
            </div>
          </div>

          <div class="lpf-field">
            <label>Amenities</label>
            <div class="lpf-amenities">
              <label class="lpf-amenity"><input type="checkbox" value="Parking"> Parking</label>
              <label class="lpf-amenity"><input type="checkbox" value="Lift"> Lift</label>
              <label class="lpf-amenity"><input type="checkbox" value="Power Backup"> Power Backup</label>
              <label class="lpf-amenity"><input type="checkbox" value="Gym"> Gym</label>
              <label class="lpf-amenity"><input type="checkbox" value="Security"> 24/7 Security</label>
              <label class="lpf-amenity"><input type="checkbox" value="Water Supply"> Water Supply</label>
            </div>
          </div>
        </div>

        <!-- ===== Step 4: Photos + contact ===== -->
        <div class="lpf-panel" data-panel="4">
          <p class="lpf-panel-title">Photos & contact details</p>

          <div class="lpf-field">
            <label>Upload Photos</label>
            <label class="lpf-upload" id="lpfUploadZone">
              <i class="fa-solid fa-cloud-arrow-up"></i>
              <div>Click to upload or drag photos here</div>
              <div class="lpf-upload-hint">JPG or PNG, up to 10 photos</div>
              <input type="file" id="lpfFileInput" accept="image/*" multiple style="display:none;">
            </label>
            <div class="lpf-file-list" id="lpfFileList"></div>
          </div>

          <div class="lpf-row">
            <div class="lpf-field" style="margin-bottom:0;">
              <label for="lpfOwnerName">Your Name</label>
              <input type="text" id="lpfOwnerName" class="lpf-input" placeholder="Full name">
            </div>
            <div class="lpf-field" style="margin-bottom:0;">
              <label for="lpfOwnerPhone">Phone Number</label>
              <input type="tel" id="lpfOwnerPhone" class="lpf-input" placeholder="+91 98765 43210">
            </div>
          </div>
        </div>

        <!-- ===== Step 5: Review & submit ===== -->
        <div class="lpf-panel" data-panel="5">
          <p class="lpf-panel-title">Review your listing</p>
          <div id="lpfReviewList"></div>
        </div>

        <!-- ===== Success state (shown after submit) ===== -->
        <div class="lpf-panel" data-panel="success">
          <div class="lpf-success">
            <i class="fa-solid fa-circle-check"></i>
            <h3>Listing Submitted!</h3>
            <p>Your property has been submitted for review. We'll notify you once it's live.</p>
          </div>
        </div>

      </div>

      <div class="lpf-modal-footer" id="lpfFooter">
        <button type="button" class="lpf-btn lpf-btn-secondary" id="lpfPrevBtn" disabled>
          <i class="fa-solid fa-arrow-left"></i> Back
        </button>
        <button type="button" class="lpf-btn lpf-btn-primary" id="lpfNextBtn">
          Next <i class="fa-solid fa-arrow-right"></i>
        </button>
      </div>

    </div>
  </div>


  <!-- ================= JAVASCRIPT ================= -->

  <script>
    document.addEventListener('DOMContentLoaded', function () {

      const header = document.querySelector('header');

      /* Scroll Header */
      function updateScrollUI() {
        if (window.scrollY > 15) {
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
        }
      }

      window.addEventListener('scroll', updateScrollUI, {
        passive: true
      });

      updateScrollUI();


      /* Back To Top */
      const backTop = document.createElement('button');

      backTop.className = 'back-top';
      backTop.setAttribute('aria-label', 'Back to top');
      backTop.innerHTML = '↑';

      document.body.appendChild(backTop);


      function updateBackTop() {
        if (window.scrollY > 450) {
          backTop.classList.add('show');
        } else {
          backTop.classList.remove('show');
        }
      }

      window.addEventListener('scroll', updateBackTop, {
        passive: true
      });


      backTop.addEventListener('click', function () {

        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });

      });


      /* Smooth Anchor Navigation */
      document.querySelectorAll('a[href^="#"]').forEach(function (link) {

        link.addEventListener('click', function (e) {

          const id = link.getAttribute('href');

          if (id && id !== '#') {

            const target = document.querySelector(id);

            if (target) {

              e.preventDefault();

              target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
              });

            }

          }

        });

      });


      /* Reveal Animation */
      const revealItems = document.querySelectorAll(
        '.reveal, .reveal-left, .stagger'
      );

      if ('IntersectionObserver' in window) {

        const observer = new IntersectionObserver(
          function (entries) {

            entries.forEach(function (entry) {

              if (entry.isIntersecting) {

                entry.target.classList.add('visible');

                observer.unobserve(entry.target);

              }

            });

          },
          {
            threshold: 0.14,
            rootMargin: '0px 0px -35px 0px'
          }
        );

        revealItems.forEach(function (item) {
          observer.observe(item);
        });

      }


      /* Heart Interaction */
      document.querySelectorAll('.heart').forEach(function (heart) {

        heart.addEventListener('click', function (e) {

          e.preventDefault();
          e.stopPropagation();

          const liked = heart.dataset.liked === 'true';

          heart.dataset.liked = String(!liked);
          heart.textContent = liked ? '♡' : '♥';

          heart.style.color = liked
            ? '#677089'
            : '#e52e5f';

          if (heart.animate) {

            heart.animate(
              [
                {
                  transform: 'scale(1)'
                },
                {
                  transform: 'scale(1.25)'
                },
                {
                  transform: 'scale(1)'
                }
              ],
              {
                duration: 300,
                easing: 'ease-out'
              }
            );

          }

        });

      });


      /* Button Ripple */
      document.querySelectorAll(
        '.search-btn, .cta button, .subscribe button'
      ).forEach(function (btn) {

        btn.addEventListener('click', function (e) {

          const rect = this.getBoundingClientRect();

          const ripple = document.createElement('span');

          ripple.className = 'ripple';

          ripple.style.left =
            (e.clientX - rect.left - 6) + 'px';

          ripple.style.top =
            (e.clientY - rect.top - 6) + 'px';

          this.appendChild(ripple);

          if (ripple.animate) {

            ripple.animate(
              [
                {
                  transform: 'scale(0)',
                  opacity: 1
                },
                {
                  transform: 'scale(18)',
                  opacity: 0
                }
              ],
              {
                duration: 550,
                easing: 'ease-out'
              }
            ).onfinish = function () {
              ripple.remove();
            };

          } else {

            setTimeout(function () {
              ripple.remove();
            }, 550);

          }

        });

      });



      /* =========================================================
   MOBILE SIDEBAR MENU
   ========================================================= */

      const mobileMenuBtn =
        document.querySelector('.mobile-menu-btn');

      const mobileSidebar =
        document.querySelector('.mobile-sidebar');

      const mobileOverlay =
        document.querySelector('.mobile-overlay');

      const mobileCloseBtn =
        document.querySelector('.mobile-close-btn');

      const mobileSidebarLinks =
        document.querySelectorAll('.mobile-sidebar-menu a');


      function openMobileMenu() {

        if (!mobileSidebar) return;

        mobileSidebar.classList.add('active');

        mobileOverlay.classList.add('active');

        mobileMenuBtn.classList.add('active');

        mobileMenuBtn.setAttribute(
          'aria-expanded',
          'true'
        );

        mobileSidebar.setAttribute(
          'aria-hidden',
          'false'
        );

        document.body.classList.add(
          'menu-open'
        );
      }


      function closeMobileMenu() {

        if (!mobileSidebar) return;

        mobileSidebar.classList.remove('active');

        mobileOverlay.classList.remove('active');

        mobileMenuBtn.classList.remove('active');

        mobileMenuBtn.setAttribute(
          'aria-expanded',
          'false'
        );

        mobileSidebar.setAttribute(
          'aria-hidden',
          'true'
        );

        document.body.classList.remove(
          'menu-open'
        );
      }


      /* OPEN */

      if (mobileMenuBtn) {

        mobileMenuBtn.addEventListener(
          'click',
          function () {

            const isOpen =
              mobileSidebar.classList.contains(
                'active'
              );

            if (isOpen) {
              closeMobileMenu();
            } else {
              openMobileMenu();
            }

          }
        );

      }


      /* CLOSE BUTTON */

      if (mobileCloseBtn) {

        mobileCloseBtn.addEventListener(
          'click',
          closeMobileMenu
        );

      }


      /* OVERLAY */

      if (mobileOverlay) {

        mobileOverlay.addEventListener(
          'click',
          closeMobileMenu
        );

      }


      /* CLOSE AFTER CLICKING LINK */

      mobileSidebarLinks.forEach(
        function (link) {

          link.addEventListener(
            'click',
            function () {

              closeMobileMenu();

            }
          );

        }
      );


      /* ESC KEY */

      document.addEventListener(
        'keydown',
        function (e) {

          if (e.key === 'Escape') {

            closeMobileMenu();

          }

        }
      );


      /* CLOSE WHEN RESIZING TO DESKTOP */

      window.addEventListener(
        'resize',
        function () {

          if (window.innerWidth > 1024) {

            closeMobileMenu();

          }

        }
      );

    });
  </script>




  <script>
    (function () {
      var totalSteps = 5;
      var currentStep = 1;

      var overlay = document.getElementById('lpfOverlay');
      var openBtn = document.getElementById('lpfOpenBtn');
      var mobileOpenBtn = document.getElementById('lpfMobileOpenBtn');
      var closeBtn = document.getElementById('lpfCloseBtn');
      var prevBtn = document.getElementById('lpfPrevBtn');
      var nextBtn = document.getElementById('lpfNextBtn');
      var footer = document.getElementById('lpfFooter');
      var stepDots = document.querySelectorAll('.lpf-step-dot-wrap');
      var panels = document.querySelectorAll('.lpf-panel');

      var formState = {
        listingFor: 'Rent',
        propertyType: 'Apartment'
      };

      // ---- Open / close modal ----
      function openModal() {
        if (!overlay) return;

        overlay.classList.add('lpf-overlay-open');
        document.body.classList.add('lpf-modal-open');

        goToStep(1);

        // Always start the modal at the top.
        var modal = overlay.querySelector('.lpf-modal');
        if (modal) modal.scrollTop = 0;
      }

      if (openBtn) {
        openBtn.addEventListener('click', openModal);
      }

      if (mobileOpenBtn) {
        mobileOpenBtn.addEventListener('click', function () {
          // Close the mobile sidebar first.
          if (typeof closeMobileMenu === 'function') {
            closeMobileMenu();
          }

          openModal();
        });
      }

      if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
      }
      if (overlay) {
        overlay.addEventListener('click', function (e) {
          if (e.target === overlay) closeModal();
        });
      }

      function closeModal() {
        if (!overlay) return;

        overlay.classList.remove('lpf-overlay-open');
        document.body.classList.remove('lpf-modal-open');
      }

      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && overlay && overlay.classList.contains('lpf-overlay-open')) {
          closeModal();
        }
      });

      // ---- Pill groups (Listing For / Property Type) ----
      function setupPillGroup(containerId, stateKey) {
        var container = document.getElementById(containerId);
        container.querySelectorAll('.lpf-pill').forEach(function (pill) {
          pill.addEventListener('click', function () {
            container.querySelectorAll('.lpf-pill').forEach(function (p) {
              p.classList.remove('lpf-pill-active');
            });
            pill.classList.add('lpf-pill-active');
            formState[stateKey] = pill.getAttribute('data-value');
          });
        });
      }
      setupPillGroup('lpfListingFor', 'listingFor');
      setupPillGroup('lpfPropertyType', 'propertyType');

      // ---- File upload ----
      var uploadZone = document.getElementById('lpfUploadZone');
      var fileInput = document.getElementById('lpfFileInput');
      var fileList = document.getElementById('lpfFileList');

      fileInput.addEventListener('change', function () {
        fileList.innerHTML = '';
        Array.from(fileInput.files).forEach(function (file) {
          var chip = document.createElement('span');
          chip.className = 'lpf-file-chip';
          chip.innerHTML = '<i class="fa-solid fa-image"></i> ' + file.name;
          fileList.appendChild(chip);
        });
      });

      // ---- Step navigation ----
      function goToStep(step) {
        currentStep = step;

        panels.forEach(function (panel) {
          panel.classList.toggle('lpf-panel-active', panel.getAttribute('data-panel') == step);
        });

        stepDots.forEach(function (dot) {
          var dotStep = parseInt(dot.getAttribute('data-step'), 10);
          dot.classList.remove('lpf-step-active', 'lpf-step-done');
          if (dotStep < step) dot.classList.add('lpf-step-done');
          if (dotStep === step) dot.classList.add('lpf-step-active');
        });

        prevBtn.disabled = (step === 1);

        if (step === totalSteps) {
          nextBtn.innerHTML = 'Submit Listing <i class="fa-solid fa-check"></i>';
          buildReview();
        } else {
          nextBtn.innerHTML = 'Next <i class="fa-solid fa-arrow-right"></i>';
        }
      }

      prevBtn.addEventListener('click', function () {
        if (currentStep > 1) goToStep(currentStep - 1);
      });

      nextBtn.addEventListener('click', function () {
        if (currentStep < totalSteps) {
          goToStep(currentStep + 1);
        } else {
          submitListing();
        }
      });

      // ---- Build review summary ----
      function buildReview() {
        var amenities = Array.from(document.querySelectorAll('.lpf-amenity input:checked'))
          .map(function (cb) { return cb.value; })
          .join(', ') || 'None selected';

        var reviewData = [
          ['Looking to', formState.listingFor],
          ['Property Type', formState.propertyType],
          ['Locality', document.getElementById('lpfLocality').value || '-'],
          ['BHK', document.getElementById('lpfBhk').value],
          ['Area', (document.getElementById('lpfArea').value || '-') + ' sq ft'],
          ['Price', '₹ ' + (document.getElementById('lpfRent').value || '-')],
          ['Furnishing', document.getElementById('lpfFurnishing').value],
          ['Amenities', amenities],
          ['Photos', fileInput.files.length + ' file(s)'],
          ['Contact', (document.getElementById('lpfOwnerName').value || '-') + ' · ' + (document.getElementById('lpfOwnerPhone').value || '-')]
        ];

        var container = document.getElementById('lpfReviewList');
        container.innerHTML = '';
        reviewData.forEach(function (item) {
          var row = document.createElement('div');
          row.className = 'lpf-review-item';
          row.innerHTML = '<span class="lpf-review-label">' + item[0] + '</span>' +
            '<span class="lpf-review-value">' + item[1] + '</span>';
          container.appendChild(row);
        });
      }

      // ---- Submit ----
      function submitListing() {
        // Replace this with an actual fetch/axios POST to your Laravel route, e.g.:
        // fetch('/property/store', { method:'POST', body: new FormData(...) })

        panels.forEach(function (panel) {
          panel.classList.remove('lpf-panel-active');
        });
        document.querySelector('.lpf-panel[data-panel="success"]').classList.add('lpf-panel-active');
        document.getElementById('lpfStepper').style.display = 'none';
        footer.style.display = 'none';
      }

    })();
  </script>

</body>

</html>

<style>

/* =========================================================
   KEYS PLEASE VENTURE — COMPLETE RESPONSIVE OVERRIDE
   ---------------------------------------------------------
   Existing functionality/content/routes/business logic remain
   untouched. This block only improves responsive presentation.
========================================================= */

*,
*::before,
*::after {
    box-sizing: border-box;
}

html,
body {
    max-width: 100%;
    overflow-x: hidden;
}

img,
svg,
video,
canvas {
    max-width: 100%;
    height: auto;
}

button,
input,
select,
textarea {
    max-width: 100%;
}

.container {
    width: min(100% - 40px, 1600px);
}

/* =========================================================
   LARGE DESKTOP — 1441px+
========================================================= */

@media (min-width: 1441px) {
    .container {
        width: min(100% - 64px, 1600px);
    }

    .footer-main {
        grid-template-columns: 1.25fr 1fr 1fr 1fr 1.1fr;
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

    .nav {
        gap: 18px;
    }

    .menu {
        gap: clamp(18px, 2vw, 32px);
        margin-left: clamp(18px, 3vw, 48px);
    }

    .nav-actions {
        gap: 10px;
        flex-shrink: 0;
    }

    .nav-btn {
        padding-inline: 14px;
    }

    .nav-btn.primary {
        min-width: 145px;
    }

    .footer-main {
        grid-template-columns: repeat(5, minmax(0, 1fr));
    }

    .copyright {
        align-items: center;
        flex-wrap: wrap;
    }
}

/* =========================================================
   SMALL LAPTOP — 769px–1024px
========================================================= */

@media (min-width: 769px) and (max-width: 1024px) {
    .container {
        width: calc(100% - 32px);
    }

    header,
    .nav {
        height: 74px;
    }

    .nav {
        justify-content: space-between;
        gap: 12px;
    }

    .logo {
        width: 116px;
        height: 74px;
        flex: 0 0 auto;
    }

    .city {
        width: 120px;
        margin-left: 0;
        padding-inline: 10px;
        flex: 0 0 auto;
    }

    .menu {
        gap: 14px;
        margin-left: 0;
        font-size: 12px;
        min-width: 0;
    }

    .menu a {
        white-space: nowrap;
    }

    .nav-actions {
        gap: 6px;
        margin-left: 0;
        flex: 0 0 auto;
    }

    .nav-btn {
        height: 38px;
        padding-inline: 9px;
        font-size: 10px;
    }

    .nav-btn.primary {
        min-width: 112px;
    }

    .footer-main {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 28px 20px;
    }

    .footer-company {
        grid-column: 1 / -1;
    }

    .copyright {
        flex-wrap: wrap;
    }
}

/* =========================================================
   TABLET — 481px–768px
========================================================= */

@media (min-width: 481px) and (max-width: 768px) {
    .container {
        width: calc(100% - 28px);
    }

    header,
    .nav {
        height: 70px;
    }

    .nav {
        justify-content: space-between;
    }

    .logo {
        width: 116px;
        height: 70px;
    }

    .city,
    .menu,
    .nav-actions {
        display: none;
    }

    .mobile-menu-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 auto;
    }

    .footer-main {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 28px 20px;
    }

    .footer-company {
        grid-column: 1 / -1;
    }

    .footer-copy {
        max-width: 100%;
        font-size: 12px;
        line-height: 1.6;
    }

    .footer-col h4 {
        font-size: 13px;
    }

    .footer-col a,
    .contact a {
        font-size: 11px;
    }

    .copyright {
        flex-direction: column;
        align-items: flex-start;
        gap: 7px;
        line-height: 1.5;
    }

    /* Modal */
    .lpf-overlay {
        padding: 16px;
    }

    .lpf-modal {
        width: min(100%, 680px);
        max-height: calc(100dvh - 32px);
    }

    .lpf-row {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

/* =========================================================
   MOBILE — 320px–480px
========================================================= */

@media (min-width: 320px) and (max-width: 480px) {
    .container {
        width: calc(100% - 20px);
    }

    header,
    .nav {
        height: 65px;
    }

    .nav {
        justify-content: space-between;
        gap: 10px;
    }

    .logo {
        width: 108px;
        height: 65px;
        flex: 0 0 auto;
    }

    .logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .city,
    .menu,
    .nav-actions {
        display: none;
    }

    .mobile-menu-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        flex: 0 0 auto;
    }

    /* Footer */
    .footer-main {
        grid-template-columns: 1fr;
        gap: 24px;
        padding: 28px 0 18px;
    }

    .footer-company {
        grid-column: auto;
    }

    .footer-copy {
        max-width: 100%;
        font-size: 11px;
        line-height: 1.65;
    }

    .footer-col h4 {
        font-size: 13px;
        margin-bottom: 10px;
    }

    .footer-col a,
    .contact a {
        font-size: 10px;
        line-height: 1.45;
        margin: 7px 0;
    }

    .apps {
        flex-wrap: wrap;
    }

    .app {
        min-height: 30px;
        height: auto;
        padding: 7px 10px;
        white-space: normal;
    }

    .copyright {
        flex-direction: column;
        align-items: flex-start;
        gap: 7px;
        line-height: 1.55;
        padding: 10px 0;
        font-size: 9px;
    }

    .copyright span {
        max-width: 100%;
        overflow-wrap: anywhere;
    }

    /* Mobile sidebar */
    .mobile-sidebar {
        width: min(88vw, 360px);
        max-width: 100%;
    }

    .mobile-sidebar-content {
        width: 100%;
    }

    .mobile-sidebar-actions {
        width: 100%;
    }

    .mobile-sidebar-btn {
        width: 100%;
        min-height: 44px;
    }

    /* List-your-property modal */
    .lpf-overlay {
        align-items: flex-start;
        padding: 12px;
    }

    .lpf-modal {
        width: 100%;
        max-width: 100%;
        height: calc(100dvh - 24px);
        max-height: calc(100dvh - 24px);
        border-radius: 14px;
    }

    .lpf-modal-header {
        gap: 10px;
    }

    .lpf-modal-title {
        font-size: clamp(17px, 5vw, 21px);
        line-height: 1.25;
    }

    .lpf-stepper {
        overflow-x: auto;
        overflow-y: hidden;
        scrollbar-width: none;
        -webkit-overflow-scrolling: touch;
    }

    .lpf-stepper::-webkit-scrollbar {
        display: none;
    }

    .lpf-step-label {
        font-size: 10px;
        white-space: nowrap;
    }

    .lpf-modal-body {
        min-width: 0;
    }

    .lpf-panel {
        min-width: 0;
    }

    .lpf-row {
        grid-template-columns: 1fr;
        gap: 14px;
    }

    .lpf-pill-group {
        display: grid;
        grid-template-columns: 1fr;
        gap: 8px;
    }

    .lpf-pill {
        width: 100%;
        min-height: 42px;
    }

    .lpf-input,
    .lpf-select,
    .lpf-textarea {
        width: 100%;
        min-width: 0;
    }

    .lpf-amenities {
        grid-template-columns: 1fr;
    }

    .lpf-upload {
        width: 100%;
        min-height: 120px;
    }

    .lpf-modal-footer {
        gap: 8px;
    }

    .lpf-btn {
        min-height: 44px;
        flex: 1 1 0;
    }

    /* Prevent long content from forcing horizontal overflow */
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
    button {
        overflow-wrap: anywhere;
    }
}

/* =========================================================
   VERY SMALL SAFETY — below 320px
   No separate design system; only overflow protection.
========================================================= */

@media (max-width: 319px) {
    .container {
        width: calc(100% - 16px);
    }

    .logo {
        width: 100px;
    }

    .mobile-sidebar {
        width: 94vw;
    }

    .lpf-overlay {
        padding: 8px;
    }

    .lpf-modal {
        height: calc(100dvh - 16px);
        max-height: calc(100dvh - 16px);
    }

    .lpf-step-label {
        font-size: 9px;
    }

    .copyright {
        font-size: 8px;
    }
}

/* =========================================================
   GENERAL RESPONSIVE SAFETY
========================================================= */

main,
section,
footer,
header,
.container,
.nav,
.footer-main,
.copyright {
    min-width: 0;
}

.footer-col,
.footer-company,
.nav,
.menu,
.nav-actions {
    min-width: 0;
}

table {
    width: 100%;
    max-width: 100%;
    border-collapse: collapse;
}

.table-responsive,
.table-wrapper {
    max-width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

input,
select,
textarea {
    min-width: 0;
}

iframe,
video {
    max-width: 100%;
}

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
