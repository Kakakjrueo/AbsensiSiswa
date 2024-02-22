@extends('component.utama')

@section('title')
    Rekap Absensi
@endsection

@section('penanda')
    Rekap Absensi
@endsection

@section('content')
    <div class="card pt-2">
            <form action="/FilterRekap" method="post">
                @csrf
                <div class="row pb-3">
                    <div class="col-md-2">
                        <label for="country-floating">Guru Pengajar</label>
                        <select class="form-select" name="user_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"{{ session('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="country-floating">Pilih Kelas</label>
                        <select class="form-select" name="kelaser_id">
                            @foreach ($kelasers as $kelaser)
                                <option value="{{ $kelaser->id }}"{{ session('kelaser_id') == $kelaser->id ? 'selected' : '' }}>
                                    {{ $kelaser->namlas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Mulai</label>
                        <input type="date" name="mulai" class="form-control" value="{{ old('mulai') ?: request()->input('mulai') }}">
                    </div>
                    <div class="col-md-2">
                        <label>Akhir</label>
                        <input type="date" name="akhir" class="form-control" value="{{ old('akhir') ?: request()->input('akhir') }}">
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary mt-4 btn-sm">Tampilkan</button>
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

        <div class="card-body px-0 py-0">
            <div class="table-responsive">
                <table class="table table-striped" id="example" >
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
                        @forelse ($absensirs as $absensir)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $absensir->user->name }}</td>
                                    <td>{{ $absensir->user->mapel }}</td>
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
                                            action="{{ route('absensir.destroy', $absensir->id) }}" method="POST">
                                            <a href="{{ route('absensir.edit', $absensir->id) }}"
                                                class="btn btn-primary">Edit</a>
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
