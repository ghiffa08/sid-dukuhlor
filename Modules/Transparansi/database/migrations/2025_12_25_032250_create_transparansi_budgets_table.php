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
        Schema::create('transparansi_budgets', function (Blueprint $table) {
            $table->id();
            
            // Core Data
            $table->integer('year')->index();
            $table->string('type'); // PENDAPATAN, BELANJA, PEMBIAYAAN
            $table->string('category'); // e.g., Pendapatan Asli Desa
            $table->string('title'); // Uraian
            
            $table->string('slug')->unique(); // Slug for detail page (e.g. apbdes-2025-pendapatan-asli-desa)
            
            // Numbers
            $table->bigInteger('budget')->default(0); // Anggaran
            $table->bigInteger('realization')->default(0); // Realisasi
            
            $table->text('description')->nullable();
            
            // Standard CMS fields
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('featured_image')->nullable();
            
            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            // Authors
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transparansi_budgets');
    }
};
