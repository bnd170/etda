<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DevelopmentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create(
            [
                'name'  => 'Borja P.',
                'email' => 'borja@etda.es',
            ]
        );


        for ($i = 0; $i < 10; $i++) {
            User::factory()->create();
        }
    }
}
