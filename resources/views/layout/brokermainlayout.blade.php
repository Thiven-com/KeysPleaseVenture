<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0">

    <meta name="description" content="KeysPleaseVenture">
    <meta name="keywords" content="KeysPleaseVenture">
    <meta name="author" content="KeysPleaseVenture">
    <meta name="robots" content="noindex, nofollow">

    <title>{{ $site->site_name ?? 'Broker Panel' }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon"
          type="image/x-icon"
          href="{{ asset('website/images/logo.png') }}">

    @include('layout.broker.brokerhead')
</head>

@php
    /*
    |--------------------------------------------------------------------------
    | Broker Authentication Pages
    |--------------------------------------------------------------------------
    */

    $isBrokerAuthPage = request()->routeIs(
        'broker.login',
        'broker.register',
        'broker.password.*'
    );
@endphp

<body class="{{ $isBrokerAuthPage ? 'account-page bg-white' : '' }}">

    @component('components.loader')
    @endcomponent

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        @if (!$isBrokerAuthPage)

            <!-- Header -->
            @include('layout.broker.brokerheader')

            <!-- Broker Sidebar -->
            @include('layout.broker.brokersidebar')

            @include('layout.broker.brokercollapsed-sidebar')

            @include('layout.broker.brokerhorizontal-sidebar')

        @endif

        <!-- Page Content -->
        @yield('content')

    </div>
    <!-- /Main Wrapper -->

    @component('components.modalpopup')
    @endcomponent

    @include('layout.broker.brokerfooter-scripts')

    @include('sweetalert::alert')

</body>

</html>