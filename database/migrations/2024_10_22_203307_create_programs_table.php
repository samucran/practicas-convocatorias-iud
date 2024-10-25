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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('program_name', 50)->unique();  // Nombre único y obligatorio
            $table->string('program_profile', 50)->unique();  // Perfil único y obligatorio
            $table->foreignId('faculty_id')->constrained('faculties')->cascadeOnDelete();  // Llave foránea obligatoria
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
