<?php

namespace App\Console\Commands;

use App\Models\Game;
use App\Models\Game\GameStats;
use App\Models\Game\TeamStats;
use App\Models\Ranking;
use App\Models\Season;
use App\Models\Team;
use App\Services\GoogleSheets\GameStatusTranslator;
use Carbon\Carbon;
use Google\Service\Sheets\Sheet;
use Google_Client;
use Google_Service_Sheets;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

class ImportData extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import {sheetId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from Google Sheets';

    private Google_Service_Sheets $service;

    private string $sheetId;

    private string $seasonYear;

    public function handle(): void
    {
        $this->sheetId = $this->argument('sheetId');

        $client = new Google_Client();
        $client->setApplicationName('Google Sheets API');
        $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $client->setAuthConfig(base_path('config/google/credentials.json'));

        $this->service = new Google_Service_Sheets($client);
        $spreadsheet   = $this->service->spreadsheets->get($this->sheetId);
        $sheets        = $spreadsheet->getSheets();

        foreach ($sheets as $sheet) {
            $title = $sheet->getProperties()->getTitle();
            switch ($title) {
                case 'Temporada':
                    $this->seasonYear = $this->getSeasonYear($sheet);
                    $this->importRanking($sheet);
                    break;
                case 'Partidos':
                    $this->importGames($sheet);
                    break;
                case 'PLANTILLA PARTIDO':
                    break;
                default:
                    $this->importGameStats($sheet);
            }

            $this->info("Importing $title...");
        }
    }

    protected function promptForMissingArgumentsUsing()
    {
        return [
            'sheetId' => 'Enter the Google Sheet ID:',
        ];
    }

    private function importGames(Sheet $sheet)
    {
        $season   = $this->findSeason();
        $range    = $sheet->getProperties()->getTitle().'!A2:J30';
        $response = $this->service->spreadsheets_values->get($this->sheetId, $range);
        $rows     = $this->rowsToJson($response->getValues());

        foreach ($rows as $row) {
            if ($row['GOLES LOCAL'] === '-' && $row['GOLES VISITANTE'] === '-') {
                continue;
            }

            Game::updateOrCreate(
                [
                    'season_id' => $season->id,
                    'sheet_id'  => $row['sheet_id'],
                ],
                [
                    'date'            => Carbon::createFromFormat('j/m/Y H:i:s', $row['FECHA']),
                    'location'        => $row['LOCALIDAD'],
                    'home_team_id'    => $row['LOCAL'] === '-' ? null : Team::where('sheet_name', $row['LOCAL'])->first(
                    )->id,
                    'away_team_id'    => $row['VISITANTE'] === '-' ? null : Team::where(
                        'sheet_name',
                        $row['VISITANTE']
                    )->first()->id,
                    'home_team_score' => $row['GOLES LOCAL'] === '-' ? null : $row['GOLES LOCAL'],
                    'away_team_score' => $row['GOLES VISITANTE'] === '-' ? null : $row['GOLES VISITANTE'],
                    'season_id'       => $season->id,
                    'sheet_id'        => $row['sheet_id'],
                    'state'           => $row['PROVINCIA'],
                    'round'           => str_replace('J', '', $row['JORNADA']),
                    'status'          => GameStatusTranslator::translate($row['ESTADO']),
                ]
            );
        }
    }

    private function importRanking(Sheet $sheet): void
    {
        $season   = $this->findSeason();
        $range    = $sheet->getProperties()->getTitle().'!A3:I10';
        $response = $this->service->spreadsheets_values->get($this->sheetId, $range);
        $rows     = $this->rowsToJson($response->getValues());

        foreach ($rows as $row) {
            $existentTeam = Team::where('sheet_name', $row['Equipo'])->first();
            Ranking::updateOrCreate([
                                        'season_id' => $season->id,
                                        'team_id'   => $existentTeam->id,
                                    ], [
                                        'season_id'         => $season->id,
                                        'team_id'           => $existentTeam->id,
                                        'wins'              => $row['PG'],
                                        'losses'            => $row['PP'],
                                        'ties'              => $row['PE'],
                                        'points'            => $row['PTOS'],
                                        'goals_for'         => $row['GF'],
                                        'goals_against'     => $row['GC'],
                                        'goal_differential' => $row['DG'],
                                    ]);
        }
    }

    private function getSeasonYear(Sheet $sheet)
    {
        $range    = $sheet->getProperties()->getTitle().'!A1:A1';
        $response = $this->service->spreadsheets_values->get($this->sheetId, $range);
        $values   = $response->getValues();

        return $values[0][0];
    }

    protected function rowsToJson(array $rows, int $headerIndex = 0): array
    {
        $headers = array_shift($rows);
        $array   = [];
        foreach ($rows as $row) {
            $array[] = array_combine($headers, $row);
        }

        return $array;
    }

    private function findSeason(): Season
    {
        return Season::where('year', $this->seasonYear)->first();
    }

    private function importGameStats(Sheet $sheet)
    {
        $match_id  = 'match_'.$sheet->getProperties()->getTitle();
        $goals     = $this->parseGameGoals($sheet);
        $gameStats = $sheet->getProperties()->getTitle().'!A9:F18';
        $response  = $this->service->spreadsheets_values->get($this->sheetId, $gameStats);
        $values    = $response->getValues();
        $headers   = array_map(fn($value) => $this->toSnakeCase($value[2]), $values);
        $rows      = [];
        foreach ($values as $key => $value) {
            $rows[$headers[$key]]['home'] = $value[0];
            $rows[$headers[$key]]['away'] = $value[4];
        }
        $rows['goals']['home'] = $goals['home'];
        $rows['goals']['away'] = $goals['away'];

        $game = Game::where('sheet_id', $match_id)->first();
        $game->update(['stats' => $this->parseGameStats($rows)]);
    }


    private function toSnakeCase($string): string
    {
        $string = preg_replace('/[\'"]/', '', $string);
        $string = preg_replace('/[^a-zA-Z0-9]+/', '_', $string);
        $string = strtolower($string);

        return $string;
    }

    protected function parseStats(array $rows, string $team): TeamStats
    {
        return new TeamStats(
            possession:  $this->getData($rows['posesion'][$team]),
            shoots:      $this->getData($rows['remates'][$team]),
            effectivity: $this->getData($rows['efectividad'][$team]),
            passes:      $this->getData($rows['pases_completados'][$team]),
            steals:      $this->getData($rows['balones_recuperados'][$team]),
            fouls:       $this->getData($rows['faltas_cometidas'][$team]),
            corners:     $this->getData($rows['corneres_lanzados'][$team]),
            yellowCards: $this->getData($rows['tarjetas_amarillas'][$team]),
            redCards:    $this->getData($rows['tarjetas_rojas'][$team]),
            penalties:   $this->getData($rows['penaltis'][$team]),
            goals:       $rows['goals'][$team],
            games:       1
        );
    }

    protected function parseGameStats(array $rows): GameStats
    {
        return GameStats::fromArray([
                                        'home' => $this->parseStats($rows, 'home')->toArray(),
                                        'away' => $this->parseStats($rows, 'away')->toArray(),
                                    ]);
    }

    protected function getData(string $statData): int
    {
        $statData = str_replace('%', '', $statData);
        return $statData === '-' ? 0 : (int)$statData;
    }

    private function parseGameGoals(Sheet $sheet): array
    {
        return [
            'home' => $this->parseTeamGoals($sheet, 'A23:C36'),
            'away' => $this->parseTeamGoals($sheet, 'A37:C50'),
        ];
    }

    private function parseTeamGoals(Sheet $sheet, string $coords): array
    {
        $goals    = $sheet->getProperties()->getTitle().'!'.$coords;
        $response = $this->service->spreadsheets_values->get($this->sheetId, $goals);
        $values   = $response->getValues();
        $rows     = [];
        foreach ($values as $key => $value) {
            if ($value[2] === '-') {
                continue;
            }
            $number        = $value[0];
            $rows[$number] = explode(',', $value[2]);
        }

        return $rows;
    }
}
