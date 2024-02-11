@extends('component.utama')

@section('title')
    Edit Absensi
@endsection

@section('penanda')
    Edit Absensi
@endsection

@section('content')
    <div class="col-12 col-md-3 mb-2">
        <a href="{{ route('absensir.index') }}" class="btn icon icon-left btn-primary"> Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form class="form" action="{{ route('absensir.update', $absensir->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <select name="keterangan" class="choices form-select">
                                @foreach (['hadir', 'sakit', 'izin', 'alpa'] as $option)
                                    <option value="{{ $option }}"
                                        {{ $absensir->keterangan == $option ? 'selected' : '' }}>
                                        {{ ucfirst($option) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Guru Pengajar</label>
                            <select name="user_id" class="choices form-select">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @if ($absensir->user_id == $user->id) selected @endif>
                                        {{ $user->name }}
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
