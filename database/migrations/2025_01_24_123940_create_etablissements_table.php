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
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique(); // Nom de l'établissement
            $table->string('adresse'); // Adresse de l'établissement // Référence au directeur (super admin)
            $table->string('telephone')->nullable(); // Numéro de téléphone
            $table->string('email')->nullable()->unique(); // Email
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissements');
    }
};
