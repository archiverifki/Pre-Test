<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jenis_kelamins', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('jenis_kelamin');
            $table->timestamps();
        });

        // Tambahkan data ke tabel jenis_kelamin
        DB::table('jenis_kelamins')->insert([
            ['kode' => '1', 'jenis_kelamin' => 'laki-laki'],
            ['kode' => '2', 'jenis_kelamin' => 'perempuan'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_kelamins');
    }
};
