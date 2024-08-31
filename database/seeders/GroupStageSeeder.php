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
            'RU' => ['name' => 'Alemania', 'iso' => 'DE'],
            'FI' => ['name' => 'Tailandia', 'iso' => 'TH'],
            'JP' => ['name' => 'Japón', 'iso' => 'JP'],
            'CO' => ['name' => 'Colombia', 'iso' => 'CO'],
        ];

        $groups = [
            'A' => [$teams['UA'], $teams['IE'], $teams['NL'], $teams['JP']],
            'B' => [$teams['IR'], $teams['US'], $teams['ES'], $teams['CO']],
            'C' => [$teams['BR'], $teams['AR'], $teams['AU'], $teams['CA']],
            'D' => [$teams['RU'], $teams['GB'], $teams['VE'], $teams['FI']],
        ];

        foreach ($groups as $group => $groupTeams) {
            for ($i = 0, $iMax = count($groupTeams); $i < $iMax; $i++) {
                for ($j = $i + 1, $jMax = count($groupTeams); $j < $jMax; $j++) {
                    Game::create(
                        [
                            'round'                   => 'Fase de grupos - Grupo ' . $group,
                            'predictor_tournament_id' => $worldCup->id,
                            'team_home'               => new Game\Team(
                                $groupTeams[$i]['name'], $groupTeams[$i]['iso']
                            ),
                            'team_away'               => new Game\Team(
                                $groupTeams[$j]['name'], $groupTeams[$j]['iso']
                            ),
                            'date'                    => now()->addDays(rand(1, 10)),
                        ]
                    );
                }
            }
        }
    }
}
