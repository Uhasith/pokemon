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
        Schema::create('poke_card_prices', function (Blueprint $table) {
            $table->id();
            $table->uuid('price_id')->unique()->index();
            $table->uuid('card_id');
            $table->decimal('value', 10, 2)->nullable();
            $table->date('sale_date')->nullable();
            $table->string('grade')->nullable();
            $table->string('lot_id')->nullable();
            $table->string('auction_house')->nullable();
            $table->string('seller')->nullable();
            $table->string('cert_number')->nullable();
            $table->string('sale_type')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('card_id');

            // Foreign key constraint
            $table->foreign('card_id')->references('card_id')->on('poke_cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
