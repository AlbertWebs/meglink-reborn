<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('realtor_pages', function (Blueprint $table) {
            $table->text('sample_listing_images')->nullable()->after('sample_projects_intro');
        });
    }

    public function down(): void
    {
        Schema::table('realtor_pages', function (Blueprint $table) {
            $table->dropColumn('sample_listing_images');
        });
    }
};
