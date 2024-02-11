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
                            <input type="text" name="nama" class="form-control" placeholder="Nama Siswa"
                                value="{{ $siswar->nama }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="last-name-column">Nis</label>
                            <input type="number" class="form-control" placeholder="nis" name="nis"
                                value="{{ $siswar->nis }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="country-floating">Jenis Kelamin</label>
                            <select class="form-select" name="jenkel">
                                @foreach (['L', 'P'] as $option)
                                    <option value="{{ $option }}" {{ $siswar->jenkel == $option ? 'selected' : '' }}>
                                        {{ ucfirst($option) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="country-floating">Kelas</label>
                            <select class="form-select" name="kelaser_id">

                                @foreach ($kelasers as $kelas)
                                    <option value="{{ $kelas->id }}" @if ($siswar->kelaser_id == $kelas->id) selected @endif>
                                        {{ $kelas->namlas }}
                                    </option>
                                @endforeach

                            </select>

                        </div>
                    </div>
                    <div class="col-md col-12">
                        <div class="form-group">
                            <label for="first-name-column">Nisn</label>
                            <input type="number" name="nisn" class="form-control" placeholder="Nisn"
                                value="{{ $siswar->nisn }}">
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
