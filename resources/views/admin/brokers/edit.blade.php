@extends('layout.mainlayout')

@section('content')

<div class="page-wrapper">
    <div class="content">

        <div class="page-header">
            <div class="row align-items-center">

                <div class="col">
                    <h4 class="page-title">
                        Edit Broker
                    </h4>

                    <p class="text-muted mb-0">
                        Update broker information
                    </p>
                </div>

                <div class="col-auto">

                    <a
                        href="{{ route('admin.brokers.show', $broker->id) }}"
                        class="btn btn-secondary"
                    >
                        <i class="fa fa-arrow-left me-1"></i>
                        Back
                    </a>

                </div>

            </div>
        </div>


        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <div class="card">

            <div class="card-body">

                <form
                    method="POST"
                    action="{{ route('admin.brokers.update', $broker->id) }}"
                >

                    @csrf
                    @method('PUT')


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
                                value="{{ old('name', $broker->name) }}"
                                required
                            >

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', $broker->email) }}"
                                required
                            >

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Mobile
                            </label>

                            <input
                                type="text"
                                name="mobile"
                                class="form-control"
                                value="{{ old('mobile', $broker->mobile) }}"
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

                                <option
                                    value="Individual"
                                    {{ old('broker_type', $broker->broker_type) === 'Individual' ? 'selected' : '' }}
                                >
                                    Individual
                                </option>

                                <option
                                    value="Agency"
                                    {{ old('broker_type', $broker->broker_type) === 'Agency' ? 'selected' : '' }}
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
                                value="{{ old('agency_name', $broker->agency_name) }}"
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
                                value="{{ old('license_number', $broker->license_number) }}"
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
                        </label>

                        <textarea
                            name="address"
                            class="form-control"
                            rows="3"
                            required
                        >{{ old('address', $broker->address) }}</textarea>

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
                                value="{{ old('city', $broker->city) }}"
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
                                value="{{ old('state', $broker->state) }}"
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
                                value="{{ old('pincode', $broker->pincode) }}"
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
                            </label>

                            <select
                                name="status"
                                class="form-select"
                                required
                            >

                                <option
                                    value="pending"
                                    {{ old('status', $broker->status) === 'pending' ? 'selected' : '' }}
                                >
                                    Pending
                                </option>

                                <option
                                    value="approved"
                                    {{ old('status', $broker->status) === 'approved' ? 'selected' : '' }}
                                >
                                    Approved
                                </option>

                                <option
                                    value="rejected"
                                    {{ old('status', $broker->status) === 'rejected' ? 'selected' : '' }}
                                >
                                    Rejected
                                </option>

                                <option
                                    value="inactive"
                                    {{ old('status', $broker->status) === 'inactive' ? 'selected' : '' }}
                                >
                                    Inactive
                                </option>

                            </select>

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Rejection Reason
                            </label>

                            <input
                                type="text"
                                name="rejection_reason"
                                class="form-control"
                                value="{{ old('rejection_reason', $broker->rejection_reason) }}"
                                placeholder="Required when rejected"
                            >

                        </div>

                    </div>


                    {{-- Buttons --}}
                    <div class="mt-4">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="fa fa-save me-1"></i>
                            Update Broker
                        </button>

                        <a
                            href="{{ route('admin.brokers.show', $broker->id) }}"
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