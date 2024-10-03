<?php

namespace Tests\Unit\Services\Predictor;

use App\Models\Prediction\Prediction;
use App\Repositories\PredictionRepositoryInterface;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Mockery\MockInterface;
use Tests\CreatesApplication;

abstract class PredictorTestCase extends BaseTestCase
{
    use CreatesApplication;

    private MockInterface $repository;

    public function repository(): MockInterface
    {
        return $this->repository ??= $this->mock(PredictionRepositoryInterface::class);
    }

    public function shouldFindPredictionsByGameId(int $gameId, array $predictions): void
    {
        $this->repository()->shouldReceive('findByGameId')->with($gameId)->andReturn($predictions);
    }
}
