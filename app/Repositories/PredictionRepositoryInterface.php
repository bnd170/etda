<?php

namespace App\Repositories;

use App\Models\Predictor\Prediction;

interface PredictionRepositoryInterface
{
    public function save(Prediction $prediction): void;

    public function find(int $id): ?Prediction;

    /** @return Prediction[] */
    public function findByGameId(int $gameId): array;
}
