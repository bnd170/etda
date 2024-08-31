<?php

namespace App\Models\Prediction\Game;

readonly class Team
{
    public function __construct(public string $name, public string $iso)
    {
    }

    public function toPrimitives(): array
    {
        return [
            'name' => $this->name,
            'iso' => $this->iso,
        ];
    }
}
