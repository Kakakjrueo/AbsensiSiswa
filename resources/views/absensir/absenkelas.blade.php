<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Absensi - Aplikasi Absensi Siswa </title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/LogoCN.png') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include('include.sidebar')
        <div id="main" class="main d-flex flex-column">
            @include('include.navbar')
            <div class="main-content container-fluid mb-auto">
                <div class="page-title">
                    <h3>Pilih Kelas</h3>
                </div>
                <section class="section">
                    <div class="row mb-2">
                        <div class="row justify-content-start align-items-center g-3">
                            @foreach ($kelasers as $kelaser)
                                <div class="col-sm-3">
                                    <form action="/PilihKelas" method="POST" class="card bg-blur text-decoration-none">
                                        @csrf
                                        <input type="hidden" name="kelaser_id" value="{{ $kelaser->id }}">
                                        <div class="card-body text-center">
                                            <h1>{{ $kelaser->namlas }}</h1>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            @include('include.footer')
        </div>
    </div>
    @include('include.script')