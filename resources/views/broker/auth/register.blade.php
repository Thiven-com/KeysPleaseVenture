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

                                    <img src="{{ asset('website') }}/images/venlogo.png" alt="Logo"
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
                            <div class="mb-3">

                                <label class="form-label">
                                    Mobile Number
                                </label>

                                <div class="input-group">

                                    <input type="text" name="mobile" class="form-control border-end-0"
                                        value="{{ old('mobile') }}" placeholder="Enter mobile number" required>

                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-phone"></i>
                                    </span>

                                </div>

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
                                            Agency
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
                            <div class="mb-3">

                                <label class="form-label">
                                    License Number
                                </label>

                                <div class="input-group">

                                    <input type="text" name="license_number" class="form-control border-end-0"
                                        value="{{ old('license_number') }}" placeholder="Enter license number">

                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-certificate"></i>
                                    </span>

                                </div>

                            </div>


                            {{-- ========================================= --}}
                            {{-- ADDRESS DETAILS --}}
                            {{-- ========================================= --}}

                            <div class="mb-3 mt-4">

                                <h5 class="mb-3">
                                    Address Details
                                </h5>

                            </div>


                            {{-- Address --}}
                            <div class="mb-3">

                                <label class="form-label">
                                    Address
                                </label>

                                <textarea name="address" class="form-control" rows="1"
                                    placeholder="Enter your complete address" required>{{ old('address') }}</textarea>

                            </div>


                            {{-- City --}}
                            {{-- City --}}
                            <div class="mb-3 position-relative">
                                <label class="form-label">City</label>

                                <div class="input-group">
                                    <input type="text" name="city" id="city" class="form-control border-end-0"
                                        value="{{ old('city') }}" placeholder="Enter or search city" autocomplete="off"
                                        required>

                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-map-pin"></i>
                                    </span>
                                </div>

                                <div id="citySuggestions" class="location-suggestions"></div>
                            </div>

                            {{-- State --}}
                            <div class="mb-3 position-relative">
                                <label class="form-label">State</label>

                                <div class="input-group">
                                    <input type="text" name="state" id="state" class="form-control border-end-0"
                                        value="{{ old('state', 'Karnataka') }}" placeholder="Enter or search state"
                                        autocomplete="off" required>

                                    <span class="input-group-text border-start-0">
                                        <i class="ti ti-map"></i>
                                    </span>
                                </div>

                                <div id="stateSuggestions" class="location-suggestions"></div>
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


                            {{-- Terms --}}
                            <div class="form-login authentication-check mb-4">

                                <div class="custom-control custom-checkbox">

                                    <label class="checkboxs ps-4 mb-0">

                                        <input type="checkbox" name="terms" value="1" required>

                                        <span class="checkmarks"></span>

                                        I confirm that the information provided is correct.

                                    </label>

                                </div>

                            </div>


                            {{-- Submit --}}
                            <div class="form-login">

                                <button type="submit" class="btn btn-login">
                                    Submit Registration
                                </button>

                            </div>


                            {{-- Login --}}
                            <!-- <div class="signinform">

                                    <h4>

                                        Already have an account?

                                        <a
                                            href="{{ route('broker.login') }}"
                                            class="hover-a"
                                        >
                                            Sign In
                                        </a>

                                    </h4>

                                </div> -->

                        </div>

                    </form>

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
document.addEventListener('DOMContentLoaded', function () {

    const cities = [
        // Main city
        'Bengaluru',
        'Bangalore',

        // East Bengaluru
        'Whitefield',
        'Brookefield',
        'Marathahalli',
        'Bellandur',
        'Kadubeesanahalli',
        'Panathur',
        'Varthur',
        'Hoodi',
        'Mahadevapura',
        'KR Puram',
        'ITPL',
        'AECS Layout',
        'Doddanekkundi',
        'Kaggadasapura',
        'CV Raman Nagar',
        'Ramamurthy Nagar',
        'Harlur',
        'Sarjapur Road',
        'Munnekollal',

        // South Bengaluru
        'Electronic City',
        'Electronic City Phase 1',
        'Electronic City Phase 2',
        'HSR Layout',
        'BTM Layout',
        'Bommanahalli',
        'Begur',
        'Bannerghatta Road',
        'JP Nagar',
        'Jayanagar',
        'Basavanagudi',
        'Banashankari',
        'Kumaraswamy Layout',
        'Arekere',
        'Gottigere',
        'Hulimavu',
        'Akshayanagar',
        'Hongasandra',
        'Kudlu Gate',
        'Singasandra',
        'Uttarahalli',
        'Konanakunte',
        'Kanakapura Road',
        'Doddakallasandra',
        'Anjanapura',

        // Central Bengaluru
        'MG Road',
        'Brigade Road',
        'Indiranagar',
        'Domlur',
        'Ulsoor',
        'Richmond Town',
        'Residency Road',
        'Shanti Nagar',
        'Langford Town',
        'Ashok Nagar',
        'Vasanth Nagar',
        'Cunningham Road',
        'Frazer Town',
        'Cox Town',
        'Commercial Street',
        'Church Street',
        'Lavelle Road',

        // West Bengaluru
        'Rajajinagar',
        'Vijayanagar',
        'Nagarbhavi',
        'Nandini Layout',
        'Mahalakshmi Layout',
        'Basaveshwaranagar',
        'Vijayanagar Extension',
        'Kengeri',
        'Kengeri Satellite Town',
        'Attiguppe',
        'Mysore Road',
        'Magadi Road',
        'Peenya',
        'Yeshwanthpur',
        'Mathikere',
        'Jalahalli',
        'Nagasandra',
        'Laggere',
        'Sunkadakatte',

        // North Bengaluru
        'Hebbal',
        'Yelahanka',
        'Thanisandra',
        'Hennur',
        'Kalyan Nagar',
        'HRBR Layout',
        'Kammanahalli',
        'Nagawara',
        'Jakkur',
        'Sahakara Nagar',
        'RMV Extension',
        'RT Nagar',
        'Vidyaranyapura',
        'HBR Layout',
        'Banaswadi',
        'Horamavu',
        'Bagalur',
        'Devanahalli',
        'Yelahanka New Town',
        'Kannur',
        'Kothanur',
        'Ganganagar',
        'Byatarayanapura',

        // Other popular localities
        'Koramangala',
        'Ejipura',
        'Wilson Garden',
        'Adugodi',
        'Sanjay Nagar',
        'Malleshwaram',
        'Sadashivanagar',
        'Srirampura',
        'Chamrajpet',
        'KR Market',
        'Jeevan Bima Nagar',
        'New Thippasandra',
        'Kodihalli',
        'Murugeshpalya',
        'Old Airport Road',
        'HAL',
        'Chikkalasandra',
        'Kaggalipura',
        'Hoskote'
    ];

    const states = [
        'Andhra Pradesh',
        'Arunachal Pradesh',
        'Assam',
        'Bihar',
        'Chhattisgarh',
        'Goa',
        'Gujarat',
        'Haryana',
        'Himachal Pradesh',
        'Jharkhand',
        'Karnataka',
        'Kerala',
        'Madhya Pradesh',
        'Maharashtra',
        'Manipur',
        'Meghalaya',
        'Mizoram',
        'Nagaland',
        'Odisha',
        'Punjab',
        'Rajasthan',
        'Sikkim',
        'Tamil Nadu',
        'Telangana',
        'Tripura',
        'Uttar Pradesh',
        'Uttarakhand',
        'West Bengal'
    ];

    function setupAutocomplete(inputId, dropdownId, options, fieldName) {
        const input = document.getElementById(inputId);
        const dropdown = document.getElementById(dropdownId);

        if (!input || !dropdown) {
            return;
        }

        function renderSuggestions() {
            const query = input.value.trim().toLowerCase();

            dropdown.innerHTML = '';

            if (!query) {
                dropdown.style.display = 'none';
                return;
            }

            const matches = options
                .filter(function (item) {
                    return item.toLowerCase().includes(query);
                })
                .slice(0, 8);

            // Display matching suggestions
            matches.forEach(function (item) {
                const button = document.createElement('button');

                button.type = 'button';
                button.className = 'suggestion-item';
                button.textContent = item;

                button.addEventListener('click', function () {
                    input.value = item;
                    dropdown.style.display = 'none';

                    input.dispatchEvent(new Event('change', {
                        bubbles: true
                    }));
                });

                dropdown.appendChild(button);
            });

            // Allow manual entry when no suggestion matches
            if (matches.length === 0) {
                const message = document.createElement('div');

                message.className = 'suggestion-item';
                message.style.cursor = 'default';
                message.textContent =
                    'No matching ' + fieldName +
                    ' found. You can enter it manually.';

                dropdown.appendChild(message);
            }

            dropdown.style.display = 'block';
        }

        // Update suggestions while typing
        input.addEventListener('input', renderSuggestions);

        // Show suggestions when the field receives focus
        input.addEventListener('focus', renderSuggestions);

        // Hide dropdown when clicking outside
        document.addEventListener('click', function (event) {
            if (
                !input.contains(event.target) &&
                !dropdown.contains(event.target)
            ) {
                dropdown.style.display = 'none';
            }
        });

        // Keep manual input valid even if it is not in the list
        input.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                dropdown.style.display = 'none';
            }
        });
    }

    // Initialize City and State autocomplete
    setupAutocomplete(
        'city',
        'citySuggestions',
        cities,
        'city'
    );

    setupAutocomplete(
        'state',
        'stateSuggestions',
        states,
        'state'
    );

});
</script>


@endsection