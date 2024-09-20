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
        Schema::table('poke_card_price_time_series', function (Blueprint $table) {
            $table->decimal('latest_fair_price')->nullable()->after('psa_grade');
            $table->decimal('latest_low_price')->nullable()->after('latest_fair_price');
            $table->decimal('latest_high_price')->nullable()->after('latest_low_price');
            $table->string('latest_price_type')->nullable()->after('latest_high_price');
            $table->string('latest_confidence')->nullable()->after('latest_price_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('poke_card_price_time_series', function (Blueprint $table) {
            $table->dropColumn(['latest_fair_price', 'latest_low_price', 'latest_high_price', 'latest_price_type', 'latest_confidence']);
        });
    }
};
