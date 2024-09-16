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
        Schema::create('poke_card_set_relations', function (Blueprint $table) {
            $table->id();
            $table->uuid('card_id')->index();
            $table->uuid('set_id')->index();
            $table->text('related_sets')->nullable();
            $table->text('related_cards')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poke_card_set_relations');
    }
};
