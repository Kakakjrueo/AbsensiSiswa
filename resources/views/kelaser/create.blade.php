@extends('component.utama')

@section('title')
  Tambah Kelas
@endsection

@section('penanda')
  Tambah Kelas
@endsection

@section('content')
  <div class="col-12 col-md-3 mb-2">
    <a href="{{ route('kelaser.index') }}" class="btn icon icon-left btn-primary"> Kembali</a>
  </div>
  <div class="card">
    <div class="card-body">
      <form class="form" action="{{ route('kelaser.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="first-name-column">Kelas</label>
              <input type="text" name="namlas" class="form-control" value="{{ old('namlas') }}">
              @error('namlas')
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
