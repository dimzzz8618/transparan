<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Izinkan field yang boleh diisi massal
    protected $fillable = [
        'flight_code',
        'name',
        'email',
        'phone',
        'passengers',
    ];
}
