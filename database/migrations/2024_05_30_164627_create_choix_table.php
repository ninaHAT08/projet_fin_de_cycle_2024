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
        Schema::create('choix', function (Blueprint $table) {
            $table->id();
         
            $table->unsignedBigInteger('binome')->nullable()->default(null);
            $table->date('date');
            $table->unsignedBigInteger('idSujet1');
            $table->unsignedBigInteger('idUser3');
            $table->boolean('envoyer')->default(false);

            // Définition des clés étrangères
            $table->foreign('binome')->references('id')->on('users');
            $table->foreign('idSujet1')->references('idSujet')->on('sujet')->onDelete('cascade');
            $table->foreign('idUser3')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choix');
    }
};
