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
        Schema::create('convocation_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('convocation_id')
                  ->constrained('convocations')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('student_id')
                  ->constrained('students')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('semester_date', 6); // Ejemplo: "202301"
            $table->boolean('mandatory_practice');
            $table->timestamps();

            $table->unique(['convocation_id', 'student_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convocation_relations');
    }
};
