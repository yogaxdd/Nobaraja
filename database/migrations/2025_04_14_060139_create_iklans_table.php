<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('iklans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('jenis', ['banner', 'popup', 'lainnya'])->default('banner');
            $table->text('link')->nullable();
            $table->string('gambar')->nullable(); // Field untuk foto/gif iklan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('iklans');
    }
};
