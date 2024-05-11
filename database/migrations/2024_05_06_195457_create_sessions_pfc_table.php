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
            $table->string('intitulé_session');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('nbr_session');
            $table->foreignId('iduser')->constrained('users');
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
