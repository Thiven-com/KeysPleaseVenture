@extends('layout.mainlayout')

@section('content')

    <div class="page-wrapper">
        <div class="content">

            {{-- Header --}}
            <div class="page-header">
                <div class="row align-items-center">

                    <div class="col">
                        <h4 class="page-title">
                            Broker Details
                        </h4>

                        <p class="text-muted mb-0">
                            View broker information
                        </p>
                    </div>

                    <div class="col-auto">

                        {{-- Pending --}}
                        @if($broker->status === 'pending')

                            <form action="{{ route('admin.brokers.approve', $broker->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to approve this broker?');">
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check me-1"></i>
                                    Approve
                                </button>
                            </form>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#rejectBrokerModal">
                                <i class="fa fa-times me-1"></i>
                                Reject
                            </button>

                        @endif


                        {{-- Approved --}}
                        @if($broker->status === 'approved')

                            <form action="{{ route('admin.brokers.deactivate', $broker->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to deactivate this broker?');">
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn btn-secondary">
                                    <i class="fa fa-ban me-1"></i>
                                    Deactivate
                                </button>
                            </form>

                        @endif


                        {{-- Inactive --}}
                        @if($broker->status === 'inactive')

                            <form action="{{ route('admin.brokers.activate', $broker->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to activate this broker?');">
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check me-1"></i>
                                    Activate
                                </button>
                            </form>

                        @endif


                        {{-- Edit --}}
                        <a href="{{ route('admin.brokers.edit', $broker->id) }}" class="btn btn-warning">
                            <i class="fa fa-edit me-1"></i>
                            Edit
                        </a>


                        {{-- Change Password --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#changePasswordModal">
                            <i class="fa fa-key me-1"></i>
                            Change Password
                        </button>
                        {{-- Delete --}}
                        <form action="{{ route('admin.brokers.destroy', $broker->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to permanently delete this broker? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash me-1"></i>
                                Delete
                            </button>
                        </form>

                        {{-- Back --}}
                        <a href="{{ route('admin.brokers.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left me-1"></i>
                            Back
                        </a>

                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


            {{-- Broker Profile --}}
            <div class="card">

                <div class="card-body">

                    <div class="row">

                        {{-- Profile --}}
                        <div class="col-md-3 text-center">

                            @if($broker->profile_pic)

                                <img src="{{ asset($broker->profile_pic) }}" alt="Broker"
                                    class="img-fluid rounded-circle mb-3" style="width:150px;height:150px;object-fit:cover;">

                            @else

                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-3"
                                    style="width:150px;height:150px;">
                                    <i class="fa fa-user fa-4x text-muted"></i>
                                </div>

                            @endif

                            <h5>
                                {{ $broker->name }}
                            </h5>

                            <p class="text-muted mb-2">
                                {{ $broker->email }}
                            </p>

                            @if($broker->status === 'pending')

                                <span class="badge bg-warning">
                                    Pending
                                </span>

                            @elseif($broker->status === 'approved')

                                <span class="badge bg-success">
                                    Approved
                                </span>

                            @elseif($broker->status === 'rejected')

                                <span class="badge bg-danger">
                                    Rejected
                                </span>

                            @elseif($broker->status === 'inactive')

                                <span class="badge bg-secondary">
                                    Inactive
                                </span>

                            @endif

                        </div>


                        {{-- Personal Details --}}
                        <div class="col-md-9">

                            <h5 class="mb-3">
                                Personal Details
                            </h5>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <strong>Full Name</strong>
                                    <p class="mb-0">
                                        {{ $broker->name }}
                                    </p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>Email</strong>
                                    <p class="mb-0">
                                        {{ $broker->email }}
                                    </p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>Mobile</strong>
                                    <p class="mb-0">
                                        {{ $broker->mobile }}
                                    </p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>Broker Type</strong>
                                    <p class="mb-0">
                                        {{ $broker->broker_type ?: '-' }}
                                    </p>
                                </div>

                            </div>


                            <hr>


                            {{-- Business Details --}}
                            <h5 class="mb-3">
                                Business Details
                            </h5>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <strong>Agency / Company</strong>
                                    <p class="mb-0">
                                        {{ $broker->agency_name ?: '-' }}
                                    </p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>License Number</strong>
                                    <p class="mb-0">
                                        {{ $broker->license_number ?: '-' }}
                                    </p>
                                </div>

                            </div>


                            <hr>


                            {{-- Address --}}
                            <h5 class="mb-3">
                                Address Details
                            </h5>

                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <strong>Address</strong>
                                    <p class="mb-0">
                                        {{ $broker->address ?: '-' }}
                                    </p>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <strong>City</strong>
                                    <p class="mb-0">
                                        {{ $broker->city ?: '-' }}
                                    </p>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <strong>State</strong>
                                    <p class="mb-0">
                                        {{ $broker->state ?: '-' }}
                                    </p>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <strong>Pincode</strong>
                                    <p class="mb-0">
                                        {{ $broker->pincode ?: '-' }}
                                    </p>
                                </div>

                            </div>


                            <hr>


                            {{-- Account Information --}}
                            <h5 class="mb-3">
                                Account Information
                            </h5>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <strong>Status</strong>
                                    <p class="mb-0">
                                        {{ ucfirst($broker->status ?: 'Unknown') }}
                                    </p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>Registered On</strong>
                                    <p class="mb-0">
                                        {{ $broker->created_at
        ? $broker->created_at->format('d M Y h:i A')
        : '-' }}
                                    </p>
                                </div>

                            </div>


                            {{-- Rejection Reason --}}
                            @if($broker->rejection_reason)

                                <hr>

                                <h5 class="mb-3">
                                    Rejection Reason
                                </h5>

                                <div class="alert alert-danger">
                                    {{ $broker->rejection_reason }}
                                </div>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>


    {{-- Reject Broker Modal --}}
    <div class="modal fade" id="rejectBrokerModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Reject Broker
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>


                <form action="{{ route('admin.brokers.reject', $broker->id) }}" method="POST">

                    @csrf
                    @method('PATCH')

                    <div class="modal-body">

                        <div class="mb-3">

                            <label class="form-label">
                                Rejection Reason
                                <span class="text-danger">*</span>
                            </label>

                            <textarea name="rejection_reason" class="form-control" rows="4"
                                placeholder="Enter reason for rejecting this broker..." required></textarea>

                        </div>

                    </div>


                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-danger">
                            Reject Broker
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- Change Password Modal --}}
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Change Broker Password
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>


                <form action="{{ route('admin.brokers.changePassword', $broker->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="modal-body">

                        <div class="mb-3">

                            <label class="form-label">
                                New Password
                            </label>

                            <input type="password" name="password" class="form-control" placeholder="Enter new password"
                                required minlength="6">

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Confirm New Password
                            </label>

                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirm new password" required minlength="6">

                        </div>

                    </div>


                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-key me-1"></i>
                            Change Password
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

@endsection