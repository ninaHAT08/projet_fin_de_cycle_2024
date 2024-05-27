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
        Schema::create('sessions_pfc', function (Blueprint $table) {
            $table->id();
            $table->string('intitule_session');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('annee_univ');
            $table->unsignedBigInteger('iduser');
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions_pfc');
    }
};
