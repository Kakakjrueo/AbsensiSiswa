@extends('component.utama')

@section('title')
    Rekap Absensi
@endsection

@section('penanda')
    Rekap Absensi
@endsection

@section('content')
    <div class="card">
        <div class="mb-2">
            <form action="/FilterRekap" method="post">
                @csrf
                <div class="row pb-3">
                    <div class="col-md-3">
                        <label for="country-floating">Pilih Kelas</label>
                        <select class="form-control" name="kelaser_id">
                            @foreach ($kelasers as $kelaser)
                                <option value="{{ $kelaser->id }}">{{ $kelaser->namlas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3" >
                        <label>Mulai</label>
                        <input type="date" name="mulai" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Akhir</label>
                        <input type="date" name="akhir" class="form-control">
                    </div>
                    <div class="col-md-3 pt-4">
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
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">Data Kosong</td>
                        </tr>    
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
