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
        Schema::create('paket', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->string('jenis_mobil');
            $table->integer('harga');
            $table->integer('pertemuan')->nullable();
            $table->text('deskripsi'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('paket', function (Blueprint $table) {
            $table->dropColumn('jenis_mobil');
        });
    }
};
