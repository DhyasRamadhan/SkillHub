@extends('layouts.app')

@section('content')
    <h2>Daftar Kelas untuk {{ $peserta->nama }}</h2>

    <form action="{{ route('peserta.simpan.kelas', $peserta->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            @foreach ($kelas as $k)
                <div class="form-check">
                    <input type="checkbox" name="kelas_ids[]" value="{{ $k->id }}" class="form-check-input"
                        {{ $peserta->kelas->contains($k->id) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $k->nama_kelas }} ({{ $k->durasi }})</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Simpan Pendaftaran</button>
    </form>

    <a href="{{ route('peserta.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
