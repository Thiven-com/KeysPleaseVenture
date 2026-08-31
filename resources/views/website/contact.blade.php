@extends('layouts.website')
@section('content')

    <section class="contact-hero">
        <div class="contact-hero-container">

            <!-- Left Content -->
            <div class="contact-hero-content">

                <span class="contact-label">CONTACT US</span>

                <span class="contact-label-line"></span>

                <h1>
                    We're Here to Help<br>
                    You Find the Right Home
                </h1>

                <p class="contact-description">
                    Have a question or need assistance? Our team is ready to help
                    you with all your rental needs. Reach out to us anytime!
                </p>


                <!-- Support Features -->
                <div class="contact-features">

                    <!-- Quick Support -->
                    <div class="contact-feature">

                        <div class="contact-feature-icon">
                            <i class="fa-solid fa-bolt"></i>
                        </div>

                        <h3>Quick Support</h3>

                        <p>
                            We respond within<br>
                            24 hours
                        </p>

                    </div>


                    <!-- Trusted Assistance -->
                    <div class="contact-feature">

                        <div class="contact-feature-icon">
                            <i class="fa-solid fa-handshake"></i>
                        </div>

                        <h3>Trusted Assistance</h3>

                        <p>
                            Get help from our<br>
                            verified experts
                        </p>

                    </div>


                    <!-- Personalized Service -->
                    <div class="contact-feature">

                        <div class="contact-feature-icon">
                            <i class="fa-solid fa-sliders"></i>
                        </div>

                        <h3>Personalized Service</h3>

                        <p>
                            Solutions tailored to<br>
                            your needs
                        </p>

                    </div>

                </div>

            </div>


            <!-- Contact Form -->
            <div class="contact-form-card">

                <h2>Send Us a Message</h2>

                <form>

                    <div class="contact-form-row">

                        <div class="contact-input-group">
                            <span class="input-icon"><i class="fa-solid fa-user"></i></span>

                            <input type="text" name="name" placeholder="Full Name">
                        </div>

                        <div class="contact-input-group">
                            <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>

                            <input type="email" name="email" placeholder="Email Address">
                        </div>

                    </div>


                    <div class="contact-form-row">

                        <div class="contact-input-group">
                            <span class="input-icon"><i class="fa-solid fa-phone"></i></span>

                            <input type="tel" name="phone" placeholder="Phone Number">
                        </div>

                        <div class="contact-input-group">
                            <span class="input-icon"><i class="fa-solid fa-heading"></i></span>

                            <input type="text" name="subject" placeholder="Subject">
                        </div>

                    </div>


                    <!-- Message -->
                    <div class="contact-textarea-group">

                        <span class="textarea-icon"><i class="fa-solid fa-comment-dots"></i></span>

                        <textarea name="message" placeholder="Your Message"></textarea>

                    </div>


                    <!-- Submit -->
                    <button type="submit" class="contact-submit-btn">
                        Send Message
                        <span><i class="fa-solid fa-paper-plane"></i></span>
                    </button>


                    <!-- Privacy -->
                    <div class="contact-privacy">
                        <span><i class="fa-solid fa-lock"></i></span>
                        Your information is safe with us. We respect your privacy.
                    </div>

                </form>

            </div>

        </div>
    </section>



    <!-- =========================================
                     GET IN TOUCH
                ========================================= -->

    <section class="contact-info-section">

        <div class="contact-info-container">

            <!-- Section Heading -->
            <div class="contact-info-header">

                <span class="contact-info-label">
                    GET IN TOUCH
                </span>

                <h2>
                    Multiple Ways to Connect
                </h2>

                <p>
                    Choose the best way to reach us. We're always here for you.
                </p>

            </div>


            <!-- Main Content -->
            <div class="contact-info-grid">

                <!-- =================================
                                 CONTACT METHODS
                            ================================= -->

                <div class="contact-methods">

                    <!-- Call -->
                    <div class="contact-method-card">

                        <div class="contact-method-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>

                        <div class="contact-method-content">

                            <h3>Call Us</h3>

                            <strong>
                                +91 98765 43210
                            </strong>

                            <p>
                                Mon - Sat: 9:00 AM - 7:00 PM
                            </p>

                        </div>

                    </div>


                    <!-- WhatsApp -->
                    <div class="contact-method-card whatsapp">

                        <div class="contact-method-icon">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>

                        <div class="contact-method-content">

                            <h3>WhatsApp</h3>

                            <strong>
                                +91 98765 43210
                            </strong>

                            <p>
                                Chat with us on WhatsApp
                            </p>

                        </div>

                    </div>


                    <!-- Email -->
                    <div class="contact-method-card">

                        <div class="contact-method-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <div class="contact-method-content">

                            <h3>Email Us</h3>

                            <strong>
                                support@keysplease.com
                            </strong>

                            <p>
                                We reply within 24 hours
                            </p>

                        </div>

                    </div>


                    <!-- Working Hours -->
                    <div class="contact-method-card">

                        <div class="contact-method-icon">
                            <i class="fa-solid fa-clock"></i>
                        </div>

                        <div class="contact-method-content">

                            <h3>Working Hours</h3>

                            <strong>
                                Mon - Sat: 9:00 AM - 7:00 PM
                            </strong>

                            <p>
                                Sunday: Closed
                            </p>

                        </div>

                    </div>

                </div>


                <!-- =================================
                                 OFFICE
                            ================================= -->

                <div class="office-card">

                    <div class="office-title">

                        <span class="office-title-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </span>

                        <h3>
                            Visit Our Office
                        </h3>

                    </div>

                    <strong>
                        Keysplease Venture Pvt. Ltd.
                    </strong>

                    <p>
                        No. 45, 2nd Floor, 17th Cross,<br>
                        HSR Layout, Sector 3,<br>
                        Bangalore - 560102, Karnataka
                    </p>

                    <a href="#" class="directions-btn">
                        Get Directions
                        <span><i class="fa-solid fa-arrow-right"></i></span>
                    </a>

                </div>


                <!-- =================================
                                 MAP
                            ================================= -->

                <div class="contact-map">
                    <iframe src="https://www.google.com/maps?q=Bangalore%2C%20Karnataka%2C%20India&z=12&output=embed"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>

        </div>

    </section>



    <section class="partner-section">

        <div class="partner-container">

            <!-- Left Content -->
            <div class="partner-content">

                <div class="partner-icon">
                    <i class="fa-solid fa-handshake"></i>
                </div>

                <div class="partner-text">

                    <h2>
                        Are you a Property Owner or Broker?
                    </h2>

                    <p>
                        Partner with us and grow your business.
                        List properties or join our broker network today.
                    </p>

                </div>

            </div>


            <!-- CTA -->
            <a href="#" class="partner-btn">
                Partner With Us
                <span><i class="fa-solid fa-arrow-right"></i></span>
            </a>

        </div>

    </section>

@endsection