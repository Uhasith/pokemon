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
        Schema::table('poke_sets', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('set_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('poke_sets', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
