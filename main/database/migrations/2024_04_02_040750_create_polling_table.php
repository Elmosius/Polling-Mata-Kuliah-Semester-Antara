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
        Schema::create('polling', function (Blueprint $table) {
            $table->id('id_polling');
            $table->string('nama_polling',45);
            $table->date('start_at');
            $table->date('end_at');
            $table->string('is_active',2);
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
