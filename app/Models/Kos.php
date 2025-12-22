<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kos extends Model
{
    use HasFactory;

    protected $table = 'kos';

    protected $fillable = [
        'nama',
        'alamat',
        'deskripsi',
        'foto_kos'
    ];

    public function kamars()
    {
        return $this->hasMany(Kamar::class);
    }
}

