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
        Schema::create('language_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculum_id')->unique()->constrained('curriculums')->onDelete('cascade');
            $table->string('primary_language', 20);
            $table->enum('primary_language_level', ['A1', 'A2', 'B1', 'B2', 'C1', 'C2']);
            $table->string('secondary_language', 20)->nullable();
            $table->enum('secondary_language_level', ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'])->nullable();
            $table->string('extra_language', 20)->nullable();
            $table->enum('extra_language_level', ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_levels');
    }
};
