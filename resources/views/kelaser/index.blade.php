<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Data Kelas - Aplikasi Absensi Siswa </title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/LogoCN.png') }}" type="image/x-icon">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
</head>

<body>
    <div id="app">

        @include('include.sidebar')

        <div id="main" class="main d-flex flex-column">

            @include('include.navbar')
            <div class="main-content container-fluid mb-auto">
                <div class="page-title">
                    <h3>Data Kelas</h3>
                </div>
                <section class="section">
                    <div class="row mb-2">
                        <div class="col-12 col-md-3 mb-2">
                            <a href="{{ route('kelaser.create') }}" class="btn icon icon-left btn-primary">Tambah
                                Data</a>
                        </div>

                        <div class="card">
                            <div class="card-header">

                                @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                            </div>


                            <div class="table-responsive">
                                <table class='table table-striped' id="example">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>Nama kelas</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($kelasers->count() > 0)
                                            @foreach ($kelasers as $kelaser)
                                                <tr>
                                                    <td> {{ $loop->iteration }}</td>
                                                    <td>
                                                        {{ $kelaser->namlas }}
                                                    </td>
                                                    <td>
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('kelaser.destroy', $kelaser->id) }}"
                                                            method="POST">
                                                            <a href="{{ route('kelaser.edit', $kelaser->id) }}"
                                                                class="btn btn-primary">Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">HAPUS</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">Isi goblok jangan diapus doang
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </section>
            </div>

            @include('include.footer')
        </div>
    </div>
    @include('include.script')
