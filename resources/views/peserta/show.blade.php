@extends('layouts.app')

@section('content')
    <h2>Detail Peserta</h2>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Nama:</strong> {{ $peserta->nama }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $peserta->email }}</li>
        <li class="list-group-item"><strong>Telepon:</strong> {{ $peserta->telepon }}</li>
    </ul>

    <h4>Kelas yang diikuti</h4>
    <ul class="list-group mb-3">
        @foreach ($peserta->kelas as $kelas)
            <li class="list-group-item">
                {{ $kelas->nama_kelas }} ({{ $kelas->durasi }}) - Daftar: {{ $kelas->pivot->tanggal_daftar }}
            </li>
        @endforeach
    </ul>

    <a href="{{ route('peserta.index') }}" class="btn btn-outline-secondary">
        ← Kembali
    </a>
@endsection
