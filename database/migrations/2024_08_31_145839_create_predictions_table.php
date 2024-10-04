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
        Schema::create('predictor_predictions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('predictor_game_id')->constrained();
            $table->integer('home_score');
            $table->integer('away_score');
            $table->string('selection');
            $table->integer('points')->default(0);
            $table->timestamps();
            $table->unique(['user_id', 'predictor_game_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predictor_predictions');
    }
};
