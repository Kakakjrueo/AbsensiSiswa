<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tambah Siswa - Aplikasi Absensi Siswa </title>
    
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
                    <h3>Tambah Siswa</h3>
                </div>

                <section class="section">
                    <div class="row mb-2">
                        <div class="col-12 col-md-3 mb-2">
                            <a href="{{ route('siswar.index') }}" class="btn icon icon-left btn-primary"> Kembali</a>
                        </div>
                        <div class="card">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('siswar.store') }}" method="POST">
                                        @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Nama Siswa</label>
                                                        <input type="text" name="nama" class="form-control" placeholder="Nama Siswa">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">Nis</label>
                                                        <input type="number" class="form-control" placeholder="nis" name="nis">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="country-floating">Jenis Kelamin</label>
                                                        <select class="form-select" name="jenkel">
                                                            <option value="L">Laki Laki</option>
                                                            <option value="P">Prempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="country-floating">Kelas</label>
                                                        <select class="form-control" name="kelaser_id">
                                                            @foreach ($kelasers as $kelaser )
                                                            <option value="{{$kelaser->id}}">{{$kelaser->namlas}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Nisn</label>
                                                        <input type="number" name="nisn" class="form-control" placeholder="nisn" >
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
          
        </div>
    </div>

@include('include.script')
