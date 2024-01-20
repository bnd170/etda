<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('logo');
            $table->integer('logo_id')->nullable()->after('name');
            $table->string('coach')->nullable()->change();
            $table->string('president')->nullable()->change();
            $table->text('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->text('description')->change();
            $table->string('president')->change();
            $table->string('coach')->change();
            $table->string('logo')->nullable()->after('name');
            $table->dropColumn('logo_id');
        });
    }
};
