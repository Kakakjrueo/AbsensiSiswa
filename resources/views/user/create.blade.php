@extends('component.utama')

@section('title')
    Tambah User
@endsection

@section('penanda')
    Tambah User
@endsection

@section('content')
    <div class="col-12 col-md-3 mb-2">
        <a href="{{ route('user.index') }}" class="btn icon icon-left btn-primary">Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form class="form" action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="first-name-column">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="last-name-column">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="city-column">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                       <div class="form-group">
                            <label for="country-floating">Role</label>
                            <select class="form-select" name="role">
                                <option value="Pilih Role">Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="walas">Walas</option>
                                <option value="guru">Guru</option>
                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                         <div class="form-group">
                            <label for="last-name-column">Mapel</label>
                            <input type="text" class="form-control" placeholder="Masukkan Mapel" name="mapel">
                            @error('mapel')
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
