@extends('layout.mainlayout')

@section('content')

<style>
    .property-types-page {
        position: relative;
        width: 100%;
        max-width: 100%;
        min-width: 0;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        overflow-x: hidden;
    }

    .property-types-main {
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

    .property-types-header {
        width: 100%;
        margin: 0 0 24px;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
    }

    .property-types-title {
        margin: 0 0 6px;
        color: #071b3d !important;
        font-size: 25px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
    }

    .property-types-subtitle {
        margin: 0;
        color: #687389 !important;
        font-size: 13px !important;
        font-weight: 400 !important;
        line-height: 1.5 !important;
    }

    /* ADD BUTTON */

    .add-property-type-btn {
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

    .add-property-type-btn:hover {
        background: #0d2c60;
        color: #ffffff !important;
        transform: translateY(-1px);
    }

    /* ALERT */

    .property-types-alert {
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

    .property-types-alert-success {
        background: #ecfdf3;
        border: 1px solid #b7ebc6;
        color: #18794e;
    }

    /* CARD */

    .property-types-card {
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

    .property-types-table-scroll {
        width: 100%;
        max-width: 100%;
        min-width: 0;
        overflow-x: auto;
        overflow-y: auto;
        max-height: calc(100vh - 210px);
        scrollbar-width: thin;
        -webkit-overflow-scrolling: touch;
    }

    .property-types-table-scroll::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    .property-types-table-scroll::-webkit-scrollbar-track {
        background: #f3f5f8;
    }

    .property-types-table-scroll::-webkit-scrollbar-thumb {
        background: #c3cbd7;
        border-radius: 20px;
    }

    .property-types-table-scroll::-webkit-scrollbar-thumb:hover {
        background: #9fa9b8;
    }

    /* TABLE */

    .property-types-table {
        width: 100%;
        min-width: 850px;
        border-collapse: separate;
        border-spacing: 0;
        table-layout: fixed;
        background: #ffffff;
    }

    .property-types-table thead {
        background: #f3f6fa;
    }

    .property-types-table thead th {
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

    .property-types-table tbody tr {
        background: #ffffff;
        transition: background-color .2s ease;
    }

    .property-types-table tbody tr:hover {
        background: #fafbfd;
    }

    .property-types-table tbody td {
        height: 72px;
        padding: 12px 14px;
        color: #4f5d72;
        font-size: 12px;
        font-weight: 400;
        line-height: 1.45;
        border-bottom: 1px solid #edf0f4;
        vertical-align: middle;
    }

    .property-types-table tbody tr:last-child td {
        border-bottom: 0;
    }

    /* COLUMN WIDTHS */

    .property-types-table th:nth-child(1),
    .property-types-table td:nth-child(1) {
        width: 80px;
        text-align: center;
    }

    .property-types-table th:nth-child(2),
    .property-types-table td:nth-child(2) {
        width: 300px;
    }

    .property-types-table th:nth-child(3),
    .property-types-table td:nth-child(3) {
        width: 280px;
    }

    .property-types-table th:nth-child(4),
    .property-types-table td:nth-child(4) {
        width: 150px;
        text-align: center;
    }

    .property-types-table th:nth-child(5),
    .property-types-table td:nth-child(5) {
        width: 120px;
        text-align: center;
    }

    .property-types-table th:nth-child(6),
    .property-types-table td:nth-child(6) {
        width: 180px;
        text-align: center;
    }

    /* NUMBER */

    .property-type-number {
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

    /* PROPERTY TYPE */

    .property-type-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .property-type-icon {
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

    .property-type-info {
        min-width: 0;
    }

    .property-type-name {
        margin: 0;
        color: #071b3d !important;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.35;
    }

    /* SLUG */

    .property-type-slug {
        color: #8a94a6;
        font-size: 10px;
    }

    /* BADGES */

    .property-type-badge {
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

    .property-type-active {
        background: #ecfdf3;
        color: #18794e !important;
    }

    .property-type-inactive {
        background: #fff1f2;
        color: #e52229 !important;
    }

    /* ACTIONS */

    .property-type-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .property-type-action {
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

    .property-type-action:hover {
        transform: translateY(-1px);
    }

    .property-type-edit {
        color: #b7791f !important;
        background: #fff7e6;
    }

    .property-type-edit:hover {
        background: #b7791f;
        color: #ffffff !important;
    }

    .property-type-delete {
        color: #e52229 !important;
        background: #fff1f2;
    }

    .property-type-delete:hover {
        background: #e52229;
        color: #ffffff !important;
    }

    .property-type-action-form {
        display: inline-block;
        margin: 0;
        padding: 0;
    }

    /* EMPTY */

    .property-types-empty {
        height: 180px;
        text-align: center !important;
        vertical-align: middle !important;
        color: #8a94a6 !important;
    }

    .property-types-empty-title {
        margin: 10px 0 6px;
        color: #687389;
        font-size: 14px;
        font-weight: 600;
    }

    .property-types-empty-text {
        margin: 0;
        color: #8a94a6;
        font-size: 11px;
    }

    /* RESPONSIVE */

    @media (max-width: 991px) {

        .property-types-main {
            padding: 20px 15px 30px;
        }

        .property-types-table-scroll {
            max-height: calc(100vh - 180px);
        }
    }

    @media (max-width: 576px) {

        .property-types-main {
            padding: 16px 10px 25px;
        }

        .property-types-title {
            font-size: 20px !important;
        }

        .property-types-subtitle {
            font-size: 11px !important;
        }

        .property-types-header {
            flex-direction: column;
        }

        .add-property-type-btn {
            width: 100%;
        }

        .property-types-table {
            min-width: 850px;
        }
    }
</style>


<div class="property-types-page">

    <div class="property-types-main">

        {{-- PAGE HEADER --}}

        <div class="property-types-header">

            <div>

                <h3 class="property-types-title">
                    Property Type Management
                </h3>

                <p class="property-types-subtitle">
                    Manage property types available on the website
                </p>

            </div>

            <a
                href="{{ route('admin.property-types.create') }}"
                class="add-property-type-btn"
            >

                <i class="ti ti-plus me-1"></i>

                Add Property Type

            </a>

        </div>


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="property-types-alert property-types-alert-success">

                <i class="ti ti-circle-check me-2"></i>

                {{ session('success') }}

            </div>

        @endif


        {{-- VALIDATION ERROR --}}

        @if($errors->any())

            <div class="property-types-alert"
                 style="background:#fff1f2; border:1px solid #fecdd3; color:#e52229;">

                <i class="ti ti-alert-circle me-2"></i>

                {{ $errors->first() }}

            </div>

        @endif


        {{-- TABLE --}}

        <div class="property-types-card">

            <div class="property-types-table-scroll">

                <table class="property-types-table">

                    <thead>

                        <tr>

                            <th>
                                S.No
                            </th>

                            <th>
                                Property Type
                            </th>

                            <th>
                                Slug
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Order
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($propertyTypes as $propertyType)

                            <tr>

                                {{-- S.NO --}}

                                <td>

                                    <span class="property-type-number">
                                        {{ $loop->iteration }}
                                    </span>

                                </td>


                                {{-- PROPERTY TYPE --}}

                                <td>

                                    <div class="property-type-wrapper">

                                        <div class="property-type-icon">

                                            <i class="ti ti-building"></i>

                                        </div>

                                        <div class="property-type-info">

                                            <div class="property-type-name">

                                                {{ $propertyType->name }}

                                            </div>

                                        </div>

                                    </div>

                                </td>


                                {{-- SLUG --}}

                                <td>

                                    <span class="property-type-slug">

                                        {{ $propertyType->slug }}

                                    </span>

                                </td>


                                {{-- STATUS --}}

                                <td>

                                    @if($propertyType->status)

                                        <span class="property-type-badge property-type-active">

                                            Active

                                        </span>

                                    @else

                                        <span class="property-type-badge property-type-inactive">

                                            Inactive

                                        </span>

                                    @endif

                                </td>


                                {{-- ORDER --}}

                                <td>

                                    {{ $propertyType->sort_order }}

                                </td>


                                {{-- ACTIONS --}}

                                <td>

                                    <div class="property-type-actions">

                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route('admin.property-types.edit', $propertyType->id) }}"
                                            class="property-type-action property-type-edit"
                                            title="Edit Property Type"
                                            aria-label="Edit Property Type"
                                        >

                                            <i class="ti ti-edit"></i>

                                        </a>


                                        {{-- DELETE --}}

                                        <form
                                            action="{{ route('admin.property-types.destroy', $propertyType->id) }}"
                                            method="POST"
                                            class="property-type-action-form"
                                            onsubmit="return confirm('Are you sure you want to delete this property type?');"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="property-type-action property-type-delete"
                                                title="Delete Property Type"
                                                aria-label="Delete Property Type"
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
                                    colspan="6"
                                    class="property-types-empty"
                                >

                                    <i
                                        class="ti ti-building-off"
                                        style="font-size:40px;"
                                    ></i>

                                    <div class="property-types-empty-title">

                                        No Property Types Found

                                    </div>

                                    <p class="property-types-empty-text">

                                        No property types have been added yet.

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

    const propertyTypesPage =
        document.querySelector('.property-types-page');

    if (!sidebar || !propertyTypesPage) {
        return;
    }

    function syncPropertyTypesPageWithSidebar() {

        if (window.innerWidth <= 991) {

            propertyTypesPage.style.marginLeft = '0px';

            propertyTypesPage.style.width = '100%';

            return;
        }

        const sidebarWidth =
            Math.round(
                sidebar.getBoundingClientRect().width
            );

        propertyTypesPage.style.marginLeft =
            sidebarWidth + 'px';

        propertyTypesPage.style.width =
            'calc(100% - ' +
            sidebarWidth +
            'px)';
    }

    syncPropertyTypesPageWithSidebar();

    if (typeof ResizeObserver !== 'undefined') {

        const observer =
            new ResizeObserver(function () {

                syncPropertyTypesPageWithSidebar();

            });

        observer.observe(sidebar);

    }

    window.addEventListener('resize', function () {

        syncPropertyTypesPageWithSidebar();

    });

});

</script>

@endsection