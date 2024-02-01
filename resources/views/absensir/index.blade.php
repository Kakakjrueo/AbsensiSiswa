<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Absensi - Aplikasi Absensi Siswa</title>

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
                    <h3>Rekap Absensi </h3>
                </div>
                <section class="section">
                    <div class="row mb-2">
                        <div class="card">
                            <div class="mb-2">
                                <form action="/OrderById" method="post">
                                    @csrf
                                    <div class="col-md-5 ">
                                        <div class="form-group">
                                            <label for="country-floating">Pilih Kelas</label>
                                            <div class="d-flex gap-2">
                                                <select class="form-control" name="kelaser_id">
                                                    @foreach ($kelasers as $kelaser)
                                                        <option value="{{ $kelaser->id }}">{{ $kelaser->namlas }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-primary">Tampilkan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <form action="/filter" method="post">
                                    @csrf
                                    <div class="row pb-3">
                                        <div class="col-md-4" pt-4>
                                            <label>Mulai</label>
                                            <input type="date" name="mulai" class="form-control">
                                        </div>
                                        <div class="col-md-4" pt-4>
                                            <label>Akhir</label>
                                            <input type="date" name="akhir" class="form-control">
                                        </div>
                                        <div class="col-md-1 pt-4">
                                            <button type="submit" class="btn btn-primary">Tampilkan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Guru</th>
                                            <th>Mapel</th>

                                            <th>Nama Siswa</th>
                                            <th>Keterangan</th>
                                            <th>Kelas</th>
                                            <th>Tanggal Absensi</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($absensirs->count() > 0)
                                            @foreach ($absensirs as $absensir)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $absensir->user->name }}</td>
                                                    <td>{{ $absensir->user->mapel }}</td>
                                                    {{-- <td>{{ $absensir->siswar->nis }}</td> --}}
                                                    <td>{{ $absensir->siswar->nama }}</td>
                                                    <td>{{ $absensir->keterangan }}</td>
                                                    <td>{{ $absensir->kelaser->namlas }}</td>

                                                    <td>
                                                        @if ($absensir->created_at)
                                                            {{ $absensir->created_at->format('d-F-Y') }}
                                                        @else
                                                            Tidak ada tanggal
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('absensir.destroy', $absensir->id) }}"
                                                            method="POST">
                                                            <a href="{{ route('absensir.edit', $absensir->id) }}"
                                                                class="btn btn-primary">Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">HAPUS</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
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