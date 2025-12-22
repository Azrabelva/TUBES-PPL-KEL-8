<?php

namespace App\Http\Controllers;

use App\Models\Kos;

class HomeController extends Controller
{
    public function index()
    {

        $rekomendasi = Kos::latest()->take(3)->get();
        $diskon = Kos::whereHas('kamars', function ($q) {
            $q->whereNotNull('harga_diskon')
              ->whereColumn('harga_diskon', '<', 'harga'); // memastikan diskon lebih murah dari harga asli
        })
        ->latest()
        ->take(3)
        ->get();

        return view('home', compact('rekomendasi', 'diskon'));
    }
}
