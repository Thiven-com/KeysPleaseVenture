<?php $page = 'signin-2'; ?>

@extends('layout.brokermainlayout')

@section('content')

<div class="account-content">

    <div class="row login-wrapper m-0">

        {{-- LEFT SIDE - REGISTRATION FORM --}}
        <div class="col-lg-6 p-0">

            <div class="login-content">

                <form
                    method="POST"
                    action="{{ route('broker.register.submit') }}"
                >

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

                            <a
                                href="{{ url('broker/dashboard') }}"
                                class="logo logo-normal d-flex align-items-center"
                            >

                                <img
                                    src="{{ asset('website') }}/images/solarlogo.png"
                                    alt="Logo"
                                    style="width:300px; margin-left:30px;"
                                >

                            </a>

                        </div>

                        {{-- Heading --}}
                        <div class="login-userheading">

                            <h3>Broker Registration</h3>

                            <h3>
                                {{ $settings->site_name ?? '' }}
                            </h3>

                            <p class="text-muted">
                                Create your broker account
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

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control border-end-0"
                                    value="{{ old('name') }}"
                                    placeholder="Enter your full name"
                                    required
                                >

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

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control border-end-0"
                                    value="{{ old('email') }}"
                                    placeholder="Enter email address"
                                    required
                                >

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

                                <input
                                    type="text"
                                    name="mobile"
                                    class="form-control border-end-0"
                                    value="{{ old('mobile') }}"
                                    placeholder="Enter mobile number"
                                    required
                                >

                                <span class="input-group-text border-start-0">
                                    <i class="ti ti-phone"></i>
                                </span>

                            </div>

                        </div>


                        {{-- Broker Type --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Broker Type
                            </label>

                            <div class="input-group">

                                <select
                                    name="broker_type"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        Select Broker Type
                                    </option>

                                    <option
                                        value="Individual"
                                        {{ old('broker_type') == 'Individual' ? 'selected' : '' }}
                                    >
                                        Individual
                                    </option>

                                    <option
                                        value="Agency"
                                        {{ old('broker_type') == 'Agency' ? 'selected' : '' }}
                                    >
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

                                <input
                                    type="text"
                                    name="agency_name"
                                    class="form-control border-end-0"
                                    value="{{ old('agency_name') }}"
                                    placeholder="Enter agency/company name"
                                >

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

                                <input
                                    type="text"
                                    name="license_number"
                                    class="form-control border-end-0"
                                    value="{{ old('license_number') }}"
                                    placeholder="Enter license number"
                                >

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

                            <textarea
                                name="address"
                                class="form-control"
                                rows="3"
                                placeholder="Enter your complete address"
                                required
                            >{{ old('address') }}</textarea>

                        </div>


                        {{-- City --}}
                        <div class="mb-3">

                            <label class="form-label">
                                City
                            </label>

                            <div class="input-group">

                                <input
                                    type="text"
                                    name="city"
                                    class="form-control border-end-0"
                                    value="{{ old('city') }}"
                                    placeholder="Enter city"
                                    required
                                >

                                <span class="input-group-text border-start-0">
                                    <i class="ti ti-map-pin"></i>
                                </span>

                            </div>

                        </div>


                        {{-- State --}}
                        <div class="mb-3">

                            <label class="form-label">
                                State
                            </label>

                            <div class="input-group">

                                <input
                                    type="text"
                                    name="state"
                                    class="form-control border-end-0"
                                    value="{{ old('state') }}"
                                    placeholder="Enter state"
                                    required
                                >

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

                                <input
                                    type="text"
                                    name="pincode"
                                    class="form-control border-end-0"
                                    value="{{ old('pincode') }}"
                                    placeholder="Enter pincode"
                                    required
                                >

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

                                <input
                                    type="password"
                                    name="password"
                                    class="pass-input form-control"
                                    placeholder="Enter password"
                                    minlength="6"
                                    required
                                >

                                <span class="ti toggle-password ti-eye-off text-gray-9"></span>

                            </div>

                        </div>


                        {{-- Confirm Password --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Confirm Password
                            </label>

                            <div class="pass-group">

                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="pass-input form-control"
                                    placeholder="Confirm password"
                                    minlength="6"
                                    required
                                >

                                <span class="ti toggle-password ti-eye-off text-gray-9"></span>

                            </div>

                        </div>


                        {{-- Terms --}}
                        <div class="form-login authentication-check mb-4">

                            <div class="custom-control custom-checkbox">

                                <label class="checkboxs ps-4 mb-0">

                                    <input
                                        type="checkbox"
                                        name="terms"
                                        value="1"
                                        required
                                    >

                                    <span class="checkmarks"></span>

                                    I confirm that the information provided is correct.

                                </label>

                            </div>

                        </div>


                        {{-- Submit --}}
                        <div class="form-login">

                            <button
                                type="submit"
                                class="btn btn-login"
                            >
                                Submit Registration
                            </button>

                        </div>


                        {{-- Login --}}
                        <div class="signinform">

                            <h4>

                                Already have an account?

                                <a
                                    href="{{ route('broker.login') }}"
                                    class="hover-a"
                                >
                                    Sign In
                                </a>

                            </h4>

                        </div>

                    </div>

                </form>

            </div>

        </div>


        {{-- ========================================= --}}
        {{-- RIGHT SIDE IMAGE --}}
        {{-- ========================================= --}}

        <div class="col-lg-6 p-0">

            <div class="login-img">

                <img
                    src="{{ asset('website') }}/images/sollog.png"
                    alt="Broker Registration"
                >

            </div>

        </div>

    </div>

</div>

@endsection