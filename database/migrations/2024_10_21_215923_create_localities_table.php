<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('localities', function (Blueprint $table) {
        $table->id();
        $table->string('country');
        $table->string('state');
        $table->string('city');
        $table->string('neighborhood');
        $table->string('address');
        $table->timestamps();
        //$table->dropColumn(['country', 'city']); // Elimina columnas antiguas si es necesario
    });
}

public function down(): void
{
    Schema::dropIfExists('localities');
    Schema::table('localities', function (Blueprint $table) {
        $table->dropColumn(['country', 'state', 'city']);
        $table->string('country')->nullable();
        $table->string('city')->nullable();
    });
}
};
