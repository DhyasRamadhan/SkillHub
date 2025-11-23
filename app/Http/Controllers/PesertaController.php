<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Kelas;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = Peserta::all();
        return view('peserta.index', compact('pesertas'));
    }

    public function create()
    {
        return view('peserta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pesertas,email',
            'telepon' => 'nullable',
        ]);
        Peserta::create($request->all());
        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil ditambahkan');
    }

    public function show(Peserta $peserta)
    {
        $peserta->load('kelas');
        return view('peserta.show', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        return view('peserta.edit', compact('peserta'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pesertas,email,' . $peserta->id,
        ]);
        $peserta->update($request->all());
        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil diupdate');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();
        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil dihapus');
    }

    public function daftarKelas(Peserta $peserta)
    {
        $kelas = Kelas::all();
        return view('peserta.daftar_kelas', compact('peserta', 'kelas'));
    }

    public function simpanDaftarKelas(Request $request, Peserta $peserta)
    {
        $peserta->kelas()->sync($request->kelas_ids);
        return redirect()->route('peserta.show', $peserta->id)->with('success', 'Kelas berhasil diperbarui');
    }
}
