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
        Schema::table('players', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->integer('image_id')->nullable()->after('name');
            $table->string('classification')->nullable()->change();
            $table->string('position')->nullable()->change();
            $table->text('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('players', function (Blueprint $table) {
            $table->text('description')->change();
            $table->string('position')->change();
            $table->string('classification')->change();
            $table->string('image')->nullable()->after('name');
            $table->dropColumn('image_id');
        });
    }
};
