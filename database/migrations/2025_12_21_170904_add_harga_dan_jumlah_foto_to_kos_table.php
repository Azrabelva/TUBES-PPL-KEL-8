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
    Schema::table('kos', function (Blueprint $table) {
        $table->integer('harga')->nullable()->after('deskripsi');
        $table->integer('jumlah_foto')->default(0)->after('foto_kos');
    });
}

public function down(): void4
{
    Schema::table('kos', function (Blueprint $table) {
        $table->dropColumn(['harga', 'jumlah_foto']);
    });
}

};
