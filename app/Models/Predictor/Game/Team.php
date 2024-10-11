<?php

namespace App\Models\Predictor\Game;

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

    public function toJson(): string
    {
        return json_encode($this->toPrimitives(), JSON_THROW_ON_ERROR);
    }
}
