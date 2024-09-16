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
        Schema::create('poke_all_sets', function (Blueprint $table) {
            $table->id();
            $table->uuid('set_id')->nullable();
            $table->string('name')->nullable();
            $table->string('series')->nullable();
            $table->integer('printed_total')->nullable();
            $table->integer('total')->nullable();
            $table->string('ptcgo_code')->nullable();
            $table->date('release_date')->nullable();
            $table->json('images')->nullable();
            $table->json('legalities')->nullable();
            $table->timestamp('updated_at_ts')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poke_all_sets');
    }
};
