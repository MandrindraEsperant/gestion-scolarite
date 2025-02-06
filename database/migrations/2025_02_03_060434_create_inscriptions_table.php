<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('annee_scolaire_id')->constrained('annee_scolaires','id')->onDelete('cascade');
            $table->foreignId('etudiant_id')->constrained('etudiants', 'id')->onDelete('cascade');
            $table->foreignId('niveau_id')->constrained('niveaux', 'id')->onDelete('cascade');
            $table->enum('statut', ["Passant", "Redoublant", "Triplant"])->nullable(false);
            $table->dateTime('date_inscription')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('mode_payement', 20);
            $table->timestamps();

            // Contrainte d'unicité composite sur 'annee_scolaire_id' et 'nom'
            // $table->unique(['etudiant_id', 'niveau_id']); //  si un éleve peut inscrire dans plusieur niveaux
            $table->unique(['etudiant_id', 'annee_scolaire_id']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
