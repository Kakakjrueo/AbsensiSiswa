@extends('component.utama')

@section('title')
    Absensi Kelas
@endsection

@section('penanda')
    Absensi Kelas
@endsection

@section('content')
    <div class="row justify-content-start align-items-center g-3">
        @foreach ($kelasers as $kelaser)
            <div class="col-sm-3">
                <form action="/PilihKelas" method="POST" class="card bg-blur text-decoration-none">
                    @csrf
                    <input type="hidden" name="kelaser_id" value="{{ $kelaser->id }}">
                    <div class="card-body text-center">
                        <h1>{{ $kelaser->namlas }}</h1>
                    </div>
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
