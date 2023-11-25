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
    protected $signature = 'app:import {filePath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from XLSX template';

    public function __construct(private readonly SeasonImport $seasonImport)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $filePath = $this->argument('filePath');

        $this->info(sprintf('Importing data from %s', $filePath));

        $this->info('Importing seasons');
        $this->seasonImport->__invoke($filePath);

        $this->info('Import process finished successfully');
    }


    protected function promptForMissingArgumentsUsing()
    {
        return [
            'filePath' => 'What is the path of the file?',
        ];
    }
}
