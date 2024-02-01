<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tambah User - Aplikasi Absensi Siswa </title>

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
                    <h3>Tambah user</h3>
                </div>

                <section class="section">
                    <div class="row mb-2">
                        <div class="col-12 col-md-3 mb-2">
                            <a href="{{ route('user.index') }}" class="btn icon icon-left btn-primary">Kembali</a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form class="form" action="{{ route('user.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Email</label>
                                                <input type="email" class="form-control" placeholder="Email"
                                                    name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Mapel</label>
                                                <input type="text" class="form-control" placeholder="Mapel"
                                                    name="mapel">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="country-floating">Role</label>
                                                <select class="form-select" name="role">
                                                    <option value="Pilih Role">Pilih Role</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="walas">Walas</option>
                                                    <option value="guru">Guru</option>
                                                </select>
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
