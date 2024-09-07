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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->uuid('content_id')->unique()->index();
            $table->string('title')->nullable();
            $table->text('content_body')->nullable();
            $table->date('date_created')->nullable();
            $table->boolean('is_live')->default(false);
            $table->string('image_url')->nullable();
            $table->string('content_group')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
