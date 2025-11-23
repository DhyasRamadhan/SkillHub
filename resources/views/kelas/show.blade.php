@extends('layouts.app')

@section('content')
    <h2>Detail Kelas</h2>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Nama Kelas:</strong> {{ $kelas->nama_kelas }}</li>
        <li class="list-group-item"><strong>Nama Pengajar:</strong> {{ $kelas->pengajar }}</li>
        <li class="list-group-item"><strong>Deskripsi:</strong> {{ $kelas->deskripsi }}</li>
        <li class="list-group-item"><strong>Durasi:</strong> {{ $kelas->durasi }}</li>
    </ul>

    <h4>Peserta yang mengikuti kelas ini</h4>
    <ul class="list-group mb-3">
        @foreach ($kelas->peserta as $peserta)
            <li class="list-group-item">
                {{ $peserta->nama }} - Email: {{ $peserta->email }} - Telepon: {{ $peserta->telepon }}
            </li>
        @endforeach
    </ul>

    <a href="{{ route('kelas.index') }}" class="btn btn-outline-secondary">
        ← Kembali
    </a>
@endsection
