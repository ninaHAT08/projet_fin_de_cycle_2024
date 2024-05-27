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
        Schema::create('Sujet', function (Blueprint $table) {
            $table->bigIncrements('idSujet');
            $table->string('titre');
            $table->text('description');
            $table->string('specialite');
            $table->string('mot_cle');
            $table->boolean('Sujet_affecter')->default('0');
            $table->string('anneeUniv');
            $table->unsignedBigInteger('iduser1');
            $table->foreign('iduser1')->references('id')->on('users')->onDelete('cascade'); // Clé étrangère référencée à la colonne id de la table users
            $table->unsignedBigInteger('iduser2')->nullable();
            $table->foreign('iduser2')->references('id')->on('users')->onDelete('cascade');
            $table->enum('typeSujet',['externe','interne']);
            $table->string('nomEntreprise')->nullable();
            $table->string('maitre_du_stage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Sujet');
    }
};
