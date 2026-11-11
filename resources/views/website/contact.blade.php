
@extends('layouts.website')

@section('content')

{{-- =====================================================
     CONTACT HERO SECTION
===================================================== --}}
<section class="contact-hero">
    <div class="contact-hero-container">

        {{-- Left Content --}}
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

            {{-- Support Features --}}
            <div class="contact-features">

                <div class="contact-feature">
                    <div class="contact-feature-icon">
                        <i class="fa-solid fa-bolt"></i>
                    </div>
                    <h3>Quick Support</h3>
                    <p>We respond within<br>24 hours</p>
                </div>

                <div class="contact-feature">
                    <div class="contact-feature-icon">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <h3>Trusted Assistance</h3>
                    <p>Get help from our<br>verified experts</p>
                </div>

                <div class="contact-feature">
                    <div class="contact-feature-icon">
                        <i class="fa-solid fa-sliders"></i>
                    </div>
                    <h3>Personalized Service</h3>
                    <p>Solutions tailored to<br>your needs</p>
                </div>

            </div>
        </div>

        {{-- Contact Form --}}
        <div class="contact-form-card">

            <h2>Send Us a Message</h2>

            <form id="contactForm"
                  action="{{ route('contact.store') }}"
                  method="POST">

                @csrf

                <div class="contact-form-row">

                    <div class="contact-input-group">
                        <span class="input-icon">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <input type="text"
                               name="name"
                               placeholder="Full Name"
                               required>
                    </div>

                    <div class="contact-input-group">
                        <span class="input-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input type="email"
                               name="email"
                               placeholder="Email Address"
                               required>
                    </div>

                </div>

                <div class="contact-form-row">

                    <div class="contact-input-group">
                        <span class="input-icon">
                            <i class="fa-solid fa-phone"></i>
                        </span>
                        <input type="tel"
                               name="phone"
                               placeholder="Phone Number"
                               required>
                    </div>

                    <div class="contact-input-group">
                        <span class="input-icon">
                            <i class="fa-solid fa-heading"></i>
                        </span>
                        <input type="text"
                               name="subject"
                               placeholder="Subject"
                               required>
                    </div>

                </div>

                <div class="contact-textarea-group">
                    <span class="textarea-icon">
                        <i class="fa-solid fa-comment-dots"></i>
                    </span>
                    <textarea name="message"
                              placeholder="Your Message"
                              required></textarea>
                </div>

                <button type="submit"
                        class="contact-submit-btn"
                        id="contactSubmitBtn">

                    Send Message

                    <span>
                        <i class="fa-solid fa-paper-plane"></i>
                    </span>
                </button>

                <div class="contact-privacy">
                    <span>
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    Your information is safe with us. We respect your privacy.
                </div>

            </form>
        </div>

    </div>
</section>


{{-- =====================================================
     DYNAMIC CONTACT INFORMATION
===================================================== --}}

@php
    $phone = $site->phone ?? '';
    $whatsapp = $site->customer_care_no ?: $phone;
    $email = $site->email ?? '';
    $company = $site->company ?? '';
    $address = $site->address ?? '';

    $phoneNumber = preg_replace('/\D/', '', $phone);
    $whatsappNumber = preg_replace('/\D/', '', $whatsapp);

    $mapQuery = urlencode($address);

    $whatsappUrl = $whatsappNumber
        ? 'https://wa.me/' . $whatsappNumber
        : null;

    $mapsUrl = $address
        ? 'https://www.google.com/maps/search/?api=1&query=' . $mapQuery
        : null;
@endphp


{{-- =====================================================
     CONTACT INFORMATION SECTION
===================================================== --}}

<section class="contact-info-section">

    <div class="contact-info-container">

        {{-- Section Heading --}}
        <div class="contact-info-header">

            <span class="contact-info-label">
                GET IN TOUCH
            </span>

            <h2>Multiple Ways to Connect</h2>

            <p>
                Choose the best way to reach us. We're always here for you.
            </p>

        </div>


        {{-- Main Grid --}}
        <div class="contact-info-grid">

            {{-- Four Contact Cards --}}
            <div class="contact-methods">

                {{-- Call Card --}}
                <a href="{{ $phoneNumber ? 'tel:' . $phoneNumber : '#' }}"
                   class="contact-method-card">

                    <div class="contact-method-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>

                    <div class="contact-method-content">
                        <h3>Call Us</h3>

                        <strong>
                            {{ $phone ?: 'Phone number not available' }}
                        </strong>

                        <p>Mon - Sat: 9:00 AM - 7:00 PM</p>

                        <span class="contact-card-action">
                            Call Now
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>

                </a>


                {{-- WhatsApp Card --}}
                <a href="{{ $whatsappUrl ?: '#' }}"
                   @if($whatsappUrl)
                       target="_blank"
                       rel="noopener noreferrer"
                   @endif
                   class="contact-method-card whatsapp">

                    <div class="contact-method-icon">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>

                    <div class="contact-method-content">
                        <h3>WhatsApp</h3>

                        <strong>
                            {{ $whatsapp ?: 'WhatsApp not available' }}
                        </strong>

                        <p>Chat with us on WhatsApp</p>

                        <span class="contact-card-action">
                            Chat Now
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>

                </a>


                {{-- Email Card --}}
                <a href="{{ $email ? 'mailto:' . $email : '#' }}"
                   class="contact-method-card">

                    <div class="contact-method-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <div class="contact-method-content">
                        <h3>Email Us</h3>

                        <strong>
                            {{ $email ?: 'Email not available' }}
                        </strong>

                        <p>We reply within 24 hours</p>

                        <span class="contact-card-action">
                            Send Email
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>

                </a>


                {{-- Working Hours Card --}}
                <a href="{{ $whatsappUrl ?: ($phoneNumber ? 'tel:' . $phoneNumber : ($email ? 'mailto:' . $email : '#')) }}"
                   @if($whatsappUrl)
                       target="_blank"
                       rel="noopener noreferrer"
                   @endif
                   class="contact-method-card">

                    <div class="contact-method-icon">
                        <i class="fa-solid fa-clock"></i>
                    </div>

                    <div class="contact-method-content">
                        <h3>Working Hours</h3>

                        <strong>Mon - Sat: 9:00 AM - 7:00 PM</strong>

                        <p>Sunday: Closed</p>

                        <span class="contact-card-action">
                            Contact Us
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>

                </a>

            </div>


            {{-- Office Information --}}
            @if($address)

                <a href="{{ $mapsUrl }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="office-card">

                    <div class="office-title">
                        <span class="office-title-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </span>

                        <h3>Visit Our Office</h3>
                    </div>

                    <strong>
                        {{ $company ?: 'Company name not available' }}
                    </strong>

                    <p>
                        {!! nl2br(e($address)) !!}
                    </p>

                    <span class="directions-btn">
                        Get Directions
                        <span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </span>

                </a>

            @else

                <div class="office-card">

                    <div class="office-title">
                        <span class="office-title-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </span>

                        <h3>Visit Our Office</h3>
                    </div>

                    <strong>
                        {{ $company ?: 'Company name not available' }}
                    </strong>

                    <p>Office address not available.</p>

                </div>

            @endif


            {{-- Google Map --}}
            <div class="contact-map">

                @if($address)

                    <iframe
                        src="https://www.google.com/maps?q={{ $mapQuery }}&z=15&output=embed"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                @else

                    <div class="map-placeholder">
                        <i class="fa-solid fa-map-location-dot"></i>
                        <p>Office location not available</p>
                    </div>

                @endif

            </div>

        </div>
    </div>

</section>


{{-- =====================================================
     PARTNER SECTION
===================================================== --}}

<section class="partner-section">

    <div class="partner-container">

        <div class="partner-content">

            <div class="partner-icon">
                <i class="fa-solid fa-handshake"></i>
            </div>

            <div class="partner-text">

                <h2>Are you a Property Owner?</h2>

                <p>
                    Partner with us and grow your business.
                    List properties or join our owner network today.
                </p>

            </div>

        </div>

        <a href="{{ route('broker.register') }}"
           class="partner-btn">

            Partner With Us

            <span>
                <i class="fa-solid fa-arrow-right"></i>
            </span>

        </a>

    </div>

</section>


{{-- =====================================================
     CONTACT FORM AJAX SUBMISSION
===================================================== --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    const contactForm = document.getElementById('contactForm');

    if (!contactForm) {
        return;
    }

    contactForm.addEventListener('submit', async function (event) {

        event.preventDefault();

        const submitButton = document.getElementById('contactSubmitBtn');

        const originalButtonText = submitButton
            ? submitButton.innerHTML
            : '';

        if (submitButton) {
            submitButton.disabled = true;
            submitButton.innerHTML =
                '<i class="fa-solid fa-spinner fa-spin"></i> Sending...';
        }

        try {

            const formData = new FormData(contactForm);

            const response = await fetch(contactForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            let result;

            try {
                result = await response.json();
            } catch (jsonError) {
                throw new Error('Invalid server response.');
            }

            if (!response.ok) {

                const firstError = result.errors
                    ? Object.values(result.errors).flat()[0]
                    : null;

                Swal.fire({
                    icon: 'error',
                    title: 'Submission Failed',
                    text: firstError || result.message ||
                        'Please check the form and try again.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#071b3d'
                });

                return;
            }

            if (result.success) {

                contactForm.reset();

                Swal.fire({
                    icon: 'success',
                    title: 'Message Sent!',
                    text: result.message ||
                        'Thank you for contacting us. We will get back to you shortly.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#071b3d',
                    allowOutsideClick: false,
                    allowEscapeKey: true
                });

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Submission Failed',
                    text: result.message ||
                        'Unable to send your message. Please try again.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#071b3d'
                });

            }

        } catch (error) {

            console.error('Contact form submission error:', error);

            Swal.fire({
                icon: 'error',
                title: 'Something Went Wrong',
                text: 'Unable to send your message. Please try again.',
                confirmButtonText: 'OK',
                confirmButtonColor: '#071b3d'
            });

        } finally {

            if (submitButton) {
                submitButton.disabled = false;
                submitButton.innerHTML = originalButtonText;
            }

        }

    });

});
</script>

@endsection
