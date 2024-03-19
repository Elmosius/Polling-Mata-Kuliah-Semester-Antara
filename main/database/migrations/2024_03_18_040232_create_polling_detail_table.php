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
        Schema::create('polling_detail', function (Blueprint $table) {
            $table->string('id_pollingDetail',5)->primary();
            $table->integer('jumlah');
            $table->string('id_user',5);
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->string('id_jadwal',5);
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal');
            $table->string('id_mataKuliah',10);
            $table->foreign('id_mataKuliah')->references('id_mataKuliah')->on('mata_kuliah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polling_detail');
    }
};
