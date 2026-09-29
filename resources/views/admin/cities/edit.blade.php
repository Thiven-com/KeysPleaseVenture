@extends('layout.mainlayout')

@section('content')

<style>
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

    .city-create-header {
        margin-bottom: 24px;
    }

    .city-create-title {
        margin: 0;
        color: #071b3d;
        font-size: 25px;
        font-weight: 700;
    }

    .city-create-subtitle {
        margin: 5px 0 0;
        color: #687389;
        font-size: 13px;
    }

    .city-create-card {
        background: #fff;
        border: 1px solid #e5eaf1;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(7, 27, 61, 0.05);
        overflow: hidden;
    }

    .city-create-form {
        width: 100%;
    }

    .city-form-section {
        padding: 28px 30px;
        border-bottom: 1px solid #edf0f5;
    }

    .city-form-section-header {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 24px;
    }

    .city-form-section-icon {
        width: 40px;
        height: 40px;
        min-width: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eef2f8;
        color: #071b3d;
        border-radius: 8px;
        font-size: 19px;
    }

    .city-form-section-title {
        margin: 0;
        color: #071b3d;
        font-size: 17px;
        font-weight: 700;
    }

    .city-form-section-subtitle {
        margin: 4px 0 0;
        color: #687389;
        font-size: 12px;
    }

    .city-form-row {
        display: grid;
        grid-template-columns: repeat(12, minmax(0, 1fr));
        gap: 18px;
    }

    .city-col-6 {
        grid-column: span 6;
    }

    .city-col-12 {
        grid-column: span 12;
    }

    .city-form-group {
        margin-bottom: 0;
    }

    .city-form-label {
        display: block;
        margin-bottom: 8px;
        color: #071b3d;
        font-size: 13px;
        font-weight: 600;
    }

    .city-form-control,
    .city-form-select {
        width: 100%;
        height: 44px;
        padding: 0 13px;
        border: 1px solid #dfe4ec;
        border-radius: 8px;
        background: #fff;
        color: #071b3d;
        font-size: 13px;
        outline: none;
        box-sizing: border-box;
    }

    .city-form-control:focus,
    .city-form-select:focus {
        border-color: #071b3d;
        box-shadow: 0 0 0 3px rgba(7, 27, 61, 0.06);
    }

    .city-checkbox-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 44px;
    }

    .city-checkbox {
        width: 17px;
        height: 17px;
        accent-color: #071b3d;
    }

    .city-checkbox-label {
        color: #071b3d;
        font-size: 13px;
        font-weight: 600;
        margin: 0;
    }

    .city-create-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 12px;
        padding: 22px 30px;
        background: #fafbfd;
    }

    .city-btn-cancel,
    .city-btn-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 42px;
        padding: 0 18px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        border: 0;
        cursor: pointer;
    }

    .city-btn-cancel {
        color: #071b3d;
        background: #fff;
        border: 1px solid #dfe4ec;
    }

    .city-btn-submit {
        color: #fff;
        background: #071b3d;
    }

    .city-btn-cancel:hover,
    .city-btn-submit:hover {
        opacity: 0.92;
    }

    @media (max-width: 767px) {
        .city-create-main {
            padding: 22px 16px 30px;
        }

        .city-form-section {
            padding: 22px 18px;
        }

        .city-col-6 {
            grid-column: span 12;
        }

        .city-create-actions {
            padding: 18px;
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .city-btn-cancel,
        .city-btn-submit {
            width: 100%;
        }
    }
</style>

<div class="city-create-page">

    <div class="city-create-main">

        <div class="city-create-header">

            <h3 class="city-create-title">
                Edit City
            </h3>

            <p class="city-create-subtitle">
                Update city information from the admin portal.
            </p>

        </div>

        @if ($errors->any())

            <div class="alert alert-danger">
                <i class="ti ti-alert-circle me-2"></i>

                <strong>Please fix the following errors:</strong>

                <ul class="mb-0 mt-1">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>
            </div>

        @endif

        <div class="city-create-card">

            <form
                action="{{ route('admin.cities.update', $city->id) }}"
                method="POST"
                class="city-create-form"
            >

                @csrf

                @method('PUT')

                {{-- Basic City Information --}}
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
                                Update the main information about this city.
                            </p>

                        </div>

                    </div>

                    <div class="city-form-row">

                        {{-- City Name --}}
                        <div class="city-col-6">

                            <div class="city-form-group">

                                <label class="city-form-label">
                                    City Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="city-form-control"
                                    value="{{ old('name', $city->name) }}"
                                    placeholder="Enter city name"
                                    required
                                >

                            </div>

                        </div>

                        {{-- Sort Order --}}
                        <div class="city-col-6">

                            <div class="city-form-group">

                                <label class="city-form-label">
                                    Sort Order
                                </label>

                                <input
                                    type="number"
                                    name="sort_order"
                                    class="city-form-control"
                                    value="{{ old('sort_order', $city->sort_order) }}"
                                    placeholder="0"
                                >

                            </div>

                        </div>

                        {{-- City Icon --}}
                        <div class="city-col-6">

                            <div class="city-form-group">

                                <label class="city-form-label">
                                    City Icon
                                </label>

                                <select
                                    name="icon"
                                    class="city-form-select"
                                    required
                                >

                                    @foreach ($icons as $key => $icon)

                                        <option
                                            value="{{ $key }}"
                                            {{ old('icon', $city->icon) == $key ? 'selected' : '' }}
                                        >
                                            {{ ucfirst($key) }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        {{-- Status --}}
                        <div class="city-col-6">

                            <div class="city-form-group">

                                <label class="city-form-label">
                                    Status
                                </label>

                                <div class="city-checkbox-wrapper">

                                    <input
                                        type="checkbox"
                                        name="status"
                                        value="1"
                                        class="city-checkbox"
                                        {{ old('status', $city->status) ? 'checked' : '' }}
                                    >

                                    <label class="city-checkbox-label">
                                        Active City
                                    </label>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- City Display Settings --}}
                <div class="city-form-section">

                    <div class="city-form-section-header">

                        <div class="city-form-section-icon">
                            <i class="ti ti-settings"></i>
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

                        {{-- Popular City --}}
                        <div class="city-col-6">

                            <div class="city-form-group">

                                <label class="city-form-label">
                                    Popular City
                                </label>

                                <div class="city-checkbox-wrapper">

                                    <input
                                        type="checkbox"
                                        name="is_popular"
                                        value="1"
                                        class="city-checkbox"
                                        {{ old('is_popular', $city->is_popular) ? 'checked' : '' }}
                                    >

                                    <label class="city-checkbox-label">
                                        Show in Popular Cities
                                    </label>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Actions --}}
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
                        Update City
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const sidebar = document.getElementById('sidebar');
    const cityCreatePage =
        document.querySelector('.city-create-page');

    if (!sidebar || !cityCreatePage) {
        return;
    }

    function syncCityCreatePageWithSidebar() {

        if (window.innerWidth <= 991) {

            cityCreatePage.style.marginLeft = '0px';
            cityCreatePage.style.width = '100%';

            return;
        }

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

    syncCityCreatePageWithSidebar();

    if (typeof ResizeObserver !== 'undefined') {

        const observer =
            new ResizeObserver(function () {

                syncCityCreatePageWithSidebar();

            });

        observer.observe(sidebar);
    }

    document.addEventListener('click', function () {

        setTimeout(function () {
            syncCityCreatePageWithSidebar();
        }, 100);

        setTimeout(function () {
            syncCityCreatePageWithSidebar();
        }, 300);

    });

    window.addEventListener('resize', function () {

        syncCityCreatePageWithSidebar();

    });

});
</script>

@endsection