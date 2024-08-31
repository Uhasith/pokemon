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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->uuid('card_id')->unique()->index();
            $table->uuid('set_id');
            $table->string('name')->nullable();
            $table->string('psa_name')->nullable();
            $table->string('image_url')->nullable();
            $table->string('scrape_url')->nullable();
            $table->date('last_scraped')->nullable();
            $table->string('card_number')->nullable();
            $table->string('variant')->nullable();
            $table->boolean('is_holo')->default(false);
            $table->boolean('is_reverse_holo')->default(false);
            $table->timestamps();

            // Indexes
            $table->index('set_id');

            // Foreign key constraint
            $table->foreign('set_id')->references('set_id')->on('sets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
