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
        Schema::create('choix_sujets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_enseignant');
            $table->unsignedBigInteger('id_sujetE');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_enseignant')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_sujetE')->references('idSujet')->on('sujet')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choix_sujets');
    }
};
