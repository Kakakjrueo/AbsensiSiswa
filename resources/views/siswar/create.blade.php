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
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Siswa" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="last-name-column">Nis</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nis" name="nis" value="{{ old('nis') }}">
                            @error('nis')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="country-floating">Jenis Kelamin</label>
                            <select class="form-select" name="jenkel">
                                <option value="L" {{ old('jenkel') == 'L' ? 'selected' : '' }}>L</option>
                                <option value="P" {{ old('jenkel') == 'P' ? 'selected' : '' }}>P</option>
                            </select>
                            @error('jenkel')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="country-floating">Kelas</label>
                            <select class="form-select" name="kelaser_id">
                                @foreach ($kelasers as $kelaser)
                                    <option value="{{ $kelaser->id }}" {{ old('kelaser_id') == $kelaser->id ? 'selected' : '' }}>{{ $kelaser->namlas }}</option>
                                @endforeach
                            </select>
                            @error('kelaser_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md col-12">
                        <div class="form-group">
                            <label for="first-name-column">Nisn</label>
                            <input type="text" name="nisn" class="form-control" placeholder="Masukkan Nisn" value="{{ old('nisn') }}">
                            @error('nisn')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
