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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->float("taux")->nullable();
            $table->float("prix");
            $table->unsignedBigInteger("id_partenaire");
            $table->foreign("id_partenaire")->references("id")->on("users")->cascadeOnDelete();
            // $table->unsignedBigInteger("id_contrat");
            // $table->foreign("id_contrat")->references("id")->on("contrats");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
