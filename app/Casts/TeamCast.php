<?php

namespace App\Casts;

use App\Models\Predictor\Game\Team;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class TeamCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        $data = json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        return new Team($data['name'], $data['iso']);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        if ($value instanceof Team) {
            return json_encode($value->toPrimitives(), JSON_THROW_ON_ERROR);
        }

        return json_encode($value, JSON_THROW_ON_ERROR);
    }
}
