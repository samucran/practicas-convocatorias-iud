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
        Schema::create('convocations', function (Blueprint $table) {
            $table->id();
            $table->boolean('has_agency')->default(false); // Obligatorio
            $table->date('start_date')->nullable();        // Opcional
            $table->date('end_date')->nullable();          // Opcional

            // Llaves foráneas
            $table->foreignId('modality_id')->nullable()->constrained('modalities')->cascadeOnDelete();
            $table->foreignId('agency_id')->nullable()->constrained('agencies')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convocations');
    }
};
