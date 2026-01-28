<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('project_management_consultant_pages', function (Blueprint $table) {
            $table->string('highlights_title')->nullable()->after('discipline_images');
            $table->text('highlights_items')->nullable()->after('highlights_title');
            $table->string('metrics_title')->nullable()->after('highlights_items');
            $table->text('metrics_items')->nullable()->after('metrics_title');
        });
    }

    public function down(): void
    {
        Schema::table('project_management_consultant_pages', function (Blueprint $table) {
            $table->dropColumn([
                'highlights_title',
                'highlights_items',
                'metrics_title',
                'metrics_items',
            ]);
        });
    }
};
