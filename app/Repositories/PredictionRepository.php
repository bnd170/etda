<?php

namespace App\Repositories;

use App\Models\Prediction\Prediction;

class PredictionRepository implements PredictionRepositoryInterface
{
    public function __construct(private readonly Prediction $model)
    {
    }

    public function save(Prediction $prediction): void
    {
        $prediction->save();
    }

    public function find(int $id): ?Prediction
    {
        return $this->model->find($id);
    }
}
