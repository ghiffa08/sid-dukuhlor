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
        Schema::table('statistics', function (Blueprint $table) {
            $table->string('featured_image')->nullable()->after('description');
            $table->string('meta_title')->nullable()->after('is_active');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('meta_keywords')->nullable()->after('meta_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('statistics', function (Blueprint $table) {
            $table->dropColumn(['featured_image', 'meta_title', 'meta_description', 'meta_keywords']);
        });
    }
};
