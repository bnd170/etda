<?php

namespace App\Models\Prediction\Game;

enum Status: string
{
    case NotStarted = 'not_started';
    case Played = 'played';

    public static function asHumanReadable(Status $status): string
    {
        return match ($status) {
            self::NotStarted => 'Not started',
            self::Played => 'Played',
        };
    }
}
