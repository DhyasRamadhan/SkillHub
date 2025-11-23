@extends('layouts.app')

@section('content')
    <h2>Tambah Peserta</h2>

    <form action="{{ route('peserta.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('peserta.index') }}" class="btn btn-outline-secondary">
            ← Kembali
        </a>
    </form>
@endsection
