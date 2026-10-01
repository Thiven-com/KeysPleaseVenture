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

    .property-types-card {
        width: 100%;
        max-width: 100%;
        min-width: 0;
        margin: 0;
        padding: 28px;
        box-sizing: border-box;
        background: #ffffff;
        border: 1px solid #e5eaf1;
        border-radius: 14px;
        overflow: hidden;
        box-shadow:
            0 4px 15px rgba(7, 27, 61, 0.04),
            0 12px 35px rgba(7, 27, 61, 0.04);
    }

    .property-type-form-row {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px;
    }

    .property-type-form-group {
        margin-bottom: 22px;
    }

    .property-type-form-label {
        display: block;
        margin: 0 0 8px;
        color: #071b3d !important;
        font-size: 12px;
        font-weight: 700;
        line-height: 1.4;
    }

    .property-type-required {
        color: #e52229;
    }

    .property-type-form-control {
        width: 100%;
        height: 44px;
        padding: 0 13px;
        box-sizing: border-box;
        border: 1px solid #dfe4eb;
        border-radius: 8px;
        background: #ffffff;
        color: #071b3d;
        font-size: 12px;
        font-weight: 400;
        outline: none;
        transition: all .2s ease;
    }

    .property-type-form-control::placeholder {
        color: #9aa3b2;
    }

    .property-type-form-control:focus {
        border-color: #071b3d;
        box-shadow: 0 0 0 3px rgba(7, 27, 61, 0.06);
    }

    .property-type-status-box {
        min-height: 44px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .property-type-status-checkbox {
        width: 17px;
        height: 17px;
        margin: 0;
        cursor: pointer;
        accent-color: #071b3d;
    }

    .property-type-status-label {
        margin: 0;
        color: #4f5d72;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
    }

    .property-type-form-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 8px;
        padding-top: 22px;
        border-top: 1px solid #edf0f4;
    }

    .property-type-save-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 40px;
        padding: 0 18px;
        border: 0;
        border-radius: 8px;
        background: #071b3d;
        color: #ffffff !important;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
        transition: all .2s ease;
    }

    .property-type-save-btn:hover {
        background: #0d2c60;
        color: #ffffff !important;
        transform: translateY(-1px);
    }

    .property-type-cancel-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 40px;
        padding: 0 18px;
        border-radius: 8px;
        background: #f3f5f8;
        color: #687389 !important;
        text-decoration: none;
        font-size: 11px;
        font-weight: 700;
        transition: all .2s ease;
    }

    .property-type-cancel-btn:hover {
        background: #e7ebf0;
        color: #071b3d !important;
    }

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

    .property-types-alert-error {
        background: #fff1f2;
        border: 1px solid #fecdd3;
        color: #e52229;
    }

    @media (max-width: 991px) {

        .property-types-main {
            padding: 20px 15px 30px;
        }

        .property-type-form-row {
            grid-template-columns: 1fr;
            gap: 0;
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

        .property-types-card {
            padding: 20px 15px;
        }

        .property-type-form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .property-type-save-btn,
        .property-type-cancel-btn {
            width: 100%;
        }
    }
</style>


<div class="property-types-page">

    <div class="property-types-main">

        {{-- PAGE HEADER --}}

        <div class="property-types-header">

            <div>

                <h3 class="property-types-title">
                    Edit Property Type
                </h3>

                <p class="property-types-subtitle">
                    Update property type details
                </p>

            </div>

        </div>


        {{-- VALIDATION ERROR --}}

        @if($errors->any())

            <div class="property-types-alert property-types-alert-error">

                <i class="ti ti-alert-circle me-2"></i>

                {{ $errors->first() }}

            </div>

        @endif


        {{-- FORM CARD --}}

        <div class="property-types-card">

            <form
                action="{{ route('admin.property-types.update', $propertyType->id) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <div class="property-type-form-row">

                    {{-- PROPERTY TYPE NAME --}}

                    <div class="property-type-form-group">

                        <label class="property-type-form-label">

                            Property Type Name

                            <span class="property-type-required">*</span>

                        </label>

                        <input
                            type="text"
                            name="name"
                            class="property-type-form-control"
                            value="{{ old('name', $propertyType->name) }}"
                            placeholder="Enter property type name"
                            required
                        >

                    </div>


                    {{-- SORT ORDER --}}

                    <div class="property-type-form-group">

                        <label class="property-type-form-label">
                            Sort Order
                        </label>

                        <input
                            type="number"
                            name="sort_order"
                            class="property-type-form-control"
                            value="{{ old('sort_order', $propertyType->sort_order) }}"
                            min="0"
                            placeholder="Enter sort order"
                        >

                    </div>

                </div>


                {{-- STATUS --}}

                <div class="property-type-form-group">

                    <label class="property-type-form-label">
                        Status
                    </label>

                    <div class="property-type-status-box">

                        <input
                            type="checkbox"
                            name="status"
                            value="1"
                            id="propertyTypeStatus"
                            class="property-type-status-checkbox"
                            {{ old('status', $propertyType->status) ? 'checked' : '' }}
                        >

                        <label
                            for="propertyTypeStatus"
                            class="property-type-status-label"
                        >
                            Active
                        </label>

                    </div>

                </div>


                {{-- ACTIONS --}}

                <div class="property-type-form-actions">

                    <button
                        type="submit"
                        class="property-type-save-btn"
                    >

                        <i class="ti ti-check me-1"></i>

                        Update Property Type

                    </button>


                    <a
                        href="{{ route('admin.property-types.index') }}"
                        class="property-type-cancel-btn"
                    >

                        <i class="ti ti-arrow-left me-1"></i>

                        Cancel

                    </a>

                </div>

            </form>

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