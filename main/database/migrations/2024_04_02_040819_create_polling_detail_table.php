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
            $table->unsignedBigInteger('id_polling');
            $table->foreign('id_polling')->references('id_polling')->on('polling')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('id_user',5);
            $table->foreign('id_user')->references('id_user')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('id_mataKuliah',10);
            $table->foreign('id_mataKuliah')->references('id_mataKuliah')->on('mata_kuliah')
                ->onUpdate('cascade')->onDelete('cascade');;
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
