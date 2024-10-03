<?php

namespace Database\Seeders;

use App\Models\Prediction\Game;
use App\Models\Prediction\Tournament;
use Illuminate\Database\Seeder;


class GroupStageSeeder extends Seeder
{
    public function run()
    {
        $worldCup = Tournament::where('name', 'IFCPF World Cup Salou 2024')->first();

        $teams = [
            'UA' => ['name' => 'Ucrania', 'iso' => 'UA'],
            'BR' => ['name' => 'Brasil', 'iso' => 'BR'],
            'IR' => ['name' => 'Irán', 'iso' => 'IR'],
            'US' => ['name' => 'EEUU', 'iso' => 'US'],
            'GB' => ['name' => 'Inglaterra', 'iso' => 'GB'],
            'NL' => ['name' => 'Holanda', 'iso' => 'NL'],
            'AR' => ['name' => 'Argentina', 'iso' => 'AR'],
            'IE' => ['name' => 'Irlanda', 'iso' => 'IE'],
            'ES' => ['name' => 'España', 'iso' => 'ES'],
            'AU' => ['name' => 'Australia', 'iso' => 'AU'],
            'CA' => ['name' => 'Canadá', 'iso' => 'CA'],
            'VE' => ['name' => 'Venezuela', 'iso' => 'VE'],
            'DE' => ['name' => 'Alemania', 'iso' => 'DE'],
            'FI' => ['name' => 'Tailandia', 'iso' => 'TH'],
            'JP' => ['name' => 'Japón', 'iso' => 'JP'],
        ];

        $groups = [
            'A' => [$teams['UA'], $teams['AR'], $teams['ES']],
            'B' => [$teams['BR'], $teams['GB'], $teams['CA'], $teams['JP']],
            'C' => [$teams['US'], $teams['NL'], $teams['AU'], $teams['FI']],
            'D' => [$teams['IR'], $teams['IE'], $teams['VE'], $teams['DE']],
        ];

        foreach ($groups as $group => $groupTeams) {
            for ($i = 0, $iMax = count($groupTeams); $i < $iMax; $i++) {
                for ($j = $i + 1, $jMax = count($groupTeams); $j < $jMax; $j++) {
                    $game = Game::create(
                        'Fase de grupos - Grupo '.$group,
                        $worldCup->id,
                        new Game\Team($groupTeams[$i]['name'], $groupTeams[$i]['iso']),
                        new Game\Team($groupTeams[$j]['name'], $groupTeams[$j]['iso']),
                        now()->addDays(random_int(1, 10))
                    );

                    $game->save();
                }
            }
        }
    }
}
