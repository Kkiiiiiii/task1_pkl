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
        Schema::table('educates', function (Blueprint $table) {
            $table->enum('jenjang_pendidikan', [
                'SD',
                'SMP',
                'SMA',
                'SMK',
                'S1',
                'S2',
                'S3',
                'Kursus'
            ])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enum_on_educates', function (Blueprint $table) {
            //
        });
    }
};
