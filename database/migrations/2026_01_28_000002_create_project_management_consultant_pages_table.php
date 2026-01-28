<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_management_consultant_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('hero_title');
            $table->text('hero_subtitle')->nullable();
            $table->text('intro')->nullable();
            $table->string('image_one')->nullable();
            $table->string('image_two')->nullable();
            $table->string('table_title')->nullable();
            $table->text('table_intro')->nullable();
            $table->text('table_rows')->nullable();
            $table->string('sample_projects_title')->nullable();
            $table->text('sample_projects_intro')->nullable();
            $table->text('sample_projects')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_body')->nullable();
            $table->string('cta_button_text')->nullable();
            $table->string('cta_button_link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_management_consultant_pages');
    }
};
