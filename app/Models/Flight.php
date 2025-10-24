<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_penerbangan',
        'asal',
        'tujuan',
        'waktu_berangkat',
        'waktu_tiba',
        'harga',
        'kursi_tersedia'
    ];
}
