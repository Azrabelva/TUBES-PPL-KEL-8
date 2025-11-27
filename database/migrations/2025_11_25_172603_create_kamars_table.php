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
    Schema::create('kamars', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kos_id')->constrained('kos')->onDelete('cascade');
        $table->string('nama_kamar');
        $table->decimal('harga', 12, 2);
        $table->enum('status', ['tersedia', 'terisi'])->default('tersedia');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
