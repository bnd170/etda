<?php

namespace App\Console\Commands;

use App\Models\Ranking;
use App\Models\Season;
use App\Models\Team;
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

    public function __construct(private readonly SeasonImport $seasonImport)
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
                    $this->importRanking($sheet);
                    break;
                //                case 'Partidos':
                //                    $this->importMatches($sheet);
                //                    break;
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

    private function importRanking(Sheet $sheet)
    {
        $seasonYear = $this->getSeasonYear($sheet);

        $season   = Season::where('year', $seasonYear)->first();
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
}
