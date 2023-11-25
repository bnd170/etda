<?php

namespace App\Console\Commands;

use App\Models\Season;
use App\Models\Team;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CreateTeam extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-team';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new team';

    public function handle(): void
    {
        $name = $this->ask('What is the name of the team?');
        $season = $this->anticipate('Choose the season', function (string $input) {
            return Season::where('year', 'like', '%' . $input . '%')->get()->pluck('year')->toArray();
        });
        $logo = $this->ask('What is the logo of the team?');
        $filepath = $this->saveImage($logo, $season);
        $city = $this->ask('What is the city of the team?');
        $coach = $this->ask('What is the coach of the team?');
        $president = $this->ask('What is the president of the team?');
        $description = $this->ask('What is the description of the team?');

        Team::create([
            'name' => $name,
            'season_id' => Season::where('year', $season)->first()->id,
            'city' => $city,
            'logo' => $filepath,
            'coach' => $coach,
            'president' => $president,
            'description' => $description,
        ]);

        $this->info(sprintf('Team %s created', $name));
    }

    protected function saveImage(mixed $logo, mixed $season): string
    {
        $client   = new Client();
        $res      = $client->get($logo);
        $contents = (string)$res->getBody();
        $filename = substr($logo, strrpos($logo, '/') + 1);
        $filepath = sprintf('%s/%s', $season, $filename);
        Storage::put($filepath, $contents);

        return $filepath;
    }
}
