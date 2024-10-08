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
        Schema::create('poke_card_price_time_series', function (Blueprint $table) {
            $table->id();
            $table->uuid('card_id')->nullable();
            $table->integer('psa_grade')->nullable();
            $table->json('timeseries_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poke_card_price_time_series');
    }
};
