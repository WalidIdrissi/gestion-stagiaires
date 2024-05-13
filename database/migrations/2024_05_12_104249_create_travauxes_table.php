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
        Schema::create('travauxes', function (Blueprint $table) {
            $table->id();
            $table->string('projet');
            $table->unsignedBigInteger('stagiaire_id');
            $table->foreign('stagiaire_id')->references('id')->on('stagiaires')->onDelete('cascade');
            $table->unsignedBigInteger('encadrant_id');
            $table->foreign('encadrant_id')->references('id')->on('encadrants')->onDelete('cascade');
            // $table->date('date_debut');
            // $table->date('date_fin');
            $table->string('description'); //->nullable()->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travauxes');
    }
};
