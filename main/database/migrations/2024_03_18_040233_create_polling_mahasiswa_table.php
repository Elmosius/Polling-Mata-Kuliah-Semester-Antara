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
        Schema::create('polling_mahasiswa', function (Blueprint $table) {
            $table->string('id_polling_mahasiswa',5)->primary();
            $table->string('id_user',5);
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->integer('jumlah_mata_kuliah');
            $table->integer('total_sks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polling');
    }
};
