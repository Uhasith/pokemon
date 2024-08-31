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
        Schema::create('sets', function (Blueprint $table) {
            $table->id();
            $table->uuid('set_id')->unique()->index(); 
            $table->string('set_name')->nullable();
            $table->string('psa_set_name')->nullable();
            $table->year('year')->nullable();
            $table->string('pop_url')->nullable();
            $table->date('last_pop_updated')->nullable();
            $table->date('release_date')->nullable();
            $table->string('set_image')->nullable();
            $table->string('language')->nullable();
            $table->boolean('is_promo')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sets');
    }
};
