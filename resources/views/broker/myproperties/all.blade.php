@extends('layout.brokermainlayout')

@section('content')

<style>
    .broker-properties-page {
        margin-left: 250px;
        padding: 105px 25px 40px;
        background: #f5f7fb;
        min-height: 100vh;
    }

    .properties-container {
        max-width: 1450px;
        margin: 0 auto;
    }

    /* Header */
    .properties-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }

    .properties-title h2 {
        margin: 0;
        color: #071b3d;
        font-size: 27px;
        font-weight: 700;
    }

    .properties-title p {
        margin: 6px 0 0;
        color: #7b8494;
        font-size: 14px;
    }

    .add-property-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 18px;
        background: #071b3d;
        color: #fff !important;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: 0.2s;
    }

    .add-property-btn:hover {
        background: #0b2858;
        transform: translateY(-1px);
    }

    /* Statistics */
    .property-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-bottom: 22px;
    }

    .stat-card {
        background: #fff;
        border: 1px solid #e9edf3;
        border-radius: 11px;
        padding: 20px;
        box-shadow: 0 3px 12px rgba(20, 30, 50, 0.04);
    }

    .stat-card-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .stat-label {
        color: #737d8d;
        font-size: 13px;
        font-weight: 500;
    }

    .stat-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f0f3f8;
        color: #071b3d;
        border-radius: 8px;
        font-size: 15px;
    }

    .stat-number {
        margin-top: 12px;
        color: #071b3d;
        font-size: 26px;
        font-weight: 700;
    }

    /* Search */
    .properties-toolbar {
        background: #fff;
        border: 1px solid #e9edf3;
        border-radius: 11px;
        padding: 15px;
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 18px;
        box-shadow: 0 3px 12px rgba(20, 30, 50, 0.03);
    }

    .property-search {
        flex: 1;
        position: relative;
    }

    .property-search i {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #9aa3b1;
        font-size: 14px;
    }

    .property-search input,
    .property-filter select {
        width: 100%;
        height: 42px;
        border: 1px solid #dfe4eb;
        border-radius: 7px;
        background: #fff;
        color: #333;
        font-size: 13px;
        outline: none;
    }

    .property-search input {
        padding: 0 14px 0 37px;
    }

    .property-search input:focus,
    .property-filter select:focus {
        border-color: #071b3d;
    }

    .property-filter {
        width: 180px;
    }

    .property-filter select {
        padding: 0 12px;
        cursor: pointer;
    }

    /* Table */
    .properties-table-card {
        background: #fff;
        border: 1px solid #e9edf3;
        border-radius: 11px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(20, 30, 50, 0.04);
    }

    .properties-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .properties-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }

    .properties-table th {
        background: #fafbfc;
        color: #687385;
        font-size: 12px;
        font-weight: 600;
        text-align: left;
        padding: 14px 16px;
        border-bottom: 1px solid #e9edf3;
        white-space: nowrap;
    }

    .properties-table td {
        padding: 15px 16px;
        border-bottom: 1px solid #edf0f4;
        vertical-align: middle;
        font-size: 13px;
        color: #4f5968;
    }

    .properties-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .properties-table tbody tr:hover {
        background: #fafbfd;
    }

    /* Property */
    .property-info {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 240px;
    }

    .property-image {
        width: 58px;
        height: 48px;
        border-radius: 7px;
        object-fit: cover;
        background: #eef1f5;
        flex-shrink: 0;
    }

    .property-name {
        color: #071b3d;
        font-weight: 600;
        font-size: 13px;
        margin-bottom: 4px;
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .property-subtitle {
        color: #8a93a1;
        font-size: 11px;
    }

    .property-type {
        color: #4c5666;
        font-weight: 500;
        white-space: nowrap;
    }

    .property-location {
        max-width: 180px;
        color: #687385;
    }

    .property-price {
        color: #071b3d;
        font-weight: 700;
        white-space: nowrap;
    }

    /* Status */
    .property-status {
        display: inline-flex;
        align-items: center;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status-approved {
        background: #eaf7ef;
        color: #25834d;
    }

    .status-pending {
        background: #fff5df;
        color: #a96d00;
    }

    .status-rejected {
        background: #fdecec;
        color: #c53c3c;
    }

    .status-rented {
        background: #edf1f8;
        color: #53657f;
    }

    .status-inactive {
        background: #f0f1f3;
        color: #737b87;
    }

    /* Actions */
    .property-actions {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .action-btn {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e0e5eb;
        border-radius: 6px;
        background: #fff;
        color: #657083;
        text-decoration: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .action-btn:hover {
        color: #071b3d;
        border-color: #071b3d;
        background: #f7f9fc;
    }

    .action-btn.delete:hover {
        color: #c53c3c;
        border-color: #e8b5b5;
        background: #fff6f6;
    }

    /* Empty */
    .empty-properties {
        padding: 65px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f0f3f8;
        color: #071b3d;
        border-radius: 50%;
        font-size: 23px;
    }

    .empty-properties h4 {
        margin: 0 0 7px;
        color: #071b3d;
        font-size: 18px;
    }

    .empty-properties p {
        margin: 0 0 18px;
        color: #8a93a1;
        font-size: 13px;
    }

    /* Responsive */
    @media (max-width: 1100px) {
        .property-stats {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 991px) {
        .broker-properties-page {
            margin-left: 0;
            padding: 95px 18px 35px;
        }

        .properties-toolbar {
            flex-wrap: wrap;
        }

        .property-search {
            flex: 1 1 100%;
        }

        .property-filter {
            flex: 1;
            width: auto;
        }
    }

    @media (max-width: 600px) {
        .broker-properties-page {
            padding: 90px 12px 30px;
        }

        .properties-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .properties-title h2 {
            font-size: 23px;
        }

        .add-property-btn {
            width: 100%;
            justify-content: center;
        }

        .property-stats {
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .stat-card {
            padding: 15px;
        }

        .stat-number {
            font-size: 22px;
        }

        .properties-toolbar {
            padding: 12px;
        }

        .property-filter {
            flex: 1 1 100%;
        }
    }
</style>

<div class="broker-properties-page">

    <div class="properties-container">

        {{-- PAGE HEADER --}}
        <div class="properties-header">

            <div class="properties-title">
                <h2>My Properties</h2>
                <p>Manage and track all your listed properties</p>
            </div>

            <a href="{{ route('broker.properties.create') }}"
               class="add-property-btn">
                <i class="fa-solid fa-plus"></i>
                Add Property
            </a>

        </div>

        {{-- STATISTICS --}}
        @php
            $totalProperties = $properties->count();
            $approvedProperties = $properties->where('status', 'approved')->count();
            $pendingProperties = $properties->where('status', 'pending')->count();
            $rejectedProperties = $properties->where('status', 'rejected')->count();
        @endphp

        <div class="property-stats">

            <div class="stat-card">
                <div class="stat-card-top">
                    <span class="stat-label">Total Properties</span>
                    <span class="stat-icon">
                        <i class="fa-solid fa-building"></i>
                    </span>
                </div>
                <div class="stat-number">{{ $totalProperties }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-card-top">
                    <span class="stat-label">Active</span>
                    <span class="stat-icon">
                        <i class="fa-solid fa-circle-check"></i>
                    </span>
                </div>
                <div class="stat-number">{{ $approvedProperties }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-card-top">
                    <span class="stat-label">Pending</span>
                    <span class="stat-icon">
                        <i class="fa-solid fa-clock"></i>
                    </span>
                </div>
                <div class="stat-number">{{ $pendingProperties }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-card-top">
                    <span class="stat-label">Rejected</span>
                    <span class="stat-icon">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </span>
                </div>
                <div class="stat-number">{{ $rejectedProperties }}</div>
            </div>

        </div>

        {{-- SEARCH + FILTER --}}
        <div class="properties-toolbar">

            <div class="property-search">
                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    id="propertySearch"
                    placeholder="Search properties..."
                >
            </div>

            <div class="property-filter">
                <select id="statusFilter">
                    <option value="">All Status</option>
                    <option value="approved">Approved</option>
                    <option value="pending">Pending</option>
                    <option value="rejected">Rejected</option>
                    <option value="rented">Rented</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="property-filter">
                <select id="typeFilter">
                    <option value="">All Property Types</option>

                    @php
                        $types = $properties
                            ->pluck('property_type')
                            ->filter()
                            ->unique()
                            ->sort();
                    @endphp

                    @foreach($types as $type)
                        <option value="{{ strtolower($type) }}">
                            {{ $type }}
                        </option>
                    @endforeach

                </select>
            </div>

        </div>

        {{-- PROPERTY TABLE --}}
        <div class="properties-table-card">

            @if($properties->count())

                <div class="properties-table-wrapper">

                    <table class="properties-table">

                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Added On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody id="propertiesTableBody">

                            @foreach($properties as $property)

                                @php
                                    $status = strtolower($property->status ?? 'pending');

                                    $statusClass = match($status) {
                                        'approved' => 'status-approved',
                                        'pending' => 'status-pending',
                                        'rejected' => 'status-rejected',
                                        'rented' => 'status-rented',
                                        default => 'status-inactive',
                                    };

                                    $image = $property->images->first();

                                    $imageUrl = $image
                                        ? asset($image->image_path)
                                        : asset('website/images/no-image.jpg');

                                    $cityName = optional($property->cityRelation)->name
                                        ?? $property->city
                                        ?? 'Location not available';

                                    $searchText = strtolower(
                                        ($property->property_title ?? '') . ' ' .
                                        ($property->property_type ?? '') . ' ' .
                                        ($property->locality ?? '') . ' ' .
                                        $cityName
                                    );
                                @endphp

                                <tr
                                    class="property-row"
                                    data-search="{{ $searchText }}"
                                    data-status="{{ $status }}"
                                    data-type="{{ strtolower($property->property_type ?? '') }}"
                                >

                                    {{-- PROPERTY --}}
                                    <td>

                                        <div class="property-info">

                                            <img
                                                src="{{ $imageUrl }}"
                                                alt="{{ $property->property_title }}"
                                                class="property-image"
                                            >

                                            <div>
                                                <div class="property-name">
                                                    {{ $property->property_title ?? 'Untitled Property' }}
                                                </div>

                                                <div class="property-subtitle">
                                                    @if($property->bhk)
                                                        {{ $property->bhk }} BHK
                                                    @endif

                                                    @if($property->locality)
                                                        · {{ $property->locality }}
                                                    @endif
                                                </div>
                                            </div>

                                        </div>

                                    </td>

                                    {{-- TYPE --}}
                                    <td>
                                        <span class="property-type">
                                            {{ $property->property_type ?? '—' }}
                                        </span>
                                    </td>

                                    {{-- LOCATION --}}
                                    <td>
                                        <span class="property-location">
                                            {{ $cityName }}
                                        </span>
                                    </td>

                                    {{-- PRICE --}}
                                    <td>
                                        <span class="property-price">
                                            ₹{{ number_format((float) $property->price) }}
                                        </span>
                                    </td>

                                    {{-- STATUS --}}
                                    <td>
                                        <span class="property-status {{ $statusClass }}">
                                            {{ ucfirst($status) }}
                                        </span>
                                    </td>

                                    {{-- DATE --}}
                                    <td>
                                        {{ optional($property->created_at)->format('d M Y') }}
                                    </td>

                                    {{-- ACTIONS --}}
                                    <td>

                                        <div class="property-actions">

                                            @if($property->slug)
                                                <a
                                                    href="{{ route('propertydetails', $property->slug) }}"
                                                    class="action-btn"
                                                    title="View"
                                                >
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                            @endif

                                            <a
                                                href="{{ route('broker.properties.edit', $property->id) }}"
                                                class="action-btn"
                                                title="Edit"
                                            >
                                                <i class="fa-solid fa-pen"></i>
                                            </a>

                                            <button
                                                type="button"
                                                class="action-btn delete"
                                                title="Delete"
                                                onclick="deleteProperty({{ $property->id }})"
                                            >
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty-properties">

                    <div class="empty-icon">
                        <i class="fa-solid fa-building"></i>
                    </div>

                    <h4>No Properties Yet</h4>

                    <p>
                        Add your first property to start receiving enquiries.
                    </p>

                    <a
                        href="{{ route('broker.properties.create') }}"
                        class="add-property-btn"
                    >
                        <i class="fa-solid fa-plus"></i>
                        Add Property
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('propertySearch');
    const statusFilter = document.getElementById('statusFilter');
    const typeFilter = document.getElementById('typeFilter');
    const rows = document.querySelectorAll('.property-row');

    function filterProperties() {

        const search = (searchInput?.value || '').toLowerCase().trim();
        const status = (statusFilter?.value || '').toLowerCase();
        const type = (typeFilter?.value || '').toLowerCase();

        rows.forEach(row => {

            const rowSearch = row.dataset.search || '';
            const rowStatus = row.dataset.status || '';
            const rowType = row.dataset.type || '';

            const matchesSearch =
                !search || rowSearch.includes(search);

            const matchesStatus =
                !status || rowStatus === status;

            const matchesType =
                !type || rowType === type;

            row.style.display =
                matchesSearch && matchesStatus && matchesType
                    ? ''
                    : 'none';
        });
    }

    searchInput?.addEventListener('input', filterProperties);
    statusFilter?.addEventListener('change', filterProperties);
    typeFilter?.addEventListener('change', filterProperties);

});

function deleteProperty(id) {

    if (!confirm('Are you sure you want to delete this property?')) {
        return;
    }

    /*
     * Delete route will be connected when the
     * broker property delete permission is implemented.
     */
    alert('Delete functionality will be connected next.');
}
</script>

@endsection