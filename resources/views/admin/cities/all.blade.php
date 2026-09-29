@extends('layout.mainlayout')

@section('content')

<style>
    .cities-page {
        position: relative;
        width: 100%;
        max-width: 100%;
        min-width: 0;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        overflow-x: hidden;
    }

    .cities-main {
        width: 100%;
        max-width: 100%;
        min-width: 0;
        margin: 0;
        padding: 28px 30px 35px;
        box-sizing: border-box;
        overflow-x: hidden;
        margin-top: 50px;
    }

    /* HEADER */

    .cities-header {
        width: 100%;
        margin: 0 0 24px;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
    }

    .cities-title {
        margin: 0 0 6px;
        color: #071b3d !important;
        font-size: 25px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
    }

    .cities-subtitle {
        margin: 0;
        color: #687389 !important;
        font-size: 13px !important;
        font-weight: 400 !important;
        line-height: 1.5 !important;
    }

    /* ADD BUTTON */

    .add-city-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 40px;
        padding: 0 16px;
        background: #071b3d;
        color: #ffffff !important;
        border-radius: 8px;
        text-decoration: none;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
        transition: all .2s ease;
    }

    .add-city-btn:hover {
        background: #0d2c60;
        color: #ffffff !important;
        transform: translateY(-1px);
    }

    /* ALERT */

    .cities-alert {
        display: flex;
        align-items: center;
        width: 100%;
        min-height: 44px;
        margin: 0 0 18px;
        padding: 11px 15px;
        box-sizing: border-box;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 600;
    }

    .cities-alert-success {
        background: #ecfdf3;
        border: 1px solid #b7ebc6;
        color: #18794e;
    }

    /* CARD */

    .cities-card {
        width: 100%;
        max-width: 100%;
        min-width: 0;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background: #ffffff;
        border: 1px solid #e5eaf1;
        border-radius: 14px;
        overflow: hidden;
        box-shadow:
            0 4px 15px rgba(7, 27, 61, 0.04),
            0 12px 35px rgba(7, 27, 61, 0.04);
    }

    /* TABLE SCROLL */

    .cities-table-scroll {
        width: 100%;
        max-width: 100%;
        min-width: 0;
        overflow-x: auto;
        overflow-y: auto;
        max-height: calc(100vh - 210px);
        scrollbar-width: thin;
        -webkit-overflow-scrolling: touch;
    }

    .cities-table-scroll::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    .cities-table-scroll::-webkit-scrollbar-track {
        background: #f3f5f8;
    }

    .cities-table-scroll::-webkit-scrollbar-thumb {
        background: #c3cbd7;
        border-radius: 20px;
    }

    .cities-table-scroll::-webkit-scrollbar-thumb:hover {
        background: #9fa9b8;
    }

    /* TABLE */

    .cities-table {
        width: 100%;
        min-width: 900px;
        border-collapse: separate;
        border-spacing: 0;
        table-layout: fixed;
        background: #ffffff;
    }

    .cities-table thead {
        background: #f3f6fa;
    }

    .cities-table thead th {
        height: 52px;
        padding: 0 14px;
        background: #f3f6fa;
        color: #071b3d !important;
        font-size: 11px !important;
        font-weight: 700 !important;
        line-height: 1 !important;
        text-align: left;
        text-transform: uppercase;
        letter-spacing: .35px;
        white-space: nowrap;
        border-bottom: 1px solid #e0e6ee;
        vertical-align: middle;
    }

    .cities-table tbody tr {
        background: #ffffff;
        transition: background-color .2s ease;
    }

    .cities-table tbody tr:hover {
        background: #fafbfd;
    }

    .cities-table tbody td {
        height: 72px;
        padding: 12px 14px;
        color: #4f5d72;
        font-size: 12px;
        font-weight: 400;
        line-height: 1.45;
        border-bottom: 1px solid #edf0f4;
        vertical-align: middle;
    }

    .cities-table tbody tr:last-child td {
        border-bottom: 0;
    }

    /* COLUMN WIDTHS */

    .cities-table th:nth-child(1),
    .cities-table td:nth-child(1) {
        width: 70px;
        text-align: center;
    }

    .cities-table th:nth-child(2),
    .cities-table td:nth-child(2) {
        width: 220px;
    }

    .cities-table th:nth-child(3),
    .cities-table td:nth-child(3) {
        width: 220px;
    }

    .cities-table th:nth-child(4),
    .cities-table td:nth-child(4) {
        width: 150px;
    }

    .cities-table th:nth-child(5),
    .cities-table td:nth-child(5) {
        width: 130px;
        text-align: center;
    }

    .cities-table th:nth-child(6),
    .cities-table td:nth-child(6) {
        width: 130px;
        text-align: center;
    }

    .cities-table th:nth-child(7),
    .cities-table td:nth-child(7) {
        width: 100px;
        text-align: center;
    }

    .cities-table th:nth-child(8),
    .cities-table td:nth-child(8) {
        width: 180px;
        text-align: center;
    }

    /* NUMBER */

    .city-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        background: #f5f7fa;
        border-radius: 7px;
        color: #687389;
        font-size: 11px;
        font-weight: 600;
    }

    /* CITY */

    .city-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .city-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        background: #eef3ff;
        border-radius: 9px;
        color: #3157a6;
        font-size: 18px;
    }

    .city-info {
        min-width: 0;
    }

    .city-name {
        margin: 0;
        color: #071b3d !important;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.35;
    }

    .city-slug {
        margin-top: 3px;
        color: #8a94a6;
        font-size: 10px;
    }

    /* ICON KEY */

    .icon-key {
        color: #687389;
        font-size: 11px;
    }

    /* BADGES */

    .city-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 75px;
        min-height: 30px;
        padding: 0 11px;
        border-radius: 7px;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .city-popular {
        background: #fff7e6;
        color: #b7791f !important;
    }

    .city-not-popular {
        background: #f1f3f5;
        color: #687389 !important;
    }

    .city-active {
        background: #ecfdf3;
        color: #18794e !important;
    }

    .city-inactive {
        background: #fff1f2;
        color: #e52229 !important;
    }

    /* ACTIONS */

    .city-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .city-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        padding: 0;
        border: 1px solid #e5eaf1;
        border-radius: 8px;
        text-decoration: none;
        cursor: pointer;
        font-size: 15px;
        transition: all .2s ease;
    }

    .city-action:hover {
        transform: translateY(-1px);
    }

    .city-edit {
        color: #b7791f !important;
        background: #fff7e6;
    }

    .city-edit:hover {
        background: #b7791f;
        color: #ffffff !important;
    }

    .city-delete {
        color: #e52229 !important;
        background: #fff1f2;
    }

    .city-delete:hover {
        background: #e52229;
        color: #ffffff !important;
    }

    .city-action-form {
        display: inline-block;
        margin: 0;
        padding: 0;
    }

    /* EMPTY */

    .cities-empty {
        height: 180px;
        text-align: center !important;
        vertical-align: middle !important;
        color: #8a94a6 !important;
    }

    .cities-empty-title {
        margin: 10px 0 6px;
        color: #687389;
        font-size: 14px;
        font-weight: 600;
    }

    .cities-empty-text {
        margin: 0;
        color: #8a94a6;
        font-size: 11px;
    }

    /* RESPONSIVE */

    @media (max-width: 991px) {

        .cities-main {
            padding: 20px 15px 30px;
        }

        .cities-table-scroll {
            max-height: calc(100vh - 180px);
        }
    }

    @media (max-width: 576px) {

        .cities-main {
            padding: 16px 10px 25px;
        }

        .cities-title {
            font-size: 20px !important;
        }

        .cities-subtitle {
            font-size: 11px !important;
        }

        .cities-header {
            flex-direction: column;
        }

        .add-city-btn {
            width: 100%;
        }

        .cities-table {
            min-width: 900px;
        }
    }
</style>


<div class="cities-page">

    <div class="cities-main">

        {{-- PAGE HEADER --}}

        <div class="cities-header">

            <div>

                <h3 class="cities-title">
                    City Management
                </h3>

                <p class="cities-subtitle">
                    Manage cities available on the website
                </p>

            </div>

            <a
                href="{{ route('admin.cities.create') }}"
                class="add-city-btn"
            >

                <i class="ti ti-plus me-1"></i>

                Add City

            </a>

        </div>


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="cities-alert cities-alert-success">

                <i class="ti ti-circle-check me-2"></i>

                {{ session('success') }}

            </div>

        @endif


        {{-- TABLE --}}

        <div class="cities-card">

            <div class="cities-table-scroll">

                <table class="cities-table">

                    <thead>

                        <tr>

                            <th>S.No</th>

                            <th>City</th>

                            <th>Slug</th>

                            <th>Icon</th>

                            <th>Popular</th>

                            <th>Status</th>

                            <th>Order</th>

                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($cities as $city)

                            <tr>

                                {{-- S.NO --}}

                                <td>

                                    <span class="city-number">

                                        {{ $loop->iteration }}

                                    </span>

                                </td>


                                {{-- CITY --}}

                                <td>

                                    <div class="city-wrapper">

                                        <div class="city-icon">

                                            <i class="{{ config('city_icons.' . $city->icon) }}"></i>

                                        </div>

                                        <div class="city-info">

                                            <div class="city-name">

                                                {{ $city->name }}

                                            </div>

                                        </div>

                                    </div>

                                </td>


                                {{-- SLUG --}}

                                <td>

                                    <span class="city-slug">

                                        {{ $city->slug }}

                                    </span>

                                </td>


                                {{-- ICON --}}

                                <td>

                                    <i class="{{ config('city_icons.' . $city->icon) }} me-2"
                                       style="font-size:18px; color:#3157a6;">
                                    </i>

                                    <span class="icon-key">

                                        {{ $city->icon }}

                                    </span>

                                </td>


                                {{-- POPULAR --}}

                                <td>

                                    @if($city->is_popular)

                                        <span class="city-badge city-popular">

                                            Popular

                                        </span>

                                    @else

                                        <span class="city-badge city-not-popular">

                                            No

                                        </span>

                                    @endif

                                </td>


                                {{-- STATUS --}}

                                <td>

                                    @if($city->status)

                                        <span class="city-badge city-active">

                                            Active

                                        </span>

                                    @else

                                        <span class="city-badge city-inactive">

                                            Inactive

                                        </span>

                                    @endif

                                </td>


                                {{-- ORDER --}}

                                <td>

                                    {{ $city->sort_order }}

                                </td>


                                {{-- ACTIONS --}}

                                <td>

                                    <div class="city-actions">

                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route('admin.cities.edit', $city->id) }}"
                                            class="city-action city-edit"
                                            title="Edit City"
                                            aria-label="Edit City"
                                        >

                                            <i class="ti ti-edit"></i>

                                        </a>


                                        {{-- DELETE --}}

                                        <form
                                            action="{{ route('admin.cities.destroy', $city->id) }}"
                                            method="POST"
                                            class="city-action-form"
                                            onsubmit="return confirm('Are you sure you want to delete this city?');"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="city-action city-delete"
                                                title="Delete City"
                                                aria-label="Delete City"
                                            >

                                                <i class="ti ti-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="cities-empty"
                                >

                                    <i
                                        class="ti ti-building-off"
                                        style="font-size:40px;"
                                    ></i>

                                    <div class="cities-empty-title">

                                        No Cities Found

                                    </div>

                                    <p class="cities-empty-text">

                                        No cities have been added yet.

                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const sidebar =
        document.getElementById('sidebar');

    const citiesPage =
        document.querySelector('.cities-page');

    if (!sidebar || !citiesPage) {
        return;
    }

    function syncCitiesPageWithSidebar() {

        if (window.innerWidth <= 991) {

            citiesPage.style.marginLeft = '0px';

            citiesPage.style.width = '100%';

            return;
        }

        const sidebarWidth =
            Math.round(
                sidebar.getBoundingClientRect().width
            );

        citiesPage.style.marginLeft =
            sidebarWidth + 'px';

        citiesPage.style.width =
            'calc(100% - ' +
            sidebarWidth +
            'px)';
    }

    syncCitiesPageWithSidebar();

    if (typeof ResizeObserver !== 'undefined') {

        const observer =
            new ResizeObserver(function () {

                syncCitiesPageWithSidebar();

            });

        observer.observe(sidebar);
    }

    window.addEventListener('resize', function () {

        syncCitiesPageWithSidebar();

    });

});

</script>

@endsection