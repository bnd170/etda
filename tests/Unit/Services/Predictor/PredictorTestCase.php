<?php

namespace Tests\Unit\Services\Predictor;

use App\Models\Predictor\Prediction;
use App\Repositories\PredictionRepositoryInterface;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use Tests\CreatesApplication;

abstract class PredictorTestCase extends TestCase
{
    use CreatesApplication;

    private MockInterface $predictionRepository;

    public function predictionRepository(): PredictionRepositoryInterface
    {
        return $this->predictionRepository ??= \Mockery::mock(PredictionRepositoryInterface::class);
    }

    public function shouldFindPredictionsByGameId(int $gameId, array $predictions): void
    {
        $this->predictionRepository()->shouldReceive('findByGameId')->with($gameId)->andReturn($predictions);
    }

    public function shouldSavePrediction(Prediction $prediction): void
    {
        $this->predictionRepository()->shouldReceive('save')->with($prediction);
    }
}
