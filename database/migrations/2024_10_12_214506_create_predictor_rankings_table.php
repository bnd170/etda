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
        Schema::create('predictor_rankings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('predictor_tournament_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('points')->default(0);
            $table->integer('position')->nullable();
            $table->integer('last_position')->nullable();
            $table->integer('last_points')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predictor_rankings');
    }
};
