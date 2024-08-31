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
        Schema::create('predictor_games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('predictor_tournament_id')->constrained();
            $table->string('round');
            $table->dateTime('date');
            $table->jsonb('team_home');
            $table->jsonb('team_away');
            $table->integer('score_home')->nullable();
            $table->integer('score_away')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predictor_games');
    }
};
