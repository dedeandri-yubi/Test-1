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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('no_peminjaman');
            $table->string('nama_peminjam');
            $table->string('no_telepon');
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('alamat');
            $table->foreignId('cars_id')->constrained('cars');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->string('status')->default('Disewa');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
