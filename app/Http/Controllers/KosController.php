<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class KosController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $data = Kos::latest()->paginate(6);
=======
    public function index(Request $request)
    {
        // Query dasar
        $query = Kos::query()->latest();
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->keyword . '%')
                  ->orWhere('alamat', 'like', '%' . $request->keyword . '%');
            });
        }
        if ($request->filled('kategori')) {
            $query->whereHas('kategoris', function ($q) use ($request) {
                $q->where('nama', $request->kategori);
            });
        }
        $data = $query->paginate(6)->withQueryString();
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3

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
            'foto_kos'  => 'nullable|string',
        ]);

        Kos::create($request->only('nama', 'alamat', 'deskripsi', 'foto_kos'));

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
            'foto_kos'  => 'nullable|string',
        ]);


        $ko->update($request->only('nama', 'alamat', 'deskripsi', 'foto_kos'));

        return redirect()->route('kos.index')->with('success', 'Kos berhasil diupdate');
    }

    public function destroy(Kos $ko)
    {
        $ko->delete();
        return redirect()->route('kos.index')->with('success', 'Kos berhasil dihapus');
    }
}

