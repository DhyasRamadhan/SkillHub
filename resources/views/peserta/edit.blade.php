@extends('layouts.app')

@section('content')
    <h2>Edit Peserta</h2>

    <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $peserta->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $peserta->email }}" required>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $peserta->telepon }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-outline-secondary">
            ← Kembali
        </a>
    </form>
@endsection
