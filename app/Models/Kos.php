<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;

    protected $table = 'kos';

    protected $fillable = [
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
    ];

    public function kamars()
    {
        // foreign key di tabel kamars: kos_id (sesuai screenshot)
        return $this->hasMany(Kamar::class, 'kos_id');
    }
}
