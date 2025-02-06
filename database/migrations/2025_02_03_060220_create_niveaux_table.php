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
        Schema::create('niveaux', function (Blueprint $table) {
            $table->id();
            $table->string('niveau', 15)->nullable(false);
            $table->integer('prix_droit')->nullable(false);
            $table->integer('prix_ecolage')->nullable(false);
            $table->foreignId('annee_scolaire_id')->constrained('annee_scolaires','id')->onDelete('cascade');
            $table->timestamps();
            // Contrainte d'unicité composite sur 'annee_scolaire_id' et 'nom'
            $table->unique(['annee_scolaire_id', 'niveau']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('niveaux');
    }
};
