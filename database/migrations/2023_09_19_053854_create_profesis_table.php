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
        Schema::create('profesis', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('profesi');
            $table->timestamps();
        });

        // Tambahkan data ke tabel profesi
        DB::table('profesis')->insert([
            ['kode' => 'A', 'profesi' => 'Petani'],
            ['kode' => 'B', 'profesi' => 'Teknisi'],
            ['kode' => 'C', 'profesi' => 'Guru'],
            ['kode' => 'D', 'profesi' => 'Nelayan'],
            ['kode' => 'E', 'profesi' => 'Seniman'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesis');
    }
};
