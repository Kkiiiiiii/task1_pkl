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
            $table->date('tahun_masuk')->change();
            $table->date('tahun_lulus')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('educates', function (Blueprint $table) {
            //
        });
    }
};
