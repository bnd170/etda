<?php

namespace App\Console\Commands;

use App\Models\Game;
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
use Portal\Application\SeasonImport;

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

    public function __construct()
    {
        parent::__construct();
    }

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
            Game::updateOrCreate([
                                     'season_id' => $season->id,
                                     'sheet_id'  => $row['sheet_id'],
                                 ], [
                                     'date'            => Carbon::createFromFormat('j/m/Y H:i:s', $row['FECHA']),
                                     'location'        => $row['LOCALIDAD'],
                                     'home_team_id'    => $row['LOCAL'] === '-' ? null : Team::where(
                                         'sheet_name',
                                         $row['LOCAL']
                                     )->first()->id,
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
                                 ]);
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

    protected function rowsToJson(array $rows): array
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
}
