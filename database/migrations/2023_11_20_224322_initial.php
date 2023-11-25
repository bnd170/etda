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
        Schema::create('seasons', static function(Blueprint $table): void {
            $table->id();
            $table->string('year');
            $table->boolean('in_progress');
        });
        Schema::create('teams', static function(Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('logo');
            $table->string('city');
            $table->string('coach');
            $table->string('president');
            $table->text('description');
            $table->foreignId('season_id')->constrained('seasons');
            $table->timestamps();
        });
        Schema::create('players', static function(Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('position');
            $table->string('number');
            $table->string('classification');
            $table->string('description');
        });
        Schema::create('team_awards', static function(Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->foreignId('season_id')->constrained('seasons');
            $table->foreignId('team_id')->constrained('teams');
        });
        Schema::create('player_awards', static function(Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->foreignId('season_id')->constrained('seasons');
            $table->foreignId('player_id')->constrained('players');
        });
        Schema::create('games', static function(Blueprint $table): void {
            $table->id();
            $table->foreignId('season_id')->constrained('seasons');
            $table->foreignId('home_team_id')->constrained('teams');
            $table->foreignId('away_team_id')->constrained('teams');
            $table->dateTime('date');
            $table->string('location');
            $table->integer('home_team_score');
            $table->integer('away_team_score');
        });
        Schema::create('rankings', static function(Blueprint $table): void {
            $table->id();
            $table->foreignId('season_id')->constrained('seasons');
            $table->foreignId('team_id')->constrained('teams');
            $table->integer('wins');
            $table->integer('losses');
            $table->integer('ties');
            $table->integer('goals_for');
            $table->integer('goals_against');
            $table->integer('goal_differential');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
        Schema::dropIfExists('players');
        Schema::dropIfExists('seasons');
        Schema::dropIfExists('team_awards');
        Schema::dropIfExists('player_awards');
        Schema::dropIfExists('games');
        Schema::dropIfExists('rankings');
    }
};
