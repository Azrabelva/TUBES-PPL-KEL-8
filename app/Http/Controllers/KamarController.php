<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kos;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $data = Kamar::with('kos')->latest()->paginate(10);
        return view('kamar.index', compact('data'));
    }

    public function create()
    {
        $listKos = Kos::all();
        return view('kamar.create', compact('listKos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kos_id'     => 'required|exists:kos,id',
            'nama_kamar' => 'required|string|max:255',
            'harga'      => 'required|numeric',
            'status'     => 'required|in:tersedia,terisi',
        ]);

        Kamar::create($request->only('kos_id', 'nama_kamar', 'harga', 'status'));

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan');
    }

    public function show(Kamar $kamar)
    {
        return view('kamar.show', compact('kamar'));
    }

    public function edit(Kamar $kamar)
    {
        $listKos = Kos::all();
        return view('kamar.edit', compact('kamar', 'listKos'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'kos_id'     => 'required|exists:kos,id',
            'nama_kamar' => 'required|string|max:255',
            'harga'      => 'required|numeric',
            'status'     => 'required|in:tersedia,terisi',
        ]);

        $kamar->update($request->only('kos_id', 'nama_kamar', 'harga', 'status'));

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil diupdate');
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus');
    }
}
