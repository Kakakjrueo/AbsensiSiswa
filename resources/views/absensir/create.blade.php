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
        @forelse ($siswars as $siswar)
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title-primary">#{{ $loop->iteration }} {{ $siswar->nama }}</h5>
                        <strong><hr></strong>
                        <h6 class="card-subtitle mb-2 text-muted">Nis   :{{ $siswar->nis }}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Nisn  :{{ $siswar->nisn }}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Kelas :{{ $siswar->kelaser->namlas }}</h6>
                        <form action="{{ route('absensir.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="siswar_id[]" value="{{ $siswar->id }}">
                            <input type="hidden" name="kelaser_id" value="{{ $siswar->kelaser->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="custom-radio-group" role="group" aria-label="Vertical radio toggle button group">
                                <input class="form-check-input" type="radio" name="keterangan[{{ $siswar->id }}]"
                                    id="hadir_{{ $siswar->id }}" value="hadir" {{ old('keterangan.' . $siswar->id) === 'hadir' ? 'checked' : '' }}>
                                <label class="custom-radio" for="hadir_{{ $siswar->id }}">H</label>

                                <input class="form-check-input" type="radio" name="keterangan[{{ $siswar->id }}]"
                                    id="alpa_{{ $siswar->id }}" value="alpa" {{ old('keterangan.' . $siswar->id) === 'alpa' ? 'checked' : '' }}>
                                <label class="custom-radio" for="alpa_{{ $siswar->id }}">A</label>

                                <input class="form-check-input" type="radio" name="keterangan[{{ $siswar->id }}]"
                                    id="sakit_{{ $siswar->id }}" value="sakit" {{ old('keterangan.' . $siswar->id) === 'sakit' ? 'checked' : '' }}>
                                <label class="custom-radio" for="sakit_{{ $siswar->id }}">S</label>

                                <input class="form-check-input" type="radio" name="keterangan[{{ $siswar->id }}]"
                                    id="izin_{{ $siswar->id }}" value="izin" {{ old('keterangan.' . $siswar->id) === 'izin' ? 'checked' : '' }}>
                                <label class="custom-radio" for="izin_{{ $siswar->id }}">I</label>
                            </div>
                            @error('keterangan.' . $siswar->id)
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>Tidak ada siswa yang tersedia.</p>
            </div>
        @endforelse
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        </div>
        </form>
    </div>
@endsection
