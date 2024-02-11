@extends('component.utama')

@section('title')
    Data Kelas
@endsection

@section('penanda')
    Data Kelas
@endsection

@section('content')
    <div class="col-12 col-md-3 mb-2">
        <a href="{{ route('kelaser.create') }}" class="btn icon icon-left btn-primary">Tambah
            Data</a>
    </div>

    <div class="card">
        <div class="card-header">

            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>


        <div class="table-responsive">
            <table class='table table-striped' id="example">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Nama kelas</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelasers as $kelaser)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td>
                                    {{ $kelaser->namlas }}
                                </td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('kelaser.destroy', $kelaser->id) }}" method="POST">
                                        <a href="{{ route('kelaser.edit', $kelaser->id) }}" class="btn btn-primary">Edit</a>
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
