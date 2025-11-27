<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class KosController extends Controller
{
    public function index()
    {
        $data = Kos::latest()->paginate(10);
        return view('kos.index', compact('data'));
    }

    public function create()
    {
        return view('kos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'alamat'    => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Kos::create($request->only('nama', 'alamat', 'deskripsi'));

        return redirect()->route('kos.index')->with('success', 'Kos berhasil ditambahkan');
    }

    public function show(Kos $ko)
    {
        // $ko adalah single Kos
        return view('kos.show', ['kos' => $ko]);
    }

    public function edit(Kos $ko)
    {
        return view('kos.edit', ['kos' => $ko]);
    }

    public function update(Request $request, Kos $ko)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'alamat'    => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $ko->update($request->only('nama', 'alamat', 'deskripsi'));

        return redirect()->route('kos.index')->with('success', 'Kos berhasil diupdate');
    }

    public function destroy(Kos $ko)
    {
        $ko->delete();
        return redirect()->route('kos.index')->with('success', 'Kos berhasil dihapus');
    }
}

