<?php

namespace App\Console\Commands;

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

    public function __construct(private readonly SeasonImport $seasonImport)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $sheetId = $this->argument('sheetId');

        $client = new \Google_Client();
        $client->setApplicationName('Google Sheets API');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $client->setAuthConfig(base_path('config/google/credentials.json'));

        $service = new \Google_Service_Sheets($client);
        $spreadsheet = $service->spreadsheets->get($sheetId);
        $sheets = $spreadsheet->getSheets();

        foreach ($sheets as $sheet) {
            $title = $sheet->getProperties()->getTitle();
            $range = $sheet->getProperties()->getTitle() . '!A1:Z';
            $response = $service->spreadsheets_values->get($sheetId, $range);
            $values = $response->getValues();

            if (empty($values)) {
                continue;
            }

            dd($values);
        }
    }

    protected function promptForMissingArgumentsUsing()
    {
        return [
            'sheetId' => 'Enter the Google Sheet ID:',
        ];
    }
}
