<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'pesan',
        'total_donasi',
        'tipe_bayar',
        'donasi_id', // Tambahkan kolom baru
    ];

    // Relasi dengan model Donasi
    public function donasi()
    {
        return $this->belongsTo(Donasi::class, 'donasi_id');
    }
}
