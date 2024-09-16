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
        Schema::create('poke_card_tcg_pc_relations', function (Blueprint $table) {
            $table->id();
            $table->uuid('card_id')->index();
            $table->uuid('tcg_id')->index();
            $table->uuid('pc_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poke_card_tcg_pc_relations');
    }
};
