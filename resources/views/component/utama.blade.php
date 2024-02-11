<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/LogoCN.png') }}" type="image/x-icon">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    @include('component.style')
</head>

<body>
    <div id="app">
        @include('component.sidebar')
        <div id="main" class="main d-flex flex-column">
            @include('component.navbar')
            <div class="main-content container-fluid mb-auto">
                <div class="page-title">
                    <h3>@yield('penanda')</h3>
                </div>
                <section class="section">
                    <div class="row mb-2">

                        @yield('content')

                    </div>
                </section>
            </div>
            @include('component.footer')
        </div>

    </div>
    @include('component.script')
