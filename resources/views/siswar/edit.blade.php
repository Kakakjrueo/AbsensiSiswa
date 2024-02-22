@extends('component.utama')

@section('title')
    Edit Siswa
@endsection

@section('penanda')
    Edit Siswa
@endsection

@section('content')
    <div class="col-12 col-md-3 mb-2">
        <a href="{{ route('siswar.index') }}" class="btn icon icon-left btn-primary"> Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form class="form" action="{{ route('siswar.update', $siswar->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="first-name-column">Nama Siswa</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Siswa" value="{{ old('nama', $siswar->nama) }}">
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="last-name-column">Nis</label>
                            <input type="text" class="form-control" placeholder="nis" name="nis" value="{{ old('nis', $siswar->nis) }}">
                            @error('nis')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="country-floating">Jenis Kelamin</label>
                            <select class="form-select" name="jenkel">
                                @foreach (['L', 'P'] as $option)
                                    <option value="{{ $option }}" {{ old('jenkel', $siswar->jenkel) == $option ? 'selected' : '' }}>
                                        {{ ucfirst($option) }}
                                    </option>
                                @endforeach
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
                                @foreach ($kelasers as $kelas)
                                    <option value="{{ $kelas->id }}" @if (old('kelaser_id', $siswar->kelaser_id) == $kelas->id) selected @endif>
                                        {{ $kelas->namlas }}
                                    </option>
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
                            <input type="text" name="nisn" class="form-control" placeholder="Nisn" value="{{ old('nisn', $siswar->nisn) }}">
                            @error('nisn')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
