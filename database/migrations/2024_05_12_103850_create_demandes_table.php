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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('ville');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('ecole');
            $table->string('demande_stage')->nullable();
            $table->string('attestation_assurance')->nullable();
            $table->string('photo')->nullable();
            $table->string('cv')->nullable();
            $table->string('formateur');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('statut')->default('en_cours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
