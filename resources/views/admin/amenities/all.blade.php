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
                                    <th>Icon</th>
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

                                        <td>
                                            @if($amenity->icon)
                                                <i class="{{ $amenity->icon }}"></i>
                                            @else
                                                -
                                            @endif
                                        </td>

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

                    <div class="mt-3">
                        {{ $amenities->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection