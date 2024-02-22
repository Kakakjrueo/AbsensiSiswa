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
    <div class="card pt-2">
       
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
                <table class="table" id="example">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Mapel</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
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
                        @empty    
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
