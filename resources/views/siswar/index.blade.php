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
            <button class='btn btn-success' type="button" data-bs-toggle="modal"
                data-bs-target="#ImportSiswa">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M12 11l0 6" /><path d="M9 14l6 0" /></svg>
                <span>Import </span>
            </button>
    </div>

    <div class="modal fade" id="ImportSiswa" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalCenterTitle">Import</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ol class="mb-2">
                        <li>
                            <b>Pastikan</b> jumlah kolom file excel yang kamu upload sama dengan yang ada di 
                            <i>database</i>
                        </li>
                        <li><b>Pastikan </b> Tidak ada data duplikat</li>
                        <li>Unduh Template excel
                            <a href="{{ asset('contoh_import/contoh_siswa.xlsx') }}">Disini</a>
                        </li>
                    </ol>
                    <form action="/siswa-import" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" accept=".xlsx, .xls">
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button  class="btn btn-success">Import</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card pt-2">
        <form action="/filterByKelas" method="post">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="country-floating">Pilih Kelas</label>
                    <div class="row gap-2">
                        <div class="col-md">
                            <select class="form-select" name="kelaser_id">
                                @foreach ($kelasers as $kelaser)
                                    <option value="{{ $kelaser->id }}"{{ session('kelaser_id') == $kelaser->id ? 'selected' : '' }}>
                                        {{ $kelaser->namlas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 d-grid">
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
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @endif
        
        <div class="card-body px-0 py-0">
            <div class="table-responsive">
                <table class='table table-striped' id="example">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Nis</th>
                            <th>Nisn</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswars as $siswar)
                                <tr>
                                    <td> {{ $loop->iteration }}</td>
                                    <td> {{ $siswar->nama }}</td>
                                    <td> {{ $siswar->jenkel }} </td>
                                    <td> {{ $siswar->nis }}</td>
                                    <td> {{ $siswar->nisn }}</td>
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
    </div>
@endsection
