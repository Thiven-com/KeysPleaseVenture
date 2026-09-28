@extends('layout.mainlayout')

@section('content')

<div class="page-wrapper">
    <div class="content">

        <div class="page-header">
            <div class="row align-items-center">

                <div class="col">
                    <h4 class="page-title">Broker Trash</h4>
                    <p class="text-muted mb-0">
                        Deleted brokers
                    </p>
                </div>

                <div class="col-auto">
                    <a href="{{ route('admin.brokers.index') }}"
                       class="btn btn-secondary">
                        <i class="fa fa-arrow-left me-1"></i>
                        Back to Brokers
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
                                <th>Broker</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Agency</th>
                                <th>Status</th>
                                <th>Deleted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($brokers as $broker)

                                <tr>

                                    <td>
                                        {{ $brokers->firstItem() + $loop->index }}
                                    </td>

                                    <td>
                                        <strong>
                                            {{ $broker->name }}
                                        </strong>
                                    </td>

                                    <td>
                                        {{ $broker->email }}
                                    </td>

                                    <td>
                                        {{ $broker->mobile }}
                                    </td>

                                    <td>
                                        {{ $broker->agency_name ?: '-' }}
                                    </td>

                                    <td>
                                        @if($broker->status === 'approved')
                                            <span class="badge bg-success">
                                                Approved
                                            </span>
                                        @elseif($broker->status === 'pending')
                                            <span class="badge bg-warning">
                                                Pending
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

                                    <td>
                                        {{ $broker->deleted_at
                                            ? $broker->deleted_at->format('d M Y h:i A')
                                            : '-' }}
                                    </td>

                                    <td>

                                        {{-- Restore --}}
                                        <form
                                            action="{{ route('admin.brokers.restore', $broker->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Restore this broker?');">

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-success"
                                                title="Restore">

                                                <i class="fa fa-undo"></i>
                                            </button>

                                        </form>


                                        {{-- Permanent Delete --}}
                                        <form
                                            action="{{ route('admin.brokers.forceDelete', $broker->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('WARNING: This broker will be permanently deleted and cannot be restored. Are you sure?');">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                                title="Permanently Delete">

                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8"
                                        class="text-center py-4">

                                        <i class="fa fa-trash fa-2x text-muted mb-2"></i>

                                        <div>
                                            Trash is empty.
                                        </div>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-3">
                    {{ $brokers->links() }}
                </div>

            </div>
        </div>

    </div>
</div>

@endsection