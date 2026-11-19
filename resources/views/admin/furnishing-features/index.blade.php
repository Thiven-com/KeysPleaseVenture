
@extends('layout.mainlayout')

@section('content')

<div class="page-wrapper">
    <div class="content">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="page-title">Furnishing Features</h4>
                    <p class="text-muted mb-0">
                        Manage property furnishing features
                    </p>
                </div>

                <div class="col-auto">
                    <a href="{{ route('admin.furnishing-features.create') }}"
                       class="btn btn-primary">
                        <i class="fa fa-plus me-1"></i>
                        Add Feature
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

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Feature Name</th>
                                <th>Furnishing Type</th>
                                <th>Selection Type</th>
                                <th>Icon</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($features as $feature)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <strong>{{ $feature->name }}</strong>
                                    </td>

                                    <td>{{ $feature->furnishing_type }}</td>

                                    <td>
                                        @if($feature->selection_type === 'quantity')
                                            <span class="badge bg-info">
                                                Quantity
                                            </span>
                                        @else
                                            <span class="badge bg-primary">
                                                Checkbox
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($feature->icon)
                                            <i class="{{ $feature->icon }}"></i>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        <form
                                            action="{{ route('admin.furnishing-features.toggleStatus', $feature->id) }}"
                                            method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('PATCH')

                                            @if($feature->is_active)
                                                <button type="submit"
                                                        class="btn btn-sm btn-success">
                                                    Active
                                                </button>
                                            @else
                                                <button type="submit"
                                                        class="btn btn-sm btn-secondary">
                                                    Inactive
                                                </button>
                                            @endif
                                        </form>
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.furnishing-features.edit', $feature->id) }}"
                                           class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form
                                            action="{{ route('admin.furnishing-features.destroy', $feature->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this feature?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        No furnishing features found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
