<?php

namespace App\Repositories;

use App\Models\Prediction\Prediction;

interface PredictionRepositoryInterface
{
    public function save(Prediction $prediction): void;
    public function find(int $id): ?Prediction;
}
