@extends('layout.mainlayout')

@section('content')

    <div class="page-wrapper">
        <div class="content">

            {{-- Page Header --}}
            <div class="page-header">
                <div class="row align-items-center">

                    <div class="col">
                        <h4 class="page-title">Brokers</h4>
                        <p class="text-muted mb-0">
                            Manage registered brokers
                        </p>
                    </div>



                    <div class="col-auto">

                        <a href="{{ route('admin.brokers.trash') }}" class="btn btn-secondary me-2">

                            <i class="fa fa-trash me-1"></i>
                            Trash

                        </a>

                        <a href="{{ route('admin.brokers.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-1"></i>
                            Create Broker
                        </a>

                    </div>

                </div>
            </div>


            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            {{-- Error Message --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


            {{-- Broker Card --}}
            <div class="card">
                <div class="card-body">

                    {{-- Search --}}
                    <div class="row mb-4">

                        <div class="col-md-6">

                            <form method="GET" action="{{ route('admin.brokers.index') }}">

                                <div class="input-group">

                                    <input type="text" name="search" class="form-control" placeholder="Search broker..."
                                        value="{{ request('search') }}">

                                    @if(request('status'))
                                        <input type="hidden" name="status" value="{{ request('status') }}">
                                    @endif

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search me-1"></i>
                                        Search
                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>


                    {{-- Status Filters --}}
                    <div class="mb-4">

                        <a href="{{ route('admin.brokers.index') }}" class="btn btn-sm
                                            {{ !request('status') || request('status') === 'all'
        ? 'btn-primary'
        : 'btn-outline-primary' }} me-1">
                            All
                        </a>

                        <a href="{{ route('admin.brokers.index', ['status' => 'pending']) }}" class="btn btn-sm
                                            {{ request('status') === 'pending'
        ? 'btn-warning'
        : 'btn-outline-warning' }} me-1">
                            Pending
                        </a>

                        <a href="{{ route('admin.brokers.index', ['status' => 'approved']) }}" class="btn btn-sm
                                            {{ request('status') === 'approved'
        ? 'btn-success'
        : 'btn-outline-success' }} me-1">
                            Approved
                        </a>

                        <a href="{{ route('admin.brokers.index', ['status' => 'rejected']) }}" class="btn btn-sm
                                            {{ request('status') === 'rejected'
        ? 'btn-danger'
        : 'btn-outline-danger' }} me-1">
                            Rejected
                        </a>

                        <a href="{{ route('admin.brokers.index', ['status' => 'inactive']) }}" class="btn btn-sm
                                            {{ request('status') === 'inactive'
        ? 'btn-secondary'
        : 'btn-outline-secondary' }}">
                            Inactive
                        </a>

                    </div>


                    {{-- Broker Table --}}
                    <div class="table-responsive">

                        <table class="table table-striped table-hover">

                            <thead>
                                <tr>

                                    <th>#</th>

                                    <th>Broker</th>

                                    <th>Email</th>

                                    <th>Mobile</th>

                                    <th>Agency</th>

                                    <th>Broker Type</th>

                                    <th>Status</th>

                                    <th>Registered</th>

                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>

                                @forelse($brokers as $broker)

                                                        <tr>

                                                            {{-- ID --}}
                                                            <td>
                                                                {{ $brokers->firstItem() + $loop->index }}
                                                            </td>


                                                            {{-- Name --}}
                                                            <td>
                                                                <strong>
                                                                    {{ $broker->name }}
                                                                </strong>
                                                            </td>


                                                            {{-- Email --}}
                                                            <td>
                                                                {{ $broker->email }}
                                                            </td>


                                                            {{-- Mobile --}}
                                                            <td>
                                                                {{ $broker->mobile }}
                                                            </td>


                                                            {{-- Agency --}}
                                                            <td>
                                                                {{ $broker->agency_name ?: '-' }}
                                                            </td>


                                                            {{-- Broker Type --}}
                                                            <td>
                                                                {{ $broker->broker_type ?: '-' }}
                                                            </td>


                                                            {{-- Status --}}
                                                            <td>

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

                                                                @else

                                                                    <span class="badge bg-secondary">
                                                                        {{ ucfirst($broker->status ?: 'Unknown') }}
                                                                    </span>

                                                                @endif

                                                            </td>


                                                            {{-- Registered --}}
                                                            <td>
                                                                {{ $broker->created_at
                                    ? $broker->created_at->format('d M Y')
                                    : '-' }}
                                                            </td>


                                                            {{-- Action --}}
                                                            <td>

                                                                <a href="{{ route('admin.brokers.show', $broker->id) }}" class="btn btn-sm btn-info"
                                                                    title="View Broker">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>

                                                                <a href="{{ route('admin.brokers.edit', $broker->id) }}"
                                                                    class="btn btn-sm btn-warning" title="Edit Broker">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>

                                                                {{-- Delete --}}
                                                                <form action="{{ route('admin.brokers.destroy', $broker->id) }}" method="POST"
                                                                    class="d-inline"
                                                                    onsubmit="return confirm('Are you sure you want to permanently delete this broker?');">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete Broker">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>

                                                                </form>

                                                            </td>

                                                        </tr>

                                @empty

                                    <tr>

                                        <td colspan="9" class="text-center py-4">
                                            No brokers found.
                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $brokers->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection