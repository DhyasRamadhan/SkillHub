@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Kelas</h2>
        <a href="{{ route('kelas.create') }}" class="btn btn-success">Tambah Kelas</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kelas</th>
                <th>Pengajar</th>
                <th>Deskripsi</th>
                <th>Durasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $k)
                <tr>
                    <td>{{ $k->id }}</td>
                    <td>{{ $k->nama_kelas }}</td>
                    <td>{{ $k->pengajar }}</td>
                    <td>{{ $k->deskripsi }}</td>
                    <td>{{ $k->durasi }}</td>
                    <td>
                        <a href="{{ route('kelas.show', $k->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus kelas?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
