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
        Schema::table('users', function (Blueprint $table) {
            $table->date('date_naiss')->nullable();
            $table->string('matricule')->nullable();
            $table->string('etat')->nullable();
            $table->unsignedBigInteger('idSujet')->nullable();
            $table->foreign('idSujet')->references('id')->on('sujets')->onDelete('set null');
            $table->string('type_these')->nullable();
            $table->integer('annee_ins')->nullable();
            $table->string('poste')->nullable();
            $table->string('grade')->nullable();
            $table->string('diplome')->nullable();
            $table->integer('annee_rec')->nullable();
            $table->string('domaine_exp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('date_naiss');
            $table->dropColumn('matricule');
            $table->dropColumn('annee_ins');
            $table->dropColumn('type_these');
            $table->dropColumn('poste');
            $table->dropColumn('grade');
            $table->dropColumn('diplome');
            $table->dropColumn('annee_rec');
            $table->dropColumn('domaine_exp');
            $table->dropForeign(['idSujet']);
            $table->dropColumn('idSujet');
        });
    }
};
