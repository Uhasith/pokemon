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
        Schema::create('populations', function (Blueprint $table) {
            $table->id();
            $table->uuid('population_id')->unique()->index();
            $table->uuid('card_id');
            $table->integer('pop1')->nullable()->default(0);
            $table->integer('pop2')->nullable()->default(0);
            $table->integer('pop3')->nullable()->default(0);
            $table->integer('pop4')->nullable()->default(0);
            $table->integer('pop5')->nullable()->default(0);
            $table->integer('pop6')->nullable()->default(0);
            $table->integer('pop7')->nullable()->default(0);
            $table->integer('pop8')->nullable()->default(0);
            $table->integer('pop9')->nullable()->default(0);
            $table->integer('pop10')->nullable()->default(0);
            $table->date('date_checked')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('card_id');

            // Foreign key constraint
            $table->foreign('card_id')->references('card_id')->on('cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('populations');
    }
};
