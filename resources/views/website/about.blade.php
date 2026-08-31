@extends('layouts.website')
@section('content')

    <!-- =========================================
                         BREADCRUMB
                    ========================================= -->
    <div class="about-breadcrumb-bar">
        <div class="about-breadcrumb-container">
            <a href="{{ url('/') }}">Home</a>
            <span class="about-breadcrumb-sep">›</span>
            <span class="about-breadcrumb-current">About Us</span>
        </div>
    </div>


    <!-- =========================================
                         HERO
                    ========================================= -->
    <section class="about-hero">
        <div class="about-hero-container">

            <div class="about-hero-content">

                <span class="about-label">WHO WE ARE</span>

                <h1>About KeysPleaseVenture</h1>

                <p>
                    KeysPleaseVenture is India's most trusted real estate platform, helping
                    millions of people find their perfect home.
                </p>

                <p>
                    Whether you want to Buy, Rent or Invest, we make the journey
                    simple, transparent and seamless.
                </p>

                <a href="#" class="about-btn about-btn-primary">
                    Explore Properties
                    <span><i class="fa-solid fa-arrow-right"></i></span>
                </a>

            </div>

            <div class="about-hero-image">
                <img src="{{ asset('website') }}/images/ab2.png"
                    alt="Modern KeysPleaseVenture listed home with pool at dusk">
            </div>

        </div>
    </section>


    <!-- =========================================
                         OUR STORY
                    ========================================= -->
    <section class="about-story">
        <div class="about-story-container">

            <div class="about-story-content">

                <span class="about-label">OUR STORY</span>

                <h2>
                    Simplifying Real Estate<br>
                    For Everyone
                </h2>

                <p>
                    Founded in 2015, KeysPleaseVenture was built with a simple mission - to
                    make real estate search easy, accurate and accessible for everyone.
                </p>

                <p>
                    From a small team with a big dream to a platform trusted by millions,
                    our journey has been about innovation, trust and putting our users first.
                </p>

                <ul class="about-story-list">
                    <li>
                        <span class="about-check"><i class="fa-solid fa-check"></i></span>
                        Verified Listings
                    </li>
                    <li>
                        <span class="about-check"><i class="fa-solid fa-check"></i></span>
                        Trusted by Millions
                    </li>
                    <li>
                        <span class="about-check"><i class="fa-solid fa-check"></i></span>
                        Transparent &amp; Secure
                    </li>
                </ul>

            </div>

            <div class="about-story-media">

                <video id="aboutStoryVideo"
                    src="{{ asset('website') }}/images/mixkit-aerial-shot-of-a-river-in-nature-43607-hd-ready.mp4" muted
                    loop playsinline preload="metadata"></video>

                <button type="button" class="about-play-btn" aria-label="Play company video">
                    <i class="fa-solid fa-play"></i>
                </button>

            </div>

        </div>
    </section>

    <style>
        .about-story-media video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const video = document.getElementById('aboutStoryVideo');
            const playButton = document.querySelector('.about-play-btn');
            const icon = playButton.querySelector('i');

            playButton.addEventListener('click', function () {

                if (video.paused) {
                    video.play();

                    icon.classList.remove('fa-play');
                    icon.classList.add('fa-pause');

                    playButton.setAttribute('aria-label', 'Pause company video');
                } else {
                    video.pause();

                    icon.classList.remove('fa-pause');
                    icon.classList.add('fa-play');

                    playButton.setAttribute('aria-label', 'Play company video');
                }

            });

        });
    </script>


    <!-- =========================================
                         STATS
                    ========================================= -->
    <section class="about-stats">
        <div class="about-stats-container">

            <div class="about-stat">
                <div class="about-stat-icon"><i class="fa-solid fa-house"></i></div>
                <div class="about-stat-body">
                    <strong>2M+</strong>
                    <h3>Happy Customers</h3>
                    <p>Helped people find their dream homes</p>
                </div>
            </div>

            <div class="about-stat">
                <div class="about-stat-icon"><i class="fa-solid fa-building"></i></div>
                <div class="about-stat-body">
                    <strong>500K+</strong>
                    <h3>Properties Listed</h3>
                    <p>Wide range of verified properties</p>
                </div>
            </div>

            <div class="about-stat">
                <div class="about-stat-icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="about-stat-body">
                    <strong>1200+</strong>
                    <h3>Cities &amp; Localities</h3>
                    <p>Strong presence across India</p>
                </div>
            </div>

            <div class="about-stat">
                <div class="about-stat-icon"><i class="fa-solid fa-user-group"></i></div>
                <div class="about-stat-body">
                    <strong>1500+</strong>
                    <h3>Partner Agents</h3>
                    <p>Professional agents to assist you</p>
                </div>
            </div>

        </div>
    </section>


    <!-- =========================================================
             MISSION / VISION
        ========================================================= -->
    <section class="section">
        <div class="container">

            <div class="section-heading reveal">
                <div class="eyebrow">
                    Our Purpose
                </div>

                <h2>
                    Mission &amp; Vision
                </h2>
            </div>

            <div class="mission-grid">

                <!-- Mission Card -->
                <div class="mission-card reveal-left">

                    <div class="mission-icon">
                        <i class="fa-solid fa-house"></i>
                    </div>

                    <h3>
                        Our Mission
                    </h3>

                    <p>
                        To help individuals, families and businesses find
                        the right properties through trusted real estate
                        services, quality developments and transparent
                        guidance. We are committed to making every property
                        journey simple, secure and rewarding.
                    </p>

                </div>

                <!-- Vision Card -->
                <div class="mission-card reveal-right">

                    <div class="mission-icon">
                        <i class="fa-solid fa-building"></i>
                    </div>

                    <h3>
                        Our Vision
                    </h3>

                    <p>
                        To become a trusted and leading real estate brand
                        known for exceptional properties, customer-focused
                        service and lasting value. We envision creating
                        better spaces and helping people turn their property
                        dreams into a meaningful reality.
                    </p>

                </div>

            </div>

        </div>
    </section>

  


    <!-- =========================================
                         VALUES
                    ========================================= -->
    <section class="about-values">
        <div class="about-values-container">

            <div class="about-values-header">
                <span class="about-label about-label-center">OUR VALUES</span>
                <h2>The Principles That Drive Us</h2>
            </div>

            <div class="about-values-grid">

                <div class="about-value-card">
                    <div class="about-value-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3>Trust</h3>
                    <p>We believe in transparency and building lasting trust with our customers.</p>
                </div>

                <div class="about-value-card">
                    <div class="about-value-icon"><i class="fa-solid fa-user"></i></div>
                    <h3>Customer First</h3>
                    <p>Our customers are at the heart of everything we do.</p>
                </div>

                <div class="about-value-card">
                    <div class="about-value-icon"><i class="fa-solid fa-lightbulb"></i></div>
                    <h3>Innovation</h3>
                    <p>We constantly innovate to make real estate simple and seamless.</p>
                </div>

                <div class="about-value-card">
                    <div class="about-value-icon"><i class="fa-solid fa-handshake"></i></div>
                    <h3>Commitment</h3>
                    <p>We are committed to helping you find the right property with ease.</p>
                </div>

            </div>

        </div>
    </section>


    <!-- =========================================
                         TEAM
                    ========================================= -->
    <!-- <section class="about-team">
                        <div class="about-team-container">

                            <div class="about-team-header">
                                <h2>Meet The People Behind KeysPleaseVenture</h2>
                                <a href="#" class="about-team-link">
                                    View All Team
                                    <span><i class="fa-solid fa-arrow-right"></i></span>
                                </a>
                            </div>

                            <div class="about-team-grid">

                                <div class="about-team-card">
                                    <div class="about-team-photo">
                                        <img src="{{ asset('images/team-rahul.jpg') }}" alt="Rahul Sharma">
                                    </div>
                                    <div class="about-team-info">
                                        <div>
                                            <h3>Rahul Sharma</h3>
                                            <p>CEO &amp; Co-Founder</p>
                                        </div>
                                        <a href="#" class="about-team-social" aria-label="Rahul Sharma on LinkedIn">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="about-team-card">
                                    <div class="about-team-photo">
                                        <img src="{{ asset('images/team-priya.jpg') }}" alt="Priya Verma">
                                    </div>
                                    <div class="about-team-info">
                                        <div>
                                            <h3>Priya Verma</h3>
                                            <p>COO &amp; Co-Founder</p>
                                        </div>
                                        <a href="#" class="about-team-social" aria-label="Priya Verma on LinkedIn">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="about-team-card">
                                    <div class="about-team-photo">
                                        <img src="{{ asset('images/team-arjun.jpg') }}" alt="Arjun Mehta">
                                    </div>
                                    <div class="about-team-info">
                                        <div>
                                            <h3>Arjun Mehta</h3>
                                            <p>CTO</p>
                                        </div>
                                        <a href="#" class="about-team-social" aria-label="Arjun Mehta on LinkedIn">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="about-team-card">
                                    <div class="about-team-photo">
                                        <img src="{{ asset('images/team-neha.jpg') }}" alt="Neha Kapoor">
                                    </div>
                                    <div class="about-team-info">
                                        <div>
                                            <h3>Neha Kapoor</h3>
                                            <p>Head of Marketing</p>
                                        </div>
                                        <a href="#" class="about-team-social" aria-label="Neha Kapoor on LinkedIn">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </section> -->


    <!-- =========================================
                         CTA BANNER
                    ========================================= -->
    <section class="about-cta">
        <div class="about-cta-container">

            <div class="about-cta-icon">
                <i class="fa-solid fa-house"></i>
            </div>

            <div class="about-cta-text">
                <h2>Ready to Find Your Dream Home?</h2>
                <p>Explore thousands of properties and discover the perfect place for you and your family.</p>
            </div>

            <a href="{{ route('rent') }}" class="about-btn about-btn-white">
                Browse Properties
                <span><i class="fa-solid fa-arrow-right"></i></span>
            </a>

        </div>
    </section>

@endsection