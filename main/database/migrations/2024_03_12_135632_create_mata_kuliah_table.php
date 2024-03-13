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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->string('id_mataKuliah',10)->primary();
            $table->string('nama_mataKuliah',45);
<<<<<<< HEAD
            $table->string('id_programStudi',5);
            $table->foreign('id_programStudi')->references('id_programStudi')->on('program_studi');
=======
>>>>>>> 985b7f6a67cf604bebbd899b6a3319c2b8fa481e
            $table->integer('sks');
            $table->string('hari',7);
            $table->time('jam');
            $table->string('id_kurikulum',5);
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
