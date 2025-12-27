<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'tanggal',
        'nama_menu',
        'harga_bahan',
        'harga_jual',
        'jumlah',
        'modal',
        'pendapatan',
        'keuntungan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
