<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class KosController extends Controller
{
    public function index(Request $request)
    {
        $query = Kos::query()->latest();

        // Filter keyword (nama/alamat)
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%")
                  ->orWhere('alamat', 'like', "%{$keyword}%");
            });
        }

        // Filter kategori (berdasarkan kolom kategori_kos di tabel kos)
        if ($request->filled('kategori')) {
            $query->where('kategori_kos', $request->kategori);
        }

        $data = $query->paginate(6)->withQueryString();

        return view('kos.index', compact('data'));
    }

    public function create()
    {
        return view('kos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'                  => 'required|string|max:255',
            'kategori_kos'          => 'nullable|in:Kos Putra,Kos Putri,Kos Campur',
            'alamat'                => 'required|string|max:255',
            'nomor_wa'              => 'nullable|string|max:20',
            'deskripsi'             => 'nullable|string',
            'harga'                 => 'nullable|numeric|min:0',
            'jumlah_kamar_tersedia' => 'nullable|integer|min:0',
            'peraturan'             => 'nullable|string',
            'fasilitas'             => 'nullable|string',
            'foto_kos'              => 'nullable|string|max:500',
        ]);

        Kos::create($request->only([
            'nama',
            'kategori_kos',
            'alamat',
            'nomor_wa',
            'deskripsi',
            'harga',
            'jumlah_kamar_tersedia',
            'peraturan',
            'fasilitas',
            'foto_kos',
        ]));

        return redirect()->route('kos.index')->with('success', 'Kos berhasil ditambahkan');
    }

    public function show(Kos $ko)
    {
        return view('kos.show', ['kos' => $ko]);
    }

    public function edit(Kos $ko)
    {
        return view('kos.edit', ['kos' => $ko]);
    }

    public function update(Request $request, Kos $ko)
    {
        $request->validate([
            'nama'                  => 'required|string|max:255',
            'alamat'                => 'required|string|max:255',
            'nomor_wa'              => 'nullable|string|max:20',
            'deskripsi'             => 'nullable|string',
            'harga'                 => 'nullable|numeric|min:0',
            'jumlah_kamar_tersedia' => 'nullable|integer|min:0',
            'peraturan'             => 'nullable|string',
            'fasilitas'             => 'nullable|string',
            'foto_kos'              => 'nullable|string|max:500',
            'kategori_kos'          => 'nullable|in:Kos Putra,Kos Putri,Kos Campur',
        ]);

        $ko->update($request->only([
            'nama',
            'kategori_kos',
            'alamat',
            'nomor_wa',
            'deskripsi',
            'harga',
            'jumlah_kamar_tersedia',
            'peraturan',
            'fasilitas',
            'foto_kos',
        ]));

        return redirect()->route('kos.index')->with('success', 'Kos berhasil diupdate');
    }

    public function destroy(Kos $ko)
    {
        $ko->delete();
        return redirect()->route('kos.index')->with('success', 'Kos berhasil dihapus');
    }
}
