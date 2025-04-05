<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pengajuan');
            $table->string('nama_pengajuan');
            $table->text('deskripsi_pengajuan');
            $table->string('file_pengajuan'); // Nama file upload
            $table->enum('status', ['dikumpulkan', 'diproses', 'disetujui', 'tidak disetujui'])->default('dikumpulkan');
            $table->unsignedBigInteger('user_id'); // Tambahkan kolom user_id
            $table->foreign('user_id')->references('id')->on('users'); // Tambahkan foreign key constraint
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
