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
        Schema::create('globaladmins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // Référence à l'utilisateur
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->binary('image')->nullable();
            $table->string('telephone')->nullable(); // Numéro de téléphone
            $table->string('adresse')->nullable(); // Adresse
            $table->string('cin')->nullable(); // Carte d'identité nationale
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('globaladmins');
    }
};
