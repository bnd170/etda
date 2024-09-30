<?php

namespace App\Models\Prediction\Game;

enum Status: string
{
    case NotStarted = 'not_started';
    case Played = 'played';
    
}
