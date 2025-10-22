<?php

// database/migrations/xxxx_xx_xx_add_type_to_lands_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToLandsTable extends Migration
{
    public function up(): void
    {
        Schema::table('lands', function (Blueprint $table) {
            // Add 'type' column with default 'sale' value
            $table->enum('type', ['sale', 'joint_venture'])->default('sale');
        });
    }

    public function down(): void
    {
        Schema::table('lands', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}

