
@extends('layouts.website')

@section('title', 'Enquiry Support | Rental Properties')

@section('content')

<style>
    .enquiry-page {
        color: #252943;
        background: #fff;
    }

    .enquiry-hero {
        padding: 65px 20px;
        text-align: center;
        background: linear-gradient(135deg, #f0f2ff, #fff);
    }

    .enquiry-label {
        color: #494bc5;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 2px;
    }

    .enquiry-hero h1 {
        margin: 14px 0;
        font-size: clamp(30px, 5vw, 44px);
        font-weight: 800;
    }

    .enquiry-hero p {
        max-width: 650px;
        margin: auto;
        color: #697087;
        line-height: 1.8;
    }

    .enquiry-container {
        width: min(1100px, 100%);
        margin: auto;
        padding: 50px 20px 65px;
    }

    .enquiry-grid {
        display: grid;
        grid-template-columns: .85fr 1.15fr;
        gap: 30px;
        align-items: start;
    }

    .enquiry-info {
        padding: 30px;
        color: #fff;
        background: #252d72;
        border-radius: 16px;
    }

    .enquiry-info h2 {
        margin-bottom: 12px;
        font-size: 25px;
        font-weight: 800;
    }

    .enquiry-info > p {
        color: #e1e4ff;
        font-size: 14px;
        line-height: 1.8;
    }

    .enquiry-info-item {
        display: flex;
        gap: 14px;
        margin-top: 27px;
        align-items: flex-start;
    }

    .enquiry-info-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 43px;
        height: 43px;
        color: #fff;
        background: rgba(255,255,255,.13);
        border-radius: 11px;
        font-size: 19px;
    }

    .enquiry-info-item h3 {
        margin: 2px 0 6px;
        font-size: 15px;
        font-weight: 750;
    }

    .enquiry-info-item p {
        margin: 0;
        color: #e1e4ff;
        font-size: 13px;
        line-height: 1.7;
        overflow-wrap: anywhere;
    }

    .enquiry-form-card {
        padding: 30px;
        border: 1px solid #e6e8f0;
        border-radius: 16px;
        box-shadow: 0 8px 28px rgba(30,40,90,.04);
    }

    .enquiry-form-card h2 {
        margin-bottom: 8px;
        font-size: 25px;
        font-weight: 800;
    }

    .enquiry-form-intro {
        margin-bottom: 25px;
        color: #697087;
        font-size: 14px;
        line-height: 1.8;
    }

    .enquiry-form {
        display: grid;
        gap: 18px;
    }

    .enquiry-form .form-row {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    .enquiry-form label {
        display: block;
        margin-bottom: 8px;
        color: #333951;
        font-size: 13px;
        font-weight: 700;
    }

    .enquiry-form input,
    .enquiry-form select,
    .enquiry-form textarea {
        width: 100%;
        padding: 12px 13px;
        border: 1px solid #dfe2ec;
        border-radius: 8px;
        outline: none;
        color: #252943;
        background: #fff;
        font: inherit;
        font-size: 14px;
        box-sizing: border-box;
        transition: border-color .2s, box-shadow .2s;
    }

    .enquiry-form input:focus,
    .enquiry-form select:focus,
    .enquiry-form textarea:focus {
        border-color: #494bc5;
        box-shadow: 0 0 0 3px rgba(73,75,197,.10);
    }

    .enquiry-form textarea {
        min-height: 125px;
        resize: vertical;
    }

    .enquiry-submit {
        padding: 14px 20px;
        border: none;
        border-radius: 9px;
        color: #fff;
        background: #494bc5;
        cursor: pointer;
        font-size: 14px;
        font-weight: 750;
        transition: .2s;
    }

    .enquiry-submit:hover {
        background: #34369e;
    }

    .enquiry-note {
        margin-top: 18px;
        color: #7a8195;
        font-size: 12px;
        line-height: 1.7;
    }

    @media (max-width: 768px) {
        .enquiry-hero {
            padding: 45px 18px;
        }

        .enquiry-container {
            padding: 30px 16px 45px;
        }

        .enquiry-grid {
            grid-template-columns: 1fr;
        }

        .enquiry-info,
        .enquiry-form-card {
            padding: 23px;
        }
    }

    @media (max-width: 480px) {
        .enquiry-form .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="enquiry-page">

    {{-- Hero Section --}}
    <section class="enquiry-hero">
        <div class="enquiry-label">WE'RE HERE TO HELP</div>

        <h1>Enquiry Support</h1>

        <p>
            Have a question about a property or need help with
            your rental journey? Send us your enquiry and tell
            us how we can assist you.
        </p>
    </section>

    <section class="enquiry-container">
        <div class="enquiry-grid">

            {{-- Contact Information --}}
            <aside class="enquiry-info">
                <h2>Get in Touch</h2>

                <p>
                    Share your questions with our team.
                    We will review your enquiry and follow up
                    using the contact information you provide.
                </p>

                <div class="enquiry-info-item">
                    <div class="enquiry-info-icon">?</div>
                    <div>
                        <h3>Property Questions</h3>
                        <p>
                            Ask about listings, property details
                            and the rental process.
                        </p>
                    </div>
                </div>

                <div class="enquiry-info-item">
                    <div class="enquiry-info-icon">⌂</div>
                    <div>
                        <h3>Rental Assistance</h3>
                        <p>
                            Get guidance about enquiries,
                            property visits and rental requirements.
                        </p>
                    </div>
                </div>

                <div class="enquiry-info-item">
                    <div class="enquiry-info-icon">✉</div>
                    <div>
                        <h3>Send an Enquiry</h3>
                        <p>
                            Complete the form and include enough
                            detail to help us understand your request.
                        </p>
                    </div>
                </div>
            </aside>

            {{-- Enquiry Form UI --}}
            <div class="enquiry-form-card">
                <h2>Send Us an Enquiry</h2>

                <p class="enquiry-form-intro">
                    Fill in the details below. Fields marked
                    with * are required.
                </p>

                <form class="enquiry-form" id="supportEnquiryForm">

                    <div class="form-row">
                        <div>
                            <label for="supportName">Full Name *</label>
                            <input
                                type="text"
                                id="supportName"
                                name="name"
                                placeholder="Enter your full name"
                                autocomplete="name"
                                required
                            >
                        </div>

                        <div>
                            <label for="supportEmail">Email Address *</label>
                            <input
                                type="email"
                                id="supportEmail"
                                name="email"
                                placeholder="you@example.com"
                                autocomplete="email"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-row">
                        <div>
                            <label for="supportPhone">Phone Number</label>
                            <input
                                type="tel"
                                id="supportPhone"
                                name="phone"
                                placeholder="Enter phone number"
                                autocomplete="tel"
                            >
                        </div>

                        <div>
                            <label for="supportSubject">Enquiry Type *</label>
                            <select
                                id="supportSubject"
                                name="subject"
                                required
                            >
                                <option value="">Select a topic</option>
                                <option value="Property Enquiry">
                                    Property Enquiry
                                </option>
                                <option value="Rental Requirements">
                                    Rental Requirements
                                </option>
                                <option value="Schedule Visit">
                                    Schedule a Visit
                                </option>
                                <option value="Payment Question">
                                    Payment Question
                                </option>
                                <option value="Technical Support">
                                    Technical Support
                                </option>
                                <option value="Other">
                                    Other
                                </option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="supportMessage">Your Message *</label>
                        <textarea
                            id="supportMessage"
                            name="message"
                            placeholder="Describe how we can help..."
                            required
                        ></textarea>
                    </div>

                    <button type="submit" class="enquiry-submit">
                        Submit Enquiry &rarr;
                    </button>

                    <p class="enquiry-note">
                        Please avoid including passwords, OTPs,
                        banking PINs or other sensitive information.
                    </p>

                    <p id="supportFormMessage"
                       role="status"
                       aria-live="polite"
                       style="display:none"></p>

                </form>
            </div>

        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('supportEnquiryForm');
    const message = document.getElementById('supportFormMessage');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        message.style.display = 'block';
        message.style.color = '#9a5b12';
        message.textContent =
            'This is the UI preview. Form submission will be enabled when the backend is connected.';
    });
});
</script>

@endsection
