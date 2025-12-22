<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminDashboardController extends Controller
{
    /**
     * TAMPILKAN DASHBOARD
     */
    public function index()
    {
        $kosList = Kos::latest()->get();

        return view('admin.dashboard', compact('kosList'));
    }

    /**
     * SIMPAN DATA KOS BARU
     */
    public function storeKos(Request $request)
    {
        $request->validate([
            'nama'                    => 'required|string|max:255',
            'alamat'                  => 'required|string',
            'deskripsi'               => 'nullable|string',
            'harga'                   => 'required|integer|min:0',
            'jumlah_kamar_tersedia'   => 'required|integer|min:0',
            'peraturan'               => 'nullable|string',
            'fasilitas'               => 'nullable|string',
            'foto_kos'                => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // SIMPAN FOTO
        $fotoPath = null;
        if ($request->hasFile('foto_kos')) {
            $foto     = $request->file('foto_kos');
            $namaFoto = time().'_'.$foto->getClientOriginalName();
            $foto->move(public_path('images/kos'), $namaFoto);
            $fotoPath = 'images/kos/'.$namaFoto;
        }

        Kos::create([
            'nama'                  => $request->nama,
            'alamat'                => $request->alamat,
            'deskripsi'             => $request->deskripsi,
            'harga'                 => $request->harga,
            'jumlah_kamar_tersedia' => $request->jumlah_kamar_tersedia,
            'peraturan'             => $request->peraturan,
            'fasilitas'             => $request->fasilitas,
            'foto_kos'              => $fotoPath,
        ]);

        return redirect()->back()->with('success', 'Kos berhasil ditambahkan');
    }

    /**
     * UPDATE DATA KOS
     */
    public function updateKos(Request $request, Kos $kos)
    {
        $request->validate([
            'nama'                    => 'required|string|max:255',
            'alamat'                  => 'required|string',
            'deskripsi'               => 'nullable|string',
            'harga'                   => 'required|integer|min:0',
            'jumlah_kamar_tersedia'   => 'required|integer|min:0',
            'peraturan'               => 'nullable|string',
            'fasilitas'               => 'nullable|string',
            'foto_kos'                => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // GANTI FOTO JIKA ADA
        if ($request->hasFile('foto_kos')) {

            if ($kos->foto_kos && File::exists(public_path($kos->foto_kos))) {
                File::delete(public_path($kos->foto_kos));
            }

            $foto     = $request->file('foto_kos');
            $namaFoto = time().'_'.$foto->getClientOriginalName();
            $foto->move(public_path('images/kos'), $namaFoto);
            $kos->foto_kos = 'images/kos/'.$namaFoto;
        }

        $kos->update([
            'nama'                  => $request->nama,
            'alamat'                => $request->alamat,
            'deskripsi'             => $request->deskripsi,
            'harga'                 => $request->harga,
            'jumlah_kamar_tersedia' => $request->jumlah_kamar_tersedia,
            'peraturan'             => $request->peraturan,
            'fasilitas'             => $request->fasilitas,
        ]);

        return redirect()->back()->with('success', 'Data kos berhasil diperbarui');
    }

    /**
     * HAPUS DATA KOS
     */
    public function deleteKos(Kos $kos)
    {
        if ($kos->foto_kos && File::exists(public_path($kos->foto_kos))) {
            File::delete(public_path($kos->foto_kos));
        }

        $kos->delete();

        return redirect()->back()->with('success', 'Kos berhasil dihapus');
    }
}
