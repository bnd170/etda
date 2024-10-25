<?php

namespace App\Policies;

use App\Models\Predictor\Game;
use App\Models\Predictor\Prediction;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PredictionPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Game $game): Response
    {
        if ($game->date < now()) {
            return Response::deny(_('El partido ya ha dado comienzo, no se admiten nuevos pronosticos.'));
        }

        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Prediction $prediction): Response
    {
        if ($prediction->game->date < now()) {
            return Response::deny(_('El partido ya ha dado comienzo, no se permite modificar pronosticos'));
        }

        if ($prediction->user_id !== $user->id) {
            return Response::deny(_('No puedes modificar pronosticos de otros usuarios'));
        }

        return Response::allow();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Prediction $prediction): Response
    {
        if ($prediction->user_id !== $user->id) {
            return Response::deny(_('No puedes eliminar pronosticos de otros usuarios'));
        }

        return Response::allow();
    }
}
