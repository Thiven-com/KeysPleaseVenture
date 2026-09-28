@extends('layout.brokermainlayout')

@section('content')

<div class="account-content">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card shadow-sm border-0">

                    <div class="card-body p-4 p-lg-5">

                        <div class="text-center mb-4">

                            <h2>Broker Registration</h2>

                            <p class="text-muted">
                                Register your broker account
                            </p>

                        </div>

                        @if ($errors->any())

                            <div class="alert alert-danger">

                                <ul class="mb-0">

                                    @foreach ($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <form
                            method="POST"
                            action="{{ route('broker.register.submit') }}"
                        >

                            @csrf


                            {{-- Personal Details --}}

                            <h5 class="mb-3">
                                Personal Details
                            </h5>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Full Name
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        value="{{ old('name') }}"
                                        required
                                    >

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Email Address
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        value="{{ old('email') }}"
                                        required
                                    >

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Mobile Number
                                    </label>

                                    <input
                                        type="text"
                                        name="mobile"
                                        class="form-control"
                                        value="{{ old('mobile') }}"
                                        required
                                    >

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Broker Type
                                    </label>

                                    <select
                                        name="broker_type"
                                        class="form-select"
                                        required
                                    >

                                        <option value="">
                                            Select Broker Type
                                        </option>

                                        <option value="Individual">
                                            Individual
                                        </option>

                                        <option value="Agency">
                                            Agency
                                        </option>

                                    </select>

                                </div>

                            </div>


                            {{-- Business Details --}}

                            <h5 class="mb-3 mt-4">
                                Business Details
                            </h5>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Agency / Company Name
                                    </label>

                                    <input
                                        type="text"
                                        name="agency_name"
                                        class="form-control"
                                        value="{{ old('agency_name') }}"
                                    >

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        License Number
                                    </label>

                                    <input
                                        type="text"
                                        name="license_number"
                                        class="form-control"
                                        value="{{ old('license_number') }}"
                                    >

                                </div>

                            </div>


                            {{-- Address Details --}}

                            <h5 class="mb-3 mt-4">
                                Address Details
                            </h5>

                            <div class="mb-3">

                                <label class="form-label">
                                    Address
                                </label>

                                <textarea
                                    name="address"
                                    class="form-control"
                                    rows="3"
                                    required
                                >{{ old('address') }}</textarea>

                            </div>


                            <div class="row">

                                <div class="col-md-4 mb-3">

                                    <label class="form-label">
                                        City
                                    </label>

                                    <input
                                        type="text"
                                        name="city"
                                        class="form-control"
                                        value="{{ old('city') }}"
                                        required
                                    >

                                </div>


                                <div class="col-md-4 mb-3">

                                    <label class="form-label">
                                        State
                                    </label>

                                    <input
                                        type="text"
                                        name="state"
                                        class="form-control"
                                        value="{{ old('state') }}"
                                        required
                                    >

                                </div>


                                <div class="col-md-4 mb-3">

                                    <label class="form-label">
                                        Pincode
                                    </label>

                                    <input
                                        type="text"
                                        name="pincode"
                                        class="form-control"
                                        value="{{ old('pincode') }}"
                                        required
                                    >

                                </div>

                            </div>


                            {{-- Login Details --}}

                            <h5 class="mb-3 mt-4">
                                Login Details
                            </h5>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Password
                                    </label>

                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        required
                                    >

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Confirm Password
                                    </label>

                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        class="form-control"
                                        required
                                    >

                                </div>

                            </div>


                            <div class="form-check mb-4">

                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="terms"
                                    required
                                >

                                <label
                                    class="form-check-label"
                                    for="terms"
                                >
                                    I confirm that the information provided
                                    is correct.
                                </label>

                            </div>


                            <button
                                type="submit"
                                class="btn btn-login w-100"
                            >
                                Submit Registration
                            </button>


                            <div class="text-center mt-3">

                                Already have an account?

                                <a href="{{ route('broker.login') }}">
                                    Sign In
                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection