@extends('layouts.app')

@section('content')
    <h2>Daftar Kelas untuk {{ $peserta->nama }}</h2>

    <form action="{{ route('peserta.simpan.kelas', $peserta->id) }}" method="POST">
        @csrf

        @foreach ($kelas as $k)
            <div class="row align-items-center mb-2">
                <div class="col-1 text-center">
                    <input type="checkbox" name="kelas_ids[]" value="{{ $k->id }}" class="form-check-input"
                        {{ $peserta->kelas->contains($k->id) ? 'checked' : '' }}>
                </div>

                <div class="col-11">
                    <label class="form-check-label fw-semibold">
                        {{ $k->nama_kelas }}
                    </label>
                    <div class="text-muted">
                        Durasi: {{ $k->durasi }}
                    </div>
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Simpan Pendaftaran</button>
        <a href="{{ route('peserta.index') }}" class="btn btn-outline-secondary mt-3">
            ← Kembali
        </a>
    </form>
@endsection
