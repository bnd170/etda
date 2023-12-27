<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('players', function (Blueprint $table) {
            $table->string('number')->nullable()->change();
        });
        DB::statement(<<<SQL
update players set number = null where number = ''
SQL
);
        DB::statement(
            <<<SQL
alter table "players"
alter column "number" set default null,
alter column "number" type integer USING number::integer
;
SQL
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement(
            'ALTER TABLE players
ALTER COLUMN number TYPE VARCHAR(255)
USING number::varchar(255);'
        );
    }
};
