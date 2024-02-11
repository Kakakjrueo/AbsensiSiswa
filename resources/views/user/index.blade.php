@extends('component.utama')

@section('title')
    Data User
@endsection

@section('penanda')
    Data User
@endsection

@section('content')
    <div class="col-12 col-md-3 mb-2">
        <a href="{{ route('user.create') }}" class="btn icon icon-left btn-primary">Tambah Data</a>
    </div>
    <div class="card">
        <div class="card-header">
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class='table table-striped' id="example">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Mapel</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->count() > 0)
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->mapel }}</< /td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
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
    </div>
@endsection
