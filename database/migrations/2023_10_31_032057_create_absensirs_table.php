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
        Schema::create('absensirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswar_id')->references('id')->on('siswars')->onDelete('cascade');
            $table->enum('keterangan',['hadir','sakit','izin','alpa'])->nullable();
            $table->foreignId('kelaser_id')->references('id')->on('kelasers')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensirs');
    }
};
