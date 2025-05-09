<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail');
            $table->string('judul');
            $table->decimal('rating', 3, 1)->nullable();
            $table->enum('tipe', ['single', 'series']);
            $table->string('durasi')->nullable();
            $table->string('kualitas')->nullable();
            $table->string('genre')->nullable(); // atau bisa dibuat relasi ke tabel genres
            $table->string('trailer_link')->nullable();
            $table->json('server_backup')->nullable();
            $table->string('embed_link')->nullable();
            $table->text('sinopsis')->nullable();
            $table->year('tahun')->nullable();
            $table->date('tanggal_rilis')->nullable();
            $table->json('download_links')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('films');
    }
};
