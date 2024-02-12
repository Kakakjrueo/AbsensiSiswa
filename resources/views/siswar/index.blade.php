@extends('component.utama')

@section('title')
    Data Siswa
@endsection

@section('penanda')
    Data Siswa
@endsection

@section('content')
    <div class="col-12 col-md-3 mb-2">
        <a href="{{ route('siswar.create') }}" class="btn icon icon-left btn-primary">Tambah
            Data</a>
    </div>
    <div class="card">
        <form action="/filterByKelas" method="post">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="country-floating">Pilih Kelas</label>
                    <div class="row gap-2">
                        <div class="col-md">
                            <select class="form-select " name="kelaser_id">
                                @foreach ($kelasers as $kelaser)
                                    <option value="{{ $kelaser->id }}"{{ session('kelaser_id') == $kelaser->id ? 'selected' : '' }}>
                                        {{ $kelaser->namlas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md d-grid">
                            <button type="submit" class="btn btn-primary">Tampilkan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class='table table-striped' id="example">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Nis</th>
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswars as $siswar)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td> {{ $siswar->nis }}</td>
                                <td> {{ $siswar->nisn }}</td>
                                <td> {{ $siswar->nama }}</td>
                                <td> {{ $siswar->jenkel }} </td>
                                <td> {{ $siswar->kelaser->namlas }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('siswar.destroy', $siswar->id) }}" method="POST">
                                        <a href="{{ route('siswar.edit', $siswar->id) }}" class="btn btn-primary">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                     @empty 
                    @endforelse    
                </tbody>
            </table>
        </div>
    </div>
@endsection
