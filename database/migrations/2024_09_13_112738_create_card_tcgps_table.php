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
        Schema::create('card_tcgps', function (Blueprint $table) {
            $table->id();
            $table->uuid('tcgp_id')->index()->nullable();
            $table->uuid('card_id')->nullable();
            $table->json('abilities')->nullable();
            $table->string('artist')->nullable();
            $table->string('ancient_trait')->nullable();
            $table->json('attacks')->nullable();
            $table->json('card_market')->nullable();
            $table->integer('converted_retreat_cost')->nullable();
            $table->string('evolves_from')->nullable();
            $table->string('flavor_text')->nullable();
            $table->integer('hp')->nullable();
            $table->string('id_number')->nullable();
            $table->json('images')->nullable();
            $table->json('legalities')->nullable();
            $table->string('regulation_mark')->nullable();
            $table->string('name')->nullable();
            $table->json('national_pokedex_numbers')->nullable();
            $table->integer('number')->nullable();
            $table->string('rarity')->nullable();
            $table->json('resistances')->nullable();
            $table->json('retreat_cost')->nullable();
            $table->json('rules')->nullable();
            $table->json('set')->nullable();
            $table->json('subtypes')->nullable();
            $table->string('supertype')->nullable();
            $table->json('tcgplayer')->nullable();
            $table->json('types')->nullable();
            $table->json('weaknesses')->nullable();
            $table->string('set_series')->nullable();
            $table->string('set_name')->nullable();
            $table->string('set_id')->nullable();
            $table->integer('set_printed_total')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('card_id');

            // Foreign key constraint
            // $table->foreign('card_id')->references('card_id')->on('cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_tcgps');
    }
};
