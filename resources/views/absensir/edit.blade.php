<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit Absensi - Aplikasi Absensi Siswa </title>
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
                    <h3>Edit Absensi</h3>
                </div>

                <section class="section">
                    <div class="row mb-2">
                        <div class="col-12 col-md-3 mb-2">
                            <a href="{{ route('absensir.index') }}" class="btn icon icon-left btn-primary"> Kembali</a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form class="form" action="{{ route('absensir.update', $absensir->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for=""></label>
                                                <select name="keterangan" class="choices form-select">
                                                    @foreach (['hadir', 'sakit', 'izin', 'alpa'] as $option)
                                                        <option value="{{ $option }}"
                                                            {{ $absensir->keterangan == $option ? 'selected' : '' }}>
                                                            {{ ucfirst($option) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Guru Pengajar</label>
                                                <select name="user_id" class="choices form-select">
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}"
                                                            @if ($absensir->user_id == $user->id) selected @endif>
                                                            {{ $user->name }}
                                                        </option>
                                                    @endforeach
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
