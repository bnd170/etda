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
        Schema::table('games', function (Blueprint $table) {
            $table->jsonb('stats')->nullable();
            $table->string('sheet_id')->nullable();
            $table->string('round')->nullable();
            $table->string('state')->nullable();
            $table->string('status');
            $table->string('slug')->nullable();
            $table->foreignId('home_team_id')->nullable()->change();
            $table->foreignId('away_team_id')->nullable()->change();
            $table->integer('home_team_score')->nullable()->change();
            $table->integer('away_team_score')->nullable()->change();
            $table->index('sheet_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('stats');
            $table->dropColumn('sheet_id');
            $table->dropColumn('round');
            $table->dropColumn('state');
            $table->dropColumn('status');
            $table->dropColumn('slug');
            $table->foreignId('home_team_id')->change();
            $table->foreignId('away_team_id')->change();
            $table->integer('home_team_score')->change();
            $table->integer('away_team_score')->change();

        });
    }
};
