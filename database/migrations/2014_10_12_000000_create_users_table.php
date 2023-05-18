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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->bigInteger('phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger("points")->nullable();
            $table->unsignedBigInteger("type_point")->nullable();
            $table->foreign("type_point")->references("id")->on("gestion_points")->cascadeOnDelete();
            $table->unsignedBigInteger("contrat_id")->nullable();
            $table->foreign("contrat_id")->references("id")->on("contrats")->cascadeOnDelete();
            $table->unsignedBigInteger("categorie_id")->nullable();
            $table->foreign("categorie_id")->references("id")->on("categories")->cascadeOnDelete();
            $table->unsignedBigInteger("partenaire_id")->nullable();
            $table->foreign("partenaire_id")->references("id")->on("users");
            $table->enum("level_id",[1,2,3,4])->default(2);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
