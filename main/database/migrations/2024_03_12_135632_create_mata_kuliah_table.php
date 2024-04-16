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
            $table->string('id_program_studi',5);
            $table->foreign('id_program_studi')->references('id_program_studi')->on('program_studi')
                ->onUpdate('cascade')->onDelete('restrict');;
            $table->integer('sks');
            $table->unsignedBigInteger('id_kurikulum');
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')
                ->onUpdate('cascade')->onDelete('restrict');
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
