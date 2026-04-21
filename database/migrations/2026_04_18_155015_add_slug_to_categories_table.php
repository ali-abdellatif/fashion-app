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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('id');
        });

        // Auto-generate slugs for existing rows
        foreach (\App\Models\Category::all() as $cat) {
            $name = is_array($cat->name) ? ($cat->name['en'] ?? reset($cat->name)) : $cat->name;
            $cat->slug = \Illuminate\Support\Str::slug($name);
            $cat->save();
        }
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
