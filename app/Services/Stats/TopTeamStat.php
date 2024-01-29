<?php

namespace App\Services\Stats;

class TopTeamStat
{
    public function __construct(
        public string $name,
        public string $tag,
        public ?string $logo,
        public string $sheetName,
        public int    $stat,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name'       => $this->name,
            'tag'        => $this->tag,
            'logo'       => $this->logo,
            'sheet_name' => $this->sheetName,
            'stat'       => $this->stat,
        ];
    }
}
