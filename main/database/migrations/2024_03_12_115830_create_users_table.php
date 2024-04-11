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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id_user',10)->primary();
            $table->string('nama_user',45);
            $table->string('email',255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->string('id_role',5);
            $table->foreign('id_role')->references('id_role')->on('role');
            $table->string('id_program_studi',5)->nullable();
            $table->foreign('id_program_studi')->references('id_program_studi')->on('program_studi');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
