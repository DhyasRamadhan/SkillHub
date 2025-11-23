@extends('layouts.app')

@section('content')
    <h2>Edit Kelas</h2>

    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" value="{{ $kelas->nama_kelas }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pengajar</label>
            <input type="text" name="pengajar" class="form-control" value="{{ $kelas->pengajar }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $kelas->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Durasi</label>
            <input type="text" name="durasi" class="form-control" value="{{ $kelas->durasi }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-outline-secondary">
            ← Kembali
        </a>
    </form>
@endsection
