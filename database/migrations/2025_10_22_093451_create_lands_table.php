<?php

// database/migrations/xxxx_xx_xx_create_lands_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['sale', 'joint_venture'])->default('sale');
            $table->text('description');
            $table->string('location');
            $table->decimal('price', 12, 2);
            $table->json('images'); // Store multiple images as JSON array
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lands');
    }
};
