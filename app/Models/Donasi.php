<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'donasi';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'title',
        'description',
        'target_amount',
        'amount_collected',
        'category',
        'image',
    ];

    // Relasi dengan model Donatur
    public function donaturs()
    {
        return $this->hasMany(Donatur::class, 'donasi_id');
    }
}
