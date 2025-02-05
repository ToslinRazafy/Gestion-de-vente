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
        Schema::create('commande_temporaires', function (Blueprint $table) {
            $table->id();
            $table->integer('produit_id');
            $table->string('nom');
            $table->integer('prix');
            $table->integer('quantite');
            $table->integer('montant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_temporaires');
    }
};
