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
        Schema::create('siswars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenkel',['L','P'])->default('P');
            $table->char('nis');
            $table->char('nisn');
            $table->foreignId('kelaser_id')->references('id')->on('kelasers')->onDelete('cascade');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswars');
    }
};
