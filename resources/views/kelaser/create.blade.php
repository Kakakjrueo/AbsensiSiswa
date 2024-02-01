<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tambah Kelas - Aplikasi Absensi Siswa </title>
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
            <div class="main-content container-fluid mb-auto ">
                <div class="page-title">
                    <h3>Tambah kelas</h3>
                </div>

                <section class="section">
                    <div class="row mb-2">
                        <div class="col-12 col-md-3 mb-2">
                            <a href="{{ route('kelaser.index') }}" class="btn icon icon-left btn-primary"> Kembali</a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form class="form" action="{{ route('kelaser.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="first-name-column">Namlas</label>
                                                <input type="text" name="namlas" class="form-control"
                                                    placeholder="Namlas">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>              
                        </div>
                    </div>
                </section>
            </div>
            @include('include.footer')
        </div>
    </div>
    @include('include.script')