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
        Schema::create('superadmins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // Référence à l'utilisateur
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->binary('image')->nullable();
            $table->string('name');
            $table->string('prenom');
            $table->string('cin')->unique();
            $table->unsignedBigInteger('etablissement_id'); // Référence à l'établissement sans le "unique"
            $table->foreign('etablissement_id')->references('id')->on('etablissements')->onDelete('cascade');

            $table->string('telephone')->nullable(); // Numéro de téléphone
            $table->string('adresse')->nullable(); // Adresse
            $table->decimal('salaire', 10, 2)->nullable(); // Salaire
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('superadmins');
    }
};
