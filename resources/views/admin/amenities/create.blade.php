@extends('layout.mainlayout')

@section('content')

<div class="page-wrapper">
    <div class="content">

        {{-- Page Header --}}
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="page-title">Add Amenity</h4>
                    <p class="text-muted mb-0">
                        Add a new property amenity
                    </p>
                </div>

                <div class="col-auto">
                    <a href="{{ route('admin.amenities.index') }}"
                       class="btn btn-light">
                        <i class="fa fa-arrow-left me-1"></i>
                        Back
                    </a>
                </div>
            </div>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix the following errors:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Add Amenity Form --}}
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    Amenity Information
                </h5>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.amenities.store') }}"
                      method="POST">

                    @csrf

                    <div class="row">

                        {{-- Name --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Amenity Name
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name') }}"
                                   placeholder="Example: Swimming Pool"
                                   required>
                        </div>

                        {{-- Category --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Category
                            </label>

                            <input type="text"
                                   name="category"
                                   class="form-control"
                                   value="{{ old('category') }}"
                                   placeholder="Example: Recreation">
                        </div>

                        {{-- Icon --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Icon Class
                            </label>

                            <input type="text"
                                   name="icon"
                                   class="form-control"
                                   value="{{ old('icon') }}"
                                   placeholder="Example: ti ti-pool">

                            <small class="text-muted">
                                Enter the icon CSS class if you want to display an icon.
                            </small>
                        </div>

                        {{-- Sort Order --}}
                        <div class="col-md-3 mb-3">
                            <label class="form-label">
                                Sort Order
                            </label>

                            <input type="number"
                                   name="sort_order"
                                   class="form-control"
                                   value="{{ old('sort_order', 0) }}"
                                   min="0">
                        </div>

                        {{-- Status --}}
                        <div class="col-md-3 mb-3">
                            <label class="form-label">
                                Status
                                <span class="text-danger">*</span>
                            </label>

                            <select name="status"
                                    class="form-select"
                                    required>

                                <option value="active"
                                    {{ old('status', 'active') === 'active' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="inactive"
                                    {{ old('status') === 'inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>
                        </div>

                    </div>

                    {{-- Buttons --}}
                    <div class="mt-3 d-flex gap-2">

                        <button type="submit"
                                class="btn btn-primary">
                            <i class="fa fa-save me-1"></i>
                            Save Amenity
                        </button>

                        <a href="{{ route('admin.amenities.index') }}"
                           class="btn btn-light">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection