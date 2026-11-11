<?php $page = 'signin-2'; ?>
@extends('layout.brokermainlayout')
@section('content')
    <style>
        .login-content {
            position: relative;
        }
        .login-content>.signinform {
            position: absolute;
            top: 18px;
            left: 25px;
            z-index: 10;
            margin: 0;
        }
        .login-content>.signinform h4 {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            margin: 0;
            font-size: 14px;
            font-weight: 400;
            color: #72798b;
            line-height: 1.5;
        }
        .login-content>.signinform a {
            display: block;
            color: #00068a;
            font-weight: 600;
            text-decoration: none;
            margin: 0;
        }
        .login-content>.signinform a:hover {
            color: #254dff;
            text-decoration: underline;
        }
        @media (max-width: 576px) {
            .login-content>.signinform {
                top: 12px;
                left: 15px;
            }
            .login-content>.signinform h4 {
                font-size: 12px;
            }
        }
    </style>
    <style>
        .location-suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 1050;
            display: none;
            max-height: 220px;
            overflow-y: auto;
            background: #fff;
            border: 1px solid #e5eaf1;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(7, 27, 61, 0.12);
        }
        .location-suggestions .suggestion-item {
            display: block;
            width: 100%;
            padding: 10px 14px;
            border: 0;
            background: #fff;
            color: #071b3d;
            text-align: left;
            cursor: pointer;
        }
        .location-suggestions .suggestion-item:hover {
            background: #f3f6fb;
        }
        #mobile.is-invalid {
            border-color: #dc3545 !important;
            background-image: none;
        }
        #mobile.is-valid {
            border-color: #198754 !important;
            background-image: none;
        }
        #mobileError {
            font-size: 12px;
            font-weight: 500;
        }
        #mobileSuccess {
            font-size: 12px;
            font-weight: 500;
        }
    </style>
<style>
/* Registration Terms Checkbox */
.registration-terms-group {
    margin: 15px 0;
}
.registration-terms-label {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 13px;
    line-height: 1.6;
    cursor: pointer;
}
.registration-terms-label input {
    margin-top: 5px;
    flex-shrink: 0;
}
.registration-terms-label a {
    color: #00068a;
    font-weight: 600;
    text-decoration: underline;
}
/* Registration Terms Modal */
.registration-terms-modal {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 100010;
    align-items: center;
    justify-content: center;
    padding: 20px;
}
.registration-terms-modal.active {
    display: flex;
}
.registration-terms-overlay {
    position: absolute;
    inset: 0;
    background: rgba(8, 13, 40, 0.78);
    backdrop-filter: blur(4px);
}
.registration-terms-content {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 700px;
    max-height: 85vh;
    max-height: 85dvh;
    padding: 28px;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 25px 70px rgba(0, 0, 0, 0.25);
}
.registration-terms-content h2 {
    margin: 0 40px 15px 0;
    color: #202638;
}
.registration-terms-body {
    overflow-y: auto;
    min-height: 0;
    line-height: 1.7;
    color: #444;
    overscroll-behavior: contain;
}
.registration-terms-body h3,
.registration-terms-body h4 {
    color: #202638;
    margin-top: 18px;
}
.registration-terms-close {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 36px;
    height: 36px;
    border: 0;
    border-radius: 50%;
    cursor: pointer;
    font-size: 24px;
    background: #f2f4fb;
}
@media (max-width: 576px) {
    .registration-terms-content {
        padding: 22px 18px;
    }
}
</style>
    <div class="account-content">
        <div class="row login-wrapper m-0">
            {{-- LEFT SIDE - REGISTRATION FORM --}}
            <div class="col-lg-6 p-0">
                <div class="login-content">
                    {{-- Login link at top-left --}}
                    <div class="signinform mb-3">
                        <h4>
                            Already have an account?
                            <a href="{{ route('broker.login') }}" class="hover-a">
                                Sign In
                            </a>
                        </h4>
                    </div>
                    <form method="POST" action="{{ route('broker.register.submit') }}">
                        @csrf
                        {{-- Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- Success --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="login-userset">
                            {{-- Logo --}}
                            <div class="final-logo logo-normal mb-3">
                                <a href="#" class="logo logo-normal d-flex align-items-center justify-content-center w-100">
                                    <img src="{{ asset('website') }}/images/keys10.png" alt="Logo"
                                        style="width: 200px; max-width: 100%; height: auto;">
                                </a>
                            </div>
                            {{-- Heading --}}
                            <div class="login-userheading">
                                <h3>Owner Registration</h3>
                                <h3>
                                    {{ $settings->site_name ?? '' }}
                                </h3>
                                <p class="text-muted">
                                    Create your owner account
                                </p>
                            </div>
                            {{-- ========================================= --}}
                            {{-- PERSONAL DETAILS --}}
                            {{-- ========================================= --}}
                            <div class="mb-3">
                                <h5 class="mb-3">
                                    Personal Details
                                </h5>
                            </div>
                            {{-- Full Name --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Full Name
                                </label>
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control border-end-0"
                                        value="{{ old('name') }}" placeholder="Enter your full name" required>
                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-user"></i>
                                    </span>
                                </div>
                            </div>
                            {{-- Email --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Email Address
                                </label>
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control border-end-0"
                                        value="{{ old('email') }}" placeholder="Enter email address" required>
                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                </div>
                            </div>
                            {{-- Mobile --}}
                            {{-- Mobile Number --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Mobile Number <span class="text-danger">\*</span>
                                </label>
                                <div class="input-group">
                                    <input type="tel" name="mobile" id="mobile" class="form-control border-end-0"
                                        value="{{ old('mobile') }}" placeholder="Enter 10-digit mobile number"
                                        inputmode="numeric" maxlength="10" pattern="[6-9][0-9]{9}" autocomplete="tel"
                                        required title="Please enter a valid 10-digit mobile number Mandatory field">
                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                                <small id="mobileError" class="text-danger mt-1 d-block">
                                    @error('mobile')
                                        {{ $message }}
                                    @enderror
                                </small>
                                <small id="mobileSuccess" class="text-success mt-1 d-none">
                                    Valid mobile number
                                </small>
                            </div>
                            {{-- Broker Type --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Owner Type
                                </label>
                                <div class="input-group">
                                    <select name="broker_type" class="form-select" required>
                                        <option value="">
                                            Select Owner Type
                                        </option>
                                        <option value="Individual" {{ old('broker_type') == 'Individual' ? 'selected' : '' }}>
                                            Individual
                                        </option>
                                        <option value="Agency" {{ old('broker_type') == 'Agency' ? 'selected' : '' }}>
                                            Company
                                        </option>
                                    </select>
                                </div>
                            </div>
                            {{-- ========================================= --}}
                            {{-- BUSINESS DETAILS --}}
                            {{-- ========================================= --}}
                            <div class="mb-3 mt-4">
                                <h5 class="mb-3">
                                    Business Details
                                </h5>
                            </div>
                            {{-- Agency --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Agency / Company Name
                                </label>
                                <div class="input-group">
                                    <input type="text" name="agency_name" class="form-control border-end-0"
                                        value="{{ old('agency_name') }}" placeholder="Enter agency/company name">
                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-building"></i>
                                    </span>
                                </div>
                            </div>
                            {{-- License --}}
                            {{-- Aadhaar Card --}}
                            <div class="mb-3">
                                <label class="form-label">Aadhaar Card</label>
                                <div class="input-group">
                                    <input type="text" name="aadhaar_number" class="form-control border-end-0"
                                        value="{{ old('aadhaar_number') }}" placeholder="Enter Aadhaar number"
                                        inputmode="numeric" maxlength="12" pattern="[0-9]{12}"
                                        title="Please enter a valid 12-digit Aadhaar number" autocomplete="off">
                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-id-badge"></i>
                                    </span>
                                </div>
                            </div>
                            {{-- ========================================= --}}
                            {{-- ADDRESS DETAILS --}}
                            {{-- ========================================= --}}
                            {{-- Address --}}
                            <div class="mb-3 position-relative">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ old('address') }}" placeholder="Search your complete address"
                                    autocomplete="off" required>
                            </div>
                            {{-- City --}}
                            {{-- City --}}
                            {{-- City / Bengaluru Area --}}
                            <div class="mb-3 position-relative">
                                <label class="form-label">City / Area</label>
                                <div class="input-group">
                                    <input type="text" name="city" id="city" class="form-control border-end-0"
                                        value="{{ old('city') }}" placeholder="Search Bengaluru area" autocomplete="off"
                                        required>
                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-map-pin"></i>
                                    </span>
                                </div>
                                <div id="citySuggestions" class="location-suggestions"></div>
                            </div>
                            {{-- State --}}
                            <div class="mb-3">
                                <label class="form-label">State</label>
                                <div class="input-group">
                                    <input type="text" name="state" id="state" class="form-control border-end-0"
                                        value="{{ old('state', 'Karnataka') }}" readonly required>
                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-map"></i>
                                    </span>
                                </div>
                            </div>
                            {{-- Pincode --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Pincode
                                </label>
                                <div class="input-group">
                                    <input type="text" name="pincode" class="form-control border-end-0"
                                        value="{{ old('pincode') }}" placeholder="Enter pincode" required>
                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-map-pin"></i>
                                    </span>
                                </div>
                            </div>
                            {{-- ========================================= --}}
                            {{-- LOGIN DETAILS --}}
                            {{-- ========================================= --}}
                            <div class="mb-3 mt-4">
                                <h5 class="mb-3">
                                    Login Details
                                </h5>
                            </div>
                            {{-- Password --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Password
                                </label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input form-control"
                                        placeholder="Enter password" minlength="6" required>
                                    <span class="ti toggle-password ti-eye-off text-gray-9"></span>
                                </div>
                            </div>
                            {{-- Confirm Password --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Confirm Password
                                </label>
                                <div class="pass-group">
                                    <input type="password" name="password_confirmation" class="pass-input form-control"
                                        placeholder="Confirm password" minlength="6" required>
                                    <span class="ti toggle-password ti-eye-off text-gray-9"></span>
                                </div>
                            </div>
                            {{-- Information Confirmation --}}
                            <div class="form-login authentication-check mb-3">
                                <div class="custom-control custom-checkbox">
                                    <label class="checkboxs ps-4 mb-0">
                                        <input type="checkbox" name="terms" value="1" required>
                                        <span class="checkmarks"></span>
                                        I confirm that the information provided is correct.
                                    </label>
                                </div>
                            </div>
                            {{-- Terms & Conditions Acceptance --}}
                            <div class="registration-terms-group mb-4">
                                <label class="registration-terms-label">
                                    <input type="checkbox" name="terms_accepted" value="1" id="registration_terms_accepted"
                                        required @checked(old('terms_accepted'))>
                                    <span>
                                        I have read and agree to the
                                        <a href="#" onclick="event.preventDefault(); openRegistrationTerms();">
                                            Terms &amp; Conditions
                                        </a>.
                                    </span>
                                </label>
                            </div>
                            {{-- Submit --}}
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">
                                    Submit Registration
                                </button>
                            </div>
                            {{-- Login --}}
                            <!-- <div class="signinform">\
\*                                                                            <h4>\
*\*                                                                                Already have an account?\
*\*                                                                                <a\
*\*                                                                                    href="{{ route('broker.login') }}"\
*\*                                                                                    class="hover-a"\
*\*                                                                                >\
*\*                                                                                    Sign In\
*\*                                                                                </a>\
*\*                                                                            </h4>\
*\*                                                                        </div> -->
                        </div>
                    </form>
{{-- Registration Terms & Conditions Popup --}}
<div class="registration-terms-modal"
     id="registrationTermsModal"
     aria-hidden="true">
    <div class="registration-terms-overlay"
         onclick="closeRegistrationTerms()"></div>
    <div class="registration-terms-content"
         role="dialog"
         aria-modal="true"
         aria-labelledby="registrationTermsTitle"
         tabindex="-1">
        <button type="button"
                class="registration-terms-close"
                onclick="closeRegistrationTerms()"
                aria-label="Close Terms and Conditions">
            &times;
        </button>
        <h2 id="registrationTermsTitle">Terms &amp; Conditions</h2>
        <div class="registration-terms-body">
            {{-- Insert the approved Terms & Conditions content here. --}}
            <h3>KEYSPLEASEE VENTURES</h3>
            <h4>TERMS AND CONDITIONS OF USE</h4>
                <h4>1. Acceptance of Terms</h4>
                <p>These Terms and Conditions (“Terms”) govern your access to and use of the KeysPleasee Ventures website,
                    platform, services and related communication channels (“Platform”).</p>
                <p>By accessing the Platform, creating an account, listing a property, browsing listings, requesting a
                    viewing, unlocking property details or contacting another user, you acknowledge that you have read and
                    agreed to these Terms.</p>
                <p>If you do not agree with these Terms, you must discontinue using the Platform.</p>
                <h4>2. Nature and Scope of Services</h4>
                <p>KeysPleasee Ventures operates as a property discovery, viewing and connection platform intended to
                    facilitate direct communication between property owners, landlords, tenants, buyers, sellers and other
                    prospective property seekers.</p>
                <p>The Platform may enable users to:</p>
                <ul>
                    <li>Discover properties available for rent, lease or sale.</li>
                    <li>View property information, photographs, videos and other listing details.</li>
                    <li>Request property viewings.</li>
                    <li>Connect and communicate with property owners, landlords, tenants, buyers, sellers or their
                        authorised representatives.</li>
                    <li>Access property information or contact details through free or paid services, where applicable.</li>
                </ul>
                <p>KeysPleasee Ventures is a technology platform and is not a party to any property transaction solely by
                    virtue of providing these services. Unless expressly agreed in a separate written agreement, the
                    Platform does not act as the owner, landlord, tenant, buyer, seller, legal representative, escrow agent,
                    payment intermediary or guarantor of any transaction.</p>
                <p>Users are responsible for independently evaluating and completing their transactions.</p>
                <h4>3. No Guarantee of Property or User Authenticity</h4>
                <p>Property listings and related information may be submitted by users or third parties.</p>
                <p>KeysPleasee Ventures does not guarantee that:</p>
                <ul>
                    <li>A person listing a property is its lawful owner or has valid authority to offer it.</li>
                    <li>A property exists as described or is available at the stated price.</li>
                    <li>Photographs, videos, floor plans, measurements, addresses, amenities or other property details are
                        accurate or current.</li>
                    <li>A property has valid title, approvals, occupancy certificates, completion certificates, sanctioned
                        plans or other legal documentation.</li>
                    <li>A property is free from encumbrances, litigation, disputes, defects or third-party claims.</li>
                    <li>A user is genuine, financially capable, trustworthy or acting in good faith.</li>
                </ul>
                <p>Any verification, screening, moderation or document review undertaken by KeysPleasee Ventures is limited
                    to the stated scope of that process and does not constitute a guarantee of authenticity, ownership,
                    legal compliance or transaction safety.</p>
                <p>Users must independently verify all relevant information before making payments, signing agreements or
                    proceeding with a transaction.</p>
                <h4>4. No Liability for Third-Party Fraud, Scams or Misconduct</h4>
                <p>KeysPleasee Ventures is not responsible for fraudulent, dishonest, misleading, negligent, unlawful or
                    unauthorised acts or omissions committed by property owners, landlords, tenants, buyers, sellers,
                    agents, representatives or other third parties, to the extent permitted by applicable law.</p>
                <p>Examples include:</p>
                <ul>
                    <li>Fake property listings or impersonation of property owners.</li>
                    <li>False representations regarding ownership, authority, price or availability.</li>
                    <li>Requests for advance payments to reserve or secure a property.</li>
                    <li>Fake booking confirmations, forged documents or false identity documents.</li>
                    <li>Rental scams, sale scams, deposit fraud or payment diversion.</li>
                    <li>Misuse of contact information or direct communications.</li>
                    <li>Failure to refund a deposit, advance, token amount, security deposit or other payment.</li>
                    <li>Breach of a rental agreement, sale agreement, lease, promise or other arrangement.</li>
                    <li>Disputes relating to possession, title, maintenance, refunds, cancellation, tenancy or completion of
                        a transaction.</li>
                </ul>
                <p>Any such conduct is the responsibility of the person or entity that committed it, subject to applicable
                    law.</p>
                <p>KeysPleasee Ventures does not guarantee that users will not encounter fraud, scams, impersonation or
                    other misconduct through the Platform.</p>
                <h4>5. No Responsibility for Deposits, Advances or Other Payments</h4>
                <p>KeysPleasee Ventures does not accept responsibility for money paid directly between users or to third
                    parties in connection with a property transaction.</p>
                <p>This includes, without limitation:</p>
                <ul>
                    <li>Rental security deposits.</li>
                    <li>Booking amounts and token advances.</li>
                    <li>Earnest money deposits.</li>
                    <li>Sale consideration.</li>
                    <li>Advance rent.</li>
                    <li>Brokerage or service fees payable to third parties.</li>
                    <li>Refunds, cancellation charges or forfeited amounts.</li>
                    <li>Legal fees, documentation charges, maintenance payments and other transaction-related expenses.</li>
                </ul>
                <p>Users are strongly advised not to transfer money until they have independently verified the identity and
                    authority of the recipient, inspected the property where appropriate, reviewed the relevant documents
                    and understood the applicable contractual terms.</p>
                <p>Payments should be made through traceable channels and against appropriate written documentation.</p>
                <p>Where a payment is made directly to an owner, tenant, buyer, seller, agent or any other third party,
                    KeysPleasee Ventures does not hold, control, safeguard, insure or guarantee that money and is not
                    responsible for recovering it.</p>
                <p>KeysPleasee Ventures is not obligated to refund, reimburse or compensate users for losses arising from
                    such third-party payments, except where liability cannot lawfully be excluded.</p>
                <h4>6. Independent Verification and Due Diligence</h4>
                <p>Every user is responsible for conducting their own due diligence before entering into any
                    property-related arrangement.</p>
                <p>Depending on the transaction, this may include verifying:</p>
                <ul>
                    <li>Government-issued identity documents and the recipient’s bank account details.</li>
                    <li>Ownership documents, title records and authority to sell or rent.</li>
                    <li>Encumbrances, litigation, land-use restrictions and property approvals.</li>
                    <li>Relevant RERA registration and disclosures, where applicable.</li>
                    <li>Sanctioned plans, occupancy certificates and completion certificates, where applicable.</li>
                    <li>The property’s physical condition, measurements, amenities and access.</li>
                    <li>The terms of any rental, lease, sale or purchase agreement.</li>
                </ul>
                <p>Users should obtain independent legal, financial and technical advice wherever appropriate.</p>
                <p>Any information displayed on the Platform is not a substitute for professional advice or independent
                    verification.</p>
                <h4>7. Direct Transactions Between Users</h4>
                <p>Any negotiations, viewings, offers, agreements, payments, refunds, handovers or other dealings between
                    users are undertaken at their own discretion and risk.</p>
                <p>KeysPleasee Ventures is not responsible for:</p>
                <ul>
                    <li>The conduct or representations of either party.</li>
                    <li>The terms negotiated or agreed between the parties.</li>
                    <li>The validity, enforceability or performance of agreements between users.</li>
                    <li>Disputes concerning deposits, refunds, possession, title, rent, sale consideration or contractual
                        obligations.</li>
                    <li>Losses arising from a party’s breach, default, misrepresentation or failure to perform.</li>
                </ul>
                <p>Users are encouraged to execute appropriate written agreements and retain transaction records.</p>
                <p>Unless expressly agreed in writing, KeysPleasee Ventures does not negotiate or guarantee the commercial
                    or legal terms of a transaction.</p>
                <h4>8. Platform Fees and Paid Features</h4>
                <p>KeysPleasee Ventures may provide free or paid services, including access to property details, contact
                    information, listing packages, subscriptions or other platform features.</p>
                <p>Unless expressly stated otherwise at the time of purchase, any fee charged by KeysPleasee Ventures is for
                    the relevant platform service and not a guarantee that:</p>
                <ul>
                    <li>A property will be available.</li>
                    <li>A viewing or meeting will take place.</li>
                    <li>A user will respond to a communication.</li>
                    <li>A transaction will be concluded.</li>
                    <li>A property will be suitable for the user’s requirements.</li>
                    <li>A user will receive a financial return or other commercial benefit.</li>
                </ul>
                <p>Refunds, cancellations and subscription terms will be governed by the applicable purchase terms and
                    refund policy, subject to applicable law.</p>
                <p>Where a user purchases access to listings or contact details, the purchase does not constitute a
                    guarantee of the accuracy of all third-party information or of a successful transaction.</p>
                <h4>9. User Representations and Responsibilities</h4>
                <p>By using the Platform, you represent and agree that:</p>
                <ul>
                    <li>Information and documents you submit are accurate to the best of your knowledge.</li>
                    <li>You have the authority to publish any property listing you submit.</li>
                    <li>You will not impersonate another person or misrepresent your identity, ownership or authority.</li>
                    <li>You will not publish fraudulent, misleading, unlawful or unauthorised listings.</li>
                    <li>You will not use the Platform to collect money through deceptive practices.</li>
                    <li>You will comply with applicable laws and contractual obligations.</li>
                    <li>You will respect the privacy and rights of other users.</li>
                    <li>You will not misuse, scrape, copy, resell or exploit Platform information except as permitted by law
                        and the Platform’s policies.</li>
                </ul>
                <p>You remain responsible for your conduct and communications with other users.</p>
                <h4>10. Reporting Fraud and Suspicious Activity</h4>
                <p>Users who suspect fraud, impersonation, false listings or suspicious payment requests should promptly
                    notify KeysPleasee Ventures through its designated reporting or customer support channel.</p>
                <p>Where reasonably appropriate and legally permissible, KeysPleasee Ventures may investigate reports,
                    request further information, restrict access to listings, suspend accounts, remove content or cooperate
                    with competent authorities.</p>
                <p>Reporting a user does not guarantee recovery of funds, resolution of a dispute or prevention of all
                    future misconduct.</p>
                <p>Users who believe they have been defrauded should also promptly contact their bank or payment provider
                    and the appropriate law enforcement or cybercrime authorities.</p>
                <h4>11. Suspension and Termination</h4>
                <p>KeysPleasee Ventures may suspend, restrict or terminate access to the Platform where it reasonably
                    believes that a user has violated these Terms, submitted misleading information, engaged in suspected
                    fraud, misused the Platform or created a legal, security or operational risk.</p>
                <p>Where appropriate, the Platform may remove listings or restrict contact between users.</p>
                <p>These measures do not guarantee the prevention of fraud and do not relieve users of their own legal
                    responsibilities.</p>
                <h4>12. Intellectual Property</h4>
                <p>The Platform’s software, branding, design, logos, original text and other proprietary materials are owned
                    by or licensed to KeysPleasee Ventures, unless otherwise stated.</p>
                <p>Users retain responsibility for the content they submit and must have the necessary rights or permissions
                    to upload and publish it.</p>
                <p>By submitting content, users grant KeysPleasee Ventures a non-exclusive permission to host, display,
                    reproduce and use that content as reasonably necessary to operate, promote and improve the Platform,
                    subject to applicable law and the Platform’s privacy policy.</p>
                <h4>13. Privacy and Personal Information</h4>
                <p>KeysPleasee Ventures may collect and process personal information necessary to operate the Platform,
                    facilitate connections, provide paid services, address complaints, maintain security and comply</p>
                <p><strong>Note:</strong> The text provided for Section 13 ends here. Add the remaining privacy terms and
                    any subsequent sections before publishing the final Terms.</p>
            {{-- Add all approved Terms & Conditions sections here. --}}
        </div>
        <button type="button"
                class="btn btn-login mt-3"
                onclick="closeRegistrationTerms()">
            Close
        </button>
    </div>
</div>
                </div>
            </div>
            {{-- ========================================= --}}
            {{-- RIGHT SIDE IMAGE --}}
            {{-- ========================================= --}}
            <div class="col-lg-6 p-0">
                <div class="login-img">
                    <img src="{{ asset('website') }}/images/broker1.png" alt="Broker Registration">
                </div>
            </div>
        </div>
    </div>
    <script>
        let localityAutocomplete;
        function initLocalityAutocomplete() {
            const input = document.getElementById('city');
            const dropdown = document.getElementById('citySuggestions');
            const stateInput = document.getElementById('state');
            if (!input || !window.google?.maps?.places) {
                console.error('Google Maps Places API is not loaded.');
                return;
            }
            if (stateInput) {
                stateInput.value = 'Karnataka';
                stateInput.readOnly = true;
            }
            const bengaluruBounds = new google.maps.LatLngBounds(
                { lat: 12.7343, lng: 77.3790 },
                { lat: 13.1737, lng: 77.8827 }
            );
            localityAutocomplete = new google.maps.places.Autocomplete(input, {
                bounds: bengaluruBounds,
                strictBounds: true,
                componentRestrictions: { country: 'in' },
                fields: ['formatted_address', 'name', 'geometry', 'address_components'],
                types: ['geocode']
            });
            localityAutocomplete.addListener('place_changed', function () {
                const place = localityAutocomplete.getPlace();
                if (!place.geometry?.location) {
                    input.value = '';
                    alert('Please select a suggested location within Bengaluru.');
                    return;
                }
                const location = place.geometry.location;
                if (!bengaluruBounds.contains(location)) {
                    input.value = '';
                    alert('Please select a location within Bengaluru.');
                    return;
                }
                \// Ensure the selected address belongs to Karnataka.\
                const components = place.address_components || [];
                const isKarnataka = components.some(component =>
                    component.types.includes('administrative_area_level_1') &&
                    component.long_name === 'Karnataka'
                );
                if (!isKarnataka) {
                    input.value = '';
                    alert('Please select a location in Karnataka.');
                    return;
                }
                input.value = place.name || place.formatted_address || '';
                if (dropdown) {
                    dropdown.style.display = 'none';
                }
                input.dispatchEvent(new Event('change', { bubbles: true }));
            });
            input.addEventListener('input', function () {
                if (dropdown) {
                    dropdown.style.display = 'none';
                }
            });
            \// Keep focus and selection behavior consistent with the existing form.\
            input.addEventListener('focus', function () {
                \// Google displays its own autocomplete suggestions.\
            });
            \// Address Autocomplete\
            const addressInput = document.getElementById('address');
            if (addressInput) {
                const addressAutocomplete = new google.maps.places.Autocomplete(
                    addressInput,
                    {
                        bounds: bengaluruBounds,
                        strictBounds: true,
                        componentRestrictions: { country: 'in' },
                        fields: [
                            'formatted_address',
                            'name',
                            'geometry',
                            'address_components'
                        ],
                        types: ['geocode']
                    }
                );
                addressAutocomplete.addListener('place_changed', function () {
                    const place = addressAutocomplete.getPlace();
                    if (!place.geometry?.location ||
                        !bengaluruBounds.contains(place.geometry.location)) {
                        addressInput.value = '';
                        alert('Please select an address within Bengaluru.');
                        return;
                    }
                    const components = place.address_components || [];
                    const isKarnataka = components.some(component =>
                        component.types.includes('administrative_area_level_1') &&
                        component.long_name === 'Karnataka'
                    );
                    if (!isKarnataka) {
                        addressInput.value = '';
                        alert('Please select an address in Karnataka.');
                        return;
                    }
                    addressInput.value = place.formatted_address || place.name || '';
                    addressInput.dispatchEvent(new Event('change', { bubbles: true }));
                });
            }
        }
    </script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbHPicLYkLGF_-HUU8TTzdU0RQKg8bNTM&loading=async&libraries=places&callback=initLocalityAutocomplete">
        </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileInput = document.getElementById('mobile');
            const mobileError = document.getElementById('mobileError');
            const mobileSuccess = document.getElementById('mobileSuccess');
            if (!mobileInput) return;
            const form = mobileInput.closest('form');
            function validateMobile() {
                let mobile = mobileInput.value.replace(/\D/g, '').slice(0, 10);
                mobileInput.value = mobile;
                mobileInput.classList.remove('is-valid', 'is-invalid');
                mobileSuccess.classList.add('d-none');
                if (mobile.length === 0) {
                    mobileError.textContent = 'Mobile number is mandatory.';
                    mobileInput.classList.add('is-invalid');
                    return false;
                }
                if (mobile.length !== 10) {
                    mobileError.textContent = 'Please enter exactly 10 digits.';
                    mobileInput.classList.add('is-invalid');
                    return false;
                }
                if (!/^[6-9][0-9]{9}$/.test(mobile)) {
                    mobileError.textContent = 'Please enter a valid Indian mobile number.';
                    mobileInput.classList.add('is-invalid');
                    return false;
                }
                mobileError.textContent = '';
                mobileInput.classList.add('is-valid');
                mobileSuccess.classList.remove('d-none');
                return true;
            }
            mobileInput.addEventListener('input', function () {
                validateMobile();
            });
            mobileInput.addEventListener('blur', function () {
                validateMobile();
            });
            form.addEventListener('submit', function (e) {
                if (!validateMobile()) {
                    e.preventDefault();
                    mobileInput.focus();
                }
            });
        });
    </script>
<script>
window.openRegistrationTerms = function () {
    const modal = document.getElementById('registrationTermsModal');
    if (!modal) return;
    modal.classList.add('active');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    modal.querySelector('.registration-terms-content')?.focus();
};
window.closeRegistrationTerms = function () {
    const modal = document.getElementById('registrationTermsModal');
    if (!modal) return;
    modal.classList.remove('active');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
};
document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        window.closeRegistrationTerms();
    }
});
</script>
@endsection
