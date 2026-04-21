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
        Schema::table('product_images', function (Blueprint $table) {
            $table->unsignedInteger('quantity')->default(0)->after('sort_order');
        });

        Schema::table('product_sizes', function (Blueprint $table) {
            $table->unsignedInteger('quantity')->default(0)->after('sort_order');
        });
    }

    public function down(): void
    {
        Schema::table('product_images', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });

        Schema::table('product_sizes', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
};
