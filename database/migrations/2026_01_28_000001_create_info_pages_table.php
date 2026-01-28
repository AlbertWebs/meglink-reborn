<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('info_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('hero_title');
            $table->text('hero_subtitle')->nullable();
            $table->text('intro')->nullable();
            $table->string('section_one_title')->nullable();
            $table->text('section_one_body')->nullable();
            $table->string('section_two_title')->nullable();
            $table->text('section_two_body')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_body')->nullable();
            $table->string('cta_button_text')->nullable();
            $table->string('cta_button_link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('info_pages');
    }
};
