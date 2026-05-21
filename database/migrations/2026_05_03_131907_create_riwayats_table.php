<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('paket');
            $table->enum('jenis_mobil', ['Manual', 'Matic']);

            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');

            $table->string('payment_status')->default('pending');
            $table->string('order_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};