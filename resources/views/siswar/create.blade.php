@extends('component.utama')

@section('title')
    Tambah Siswa
@endsection

@section('penanda')
    Tambah Siswa
@endsection

@section('content')
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
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Siswa">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="last-name-column">Nis</label>
                            <input type="number" class="form-control" placeholder="Masukkan Nis" name="nis">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="country-floating">Jenis Kelamin</label>
                            <select class="form-select" name="jenkel">
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="country-floating">Kelas</label>
                            <select class="form-control" name="kelaser_id">
                                @foreach ($kelasers as $kelaser)
                                    <option value="{{ $kelaser->id }}">{{ $kelaser->namlas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md col-12">
                        <div class="form-group">
                            <label for="first-name-column">Nisn</label>
                            <input type="number" name="nisn" class="form-control" placeholder="Masukkan Nisn">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
