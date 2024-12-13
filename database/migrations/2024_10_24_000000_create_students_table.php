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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');  // Nombre obligatorio
            $table->string('second_name')->nullable();  // Segundo nombre opcional
            $table->string('first_surname');  // Primer apellido obligatorio
            $table->string('second_surname')->nullable();  // Segundo apellido opcional
            $table->unsignedBigInteger('identity_id');  // Llave foránea identidad
            $table->string('identity_number')->unique();  // Número de identidad único y obligatorio
            $table->string('institutional_email')->unique();  // Correo institucional único y obligatorio
            $table->string('personal_email')->unique();  // Correo personal único y obligatorio
            $table->string('phone_number')->nullable();  // Número celular opcional
            $table->unsignedBigInteger('locality_id')->unique();  // Llave foránea localidad 
            $table->unsignedBigInteger('program_id');  // Llave foránea programa
            $table->unsignedBigInteger('file_id')->unique();  // Llave foránea archivo 
            $table->string('quialification')->nullable();
            $table->enum('status', ['Activo', 'Inactivo', 'Finalizó', 'En proceso', 'Se retiró', 'Reprobó']);  // Estado obligatorio 
            $table->timestamps();

             // Llaves foráneas con onDelete('cascade')
             $table->foreign('identity_id')->references('id')->on('identities')->onDelete('cascade');
             $table->foreign('locality_id')->references('id')->on('localities')->onDelete('cascade');
             $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
             $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
