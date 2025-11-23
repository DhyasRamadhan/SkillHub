@extends('layouts.app')

@section('content')
    <h2>Tambah Kelas</h2>

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pengajar</label>
            <input type="text" name="pengajar" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Durasi</label>
            <input type="text" name="durasi" class="form-control" placeholder="Contoh: 1 bulan">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-outline-secondary">
            ← Kembali
        </a>
    </form>
@endsection
