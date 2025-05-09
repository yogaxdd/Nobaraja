<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('iklans', function (Blueprint $table) {
            if (!Schema::hasColumn('iklans', 'gambar')) {
                $table->string('gambar')->nullable()->after('link');
            }
        });        
    }

    public function down(): void
    {
        Schema::table('iklans', function (Blueprint $table) {
            $table->dropColumn('gambar');
        });
    }
};
