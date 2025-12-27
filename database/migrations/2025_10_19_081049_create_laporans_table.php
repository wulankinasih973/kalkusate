<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->string('nama_menu')->nullable();
            $table->integer('harga_bahan')->default(0);
            $table->integer('harga_jual')->default(0);
            $table->integer('jumlah')->default(0);
            $table->bigInteger('modal')->default(0);
            $table->bigInteger('pendapatan')->default(0);
            $table->bigInteger('keuntungan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
