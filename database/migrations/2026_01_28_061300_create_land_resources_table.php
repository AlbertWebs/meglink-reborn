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
        Schema::create('land_resources', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Land Resources');
            $table->text('land_purchaser_notice')->nullable();
            $table->text('land_seller')->nullable();
            $table->text('joint_ventures')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_resources');
    }
};
