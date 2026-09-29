@extends('layout.mainlayout')

@section('content')

<style>

    /* =========================================================
       CITY CREATE PAGE
       Same layout/UI structure as Property Create
    ========================================================= */

    .city-create-page {
        position: relative;
        width: 100%;
        max-width: 100%;
        min-width: 0;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        overflow-x: hidden;
    }


    /* =========================================================
       MAIN
    ========================================================= */

    .city-create-main {
        width: 100%;
        max-width: 100%;
        min-width: 0;

        margin: 0;
        padding: 28px 30px 35px;

        box-sizing: border-box;
        overflow-x: hidden;

        margin-top: 50px;
    }


    /* =========================================================
       PAGE HEADER
    ========================================================= */

    .city-create-header {
        width: 100%;

        margin: 0 0 24px;
        padding: 0;

        box-sizing: border-box;
    }

    .city-create-title {
        margin: 0 0 6px;

        color: #071b3d !important;

        font-size: 25px !important;
        font-weight: 700 !important;

        line-height: 1.3 !important;
    }

    .city-create-subtitle {
        margin: 0;

        color: #687389 !important;

        font-size: 13px !important;
        font-weight: 400 !important;

        line-height: 1.5 !important;
    }


    /* =========================================================
       ALERT
    ========================================================= */

    .city-create-alert {
        display: flex;
        align-items: flex-start;

        width: 100%;
        min-height: 44px;

        margin: 0 0 18px;
        padding: 11px 15px;

        box-sizing: border-box;

        border-radius: 9px;

        font-size: 13px;
        font-weight: 600;
    }

    .city-create-alert-danger {
        background: #fff1f2;

        border: 1px solid #fecdd3;

        color: #e52229;
    }

    .city-create-alert-danger ul {
        margin: 8px 0 0;
        padding-left: 20px;
    }

    .city-create-alert-danger li {
        margin-bottom: 3px;

        font-size: 11px;
        font-weight: 400;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .city-create-card {
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


    /* =========================================================
       FORM
    ========================================================= */

    .city-create-form {
        width: 100%;

        margin: 0;
        padding: 0;

        box-sizing: border-box;
    }


    /* =========================================================
       FORM SECTION
    ========================================================= */

    .city-form-section {
        width: 100%;

        margin: 0;
        padding: 25px 25px 27px;

        box-sizing: border-box;

        border-bottom: 1px solid #edf0f4;
    }

    .city-form-section:last-child {
        border-bottom: 0;
    }


    /* =========================================================
       SECTION HEADER
    ========================================================= */

    .city-form-section-header {
        display: flex;

        align-items: center;

        gap: 10px;

        margin: 0 0 20px;
        padding: 0 0 13px;

        border-bottom: 1px solid #edf0f4;
    }

    .city-form-section-icon {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        width: 32px;
        height: 32px;

        flex-shrink: 0;

        background: #f3f6fa;

        border-radius: 8px;

        color: #071b3d;

        font-size: 16px;
    }

    .city-form-section-title {
        margin: 0;

        color: #071b3d !important;

        font-size: 15px !important;

        font-weight: 700 !important;

        line-height: 1.4 !important;
    }

    .city-form-section-subtitle {
        margin: 2px 0 0;

        color: #8a94a6;

        font-size: 10px;

        line-height: 1.4;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .city-form-label {
        display: block;

        margin: 0 0 7px;

        color: #071b3d !important;

        font-size: 11px;

        font-weight: 700;

        line-height: 1.4;
    }

    .city-form-required {
        color: #e52229;

        margin-left: 2px;
    }


    /* =========================================================
       INPUTS
    ========================================================= */

    .city-form-control,
    .city-form-select {

        display: block;

        width: 100%;

        min-height: 44px;

        padding: 9px 12px;

        box-sizing: border-box;

        background: #ffffff;

        border: 1px solid #dfe4eb;

        border-radius: 8px;

        color: #344158;

        font-size: 12px;

        font-weight: 400;

        outline: none;

        box-shadow: none;

        transition:
            border-color .2s ease,
            box-shadow .2s ease;
    }

    .city-form-control::placeholder {
        color: #a0a8b5;

        font-size: 11px;
    }

    .city-form-control:focus,
    .city-form-select:focus {

        border-color: #071b3d;

        box-shadow:
            0 0 0 3px rgba(7, 27, 61, .06);
    }


    /* =========================================================
       GRID
    ========================================================= */

    .city-form-row {

        display: grid;

        grid-template-columns:
            repeat(12, minmax(0, 1fr));

        gap: 18px;
    }

    .city-col-12 {
        grid-column: span 12;
    }

    .city-col-6 {
        grid-column: span 6;
    }

    .city-col-4 {
        grid-column: span 4;
    }


    /* =========================================================
       ICON PREVIEW
    ========================================================= */

    .city-icon-preview-wrapper {

        display: flex;

        align-items: center;

        gap: 12px;

        margin-top: 10px;
    }

    .city-icon-preview {

        display: inline-flex;

        align-items: center;
        justify-content: center;

        width: 44px;
        height: 44px;

        background: #eef3ff;

        border: 1px solid #dce5fa;

        border-radius: 9px;

        color: #3157a6;

        font-size: 20px;
    }

    .city-icon-preview-text {

        color: #8a94a6;

        font-size: 10px;

        line-height: 1.4;
    }


    /* =========================================================
       CHECKBOX
    ========================================================= */

    .city-checkbox-wrapper {

        display: flex;

        flex-wrap: wrap;

        gap: 10px;
    }

    .city-checkbox-item {

        position: relative;

        display: inline-flex;

        align-items: center;

        gap: 8px;

        min-height: 38px;

        padding: 0 12px;

        background: #f8f9fb;

        border: 1px solid #e2e6ec;

        border-radius: 8px;

        color: #4f5d72;

        font-size: 10px;

        font-weight: 600;

        cursor: pointer;

        transition: all .2s ease;
    }

    .city-checkbox-item:hover {

        background: #f3f6fa;

        border-color: #cbd3df;

        color: #071b3d;
    }

    .city-checkbox-item input {

        width: 14px;
        height: 14px;

        margin: 0;

        accent-color: #071b3d;

        cursor: pointer;
    }

    .city-checkbox-item:has(input:checked) {

        background: #eef3ff;

        border-color: #b9c8e8;

        color: #071b3d;
    }


    /* =========================================================
       HELP TEXT
    ========================================================= */

    .city-form-help {

        display: block;

        margin-top: 5px;

        color: #8a94a6;

        font-size: 9px;

        line-height: 1.4;
    }


    /* =========================================================
       ACTIONS
    ========================================================= */

    .city-create-actions {

        display: flex;

        align-items: center;

        justify-content: flex-end;

        gap: 10px;

        width: 100%;

        margin: 0;

        padding: 20px 25px;

        box-sizing: border-box;

        background: #ffffff;

        border-top: 1px solid #edf0f4;
    }

    .city-btn-cancel,
    .city-btn-submit {

        display: inline-flex;

        align-items: center;
        justify-content: center;

        min-height: 40px;

        padding: 0 18px;

        border-radius: 8px;

        font-size: 11px;

        font-weight: 700;

        text-decoration: none;

        cursor: pointer;

        transition: all .2s ease;
    }

    .city-btn-cancel {

        min-width: 100px;

        background: #ffffff;

        border: 1px solid #dfe4eb;

        color: #687389 !important;
    }

    .city-btn-cancel:hover {

        background: #f5f7fa;

        border-color: #cbd3df;

        color: #071b3d !important;
    }

    .city-btn-submit {

        min-width: 140px;

        background: #071b3d;

        border: 1px solid #071b3d;

        color: #ffffff !important;
    }

    .city-btn-submit:hover {

        background: #0d2c60;

        border-color: #0d2c60;

        color: #ffffff !important;

        transform: translateY(-1px);
    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 991px) {

        .city-create-main {

            padding: 20px 15px 30px;
        }

        .city-form-section {

            padding: 22px 20px 24px;
        }

        .city-create-actions {

            padding: 18px 20px;
        }

        .city-col-6 {

            grid-column: span 12;
        }

        .city-col-4 {

            grid-column: span 6;
        }
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 576px) {

        .city-create-main {

            padding: 16px 10px 25px;
        }

        .city-create-title {

            font-size: 20px !important;
        }

        .city-create-subtitle {

            font-size: 11px !important;
        }

        .city-form-section {

            padding: 20px 15px 22px;
        }

        .city-form-row {

            grid-template-columns: 1fr;

            gap: 15px;
        }

        .city-col-12,
        .city-col-6,
        .city-col-4 {

            grid-column: span 1;
        }

        .city-create-actions {

            flex-direction: column;

            padding: 16px 15px;
        }

        .city-btn-cancel,
        .city-btn-submit {

            width: 100%;
        }

        .city-checkbox-item {

            width: 100%;
        }
    }

</style>


<div class="city-create-page">

    <div class="city-create-main">


        {{-- =====================================================
        PAGE HEADER
        ====================================================== --}}

        <div class="city-create-header">

            <h3 class="city-create-title">

                Add City

            </h3>

            <p class="city-create-subtitle">

                Add and configure a city for the website.

            </p>

        </div>


        {{-- =====================================================
        VALIDATION ERRORS
        ====================================================== --}}

        @if ($errors->any())

            <div class="city-create-alert city-create-alert-danger">

                <i class="ti ti-alert-circle me-2"></i>

                <div>

                    <strong>
                        Please fix the following errors:
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        @endif


        {{-- =====================================================
        FORM CARD
        ====================================================== --}}

        <div class="city-create-card">

            <form
                action="{{ route('admin.cities.store') }}"
                method="POST"
                class="city-create-form"
            >

                @csrf


                {{-- =================================================
                BASIC CITY INFORMATION
                ================================================== --}}

                <div class="city-form-section">

                    <div class="city-form-section-header">

                        <div class="city-form-section-icon">

                            <i class="ti ti-building"></i>

                        </div>

                        <div>

                            <h5 class="city-form-section-title">

                                Basic City Information

                            </h5>

                            <p class="city-form-section-subtitle">

                                Enter the basic information for this city.

                            </p>

                        </div>

                    </div>


                    <div class="city-form-row">


                        {{-- CITY NAME --}}

                        <div class="city-col-8">

                            <label class="city-form-label">

                                City Name

                                <span class="city-form-required">*</span>

                            </label>

                            <input
                                type="text"
                                name="name"
                                class="city-form-control"
                                value="{{ old('name') }}"
                                placeholder="e.g. Bengaluru"
                                required
                            >

                        </div>


                        {{-- SORT ORDER --}}

                        <div class="city-col-4">

                            <label class="city-form-label">

                                Sort Order

                            </label>

                            <input
                                type="number"
                                name="sort_order"
                                class="city-form-control"
                                value="{{ old('sort_order', 0) }}"
                                min="0"
                                placeholder="e.g. 1"
                            >

                        </div>


                        {{-- ICON --}}

                        <div class="city-col-6">

                            <label class="city-form-label">

                                City Icon

                                <span class="city-form-required">*</span>

                            </label>

                            <select
                                name="icon"
                                id="cityIcon"
                                class="city-form-select"
                                required
                            >

                                <option value="">
                                    Select City Icon
                                </option>

                                @foreach($icons as $key => $icon)

                                    <option
                                        value="{{ $key }}"
                                        data-icon="{{ $icon }}"
                                        {{ old('icon') == $key ? 'selected' : '' }}
                                    >

                                        {{ ucfirst($key) }}

                                    </option>

                                @endforeach

                            </select>


                            <div class="city-icon-preview-wrapper">

                                <div
                                    class="city-icon-preview"
                                    id="cityIconPreview"
                                >

                                    <i class="ti ti-building"></i>

                                </div>

                                <span class="city-icon-preview-text">

                                    Selected city icon preview

                                </span>

                            </div>

                        </div>


                        {{-- STATUS --}}

                        <div class="city-col-6">

                            <label class="city-form-label">

                                City Status

                            </label>

                            <div class="city-checkbox-wrapper">

                                <label class="city-checkbox-item">

                                    <input
                                        type="checkbox"
                                        name="status"
                                        value="1"
                                        {{ old('status', true) ? 'checked' : '' }}
                                    >

                                    <i class="ti ti-circle-check"></i>

                                    <span>
                                        Active City
                                    </span>

                                </label>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                CITY DISPLAY SETTINGS
                ================================================== --}}

                <div class="city-form-section">

                    <div class="city-form-section-header">

                        <div class="city-form-section-icon">

                            <i class="ti ti-adjustments"></i>

                        </div>

                        <div>

                            <h5 class="city-form-section-title">

                                City Display Settings

                            </h5>

                            <p class="city-form-section-subtitle">

                                Control how this city appears on the website.

                            </p>

                        </div>

                    </div>


                    <div class="city-form-row">


                        {{-- POPULAR CITY --}}

                        <div class="city-col-6">

                            <label class="city-form-label">

                                Popular City

                            </label>

                            <div class="city-checkbox-wrapper">

                                <label class="city-checkbox-item">

                                    <input
                                        type="checkbox"
                                        name="is_popular"
                                        value="1"
                                        {{ old('is_popular') ? 'checked' : '' }}
                                    >

                                    <i class="ti ti-star"></i>

                                    <span>
                                        Show in Popular Cities
                                    </span>

                                </label>

                            </div>

                            <span class="city-form-help">

                                Popular cities will appear in the Popular Cities section.

                            </span>

                        </div>


                        {{-- STATUS INFO --}}

                        <div class="city-col-6">

                            <label class="city-form-label">

                                Website Visibility

                            </label>

                            <div class="city-checkbox-wrapper">

                                <label class="city-checkbox-item">

                                    <input
                                        type="checkbox"
                                        name="status"
                                        value="1"
                                        {{ old('status', true) ? 'checked' : '' }}
                                    >

                                    <i class="ti ti-eye"></i>

                                    <span>
                                        Visible on Website
                                    </span>

                                </label>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                ACTIONS
                ================================================== --}}

                <div class="city-create-actions">

                    <a
                        href="{{ route('admin.cities.index') }}"
                        class="city-btn-cancel"
                    >

                        <i class="ti ti-arrow-left me-1"></i>

                        Cancel

                    </a>


                    <button
                        type="submit"
                        class="city-btn-submit"
                    >

                        <i class="ti ti-check me-1"></i>

                        Save City

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =========================================================
       CITY ICON PREVIEW
    ========================================================= */

    const iconSelect =
        document.getElementById('cityIcon');

    const iconPreview =
        document.getElementById('cityIconPreview');


    if (iconSelect && iconPreview) {

        function updateCityIcon() {

            const selectedOption =
                iconSelect.options[
                    iconSelect.selectedIndex
                ];

            const iconClass =
                selectedOption
                    ? selectedOption.dataset.icon
                    : 'ti ti-building';


            iconPreview.innerHTML =
                '<i class="' +
                iconClass +
                '"></i>';
        }


        iconSelect.addEventListener(
            'change',
            updateCityIcon
        );


        updateCityIcon();
    }


    /* =========================================================
       SIDEBAR RESPONSIVE SYNC
    ========================================================= */

    const sidebar =
        document.getElementById('sidebar');

    const cityCreatePage =
        document.querySelector('.city-create-page');


    if (!sidebar || !cityCreatePage) {

        return;
    }


    function syncCityCreatePageWithSidebar() {


        /* MOBILE */

        if (window.innerWidth <= 991) {

            cityCreatePage.style.marginLeft =
                '0px';

            cityCreatePage.style.width =
                '100%';

            return;
        }


        /* DESKTOP */

        const sidebarWidth =
            Math.round(
                sidebar.getBoundingClientRect().width
            );


        cityCreatePage.style.marginLeft =
            sidebarWidth + 'px';


        cityCreatePage.style.width =
            'calc(100% - ' +
            sidebarWidth +
            'px)';
    }


    /* INITIAL */

    syncCityCreatePageWithSidebar();


    /* SIDEBAR RESIZE */

    if (typeof ResizeObserver !== 'undefined') {

        const observer =
            new ResizeObserver(function () {

                syncCityCreatePageWithSidebar();

            });

        observer.observe(sidebar);
    }


    /* CLICK */

    document.addEventListener('click', function () {

        setTimeout(function () {

            syncCityCreatePageWithSidebar();

        }, 100);


        setTimeout(function () {

            syncCityCreatePageWithSidebar();

        }, 300);

    });


    /* RESIZE */

    window.addEventListener('resize', function () {

        syncCityCreatePageWithSidebar();

    });

});

</script>

@endsection