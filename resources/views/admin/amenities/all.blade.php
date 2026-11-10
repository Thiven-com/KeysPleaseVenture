@extends('layout.mainlayout')

@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="page-title">Amenities</h4>
                        <p class="text-muted mb-0">
                            Manage property amenities
                        </p>
                    </div>

                    <div class="col-auto">
                        <a href="{{ route('admin.amenities.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-1"></i>
                            Add Amenity
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
                                    <th>Name</th>
                                    <!-- <th>Icon</th> -->
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Sort Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($amenities as $amenity)
                                    <tr>
                                        <td>
                                            {{ $amenities->firstItem() + $loop->index }}
                                        </td>

                                        <td>
                                            <strong>{{ $amenity->name }}</strong>
                                        </td>

                                        <!-- <td>
                                            @if($amenity->icon)
                                                <i class="{{ $amenity->icon }}"></i>
                                            @else
                                                -
                                            @endif
                                        </td> -->

                                        <td>
                                            {{ $amenity->category ?: '-' }}
                                        </td>

                                        <td>
                                            <form action="{{ route('admin.amenities.toggleStatus', $amenity->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')

                                                @if($amenity->status === 'active')
                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        Active
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn btn-sm btn-secondary">
                                                        Inactive
                                                    </button>
                                                @endif
                                            </form>
                                        </td>

                                        <td>
                                            {{ $amenity->sort_order }}
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.amenities.edit', $amenity->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form action="{{ route('admin.amenities.destroy', $amenity->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this amenity?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            No amenities found.
                                        </td>
                                    </tr>

                                @endforelse
                            </tbody>
                        </table>
                    </div>

                   {{-- AMENITIES PAGINATION --}}
@if($amenities->hasPages())
    <div class="d-flex flex-wrap justify-content-between align-items-center mt-3 gap-3">

        <div class="text-muted small">
            Showing {{ $amenities->firstItem() }} to
            {{ $amenities->lastItem() }} of
            {{ $amenities->total() }} amenities
        </div>

        <div>
            {{ $amenities->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endif

                </div>
            </div>

        </div>
    </div>

    
    <style>
    /* AMENITIES PAGINATION */
    .amenities-pagination {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 15px;
        padding: 18px 0 5px;
        border-top: 1px solid #edf0f4;
    }

    .amenities-pagination-info {
        color: #687389;
        font-size: 13px;
        font-weight: 500;
    }

    .amenities-pagination nav {
        display: flex;
        align-items: center;
    }

    .amenities-pagination .pagination {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 6px;
        margin: 0;
        padding: 0;
    }

    .amenities-pagination .page-item {
        list-style: none;
    }

    .amenities-pagination .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        padding: 0 11px;
        border: 1px solid #e2e7ef;
        border-radius: 7px !important;
        background: #ffffff;
        color: #071b3d;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        box-shadow: none;
    }

    .amenities-pagination .page-item.active .page-link {
        background: #071b3d;
        border-color: #071b3d;
        color: #ffffff;
    }

    .amenities-pagination .page-link:hover {
        background: #eef3ff;
        border-color: #3157a6;
        color: #071b3d;
    }

    .amenities-pagination .page-item.disabled .page-link {
        background: #f5f7fa;
        color: #a0a9b7;
        cursor: not-allowed;
    }

    @media (max-width: 576px) {
        .amenities-pagination {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .amenities-pagination .pagination {
            justify-content: center;
        }
    }
</style>
@endsection