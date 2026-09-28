@extends('layout.mainlayout')

@section('content')

<div class="page-wrapper">
    <div class="content">

        {{-- Page Header --}}
        <div class="page-header">

            <div class="row align-items-center">

                <div class="col">

                    <h4 class="page-title">
                        Create Broker
                    </h4>

                    <p class="text-muted mb-0">
                        Create a new broker account
                    </p>

                </div>

                <div class="col-auto">

                    <a
                        href="{{ route('admin.brokers.index') }}"
                        class="btn btn-secondary"
                    >
                        <i class="fa fa-arrow-left me-1"></i>
                        Back
                    </a>

                </div>

            </div>

        </div>


        {{-- Validation Errors --}}
        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Create Broker Form --}}
        <div class="card">

            <div class="card-body">

                <form
                    action="{{ route('admin.brokers.store') }}"
                    method="POST"
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
                                <span class="text-danger">*</span>
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
                                <span class="text-danger">*</span>
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
                                <span class="text-danger">*</span>
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
                                <span class="text-danger">*</span>
                            </label>

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
                                    {{ old('broker_type') === 'Individual' ? 'selected' : '' }}
                                >
                                    Individual
                                </option>

                                <option
                                    value="Agency"
                                    {{ old('broker_type') === 'Agency' ? 'selected' : '' }}
                                >
                                    Agency
                                </option>

                            </select>

                        </div>

                    </div>


                    <hr>


                    {{-- Business Details --}}
                    <h5 class="mb-3">
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


                    <hr>


                    {{-- Address --}}
                    <h5 class="mb-3">
                        Address Details
                    </h5>

                    <div class="mb-3">

                        <label class="form-label">
                            Address
                            <span class="text-danger">*</span>
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
                                <span class="text-danger">*</span>
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
                                <span class="text-danger">*</span>
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
                                <span class="text-danger">*</span>
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


                    <hr>


                    {{-- Login Details --}}
                    <h5 class="mb-3">
                        Login Details
                    </h5>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Password
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                minlength="6"
                                required
                            >

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Confirm Password
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                minlength="6"
                                required
                            >

                        </div>

                    </div>


                    <hr>


                    {{-- Account Status --}}
                    <h5 class="mb-3">
                        Account Status
                    </h5>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Status
                                <span class="text-danger">*</span>
                            </label>

                            <select
                                name="status"
                                class="form-select"
                                required
                            >

                                <option
                                    value="approved"
                                    {{ old('status', 'approved') === 'approved' ? 'selected' : '' }}
                                >
                                    Approved
                                </option>

                                <option
                                    value="pending"
                                    {{ old('status') === 'pending' ? 'selected' : '' }}
                                >
                                    Pending
                                </option>

                                <option
                                    value="inactive"
                                    {{ old('status') === 'inactive' ? 'selected' : '' }}
                                >
                                    Inactive
                                </option>

                            </select>

                            <small class="text-muted">
                                Approved brokers can login immediately.
                            </small>

                        </div>

                    </div>


                    {{-- Submit --}}
                    <div class="mt-4">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="fa fa-save me-1"></i>
                            Create Broker
                        </button>

                        <a
                            href="{{ route('admin.brokers.index') }}"
                            class="btn btn-secondary ms-2"
                        >
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection