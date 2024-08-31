<?php

namespace Database\Seeders;

use App\Models\Prediction\Tournament;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tournament::create(
            [
                'name' => 'IFCPF World Cup Salou 2024',
                'slug' => 'ifcpf-world-cup-salou-2024',
            ]
        );
    }
}
