<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('realtor_listings', function (Blueprint $table) {
            $table->string('video_mp4')->nullable()->after('image');
            $table->string('video_youtube')->nullable()->after('video_mp4');
        });
    }

    public function down(): void
    {
        Schema::table('realtor_listings', function (Blueprint $table) {
            $table->dropColumn(['video_mp4', 'video_youtube']);
        });
    }
};
