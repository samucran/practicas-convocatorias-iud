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
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculum_id')
                  ->constrained('curriculums')
                  ->onDelete('cascade')
                  ->unique()
                  ->required();
            $table->string('institution', 50)->required();
            $table->string('title', 20)->required();
            $table->date('year')->required();
            $table->string('institution_extra', 50)->nullable();
            $table->string('title_extra', 20)->nullable();
            $table->date('year_extra')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studies');
    }
};
