<?php

namespace App\Console\Commands;

use App\Models\Season;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CreateSeason extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-season';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new season with name and';

    public function handle(): void
    {
        $year = Carbon::createFromFormat('Y', $this->ask('What is the year of the season?'))->format('Y');

        Season::create([
            'year' => $year,
            'in_progress' => $this->confirm('Is this season in progress?'),
        ]);

        $this->info(sprintf('Season %s created', $year));
    }
}
