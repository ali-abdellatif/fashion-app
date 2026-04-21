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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('image');
            $table->json('color_name')->nullable();   // translatable color label e.g. {"en":"Orange","ar":"برتقالي"}
            $table->string('color_css_class')->nullable(); // e.g. bg_orange-3
            $table->boolean('is_primary')->default(false);  // shown as main card image
            $table->boolean('is_hover')->default(false);    // shown on hover
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
