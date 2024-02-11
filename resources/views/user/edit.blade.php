@extends('component.utama')

@section('title')
    Edit User
@endsection

@section('penanda')
    Edit User
@endsection

@section('content')
    <div class="col-12 col-md-3 mb-2">
        <a href="{{ route('user.index') }}" class="btn icon icon-left btn-primary"> Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form class="form" action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="first-name-column">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="last-name-column">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" name="email">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="city-column">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ $user->password }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="city-column">Mapel</label>
                            <input type="text" name="mapel" class="form-control" value="{{ $user->mapel }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="country-floating">Role</label>
                            <select class="form-select" name="role">
                                @foreach (['admin', 'guru', 'walas'] as $option)
                                    <option value="{{ $option }}" {{ $user->role == $option ? 'selected' : '' }}>
                                        {{ ucfirst($option) }}
                                    </option>
                                @endforeach
                            </select>
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
