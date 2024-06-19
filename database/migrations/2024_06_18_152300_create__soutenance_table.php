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
        Schema::create('soutenance', function (Blueprint $table) {
            $table->id();
           
            $table->string('session');
            $table->date('date_soutenance');
            $table->string('memoire')->nullable();
            $table->integer('note')->nullable();
                 // Clé étrangère vers l'étudiant
                 $table->foreignId('etudiant_id')->constrained('users')->onDelete('cascade');
            // Clé étrangère vers l'étudiant 2 (deuxième étudiant du binôme)
                $table->foreignId('etudiant2_id')->nullable()->constrained('users')->onDelete('cascade');
                 // Clé étrangère vers le président du jury (enseignant)
                 $table->foreignId('president_jury_id')->constrained('users')->onDelete('cascade');
                 
                 // Clés étrangères optionnelles vers les autres enseignants
                 $table->foreignId('enseignant1_id')->constrained('users')->onDelete('cascade');
                 $table->foreignId('enseignant2_id')->constrained('users')->onDelete('cascade');
                 $table->foreignId('enseignant3_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        
        
        
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soutenance');
    }
};
