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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // L'utilisateur qui est abonné
            $table->unsignedBigInteger('abonne_id'); // L'utilisateur qui est abonné à l'utilisateur
            $table->timestamps();

            // Contrainte unique pour s'assurer qu'un utilisateur ne peut pas s'abonner deux fois au même utilisateur
            $table->unique(['user_id', 'abonne_id']);

            // Contraintes de clés étrangères
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('abonne_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnements');
    }
};
