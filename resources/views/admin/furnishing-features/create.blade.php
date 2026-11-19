
@extends('layout.mainlayout')

@section('content')

<div class="page-wrapper">
    <div class="content">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="page-title">Add Furnishing Feature</h4>
                    <p class="text-muted mb-0">
                        Add a new property furnishing feature
                    </p>
                </div>

                <div class="col-auto">
                    <a href="{{ route('admin.furnishing-features.index') }}"
                       class="btn btn-light">
                        <i class="fa fa-arrow-left me-1"></i>
                        Back
                    </a>
                </div>
            </div>
        </div>

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

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    Furnishing Feature Information
                </h5>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.furnishing-features.store') }}"
                      method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Feature Name
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name') }}"
                                   placeholder="Example: Ceiling Fan"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Furnishing Type
                                <span class="text-danger">*</span>
                            </label>

                            <select name="furnishing_type"
                                    class="form-select"
                                    required>

                                <option value="">Select Furnishing Type</option>

                                <option value="Fully Furnished"
                                    {{ old('furnishing_type') === 'Fully Furnished' ? 'selected' : '' }}>
                                    Fully Furnished
                                </option>

                                <option value="Semi Furnished"
                                    {{ old('furnishing_type') === 'Semi Furnished' ? 'selected' : '' }}>
                                    Semi Furnished
                                </option>

                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Selection Type
                                <span class="text-danger">*</span>
                            </label>

                            <select name="selection_type"
                                    class="form-select"
                                    required>

                                <option value="">Select Selection Type</option>

                                <option value="checkbox"
                                    {{ old('selection_type', 'checkbox') === 'checkbox' ? 'selected' : '' }}>
                                    Checkbox
                                </option>

                                <option value="quantity"
                                    {{ old('selection_type') === 'quantity' ? 'selected' : '' }}>
                                    Quantity
                                </option>

                            </select>

                            <small class="text-muted">
                                Checkbox: Select the feature.
                                Quantity: Enter the number of items.
                            </small>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Icon Class
                            </label>

                            <input type="text"
                                   name="icon"
                                   class="form-control"
                                   value="{{ old('icon') }}"
                                   placeholder="Example: fa fa-fan">

                            <small class="text-muted">
                                Optional icon CSS class.
                            </small>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Status
                                <span class="text-danger">*</span>
                            </label>

                            <select name="is_active"
                                    class="form-select"
                                    required>

                                <option value="1"
                                    {{ old('is_active', '1') == '1' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="0"
                                    {{ old('is_active') === '0' ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>
                        </div>

                    </div>

                    <div class="mt-3 d-flex gap-2">

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-1"></i>
                            Save Feature
                        </button>

                        <a href="{{ route('admin.furnishing-features.index') }}"
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
