@extends('component.utama')

@section('title')
    Form Absensi
@endsection

@section('penanda')
    Form Absensi
@endsection

@section('content')
    <div class="col-12 col-md-3 mb-2">
        <a href="/AbsenKelas" class="btn btn-primary">Kembali</a>
    </div>
    <div class="row">
        @foreach ($siswars as $siswar)
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $siswar->nama }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $siswar->kelaser->namlas }}</h6>
                        <form action="{{ route('absensir.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="siswar_id[]" value="{{ $siswar->id }}">
                            @foreach ($siswar->kelaser()->get() as $namlas)
                                <input type="hidden" name="kelaser_id" value="{{ $namlas->id }}">
                            @endforeach
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="custom-radio-group" role="group" aria-label="Vertical radio toggle button group">
                                <input class="form-check-input" type="radio" name="keterangan[{{ $siswar->id }}]"
                                    id="hadir_{{ $siswar->id }}" value="hadir">
                                <label class="custom-radio" for="hadir_{{ $siswar->id }}">H</label>

                                <input class="form-check-input" type="radio" name="keterangan[{{ $siswar->id }}]"
                                    id="alpa_{{ $siswar->id }}" value="alpa">
                                <label class="custom-radio" for="alpa_{{ $siswar->id }}">A</label>

                                <input class="form-check-input" type="radio" name="keterangan[{{ $siswar->id }}]"
                                    id="sakit_{{ $siswar->id }}" value="sakit">
                                <label class="custom-radio" for="sakit_{{ $siswar->id }}">S</label>

                                <input class="form-check-input" type="radio" name="keterangan[{{ $siswar->id }}]"
                                    id="izin_{{ $siswar->id }}" value="izin">
                                <label class="custom-radio" for="izin_{{ $siswar->id }}">I</label>
                            </div>

                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        </div>
        </form>
    </div>
@endsection
