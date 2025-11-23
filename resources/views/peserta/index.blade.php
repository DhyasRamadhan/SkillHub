@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Peserta</h2>
        <a href="{{ route('peserta.create') }}" class="btn btn-success">Tambah Peserta</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Kelas Diikuti</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesertas as $peserta)
                <tr>
                    <td>{{ $peserta->id }}</td>
                    <td>{{ $peserta->nama }}</td>
                    <td>{{ $peserta->email }}</td>
                    <td>{{ $peserta->telepon }}</td>
                    <td>
                        @forelse ($peserta->kelas as $kelas)
                            <span class="badge bg-primary">{{ $kelas->nama_kelas }}</span>
                        @empty
                            <em>-</em>
                        @endforelse
                    </td>
                    <td>
                        <a href="{{ route('peserta.show', $peserta->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('peserta.destroy', $peserta->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus peserta?')">Hapus</button>
                        </form>
                        <a href="{{ route('peserta.daftar.kelas', $peserta->id) }}" class="btn btn-secondary btn-sm">Daftar
                            Kelas</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
