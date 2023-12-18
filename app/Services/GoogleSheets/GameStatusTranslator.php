<?php

namespace App\Services\GoogleSheets;

class GameStatusTranslator
{
    public static function translate(string $value): string
    {
        match ($value) {
            'PENDIENTE' => $status = 'pending',
            'EN JUEGO' => $status = 'playing',
            'FINALIZADO' => $status = 'finished',
            'SUSPENDIDO' => $status = 'suspended'
        };

        return $status;
    }
}
