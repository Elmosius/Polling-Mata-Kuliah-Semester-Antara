<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->string('id_jadwal',10)->primary();
            $table->string('id_mataKuliah',10);
            $table->foreign('id_mataKuliah')->references('id_mataKuliah')->on('mata_kuliah');
            $table->string('kelas');
            $table->string('teori');                                # [Y/N] Y = ada teori, N = tidak ada teori
            $table->string('hari_teori',7);
            $table->time('jam_mulai_teori');
            $table->time('jam_selesai_teori');
            $table->string('praktikum');                            # [Y/N] Y = ada praktikum, N = tidak ada praktikum
            $table->string('hari_praktikum',7)->nullable();
            $table->time('jam_mulai_praktikum')->nullable();
            $table->time('jam_selesai_praktikum')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
