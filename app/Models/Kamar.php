<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kos_id',
        'nama_kamar',
        'harga',
        'status',
    ];

    public function kos()
    {
        return $this->belongsTo(Kos::class);
    }
}
