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
        Schema::create('complementary_studies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculum_id')
              ->constrained('curriculums')
              ->onDelete('cascade');
            $table->string('name', 50)->nullable();
            $table->string('institution', 50)->nullable();
            $table->string('intensity', 20)->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complementary_studies');
    }
};
