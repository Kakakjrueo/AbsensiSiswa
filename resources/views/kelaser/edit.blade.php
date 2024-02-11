@extends('component.utama')

@section('title')
    Edit Kelas
@endsection

@section('penanda')
    Edit Kelas
@endsection

@section('content')
    <div class="col-12 col-md-3 mb-2">
        <a href="{{ route('kelaser.index') }}" class="btn icon icon-left btn-primary"> Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form class="form" action="{{ route('kelaser.update', $kelaser->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="first-name-column">Kelas</label>
                            <input type="text" name="namlas" value="{{ $kelaser->namlas }}" class="form-control">
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
