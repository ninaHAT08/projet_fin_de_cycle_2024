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
        Schema::create('sujetexterne', function (Blueprint $table) {
         
            $table->bigIncrements('idsujete');
            $table->foreignId('iduser')->constrained('users'); // Clé étrangère référencée à la colonne id de la table users
            $table->string('titre');
            $table->string('specialite');
            $table->string('nom_entreprise');
            $table->text('description');
            $table->string('mot_clé');
            $table->string('état')->default('en_attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sujetexterne');
    }
};
