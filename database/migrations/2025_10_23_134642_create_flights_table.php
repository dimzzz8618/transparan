<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penerbangan');
            $table->string('asal');
            $table->string('tujuan');
            $table->dateTime('waktu_berangkat');
            $table->dateTime('waktu_tiba');
            $table->integer('harga');
            $table->integer('kursi_tersedia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
