<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Référence à l'utilisateur
            $table->foreignId('livre_id')->constrained()->onDelete('cascade'); // Référence au livre
            $table->date('date_debut'); // Date de début de la réservation
            $table->date('date_fin'); // Date de fin de la réservation
            $table->enum('etat', ['en_attente', 'validee', 'annulee'])->default('en_attente'); // État de la réservation
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
